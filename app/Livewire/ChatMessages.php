<?php

namespace App\Livewire;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Events\NewChatMessage;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ChatMessages extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ChatRoom $chatRoom;
    public array $messages = [];
    public $file;
    public $search = '';
    public $filteredMessages = [];
    public $matchedIndexes = [];
    public $currentMatch = 0;
    public $data = [];

    public function mount(ChatRoom $chatRoom)
    {
        $this->chatRoom = $chatRoom;
        $this->loadMessages();
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('message')
                    ->label('')
                    ->placeholder('Type a message...')
                    ->required()
                    ->maxLength(1000),
                FileUpload::make('file')
                    ->label('')
                    ->directory('chat-files')
                    ->visibility('public')
                    ->maxSize(5120)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                    ->columnSpanFull(),
            ])
            ->columns(1);
    }

    public function loadMessages()
    {
        $this->messages = ChatMessage::where('chat_room_id', $this->chatRoom->id)
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
    }

    public function sendMessage(): void
    {
        $this->validate([
            'data.message' => 'required|max:1000',
        ]);
        
        $message = new ChatMessage([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $this->chatRoom->user_id,
            'message' => $this->data['message'],
            'file_path' => $this->file ? $this->file->store('chat-files', 'public') : null,
            'file_name' => $this->file ? $this->file->getClientOriginalName() : null,
        ]);
        
        $message->save();
        $message->load(['sender', 'receiver']);
        
        // Add the new message to the messages array immediately
        $this->messages[] = $message->toArray();
        
        // Update chat room's last message
        $this->chatRoom->update([
            'last_message' => $this->data['message'],
            'last_message_at' => now(),
        ]);
        
        // Dispatch the event
        event(new NewChatMessage($message));
        
        // Reset the form
        $this->data = [];
        $this->file = null;
        
        // Scroll to bottom
        $this->dispatch('message-sent');
    }

    public function updatedSearch()
    {
        // Reset matches on new search
        $this->matchedIndexes = [];

        if (!empty($this->search)) {
            foreach ($this->messages as $index => $message) {
                if (stripos($message['message'], $this->search) !== false) {
                    $this->matchedIndexes[] = $index;
                }
            }
        }

        // Reset to first match
        $this->currentMatch = count($this->matchedIndexes) > 0 ? 0 : -1;

        // Scroll to the first match
        if ($this->currentMatch !== -1) {
            $this->scrollToMatch();
        }
    }

    public function nextMatch()
    {
        if (count($this->matchedIndexes) > 0) {
            $this->currentMatch = ($this->currentMatch + 1) % count($this->matchedIndexes);
            $this->scrollToMatch();
        }
    }

    public function prevMatch()
    {
        if (count($this->matchedIndexes) > 0) {
            $this->currentMatch = ($this->currentMatch - 1 + count($this->matchedIndexes)) % count($this->matchedIndexes);
            $this->scrollToMatch();
        }
    }

    public function scrollToMatch()
    {
        $index = $this->matchedIndexes[$this->currentMatch] ?? null;

        if (!is_null($index)) {
            $this->dispatch('scroll-to-message', index: $index);
        }
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->matchedIndexes = [];
        $this->currentMatch = -1;

        // Scroll to latest message
        $this->dispatch('messages-updated');
    }

    public function highlightText($text, $search)
    {
        // Escape the search term to safely insert into the regex
        $escaped = preg_quote($search, '/');
        // Use preg_replace to wrap matched terms in a <mark> tag
        return preg_replace('/(' . $escaped . ')/i', '<mark>$1</mark>', e($text));
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->chatRoom->id},new-message" => 'handleNewMessage',
            "echo-private:user.{$this->chatRoom->user_id},new-message" => 'handleNewMessage',
            'messages-updated' => 'loadMessages',
        ];
    }

    public function handleNewMessage($event)
    {
        if ($event['message']['chat_room_id'] === $this->chatRoom->id) {
            // Add the new message to the messages array
            $this->messages[] = $event['message'];
            
            // Update chat room's last message
            $this->chatRoom->update([
                'last_message' => $event['message']['message'],
                'last_message_at' => now(),
            ]);
            
            // Scroll to bottom
            $this->dispatch('message-sent');
        }
    }

    public function render()
    {
        return view('livewire.chat-messages');
    }
} 