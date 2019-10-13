var gulp = require('gulp');

var browserSync = require("browser-sync").create();


function reload() {
  browserSync.reload();
  console.log("did it work?");
}

function watch() {
  browserSync.init({
    server: {
      baseDir: "app",
      proxy: 'testing.dev'
    }
  })
  gulp.watch('app/**/*.html', reload);
  gulp.watch('app/**/*.css', reload);
  gulp.watch('app/js/**/*.js', reload);
};

exports.watch = watch;
