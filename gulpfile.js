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
    sass: '/statics/style/sass/',
    ts: '/statics/script/js/',
};

const DIST = {
    css: '/statics/style/css/',
    js: '/statics/script/js/'
};


/**
 * Task sass
 * Compile the SASS Files
 */
gulp.task('sass', function() {
    
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
});