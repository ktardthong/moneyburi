/**
 * Created by cholathit on 10/15/15.
 */

app.controller('transactionController', function($scope, $http, $filter) {
    //$scope.pageClass = 'show-transaction';

    $http.get("/ajax/billCate")
        .success(function(response) {
            $scope.cateCore = response;
        });

    $http.get("/ajax/transRepeat")
        .success(function(response) {
            $scope.transRepeat = response;
        });

    $scope.pmtTypes={};
    $http.get("/ajax/pmtTypes")
        .success(function(response) {
            $scope.pmtTypes = response;
        });

    $scope.transTypes={};
    $http.get("/ajax/transTypes")
        .success(function(response) {
            $scope.transTypes = response;
        });

    $http.get("/card/getCards")
        .success(function(response) {
            $scope.creditCards = response;
        });

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });

    $scope.listData = [];

    $scope.listDataPopulate = function (data){
        angular.forEach(data, function(value){
            //$scope.count++;
            var obj = {
                cate_id:          value.cate_id,
                cate_obj:         $filter('filter')($scope.cateCore, {id: value.cate_id}, true),
                trans_type:       value.trans_type,
                trans_type_obj:   $filter('filter')($scope.transTypes, {id: value.trans_type}, true),
                trans_repeat:     value.trans_repeat,
                trans_repeat_obj:    $filter('filter')($scope.transRepeat, {id: value.trans_repeat}, true),
                pmt_type:         value.pmt_type,
                pmt_type_obj:     $filter('filter')($scope.pmtTypes, {id: value.pmt_type}, true),
                amount:           value.amount,
                location:         value.location,
                note:             value.note,
                trans_date:       value.trans_date,
                created_at:       value.created_at,
                currency:         $filter('filter')($scope.currencies, {id: $scope.userData.currency}, true)
            };
            $scope.listData.push(obj);
        });
    };

    $scope.defaultPmtType = 1;
    $scope.defaultTransType = 1;

    $scope.selectedPmtType = $scope.defaultPmtType;
    $scope.selectedTransType = $scope.defaultTransType;

    $scope.pmtSelected = function(id){
        $scope.selectedPmtType = id;
    };

    $scope.transSelected = function(id){
        $scope.selectedTransType = id;
    };

    $scope.trans_date = new Date();
    $scope.selectedCC = 0;

    $scope.doAdd = function() {
        var obj = {
            cate_id:        $scope.cate_id,    //$('#cate_id').val(),
            trans_type:     $scope.selectedTransType, //$('#trans_type').val(),
            //trans_repeat:   $scope.trans_repeat.id,    //$('#trans_repeat').val(),
            pmt_type:       $scope.selectedPmtType, //$('#pmt_type').val(),
            cc_id:          $scope.selectedCC,
            amount:         $scope.amount,
            location:       $scope.location,
            note:           $scope.note,
            trans_date:     $filter('date')($scope.trans_date, 'yyyy-MM-dd')
        };
        $.ajax({
            method: "POST",
            url: "/add_transaction",
            data:  obj
        })
            .done(function( msg ) {
                //alert('save!');
                //$scope.listData.push(obj);
                //window.location.href = '/profile';
                $http.get("/getAllTransactions")
                    .success(function(response) {
                        $scope.listDataPopulate(response);
                    }
                );

            });
    };

    $http.get("/getAllTransactions")
        .success(function(response) {
            $scope.listDataPopulate(response);
        }
    );

    $scope.getCateIcon = function(cateId){
        var iconSet = [
            {id: 1,     name: "Transport",          fa: "fa fa-bus"},
            {id: 2,     name: "Food",               fa: "fa fa-cutlery"},
            {id: 3,     name: "Shopping",           fa: "fa fa-tag"},
            {id: 4,     name: "Groceries",          fa: "fa fa-shopping-cart"},
            {id: 5,     name: "Entertainment",      fa: "fa fa-film"},
            {id: 6,     name: "Travel",             fa: "fa fa-plane"},
            {id: 7,     name: "Health",             fa: "fa fa-heartbeat"},
            {id: 8,     name: "Beauty",             fa: "fa fa-diamond"},
            {id: 9,     name: "Utility - Electric", fa: "fa fa-bolt"},
            {id: 10,    name: "Utility - Internet", fa: "fa fa-wifi"},
            {id: 11,    name: "Utility - Phone",    fa: "fa fa-phone"},
            {id: 12,    name: "Utility - Water",    fa: "fa fa-tint"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: cateId}, true);
        return selectedIcon[0].fa;
    };


    $scope.getPmtIcon = function(pmtId){
        var iconSet = [
            {id: 1,     name: "Cash",          fa: "fa fa-money"},
            {id: 2,     name: "Credit Card",   fa: "fa fa-credit-card"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: pmtId}, true);
        return selectedIcon[0].fa;
    };

    $scope.getTransTypeIcon = function(transTypeId){
        var iconSet = [
            {id: 1,     name: "Expense",  fa: "fa fa-minus-square"},
            {id: 2,     name: "Income",   fa: "fa fa-plus-square"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {id: transTypeId}, true);
        return selectedIcon[0].fa;
    };

    $scope.propertyIcons = function(name){
        var iconSet = [
            {name: "location",  fa: "fa fa-map-marker"},
            {name: "note",  fa: "fa fa-comment"},
            {name: "datetime",  fa: "fa fa-clock"}
        ];
        var selectedIcon = $filter('filter')(iconSet, {name: name}, true);
        return selectedIcon[0].fa;
    };

    $scope.cateColor = function(cateId){
        var colors = [
            {id: 1,     name: "Transport",          color: {name: "Pastel Green", code: "#77DD77"}},
            {id: 2,     name: "Food",               color: {name: "Medium Spring Bud", code: "#C9DC87"}},
            {id: 3,     name: "Shopping",           color: {name: "Pastel Yellow", code: "#FDFD96"}},
            {id: 4,     name: "Groceries",          color: {name: "Pastel Brown", code: "#836953"}},
            {id: 5,     name: "Entertainment",      color: {name: "Dark Pastel Blue", code: "#779ECB"}},
            {id: 6,     name: "Travel",             color: {name: "Yankees Blue", code: "#1C2841"}},
            {id: 7,     name: "Health",             color: {name: "Medium Ruby", code: "#AA4069"}},
            {id: 8,     name: "Beauty",             color: {name: "Light Pastel Purple", code: "#B19CD9"}},
            {id: 9,     name: "Utility - Electric", color: {name: "Pastel Gray", code: "#CFCFC4"}},
            {id: 10,    name: "Utility - Internet", color: {name: "Pastel Blue", code: "#AEC6CF"}},
            {id: 11,    name: "Utility - Phone",    color: {name: "Medium Turquoise", code: "#48D1CC"}},
            {id: 12,    name: "Utility - Water",    color: {name: "Rackley", code: "#5D8AA8"}}
        ];
        var selectedIcon = $filter('filter')(colors, {id: cateId}, true);
        return selectedIcon[0].color.code;
    };
})

.directive('transList', function() {
        return {
            restrict: 'E',
            templateUrl: '/app/transactions/tpl_transList.html'
        };
});
