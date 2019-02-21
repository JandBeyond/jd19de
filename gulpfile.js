// VARIABLES
const gulp = require('gulp');
const uglify = require('gulp-uglify');
const concat = require('gulp-concat');
const sass = require('gulp-sass');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();
const zip = require('gulp-zip');

// FILES
gulp.task('files', function() {
    return gulp.src('node_modules/normalize.css/normalize.css')
        .pipe(gulp.dest('css'));
});

// SASS
gulp.task('sass', function() {
    return gulp.src('css/template.scss')
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(gulp.dest('css'));
});

// CSS
gulp.task('css', function() {
    return gulp.src([
            'css/normalize.css',
            'css/template.css'
        ])
        .pipe(concat('style.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('build'))
        .pipe(browserSync.stream());
});

// JS
gulp.task('js', function() {
    return gulp.src([
            'js/particles.js',
            'js/script.js'
        ])
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('build'))
        .pipe(browserSync.stream());
});

// SERVE
gulp.task('serve', function() {
    browserSync.init({
        proxy: 'http://localhost/jd19de/'
    });
    gulp.watch('js/**/*.js', gulp.series('js', 'zip'));
    gulp.watch('css/**/*.scss', gulp.series('sass'));
    gulp.watch('css/**/*.css', gulp.series('css', 'zip'));
    gulp.watch('**/*.php', gulp.series('zip')).on('change', browserSync.reload);
});

// ZIP
gulp.task('zip', function() {
    return gulp.src([
            '**/*',
            '!node_modules/**',
            '!dist/**'
        ])
        .pipe(zip('jd19de.zip'))
        .pipe(gulp.dest('../'));
});

// DEFAULT
gulp.task('default', gulp.series('files', 'sass', 'css', 'js', 'zip', 'serve'));
