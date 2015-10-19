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
    };

    //By default show the last 7 transaction
    $scope.showSpendableWeek();
    $scope.showTodaySpending();
})
.directive('spendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/app/spendableChart/tpl_spendableChart.html'
    };
})

.directive('dailySpendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/app/spendableChart/tpl_dailySpendableChart.html'
    };
});
