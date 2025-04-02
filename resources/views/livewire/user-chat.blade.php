<!-- Chat Container -->
<div class="flex flex-col h-full">
    <!-- Header -->
    <div class="bg-transparent w-full sm:px-6 lg:px-60 py-8">
        <div class="bg-white rounded-t-lg p-4">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Chat with Admin
                </h2>

                {{-- Search Input --}}
                <div class="relative w-1/3">
                    <input type="text" wire:model.live="search" placeholder="Search Messages..."
                        class="pl-10 pr-16 py-2 border rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-400">

                    {{-- Search Icon (Left) --}}
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </span>

                    {{-- Clear Button --}}
                    @if (!empty($search))
                        <button type="button" wire:click="resetSearch"
                            class="absolute right-20 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="red" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>

                        <!-- Navigation Icons (Right) -->
                        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 flex space-x-2">
                            {{-- Arrow up --}}
                            <button type="button" wire:click="prevMatch" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                </svg>
                            </button>

                            {{-- Arrow down --}}
                            <button type="button" wire:click="nextMatch" class="text-gray-500 hover:text-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Messages Container -->
            <div id="chat-messages"
                class="bg-white overflow-hidden border border-gray-300 mb-15 overflow-y-auto h-[calc(100vh-12rem)] scroll-smooth"
                wire:poll.3s="loadMessages">
                <div class="w-full px-5 py-8 grow" id="message-list">
                    @foreach($messages as $index => $message)
                        <div id="message-{{ $index }}" wire:key="message-{{ $message['id'] }}">
                            @if($message['sender_id'] !== Auth::id())
                                {{-- Receiver Message --}}
                                <div class="grid pb-3">
                                    <div class="flex gap-2.5">
                                        <img src="https://pagedone.io/asset/uploads/1710412177.png" alt="Admin image"
                                            class="w-10 h-11">
                                        <div class="grid">
                                            <h5 class="text-gray-900 text-sm font-semibold leading-snug pb-1">
                                                Admin
                                            </h5>
                                            <div class="w-max grid">
                                                @if(!empty($message['message']))
                                                    <div class="px-3.5 py-2 bg-gray-100 rounded-3xl rounded-tl-none justify-start items-center gap-3 inline-flex">
                                                        <h5 class="text-gray-900 text-sm font-normal leading-snug">
                                                            {!! $search ? $this->highlightText($message['message'], $search) : e($message['message']) !!}
                                                        </h5>
                                                    </div>
                                                @elseif(!empty($message['file_path']))
                                                    <div>
                                                        @php
                                                            $imgType = str_starts_with($message['file_type'], 'image/');
                                                        @endphp
                                                        @if($imgType)
                                                            <a href="{{ Storage::url($message['file_path']) }}" target="_blank">
                                                                <img src="{{ Storage::url($message['file_path']) }}"
                                                                    alt="file"
                                                                    class="w-12 h-12 rounded-lg object-cover border border-gray-300 shadow-md" />
                                                            </a>
                                                        @else
                                                            <a class="flex items-center justify-between bg-gray-200 px-3 py-2 rounded"
                                                                download
                                                                href="{{ Storage::url($message['file_path']) }}">
                                                                <svg class="cursor-pointer"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    width="22" height="22"
                                                                    viewBox="0 0 22 22" fill="none">
                                                                    <g id="Attach 01">
                                                                        <g id="Vector">
                                                                            <path d="M14.9332 7.79175L8.77551 14.323C8.23854 14.8925 7.36794 14.8926 6.83097 14.323C6.294 13.7535 6.294 12.83 6.83097 12.2605L12.9887 5.72925M12.3423 6.41676L13.6387 5.04176C14.7126 3.90267 16.4538 3.90267 17.5277 5.04176C18.6017 6.18085 18.6017 8.02767 17.5277 9.16676L16.2314 10.5418M16.8778 9.85425L10.72 16.3855C9.10912 18.0941 6.49732 18.0941 4.88641 16.3855C3.27549 14.6769 3.27549 11.9066 4.88641 10.198L11.0441 3.66675"
                                                                                stroke="black" stroke-width="1.6"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" />
                                                                        </g>
                                                                    </g>
                                                                </svg>
                                                                <span class="w-full max-w-64">{{ $message['file_name'] }}</span>
                                                            </a>
                                                        @endif
                                                    </div>
                                                @endif
                                                <div class="justify-end items-center inline-flex mb-2.5">
                                                    <h6 class="text-gray-500 text-xs font-normal leading-4 py-1">
                                                        {{ \Carbon\Carbon::parse($message['created_at'])->format('g:i A') }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{-- Sender Message --}}
                                <div class="flex gap-2.5 justify-end pb-3">
                                    <div class="">
                                        <div class="grid mb-2">
                                            <h5 class="text-right text-gray-900 text-sm font-semibold leading-snug pb-1">
                                                You
                                            </h5>
                                            @if(!empty($message['message']))
                                                <div class="px-3 py-2 bg-orange-700 rounded-3xl rounded-tr-none">
                                                    <h2 class="text-white text-sm font-normal leading-snug">
                                                        {!! $search ? $this->highlightText($message['message'], $search) : e($message['message']) !!}
                                                    </h2>
                                                </div>
                                            @elseif(!empty($message['file_path']))
                                                <div>
                                                    @php
                                                        $imgType = str_starts_with($message['file_type'], 'image/');
                                                    @endphp
                                                    @if($imgType)
                                                        <a href="{{ Storage::url($message['file_path']) }}" target="_blank">
                                                            <img src="{{ Storage::url($message['file_path']) }}"
                                                                alt="file"
                                                                class="w-12 h-12 rounded-lg object-cover border border-gray-300 shadow-md" />
                                                        </a>
                                                    @else
                                                        <a class="flex items-center justify-between bg-indigo-600 px-3 py-2 rounded text-white"
                                                            download
                                                            href="{{ Storage::url($message['file_path']) }}">
                                                            <svg class="cursor-pointer"
                                                                xmlns="http://www.w3.org/2000/svg" width="22"
                                                                height="22" viewBox="0 0 22 22"
                                                                fill="none">
                                                                <g id="Attach 01">
                                                                    <g id="Vector">
                                                                        <path d="M14.9332 7.79175L8.77551 14.323C8.23854 14.8925 7.36794 14.8926 6.83097 14.323C6.294 13.7535 6.294 12.83 6.83097 12.2605L12.9887 5.72925M12.3423 6.41676L13.6387 5.04176C14.7126 3.90267 16.4538 3.90267 17.5277 5.04176C18.6017 6.18085 18.6017 8.02767 17.5277 9.16676L16.2314 10.5418M16.8778 9.85425L10.72 16.3855C9.10912 18.0941 6.49732 18.0941 4.88641 16.3855C3.27549 14.6769 3.27549 11.9066 4.88641 10.198L11.0441 3.66675"
                                                                            stroke="white" stroke-width="1.6"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" />
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <span class="w-full max-w-64">{{ $message['file_name'] }}</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="justify-end items-center inline-flex mb-2.5">
                                                <h6 class="text-gray-500 text-xs font-normal leading-4 py-1">
                                                    {{ \Carbon\Carbon::parse($message['created_at'])->format('g:i A') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

        <!-- Message Input -->
        <div class="bg-white rounded-b-lg border-gray-200 p-4">
            <form wire:submit="sendMessage" class="flex items-center space-x-4">
                @csrf
                <div class="flex-1">
                    <input
                        wire:model="data.message"
                        type="text"
                        placeholder="Type a message..."
                        class="w-full rounded-full border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"
                        required
                    />
                    @error('data.message') <span class="text-sm text-danger-600">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="cursor-pointer">
                        <input type="file" wire:model="file" class="hidden">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                        </svg>
                    </label>
                </div>
                <button type="submit" class="items-center flex px-3 py-3 bg-orange-600 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <g id="Send 01">
                          <path id="icon" d="M9.04071 6.959L6.54227 9.45744M6.89902 10.0724L7.03391 10.3054C8.31034 12.5102 8.94855 13.6125 9.80584 13.5252C10.6631 13.4379 11.0659 12.2295 11.8715 9.81261L13.0272 6.34566C13.7631 4.13794 14.1311 3.03408 13.5484 2.45139C12.9657 1.8687 11.8618 2.23666 9.65409 2.97257L6.18714 4.12822C3.77029 4.93383 2.56187 5.33664 2.47454 6.19392C2.38721 7.0512 3.48957 7.68941 5.69431 8.96584L5.92731 9.10074C6.23326 9.27786 6.38623 9.36643 6.50978 9.48998C6.63333 9.61352 6.72189 9.7665 6.89902 10.0724Z" stroke="white" stroke-width="1.6" stroke-linecap="round" />
                        </g>
                    </svg>
                    <h3 class="text-white text-xs quicksand font-semibold leading-4 px-2">Send</h3>
                </button>
            </form>
        </div>
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
        Livewire.on('message-sent', () => {
            scrollToBottom();
        });

        // Listen for messages-updated event
        Livewire.on('messages-updated', () => {
            scrollToBottom();
        });

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

        // Add a mutation observer to scroll to bottom when new messages are added
        const chatContainer = document.getElementById('chat-messages');
        if (chatContainer) {
            const observer = new MutationObserver(scrollToBottom);
            observer.observe(chatContainer, { childList: true, subtree: true });
        }
    });
</script>
@endpush 