var app = angular.module('App', ['ngRoute', 'ngAnimate']);

app.config(function($routeProvider) {

    $routeProvider
        .when('/profile', {
            templateUrl: 'profile',
            controller: 'mainController'
        })
        .when('/showTransaction', {
            templateUrl: 'showTransaction',
            controller: 'TransactionController'
        })

});


// CONTROLLERS ============================================
// showTransaction page controller
app.controller('TransactionController', function($scope) {
    $scope.pageClass = 'show-transaction';
});


app.controller('mainController', function($scope) {
    $scope.login = function() {
       console.log("okay")
    }
});





=============


    include everything in one angular file

    =============