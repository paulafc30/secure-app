import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    // Carga las variables de entorno del archivo .env
    const env = loadEnv(mode, process.cwd());

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        // Expone la variable al front-end
        define: {
            'import.meta.env.VITE_APP_URL': JSON.stringify(env.APP_URL),
        },
        // Usa la URL de la aplicación como base
        base: env.APP_URL + '/build/'
    };
});