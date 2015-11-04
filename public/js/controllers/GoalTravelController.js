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



