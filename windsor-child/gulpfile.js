'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
const autoprefixer = require('gulp-autoprefixer');

const paths = {
    styles: {
        scss: [
            '*.scss',
            'css/*.scss'
        ],
        src: '*.scss',
        dest: './'
    }
};

function styles() {
    return gulp.src(paths.styles.src)
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest(paths.styles.dest));
}

function watch() {
    gulp.watch(paths.styles.scss, styles);
}

exports.styles = styles;
exports.watch = watch;

const build = gulp.series(styles);

gulp.task('watch', watch);
gulp.task('build', build);
gulp.task('default', build);
