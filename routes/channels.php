<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{chatRoomId}', function ($user, $chatRoomId) {
    return true; // Or add your authorization logic here
});

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

Broadcast::channel('chat-channel.{receiverId}', function (User $user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});

Broadcast::channel('unread-channel.{receiverId}', function (User $user, $receiverId) {
    return (int) $user->id === (int) $receiverId;
});