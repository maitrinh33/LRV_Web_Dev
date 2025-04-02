<x-filament-panels::page>
    <div class="flex flex-col h-[calc(100vh-12rem)]">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-4">
                @if($record->user->profile_photo_path)
                    <img src="{{ Storage::url($record->user->profile_photo_path) }}" alt="{{ $record->user->name }}" class="h-10 w-10 rounded-full">
                @else
                    <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">{{ substr($record->user->name, 0, 1) }}</span>
                    </div>
                @endif
                <div>
                    <h2 class="text-lg font-medium">{{ $record->user->name }}</h2>
                    <p class="text-sm text-gray-500">{{ $record->user->email }}</p>
                </div>
            </div>
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-500">
                    Last message: {{ $record->last_message_at?->diffForHumans() ?? 'No messages yet' }}
                </span>
            </div>
        </div>

        <div class="flex-1 bg-white rounded-lg shadow overflow-hidden">
            <livewire:chat-messages :chatRoom="$record" />
        </div>
    </div>
</x-filament-panels::page> 