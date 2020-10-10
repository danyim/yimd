const $ = require("gulp-load-plugins")({
  pattern: ["gulp-*", "main-bower-files", "uglify-save-license"],
});
const gulp = require("gulp");
const browserSync = require("browser-sync"); // Asynchronous browser loading on .scss file changes
const reload = browserSync.reload;
const ftp = require("vinyl-ftp");

// Project configuration
const projectName = "dyim-theme"; // Project name, used for build zip.
const url = "dev.local"; // Local Development URL for BrowserSync. Change as-needed.
const bower = "src/bower_components/"; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
const buildDir = "dist";
const tempDir = ".tmp";

const buildInclude = [
  // Files that you want to package into a zip go here // Temporary folder where all the CSS will go
  // include common file types
  "src/**/*.php",
  "src/src/**/*.html",
  "src/**/*.css",
  "src/**/*.js",
  "src/**/*.svg",
  "src/**/*.ttf",
  "src/**/*.otf",
  "src/**/*.eot",
  "src/**/*.woff",
  "src/**/*.woff2",

  // include specific files and folders
  "screenshot.png",

  // exclude files and folders
  "!node_modules/**/*",
  "!src/bower_components/**/*",
  // '!style.css.map',
  "!src/assets/css/**/*",
  "!src/assets/img/**/*",
  "!src/assets/js/**/*",
];

const defaultFtpConfig = {
  // Optional FTP connection information (do not check this in)
  host: "ftp.mysite.com",
  user: "my@user.name",
  password: "mypass",
  parallel: 5, // Max # of parallel connections
  path: "/blog/wp-content/themes/yimd",
};

// Read FTP configuration file if it exists
let ftpConfig;
try {
  const ftpConfigFile = require("./ftp-config.json");
  ftpConfig = Object.assign({}, defaultFtpConfig, ftpConfigFile);
} catch (ex) {} // Use default values in this file if .json isn't there

/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * Although, I think this is redundant, since we have a watch task that does this already.
 */
gulp.task("browser-sync", function () {
  const files = ["**/*.php", "**/*.{png,jpg,gif}"];
  browserSync.init(files, {
    // Read here http://www.browsersync.io/docs/options/
    proxy: url,
    // port: 8080,
    // Tunnel the Browsersync server through a random Public URL
    // tunnel: true,
    // Attempt to use the URL 'http://my-private-site.localtunnel.me'
    // tunnel: 'ppress',
    // Inject CSS changes
    injectChanges: true,
  });
});

/**
 * Scripts/Fonts/CSS: Vendors
 *
 * Looks for scripts, fonts, and CSS/SCSS from your installed bower components
 */
gulp.task("bowerFiles", function () {
  const jsFilter = $.filter("**/*.js", { restore: true });
  const cssFilter = $.filter(["**/*.{css,sass,scss}"], { restore: true });
  const fontFilter = $.filter(["**/*.{woff,woff2,ttf,eot,svg}"], {
    restore: true,
  });

  return (
    gulp
      .src(
        $.mainBowerFiles({
          overrides: {
            bootstrap: {
              // Pick and choose what functionality you really need:
              // http://getbootstrap.com/javascript/
              main: [
                "./dist/css/*.css",
                // './dist/fonts/*.*'
              ],
            },
            "font-awesome": {
              main: ["./fonts/*.{woff,woff2,ttf,eot,svg}", "./scss/*.*"],
            },
          },
        })
      )
      .pipe(jsFilter)
      .pipe($.concat("vendor.js"))
      // Write the JS files back into the src directory for processing later via the vendorsJs task
      .pipe(gulp.dest("src/assets/js/vendor"))
      .pipe(jsFilter.restore)
      .pipe(cssFilter)
      .pipe(
        $.sass({
          errLogToConsole: true,
          precision: 10,
        })
      )
      .on("error", $.util.log)
      .pipe($.concat("vendor.css"))
      .pipe($.rename({ suffix: ".min" }))
      .pipe(
        $.uglifycss({
          maxLineLen: 80,
        })
      )
      .pipe(gulp.dest(tempDir + "/assets/css")) // Comment if unminified source should not be in the build output
      .pipe(cssFilter.restore)
      .pipe(fontFilter)
      .pipe(gulp.dest(tempDir + "/assets/fonts"))
      .pipe(fontFilter.restore)
  );
});

/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 */
gulp.task("styles", ["bowerFiles"], function () {
  return gulp
    .src("src/assets/css/*.scss")
    .pipe($.plumber())
    .pipe($.sourcemaps.init())
    .pipe(
      $.sass({
        errLogToConsole: true,
        outputStyle: "compact",
        precision: 10,
      })
    )
    .on("error", $.util.log)
    .pipe($.sourcemaps.write({ includeContent: false }))
    .pipe($.sourcemaps.init({ loadMaps: true }))
    .pipe(
      $.autoprefixer(
        "last 2 version",
        "> 1%",
        "safari 5",
        "ie 8",
        "ie 9",
        "opera 12.1",
        "ios 6",
        "android 4"
      )
    )
    .pipe($.sourcemaps.write("."))
    .pipe($.plumber.stop())
    .pipe(gulp.dest(tempDir))
    .pipe($.filter("**/*.css")) // Filtering stream to only css files
    .pipe($.combineMediaQueries()) // Combines Media Queries
    .pipe(reload({ stream: true })) // Inject Styles when style file is created
    .pipe($.rename({ suffix: ".min" }))
    .pipe(
      $.uglifycss({
        maxLineLen: 80,
      })
    )
    .pipe(gulp.dest(tempDir))
    .pipe(reload({ stream: true })); // Inject Styles when min style file is created
});

/**
 * Scripts: Vendors
 *
 * Look at src/assets/js/vendor and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */
gulp.task("vendorsJs", ["bowerFiles"], function () {
  return (
    gulp
      .src("src/assets/js/vendor/*.js")
      .pipe($.filter("*.js"))
      .pipe($.concat("vendors.js"))
      // .pipe(gulp.dest(tempDir + '/assets/js')) // Comment if unminified source should not be in the build output
      .pipe(
        $.rename({
          basename: "vendors",
          suffix: ".min",
        })
      )
      .pipe(
        $.uglify({
          preserveComments: $.uglifySaveLicense,
        })
      )
      .pipe(gulp.dest(tempDir + "/assets/js/"))
  );
});

/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */
gulp.task("scriptsJs", ["wpScriptsJs"], function () {
  return (
    gulp
      .src([
        "src/assets/js/**/*.js",
        "!src/assets/js/vendor/**/*",
        "!src/assets/js/{html5shiv,respond.min}.js",
      ])
      .pipe($.concat("scripts.js"))
      // .pipe(gulp.dest(tempDir + '/assets/js')) // Comment if unminified source should not be in the build output
      .pipe(
        $.rename({
          basename: "scripts",
          suffix: ".min",
        })
      )
      .pipe(
        $.uglify({
          preserveComments: $.uglifySaveLicense,
        })
      )
      .pipe(gulp.dest(tempDir + "/assets/js/"))
  );
});

/**
 * Scripts: WP Custom
 *
 * Special files refreenced in aa_scripts_styles.php for certain browsers
 */
gulp.task("wpScriptsJs", function () {
  return gulp
    .src("src/assets/js/{html5shiv,respond.min}.js")
    .pipe(gulp.dest(tempDir + "/assets/js/"));
});

/**
 * Images
 *
 * Look at src/assets/img, optimize the images and send them to the staging folder
 */
gulp.task("images", function () {
  // Add the newer pipe to pass through newer images only
  return gulp
    .src(["src/assets/img/**/*.{png,jpg,jpeg,gif}"])
    .pipe($.newer(tempDir + "/assets/img"))
    .pipe(
      $.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true })
    )
    .pipe(gulp.dest(tempDir + "/assets/img"));
});

/**
 * Fonts
 *
 * Look at src/assets/fonts and move the fonts to the right directory
 */
gulp.task("fonts", function () {
  // Add the newer pipe to pass through newer images only
  return gulp
    .src(["src/assets/fonts/**/*.{woff,woff2,ttf,eot,svg}"])
    .pipe($.newer(tempDir + "/assets/fonts"))
    .pipe(gulp.dest(tempDir + "/assets/fonts"));
});

/**
 * Clean gulp cache
 */
gulp.task("clear", function () {
  $.cache.clearAll();
});

/**
 * Clean tasks for zip
 *
 * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
 * clearing out unoptimized image files in zip as those will have been moved and optimized
 */
gulp.task("clean", function () {
  return gulp
    .src([tempDir, ".sass-cache", projectName + ".zip", buildDir], {
      read: false,
    }) // much faster
    .pipe($.ignore("node_modules/**")) //Example of a directory to ignore
    .pipe($.rimraf({ force: true }));
});

/**
 * Build task that moves essential theme files for production-ready sites
 *
 * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
 * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
 */
gulp.task("buildFiles", function () {
  return gulp.src(buildInclude).pipe(gulp.dest(tempDir));
});

/**
 * Zipping build directory for distribution
 *
 * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
gulp.task(
  "zip",
  ["styles", "vendorsJs", "scriptsJs", "images", "fonts", "buildFiles"],
  function () {
    return gulp
      .src(tempDir + "/**/*")
      .pipe($.zip(projectName + ".zip"))
      .pipe(
        $.size({
          title: "ZIP Created",
        })
      )
      .pipe(gulp.dest("."));
  }
);

/**
 * FTP distribution files
 *
 * Uploads the build folder, which has been cleaned and optimized, to a FTP server
 */
gulp.task("ftp", function () {
  const conn = ftp.create({
    host: ftpConfig.host,
    user: ftpConfig.user,
    password: ftpConfig.password,
    parallel: ftpConfig.parallel, // Max # of parallel connections
    log: $.util.log,
  });
  return (
    gulp
      .src(tempDir + "/**/*", { base: ".tmp/", buffer: false })
      // .pipe(conn.newer(ftpConfig.path)) // Only upload newer files
      .pipe(conn.dest(ftpConfig.path))
  );
});

// ==== TASKS ==== //
/**
 * Gulp Default Task
 *
 * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
 *
 */

// Package Distributable Theme
gulp.task(
  "build",
  ["styles", "vendorsJs", "scriptsJs", "images", "fonts", "buildFiles"],
  function (cb) {
    const vendorJsFilter = $.filter(["assets/js/vendors.js"], {
      restore: true,
    });

    return (
      gulp
        .src(tempDir + "/**/*")
        .pipe(vendorJsFilter)
        .pipe($.debug())
        // Minify all the JS
        .pipe($.concat("vendor.min.js"))
        .pipe($.uglify())
        // .pipe(gulp.dest(tempDir + '/assets/js/'))
        .pipe(vendorJsFilter.restore)
        .pipe(gulp.dest(buildDir))
    );
  }
);
gulp.task("build:zip", ["build", "zip"]);
gulp.task("build:ftp", ["build", "ftp"]);
gulp.task("serve", ["build", "watch"]);

// gulp.task('build', ['styles', 'vendorsJs', 'scriptsJs', 'images', 'buildFiles'], function(cb) {
//     const vendorJsFilter = $.filter(['assets/js/vendors.js'], {restore: true});
//     const cssFilter = $.filter(['assets/*.css'], {restore: true});

//     return gulp.src(tempDir + '/**/*')
//         .pipe(vendorJsFilter)
//         // Minify all the JS
//         .pipe($.uglify())
//         .pipe(vendorJsFilter.restore)
//         .pipe(cssFilter)
//         .pipe($.uglifycss({
//             maxLineLen: 80
//         }))
//         .pipe(cssFilter.restore)
//         .pipe(gulp.dest(buildDir));
// });

// Watch Task
gulp.task("default", ["watch"], function () {});

gulp.task("watch", function () {
  gulp.watch(buildInclude, ["buildFiles"]);
  gulp.watch("src/assets/img/**/*", ["images"]);
  gulp.watch("src/assets/css/**/*.scss", ["styles"]);
  gulp.watch("src/assets/js/**/*.js", ["scriptsJs", browserSync.reload]);
  gulp.watch("bower.json", ["bowerFiles", browserSync.reload]);
});
