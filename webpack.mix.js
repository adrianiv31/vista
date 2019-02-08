/**
 * Created by adrianivanciu on 06/01/2019.
 */
/**
 * Created by edwin on 3/26/17.
 */
const  mix  = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');



mix.styles([
    'resources/assets/css/libs/blog-post.css',
    'resources/assets/css/libs/bootstrap.css',
    'resources/assets/css/libs/font-awesome.css',
    'resources/assets/css/libs/metisMenu.css',
    'resources/assets/css/libs/sb-admin-2.css',
    'resources/assets/css/libs/jquery.fileupload.css',
    'resources/assets/css/libs/jquery.fileupload-ui.css'

], 'public/css/libs.css');

mix.scripts([
    'resources/assets/js/libs/jquery.js',
    'resources/assets/js/libs/bootstrap.js',
    'resources/assets/js/libs/metisMenu.js',
    'resources/assets/js/libs/sb-admin-2.js',
    'resources/assets/js/libs/scripts.js',
    'resources/assets/js/libs/file-upload/jquery.ui.widget.js',
    'resources/assets/js/libs/file-upload/tmpl.min.js',
    'resources/assets/js/libs/file-upload/jquery.fileupload.js',
    'resources/assets/js/libs/file-upload/jquery.fileupload-process.js',
    'resources/assets/js/libs/file-upload/jquery.fileupload-validate.js',
    'resources/assets/js/libs/file-upload/jquery.fileupload-ui.js',
    'resources/assets/js/libs/file-upload/main.js'

], 'public/js/libs.js');