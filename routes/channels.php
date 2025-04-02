<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{chatRoomId}', function ($user, $chatRoomId) {
    // Check if user has access to this chat room
    $chatRoom = \App\Models\ChatRoom::find($chatRoomId);
    if (!$chatRoom) {
        return false;
    }
    
    // Allow access if user is the chat room owner or an admin
    return $user->id === $chatRoom->user_id || $user->usertype === 'admin';
});

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

// Remove unused channels
// Broadcast::channel('chat-channel.{receiverId}', function (User $user, $receiverId) {
//     return (int) $user->id === (int) $receiverId;
// });

Broadcast::channel('unread-channel.{receiverId}', function ($user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});