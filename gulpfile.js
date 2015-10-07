/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Ahmad Awais, @digisavvy, @desaiuditd, @jb510, @dmassiani, @Maxlopez and @danyim
 * @package NeatBootstrap
 */

// Project configuration
var project = 'neatBootstrap', // Project name, used for build zip.
    url             = 'neat.dev', // Local Development URL for BrowserSync. Change as-needed.
    bower           = 'src/bower_components/'; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
    build           = 'dist', // Files that you want to package into a zip go here
    temp            = '.tmp', // Temporary folder where all the CSS will go
    buildInclude    = [
        // include common file types
        'src/**/*.php',
        'src/src/**/*.html',
        'src/**/*.css',
        'src/**/*.js',
        'src/**/*.svg',
        'src/**/*.ttf',
        'src/**/*.otf',
        'src/**/*.eot',
        'src/**/*.woff',
        'src/**/*.woff2',

        // include specific files and folders
        'screenshot.png',

        // exclude files and folders
        '!node_modules/**/*',
        '!src/bower_components/**/*',
        // '!style.css.map',
        '!src/assets/css/**/*',
        '!src/assets/img/**/*',
        '!src/assets/js/**/*'
    ],
    // Optional FTP connection information (do not check this in)
    ftpInfo = {
        host:     'ftp.mysite.com',
        user:     'my@user.name',
        password: 'mypass',
        parallel: 5, // Max # of parallel connections
        path: '/blog/wp-content/themes/bootstrap'
    };

// Load plugins
var $ = require('gulp-load-plugins')({
    pattern: ['gulp-*', 'main-bower-files', 'uglify-save-license']
});
var gulp         = require('gulp'),
    browserSync  = require('browser-sync'), // Asynchronous browser loading on .scss file changes
    reload       = browserSync.reload,
    ftp          = require('vinyl-ftp');
// Read FTP configuration file if it exists
try {
    var configFile = require('./ftp-config.json');
    ftpInfo.host = configFile.host;
    ftpInfo.user = configFile.user;
    ftpInfo.password = configFile.password;
    ftpInfo.parallel = configFile.parallel;
    ftpInfo.path = configFile.path;
}
catch(ex) {} // Use default values in this file if .json isn't there


/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * Although, I think this is redundant, since we have a watch task that does this already.
 */
gulp.task('browser-sync', function() {
    var files = [
        '**/*.php',
        '**/*.{png,jpg,gif}'
    ];
    browserSync.init(files, {
        // Read here http://www.browsersync.io/docs/options/
        proxy: url,

        // port: 8080,

        // Tunnel the Browsersync server through a random Public URL
        // tunnel: true,

        // Attempt to use the URL 'http://my-private-site.localtunnel.me'
        // tunnel: 'ppress',

        // Inject CSS changes
        injectChanges: true
    });
});

/**
 * Scripts/Fonts/CSS: Vendors
 *
 * Looks for scripts, fonts, and CSS/SCSS from your installed bower components
 */
gulp.task('bowerFiles', function() {
    var jsFilter = $.filter('**/*.js', {restore: true});
    var cssFilter = $.filter(['**/*.{css,sass,scss}'], {restore: true});
    var fontFilter = $.filter(['**/*.{woff,woff2,ttf,eot,svg}'], {restore: true});

    return gulp.src($.mainBowerFiles({
            overrides: {
                bootstrap: {
                    main: [
                        './dist/js/bootstrap.js',
                        './dist/css/*.css'
                        //'./dist/fonts/*.*'
                    ]
                },
                'font-awesome': {
                    main: [
                        './fonts/*.{woff,woff2,ttf,eot,svg}',
                        './scss/*.*'
                    ]
                }
            }
        }))
        .pipe(jsFilter)
        .pipe($.concat('vendor.js'))
        // Write the JS files back into the src directory for processing later
        // via the vendorsJs task
        .pipe(gulp.dest('src/assets/js/vendor'))
        .pipe(jsFilter.restore)
        .pipe(cssFilter)
        .pipe($.sass({
            errLogToConsole: true,
            precision: 10
        }))
        .on('error', $.util.log)
        .pipe($.concat('vendor.css'))
        .pipe($.rename({ suffix: '.min' }))
        .pipe($.uglifycss({
            maxLineLen: 80
        }))
        .pipe(gulp.dest(temp + '/assets/css')) // Comment if unminified source should not be in the build output
        .pipe(cssFilter.restore)
        .pipe(fontFilter)
        .pipe(gulp.dest(temp + '/assets/fonts'))
        .pipe(fontFilter.restore)
        //.pipe($.notify({ message: 'Bower vendor scripts task complete', onLast: true }));
});

/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
 * Sass output styles: https://web-design-weekly.com/2014/06/15/different-sass-output-styles/
 */
gulp.task('styles', ['bowerFiles'], function () {
    return gulp.src('src/assets/css/*.scss')
        .pipe($.plumber())
        .pipe($.sourcemaps.init())
        .pipe($.sass({
            errLogToConsole: true,
            outputStyle: 'compact', // Other options: compressed, nested, expanded
            precision: 10
        }))
        .on('error', $.util.log)
        .pipe($.sourcemaps.write({includeContent: false}))
        .pipe($.sourcemaps.init({loadMaps: true}))
        .pipe($.autoprefixer('last 2 version', '> 1%', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
        .pipe($.sourcemaps.write('.'))
        .pipe($.plumber.stop())
        .pipe(gulp.dest(temp))
        .pipe($.filter('**/*.css')) // Filtering stream to only css files
        .pipe($.combineMediaQueries()) // Combines Media Queries
        .pipe(reload({ stream:true })) // Inject Styles when style file is created
        .pipe($.rename({ suffix: '.min' }))
        .pipe($.uglifycss({
            maxLineLen: 80
        }))
        .pipe(gulp.dest(temp))
        .pipe(reload({stream:true})) // Inject Styles when min style file is created
        //.pipe($.notify({ message: 'Styles task complete', onLast: true }))
});

/**
 * Scripts: Vendors
 *
 * Look at src/assets/js/vendor and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */
gulp.task('vendorsJs', ['bowerFiles'], function() {
    return gulp.src('src/assets/js/vendor/*.js')
        .pipe($.filter('*.js'))
        .pipe($.concat('vendors.js'))
        // .pipe(gulp.dest(temp + '/assets/js')) // Comment if unminified source should not be in the build output
        .pipe($.rename( {
            basename: 'vendors',
            suffix: '.min'
        }))
        .pipe($.uglify({
            preserveComments: $.uglifySaveLicense
        }))
        .pipe(gulp.dest(temp + '/assets/js/'))
        //.pipe($.notify({ message: 'Vendor scripts task complete', onLast: true }));
});

/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
 */
gulp.task('scriptsJs', ['wpScriptsJs'], function() {
    return gulp.src(['src/assets/js/**/*.js', '!src/assets/js/vendor/**/*', '!src/assets/js/{html5shiv,respond.min}.js'])
        .pipe($.concat('scripts.js'))
        // .pipe(gulp.dest(temp + '/assets/js')) // Comment if unminified source should not be in the build output
        .pipe($.rename( {
            basename: 'scripts',
            suffix: '.min'
        }))
        .pipe($.uglify({
            preserveComments: $.uglifySaveLicense
        }))
        .pipe(gulp.dest(temp + '/assets/js/'))
        //.pipe($.notify({ message: 'Custom scripts task complete', onLast: true }));
});

/**
 * Scripts: WP Custom
 *
 * Special files refreenced in aa_scripts_styles.php for certain browsers
 */
gulp.task('wpScriptsJs', function() {
    return gulp.src('src/assets/js/{html5shiv,respond.min}.js')
        .pipe(gulp.dest(temp + '/assets/js/'))
        //.pipe($.notify({ message: 'Custom scripts task complete', onLast: true }));
});


/**
 * Images
 *
 * Look at src/assets/img, optimize the images and send them to the staging folder
 */
gulp.task('images', function() {
    // Add the newer pipe to pass through newer images only
    return gulp.src(['src/assets/img/**/*.{png,jpg,jpeg,gif}'])
        .pipe($.newer(temp + '/assets/img'))
        .pipe($.imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
        .pipe(gulp.dest(temp + '/assets/img'))
        //.pipe($.notify( { message: 'Images task complete', onLast: true } ) );
});

/**
 * Clean gulp cache
 */
gulp.task('clear', function () {
    $.cache.clearAll();
});


 /**
  * Clean tasks for zip
  *
  * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
  * clearing out unoptimized image files in zip as those will have been moved and optimized
  */
gulp.task('clean', function() {
    return gulp.src([temp, '.sass-cache', project + '.zip'], { read: false }) // much faster
        .pipe($.ignore('node_modules/**')) //Example of a directory to ignore
        .pipe($.rimraf({ force: true }))
        //.pipe(notify({ message: 'Clean task complete', onLast: true }));
});

 /**
  * Build task that moves essential theme files for production-ready sites
  *
  * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
  * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
  */
gulp.task('buildFiles', function() {
    return gulp.src(buildInclude)
        .pipe(gulp.dest(temp))
        //.pipe($.notify({ message: 'Copy from buildFiles complete', onLast: true }));
});

 /**
  * Zipping build directory for distribution
  *
  * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
  */
gulp.task('zip', ['styles', 'vendorsJs', 'scriptsJs', 'images', 'buildFiles'], function () {
    return gulp.src(temp + '/**/*')
        .pipe($.zip(project + '.zip'))
        .pipe($.size({
            title: 'ZIP Created'
        }))
        .pipe(gulp.dest('.'))
        //.pipe($.notify({ message: 'Zip task complete', onLast: true }));
});

 /**
  * FTP distribution files
  *
  * Uploads the build folder, which has been cleaned and optimized, to a FTP server
  */
gulp.task('ftp', function () {
    var conn = ftp.create({
        host: ftpInfo.host,
        user: ftpInfo.user,
        password: ftpInfo.password,
        parallel: ftpInfo.parallel, // Max # of parallel connections
        log: $.util.log
    });
    return gulp.src(temp + '/**/*', { base: '.tmp/', buffer: false })
        // .pipe(conn.newer(ftpInfo.path)) // Only upload newer files
        .pipe(conn.dest(ftpInfo.path))
        //.pipe($.notify({ message: 'FTP task complete', onLast: true }));
});


// ==== TASKS ==== //
/**
 * Gulp Default Task
 *
 * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
 *
 */


// Package Distributable Theme
gulp.task('build', ['styles', 'vendorsJs', 'scriptsJs', 'images', 'buildFiles'], function(cb) {
    // var vendorJsFilter = $.filter(['assets/js/vendors.js'], {restore: true});

    // return gulp.src(temp + '/**/*')
        // .pipe(vendorJsFilter)
        // .pipe($.debug())
        // // Minify all the JS
        // .pipe($.concat('vendor.min.js'))
        // .pipe($.uglify())
        // // .pipe(gulp.dest(temp + '/assets/js/'))
        // .pipe(vendorJsFilter.restore)
        // .pipe(gulp.dest('dist'));
});
gulp.task('build:zip', ['build', 'zip']);
gulp.task('build:ftp', ['build', 'ftp']);
gulp.task('serve', ['build', 'watch']);

// gulp.task('build', ['styles', 'vendorsJs', 'scriptsJs', 'images', 'buildFiles'], function(cb) {
//     var vendorJsFilter = $.filter(['assets/js/vendors.js'], {restore: true});
//     var cssFilter = $.filter(['assets/*.css'], {restore: true});

//     return gulp.src(temp + '/**/*')
//         .pipe(vendorJsFilter)
//         // Minify all the JS
//         .pipe($.uglify())
//         .pipe(vendorJsFilter.restore)
//         .pipe(cssFilter)
//         .pipe($.uglifycss({
//             maxLineLen: 80
//         }))
//         .pipe(cssFilter.restore)
//         .pipe(gulp.dest('dist'));
// });

// Watch Task
gulp.task('default', ['watch'], function () {

});

gulp.task('watch', function () {
    gulp.watch(buildInclude, ['buildFiles']);
    gulp.watch('src/assets/img/**/*', ['images']);
    gulp.watch('src/assets/css/**/*.scss', ['styles']);
    gulp.watch('src/assets/js/**/*.js', ['scriptsJs', browserSync.reload]);
    gulp.watch('bower.json', ['bowerFiles', browserSync.reload]);
});
