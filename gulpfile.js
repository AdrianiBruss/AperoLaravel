
var gulp = require('gulp');
var uglify = require('gulp-uglify');
var minifyCSS = require('gulp-minify-css');

gulp.task('minify-js', function() {
    gulp.src('public/assets/js/script.js')
        .pipe(uglify())
        .pipe(gulp.dest('public/dist/'))
});

gulp.task('minify-css', function() {
    gulp.src('public/assets/css/styles.css')
        .pipe(minifyCSS({keepBreaks:true}))
        .pipe(gulp.dest('public/dist/'))
});