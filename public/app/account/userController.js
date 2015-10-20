app.controller('userController', function($scope, $mdToast) {

    $scope.ng_mthlyIncome  =   $scope.userData.mth_income;
    $scope.ng_mthlyBill    =   $scope.userData.mth_bill;
    $scope.ng_mthlySaving  =   $scope.userData.mth_saving;
    $scope.ng_spendable    =   $scope.userData.mth_spendable;
    $scope.currency        =   $scope.userData.currency;


    $scope.ng_userfname    =    $scope.userData.firstname;
    $scope.ng_userlname    =    $scope.userData.lastname;
    $scope.ng_email        =    $scope.userData.email;




    $scope.labels = ["Bill", "Saving", "Spendable"];
    $scope.colours=  ["#8D8D8D","#87D2DA","#1594A8"],
    $scope.data = [ $scope.ng_mthlyBill, $scope.ng_mthlySaving,$scope.ng_spendable];

    $scope.calPie = function(){
        $scope.ng_spendable = $scope.ng_mthlyIncome - $scope.ng_mthlyBill - $scope.ng_mthlySaving;
        $scope.labels = ["Bill", "Saving", "Spendable"];
        $scope.data = [ $scope.ng_mthlyBill, $scope.ng_mthlySaving,$scope.ng_spendable];
    };

    $scope.saveUserData = function(){
        $.ajax({
            method: "POST",
            url: "/ajax/updateUserData",
            data:  {
                firstname:      $scope.ng_userfname ,
                lastname:       $scope.ng_userlname ,
                email:          $scope.ng_email,
                job:            $scope.userJobType
            }
        })
        .done(function( msg ) {
            $("#userdata_alert_message").show();
            window.setTimeout(function() {
                $("#userdata_alert_message" +
                "").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 3000);
        });
    }

    $scope.saveInfo = function (){

        $.ajax({
            method: "POST",
            url: "/ajax/updateUserInfo",
            data:  {
                editMonthlyIncome:      $('#editMonthlyIncome').val() ,
                editMonthlyBill:        $('#editMonthlyBill').val(),
                editMonthlySaving:      $('#editMonthlySaving').val(),
                editMonthlySpendable:   $scope.ng_spendable,
                editDaySaving:          $('#editDaySaving').html(),
                editDaySpendable:       $scope.ng_spendable/30
                //job:   $('#jobtype').val()
            }
        })
            .done(function( msg ) {
                $("#alert_message").show();
                window.setTimeout(function() {
                    $("#alert_message").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 3000);
            });
    }
});

