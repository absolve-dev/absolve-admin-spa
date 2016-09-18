var elixir = require('laravel-elixir');

var gulp = require("gulp"),
    concat = require("gulp-concat"),
    sass = require("gulp-sass"),
    minify = require("gulp-minify");

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
  mix.copy("resources/assets/angular/**/*.tpl.html", "public/html/angular")
    .version([
      "js/lib.js",
      "js/site.js",
      "js/angular.dist.js",
      "css/site.css"
    ]);
});

// separate tasks from elixir
// gulp library-js && gulp site-js && gulp angular-js && gulp site-css && gulp

// concat all js libraries
gulp.task("library-js", function(){
  return gulp.src(
    ["resources/assets/js/lib/**/*.js"])
    .pipe(concat("lib.js"))
    .pipe(gulp.dest("public/js"));
});

// concat all site js
gulp.task("site-js", function(){
  return gulp.src(
    ["resources/assets/js/site/**/*.js"])
    .pipe(concat("site.js"))
    .pipe(gulp.dest("public/js"));
});

// concat all site css
gulp.task("site-css", function(){
  return gulp.src(
    [
      "resources/assets/sass/site/lib/**/*.css",
      "resources/assets/sass/site/lib/font-awesome/font-awesome.scss", // custom for FA
      "resources/assets/sass/site/**/*.scss"
    ]).pipe(concat("site.css"))
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest('public/css'));
});

// concat all angular js
gulp.task("angular-js", function(){
  return gulp.src(
    ["resources/assets/angular/**/*.js"])
    .pipe(concat("angular.js"))
    .pipe(minify({
      ext: {
        src: ".src.js",
        min: ".dist.js"
      },
      mangle: false
    })).pipe(gulp.dest("public/js"));
});
