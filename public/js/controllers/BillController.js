app.controller('billController', function($scope, $http,$mdDialog,$rootScope,factory_userBills) {

    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.displayAddNewBill = false;

    var billList = this;

    billList.billItem = [];
    //billList.totalBill = 0;


    billList.ng_totalBill = $scope.sumBills;
    $scope.$watch('ng_totalBill', function () {
        //called when name or age changed
        console.log($scope.ng_totalBill);
    });

    billList.paidStatus = function(container_id){

        $.ajax({
            method: "POST",
            url: "/ajax/togglePaid",
            data:  {
                billId: container_id
            }
        })

        .done(function( msg ) {
            $http.get("/bill/getBills")
                .success(function(response) {
                    billList.userBills = response;
                });
        });
    };

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
            console.log(amt + $scope.displayAddNewBill);
        }
        else
        {
            $scope.displayAddNewBill = false;
        }
    }

    //Add the bill
    billList.addBill = function() {

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


                $http.get("/bill/getBills")
                    .success(function(response) {
                        $scope.userBills = response;
                });

                factory_userBills.sumBills().success(function(data) {
                    $rootScope.rs_sumBills     =   data;
                    $rootScope.calPie();
                    $('#userBillUpdate').effect("highlight", {color:'#F6C13C'}, 3500);
                });
            });

    };



    $scope.showConfirm = function(ev,container_id) {
    // Appending dialog to document.body to cover sidenav in docs app
    var confirm = $mdDialog.confirm()
        .title('Remove this bill?')
        //.content('')
        //.ariaLabel('Lucky day')
        .targetEvent(ev)
        .ok('Yes')
        .cancel('No');
    $mdDialog.show(confirm).then(function() {
        console.log(container_id);
        $.ajax({
            method: "POST",
            url:    "/ajax/removeBills",
            data:  {
                    billId: container_id}
        })
        .done(function( msg ) {
            $http.get("bill/sumBillAmount")
                .success(function(response) {
                    billList.sumBills = response;
                });
            $http.get("/bill/getBills")
                .success(function(response) {
                    billList.userBills = response;
                });
        });
    }, function() {
    });
};



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

