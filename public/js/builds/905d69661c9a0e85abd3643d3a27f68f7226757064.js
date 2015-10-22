app.controller('userController',function($scope,factory_userSpending){$scope.ng_mthlyIncome=$scope.userData.mth_income;$scope.ng_mthlyBill=$scope.userData.mth_bill;$scope.ng_mthlySaving=$scope.userData.mth_saving;$scope.ng_spendable=$scope.userData.mth_spendable;$scope.currency=$scope.userData.currency;$scope.ng_userfname=$scope.userData.firstname;$scope.ng_userlname=$scope.userData.lastname;$scope.ng_email=$scope.userData.email;$scope.labels=["Bill","Saving","Spendable"];$scope.colours=["#8D8D8D","#87D2DA","#1594A8"],$scope.data=[$scope.ng_mthlyBill,$scope.ng_mthlySaving,$scope.ng_spendable];$scope.calPie=function(){$scope.ng_spendable=$scope.ng_mthlyIncome-$scope.ng_mthlyBill-$scope.ng_mthlySaving;$scope.labels=["Bill","Saving","Spendable"];$scope.data=[$scope.ng_mthlyBill,$scope.ng_mthlySaving,$scope.ng_spendable];};$scope.saveUserData=function(){$.ajax({method:"POST",url:"/ajax/updateUserData",data:{firstname:$scope.ng_userfname,lastname:$scope.ng_userlname,email:$scope.ng_email,job:$scope.userJobType}}).done(function(msg){$("#userdata_alert_message").show();window.setTimeout(function(){$("#userdata_alert_message"+"").fadeTo(500,0).slideUp(500,function(){$(this).remove();});},3000);});}
$scope.saveInfo=function(){$.ajax({method:"POST",url:"/ajax/updateUserInfo",data:{editMonthlyIncome:$('#editMonthlyIncome').val(),editMonthlyBill:$('#editMonthlyBill').val(),editMonthlySaving:$('#editMonthlySaving').val(),editMonthlySpendable:$scope.ng_spendable,editDaySaving:$('#editDaySaving').html(),editDaySpendable:$scope.ng_spendable/30,currency:$scope.ng_currency}}).done(function(msg){$("#alert_message").show();window.setTimeout(function(){$("#alert_message").fadeTo(500,0).slideUp(500,function(){$(this).remove();});},3000);});}});var spendableDate=[];var spendableAmount=[];var spendableRemain=[];var weeklySpendable=[];var weeklyDate=[];var weeklyAmount=[];var weeklyRemain=[];app.controller('spendableChartController',function($scope,$http,$window){$scope.showSpendableWeek=function(){$http.get("/spendableTracker/get").success(function(response){$window.weeklySpendable=response;for(i=0;i<weeklySpendable.length;i++){weeklyDate[i]=weeklySpendable[i].date;}
for(i=0;i<weeklySpendable.length;i++){weeklyAmount[i]=weeklySpendable[i].spendable;}
for(i=0;i<weeklySpendable.length;i++){weeklyRemain[i]=weeklySpendable[i].remain;}});$scope.labels=weeklyDate;$scope.data=[weeklyAmount,weeklyRemain];};$scope.showSpendableMonth=function(){$http.get("/spendableTracker/getMonth").success(function(response){$window.spendableData=response;for(i=0;i<spendableData.length;i++){spendableDate[i]=spendableData[i].date;}
for(i=0;i<spendableData.length;i++){spendableAmount[i]=spendableData[i].spendable;}
for(i=0;i<spendableData.length;i++){spendableRemain[i]=spendableData[i].remain;}});$scope.labels=spendableDate;$scope.data=[spendableAmount,spendableRemain];};$scope.showTodaySpending=function(){$http.get("/todaySpending").success(function(response){$scope.d_spendable=response[0]["d_spendable"];$scope.todaySpending=response[0]["todaySpending"];$scope.todaySpendable=$scope.d_spendable-$scope.todaySpending;if($scope.todaySpendable<0){$scope.todaySpendable=0}
var json={"data":[$scope.todaySpending,$scope.todaySpendable],"labels":["Spent","Spendable"],"colours":["#8D8D8D","#87D2DA"],"option":{responsive:true,maintainAspectRatio:true,segmentShowStroke:true,segmentStrokeColor:"#fff",segmentStrokeWidth:2,percentageInnerCutout:80,animationSteps:100,animateRotate:true}};$scope.spendableDough=json;});};$scope.showSpendableWeek();$scope.showTodaySpending();}).directive('spendableChart',function(){return{restrict:'E',templateUrl:'/spendableChart'};}).directive('dailySpendableChart',function(){return{restrict:'E',templateUrl:'/dailySpendableDough'};});app.controller('goalTravelController',function($scope,$http){$scope.lat=undefined;$scope.lng=undefined;$scope.travelLocation='';$scope.$on('gmPlacesAutocomplete::placeChanged',function(){var location=$scope.travelLocation.getPlace().geometry.location;$scope.lat=location.lat();$scope.lng=location.lng();$scope.$apply();});$http.get("/ajax/getUserTravelGoal").success(function(response){$scope.travelGoals=response;});$scope.savingMonth=0;$scope.travelSavingCal=function(){var future=$scope.yearSelect+'-'+$scope.monthSelect;var pmt=$scope.travelAmount/monthDiff(future);$scope.savingMonth=pmt;$scope.mthPmt=pmt;$scope.mthDiff=monthDiff(future);$scope.travelLocation=$('#travelLocation').val();}
$("#travelAmount").keyup(function(){$scope.travelSavingCal();});$("#monthSelect").change(function(){$scope.travelSavingCal();});$("#yearSelect").change(function(){console.log("test");$scope.travelSavingCal();});$scope.getGoalDropDown=function(){console.log($scope.goal_template);};$scope.setGoalTravel=function(){$scope.travelGoalForm=false;$scope.addTravelGoal=true;var future=$('#yearSelect option:selected').text()+'-'+$('#monthSelect').val();$.ajax({method:"POST",url:"/ajax/setGoalTravel",data:{travelLocation:$('#travelLocation').val(),travelAmount:$('#travelAmount').val(),travelPax:$('#travelPax').val(),travelNights:$('#travelNights').val(),travelSavingMth:$scope.savingMonth,lat:$scope.lat,lng:$scope.lng,periods:$scope.mthDiff,monthSelect:$scope.monthSelect,yearSelect:$scope.yearSelect}}).done(function(msg){console.log($scope.travelGoalForm)});};});app.directive('yearDrop',function(){var currentYear=new Date().getFullYear();return{link:function(scope,element,attrs){scope.years=[];for(var i=+attrs.offset;i<+attrs.range+1;i++){scope.years.push(currentYear+i);}
scope.yearSelect=currentYear;},templateUrl:'/app/goal/travel/tpl_year.html'}});app.directive('zMonthSelect',function(){return{restrict:'E',templateUrl:'/app/goal/travel/tpl_month.html'};});app.controller('goalAutoController',function($scope,$http){$scope.autoCal={autoPrice:0,autoDPmt:0,autoNumPmt:0,autoInterest:0,autoPmt:0};$scope.addGoal=function(){$.ajax({method:"POST",url:"/ajax/userName",data:{fname:$('#init_firstname').val(),lname:$('#init_lastname').val(),job:$('#jobtype').val()}}).done(function(msg){window.location.href='/init_setup_2';});};});app.controller('goalHomeController',function($scope,$http){$scope.homeCal={};});app.controller('goalController',function($scope){$scope.goal_templates=[{name:'Goal Summary',url:'/app/html/card_goals/goal_summary.html'},{name:'General Goal',url:'/app/html/card_goals/goal_buying.html'},{name:'Travel',url:'/app/html/card_goals/goal_travel.html'},{name:'Buy Home/Condo',url:'/app/html/card_goals/goal_buyhome.html'},{name:'Buy Car',url:'/app/html/card_goals/goal_buycar.html'}];$scope.goal_template=$scope.goal_templates[0];});app.controller('goalTargetController',function($scope,$http){$scope.targetCal={targetPrice:0,targetNumPmt:0,targetInterest:0,targetWhere:' '};$scope.lat=undefined;$scope.lng=undefined;$scope.$on('gmPlacesAutocomplete::placeChanged',function(){var location=$scope.targetWhere.getPlace().geometry.location;$scope.lat=location.lat();$scope.lng=location.lng();$scope.$apply();});$scope.goalCal=function(){var future=$scope.buyingYearSelect+'-'+$scope.buyingMonthSelect;var pmt=$scope.targetPrice/monthDiff(future);$scope.savingMonth=pmt;$scope.mthPmt=pmt;$scope.mthDiff=monthDiff(future);$scope.targetWhere=$('#targetWhere').val();$scope.goalSubmit=true;}
$scope.setGoalTarget=function(){$scope.success=true;$scope.showEdit=false;$.ajax({method:"POST",url:"/ajax/setGoalTarget",data:{targetPrice:$scope.targetPrice,targetNumPmt:$scope.mthPmt,savingMth:$scope.savingMonth,where:$('#targetWhere').val(),lat:$scope.lat,lng:$scope.lng,periods:$scope.mthDiff,monthSelect:$scope.buyingMonthSelect,yearSelect:$scope.buyingYearSelecte.lng}}).done(function($scopmsg){});}});app.directive('buyingYearDrop',function(){var currentYear=new Date().getFullYear();return{link:function(scope,element,attrs){scope.years=[];for(var i=+attrs.offset;i<+attrs.range+1;i++){scope.years.push(currentYear+i);}
scope.yearSelect=currentYear;},templateUrl:'/app/goal/buying/tpl_year.html'}});app.directive('buyingMonthSelect',function(){return{restrict:'E',templateUrl:'/app/goal/buying/tpl_month.html'};});