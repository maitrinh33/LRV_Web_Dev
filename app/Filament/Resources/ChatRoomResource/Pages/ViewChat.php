<?php

namespace App\Filament\Resources\ChatRoomResource\Pages;

use App\Filament\Resources\ChatRoomResource;
use Filament\Resources\Pages\Page;
use App\Livewire\ChatMessages;
use App\Models\ChatRoom;
use Illuminate\Contracts\View\View;

class ViewChat extends Page
{
    protected static string $resource = ChatRoomResource::class;

    protected static string $view = 'filament.resources.chat-room-resource.pages.view-chat';

    public ChatRoom $record;

    public function mount(ChatRoom $record): void
    {
        $this->record = $record->load('user');
    }

    public function getTitle(): string
    {
        return "Chat with {$this->record->user->name}";
    }
} 