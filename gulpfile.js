/**
 *  Launch Web-Server
 */

var gulp = require('gulp'),
    browserSync = require('browser-sync'),
    connect = require('gulp-connect-php'),
    $ = require('gulp-load-plugins')();


gulp.task('go', function () {
    connect.server({}, function (){
        browserSync({
            proxy: '127.0.0.1:8000'
        });
    });
});