import { defineConfig } from 'vite';
import { resolve } from 'path';
export default defineConfig(({ mode }) => {
	const DEV = mode === 'development';

	return {
		publicDir: './www/static',
		resolve: {
			alias: {
				'@': resolve(__dirname, 'assets/js'),
				'~': resolve(__dirname, 'node_modules'),
			},
		},
		base: '/www',
		server: {
			open: false,
			hmr: false,
		},
		build: {
			manifest: true,
			outDir: './www/static/',
			emptyOutDir: false,
			chunkSizeWarningLimit: 1500,
			minify: DEV ? false : 'esbuild',
			rollupOptions: {
				output: {
					manualChunks: undefined,
					chunkFileNames: DEV ? '[name].js' : '[name].js',
					entryFileNames: DEV ? '[name].js' : '[name].js',
					assetFileNames: DEV ? '[name].[ext]' : '[name].[ext]',
				},
				input: {
					app: './assets/js/app.js'
				}
			}
		},
	}
});

