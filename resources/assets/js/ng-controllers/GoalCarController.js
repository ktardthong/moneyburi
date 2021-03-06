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