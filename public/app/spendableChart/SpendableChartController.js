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


    //By default show the last 7 transaction
    $scope.showSpendableWeek();

})
.directive('spendableChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/app/spendableChart/tpl_spendableChart.html'
    };
});
