// Include gulp
var gulp = require('gulp');

// Include the Plugins
var rollup = require('rollup').rollup;
var babel = require('rollup-plugin-babel');
var uglify = require('rollup-plugin-uglify');
var commonjs = require('rollup-plugin-commonjs');
var nodeResolve = require('rollup-plugin-node-resolve');

var sass = require('gulp-sass');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var cleanCSS = require('gulp-clean-css');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');
var reload      = browserSync.reload;

// Start Up browser-sync
gulp.task('browser-sync', function() {
  var files = [
    'dist/css/*.css',
    'dist/js/*.js',
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
  return rollup({
      entry: 'assets/js/scripts.js',
      plugins: [
        babel({
          babelrc: false,
          presets: ["es2015-rollup"],
          exclude: 'node_modules/**/**'
        }),
        nodeResolve({
          jsnext: true,
          main: true
        }),
        commonjs({
          include: 'node_modules/**/**',
        }),
        uglify()
      ]
      }).then(function (bundle) {
  return bundle.write({
      format: 'iife',
      dest: 'dist/js/scripts.min.js',
      sourceMap: true
      });
      (browserSync.reload({stream:true}));
    });
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
