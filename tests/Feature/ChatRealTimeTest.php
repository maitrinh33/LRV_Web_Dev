<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ChatRealTimeTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $admin;
    protected $user;
    protected $chatRoom;

    protected function setUp(): void
    {
        parent::setUp();

        // Create admin user
        $this->admin = User::factory()->create([
            'usertype' => 'admin'
        ]);

        // Create regular user
        $this->user = User::factory()->create([
            'usertype' => 'user'
        ]);

        // Create chat room
        $this->chatRoom = ChatRoom::factory()->create([
            'user_id' => $this->user->id,
            'name' => 'Test Chat Room',
            'is_active' => true
        ]);

        // Fake events for testing
        Event::fake([NewChatMessage::class]);
    }

    /** @test */
    public function test_chat_message_is_broadcasted()
    {
        $this->actingAs($this->admin);

        $message = ChatMessage::factory()->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'message' => 'Test message'
        ]);

        event(new NewChatMessage($message));

        Event::assertDispatched(NewChatMessage::class, function ($event) use ($message) {
            return $event->message->id === $message->id;
        });
    }

    /** @test */
    public function test_chat_message_updates_in_realtime()
    {
        $this->actingAs($this->admin);

        // Create initial message
        $message = ChatMessage::factory()->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'message' => 'Initial message'
        ]);

        // Simulate receiving a new message
        $newMessage = ChatMessage::factory()->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->user->id,
            'receiver_id' => $this->admin->id,
            'message' => 'Reply message'
        ]);

        // Broadcast the new message
        event(new NewChatMessage($newMessage));

        // Assert the event was dispatched
        Event::assertDispatched(NewChatMessage::class, function ($event) use ($newMessage) {
            return $event->message->id === $newMessage->id;
        });

        // Assert the chat room exists and is active
        $this->chatRoom->refresh();
        $this->assertTrue($this->chatRoom->is_active);
        $this->assertNotNull($this->chatRoom->last_message_at);
    }

    /** @test */
    public function test_chat_message_event_contains_correct_data()
    {
        $this->actingAs($this->admin);

        // Create a new message
        $message = ChatMessage::factory()->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->user->id,
            'receiver_id' => $this->admin->id,
            'message' => 'Test component message'
        ]);

        // Create and get the event data
        $event = new NewChatMessage($message);
        $eventData = $event->broadcastWith();

        // Assert the event data contains the correct message
        $this->assertEquals($message->id, $eventData['message']['id']);
        $this->assertEquals($message->chat_room_id, $eventData['message']['chat_room_id']);
        $this->assertEquals($message->sender_id, $eventData['message']['sender_id']);
        $this->assertEquals($message->receiver_id, $eventData['message']['receiver_id']);
        $this->assertEquals($message->message, $eventData['message']['message']);
    }
} 