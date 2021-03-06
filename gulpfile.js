var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */
elixir(function (mix) {
    mix.styles([
        'plugins/slider.min.css',
        'themes/bootstrap.min.css',
        'themes/font-awesome.min.css',
        'themes/all.min.css',
        'themes/main.css',
        'themes/mobile-custom.css',
        'themes/loading.min.css',
        'themes/style.css',
        'themes/toastr.min.css',
        'themes/custom.index.css',
        'plugins/js_composer.min.css',
        'plugins/animate.min.css',
        ], 'public/css/layout.css')
    .styles([
        'themes/jquery.fileuploader.css',
        'themes/jquery.fileuploader-theme-thumbnails.css',
        ], 'public/css/file-upload.css')
    .scripts([
        'themes/jquery.min.js',
        'themes/jquery-migrate.min.js',
        'themes/infobox.js',
        'themes/marker-clusterer.js',
        'themes/jquery.jscroll.js',
        // 'themes/facebook.js',
        ], 'public/js/headerscript.js')
    .scripts([
        'themes/bootstrap.min.js',
        'themes/scroll-pagination.js',
        'themes/toastr.min.js',
        'themes/custom.toastr.js',
        'themes/jquery.validate.min.js',
        'themes/plugins.js',
        ],'public/js/themes.js')
    .scripts([
        'plugins/jqueryUi.core.min.js',
        'plugins/jqueryUI.widget.min.js',
        'plugins/jqueryUI.position.min.js',
        'plugins/jqueryUI.menu.min.js',
        'plugins/speadk.min.js',
        'plugins/js_composer_front.min.js',
        'plugins/skrollr.min.js',
        'plugins/waypoints.min.js',
        'plugins/jqueryUI.autocomplete.min.js',
        'plugins/jqueryUI.mouse.min.js',
        'plugins/jqueryUI.touch-punch.js',
        ],'public/js/plugins.js')
    .scripts([
        'components/map/map-constant.js',
        'components/map/map-event.js',
        'components/map/map-img.js',
        'components/map/map-marker.js',
        'components/map/map-action.js',
        'components/map/map-cookie.js',
        'components/map/map.js',
        ],'public/js/map-components.js')
    .scripts([
        'components/post/post-cookie.js',
        'components/post/post.js',
        ],'public/js/post-components.js')
    .scripts([
        'themes/map.js',
        'themes/custom-script.js',
        'themes/custom-carousels.js',
        ],'public/js/custom-jquery.js')
    .scripts([
        'components/home-page.js',
        ],'public/js/home-page-component.js')
    .scripts([
        'components/setting.js',
        ],'public/js/setting-component.js')
    .scripts([
        'plugins/plupload.full.min.js',
        ],'public/js/plupload.full.min.js')
    .scripts([
        'components/validate.js',
        'components/format-price.js',
        'orther/post_property.js',
        'orther/embed.min.js',
        'components/jquery.uploadFile.js'
        ],'public/js/create-post.min.js');
    mix.copy('resources/assets/css/fonts/', 'public/build/fonts');
    mix.copy('resources/assets/img', 'public/img/');
    mix.version([
        'public/css/layout.css',
        'public/css/file-upload.css',
        'public/js/headerscript.js',
        'public/js/themes.js',
        'public/js/plugins.js',
        'public/js/custom-jquery.js',
        'public/js/setting-component.js',
        'public/js/home-page-component.js',
        'public/js/plupload.full.min.js',
        'public/js/create-post.min.js',
        'public/js/map-components.js',
        'public/js/post-components.js',
    ]);
});
