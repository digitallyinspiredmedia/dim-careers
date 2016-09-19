var gulp = require('gulp'), // init
      uglify = require('gulp-uglify'), // min - js
      uglifycss = require('gulp-uglifycss'), // min - css
      plumber = require('gulp-plumber'), // plumber - error log
      concat = require('gulp-concat'), // concat - connect all file into one
      sourcemaps = require('gulp-sourcemaps'), // sourcemaps generater
      autoprefixer = require('gulp-autoprefixer'), // add pre-fix for all browser [  look on versions  and  implementation ]
      browserSync = require('browser-sync'),
      critical = require('critical');

// browser-sync task for starting the server
gulp.task('browser-sync', function() {
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});
gulp.task('uglify', function(){
  gulp.src('js/*.js')
  .pipe(sourcemaps.init())
  .pipe(plumber())
  .pipe(uglify())
  .pipe(concat('all.js'))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('src/js/'))
  .pipe(browserSync.reload({stream: true})); // prompts a reload after compilation
    console.log('Uglify fucked off from MANUAL ');
});

gulp.task('css',function(){
  gulp.src('css/*.css')
  .pipe(sourcemaps.init())
  .pipe(uglifycss({
      "uglyComments": true
  }))
  .pipe(autoprefixer({
     browsers: ['last 2 versions'],
     cascade: false
  }))
  .pipe(plumber())
  .pipe(concat('all.css'))
  .pipe(sourcemaps.write('.'))
  .pipe(gulp.dest('src/css'))
  .pipe(browserSync.reload({stream: true})); // prompts a reload after compilation
    console.log('Uglify CSS fucked from MANUAL ');
});

gulp.task('watch', ['browser-sync', 'css', 'uglify'], function(){
   console.log('Browser Sync fucked off MANUAL RELOAD');
  gulp.watch("css/*.css", ['css']);
  gulp.watch("js/*.js" , ['uglify']);
  gulp.watch("*.html").on('change', browserSync.reload);
  // Other watchers
});

gulp.task('critical', function (cb) {
    critical.generate({
        inline: true,
        base: '.',
        src: 'index.html',
        dest: 'src/index.php',
        minify: true,
        width: 320,
        height: 480
    });
});

gulp.task('default', ['watch'],function(){
  console.log('FUCK OFF KAVINRAJ');
});
