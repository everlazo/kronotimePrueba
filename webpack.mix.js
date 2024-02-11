const mix = require('laravel-mix');

mix
    .js('resourses/js/app.js', 'public/js')    
    .js('resourses/js/swagger.js', 'public/js')