// Defining requirements
var gulp = require("gulp");
var plumber = require("gulp-plumber");
var sass = require("gulp-sass");
var rename = require("gulp-rename");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rimraf = require("gulp-rimraf");
var sourcemaps = require("gulp-sourcemaps");
var cleanCSS = require("gulp-clean-css");
var autoprefixer = require("gulp-autoprefixer");

// Configuration file to keep your code DRY
var cfg = require("./gulpconfig.json");
var paths = cfg.paths;

// Run:
// gulp watch
// Starts watcher. Watcher runs gulp sass task on changes
gulp.task("watch", function() {
  gulp.watch(`${paths.sass}/**/*.scss`, gulp.series("styles"));
  gulp.watch(
    [
      `${paths.dev}/js/**/*.js`,
      "js/**/*.js",
      "!js/child-theme.js",
      "!js/child-theme.min.js"
    ],
    gulp.series("scripts")
  );
});

// ---------- SASS + CSS MANAGEMENT ---------------------------

// Copy Fontawesome fonts into dist folder
gulp.task("cssimages", function() {
  return gulp
    .src(paths.sass + "vendor/**/images/.{jpg,gif,png}")
    .pipe(gulp.dest(PATHS.dist + "/css/images"));
});

// Run:
// gulp sass
// Compiles SCSS files in CSS
gulp.task("sass", function() {
  var stream = gulp
    .src(`${paths.sass}/*.scss`)
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit("end");
        }
      })
    )
    .pipe(sass({ errLogToConsole: true }))
    .pipe(autoprefixer("last 2 versions"))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
  return stream;
});

// Run:
// gulp minifycss
// Minify child-theme.css
gulp.task("minifycss", function() {
  return gulp
    .src(paths.css + "/child-theme.css")
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(cleanCSS({ compatibility: "*" }))
    .pipe(
      plumber({
        errorHandler: function(err) {
          console.log(err);
          this.emit("end");
        }
      })
    )
    .pipe(rename({ suffix: ".min" }))
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.css));
});

// Run:
// gulp styles
// Compile Sass and minify css
gulp.task("styles", gulp.series("sass", "minifycss"));

// ----------------------------- JS MANAGEMENT --------------------------------

// Run:
// gulp scripts.
// Uglifies and concat all JS files into one
gulp.task("scripts", function() {
  var scripts = [
    `${paths.dev}/js/vendor/owl.carousel/owl.carousel.js`,

    // Adding currently empty javascript file to add on for your own themes´ customizations
    // Please add any customizations to this .js file only!
    `${paths.dev}/js/custom-javascript.js`
  ];
  gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("child-theme.min.js"))
    .pipe(uglify())
    .pipe(gulp.dest(paths.js));

  return gulp
    .src(scripts, { allowEmpty: true })
    .pipe(concat("child-theme.js"))
    .pipe(gulp.dest(paths.js));
});
