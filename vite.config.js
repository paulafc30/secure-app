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
        // Expone la variable de entorno APP_URL al front-end
        define: {
            'import.meta.env.VITE_APP_URL': JSON.stringify(env.APP_URL),
        },
        // Añade la configuración para que Vite sirva los archivos estáticos correctamente
        build: {
            // Especifica el directorio de salida para los archivos compilados
            outDir: 'public/build',
            // Deshabilita el manifiesto para evitar problemas con la ruta de los assets
            manifest: false,
            rollupOptions: {
                output: {
                    entryFileNames: 'assets/[name].js',
                    chunkFileNames: 'assets/[name].js',
                    assetFileNames: 'assets/[name].[ext]',
                },
            },
        },
        // Configura la base para que apunte a la ruta pública de los activos
        base: env.APP_URL + '/',
    };
});