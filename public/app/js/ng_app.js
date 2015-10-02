var app = angular.module('App',['ngAnimate','ngRoute','ng-mfb']);


app.directive('yearDrop',function() {
    var currentYear = new Date().getFullYear();
    return {
        link: function (scope, element, attrs) {
            scope.years = [];
            for (var i = +attrs.offset; i < +attrs.range + 1; i++) {
                scope.years.push(currentYear + i);
            }
            scope.s = currentYear;
        },
        template: '<select ng-model="s" ng-options="y for y in years"  id="yearSelect"></select>'
    }
});
app.directive('monthSelectList', function(){
    return {
        restrict: 'E',
        priority: 1,
        scope: {},
        template: '<z-month-select month="1"></z-month-select>',
        controller: function($scope) {
        }
    };
});
app.directive('zMonthSelect', function () {
    return {
        restrict: 'E',
        priority: 1000,
        scope: {
            month: '=month'
        },
        template: '<select ng-model="monthSelect" id="monthSelect">' +
        '<option value="1">Jan</option>' +
        '<option value="2">Feb</option>' +
        '<option value="3">Mar</option>' +
        '<option value="4">Apr</option>' +
        '<option value="5">May</option>' +
        '<option value="6">Jun</option>' +
        '<option value="7">Jul</option>' +
        '<option value="8">Aug</option>' +
        '<option value="9">Sep</option>' +
        '<option value="10">Oct</option>' +
        '<option value="11">Nov</option>' +
        '<option value="12">Dec</option>' +
        '</select>',
        controller: function($scope) {
        }
    };
});


app.controller('goalSummary', function($scope, $http) {

});

app.controller('goalController', function($scope, $http) {

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });

    $http.get("/ajax/getUserTravelGoal")
        .success(function(response) {
            $scope.travelGoals = response;
        });



    $scope.months   = [ {id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
                        {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}
                      ];
    $scope.goal_templates =
        [
            { name: 'Goal Summary',     url: '/app/html/card_goals/goal_summary.html'},
            { name: 'General Goal',     url: '/app/html/card_goals/goal_buying.html'},
            //{ name: 'Debts'     ,       url: '/app/html/card_goals/goal_debts.html'},
            { name: 'Travel'   ,        url: '/app/html/card_goals/goal_travel.html'},
            { name: 'Buy Home/Condo',   url: '/app/html/card_goals/goal_buyhome.html'},
            { name: 'Buy Car',          url: '/app/html/card_goals/goal_buycar.html'}
        ];
    $scope.goal_template = $scope.goal_templates[0];


    function monthDiff(future)
    {
        var start = new Date(future),
            end   = new Date(),
            diff = new Date(start -end);
            month  = diff/1000/60/60/24/31;
        return Math.round(month);
    }

    $( "#travelAmount" ).keyup(function() {
        var future  = $('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();
        var pmt     =   $('#travelAmount').val()/monthDiff(future);
        $('#mthPmt').html(monthDiff(future));
        $('#travelSavingMth').val(pmt);
    });

    $( "#monthSelect" ).change(function() {
        var future  = $('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();
        var pmt     =   $('#travelAmount').val()/monthDiff(future);

        $('#mthPmt').html(monthDiff(future));
         $('#travelSavingMth').val(pmt);

        console.log(pmt);
    });

    $( "#yearSelect" ).change(function() {
        var future  = $('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();
        var pmt     =   $('#travelAmount').val()/monthDiff(future);

        $('#mthPmt').html(monthDiff(future));
        $('#travelSavingMth').val(pmt);
    });


    $scope.setGoalTravel = function() {
        var future  = $('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();

        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTravel",
            data:  {    travelLocation: $('#travelLocation').val() ,
                        travelAmount:   $('#travelAmount').val(),
                        travelPax:      $('#travelPax').val(),
                        travelNights:   $('#travelNights').val(),
                        travelSavingMth:$('#travelSavingMth').val(),
                        periods:        monthDiff(future),
                        monthSelect:    $('#monthSelect').val(),
                        yearSelect:     $('#yearSelect option:selected').text()
                  }
        })
        .done(function( msg ) {
            alert('save!');
            //window.location.href = '/init_setup_2';
        });
    };

});


app.controller('goalTargetController', function($scope, $http) {
    $scope.targetCal = {    targetPrice: 0,
                            targetNumPmt: 0,
                            targetInterest: 0,
                            targetWhere: ' '
                       };

    $scope.setGoalTarget = function ()
    {
        $.ajax({
            method: "POST",
            url: "/ajax/setGoalTarget",
            data:  {
                    targetPrice:        $('#targetPrice').val() ,
                    targetNumPmt:       $('#targetNumPmt').val(),
                    targetInterest:     $('#targetInterest').val(),
                    where:              $('#targetWhere').val()
                  }
        })
            .done(function( msg ) {
                console.log(msg);
            });
    }
});


app.controller('goalHomeController', function($scope, $http) {
    $scope.homeCal = {  homePrice: 0,
                        homeDPmt: 0,
                        homeLoan: homePrice - homeDPmt,
                        homeInterest: 0,
                        homePmtDuration:0,
                        homeMthPmt: 0
                    };
});


app.controller('goalAutoController', function($scope, $http) {
    $scope.autoCal = {  autoPrice: 0,
                        autoDPmt: 0,
                        autoNumPmt: 0,
                        autoInterest: 0,
                        autoPmt: 0
                    };
});


app.controller('profileEdit', function($scope, $http) {

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });
    $http.get("/ajax/getUserJobs")
        .success(function(response) {
            $scope.items = response;
        });

    console.log($scope.userData.mth_income);

    $scope.ng_mthlyIncome  =   $scope.userData.mth_income;
    $scope.ng_mthlyBill    =   $scope.userData.mth_bill;
    $scope.ng_mthlySaving  =   $scope.userData.mth_saving;
    $scope.currency     =   $scope.userData.currency;
    //$scope.mthlySpendable = $scope.mthlyIncome - ($scope.mthlyBill - $scope.mthlySaving) ;


    $scope.saveInfo = function (){
        console.log($('#editMonthlyIncome').val());
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


app.controller('profileController', function($scope, $http) {


    $scope.float_buttons = [{
        label: 'Spendable',
        icon: 'ion-paper-airplane',
        url: '/app/html/card_spendable.html'
    },{
        label: 'Account',
        icon: 'ion-plus',
        url: '/app/html/card_account.html'
    },{
        label: 'Goals',
        icon: 'ion-paperclip',
        url: '/app/html/card_spendable.html'
    },{
        label: 'Transactions',
        icon: 'ion-paperclip',
        url: '/app/html/card_transactionList.html'
    },{
        label: 'Edit',
        icon: 'ion-paperclip',
        url: '/app/html/card_userEdit.html'
    }];

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/currency")
        .success(function(response) {
            $scope.currencies = response;
        });

    $http.get("/ajax/getUserTravelGoal")
        .success(function(response) {
            $scope.userTravelGoals = response;
        });

    $scope.nav = function(path) {
        $scope.template.url = path;
        console.log(path);
    };

    $scope.templates =
        [
            //{ name: 'Home'              , url: '/app/html/card_home.html'},
            { name: 'Spendable'         , url: '/app/html/card_spendable.html'},
            { name: 'Account'           , url: '/app/html/card_account.html'},
            { name: 'Goals'             , url: '/app/html/card_goals.html'},
            { name: 'Transactions'       , url: '/app/html/card_transactionList.html'},
            { name: 'Edit'              , url: '/app/html/card_userEdit.html'}
        ];



    $scope.template = $scope.templates[0];
    console.log($scope.template);

    $scope.showEdit = function(page) {
        console.log('edit '+page);

    };

    $scope.addTransaction = function() {
        $scope.showAddTransaction = true;
    };

    $scope.backAddTransaction = function() {
        $scope.showAddTransaction = false;
    };

});


app.controller('AddCardController', function($scope,$http) {

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
    $scope.addCard = function() {
        $scope.cardItem.push({
            type:$scope.ng_ccTypes,
            issuer:$scope.ng_ccIssuer,
            cclimit:$scope.ng_cardLimit,
            ccnote: $scope.ng_cardNote
        });

        cardData = JSON.stringify($scope.cardItem);

    };

});


app.controller('AddBillController', function($scope, $http) {
    var billList = this;

    billList.billItem = [];
    billList.totalBill = 0;


    $http.get("/ajax/billCate")
        .success(function(response) {
            billList.categories = response;
        });

    billList.addBill = function() {

        billList.billItem.push({text:billList.billText + billList.billCate});
        billList.bilText= '';

        var billData = billList.billText + billList.billCate;
        //localStorage["billData"] = JSON.stringify(billData);

        var storedNames = JSON.parse(localStorage["billData"]);
        console.log(storedNames);

        billList.totalBill = billList.totalBill + billList.billText;

        console.log(billList.totalBill)
    };

});


app.controller('thisController', function($scope, $http) {
    $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
    $scope.months   = [{id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
        {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}];

    $http.get("/ajax/userData")
        .success(function(response) {
            $scope.userData = response;
        });

    $http.get("/ajax/getUserJobs")
        .success(function(response) {
            $scope.items = response;
        });



    $scope.userAddData = function() {

        $.ajax({
            method: "POST",
            url: "/ajax/userName",
            data:  {    fname: $('#init_firstname').val() ,
                lname: $('#init_lastname').val(),
                job:   $('#jobtype').val()
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_2';
            });
    };


    $scope.statusAddData = function() {

        var bdate = $('#birthYear').val()+"-"+$('#birthMonth').val()+"-"+$('#birthDay').val();

        $.ajax({
            method: "POST",
            url: "/ajax/userStatus",
            data:  {    bdate:  bdate,
                gender: gender_flg,
                status: user_status
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_3';
            });
    };


    var cardData = [];
    var mthly_income ='';

    $scope.cardAddData = function() {

        if(cardData.length > 0)
        {
            cardData = JSON.parse(cardData);
        }

        $.ajax({
            method: "POST",
            url:    "/ajax/userFinance",
            data:   {
                mthlyInc:   $('#mthlyIncome').val(),
                currency:   $('#currencySelect').val(),
                cards:      cardData
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_setup_4';
            });
    };


    $scope.spendableAddData = function() {
        $.ajax({
            method: "POST",
            url: "/ajax/userPlan",
            data:  {    mth_saving:     $('#mthlySaving').html(),
                mth_spending:   $('#mthlySpendable').html(),
                dd_spending:    $('#dailySpendable').html(),
                dd_saving:      $('#dailySaving').html()
            }
        })
            .done(function( msg ) {
                window.location.href = '/init_complete';
            });
    };
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

    $scope.doAdd = function() {
        $.ajax({
            method: "POST",
            url: "/add_transaction",
            data:  {
                cate_id:        $scope.cate_id.id,    //$('#cate_id').val(),
                trans_type:     $scope.selectedTransType, //$('#trans_type').val(),
                trans_repeat:   $scope.trans_repeat.id,    //$('#trans_repeat').val(),
                pmt_type:       $scope.selectedPmtType, //$('#pmt_type').val(),
                amount:         $scope.amount,
                location:       $scope.location,
                note:           $scope.note,
                trans_date:     $scope.trans_date
            }
        })
            .done(function( msg ) {
                alert('save!');
                window.location.href = '/profile';
            });
    };
});

app.controller('transactionListController', function($scope, $http, $filter) {

    $http.get("/ajax/billCate")
        .success(function(response) {
            $scope.cateCore = response;
        });

    $http.get("/ajax/transRepeat")
        .success(function(response) {
            $scope.transRepeat = response;
        });

    $http.get("/ajax/pmtTypes")
        .success(function(response) {
            $scope.pmtTypes = response;
        });

    $http.get("/ajax/transTypes")
        .success(function(response) {
            $scope.transTypes = response;
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

    $http.get("/getAllTransactions")
        .success(function(response) {
            angular.forEach(response, function(value){
                $scope.count++;
                var obj = {
                    cate_id:          value.cate_id,
                    cate_obj:        $filter('filter')($scope.cateCore, {id: value.cate_id}, true),
                    trans_type:       value.trans_type,
                    trans_type_obj:  $filter('filter')($scope.transTypes, {id: value.trans_type}, true),
                    trans_repeat:     value.trans_repeat,
                    trans_repeat_obj:    $filter('filter')($scope.transRepeat, {id: value.trans_repeat}, true),
                    pmt_type:         value.pmt_type,
                    pmt_type_obj:    $filter('filter')($scope.pmtTypes, {id: value.pmt_type}, true),
                    amount:           value.amount,
                    location:         value.location,
                    note:             value.note,
                    trans_date:       value.trans_date,
                    created_at:       value.created_at,
                    currency:        $filter('filter')($scope.currencies, {id: $scope.userData.currency}, true)
                };
                $scope.listData.push(obj);
            });
        });

});