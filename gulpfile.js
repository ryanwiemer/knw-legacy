// Include gulp
var gulp = require('gulp');

// Include the Plugins
var webpack = require('webpack-stream');
var nodeExternals = require('webpack-node-externals');
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

// Compile JS and Uglify
gulp.task('js', function() {
  return gulp.src('assets/js/scripts.js')
    .pipe(webpack({
      watch: true,
      target: 'node',
      externals: [nodeExternals()],
      output: {
        filename: 'scripts.min.js',
      },
      module: {
        loaders: [
          {
            test: /\.js$/,
            exclude: /(node_modules|bower_components)/,
            loader: 'babel?presets[]=es2015'
          },
        ],
      },
    }))
    .pipe(babel())
    .pipe(uglify())
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
