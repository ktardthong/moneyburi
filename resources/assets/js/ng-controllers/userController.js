app.controller('userController', function($scope,factory_userSpending,$rootScope) {


    if($scope.userData.mth_income != 0) {
        $rootScope.rs_mthlyIncome = $scope.userData.mth_income;
    }
    else{
        $rootScope.rs_mthlyIncome = $scope.rs_mthlyIncome;
    }

    $rootScope.rs_mthlySaving  =   $scope.userData.mth_saving;

    $scope.ng_spendable =   $rootScope.rs_mthlyIncome - $rootScope.rs_sumBills - $rootScope.rs_mthlySaving - $rootScope.rs_userData.goal_saving;

    $scope.currency     =   $scope.userData.currency;

    $scope.ng_userfname    =    $scope.userData.firstname;
    $scope.ng_userlname    =    $scope.userData.lastname;
    $scope.ng_email        =    $scope.userData.email;


    $scope.labels = ["Bill", "Saving", "Spendable","Goal Saving"];
    $scope.colours=  ["#8D8D8D","#87D2DA","#1594A8","#C7E8EA"];
    $scope.data = [ $rootScope.rs_sumBills, $rootScope.rs_mthlySaving,$scope.ng_spendable,$rootScope.rs_userData.goal_saving];


    //Delay the highlight on keyup
    var typewatch = function(){
        var timer = 0;
        return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
        }
    }();


    $rootScope.calPie = function(){
        $scope.ng_spendable =   $rootScope.rs_mthlyIncome - $rootScope.rs_sumBills - $rootScope.rs_mthlySaving - $rootScope.rs_userData.goal_saving;

        $scope.labels = ["Bill", "Saving", "Spendable","Goal Saving"];
        $scope.data = [ $rootScope.rs_sumBills, $rootScope.rs_mthlySaving,$scope.ng_spendable,$rootScope.rs_userData.goal_saving];

        $rootScope.rs_mthlyIncome = $scope.rs_mthlyIncome;

        typewatch(function()
        {
        $('#editMonthlySpendable').effect("highlight", {color:'#F6C13C'}, 1500);
        $('#editDaySpendable').effect("highlight", {color:'#F6C13C'}, 1500);
        $('#editDaySaving').effect("highlight", {color:'#F6C13C'}, 1500);
        }, 1200 );
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
        $scope.ng_spendable = $scope.rs_mthlyIncome - $scope.rs_sumBills - $scope.rs_mthlySaving;
        $.ajax({
            method: "POST",
            url: "/ajax/updateUserInfo",
            data:  {
                editMonthlyIncome:      $scope.rs_mthlyIncome,
                editMonthlyBill:        $scope.rs_sumBills,
                editMonthlySaving:      $scope.rs_mthlySaving,
                editMonthlySpendable:   $scope.ng_spendable,
                editDaySaving:          $scope.rs_mthlySaving/30,
                editDaySpendable:       $scope.ng_spendable/30,
                currency:               $scope.ng_currency
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

