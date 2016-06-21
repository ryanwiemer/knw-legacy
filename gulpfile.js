// Include gulp
var gulp = require('gulp');

// Include the Plugins
var rollup = require('rollup-stream');
var babel = require('gulp-babel');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var sass = require('gulp-sass');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

// Start Up browser-sync
gulp.task('browser-sync', function() {
  var files = [
    'assets/css/*.css',
    'assets/js/*.js',
    '*.php'
  ];
  browserSync.init(files, {
    proxy: "knw.dev",
    notify: false,
    open: false
  });
});

// Move Font Icons
gulp.task ('move-fonts', function() {
  return gulp.src(
    'assets/fonts/*')
    .pipe(gulp.dest('dist/fonts/'));
});

// Move Image Files
gulp.task ('move-images', function() {
  return gulp.src(
    'assets/img/*')
    .pipe(gulp.dest('dist/img/'));
});

// Move JS Scripts
gulp.task ('move-js', function() {
  return gulp.src([
    'node_modules/jquery/dist/jquery.js',
    'node_modules/jquery-form/jquery.form.js',
    'node_modules/jquery-validate/dist/jquery.validate.js',
    'node_modules/slick-carousel/slick/slick.js',
    'node_modules/headroom.js/dist/headroom.js',
    'node_modules/baguettebox.js/dist/baguettebox.min.js',
    'node_modules/responsive-nav/responsive-nav.js'])
    //'bower_components/infinite-ajax-scroll/src/jquery-ias.js'
    //'bower_components/datepicker-fr/ui/datepicker.js'
    .pipe(gulp.dest('assets/js/vendor/'));
});

// Compile JS and Uglify
gulp.task('js', function() {
  return rollup({entry: 'assets/js/scripts.js'})
  .pipe(source('scripts.js'))
  .pipe(buffer())
  .pipe(babel())
  .pipe(uglify())
  .pipe(rename({ suffix: '.min' }))
  .pipe(gulp.dest('dist/js/'))
  .pipe(browserSync.reload({stream:true}));
});

// Compile Sass & Minify CSS
gulp.task('sass', function() {
  gulp.src(['assets/scss/style.scss'])
  .pipe(sass({
    includePaths: require('node-neat').includePaths
  }))
  .pipe(autoprefixer('last 2 version'))
  .pipe(cleanCSS())
  .pipe(rename({ suffix: '.min' }))
  .pipe(gulp.dest('dist/css/'))
  .pipe(browserSync.reload({stream:true}));
});

// Watch Files For Changes
gulp.task('watch', function() {
  gulp.watch('assets/scss/*/*.scss', ['sass'])
  gulp.watch('assets/js/*/*.js', ['js'])
  gulp.watch('.php').on('change', reload);
});

// Default Task
gulp.task('default', ['sass','js','browser-sync','watch']);
gulp.task('build', ['move-fonts','move-images']);
