/************************************************************************************************************************************
 1. Variables
 ************************************************************************************************************************************/
var gulp 	= require('gulp'),								// Main gulp module
	sass 	= require('gulp-ruby-sass'),					// Gulp ruby sass
	prefix 	= require('gulp-autoprefixer'),					// CSS autoprefixer
	rename	= require('gulp-rename'),						// Rename files
	concat	= require('gulp-concat'),						// Javascript concatination
	uglify	= require('gulp-uglify'),						// Javascript minification
	notify	= require('gulp-notify');						// Notifications

/************************************************************************************************************************************
2. Default Task
************************************************************************************************************************************/
gulp.task('default', ['sass', 'javascript'], function() {});

/************************************************************************************************************************************
3. Watch
************************************************************************************************************************************/
gulp.task('watch', function() {
	// Watch .scss files
	gulp.watch('sass/**/*.scss', ['sass']);

  	// Watch .js files
	gulp.watch('js/**/*.js', ['javascript']);
});

/************************************************************************************************************************************
4. SASS
************************************************************************************************************************************/
gulp.task('sass', function () {
    gulp.src('sass/**/*.scss')
        .pipe(sass({
        	sourcemap: true, 
        	style: 'compressed'
        }))
        .pipe(prefix(
        		"last 3 version", 
        		"> 1%", 
        		"ie 8", 
        		"ie 7"
        ))
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('../../Public/css'))
        .pipe(notify({message:'SASS finished'}));
});

/************************************************************************************************************************************
5. Javascript
************************************************************************************************************************************/
gulp.task('javascript', function(){
	return gulp.src('js/**/*.js')
		.pipe(concat('ik_faq.js'))
		.pipe(gulp.dest('../../Public/js'))
		.pipe(rename({suffix: '.min'}))
		.pipe(uglify())
		.pipe(gulp.dest('../../Public/js'))
		.pipe(notify({ message: 'Javascript finished' }));
});