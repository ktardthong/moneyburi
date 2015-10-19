app.controller('userController', function($scope, $http) {

    $http.get("/ajax/getUserJobs")
        .success(function(response) {
            $scope.items = response;
        });

    console.log($scope.userData);

    $scope.ng_mthlyIncome  =   $scope.userData.mth_income;
    $scope.ng_mthlyBill    =   $scope.userData.mth_bill;
    $scope.ng_mthlySaving  =   $scope.userData.mth_saving;
    $scope.ng_spendable    =   $scope.userData.mth_spendable;
    $scope.currency        =   $scope.userData.currency;


    $scope.ng_userfname    =    $scope.userData.firstname;
    $scope.ng_userlname    =    $scope.userData.lastname;
    $scope.ng_email        =    $scope.userData.email;




        $scope.labels = ["Bill", "Saving", "Spendable"];
        $scope.data = [ $scope.ng_mthlyBill, $scope.ng_mthlySaving,$scope.ng_spendable];

    $scope.calPie = function(){
        $scope.labels = ["Bill", "Saving", "Spendable"];
        $scope.data = [ $scope.ng_mthlyBill, $scope.ng_mthlySaving,$scope.ng_spendable];
    };

    $scope.saveInfo = function (){
        $.ajax({
            method: "POST",
            url: "/ajax/updateUserInfo",
            data:  {
                editMonthlyIncome:      $('#editMonthlyIncome').val() ,
                editMonthlyBill:        $('#editMonthlyBill').val(),
                editMonthlySaving:      $('#editMonthlySaving').val(),
                editMonthlySpendable:   $('#editMonthlySpendable').html(),
                editDaySaving:          $('#editDaySaving').html(),
                editDaySpendable:       $('#editDaySpendable').html()
                //job:   $('#jobtype').val()
            }
        })
            .done(function( msg ) {
                console.log(msg);
            });
    }
});

