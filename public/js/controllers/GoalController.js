/*

*/
app.controller('goalAutoController', function($scope, $http) {
    $scope.autoCal = {  autoPrice: 0,
                        autoDPmt: 0,
                        autoNumPmt: 0,
                        autoInterest: 0,
                        autoPmt: 0
                    };

    $scope.addGoal = function() {

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




app.controller('goalController', function($scope) {

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

