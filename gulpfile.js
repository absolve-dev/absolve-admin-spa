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
  mix.scripts("lib/**/*.js", "public/js/lib.js");
  mix.scripts("site/**/*.js", "public/js/site.js");
  mix.scripts([
    "../angular/**/*.mdl.js",
    "../angular/**/*.js"
  ], "public/js/angular.dist.js");
  mix.sass("site/**/*.scss", "public/css/site.css");
  mix.copy("resources/assets/angular/**/*.tpl.html", "public/html/angular");
  mix.version([
    "js/lib.js",
    "js/site.js",
    "js/angular.dist.js",
    "css/site.css"
  ]);
});
