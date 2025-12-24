import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // Tambahkan blok server ini
    server: {
        host: 'localhost',
        port: 8000,
        strictPort: true,
        hmr: {
            host: 'localhost',
        },
    },
});