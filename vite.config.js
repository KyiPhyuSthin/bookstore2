import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/management/app.css', 'resources/js/management/app.js'],
            refresh: true,
        }),
    ],
});
