@push('scripts')
<script>
    document.addEventListener('livewire:initialized', function () {
        Livewire.on('message-sent', () => {
            scrollToBottom();
        });

        Livewire.on('messages-updated', () => {
            scrollToBottom();
        });

        function scrollToBottom() {
            const chatContainer = document.getElementById('chat-messages');
            if (chatContainer) {
                chatContainer.scrollTop = chatContainer.scrollHeight;
            }
        }

        // Initial scroll to bottom
        scrollToBottom();
    });
</script>
@endpush 