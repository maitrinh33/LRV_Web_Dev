@php
    use Illuminate\Support\Facades\Auth;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Components\FileUpload;
    use Filament\Forms\Form;
@endphp

<div class="flex flex-col h-full">
    <!-- Search Bar -->
    <div class="border-b border-gray-200 p-4 bg-white">
        <div class="relative">
            <x-filament::input.wrapper>
                <div class="flex items-center">
                    <x-heroicon-o-magnifying-glass class="w-5 h-5 text-gray-400 mr-2" />
                    <x-filament::input
                        wire:model.live="search"
                        wire:keydown.enter="searchMessages"
                        type="text"
                        placeholder="Search Messages..."
                        class="w-full {{ !empty($search) ? 'pr-32' : '' }}"
                    />
                </div>
            </x-filament::input.wrapper>

            @if (!empty($search))
                <!-- Navigation Icons (Right) -->
                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex items-center space-x-1">
                    {{-- Arrow up --}}
                    <x-filament::button
                        type="button"
                        wire:click="prevMatch"
                        color="gray"
                        size="sm"
                        class="!p-1"
                    >
                        <x-heroicon-o-arrow-up class="w-4 h-4" />
                    </x-filament::button>

                    {{-- Arrow down --}}
                    <x-filament::button
                        type="button"
                        wire:click="nextMatch"
                        color="gray"
                        size="sm"
                        class="!p-1"
                    >
                        <x-heroicon-o-arrow-down class="w-4 h-4" />
                    </x-filament::button>

                    {{-- Clear Button --}}
                    <x-filament::button
                        type="button"
                        wire:click="resetSearch"
                        color="danger"
                        size="sm"
                        class="!p-1"
                    >
                        <x-heroicon-o-x-mark class="w-4 h-4" />
                    </x-filament::button>
                </div>
            @endif
        </div>
    </div>

    <!-- Messages List -->
    <div class="flex-1 overflow-y-auto p-4 space-y-4 min-h-0" id="chat-messages" wire:key="chat-messages">
        @foreach($messages as $index => $message)
            <div id="message-{{ $index }}" class="{{ $message['sender_id'] === Auth::id() ? 'text-right' : 'text-left' }}" wire:key="message-{{ $message['id'] }}">
                <div class="inline-block {{ $message['sender_id'] === Auth::id() ? 'bg-primary-500 text-white' : 'bg-gray-100 text-gray-900' }} rounded-lg px-4 py-2">
                    @if(!empty($message['file_path']))
                        <div class="mb-2">
                            <a href="{{ Storage::url($message['file_path']) }}" target="_blank" class="text-sm text-primary-600 hover:text-primary-500">
                                {{ $message['file_name'] }}
                            </a>
                        </div>
                    @endif
                    <p class="text-sm">{!! $search ? $this->highlightText($message['message'], $search) : e($message['message']) !!}</p>
                    <p class="text-xs mt-1 opacity-75">{{ \Carbon\Carbon::parse($message['created_at'])->format('g:i A') }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Message Input -->
    <div class="border-t border-gray-200 p-4 bg-white">
        <form wire:submit="sendMessage" class="flex items-center space-x-4">
            @csrf
            <div class="flex-1">
                <x-filament::input.wrapper>
                    <x-filament::input
                        wire:model="data.message"
                        type="text"
                        placeholder="Type a message..."
                        class="w-full"
                        required
                    />
                </x-filament::input.wrapper>
                @error('data.message') <span class="text-sm text-danger-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <x-filament::button
                    tag="label"
                    color="gray"
                    class="cursor-pointer"
                >
                    <input type="file" wire:model="file" class="hidden">
                    <x-heroicon-o-paper-clip class="w-5 h-5" />
                </x-filament::button>
            </div>
            <x-filament::button
                type="submit"
                color="primary"
            >
                Send
            </x-filament::button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:initialized', function () {
        // Function to scroll to bottom
        function scrollToBottom() {
            const chatContainer = document.getElementById('chat-messages');
            if (chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
                // Add a small delay to ensure content is rendered
                setTimeout(() => {
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }, 100);
            }
        }

        // Listen for message events
        Livewire.on('message-sent', scrollToBottom);
        Livewire.on('messages-updated', scrollToBottom);

        // Listen for search navigation
        Livewire.on('scroll-to-message', (event) => {
            const messageElement = document.getElementById(`message-${event.index}`);
            if (messageElement) {
                messageElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        });

        // Initial scroll to bottom
        scrollToBottom();
    });
</script>
@endpush

