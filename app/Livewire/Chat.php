<?php
namespace App\Livewire;

use App\Events\MessageSentEvent;
use App\Events\UnreadMessage;
use App\Events\UserTyping;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Events\NewChatMessage;

class Chat extends Component
{
    use WithFileUploads;

    public $user;
    public $senderId;
    public $receiverId;
    public $chatRoomId;
    public $message;
    public $messages = [];
    public $file;
    public $search         = '';
    public $matchedIndexes = [];
    public $currentMatch   = 0;
    public $users = [];

    public function mount($userId = null)
    {
        $this->dispatch('messages-updated');

        $this->senderId = Auth::user()->id;
        $this->receiverId = $userId;

        # Get Users List
        $this->users = User::whereNot('id', $this->senderId)
            ->withCount(['unreadMessages' => function($query) {
                $query->where('sender_id', $this->senderId);
            }])
            ->get();

        if ($userId) {
            # Get User
            $this->user = $this->getUser($userId);

            # Get or Create Chat Room
            $this->chatRoomId = $this->getOrCreateChatRoom();

            # Get Messages
            $this->messages = $this->getMessages();

            # Read Messages
            $this->markMessagesAsRead();
        }
    }

    public function getOrCreateChatRoom()
    {
        $chatRoom = ChatRoom::where(function ($query) {
            $query->where('user_id', $this->senderId)
                ->orWhere('user_id', $this->receiverId);
        })->first();

        if (!$chatRoom) {
            $chatRoom = ChatRoom::create([
                'user_id' => $this->senderId,
                'name' => 'Chat with ' . $this->user->name,
                'is_active' => true,
            ]);
        }

        return $chatRoom->id;
    }

    public function render()
    {
        # Read Messages
        $this->markMessagesAsRead();

        return view('livewire.chat');
    }

    /**
     * Function: getUser
     * @param userId
     * @return App\Models\User
     */
    public function getUser($userId)
    {
        return User::find($userId);
    }

    /**
     * Function: sendMessage
     * @param NA
     * @return
     */
    public function sendMessage()
    {
        if (!$this->receiverId) {
            return;
        }

        if (! $this->message && ! $this->file) {
            return;
        }

        $sentMessage = $this->saveMessage()->load('sender:id,name', 'receiver:id,name');

        // Append the new message manually for the sender's side
        $this->messages[] = $sentMessage;

        # Broadcast New Chat Message Event
        broadcast(new NewChatMessage($sentMessage))->toOthers();

        # Calculate unread messages for the receiver
        $unreadCount = $this->getUnreadMessagesCount();

        # Broadcast unread message count
        broadcast(new UnreadMessage($this->receiverId, $this->senderId, $unreadCount))->toOthers();

        $this->message = null;
        $this->file    = null;

        # Emit the scroll event
        $this->dispatch('messages-updated');
    }

    public function getListeners()
    {
        if (!$this->chatRoomId) {
            return [];
        }
        
        return [
            "echo-private:chat.{$this->chatRoomId},new-message" => 'listenMessage',
            "echo-private:user.{$this->senderId},new-message" => 'listenMessage',
            "echo-private:user.{$this->receiverId},new-message" => 'listenMessage',
        ];
    }

    public function listenMessage($event)
    {
        if ($event['message']['chat_room_id'] === $this->chatRoomId) {
            # Convert the event message array into an Eloquent model with relationships
            $newMessage = ChatMessage::find($event['message']['id'])->load('sender:id,name', 'receiver:id,name');
            $this->messages[] = $newMessage;
        }
    }

    /**
     * Save Message
     * @return
     */
    public function saveMessage()
    {
        $filePath         = null;
        $fileOriginalName = null;
        $fileName         = null;
        $fileType         = null;

        if ($this->file) {
            $fileOriginalName = $this->file->getClientOriginalName();
            $fileName         = $this->file->hashName();
            $filePath         = $this->file->store('chat_files', 'public');
            $fileType         = $this->file->getMimeType();
        }

        return ChatMessage::create([
            'chat_room_id'       => $this->chatRoomId,
            'message'            => $this->message,
            'sender_id'          => $this->senderId,
            'receiver_id'        => $this->receiverId,
            'file_name'          => $fileName,
            'file_name_original' => $fileOriginalName,
            'file_path'          => $filePath,
            'file_type'          => $fileType,
        ]);
    }

    /**
     * Function: getMessages
     * @param
     * @return
     */
    public function getMessages()
    {
        return ChatMessage::with('sender:id,name', 'receiver:id,name')
            ->where('chat_room_id', $this->chatRoomId)
            ->get();
    }

    /**
     * Function: userTyping
     */
    public function userTyping()
    {
        broadcast(new UserTyping($this->senderId, $this->receiverId))->toOthers();
    }

    /**
     * Function: getUnreadMessagesCount
     * @return unreadMessagesCount
     */
    public function getUnreadMessagesCount()
    {
        return ChatMessage::where('receiver_id', $this->receiverId)
            ->where('is_read', false)
            ->count();
    }

    /**
     * Function: markMessagesAsRead
     */
    public function markMessagesAsRead()
    {
        ChatMessage::where('receiver_id', $this->senderId)
            ->where('sender_id', $this->receiverId)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        # Broadcast unread message count
        broadcast(new UnreadMessage($this->senderId, $this->receiverId, 0))->toOthers();
    }

    /**
     * Automatically send file when selected
     */
    public function sendFileMessage()
    {
        if ($this->file) {
            $this->sendMessage();
        }
    }

    /**
     * Function: highlightText
     */
    public function highlightText($text, $search)
    {
        // Escape the search term to safely insert into the regex.
        $escaped = preg_quote($search, '/');
        // Use preg_replace to wrap matched terms in a <mark> tag.
        return preg_replace('/(' . $escaped . ')/i', '<mark>$1</mark>', e($text));
    }

    public function updatedSearch()
    {
        # Reset matches on new search
        $this->matchedIndexes = [];

        if (! empty($this->search)) {
            foreach ($this->messages as $index => $message) {
                if (stripos($message->message, $this->search) !== false) {
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

    /**
     * Function: nextMatch
     */
    public function nextMatch()
    {
        if (count($this->matchedIndexes) > 0) {
            $this->currentMatch = ($this->currentMatch + 1) % count($this->matchedIndexes);
            $this->scrollToMatch();
        }
    }

    /**
     * Function: prevMatch
     */
    public function prevMatch()
    {
        if (count($this->matchedIndexes) > 0) {
            $this->currentMatch = ($this->currentMatch - 1 + count($this->matchedIndexes)) % count($this->matchedIndexes);
            $this->scrollToMatch();
        }
    }

    /**
     * Function: scrollToMatch
     */
    public function scrollToMatch()
    {
        $index = $this->matchedIndexes[$this->currentMatch] ?? null;

        if (! is_null($index)) {
            $this->dispatch('scroll-to-message', index: $index);
        }
    }

    /**
     * Function: resetSearch
     */
    public function resetSearch()
    {
        $this->search         = '';
        $this->matchedIndexes = [];
        $this->currentMatch   = -1;

        # Scroll to latest message
        $this->dispatch('messages-updated');
    }
}