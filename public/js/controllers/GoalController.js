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

