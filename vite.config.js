import { defineConfig } from 'vite';
import symfonyPlugin from 'vite-plugin-symfony';


export default defineConfig({
    plugins: [
        symfonyPlugin(),
    ],
    root: './assets',
    build: {
        outDir: '../public/build',
        rollupOptions: {
            input: {
                app: './app.js',
            },
        },
    },
    server: {
        port: 3000,
        hot: true,
    },
});
