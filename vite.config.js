import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
        },
    },
    define: {
        'process.env': {},
        'import.meta.env': process.env,
    },
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['laravel-echo', 'pusher-js'],
                }
            }
        }
    }
});
