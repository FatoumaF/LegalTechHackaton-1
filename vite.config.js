import { defineConfig } from 'vite';
import symfonyPlugin from 'vite-plugin-symfony';

export default defineConfig({
    plugins: [symfonyPlugin()],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                app: 'assets/app.js', // Assurez-vous que ce chemin est correct
            },
        },
    },
});
