import './bootstrap';
import echo from './echo';

// Import components
import './components/menu.js';
import './components/search.js';
import './pages/home.js';

// Make Echo available globally
window.Echo = echo;

// Initialize WebSocket connection
document.addEventListener('DOMContentLoaded', () => {
    if (window.Echo.connector && window.Echo.connector.socket) {
        window.Echo.connector.socket.on('connect', () => {
            console.log('Connected to WebSocket server');
        });

        window.Echo.connector.socket.on('error', (error) => {
            console.error('WebSocket error:', error);
        });
    }
});

