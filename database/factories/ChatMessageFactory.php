<?php

namespace Database\Factories;

use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatMessageFactory extends Factory
{
    protected $model = ChatMessage::class;

    public function definition()
    {
        return [
            'chat_room_id' => ChatRoom::factory(),
            'sender_id' => User::factory(),
            'receiver_id' => User::factory(),
            'message' => $this->faker->sentence(),
            'is_read' => false,
        ];
    }
} 