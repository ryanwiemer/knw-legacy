// Include gulp
var gulp = require('gulp');

// Include the Plugins

var webpack = require('webpack');
var gulpWebpack = require('webpack-stream');
var sourcemaps = require('gulp-sourcemaps');
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
    'src/fonts/*')
    .pipe(gulp.dest('dist/fonts/'));
});

// Move Image Files
gulp.task ('move-images', function() {
  return gulp.src(
    'src/img/*')
    .pipe(gulp.dest('dist/img/'));
});

// Compile JS and Uglify
gulp.task('js', function() {
  return gulp.src('src/js/scripts.js')
    .pipe(gulpWebpack({
      watch: true,
      output: {
        filename: 'scripts.min.js',
      },
      plugins: [new webpack.optimize.UglifyJsPlugin({
        compress: {
          warnings: false
        }
      })],
      module: {
        loaders: [
          {
            test: /\.(eot|ico|ttf|woff|woff2|gif|jpe?g|png|svg)$/,
            exclude: /node_modules/,
            loader: 'file-loader'
          },
          {
            test: /\.js$/,
            exclude: /node_modules/,
            loader: 'babel?presets[]=es2015,cacheDirectory'
          }
        ]
      },
      devtool: 'source-map'
      }, webpack))
    .pipe(gulp.dest('dist/js/'))
    .pipe(browserSync.reload({stream:true}));
});

// Compile Sass & Minify CSS
gulp.task('sass', function() {
  gulp.src(['src/scss/style.scss'])
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
  gulp.watch('src/scss/*/*.scss', ['sass'])
  gulp.watch('src/js/*/*.js', ['js'])
  gulp.watch('.php').on('change', reload);
});

// Default Task
gulp.task('default', ['sass','js','browser-sync','watch']);
gulp.task('build', ['move-fonts','move-images']);
