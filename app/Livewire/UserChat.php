<?php

namespace App\Livewire;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserChat extends Component
{
    public $chatRoom;
    public $messages = [];
    public $data = [];
    public $file;
    public $userId;
    public $search = '';
    public $matchedIndexes = [];
    public $currentMatch = -1;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->initializeChat();
    }

    public function initializeChat()
    {
        // Get or create chat room
        $this->chatRoom = ChatRoom::where(function ($query) {
            $query->where('user_id', Auth::id())
                ->orWhere('user_id', $this->userId);
        })->first();

        if (!$this->chatRoom) {
            $this->chatRoom = ChatRoom::create([
                'user_id' => Auth::id(),
                'name' => 'Chat with User',
                'is_active' => true,
            ]);
        }

        // Load initial messages
        $this->loadMessages();
    }

    public function getListeners()
    {
        return [
            "echo-private:chat.{$this->chatRoom->id},new-message" => 'handleNewMessage',
            "echo-private:user.{$this->chatRoom->user_id},new-message" => 'handleNewMessage',
            "echo-private:user." . Auth::id() . ",new-message" => 'handleNewMessage',
            'messages-updated' => 'loadMessages',
            'message-sent' => '$refresh',
        ];
    }

    public function handleNewMessage($event)
    {
        if ($event['message']['chat_room_id'] === $this->chatRoom->id) {
            // Convert the event message array into an Eloquent model with relationships
            $newMessage = ChatMessage::find($event['message']['id'])->load(['sender', 'receiver']);
            
            // Add the new message to the messages array immediately
            $this->messages[] = $newMessage->toArray();
            
            // Dispatch scroll event
            $this->dispatch('message-sent');
        }
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
        broadcast(new NewChatMessage($message))->toOthers();
        
        // Reset the form
        $this->data = [];
        $this->file = null;
        
        // Dispatch scroll event
        $this->dispatch('message-sent');
    }

    public function loadMessages()
    {
        $this->messages = ChatMessage::where('chat_room_id', $this->chatRoom->id)
            ->with(['sender', 'receiver'])
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray();
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
} 