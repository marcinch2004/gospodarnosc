// Sass configuration
var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass', function () {
    gulp.src('./wp-content/themes/twentyseventeen/assets/scss/test.scss')
        .pipe(sass())
        .pipe(gulp.dest('./wp-content/themes/twentyseventeen/assets/css'));
});

gulp.task('default', ['sass'], function () {
    gulp.watch('./wp-content/themes/twentyseventeen/assets/scss/test.scss', ['sass']);
});

gulp.task('watch', function () {

    var server = livereload();
    gulp.watch('**/*.php').on('change', function (file) {
        server.changed(file.path);
        util.log(util.colors.yellow('PHP file changed' + ' (' + file.path + ')'));
    });
});