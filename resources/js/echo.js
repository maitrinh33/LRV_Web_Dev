import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT || 6001,
    wssPort: import.meta.env.VITE_REVERB_PORT || 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME || 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    disableStats: true,
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    }
});

// Initialize WebSocket connection
if (echo.connector && echo.connector.socket) {
    echo.connector.socket.on('connect', () => {
        console.log('Connected to WebSocket server');
    });

    echo.connector.socket.on('error', (error) => {
        console.error('WebSocket error:', error);
    });

    echo.connector.socket.on('disconnect', () => {
        console.log('Disconnected from WebSocket server');
    });
}

export default echo;