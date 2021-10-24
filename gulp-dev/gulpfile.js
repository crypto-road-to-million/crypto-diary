const {
  src,
  dest,
  watch,
  // series,
  // parallel
} = require('gulp');

const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const image = require('gulp-image');
const jshint = require('gulp-jshint');
const stylish = require('jshint-stylish');
const browserSync = require('browser-sync').create();

// theme name
const themename = 'cd';

const root = '../' + themename + '/',
  scss = 'sass/',
  js = 'js/',
  img = 'images/';

function scssTask() {
  return src(scss + 'app.scss')
    .pipe(sourcemaps.init()) // initialize sourcemaps first
    .pipe(sass({
      outputStyle: 'expanded',
      indentType: 'tab',
      indentWidth: '1'
    }).on('error', sass.logError)) // compile SCSS to CSS
    .pipe(postcss(autoprefixer()))
    .pipe(sourcemaps.write('maps'))
    .pipe(dest(root + '/assets/css/'));
}

function jsTask() {
  return src([js + '*.js'])
    .pipe(jshint()) //to ignore some files or directories, create a .jshintignore file and add the files/dirs you want to ignore - https://jshint.com/docs/cli/
    .pipe(jshint.reporter(stylish))
    .pipe(dest(root + '/assets/js/'));
}

function imgTask(){
  return src(img + '**/*.{jpg,JPG,png}')
  // eslint-disable-next-line no-undef
  .pipe(newer(img))
  .pipe(image())
  .pipe(dest(root + '/assets/images/'));
 }

 function watchTask(){
  //start BrowserSync server
  server();
  
  watch(scss + '*.scss', scssTask);
  watch(js + '**/*.js', jsTask);
  watch(img + '**/*.{jpg,JPG,png}', imgTask);
  watch(root + '**/*').on('change', browserSync.reload);
 }

/*
* Set 'url' (the host and proxy hostnames) to match the canonical url of your ddev project.
* Do not include the http/s protocol in the url. The ddev-router will route the
* host machine's request to the appropriate protocol.
* 
* ex: yoursite.ddev.site
*/

 // https://www.browsersync.io/docs/options#option-server
function server() {
  browserSync.init({
    proxy: 'localhost/cryptodiary/', //alias
    // port: 80, //<-- changed default port (default:3000). Make sure to use proxy url + port for reload to work i.e http://hsnycwp.local:8080
    // open: false, //<-- set false to prevent opening browser
  });
 }

 exports.default = watchTask;