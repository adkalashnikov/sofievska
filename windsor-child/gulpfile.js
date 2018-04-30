'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

const paths = {
    styles: [
        '*.scss',
        'css/*.scss'
    ]
};

gulp.task('css', function() {
    return gulp.src(paths.styles)
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(''))
        ;
});

gulp.task('watch', function() {
    gulp.watch(paths.styles, ['css']);
});

gulp.task('build', ['css']);
gulp.task('default', ['build']);
