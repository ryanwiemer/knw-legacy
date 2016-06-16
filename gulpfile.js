// Include gulp
var gulp = require('gulp');

// Include the Plugins
var sass = require('gulp-sass');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifycss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

gulp.task('browser-sync', function() {
  //watch files
  var files = [
    'assets/css/*.css',
    'assets/js/*.js',
    '*.php'
  ];
  //initialize browsersync
  browserSync.init(files, {
  //browsersync with a php server
  proxy: "knw.dev",
  notify: false,
  open: false
  });
});

// Move and Minfiy Scripts from Bower
gulp.task ('move', function() {
  return gulp.src([
    'bower_components/jquery/dist/jquery.min.js',
    'bower_components/jquery-form/jquery.form.js',
    'bower_components/jquery-validate/dist/jquery.validate.min.js',
    'bower_components/slick.js/slick/slick.min.js',
    'bower_components/datepicker-fr/ui/datepicker.js',
    'bower_components/headroom.js/dist/headroom.min.js',
    'bower_components/responsive-nav/responsive-nav.min.js'])
    //'bower_components/infinite-ajax-scroll/src/jquery-ias.js'
    .pipe(gulp.dest('assets/js/vendor/'));
});

// Concat JS
gulp.task('concat', function() {
  gulp.src(['assets/js/vendor/jquery.min.js','assets/js/vendor/responsive-nav.min.js','assets/js/vendor/headroom.min.js','assets/js/scripts/menu--settings.js','assets/js/scripts/loading--settings.js','assets/js/scripts/scroll--settings.js'])
  .pipe(concat('global.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets/js/'));
  gulp.src(['assets/js/vendor/datepicker.js','assets/js/scripts/jquery.datepicker.settings.js','assets/js/vendor/jquery.form.js','assets/js/scripts/jquery.form.settings.js','assets/js/vendor/jquery.validate.min.js'])
  .pipe(concat('contact.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets/js/'));
  gulp.src(['assets/js/vendor/slick.min.js','assets/js/scripts/slick--settings.js'])
  .pipe(concat('slider.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets/js/'));
  gulp.src(['assets/js/vendor/jquery-ias.min.js','assets/js/scripts/jquery-ias--settings.js'])
  .pipe(concat('gallery.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets/js/'));
  gulp.src(['assets/js/scripts/backtop--settings.js','assets/js/vendor/baguetteBox.min.js','assets/js/scripts/baguetteBox--settings.js'])
  .pipe(concat('single.min.js'))
  .pipe(uglify())
  .pipe(gulp.dest('assets/js/'));
});

// Compile Sass & Minify CSS
gulp.task('sass', function() {
  gulp.src(['assets/scss/style.scss'])
  .pipe(sass({
    includePaths: require('node-neat').includePaths
  }))
  .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1'))
  .pipe(minifycss())
  .pipe(rename({ suffix: '.min' }))
  .pipe(gulp.dest('assets/css/'))
  .pipe(browserSync.reload({stream:true}));
});

// Watch Files For Changes
gulp.task('watch', function() {
  gulp.watch('assets/scss/*/*.scss', ['sass'])
  gulp.watch('assets/js/*/*.js', ['concat'])
  gulp.watch('.php').on('change', reload);
});

// Default Task
gulp.task('default', ['sass','concat', 'browser-sync','watch']);
