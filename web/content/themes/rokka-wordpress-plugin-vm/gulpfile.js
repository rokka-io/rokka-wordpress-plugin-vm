var gulp = require('gulp'),
    sass = require('gulp-sass'),
    watch = require('gulp-watch'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    notify = require('gulp-notify'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    gulpif = require('gulp-if'),
    argv = require('yargs').argv;

gulp.task('default', function () {
});

gulp.task('frontend-styles', function () {
    return gulp.src('./assets/scss/app.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(gulpif(!argv.headless, notify({message: 'Frontend styles task complete', onLast: true})));
});

gulp.task('backend-styles', function() {
    return gulp.src('./assets/scss/backend.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(gulpif(!argv.headless, notify({message: 'Backend styles task complete', onLast: true})));
});

gulp.task('tinymce-styles', function() {
    return gulp.src('./assets/scss/tinymce.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: 'compressed'
        }).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version'))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('./assets/css'))
        .pipe(gulpif(!argv.headless, notify({message: 'TinyMCE styles task complete', onLast: true})));
});

gulp.task('styles', ['frontend-styles', 'backend-styles', 'tinymce-styles']);

gulp.task('scripts', function () {
    return gulp.src([
            './assets/js/app.js'
        ])
        .pipe(concat('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./assets/js'))
        .pipe(gulpif(!argv.headless, notify({message: 'Scripts task complete', onLast: true})));
});

gulp.task('watch', function () {
    gulp.watch('./assets/scss/**/*.scss', ['styles']);
    gulp.watch('./assets/js/**/*.js', ['scripts']);
});