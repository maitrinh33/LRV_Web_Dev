<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use App\Events\NewChatMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Livewire\Livewire;

class ChatTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $admin;
    protected $user;
    protected $chatRoom;

    protected function setUp(): void
    {
        parent::setUp();
        Event::fake();

        // Create admin user
        $this->admin = User::factory()->create([
            'role' => 'admin'
        ]);

        // Create regular user
        $this->user = User::factory()->create();

        // Create chat room
        $this->chatRoom = ChatRoom::factory()->create([
            'user_id' => $this->user->id
        ]);
    }

    /** @test */
    public function test_chat_message_can_be_sent()
    {
        $this->actingAs($this->admin);

        $message = $this->faker->sentence();

        $response = $this->postJson("/api/chat/{$this->chatRoom->id}/messages", [
            'message' => $message
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('chat_messages', [
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'message' => $message
        ]);
    }

    /** @test */
    public function test_new_chat_message_event_is_broadcasted()
    {
        Event::fake();

        $this->actingAs($this->admin);

        $message = ChatMessage::factory()->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id
        ]);

        broadcast(new NewChatMessage($message))->dispatch();

        Event::assertDispatched(NewChatMessage::class, function ($event) use ($message) {
            return $event->message->id === $message->id;
        });
    }

    /** @test */
    public function test_chat_messages_can_be_loaded()
    {
        $this->actingAs($this->admin);

        // Create some test messages
        ChatMessage::factory()->count(3)->create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id
        ]);

        $response = $this->getJson("/api/chat/{$this->chatRoom->id}/messages");

        $response->assertStatus(200)
            ->assertJsonCount(3, 'messages');
    }

    /** @test */
    public function test_chat_room_can_be_accessed_by_participants()
    {
        // Test admin access
        $this->actingAs($this->admin);
        $response = $this->getJson("/api/chat/{$this->chatRoom->id}");
        $response->assertStatus(200);

        // Test user access
        $this->actingAs($this->user);
        $response = $this->getJson("/api/chat/{$this->chatRoom->id}");
        $response->assertStatus(200);

        // Test unauthorized access
        $unauthorizedUser = User::factory()->create();
        $this->actingAs($unauthorizedUser);
        $response = $this->getJson("/api/chat/{$this->chatRoom->id}");
        $response->assertStatus(403);
    }

    /** @test */
    public function test_chat_message_updates_chat_room_last_message()
    {
        $this->actingAs($this->admin);

        $message = $this->faker->sentence();

        $response = $this->postJson("/api/chat/{$this->chatRoom->id}/messages", [
            'message' => $message
        ]);

        $response->assertStatus(200);

        $this->chatRoom->refresh();
        $this->assertEquals($message, $this->chatRoom->last_message);
        $this->assertNotNull($this->chatRoom->last_message_at);
    }

    /** @test */
    public function user_can_send_message_to_admin()
    {
        $this->actingAs($this->user);

        $message = 'Hello Admin!';
        
        Livewire::test('ChatMessages', ['record' => $this->chatRoom])
            ->set('newMessage', $message)
            ->call('sendMessage');

        $this->assertDatabaseHas('chat_messages', [
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->user->id,
            'message' => $message,
        ]);

        Event::assertDispatched(NewChatMessage::class);
    }

    /** @test */
    public function admin_can_send_message_to_user()
    {
        $this->actingAs($this->admin);

        $message = 'Hello User!';
        
        Livewire::test('ChatMessages', ['record' => $this->chatRoom])
            ->set('newMessage', $message)
            ->call('sendMessage');

        $this->assertDatabaseHas('chat_messages', [
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'message' => $message,
        ]);

        Event::assertDispatched(NewChatMessage::class);
    }

    /** @test */
    public function messages_are_marked_as_read_when_viewed()
    {
        // Create an unread message from admin to user
        ChatMessage::create([
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'message' => 'Unread message',
            'is_read' => false,
        ]);

        $this->actingAs($this->user);

        Livewire::test('ChatMessages', ['record' => $this->chatRoom])
            ->call('loadMessages');

        $this->assertDatabaseHas('chat_messages', [
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->admin->id,
            'receiver_id' => $this->user->id,
            'is_read' => true,
        ]);
    }

    /** @test */
    public function chat_room_is_created_for_new_user()
    {
        $newUser = User::factory()->create(['usertype' => 'user']);
        
        $this->actingAs($newUser);

        Livewire::test('FloatingChat')
            ->assertSet('chatRoom.user_id', $newUser->id);
    }

    /** @test */
    public function admin_can_see_active_chat_rooms()
    {
        $this->actingAs($this->admin);

        // Create multiple chat rooms
        ChatRoom::factory()->count(3)->create([
            'is_active' => true,
        ]);

        Livewire::test('FloatingChat')
            ->assertSet('chatRoom.is_active', true);
    }

    /** @test */
    public function empty_messages_cannot_be_sent()
    {
        $this->actingAs($this->user);

        Livewire::test('ChatMessages', ['record' => $this->chatRoom])
            ->set('newMessage', '')
            ->call('sendMessage');

        $this->assertDatabaseMissing('chat_messages', [
            'chat_room_id' => $this->chatRoom->id,
            'sender_id' => $this->user->id,
            'message' => '',
        ]);

        Event::assertNotDispatched(NewChatMessage::class);
    }

    /** @test */
    public function chat_room_is_activated_when_message_is_sent()
    {
        // Create an inactive chat room
        $inactiveChatRoom = ChatRoom::create([
            'user_id' => $this->user->id,
            'name' => 'Inactive Chat',
            'is_active' => false,
        ]);

        $this->actingAs($this->user);

        Livewire::test('ChatMessages', ['record' => $inactiveChatRoom])
            ->set('newMessage', 'Activate chat')
            ->call('sendMessage');

        $this->assertDatabaseHas('chat_rooms', [
            'id' => $inactiveChatRoom->id,
            'is_active' => true,
        ]);

        Event::assertDispatched(NewChatMessage::class);
    }
}
