/**
 * Created by minhman.tran on 11/17/2015.
 */
var gulp = require('gulp');
var compass = require('gulp-compass');
var cssnano = require('gulp-cssnano');
var useref = require('gulp-useref');
var gulpif = require('gulp-if');
var uglify = require('gulp-uglify');

var fontmin = require('gulp-fontmin');

var rimraf = require('gulp-rimraf');

var include = require('gulp-html-tag-include');

var browserSync = require('browser-sync');
var reload = browserSync.reload;

gulp.task('build', ['html-include', 'compass'], function(){
    gulp.start(['fonts', 'extras', 'html']);
});

gulp.task('default', ['clean'], function(){
    gulp.start('build');
});

gulp.task('compass', function() {
    gulp.src('app/sass/**/*.scss')
        .pipe(compass({
            config_file: './config.rb',
            css: 'app/css',
            sass: 'app/sass',
            comments: true,
            style: 'expanded'
        }))
        .pipe(browserSync.stream());
});

gulp.task('images', function(){
    gulp.src(['app/images/**/*'])
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{
                removeViewBox: false,
                cleanupIDs: false
            }]
        }))
        .pipe(gulp.dest('wordpress/wp-content/themes/directory2/assets/images'));
});

gulp.task('html', function() {
    return gulp.src(['.tmp/*.html'])
        .pipe(useref({searchPath: ['app', '.']}))
        .pipe(gulpif('*.min.js', uglify()))
        .pipe(gulpif('*.min.css', cssnano({ zindex: false })))
        .pipe(gulp.dest('wordpress/wp-content/themes/directory2/assets/'));
});

gulp.task('fonts', function() {
    return gulp.src([
        'app/fonts/*.ttf'
    ]).pipe(fontmin())
        .pipe(gulp.dest('.tmp/fonts'))
        .pipe(gulp.dest('wordpress/wp-content/themes/directory2/assets/fonts'));
});

gulp.task('html-include', function() {
    return gulp.src('app/*.html')
        .pipe(include())
        .pipe(gulp.dest('.tmp/'));
});

gulp.task('extras', function() {
    return gulp.src('app/images/**/*.*')
        .pipe(gulp.dest('wordpress/wp-content/themes/directory2/assets/images/'));
});

// watch Sass files for changes, run the Sass preprocessor with the 'sass' task and reload
gulp.task('serve', ['html-include', 'fonts', 'compass'], function() {
    browserSync({
        port: 8000,
        server: {
            baseDir: ['.tmp', 'app', 'wordpress'],
            routes: {
                '/bower': 'bower'
            }
        }
    });

    gulp.watch([
        'app/sass/**/*.scss'
    ], ['compass']);
    gulp.watch([
        'app/**/*.html'
    ], ['html-include']);

    gulp.watch([
        './**/*.html',
        'sass/**/*.scss',
        'js/*.js'
    ], {cwd: 'app'}, reload);
});

gulp.task('clean', function() {
    return gulp.src(['wordpress/wp-content/themes/directory2/assets/*'], { read: false }) //much faster
        .pipe(rimraf({
            force: true
        }));
});