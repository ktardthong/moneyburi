app.controller('goalTravelController', function($scope, $rootScope) {

    $scope.lat = undefined;
    $scope.lng = undefined;
    $scope.travelLocation = '';

    $scope.$on('gmPlacesAutocomplete::placeChanged', function(){
        var location = $scope.travelLocation.getPlace().geometry.location;
        $scope.lat = location.lat();
        $scope.lng = location.lng();
        $scope.$apply();
    });

    /*$http.get("/ajax/getUserTravelGoal").success(function(response) {
            $scope.travelGoals = response;
    });*/

    $scope.savingMonth = 0;


    $scope.travelSavingCal = function() {

        var future = $scope.yearSelect+'-'+$scope.monthSelect;
        var pmt    = $scope.travelAmount/monthDiff(future);
        $scope.savingMonth = pmt;
        $scope.mthPmt = pmt;
        $scope.mthDiff= monthDiff(future);
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

        var future  = $('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();

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
                        monthSelect:    $scope.monthSelect,
                        yearSelect:     $scope.yearSelect
            }
        })
        var adjustedSpendable = Number($rootScope.rs_userData.d_spendable) - Number($scope.savingMonth/30);
        $rootScope.rs_userData.d_spendable = adjustedSpendable;
    };
});


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




