let mix = require("laravel-mix");


mix.js("resources/js/app.js", "public/js")
    .react()
    .postCss("resources/css/app.css", "public/css", [
        require("postcss-import"),
        require("tailwindcss"),
        require("autoprefixer"),
    ])
    .alias({
        "@": "resources/js",
    });
mix.sass('resources/sass/style.scss', 'public/css');

if (mix.inProduction()) {
    mix.version();
}