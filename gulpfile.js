var gulp                = require('gulp');
var prefix              = require('gulp-autoprefixer');
var browserSync         = require('browser-sync');
var reload              = browserSync.reload;
var sass                = require('gulp-sass');
var sourcemaps          = require('gulp-sourcemaps');
//var jshint              = require('gulp-jshint');
//var concat              = require('gulp-concat');
//var uglify              = require('gulp-uglify');
//var rename              = require('gulp-rename');
var imageop             = require('gulp-image-optimization');
var cleanCSS            = require('gulp-clean-css');
var mamp                = require('gulp-mamp');
var options             = {};
//
//options.user = 'villo';
//options.port = 8888;
//options.site_path = '/Users/villo/Sites/956/'; // something like /Users/username/sites/mymampsite 
//
// Start MAMP 
gulp.task('start', function(cb){
   mamp(options, 'start', cb);
});

gulp.task('stop', function(cb){
   mamp(options, 'stop', cb);
});

gulp.task('mamp', ['start']);

// Image Optimization
gulp.task('images', function(cb) {

   gulp.src(['assets/images/img/**/*.png', 'assets/images/img/**/*.jpg', 'assets/images/img/**/*.gif', 'assets/images/img/**/*.jpeg']).pipe(imageop({
       optimizationLevel: 5,
       progressive: true,
       interlaced: true
   })).pipe(gulp.dest('./assets/images')).on('end', cb).on('error', cb);
});

//// Lint Task
//gulp.task('lint', function() {
//    return gulp.src('js/vendor/*.js')
//        .pipe(jshint())
//        .pipe(jshint.reporter('default'));
//});
//
//// Concatenate & Minify JS
//gulp.task('scripts', function() {
//    return gulp.src('js/vendor/*.js')
//        .pipe(concat('all.js'))
//        .pipe(gulp.dest('js'))
//        .pipe(rename('all.min.js'))
//        .pipe(uglify())
//        .pipe(gulp.dest('js'));
//});
 
// browser-sync task for starting the server.
gulp.task('browser-sync', function() {
    //watch files
    var files = [
    './style.css',
    './**/*.php'
    ];
 
    //initialize browsersync
    browserSync.init(files, {
    //browsersync with a php server
    // proxy: "localhost:8888", // Uncomment on MacOS
    port: 8081, // Uncomment on Cloud9
    });
});
 
// Sass task, will run when any SCSS files change & BrowserSync
// will auto-update browsers
gulp.task('sass', function () {
    return gulp.src('assets/stylesheets/style.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(prefix(['last 15 versions', 'firefox >= 4', '> 1%', 'ie 11', 'ie 10', 'ie 9', 'ie 8', 'ie 7', 'safari 7', 'safari 8'], { cascade: true }))
        // .pipe(cleanCSS())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./'))
        .pipe(reload({stream:true}));
});

gulp.task('watch', function () {
  // gulp.watch('js/vendor/*.js', ['lint', 'scripts']);
  gulp.watch('assets/stylesheets/**', ['sass']);
  gulp.watch('assets/images/img/**', ['images']);
});
 
// Default task to be run with `gulp`
// Removed tasks ['mamp', 'images', 'sass', 'browser-sync', 'lint', 'scr    ipts', 'watch']
// gulp.task('default', ['mamp', 'images', 'sass', 'browser-sync', 'watch'], function () { // Uncomment MacOS
gulp.task('default', ['images', 'sass', 'browser-sync', 'watch'], function () { // Uncomment Cloud 9
    gulp.watch("assets/stylesheets/**/*.scss", ['sass']);
});

