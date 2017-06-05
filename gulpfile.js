var elixir = require('laravel-elixir');
elixir.config.js.browserify.watchify.options.poll = true;

// elixir.config.js.browserify.transformers.push({
//     name: 'vueify'
// });
require('laravel-elixir-vueify');
require('laravel-elixir-livereload');

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



elixir(function(mix) {
    // mix.less('../themes/clean-blog/clean-blog.less');
    // mix.less('../themes/center/all.less');

    mix.styles([
        '../../../node_modules/iview/dist/styles/iview.css'
    ], 'public/css');

    mix.sass('app.scss');
    // mix.styles([
    //     '/iview/dist/styles/iview.css'
    // ], 'public/css');

    mix.browserify('app.js')
    // mix.browserify('theme.js')
    // mix.version(['public/js/main.js', 'public/js/theme.js','public/css/all.css']);
    mix.version(['public/js/app.js','public/css/app.css']);

    // mix.browserify('backend.js');
    // mix.browserify('frontend.js');
    //
    // mix.version([
    //     'css/all.css',
    //     'js/backend.js',
    //     'js/frontend.js'
    // ]);


    // mix.version(['public/css/all.css']);

    // mix.styles([
    //     'normalize.css',
    //     'main.css'
    // ], 'public/assets/css');
    // mix.scripts([
    //     'jquery.js',
    //     'app.js'
    // ], 'public/assets/js');

    mix.livereload();
});

// <link rel="stylesheet" href="{{ elixir('assets/css/all.css') }}">
// <script src="{{ elixir('assets/js/all.js') }}"></script>