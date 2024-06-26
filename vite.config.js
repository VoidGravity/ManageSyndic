import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs-extra';

const folder = {
    src: "resources/", // source files
    src_assets: "resources/assets/", // source assets files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            output: 'public',
            refresh: true,
        }),
        {
            name: 'copy-specific-packages',
            async writeBundle() {

                try {
                    // Copy images, json, fonts, and js
                    await Promise.all([
                        fs.copy(folder.src_assets + 'fonts', folder.dist_assets + 'fonts'),
                        fs.copy(folder.src_assets + 'images', folder.dist_assets + 'images'),
                        fs.copy(folder.src_assets + 'js', folder.dist_assets + 'js'),
                        fs.copy(folder.src_assets + 'css', folder.dist_assets + 'css'),
                        fs.copy(folder.src_assets + 'libs', folder.dist_assets + 'libs'),
                        fs.copy(folder.src_assets + 'lang', folder.dist_assets + 'lang'),
                        fs.copy(folder.src_assets + 'json', folder.dist_assets + 'json'),
                    ]);
                } catch (error) {
                    console.error('Error copying assets:', error);
                }
            },
        },
    ],
});
