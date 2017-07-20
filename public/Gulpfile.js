var gulp         = require('gulp'),
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS     = require('gulp-clean-css'),
    concat       = require('gulp-concat'),
    plumber      = require('gulp-plumber'),
    sass         = require('gulp-sass'),
    source       = require('gulp-sourcemaps');
    uglify       = require('gulp-uglify'),




/// minificar SASS para CSS e minificar
gulp.task('css', function() {
    return gulp.src('assets/sass/*.scss')
        .pipe(plumber({
            handleError: function (error) {
                console.log(error);
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(source.init()) // debugar melhor o codigo
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'ios 6', 'android 4'))
        .pipe(cleanCSS({debug: true}, function(details) {
            console.log(details.name + ': ' + details.stats.originalSize);
            console.log(details.name + ': ' + details.stats.minifiedSize);
        }))
        .pipe(source.write('maps/')) // cria pasta de cache -- testar sem
        .pipe(gulp.dest('./assets/css'));
});



gulp.task('default', function() {
  gulp.watch('assets/sass/*/**', ['css']);
});
