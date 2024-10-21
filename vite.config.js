import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
<<<<<<< HEAD
});
=======
});
>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
