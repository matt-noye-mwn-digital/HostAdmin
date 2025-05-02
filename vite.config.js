import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/sass/admin.scss',
                'resources/js/app.js',
                'resources/js/admin.js',
            ],
            refresh: [
                'resources/sass/**/*.scss',
                'resources/views/**/*.blade.php',
                'resources/js/**/*.js',
            ],

        }),

    ],
});
