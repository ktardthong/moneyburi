app.controller('goalTargetController', function($scope, $http) {


    $scope.targetCal = {
        targetPrice: 0,
        targetNumPmt: 0,
        targetInterest: 0,
        targetWhere: ' '
    };
    $scope.lat = undefined;
    $scope.lng = undefined;


    $scope.$on('gmPlacesAutocomplete::placeChanged', function () {
        var location = $scope.targetWhere.getPlace().geometry.location;
        $scope.lat = location.lat();
        $scope.lng = location.lng();
        $scope.$apply();
    });


    $scope.goalCal = function(){
        var future = $scope.buyingYearSelect+'-'+$scope.buyingMonthSelect;
        var pmt    = $scope.targetPrice/monthDiff(future);
        $scope.savingMonth = pmt;
        $scope.mthPmt = pmt;
        $scope.mthDiff= monthDiff(future);
        $scope.targetWhere = $('#targetWhere').val();
        $scope.goalSubmit = true;
    }


    $scope.setGoalTarget = function () {

        $scope.success = true;
        $scope.showEdit = false;

        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTarget",
            data: {
                    targetPrice:    $scope.targetPrice,
                    targetNumPmt:   $scope.mthPmt,
                    savingMth:      $scope.savingMonth,
                    where:          $('#targetWhere').val(),
                    lat:            $scope.lat,
                    lng:            $scope.lng,
                    periods:        $scope.mthDiff,
                    monthSelect:    $scope.buyingMonthSelect,
                    yearSelect:     $scope.buyingYearSelecte.lng
                }
        })
        .done(function ($scopmsg) {

        });
    }
});

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



