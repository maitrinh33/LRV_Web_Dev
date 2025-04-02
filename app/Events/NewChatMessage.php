<?php

namespace App\Events;

use App\Models\ChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;

    public function __construct(ChatMessage $message)
    {
        $this->message = $message->load(['sender', 'receiver']);
    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('chat.' . $this->message->chat_room_id),
            new PrivateChannel('user.' . $this->message->receiver_id),
            new PrivateChannel('user.' . $this->message->sender_id),
        ];
    }

    public function broadcastAs()
    {
        return 'new-message';
    }

    public function broadcastWith()
    {
        return [
            'message' => [
                'id' => $this->message->id,
                'chat_room_id' => $this->message->chat_room_id,
                'sender_id' => $this->message->sender_id,
                'receiver_id' => $this->message->receiver_id,
                'message' => $this->message->message,
                'file_path' => $this->message->file_path,
                'file_name' => $this->message->file_name,
                'is_read' => $this->message->is_read,
                'created_at' => $this->message->created_at,
                'sender' => [
                    'id' => $this->message->sender->id,
                    'name' => $this->message->sender->name,
                ],
                'receiver' => [
                    'id' => $this->message->receiver->id,
                    'name' => $this->message->receiver->name,
                ],
            ]
        ];
    }

    public function broadcastQueue()
    {
        return 'broadcasts';
    }
} 