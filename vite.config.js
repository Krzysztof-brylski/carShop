import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'node_modules/react-image-gallery/styles/scss/image-gallery.scss',
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],

            refresh: true,
        }),

        react(),
    ],
});
