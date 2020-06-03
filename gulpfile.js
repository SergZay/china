var gulp        = require('gulp');
var sass        = require('gulp-sass');
var browserSync = require('browser-sync');
var cssnano     = require('gulp-cssnano');
var rename      = require('gulp-rename');

gulp.task('sass', function(){
  return gulp.src('assets/sass/**/*.sass')
          .pipe(sass())
          .pipe(gulp.dest('assets/css'))
          .pipe(browserSync.reload({stream: true}));
});

gulp.task('wath-js', function(){
  return gulp.src('assets/js/**/*.js')
          .pipe(browserSync.reload({stream: true}));
});

gulp.task('wath-html', function(){
  return gulp.src('*.html')
          .pipe(browserSync.reload({stream: true}));
});

gulp.task('css-libs', function() {
  return gulp.src('assets/sass/main.sass')
  .pipe(sass())
  .pipe(cssnano())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('assets/css'))
  .pipe(browserSync.reload({stream: true}));
});

gulp.task('browser-sync', function(){
  browserSync.init({
    server: {
      port: 8080,
      baseDir: './'
    }
  });
});

//
gulp.task('watch', gulp.parallel('browser-sync', 'css-libs', 'sass', function(){
  // gulp.watch('assets/sass/**/*.sass', gulp.series('sass'));
  gulp.watch('assets/sass/**/*.sass', gulp.series('css-libs'));
  gulp.watch('*.html', gulp.series('wath-html'));
  gulp.watch('assets/js/**/*.js', gulp.series('wath-js'));
}));