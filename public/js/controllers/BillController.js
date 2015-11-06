app.controller('billController', function($scope, $http,$rootScope,factory_userBills,$route, $routeParams, $location) {


    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.displayAddNewBill = false;

    $rootScope.ng_billAmount =0;
    $rootScope.ng_billCate =1;
    $rootScope.ng_billDue =1;

    $rootScope.showBill     = false;
    $rootScope.billOverview = true;

    //$scope.listBillStatus = $rootScope.rs_userBills;

    $scope.bill_labels   = 0;
    $scope.bill_data     = 0;


    //Recal bill to be us in dough
    $scope.billReCal = function(){

        $scope.bill_labels   = null;
        $scope.bill_data     = null;
        factory_userBills.getBlls().success(function(data) {

        var jsondata = data;
        var bill_name=[];
        var bill_amount=[];

        for (var i = 0, l = jsondata.length; i < l; i++) {
            bill_name[i]   = jsondata[i].name;
            bill_amount[i] = jsondata[i].amount;
        }

        var billData = {
            labels : bill_name,
            value :   bill_amount

        }

        $scope.bill_labels   = bill_name;
        $scope.bill_data     = bill_amount;

        console.log($scope.bill_labels);
        console.log($scope.bill_data);
        });
    }


    $scope.billStatus = function($billlstatus)
    {
        if($billlstatus=='') {
            $scope.listBillStatus = $rootScope.rs_userBills;
        }
        else {
            $.ajax({
                method: "POST",
                url: "/bill/billStatus",
                async: false,
                cache: false,
                data: {

                    bill_status: $billlstatus
                }
            })
            .done(function (msg) {
                $scope.listBillStatus = JSON.parse(msg);
            });
        }
    }


    //Check if the value user enter is not negative
    $scope.checkVal = function()
    {
        if($scope.ng_billAmount > 0)
        {
            var amt = $rootScope.rs_mthlyIncome - $rootScope.rs_mthlySaving - $scope.ng_billAmount;
            if(amt > 0)
            {
                $scope.displayAddNewBill = true;
            }
            else
            {
                $scope.displayAddNewBill = false;
            }
        }
        else
        {
            $scope.displayAddNewBill = false;
        }
    }

    //Add the bill
    $scope.addBill = function() {

        $.ajax({
            method: "POST",
            url: "/ajax/addBills",
            data:  {

                amount:     $scope.ng_billAmount,
                cateId:     $scope.ng_billCate,
                due_date:   $scope.ng_billDue
            }
        })
        .done(function( msg ) {
            factory_userBills.sumBills().success(function(data) {
                $rootScope.rs_sumBills     =   data;
                //$rootScope.calPie();
                // $('#userBillUpdate').effect("highlight", {color:'#F6C13C'}, 3500);
            });

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
                //$rootScope.billOverview = true;
                $rootScope.showBill = false;
            });

                $scope.billReCal();
        });

    };

    //undoRemove bill
    $scope.undoRemove = function(data){

        $.ajax({
            method: "POST",
            url: "/ajax/undoRemoveBills",
            data:  {
                billId:     data
            }
        })
        .done(function( msg ) {

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
            });

        });
    }

    //Remove bill
    $scope.removeBill = function(data){

        $.ajax({
            method: "POST",
            url: "/ajax/removeBills",
            data:  {
                billId:     data
            }
        })
        .done(function( msg ) {

            factory_userBills.sumBills().success(function(data) {
                $rootScope.rs_sumBills = data;
            });

            factory_userBills.getBlls().success(function(data){
                $rootScope.rs_userBills = data;
            });

            $scope.billReCal();
        });
    }

    $scope.billReCal();
})


.directive('billView',function(){
    return {
        restrict: 'E',
        templateUrl: '/bill/viewBills'
    };
})

.directive('userBill', function() {
    return {
        restrict: 'E',
        templateUrl: '/bill/userBill'
    };
})

.directive('billList', function() {
    return {
        restrict: 'E',
        templateUrl: '/bill/tpl_billList'
    };
})
.directive('billCompactList',function(){
    return {
        restrict: 'E',
        templateUrl: '/bill/billCompactList'
    };
})
.directive('cardSelect',function(){
    return {
        restrict: 'E',
        templateUrl: '/app/bills/tpl_cardSelect.html'
    };
});


