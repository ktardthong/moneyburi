var app = angular.module('App',['ngAnimate','ngRoute','ng-mfb','ngMaterial','chart.js','ngSanitize','gm',
                                'ngMap','ngChartjsDirective','ngScrollbars']);

//http://www.bennadel.com/blog/2935-enable-animations-explicitly-for-a-performance-boost-in-angularjs.htm?utm_content=buffer6cd7e&utm_medium=social&utm_source=facebook.com&utm_campaign=buffer
app.config(
function configureAnimate( $animateProvider ) {
    $animateProvider.classNameFilter( /\banimated\b/ );
});

app.config(function($routeProvider){
    $routeProvider
        .when('/',{
            templateUrl: '/welcome'
        })
        .when('/login',{
            templateUrl: '/login'
        })
        .when('/register',{
            templateUrl: '/register'
        })
        .when('/Bills',{
            templateUrl: '/bill/billCard'
        })
        .when('/profile',{
            templateUrl: '/spendableCard'
        })
        .when('/CreditCard',{
            templateUrl: 'card/mainCard'
        })
        .when('/setup',{
            templateUrl: '/init_setup'
        })
        .when('/Transactions',{
            templateUrl: '/transCard'
        })
        .otherwise({
            template: '<div> Nothing here </div>'
        })
})


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



app.controller('profileController', function($scope, $http,factory_userData,factory_userGoals,
                                            factory_userBills,factory_utils,
                                            factory_userCards,
                                            factory_mfb,
                                            factory_userSpending,
                                            factory_transaction,
                                            $rootScope,$route, $routeParams, $location) {

    $scope.$route = $route;
    $scope.$location = $location;
    $scope.$routeParams = $routeParams;

    $scope.loc = function(href) {
        $location.path(href)
    }

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

    factory_userGoals.carBrandsList().success(function(data){
        $scope.carBrandsList = data;
    });

    factory_userBills.getBlls().success(function(data){
        $rootScope.rs_userBills = data;
    });

    /*factory_userBills.upComing().success(function(data){
        $scope.upComing = data;
    });*/

    factory_userBills.sumBills().success(function(data) {
        $rootScope.rs_sumBills = data;
    });

    factory_userBills.billCate().success(function(response) {
       $scope.billCate = response;
    });

    factory_userCards.getCards().success(function(data){
        $rootScope.userCards = data;
    });

    factory_userCards.ccIssuer().success(function(data){
        $scope.ccIssuer = data;
    });
    factory_userCards.ccTypes().success(function(data){
        $scope.ccTypes = data;
    });

    factory_userCards.sumMonthlyTransaction().success(function(data){
        $scope.sumAmountCC = data;
    });


    factory_transaction.userMonthlySpending().success(function(data){
        $rootScope.monthlyRemain = data[0]["mth_spendable"] - data[0]["monthSpending"]; //total - spent
        $rootScope.data_monthlhlySpent = data[0]["monthSpending"];
        var json = {
                    "data": [   data[0]["monthSpending"], data[0]["mth_spendable"] ],
                    "labels":   ["Spent", "Spendable"],
                    "colours":  ["#8D8D8D","#87D2DA"],
                    "option": {
                                responsive: true,
                                maintainAspectRatio: true,

                                //Boolean - Whether we should show a stroke on each segment
                                segmentShowStroke : true,

                                //String - The colour of each segment stroke
                                segmentStrokeColor : "#fff",

                                //Number - The width of each segment stroke
                                segmentStrokeWidth : 1,

                                //Number - The percentage of the chart that we cut out of the middle
                                percentageInnerCutout : 85, // This is 0 for Pie charts

                                //Number - Amount of animation steps
                                animationSteps : 10,

                                //Boolean - Whether we animate the rotation of the Doughnut
                                animateRotate : true
                            }
                    };
        $rootScope.rs_userMonthlySpending = json;
    });




    $scope.float_buttons = factory_mfb.mfb();

    factory_userSpending.dailySpending($scope);


    $scope.nav = function(path) {

        $scope.template.url = path;
    };

    $scope.templates =
        [
            { name: 'Spendable'         , url: '/spendableCard'},
            { name: 'Goals'             , url: '/goal/card_goal'},
            { name: 'Transactions'      , url: '/Transactions'},
            { name: 'Bills'             , url: '/Bills'},
            { name: 'Credit cards'      , url: '/CreditCard'},
        ];



    $scope.template = $scope.templates[0];

    $scope.addTransaction = function() {
        $scope.showAddTransaction = true;
    };

    $scope.backAddTransaction = function() {
        $scope.showAddTransaction = false;
    };

    $scope.initUpdate = function()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/InitUpdate",
            data:  {
                    job: $scope.userJobType,
                    flg:   $('#jobtype').val()
            }
        })
        .done(function( msg ) {
            window.location.href = '/';
        });
    }

    factory_transaction.pmtTypes().success(function(data) {
        $rootScope.pmtTypes = data;
    });
    factory_userBills.billCate().success(function(data) {
        $rootScope.cateCore = data;
    });
    factory_transaction.transTypes().success(function(data) {
        $rootScope.transTypes = data;
    });
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


app.directive('routeLoadingIndicator', function($rootScope) {
    return {
        restrict: 'E',
        template: $rootScope.moneyquote,
        replace: true,
        link: function(scope, elem, attrs) {
            scope.isRouteLoading = false;
            scope.isLoaded = false;

            $rootScope.$on('$routeChangeStart', function() {
                scope.isRouteLoading = true;
            });
            $rootScope.$on('$routeChangeSuccess', function() {
                scope.isRouteLoading = false;
                scope.isLoaded = true
            });
        }

  };
});


/*
* Angular Factory -
* */



app.factory('factory_userData', function($http) {
    return {
        userDataFactory: function(){
            return $http.get("/ajax/userData");
        },
        userJobs:function(){
            return $http.get("/ajax/getUserJobs");
        }
    }
})

app.factory('factory_userGoals', function($http) {
    return {
        userGoalsFactory: function () {
            return $http.get("/ajax/userGoals");
        },
        carBrandsList: function () {
            return $http.get("/goal/getCarBrands");
        }
    };
});

app.factory('factory_userBills', function($http) {

    return {
        getBlls: function () {
            return $http.get("/bill/getBills");
        },
        upComing: function (){
            return $http.get("/bill/upComing");
        },
        sumBills: function(){
            return $http.get("/bill/sumBillAmount");
        },
        billCate: function(){
          return $http.get("/ajax/billCate");
        }
    }
});

app.factory('factory_utils',function($http){
    return {
        getCurrency: function () {
            return $http.get("/ajax/currency");
        },
        upComing: function (){
            return $http.get("/bill/upComing");
        }
    }
});

app.factory('factory_transaction',function($http){
    return {
        userMonthlySpending:function(){
            return $http.get("/userMonthlySpending");
        },
        pmtTypes:function(){
            return $http.get("/ajax/pmtTypes");
        },
        transRepeat:function(){
            return $http.get("/ajax/transRepeat");
        },
        transTypes:function(){
            return $http.get("/ajax/transTypes");
        },
    }
})


app.factory('factory_userCards', function($http) {
    return {
        getCards: function (){
            return $http.get("/card/getCards");
        },
        ccIssuer: function(){
            return $http.get("/ajax/ccIssuer");
        },
        ccTypes: function(){
            return $http.get("/ajax/ccTypes");
        },
        sumMonthlyTransaction: function(){
            return $http.get("/card/sumMonthTransaction");
        }
    }
});

app.factory('factory_mfb',function($http){
    return {
            mfb: function (){

                return [{
                    label: 'Home',
                    icon: 'ion-home',
                    url: '/'
                }, {
                    label: 'Credit Card',
                    icon: 'ion-card',
                    url: '/CreditCard'
                }, {
                    label: 'Bills',
                    icon: 'ion-ios-list-outline',
                    url: '/Bills'
                }, {
                    label: 'Transactions',
                    icon: 'ion-calculator',
                    url: '/Transactions'
                }];
            }
        }
});

app.factory('factory_userSpending',function($http){

    return   {
                spendableFlg: false
            },
            {
                dailySpending: function($scope){
                return  $http.get("/todaySpending")
                        .success(function(response) {
                        var windowTodaySpending = typeof response[0]["todaySpending"] != 'undefined' ? response[0]["todaySpending"] : 0;
                        $scope.d_spendable     = response[0]["d_spendable"];
                        $scope.todaySpending   = windowTodaySpending;
                        $scope.todaySpendable  = $scope.d_spendable - $scope.todaySpending;

                        if($scope.todaySpendable<0){ $scope.todaySpendable =0}
                        //Chart
                        var json = {
                            "data": [$scope.todaySpending, $scope.todaySpendable],
                            "labels":   ["Spent", "Spendable"],
                            "colours":  ["#8D8D8D","#87D2DA"],
                            "option": {
                                responsive: true,
                                maintainAspectRatio: true,

                                //Boolean - Whether we should show a stroke on each segment
                                segmentShowStroke : true,

                                //String - The colour of each segment stroke
                                segmentStrokeColor : "#fff",

                                //Number - The width of each segment stroke
                                segmentStrokeWidth : 2,

                                //Number - The percentage of the chart that we cut out of the middle
                                percentageInnerCutout : 80, // This is 0 for Pie charts

                                //Number - Amount of animation steps
                                animationSteps : 80,

                                //Boolean - Whether we animate the rotation of the Doughnut
                                animateRotate : true
                            }



                        };
                        $scope.spendableDough = json;
                    });
            }
   }
});
app.controller('billController', function($scope, $http,$rootScope,factory_userBills,$route, $routeParams, $location) {


    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.displayAddNewBill = false;

    $rootScope.ng_billAmount =0;
    $rootScope.ng_billCate =1;
    $rootScope.ng_billDue =1;

    $rootScope.showBill     = false;
    $rootScope.billOverview = true;

    $scope.listBillStatus = $rootScope.rs_userBills;

    $scope.bill_labels   = 0;
    $scope.bill_data     = 0;



    //Recal bill to be us in dough
    $scope.billReCal = function(){

        $scope.bill_labels   = null;
        $scope.bill_data     = null;
        factory_userBills.getBlls().success(function(data) {

        var jsondata = data;
        var bill_name=[];
        var bill_amount=[];

        for (var i = 0, l = jsondata.length; i < l; i++) {
            bill_name[i]   = jsondata[i].name;
            bill_amount[i] = jsondata[i].amount;
        }

        var billData = {
            labels : bill_name,
            value :   bill_amount

        }

        $scope.bill_labels   = bill_name;
        $scope.bill_data     = bill_amount;

        console.log($scope.bill_labels);
        console.log($scope.bill_data);
        });
    }


    $scope.billStatus = function($billlstatus)
    {
        if($billlstatus=='') {
            $scope.listBillStatus = $rootScope.rs_userBills;
        }
        else {
            $.ajax({
                method: "POST",
                url: "/bill/billStatus",
                async: false,
                cache: false,
                data: {

                    bill_status: $billlstatus
                }
            })
            .done(function (msg) {
                $scope.listBillStatus = JSON.parse(msg);
            });
        }
    }


    //Check if the value user enter is not negative
    $scope.checkVal = function()
    {
        if($scope.ng_billAmount > 0)
        {
            var amt = $rootScope.rs_mthlyIncome - $rootScope.rs_mthlySaving - $scope.ng_billAmount;
            if(amt > 0)
            {
                $scope.displayAddNewBill = true;
            }
            else
            {
                $scope.displayAddNewBill = false;
            }
        }
        else
        {
            $scope.displayAddNewBill = false;
        }
    }

    //Add the bill
    $scope.addBill = function() {

        $.ajax({
            method: "POST",
            url: "/ajax/addBills",
            data:  {

                amount:     $scope.ng_billAmount,
                cateId:     $scope.ng_billCate,
                due_date:   $scope.ng_billDue
            }
        })
        .done(function( msg ) {
            factory_userBills.sumBills().success(function(data) {
                $rootScope.rs_sumBills     =   data;
                $rootScope.calPie();
            });

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
                //$rootScope.billOverview = true;
                $rootScope.showBill = false;
            });

                $scope.billReCal();
        });
        $('#userBillUpdate').effect("highlight", {color:'#F6C13C'}, 3500);
    };

    //undoRemove bill
    $scope.undoRemove = function(data){

        $.ajax({
            method: "POST",
            url: "/ajax/undoRemoveBills",
            data:  {
                billId:     data
            }
        })
        .done(function( msg ) {

            factory_userBills.sumBills().success(function(data) {
                $rootScope.rs_sumBills = data;
            });

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
            });
            $('#userBillUpdate').effect("highlight", {color:'#F6C13C'}, 2000);

        });
    }

    //Remove bill
    $scope.removeBill = function(data){

        $.ajax({
            method: "POST",
            url: "/ajax/removeBills",
            data:  {
                billId:     data
            }
        })
        .done(function( msg ) {

            factory_userBills.sumBills().success(function(data) {
                $rootScope.rs_sumBills = data;
            });

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
            });
            $('#userBillUpdate').effect("highlight", {color:'#F6C13C'}, 3500);
            $scope.billReCal();
        });
    }

    $scope.billReCal();
})


.directive('billView',function(){
    return {
        restrict: 'E',
        templateUrl: '/bill/viewBills'
    };
})

.directive('userBill', function() {
    return {
        restrict: 'E',
        templateUrl: '/bill/userBill'
    };
})

.directive('billList', function() {
    return {
        restrict: 'E',
        templateUrl: '/bill/tpl_billList'
    };
})
.directive('billCompactList',function(){
    return {
        restrict: 'E',
        templateUrl: '/bill/billCompactList'
    };
})
.directive('cardSelect',function(){
    return {
        restrict: 'E',
        templateUrl: '/app/bills/tpl_cardSelect.html'
    };
});



app.controller('CardController', function($scope,$http,$mdDialog,factory_userCards) {

    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];

    $scope.cardItem = [];

    //Remove card
    $scope.removeCard = function(container_id){

        $.ajax({
            method: "POST",
            url: "/card/removeCard",
            data:  {
                cardId: container_id
            }
        })

        .done(function( msg ) {
            factory_userCards.getCards().success(function(data){
                $rootScope.userCards = data;
            });
        });
    };

    //Undo Remove card
    $scope.undoRemoveCard = function(container_id){

        $.ajax({
            method: "POST",
            url: "/card/undoRemoveCard",
            data:  {
                cardId: container_id
            }
        })

        .done(function( msg ) {

        });
    };

    $scope.addCard = function() {

        $.ajax({
            method: "POST",
            url: "/card/addCard",
            async:false,
            data:  {

                type:       $scope.ng_ccTypes,
                issuer:     $scope.ng_ccIssuer,
                cclimit:    $scope.ng_cardLimit,
                ccnote:     $scope.ng_cardNote,
                billDue:    $('#billDue').val(),
                expMth:     $scope.expMonth,
                expYear:    $scope.expYear,
                lastFour:   $scope.lastFour
            }
        })

        .done(function( msg ) {
            $scope.cardListShow = true;
            factory_userCards.getCards().success(function(data){
                //$rootScope.userCards = data;
            });
        });

        /*$http.get("/card/getCards")
            .success(function(response) {
                $scope.userCards = response;
        });*/
    };

    $scope.showAdvanced = function(ev,card) {

        $scope.card_edit = card;
        $mdDialog.show({
            controller: DialogController,
            templateUrl: '/app/creditcards/edit_card.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            scope: $scope
        })
        .then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        })
    };


    function DialogController($scope, $mdDialog) {
        //$scope.card_edit = card;

        $scope.hide = function () {
            $mdDialog.hide();
        };
        $scope.cancel = function () {
            $mdDialog.cancel();
        };
        $scope.answer = function (answer) {
            $mdDialog.hide(answer);
            console.log(answer);
        };
    }
})
.directive('cardList', function() {
    return {
        restrict: 'E',
        templateUrl: '/card/tpl_cardList'
    };
});

app.controller('goalTargetController', function($scope, $http) {


    $scope.targetCal = {
        targetPrice: 0,
        targetNumPmt: 0,
        targetInterest: 0,
        targetWhere: ' '
    };

    $scope.lat = undefined;
    $scope.lng = undefined;

    /*
     * Autocomplete location
     * */
    $scope.$on('gmPlacesAutocomplete::placeChanged', function () {
        var location = $scope.targetWhereBuying.getPlace().geometry.location;
        $scope.lat = location.lat();
        $scope.lng = location.lng();
        $scope.$apply();
    });


    $scope.goalCal = function(){

        $scope.mthDiff = Math.round(Math.abs(moment().diff(moment([$scope.buying_years, $scope.buying_months, 1]), 'months', true)));
        $scope.mthPmt = $scope.targetPrice/$scope.mthDiff;
        $scope.travelLocation = $('#travelLocation').val();
        $scope.goalSubmit = true;

    }


    //Submit goal
    $scope.setGoalTarget = function () {

        $scope.success = true;
        $scope.showEdit = false;

        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTarget",
            data: {
                    targetName:     $scope.targetName,
                    targetPrice:    $scope.targetPrice,
                    targetNumPmt:   $scope.mthPmt,
                    savingMth:      $scope.savingMonth,
                    where:          $scope.targetWhere,
                    lat:            $scope.lat,
                    lng:            $scope.lng,
                    periods:        $scope.mthDiff,
                    monthSelect:    $scope.buying_months,
                    yearSelect:     $scope.buying_years
                }
        })
        .done(function (msg) {
        });
    }
});


/*
 * Directives for this control
 */

app.directive('buyingYearDrop',function() {
    var currentYear = new Date().getFullYear();
    return {
        link: function (scope, element, attrs) {
            scope.years = [];
            for (var i = +attrs.offset; i < +attrs.range + 1; i++) {
                scope.years.push(currentYear + i);
            }
            scope.yearSelect = currentYear;
        },
        templateUrl: '/app/goal/buying/tpl_year.html'
    }
});



app.directive('buyingMonthSelect', function () {
    return {
        restrict: 'E',
        templateUrl: '/app/goal/buying/tpl_month.html'
    };
});




app.controller('goalAutoController', function($scope,$rootScope, $http) {

    $scope.autoInit = {
        autoPrice: 0,
        autoDPmt: 0,
        autoNumPmt: 0,
        autoInterest: 0,
        autoPmt: 0
    };

    $scope.carCal = function(){
        $scope.spendableDay = $rootScope.rs_userData.d_spendable - (($scope.autoPrice/$scope.car_month)/30);
    };

    $scope.addCarGoal = function()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/setCarGoal",
            data: {
                brand:          $scope.autoBrand,
                price:          $scope.autoPrice,
                duration:       $scope.car_month,
                model:          $scope.autoModel,
                savingMth:      $scope.autoPrice/$scope.car_month
            }
        })
            .done(function (msg) {
            });
    }
});
/*

*/
app.controller('goalHomeController', function($scope, $http) {
    $scope.homeCal = {
        //homePrice: 0,
        //homeDPmt: 0,
        //homeLoan: homePrice - homeDPmt,
        //homeInterest: 0,
        //homePmtDuration:0,
        //homeMthPmt: 0
    };
});




app.controller('goalController', function($scope,$rootScope,$http,factory_userGoals ) {

    $scope.userGoals;

    //Remove user goal
    $scope.removeGoal = function(goal)
    {
        var adjustedSpendable = Number($rootScope.rs_userData.d_spendable) + Number(goal.mth_saving/30);

        $rootScope.rs_userData.d_spendable = adjustedSpendable;

        $.ajax({
            method: "POST",
            url: "/ajax/removeGoal",
            data:  {
                remove: 1,
                goal: goal,
                adjusted: adjustedSpendable
            }
        });

    }

    $scope.undoGoalRemove = function(goal)
    {
        var adjustedSpendable = Number($rootScope.rs_userData.d_spendable) - Number(goal.mth_saving/30);
        $.ajax({
            method: "POST",
            url: "/ajax/removeGoal",
            data:  {
                remove: 0,
                goal: goal,
                adjusted: adjustedSpendable
            }
        });

        $rootScope.rs_userData.d_spendable = adjustedSpendable;
    }


    //Get active goals
    $scope.getActiveGoals = function()
    {
        factory_userGoals.userGoalsFactory().success(function(data){
            $scope.userGoals=data;
        });
    };

    //Get completed goal
    $scope.getCompletedGoal = function()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/showCompletedGoal",
            async: false,
            data:  {
                active_goal_flg: 0
            }
        })
        .done(function( msg ) {
            $scope.userGoals=JSON.parse(msg);
        });
    };

    $scope.momentFormat = function(date){
        return moment(date).format("MMM DD, YYYY ");
    };

    $scope.momentMonth = function(created_at,duration){
        return moment(created_at).add(duration, 'months').format(" MMM DD, YYYY");
    };

    $scope.goal_templates =
        [
            { name: 'Goal Summary',     url: '/goal/goal_summary'},
            { name: 'General Goal',     url: '/goal/goal_buying'},
            //{ name: 'Debts'     ,       url: '/app/html/card_goals/goal_debts.html'},
            { name: 'Travel'   ,        url: '/goal/goal_travel'},
            { name: 'Buy Home/Condo',   url: '/goal/goal_buyhome'},
            { name: 'Buy Car',          url: '/goal/goal_buycar'}
        ];
    $scope.goal_template = $scope.goal_templates[0];

});


app.controller('goalTravelController', function($scope, $rootScope, $log) {

    $scope.lat = undefined;
    $scope.lng = undefined;
    $scope.travelLocation = '';

    $scope.$on('gmPlacesAutocomplete::placeChanged', function(){
        var location = $scope.travelLocation.getPlace().geometry.location;
        $scope.lat = location.lat();
        $scope.lng = location.lng();
        $scope.$apply();
    });

    $scope.savingMonth = 0;


    $scope.travelSavingCal = function() {

        $scope.mthDiff = Math.round(Math.abs(moment().diff(moment([$scope.travel_years, $scope.travel_months, 1]), 'months', true)));
        $scope.mthPmt = $scope.travelAmount/$scope.mthDiff;
        $scope.travelLocation = $('#travelLocation').val();

    }


    $( "#travelAmount" ).keyup(function() {
        $scope.travelSavingCal();
    });

    $( "#monthSelect" ).change(function() {
        $scope.travelSavingCal();
    });

    $( "#yearSelect" ).change(function() {
        console.log("test");
        $scope.travelSavingCal();
    });

    $scope.getGoalDropDown = function() {
        console.log($scope.goal_template);
    };

    $scope.setGoalTravel = function() {

        $scope.travelGoalForm = false;
        $scope.addTravelGoal = true;

        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTravel",

            data:  {    travelLocation: $('#travelLocation').val() ,
                        travelAmount:   $('#travelAmount').val(),
                        travelPax:      $('#travelPax').val(),
                        travelNights:   $('#travelNights').val(),
                        travelSavingMth:$scope.savingMonth,
                        lat:            $scope.lat,
                        lng:            $scope.lng,
                        periods:        $scope.mthDiff,
                        monthSelect:    $scope.travel_months,
                        yearSelect:     $scope.travel_years
            }
        })
        var adjustedSpendable = Number($rootScope.rs_userData.d_spendable) - Number($scope.savingMonth/30);
        $rootScope.rs_userData.d_spendable = adjustedSpendable;
    };
});




//Spendable
var spendableDate  =[];
var spendableAmount=[];
var spendableRemain=[];


var weeklySpendable=[];
var weeklyDate=[];
var weeklyAmount=[];
var weeklyRemain=[];

app.controller('spendableChartController', function($scope, $http,$window) {


    $scope.showSpendableWeek = function(){
        $http.get("/spendableTracker/get")
            .success(function (response) {
                $window.weeklySpendable = response;

                //Getting the date
                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyDate[i] = weeklySpendable[i].date;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyAmount[i] = weeklySpendable[i].spendable;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyRemain[i] = weeklySpendable[i].remain;
                }
            });
        $scope.labels = weeklyDate;
        $scope.data = [
            weeklyAmount,
            weeklyRemain
        ];
    };

    $scope.showSpendableMonth = function(){

        $http.get("/spendableTracker/getMonth")
            .success(function (response) {

                $window.spendableData = response;

                //Getting the date
                for (i = 0; i < spendableData.length; i++) {
                    spendableDate[i] = spendableData[i].date;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableAmount[i] = spendableData[i].spendable;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableRemain[i] = spendableData[i].remain;
                }
            });
            $scope.labels = spendableDate;
            $scope.data = [
                spendableAmount,
                spendableRemain
            ];
    };


    $scope.showTodaySpending = function(){
        $http.get("/todaySpending")
            .success(function(response) {
                $scope.d_spendable     = response[0]["d_spendable"];
                $scope.todaySpending   = response[0]["todaySpending"];
                $scope.todaySpendable  = $scope.d_spendable - $scope.todaySpending;

                if($scope.todaySpendable<0){ $scope.todaySpendable =0}

                //Chart
                var json = {
                    "data": [  $scope.todaySpending, $scope.todaySpendable],
                    "labels":   ["Spent", "Spendable"],
                    "colours":  ["#8D8D8D","#87D2DA"],
                    "option": {
                        responsive: true,
                        maintainAspectRatio: true,

                        //Boolean - Whether we should show a stroke on each segment
                        segmentShowStroke : true,

                        //String - The colour of each segment stroke
                        segmentStrokeColor : "#fff",

                        //Number - The width of each segment stroke
                        segmentStrokeWidth : 2,

                        //Number - The percentage of the chart that we cut out of the middle
                        percentageInnerCutout : 80, // This is 0 for Pie charts

                        //Number - Amount of animation steps
                        animationSteps : 100,

                        //Boolean - Whether we animate the rotation of the Doughnut
                        animateRotate : true
                    }



                };
                $scope.spendableDough = json;
            });
    };

    //By default show the last 7 transaction
    $scope.showSpendableWeek();
    $scope.showTodaySpending();
})
.directive('spendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/spendableChart'
    };
})

.directive('dailySpendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/dailySpendableDough'
    };
});

//Spendable
var spendableDate  =[];
var spendableAmount=[];
var spendableRemain=[];


var weeklySpendable=[];
var weeklyDate=[];
var weeklyAmount=[];
var weeklyRemain=[];

app.controller('spendingCategoriesChartController', function($scope, $http,$window) {


    $scope.showSpendableWeek = function(){
        $http.get("/spendableTracker/get")
            .success(function (response) {
                $window.weeklySpendable = response;

                //Getting the date
                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyDate[i] = weeklySpendable[i].date;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyAmount[i] = weeklySpendable[i].spendable;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyRemain[i] = weeklySpendable[i].remain;
                }
            });
        $scope.labels = weeklyDate;
        $scope.data = [
            weeklyAmount,
            weeklyRemain
        ];
    };

    $scope.showSpendableMonth = function(){

        $http.get("/spendableTracker/getMonth")
            .success(function (response) {

                $window.spendableData = response;

                //Getting the date
                for (i = 0; i < spendableData.length; i++) {
                    spendableDate[i] = spendableData[i].date;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableAmount[i] = spendableData[i].spendable;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableRemain[i] = spendableData[i].remain;
                }
            });
            $scope.labels = spendableDate;
            $scope.data = [
                spendableAmount,
                spendableRemain
            ];
    };


    //By default show the last 7 transaction
    $scope.showSpendableWeek();

    var randomScalingFactor = function(){
        return Math.round(Math.random()*100);
    };
    //var barChartData = {
    //    labels : ["Food","Shopping","Groceries","Health","Utilities","Entertainment","Travel"],
    //    datasets : [
    //        {
    //            fillColor : "rgba(220,220,220,0.5)",
    //            strokeColor : "rgba(220,220,220,0.8)",
    //            highlightFill: "rgba(220,220,220,0.75)",
    //            highlightStroke: "rgba(220,220,220,1)",
    //            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    //        },
    //        {
    //            fillColor : "rgba(151,205,151,0.5)",
    //            strokeColor : "rgba(151,205,151,0.8)",
    //            highlightFill : "rgba(151,205,151,0.75)",
    //            highlightStroke : "rgba(151,205,151,1)",
    //            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    //        }
    //    ]
    //};
    //
    //
    //var ctx = angular.element($('#barChart')).getContext('2d');
    //    //document.getElementById("barChart").getContext("2d");
    //var hBarChart = new Chart(ctx).HorizontalBar(barChartData, {
    //        responsive: true,
    //        barShowStroke: false
    //    });
    //

    $scope.c_options = {
        "responsive": true,
        "barShowStroke": false,
        "scaleShowHorizontalLines": false,
        "legendTemplate" : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };



    $scope.chart = {
        title: "Chart",
        type: "HorizontalBar",
        height: 200,
        //"width": 600,
        options: {
            chart: {
                events: {}
                //responsive: true,
                //barShowStroke: false,
                //scaleShowHorizontalLines: false
            },
            responsive: true,
            barShowStroke: false,
            scaleShowHorizontalLines: false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

        },
        data: {
            labels: ["Food","Shopping","Groceries","Health","Utilities","Entertainment","Travel"],
            datasets: [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,0)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,0)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                },
                {
                    fillColor : "rgba(151,205,151,0.5)",
                    strokeColor : "rgba(151,205,151,0)",
                    highlightFill : "rgba(151,205,151,0.75)",
                    highlightStroke : "rgba(151,205,151,0)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                }
            ]
        }
    }

})
.directive('spendingCategoriesChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/spendingCateChart'
    };
});

/**
 * Created by cholathit on 10/15/15.
 */

app.controller('transactionController', function($scope, $http, $filter, $rootScope, factory_transaction, factory_userBills, factory_utils, $route, $routeParams, $location) {
    //$scope.pageClass = 'show-transaction';

    $scope.cateCore = $rootScope.cateCore;
    //$http.get("/ajax/billCate")
    //    .success(function(response) {
    //        $scope.cateCore = response;
    //    });

    $scope.transRepeat = $rootScope.transRepeat;
            //$http.get("/ajax/transRepeat")
    //    .success(function(response) {
    //        $scope.transRepeat = response;
    //    });

    $scope.pmtTypes = $rootScope.pmtTypes;
    //factory_transaction.pmtTypes().success(function(data) {
    //        $scope.pmtTypes = data;
    //        //console.log(data);
    //    });

    $scope.transTypes =  $rootScope.transTypes;
    //$http.get("/ajax/transTypes")
    //    .success(function(response) {
    //        $scope.transTypes = response;
    //    });

    $scope.creditCards = $rootScope.userCards;
    //$http.get("/card/getCards")
    //    .success(function(response) {
    //        $scope.creditCards = response;
    //    });

    $scope.bills = $rootScope.rs_userBills;
    //$http.get("/bill/getBills")
    //    .success(function(response) {
    //        $scope.bills = response;
    //    });

    /*$http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });*/

    factory_utils.getCurrency().success(function(data){
        $scope.currencies=data;
    });

    $scope.listData = [];

    $scope.listDataPopulate = function (data){
        angular.forEach(data, function(value){
            //$scope.count++;
            var obj = {
                cate_id:          value.cate_id,
                cate_obj:         $filter('filter')($scope.cateCore, {id: value.cate_id}, true),
                trans_type:       value.trans_type,
                trans_type_obj:   $filter('filter')($scope.transTypes, {id: value.trans_type}, true),
                trans_repeat:     value.trans_repeat,
                trans_repeat_obj:    $filter('filter')($scope.transRepeat, {id: value.trans_repeat}, true),
                pmt_type:         value.pmt_type,
                pmt_type_obj:     $filter('filter')($scope.pmtTypes, {id: value.pmt_type}, true),
                amount:           value.amount,
                //location:         value.location,
                note:             value.note,
                trans_date:       value.trans_date,
                created_at:       value.created_at,
                currency:         $filter('filter')($scope.currencies, {id: $scope.userData.currency}, true),
                //location:         value.location,
                //cityName:         value.cityName,
                //countryCode:      value.countryCode,
                //postalCode:       value.postalCode,
                //lat:              value.lat,
                //lng:              value.lng,
                location_provider:value.location_provider,
                location_id:      value.location
            };
            $scope.listData.push(obj);
        });
    };

    $scope.defaultPmtType = 1;
    $scope.defaultTransType = 1;

    $scope.selectedPmtType = $scope.defaultPmtType;
    $scope.selectedTransType = $scope.defaultTransType;

    $scope.pmtSelected = function(id){
        $scope.selectedPmtType = id;
    };

    $scope.transSelected = function(id){
        $scope.selectedTransType = id;
    };

    $scope.trans_date = new Date();
    $scope.selectedCC = 0;
    $scope.selectedBill = 0;
    $scope.selectedCate = 0;

    $scope.doAdd = function() {
        var obj = {
            cate_id:        $scope.cate_id,    //$('#cate_id').val(),
            trans_type:     $scope.selectedTransType, //$('#trans_type').val(),
            //trans_repeat:   $scope.trans_repeat.id,    //$('#trans_repeat').val(),
            pmt_type:       $scope.selectedPmtType, //$('#pmt_type').val(),
            cc_id:          $scope.selectedCC,
            bill_id:        $scope.selectedBill,
            amount:         $scope.amount,
            //location:       $scope.location,
            note:           $scope.note,
            trans_date:     $filter('date')($scope.trans_date, 'yyyy-MM-dd'),
            //cityName:       $scope.cityName,
            //postalCode:     $scope.postalCode,
            //countryCode:    $scope.countryCode,
            //lat:            $scope.lat,
            //lng:            $scope.lng,
            location_provider: $scope.location_provider,
            location:       $scope.location_id

    };
        $.ajax({
            method: "POST",
            url: "/add_transaction",
            data:  obj
        })
            .done(function( msg ) {
                //alert('save!');
                //$scope.listData.push(obj);
                //window.location.href = '/profile';
                $http.get("/getAllTransactions")
                    .success(function(response) {
                        $scope.listDataPopulate(response);
                    }
                );

            });
    };

    $http.get("/getAllTransactions")
        .success(function(response) {
            $scope.listDataPopulate(response);
        }
    );

    $scope.getCateIcon = function(cateId){
        var iconSet = [
            {id: 1,     name: "Transport",          fa: "fa fa-bus"},
            {id: 2,     name: "Food",               fa: "fa fa-cutlery"},
            {id: 3,     name: "Shopping",           fa: "fa fa-tag"},
            {id: 4,     name: "Groceries",          fa: "fa fa-shopping-cart"},
            {id: 5,     name: "Entertainment",      fa: "fa fa-film"},
            {id: 6,     name: "Travel",             fa: "fa fa-plane"},
            {id: 7,     name: "Health",             fa: "fa fa-heartbeat"},
            {id: 8,     name: "Beauty",             fa: "fa fa-diamond"},
            {id: 9,     name: "Utility - Electric", fa: "fa fa-bolt"},
            {id: 10,    name: "Utility - Internet", fa: "fa fa-wifi"},
            {id: 11,    name: "Utility - Phone",    fa: "fa fa-phone"},
            {id: 12,    name: "Utility - Water",    fa: "fa fa-tint"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: cateId}, true);
        return selectedIcon[0].fa;
    };


    $scope.getPmtIcon = function(pmtId){
        var iconSet = [
            {id: 1,     name: "Cash",          fa: "fa fa-money"},
            {id: 2,     name: "Credit Card",   fa: "fa fa-credit-card"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: pmtId}, true);
        return selectedIcon[0].fa;
    };

    $scope.getTransTypeIcon = function(transTypeId){
        var iconSet = [
            {id: 1,     name: "Expense",  fa: "fa fa-minus-square"},
            {id: 2,     name: "Income",   fa: "fa fa-plus-square"},
            {id: 3,     name: "Bill",     fa: "fa fa-minus-square"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: transTypeId}, true);
        return selectedIcon[0].fa;
    };

    $scope.propertyIcons = function(name){
        var iconSet = [
            {name: "location",  fa: "fa fa-map-marker"},
            {name: "note",  fa: "fa fa-comment"},
            {name: "datetime",  fa: "fa fa-clock"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {name: name}, true);
        return selectedIcon[0].fa;
    };

    $scope.cateColor = function(cateId){
        var colors = [
            {id: 1,     name: "Transport",          color: {name: "Pastel Green", code: "#77DD77"}},
            {id: 2,     name: "Food",               color: {name: "Medium Spring Bud", code: "#C9DC87"}},
            {id: 3,     name: "Shopping",           color: {name: "Pastel Yellow", code: "#FDFD96"}},
            {id: 4,     name: "Groceries",          color: {name: "Pastel Brown", code: "#836953"}},
            {id: 5,     name: "Entertainment",      color: {name: "Dark Pastel Blue", code: "#779ECB"}},
            {id: 6,     name: "Travel",             color: {name: "Yankees Blue", code: "#1C2841"}},
            {id: 7,     name: "Health",             color: {name: "Medium Ruby", code: "#AA4069"}},
            {id: 8,     name: "Beauty",             color: {name: "Light Pastel Purple", code: "#B19CD9"}},
            {id: 9,     name: "Utility - Electric", color: {name: "Pastel Gray", code: "#CFCFC4"}},
            {id: 10,    name: "Utility - Internet", color: {name: "Pastel Blue", code: "#AEC6CF"}},
            {id: 11,    name: "Utility - Phone",    color: {name: "Medium Turquoise", code: "#48D1CC"}},
            {id: 12,    name: "Utility - Water",    color: {name: "Rackley", code: "#5D8AA8"}}
        ];
        var selectedIcon = $filter('filter')(colors, {id: cateId}, true);
        return selectedIcon[0].color.code;
    };

    $scope.location_id = null;
    $scope.location_provider = null;


    $scope.$on('gmPlacesAutocomplete::placeChanged', function(){

        $scope.location_id = $scope.location.getPlace().id;
        $scope.location_provider = 'Google';
        $scope.$apply();
    });

    //$scope.scrollHeight = 200; //default

    $scope.scroll_config = {
        autoHideScrollbar: false,
        theme: 'rounded-dark',
        advanced:{
            updateOnContentResize: true
        },
        setHeight: 200,
        setWidth: '100%',
        //setLeft: '-20%',
        scrollInertia: 0,
        alwaysShowScrollbar: 0,
        axis: 'y',
        mouseWheel:{ enable: true },
        keyboard:{ enable: true },
        contentTouchScroll: 25,
        scrollButtons:{ enable: false }

    };

})

.directive('transList', function() {
        return {
            restrict: 'E',
            templateUrl: '/transList'
        };
})

.directive('addTrans', function() {
        return {
            restrict: 'E',
            templateUrl: '/addTrans',
            scope: false
        };
})

.directive('addBillTrans', function() {
    return {
        restrict: 'AEC',
        templateUrl: '/addTrans',
        scope: {
            bill: '='
        },
        link: function($scope, element, attrs, controller, transcludeFn) {

        },
        controller: function($scope,factory_transaction,$rootScope,factory_utils){
            console.log($scope.bill);
            $scope.cateCore = $rootScope.cateCore;
            $scope.pmtTypes = $rootScope.pmtTypes;
            $scope.transTypes =  $rootScope.transTypes;
            $scope.creditCards = $rootScope.userCards;
            $scope.bills = $rootScope.rs_userBills;

            factory_utils.getCurrency().success(function(data){
                $scope.currencies=data;
            });

            $scope.amount = parseFloat($scope.bill.amount);

            $scope.pmtSelected = function(id){
                $scope.selectedPmtType = id;
            };

            $scope.transSelected = function(id){
                $scope.selectedTransType = id;
            };

            $scope.defaultPmtType = 1;
            $scope.defaultTransType = 3;

            $scope.trans_date = new Date();
            $scope.selectedCC = 0;
            $scope.selectedBill = $scope.bill.id;
            $scope.selectedCate = $scope.bill.cateId;
        }

    };
})

.directive('transRecent', function() {
        return {
            restrict: 'E',
            templateUrl: '/transRecent'
        };
})

.directive('monthlySpendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/monthlySpendableChart'
    };
});
app.controller('userController', function($scope,factory_userSpending,$rootScope) {


    if($scope.userData.mth_income != 0) {
        $rootScope.rs_mthlyIncome = $scope.userData.mth_income;
    }
    else{
        $rootScope.rs_mthlyIncome = $scope.rs_mthlyIncome;
    }

    $rootScope.rs_mthlySaving  =   $scope.userData.mth_saving;

    $scope.ng_spendable =   $rootScope.rs_mthlyIncome - $rootScope.rs_sumBills - $rootScope.rs_mthlySaving - $rootScope.rs_userData.goal_saving;

    $scope.currency     =   $scope.userData.currency;

    $scope.ng_userfname    =    $scope.userData.firstname;
    $scope.ng_userlname    =    $scope.userData.lastname;
    $scope.ng_email        =    $scope.userData.email;


    $scope.labels = ["Bill", "Saving", "Spendable","Goal Saving"];
    $scope.colours=  ["#8D8D8D","#87D2DA","#1594A8","#C7E8EA"];
    $scope.data = [ $rootScope.rs_sumBills, $rootScope.rs_mthlySaving,$scope.ng_spendable,$rootScope.rs_userData.goal_saving];


    //Delay the highlight on keyup
    var typewatch = function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        }
    }();


    $rootScope.calPie = function(){
        $scope.ng_spendable =   $rootScope.rs_mthlyIncome - $rootScope.rs_sumBills - $rootScope.rs_mthlySaving - $rootScope.rs_userData.goal_saving;

        $scope.labels = ["Bill", "Saving", "Spendable","Goal Saving"];
        $scope.data = [ $rootScope.rs_sumBills, $rootScope.rs_mthlySaving,$scope.ng_spendable,$rootScope.rs_userData.goal_saving];

        $rootScope.rs_mthlyIncome = $scope.rs_mthlyIncome;

        typewatch(function()
        {
        $('#editMonthlySpendable').effect("highlight", {color:'#F6C13C'}, 1500);
        $('#editDaySpendable').effect("highlight", {color:'#F6C13C'}, 1500);
        $('#editDaySaving').effect("highlight", {color:'#F6C13C'}, 1500);
        }, 1200 );
    };

    $scope.saveUserData = function(){
        $.ajax({
            method: "POST",
            url: "/ajax/updateUserData",
            data:  {
                firstname:      $scope.ng_userfname ,
                lastname:       $scope.ng_userlname ,
                email:          $scope.ng_email,
                job:            $scope.userJobType
            }
        })
        .done(function( msg ) {

            $("#userdata_alert_message").show();

            window.setTimeout(function() {
                $("#userdata_alert_message" +
                "").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);
        });
    }

    $scope.saveInfo = function (){
        $scope.ng_spendable = $scope.rs_mthlyIncome - $scope.rs_sumBills - $scope.rs_mthlySaving;
        $.ajax({
            method: "POST",
            url: "/ajax/updateUserInfo",
            data:  {
                editMonthlyIncome:      $scope.rs_mthlyIncome,
                editMonthlyBill:        $scope.rs_sumBills,
                editMonthlySaving:      $scope.rs_mthlySaving,
                editMonthlySpendable:   $scope.ng_spendable,
                editDaySaving:          $scope.rs_mthlySaving/30,
                editDaySpendable:       $scope.ng_spendable/30,
                currency:               $scope.ng_currency
            }
        })
            .done(function( msg ) {
                $("#alert_message").show();

                window.setTimeout(function() {
                    $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 3000);
            });
    }
});


//# sourceMappingURL=all.js.map
