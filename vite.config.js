import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: 'resources/js/app.jsx',
      ssr: 'resources/js/ssr.jsx',
      refresh: true,
    }),
    react(),
  ],
  resolve: {
    alias: {
      '@inertiajs/inertia-react': path.resolve(__dirname, 'node_modules/@inertiajs/inertia-react/dist/index.js'),
    },
  },
});
