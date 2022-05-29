import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'vite-plugin-laravel'
import tailwindcss from 'tailwindcss'
import autoprefixer from 'autoprefixer'
import { resolve } from 'path'

export default defineConfig({
  server: {
    host: '0.0.0.0',
    cors: true,
  },
  resolve: {
    alias: {
      '@': resolve(__dirname, './resources/js'),
      '@components': resolve(__dirname, './resources/js/components'),
      '@assets': resolve(__dirname, './resources/assets'),
      '@api': resolve(__dirname, './resources/js/api'),
      '@layouts': resolve(__dirname, './resources/js/Layouts'),
      '@pages': resolve(__dirname, './resources/js/Pages'),
    },
  },
  plugins: [
    vue(),
    laravel({
      postcss: [tailwindcss(), autoprefixer()],
    }),
  ],
})
