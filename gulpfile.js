// Carregar os pacotes necessários
var elixir = require('laravel-elixir'),
    liveReload = require('gulp-livereload'),
    clean = require('rimraf'),
    gulp = require('gulp');

// Config geral
var config = {
    assetsPath: './resources/assets',
    buildPath:  './public/build'
};

// Local do Bower Path
config.bowerPath = "./resources/bower_components";

// Config das Path JS
config.buildPathJs = config.buildPath + '/js';
config.buildVendorPathJs = config.buildPathJs + '/vendor';
// Quais javascripts
config.vendorPathJs = [
    config.bowerPath + '/jquery/dist/jquery.min.js',
    config.bowerPath + '/bootstrap/dist/js/bootstrap.min.js',
    config.bowerPath + '/bootstrap-material-design/dist/js/material.min.js',
    config.bowerPath + '/bootstrap-material-design/dist/js/ripples.min.js',
    config.bowerPath + '/angular/angular.min.js',
    config.bowerPath + '/angular-route/angular-route.min.js',
    config.bowerPath + '/angular-resource/angular-resource.min.js',
    config.bowerPath + '/angular-animate/angular-animate.min.js',
    config.bowerPath + '/angular-messages/angular-messages.min.js',
    config.bowerPath + '/angular-bootstrap/ui-bootstrap.min.js',
    config.bowerPath + '/angular-strap/dist/modules/navbar.min.js',
    config.bowerPath + '/angular-cookies/angular-cookies.min.js',
    config.bowerPath + '/query-string/query-string.js',
    config.bowerPath + '/angular-oauth2/dist/angular-oauth2.min.js',
];

// Config das Path CSS
config.buildPathCss = config.buildPath + '/css';
config.buildVendorPathCss = config.buildPathCss + '/vendor';
// Quais CSS
config.vendorPathCss = [
    config.bowerPath + '/bootstrap/dist/css/bootstrap.min.css',
    config.bowerPath + '/bootstrap/dist/css/bootstrap-theme.min.css',
    config.bowerPath + '/bootstrap-material-design/dist/css/material.min.css',
    config.bowerPath + '/bootstrap-material-design/dist/css/ripples.min.css',
    config.bowerPath + '/bootstrap-material-design/dist/css/roboto.min.css',
];

// Config das Path CSS
config.buildPathHtml = config.buildPath + '/views';
config.buildPathFont = config.buildPath + '/fonts';
config.buildPathImage = config.buildPath + '/images';

gulp.task('copy-font', function(){
    // Copiar os Fonts
    gulp.src(config.assetsPath + '/fonts/**/*')
        .pipe(gulp.dest(config.buildPathFont))
        .pipe(liveReload());
});

gulp.task('copy-image', function(){
    // Copiar os Images
    gulp.src(config.assetsPath + '/images/**/*')
        .pipe(gulp.dest(config.buildPathImage))
        .pipe(liveReload());
});

gulp.task('copy-html', function(){
    // Copiar os html
    gulp.src(config.assetsPath + '/js/views/**/*.html')
        .pipe(gulp.dest(config.buildPathHtml))
        .pipe(liveReload());
});


gulp.task('copy-styles', function(){
    // Copiar os css
    gulp.src(config.assetsPath + '/css/**/*.css')
        .pipe(gulp.dest(config.buildPathCss))
        .pipe(liveReload());

    // Copiar os css dos vendor
    gulp.src(config.vendorPathCss)
        .pipe(gulp.dest(config.buildVendorPathCss))
        .pipe(liveReload());

});

gulp.task('copy-scripts', function(){
    // Copiar os javascripts
    gulp.src(config.assetsPath + '/js/**/*.js')
        .pipe(gulp.dest(config.buildPathJs))
        .pipe(liveReload());
    // Copiar os javascripts vendor
    gulp.src(config.vendorPathJs)
        .pipe(gulp.dest(config.buildVendorPathJs))
        .pipe(liveReload());

});

gulp.task('clear-build-folder', function(){
    clean.sync(config.buildPath);
});

gulp.task('default', ['clear-build-folder'], function(){

    // Copiar os Arquivos
    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-font', 'copy-image');


    // Mini / Version
    elixir(function(mix){
        mix.styles(config.vendorPathCss.concat([
            config.assetsPath + '/css/**/*.css'
        ]), 'public/css/all.css', config.assetsPath);

        mix.scripts(config.vendorPathJs.concat([
            config.assetsPath + '/js/**/*.js'
        ]), 'public/js/all.js', config.assetsPath);

        mix.version(['js/all.js', 'css/all.css']);
    });
});

gulp.task('watch-dev', ['clear-build-folder'], function(){

    liveReload.listen();

    gulp.start('copy-styles', 'copy-scripts', 'copy-html', 'copy-font', 'copy-image');

    gulp.watch(config.assetsPath + '/**', [
        'copy-styles',
        'copy-scripts',
        'copy-html',
        'copy-font',
        'copy-image'
    ]);


});
