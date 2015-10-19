var app = angular.module('App',['ngAnimate','ngRoute','ng-mfb','ngMaterial','chart.js','ngSanitize','gm','ngMap']);


app.directive('yearDrop',function() {
    var currentYear = new Date().getFullYear();
    return {
        link: function (scope, element, attrs) {
            scope.years = [];
            for (var i = +attrs.offset; i < +attrs.range + 1; i++) {
                scope.years.push(currentYear + i);
            }
            scope.yearSelect = currentYear;
        },
        templateUrl: '/app/goal/travel/tpl_year.html'
    }
});



app.directive('zMonthSelect', function () {
    return {
        restrict: 'E',
        templateUrl: '/app/goal/travel/tpl_month.html'
    };
});



app.controller('goalSummary', function($scope, $http) {

    $http.get("/ajax/userGoals")
        .success(function(response) {
            $scope.userGoals = response;
            $scope.GoalCounted = $scope.userGoals.length;
        });

    $http.get("/ajax/getUserTargetGoal")
        .success(function(response) {
            $scope.userTargets = response;
        });

});

app.controller('goalController', function($scope, $http) {





    $http.get("/ajax/userGoals")
        .success(function(response) {
            $scope.userGoals = response;
        });

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });





    /*$scope.months   = [ {id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
                        {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}
                      ];*/
    $scope.goal_templates =
        [
            { name: 'Goal Summary',     url: '/app/html/card_goals/goal_summary.html'},
            { name: 'General Goal',     url: '/app/html/card_goals/goal_buying.html'},
            //{ name: 'Debts'     ,       url: '/app/html/card_goals/goal_debts.html'},
            { name: 'Travel'   ,        url: '/app/html/card_goals/goal_travel.html'},
            { name: 'Buy Home/Condo',   url: '/app/html/card_goals/goal_buyhome.html'},
            { name: 'Buy Car',          url: '/app/html/card_goals/goal_buycar.html'}
        ];
    $scope.goal_template = $scope.goal_templates[0];

});


app.controller('goalTargetController', function($scope, $http) {
    $scope.targetCal = {    targetPrice: 0,
                            targetNumPmt: 0,
                            targetInterest: 0,
                            targetWhere: ' '
                       };
    $scope.lat = undefined;
    $scope.lng = undefined;

    $scope.$on('gmPlacesAutocomplete::placeChanged', function(){
        var location = $scope.autocomplete.getPlace().geometry.location;
        $scope.lat = location.lat();
        $scope.lng = location.lng();
        $scope.$apply();
    });

    $scope.setGoalTarget = function ()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTarget",
            data:  {
                    targetPrice:        $('#targetPrice').val() ,
                    targetNumPmt:       $('#targetNumPmt').val(),
                    targetInterest:     $('#targetInterest').val(),
                    where:              $('#targetWhere').val()
                  }
        })
            .done(function( msg ) {
            });
    }
});


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


app.controller('goalAutoController', function($scope, $http) {
    $scope.autoCal = {  autoPrice: 0,
                        autoDPmt: 0,
                        autoNumPmt: 0,
                        autoInterest: 0,
                        autoPmt: 0
                    };
});



app.controller('profileController', function($scope, $http) {

    $scope.date = new Date();
    $scope.userData  = null;


    $http.get("/ajax/userGoals")
        .success(function(response) {
            $scope.userGoals = response;
        });

    $scope.float_buttons = [{
        label: 'Home',
        icon: 'ion-home',
        url: '/app/html/card_spendable.html'
    },{
        label: 'Account',
        icon: 'ion-plus',
        url: '/app/html/card_account.html'
    },{
        label: 'Goals',
        icon: 'ion-paperclip',
        url: '/app/html/card_goals.html'
    },{
         label: 'Transactions',
        icon: 'ion-calculator',
        url: '/app/html/card_transactionList.html'
    }];

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/todaySpending")
        .success(function(response) {
            $scope.d_spendable     = response[0]["d_spendable"];
            $scope.todaySpending   = response[0]["todaySpending"];
            $scope.todaySpendable  = $scope.d_spendable - $scope.todaySpending;

            if($scope.todaySpendable<0){ $scope.todaySpendable =0}
            //Chart
            var json = {
                //"series": ["SeriesA"],
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
                    animationSteps : 100,

                    //Boolean - Whether we animate the rotation of the Doughnut
                    animateRotate : true
                }



            };
            $scope.spendableDough = json;
        });

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });

    $http.get("/ajax/getUserTravelGoal")
        .success(function(response) {
            $scope.userTravelGoals = response;
        });

    $scope.nav = function(path) {
        $scope.template.url = path;
    };

    $http.get("/card/getCards")
        .success(function(response) {
            $scope.userCards = response;
        });

    $http.get("/bill/getBills")
        .success(function(response) {
            $scope.userBills = response;
        });

    $http.get("/bill/upComing")
        .success(function(response) {
            $scope.upComing = response;
        });
    $scope.templates =
        [
            //{ name: 'Home'              , url: '/app/html/card_home.html'},
            { name: 'Spendable'         , url: '/app/html/card_spendable.html'},
            { name: 'Account'           , url: '/app/html/card_account.html'},
            { name: 'Goals'             , url: '/app/html/card_goals.html'},
            { name: 'Transactions'      , url: '/app/html/card_transactions.html'},
            { name: 'Bills'             , url: '/app/bills/BillView.html'},
            { name: 'Credit cards'      , url: '/app/creditcards/CreditCardView.html'},
            { name: 'Edit'              , url: '/app/html/card_userEdit.html'}
        ];



    $scope.template = $scope.templates[0];





    $scope.addTransaction = function() {
        $scope.showAddTransaction = true;
    };

    $scope.backAddTransaction = function() {
        $scope.showAddTransaction = false;
    };

});

app.controller('thisController', function($scope, $http, $filter) {
    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.months   = [{id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
        {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}];

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/getUserJobs")
        .success(function(response) {
            $scope.items = response;
        });



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