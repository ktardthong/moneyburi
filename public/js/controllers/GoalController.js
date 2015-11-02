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




app.controller('goalController', function($scope,$http,factory_userGoals ) {




    //Get active goals
    $scope.getActiveGoals = function()
    {
        $http.get("/ajax/userGoals").success(function(data){
            $scope.carBrandsList = data;
        });

        factory_userGoals.userGoalsFactory().success(function(data){
            $scope.userGoals=data;
        });
    };

    //Get completed goal
    $scope.getCompletedGoal = function()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/showCompletedGoal",
            data:  {
                active_goal_flg: 0
            }
        })
        .done(function( msg ) {
            $scope.userGoals=JSON.parse(msg);
        });
    };

    $scope.momentFormat = function(date){
        return moment(date).format("MMM DD, YYYY ");
    };

    $scope.momentMonth = function(created_at,duration){
        return moment(created_at).add(duration, 'months').format(" MMM DD, YYYY");
    };

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

