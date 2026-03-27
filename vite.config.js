import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/css/news.css",
                "resources/css/newsDetail.css",
                "resources/css/adminLogin.css",
                "resources/css/adminDashboard.css",
                "resources/css/adminProjectView.css",
                "resources/css/adminProjectForm.css",
                "resources/css/projectDetail.css",
                "resources/css/project.css",
                "resources/css/productDetail.css",
                "resources/css/product.css",
                "resources/css/contact.css",
                "resources/css/landingPageSection7.css",
                "resources/js/app.js",
                "resources/js/owl.js",
                "resources/js/news.js",
                "resources/js/newsDetail.js",
                "resources/js/newsEditor.js",
                "resources/js/admin-document.js",
                "resources/js/landingPageSection7.js",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ["**/storage/framework/views/**"],
        },
    },
});
