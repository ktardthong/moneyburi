app.controller('BillController', function($scope, $http,$mdDialog) {

    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];

    var billList = this;

    billList.billItem = [];
    billList.totalBill = 0;


    $http.get("/ajax/billCate")
        .success(function(response) {
            billList.categories = response;
        });


    $http.get("/bill/getBills")
        .success(function(response) {
            billList.userBills = response;
        });

    $http.get("bill/sumBillAmount")
        .success(function(response) {
            billList.sumBills = response;
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

    billList.addBill = function() {

        billList.billItem.push({text:billList.billText + billList.billCate});
        billList.bilText= '';

        var billData = billList.billText + billList.billCate;

        var storedNames = JSON.parse(localStorage["billData"]);

        billList.totalBill = billList.totalBill + billList.billText;


        $.ajax({
            method: "POST",
            url: "/ajax/addBills",
            data:  {

                amount:     $('#billAmount').val(),
                cateId:     $('#billCate').val(),
                due_date:   $('#billDue').val()
            }
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
        //$scope.status = 'You decided to keep your debt.';
    });
};



})
.directive('billList', function() {
    return {
        restrict: 'E',
        templateUrl: '/app/bills/tpl_billList.html'
    };
});


