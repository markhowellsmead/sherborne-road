'use strict';

import plugins from 'gulp-load-plugins';
import rename from 'gulp-rename';
import gutil from 'gulp-util';
import yargs from 'yargs';
import browser from 'browser-sync';
import gulp from 'gulp';
import rimraf from 'rimraf';
import yaml from 'js-yaml';
import fs from 'fs';

// Load all Gulp plugins into one variable
const $ = plugins();

// Check for --production flag
const PRODUCTION = !!(yargs.argv.production);

// Load settings from config.yml
const { COMPATIBILITY, PORT, UNCSS_OPTIONS, PATHS } = loadConfig();

function loadConfig() {
    let ymlFile = fs.readFileSync('config.yml', 'utf8');
    return yaml.load(ymlFile);
}

// Build the "dist" folder by running all of the below tasks
gulp.task('build',
    gulp.series(clean, gulp.parallel(sass, javascript, images, copy, copyCSS, copyJS)));

// Build the site, and watch for file changes
gulp.task('watch',
    gulp.series('build', watch));

// Delete the "dist" folder
// This happens every time a build starts
function clean(done) {
    rimraf(PATHS.dist, done);
}

// Copy files out of the assets folder
// This task skips over the "img", "js", and "scss" folders, which are parsed separately
function copy() {
    return gulp.src(PATHS.assets)
        .pipe(gulp.dest(PATHS.dist + '/assets'));
}

/**
 * Copies CSS, font files as-is from e.g. bower_components
 * The path is manipulated to simplify the destination path.
 */
function copyCSS(done) {
    if (PATHS.copycss) {
        gulp.src(PATHS.copycss, { base: '.' })
            .pipe(rename(function(path) {
                path.dirname = path.dirname.replace('bower_components', '').replace('dist', '');
            }))
            .pipe(gulp.dest(PATHS.dist + '/assets/css'));
    }
    done();
}

/**
 * Copies JavaScript files as-is from e.g. bower_components
 * The path is manipulated to simplify the destination path.
 */
function copyJS(done) {
    if (PATHS.copyjavascript) {
        gulp.src(PATHS.copyjavascript, { base: '.' })
            .pipe(rename(function(path) {
                path.dirname = path.dirname.replace('bower_components', '').replace('dist', '');
            }))
            .pipe(gulp.dest(PATHS.dist + '/assets/js'));
    }
    done();
}

// Compile Sass into CSS
// In production, the CSS is compressed
function sass() {
    return gulp.src('src/assets/scss/*.scss')
        .pipe($.sourcemaps.init())
        .pipe($.sass({
                includePaths: PATHS.sass
            })
            .on('error', $.sass.logError))
        .pipe($.autoprefixer({
            browsers: COMPATIBILITY
        }))
        // Comment in the pipe below to run UnCSS in production
        //.pipe($.if(PRODUCTION, $.uncss(UNCSS_OPTIONS)))
        .pipe($.if(PRODUCTION, $.cssnano()))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/assets/css'))
        .pipe(browser.reload({ stream: true }));
}

// Combine JavaScript into one file
// In production, the file is minified
function javascript() {
    return gulp.src(PATHS.javascript)
        .pipe($.sourcemaps.init())
        .pipe($.babel({ ignore: ['what-input.js'] }))
        .pipe($.concat('app.js'))
        .pipe($.if(PRODUCTION, $.uglify()
            .on('error', e => { console.log(e); })
        ))
        .pipe($.if(!PRODUCTION, $.sourcemaps.write()))
        .pipe(gulp.dest(PATHS.dist + '/assets/js'));
}

// Copy images to the "dist" folder
// In production, the images are compressed
function images() {
    return gulp.src('src/assets/img/**/*')
        .pipe($.if(PRODUCTION, $.imagemin({
            progressive: true
        })))
        .pipe(gulp.dest(PATHS.dist + '/assets/img'));
}

// Watch for changes to static assets, pages, Sass, and JavaScript
function watch() {
    gulp.watch(PATHS.assets, copy);
    gulp.watch(PATHS.copycss, copyCSS);
    gulp.watch(PATHS.copyjavascript, copyJS);
    gulp.watch('src/assets/scss/**/*.scss').on('all', gulp.series(sass));
    gulp.watch('src/assets/js/**/*.js').on('all', gulp.series(javascript));
    gulp.watch('src/assets/img/**/*').on('all', gulp.series(images));
}
