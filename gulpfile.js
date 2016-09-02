var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir.config.sourcemaps = false;

elixir(function(mix) {
  //mix.sass("lib/**/*.css", "public/css/lib.css");
  mix.scripts("lib/**/*.js", "public/js/lib.js")
    .scripts("site/**/*.js", "public/js/site.js")
    .scripts([
      "../angular/**/*.mdl.js",
      "../angular/**/*.js"
    ], "public/js/angular.dist.js")
    .sass([
      "site/lib/**/*.css",
      "site/**/*.scss"
    ], "public/css/site.css")
    .copy("resources/assets/angular/**/*.tpl.html", "public/html/angular")
    .version([
      "js/lib.js",
      "js/site.js",
      "js/angular.dist.js",
      "css/site.css"
    ]);
});
