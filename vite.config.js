import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/sass/admin.scss",
                "resources/js/app.js",
                "resources/js/menu.js",
                "resources/js/reserveringen.js",
                "resources/css/tailwind.css",
            ],
            refresh: true,
        }),
    ],
});
