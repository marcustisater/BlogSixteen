var gulp = require('gulp');
var postcss = require('gulp-postcss');

var watch = require('gulp-watch')
var plumber = require('gulp-plumber');
var notify = require('gulp-notify');
var newer = require('gulp-newer');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');
var rename = require("gulp-rename");

// Load PostCSS Plugins
var autoprefixer = require('autoprefixer');
var csswring = require('csswring');
var colormin = require('postcss-colormin');
var nesting = require('postcss-nested');
var precss = require('precss');
var uglify = require('gulp-uglify');
var rucksack = require('rucksack-css');

// Paths for dir
var imgSrc = 'images/**';
var imgDest = 'images/';

var cssSrc = 'css/style.css';
var cssDest = 'css/';

var jsSrc = 'js/theme.js'
var jsDest = 'js/'


// Run Imagemin (compess png,jpeg,svg,gif)
gulp.task('images', function () {
    return gulp.src(imgSrc)
      .pipe(newer(imgDest))
      .pipe(imagemin({
        progressive: true,
        svgoPlugins: [{removeViewBox: false}],
        use: [pngquant()]
      }))
      .pipe(gulp.dest(imgDest));
});

/* Run Javascript stuff */
gulp.task('js', function() {
  return gulp.src('js/theme.js')
    .pipe(uglify())
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(gulp.dest('js/'));
});

/* Run CSS tasks */
gulp.task('css', function () {
    /* PostCSS Tasks */
    var processors = [
        rucksack,
        autoprefixer({browsers: ['last 1 version']}),
        csswring,
        colormin,
        nesting,
        precss
    ];

    return gulp.src(cssSrc)
      .pipe(plumber({errorHandler: notify.onError("Error due to: <%= error.message %>")}))
      .pipe(postcss(processors))
      .pipe(notify("Compiled with no errors"))
      .pipe(rename({
        extname: '.min.css'
      }))
      .pipe(gulp.dest(cssDest));
});


/* Watch for changes in files */
gulp.task('watch', function() {
    gulp.watch(cssSrc, ['css']);
    gulp.watch(imgSrc, ['images']);
    gulp.watch(jsSrc, ['js']);
});

gulp.task('default', ['watch']);
