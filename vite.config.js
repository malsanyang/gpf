import { defineConfig } from 'vite';
import tailwindcss from 'tailwindcss';
import autoprefixer from "autoprefixer";
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx'],
            refresh: true,
            postcss: [
                tailwindcss(),
                autoprefixer(),
            ]
        }),
        react()
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: 'localhost',
        },
    },
});
