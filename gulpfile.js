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

elixir(function(mix) {
    mix.version('js/all.js');
    mix.sass('app.scss');
    mix.sass([
        'font-awesome.min.css',
        'component.css',
        'ionicons.min.css',
        'jquery-ui.css',
        //'jumbotron-narrow.css',
        //'normalize.css',          what this one use for?
        'angular_animation.css',
        'global.css'
    ], 'public/css/app.css');

    //mix.phpUnit().phpSpec();

    mix.browserSync({
        proxy: '192.168.0.105:8888'
    })

    // Application Scripts
    mix.scripts( [
                    'ng/ng_app.js',
                    'ng/ng_factory.js',

                    'ng-controllers/BillController.js',
                    'ng-controllers/BillController.js',
                    'ng-controllers/CreditCardController.js',
                    'ng-controllers/GoalBuyingController.js',
                    'ng-controllers/GoalCarController.js',
                    'ng-controllers/GoalController.js',
                    'ng-controllers/GoalTravelController.js',
                    'ng-controllers/SpendableChartController.js',
                    'ng-controllers/SpendingCategoriesChartController.js',
                    'ng-controllers/TransactionsController.js',
                    'ng-controllers/userController.js'

        ]
        );
});
