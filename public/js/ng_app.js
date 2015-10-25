var app = angular.module('App',['ngAnimate','ngRoute','ng-mfb','ngMaterial','chart.js','ngSanitize','gm','ngMap']);

app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider
            .when('/bill/billCard', {

                templateUrl: '/bill/billCard',
                controller: 'billController'
            });
}]);

//Angular Theming
app.config(function($mdThemingProvider) {
    $mdThemingProvider.definePalette('amazingPaletteName', {
        '50': 'ffebee',
        '100': 'ffcdd2',
        '200': 'ef9a9a',
        '300': 'e57373',
        '400': 'ef5350',
        '500': '87D2DA',    //highlight, underline etc
        '600': 'e53935',
        '700': 'd32f2f',
        '800': 'c62828',
        '900': 'b71c1c',
        'A100': 'ff8a80',
        'A200': 'ff5252',
        'A400': 'ff1744',
        'A700': 'd50000',
        'contrastDefaultColor': 'light',    // whether, by default, text (contrast)
                                            // on this palette should be dark or light
        'contrastDarkColors': ['50', '100', //hues which contrast should be 'dark' by default
            '200', '300', '400', 'A100'],
        'contrastLightColors': undefined    // could also specify this if default was 'dark'
    });
    $mdThemingProvider.theme('default')
        .primaryPalette('amazingPaletteName')
});


app.controller('goalAutoController', function($scope, $http) {
    $scope.autoCal = {  autoPrice: 0,
                        autoDPmt: 0,
                        autoNumPmt: 0,
                        autoInterest: 0,
                        autoPmt: 0
                    };
});



app.controller('profileController', function($scope, $http,factory_userData,factory_userGoals,
                                            factory_userBills,factory_utils,
                                            factory_userCards,
                                            factory_mfb,
                                            factory_userSpending,
                                            $rootScope) {

    $http.defaults.withCredentials = true;
    $scope.date = new Date();

    factory_userData.userDataFactory().success(function(data){

        $scope.userData=data;

        $rootScope.rs_userData      = data;
        $rootScope.rs_mthlyIncome   =   $scope.userData.mth_income;
        $rootScope.rs_mthlySaving   =   $scope.userData.mth_saving;
    });

    factory_userData.userJobs().success(function(data){
        $scope.userJobs=data;
    });

    factory_utils.getCurrency().success(function(data){
        $scope.currencies=data;
    });

    factory_userGoals.userGoalsFactory().success(function(data){
        $scope.userGoals=data;
    });

    factory_userGoals.userTravelLocation().success(function(data){
        $scope.userTravelGoals = data;
    });

    factory_userBills.getBlls().success(function(data){
        $rootScope.rs_userBills = data;
    });

    factory_userBills.upComing().success(function(data){
        $scope.upComing = data;
    });

    factory_userBills.sumBills().success(function(data) {
        $rootScope.rs_sumBills = data;
    });

    factory_userBills.billCate().success(function(response) {
       $scope.billCate = response;
    });



    factory_userCards.getCards().success(function(data){
        $scope.userCards = data;
    });

    factory_userCards.ccIssuer().success(function(data){
        $scope.ccIssuer = data;
    });
    factory_userCards.ccTypes().success(function(data){
        $scope.ccTypes = data;
    });




    $scope.float_buttons = factory_mfb.mfb();

    factory_userSpending.dailySpending($scope);


    $scope.nav = function(path) {

        $scope.template.url = path;
    };

    $scope.templates =
        [
            //{ name: 'Home'              , url: '/app/html/card_home.html'},
            { name: 'Spendable'         , url: '/spendableCard'},
            { name: 'Account'           , url: '/app/html/card_account.html'},
            { name: 'Goals'             , url: '/app/html/card_goals.html'},
            { name: 'Transactions'      , url: '/app/html/card_transactions.html'},
            { name: 'Bills'             , url: '/bill/billCard'},
            { name: 'Credit cards'      , url: '/app/creditcards/CreditCardView.html'},
        ];



    $scope.template = $scope.templates[0];





    $scope.addTransaction = function() {
        $scope.showAddTransaction = true;
    };

    $scope.backAddTransaction = function() {
        $scope.showAddTransaction = false;
    };

});

app.controller('thisController', function($scope, $http, $filter,factory_userData) {
    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.months   = [{id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
        {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}];


    factory_userData.userJobs().success(function(data){
        $scope.items = data;
    })





    $scope.userAddData = function() {

        $.ajax({
            method: "POST",
            url: "/ajax/userName",
            data:  {    fname: $('#init_firstname').val() ,
                lname: $('#init_lastname').val(),
                job:   $('#jobtype').val()
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_2';
            });
    };


    $scope.statusAddData = function() {

        var bdate = $('#birthYear').val()+"-"+$('#birthMonth').val()+"-"+$('#birthDay').val();

        $.ajax({
            method: "POST",
            url: "/ajax/userStatus",
            data:  {    bdate:  bdate,
                gender: gender_flg,
                status: user_status
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_3';
            });
    };


    var cardData = [];
    var mthly_income ='';

    $scope.cardAddData = function() {

        if(cardData.length > 0)
        {
            cardData = JSON.parse(cardData);
        }

        $.ajax({
            method: "POST",
            url:    "/ajax/userFinance",
            data:   {
                mthlyInc:   $('#mthlyIncome').val(),
                currency:   $('#currencySelect').val(),
                cards:      cardData
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_4';
            });
    };


    $scope.spendableAddData = function() {
        $.ajax({
            method: "POST",
            url: "/ajax/userPlan",
            data:  {    mth_saving:     $('#mthlySaving').html(),
                mth_spending:   $('#mthlySpendable').html(),
                dd_spending:    $('#dailySpendable').html(),
                dd_saving:      $('#dailySaving').html()
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_complete';
            });
    };


    $http.get("/getAllTransactions")
        .success(function(response) {
            $scope.transactions = response;
            $scope.todaysTrans =  $filter('filter')($scope.transactions, {trans_date: $filter('date')(new Date(), 'yyyy-MM-dd')}, true);

            $scope.spentToday = 0;
            angular.forEach($scope.todaysTrans, function(value) {
                $scope.spentToday += value.amount;
            });

            $scope.remainingToday = $scope.userData.d_spendable - $scope.spentToday;

        }
    );

});