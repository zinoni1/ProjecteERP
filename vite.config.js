import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

const customHost = '0.0.0.0'; // Tu host personalizado para que sea accesible desde fuera
const defaultPort = 5173; // Puerto por defecto de Vite

export default defineConfig({
    server: {
        host: customHost,
        port: defaultPort,
        origin: `http://127.0.0.1:${defaultPort}`,
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});