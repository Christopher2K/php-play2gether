/**
 *  Launch Web-Server
 */

var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    $ = require('gulp-load-plugins')();

/**
 * Paths
 * Contain the path of all things
 */
const SRC = {
    sass: 'statics/style/sass/',
    ts: 'statics/script/js/',
};

const DIST = {
    css: 'statics/style/css',
    js: 'statics/script/js'
};


// TODO add task for minify & uglify

/**
 * Task sass
 * Compile the SASS Files
 */
gulp.task('sass', function() {
    gulp.src(SRC.sass + '*.scss')
        .pipe($.sass().on('error', $.sass.logError))
        .pipe($.autoprefixer(['last 30 versions']))
        .pipe(gulp.dest(DIST.css))
        .pipe(browserSync.stream());
});

/**
 * Task Dev
 * Dev Server + SASS Compile + Autorefresh
 */
gulp.task('go', function () {
    $.connectPhp.server({}, function (){
        browserSync({
            proxy: '127.0.0.1:8000'
        });
    });

    gulp.watch([
            SRC.sass + '*.scss',
            SRC.ts + '*.ts',
            '*.php'
        ],
        ['sass']
    ).on('change', browserSync.reload);
});