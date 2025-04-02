<?php

namespace App\Http\Livewire;

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

    public function loadMessages()
    {
        // Implement the logic to load messages from the database
    }
} 