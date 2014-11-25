// Include gulp
var gulp = require('gulp');

// Include the Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var bourbon = require('node-bourbon');
var neat = require('node-neat');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var minifycss = require('gulp-minify-css');
var notify = require ('gulp-notify');
var lr = require('tiny-lr');
var livereload = require('gulp-livereload');


// Move and Minfiy Scripts from Bower
gulp.task ('move', function() {
    return gulp.src([
        'bower_components/jquery/dist/jquery.js',
        'bower_components/jquery-form/jquery.form.js',
        'bower_components/jquery-validate/dist/jquery.validate.js',
        'bower_components/fastclick/lib/fastclick.js',
        'bower_components/Swipe/swipe.js',
        'bower_components/jquery-ias/src/jquery-ias.js'])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/js/'));
});


// Concatenate, Lint and Minify JS
gulp.task('scripts', function() {
    return gulp.src(['assets/js/scripts/*.js'])
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/js/'))
        .pipe(livereload());
});

// Compile Sass & Minify CSS
gulp.task('sass', function() {
    return gulp.src(['assets/scss/style.scss'])
        .pipe(sass({
          includePaths: require('node-neat').includePaths
        }))
        .pipe(minifycss())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest('assets/css/'))
        .pipe(livereload());
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/scss/*/*.scss', ['sass'])
    gulp.watch('assets/js/*/*.js', ['scripts']);
});

// Default Task
gulp.task('default', ['scripts', 'sass', 'watch']);
