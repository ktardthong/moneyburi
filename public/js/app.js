var app = angular.module('App', ['ngRoute', 'ngAnimate']);

app.config(function($routeProvider) {

    $routeProvider
        .when('/profile', {
            templateUrl: 'profile',
            controller: 'mainController'
        })
        .when('/showTransaction', {
            templateUrl: 'showTransaction',
            controller: TransactionController
        })

});


//// CONTROLLERS ============================================
//// showTransaction page controller
//app.controller('TransactionController', function($scope) {
//    $scope.pageClass = 'show-transaction';
//});


app.controller('mainController', function($scope) {
    $scope.login = function() {
       console.log("okay")
    }
});

app.controller('transactionController', function($scope, $http) {
    //$scope.pageClass = 'show-transaction';

    $http.get("/ajax/billCate")
        .success(function(response) {
            $scope.cateCore = response;
        });

    $http.get("/ajax/transRepeat")
        .success(function(response) {
            $scope.transRepeat = response;
        });
});