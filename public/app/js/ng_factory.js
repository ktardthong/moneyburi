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
        userTravelLocation: function () {
            return $http.get("/ajax/getUserTravelGoal");
        },
        userTargetGoals: function (){
            return $http.get("/ajax/getUserTargetGoal");
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
        }
    }
});

app.factory('factory_mfb',function($http){
    return {
            mfb: function (){

                return [{
                    label: 'Home',
                    icon: 'ion-home',
                    url: '/app/html/card_spendable.html'
                }, {
                    label: 'Account',
                    icon: 'ion-plus',
                    url: '/app/html/card_account.html'
                }, {
                    label: 'Goals',
                    icon: 'ion-paperclip',
                    url: '/app/html/card_goals.html'
                }, {
                    label: 'Transactions',
                    icon: 'ion-calculator',
                    url: '/app/html/card_transactionList.html'
                }];
            }
        }
});

app.factory('factory_userSpending',function($http){
   return {
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
        }
   }
});