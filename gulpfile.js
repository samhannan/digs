gulp.task('copyboostrap', function() {
	gulp.src('./bower_components/font-awesome/fonts/**/*.{ttf,woff,eof,svg}')
   .pipe(gulp.dest('./fonts'));
});