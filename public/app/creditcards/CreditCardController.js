app.controller('CardController', function($scope,$http,$mdDialog) {

    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];

    var cardList = this;
    $scope.cardItem = [];

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });

    $http.get("/ajax/ccIssuer")
        .success(function(response) {
            $scope.ccIssuer = response;
        });

    $http.get("/ajax/ccTypes")
        .success(function(response) {
            $scope.ccTypes = response;
        });

    $http.get("/card/getCards")
        .success(function(response) {
            $scope.userCards = response;
        });


    $scope.removeCard = function(container_id){

        $.ajax({
            method: "POST",
            url: "/card/removeCard",
            data:  {
                cardId: container_id
            }
        })

        .done(function( msg ) {
            $http.get("/card/getCards")
                .success(function(response) {
                    $scope.userCards = response;
                });
        });
    };


    $scope.addCard = function() {

        $.ajax({
            method: "POST",
            url: "/card/addCard",
            data:  {
                type:       $scope.ng_ccTypes,
                issuer:     $scope.ng_ccIssuer,
                cclimit:    $scope.ng_cardLimit,
                ccnote:     $scope.ng_cardNote,
                billDue:    $('#billDue').val(),
                expMth:     $scope.expMonth,
                expYear:    $scope.expYear
            }
        })

        .done(function( msg ) {
            $scope.cardListShow = true;
        });
        $http.get("/card/getCards")
            .success(function(response) {
                $scope.userCards = response;
            });
    };

    $scope.showAdvanced = function(ev,card) {

        $scope.card_edit = card;
        console.log($scope.card_edit);
        $mdDialog.show({
            controller: DialogController,
            templateUrl: '/app/creditcards/edit_card.tmpl.html',
            parent: angular.element(document.body),
            targetEvent: ev,
            clickOutsideToClose: true,
            scope: $scope
        })
        .then(function (answer) {
            $scope.status = 'You said the information was "' + answer + '".';
        }, function () {
            $scope.status = 'You cancelled the dialog.';
        })
    };
    function DialogController($scope, $mdDialog) {
        //$scope.card_edit = card;

        $scope.hide = function () {
            $mdDialog.hide();
        };
        $scope.cancel = function () {
            $mdDialog.cancel();
        };
        $scope.answer = function (answer) {
            $mdDialog.hide(answer);
            console.log(answer);
        };
    }
})
.directive('cardList', function() {
    return {
        restrict: 'E',
        templateUrl: '/app/creditcards/tpl_cardList.html'
    };
});
