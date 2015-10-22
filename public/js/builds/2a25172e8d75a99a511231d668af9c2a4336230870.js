var app=angular.module('App',['ngAnimate','ngRoute','ng-mfb','ngMaterial','chart.js','ngSanitize','gm','ngMap']);app.config(function($mdThemingProvider){$mdThemingProvider.definePalette('amazingPaletteName',{'50':'ffebee','100':'ffcdd2','200':'ef9a9a','300':'e57373','400':'ef5350','500':'87D2DA','600':'e53935','700':'d32f2f','800':'c62828','900':'b71c1c','A100':'ff8a80','A200':'ff5252','A400':'ff1744','A700':'d50000','contrastDefaultColor':'light','contrastDarkColors':['50','100','200','300','400','A100'],'contrastLightColors':undefined});$mdThemingProvider.theme('default').primaryPalette('amazingPaletteName')});app.controller('goalAutoController',function($scope,$http){$scope.autoCal={autoPrice:0,autoDPmt:0,autoNumPmt:0,autoInterest:0,autoPmt:0};});app.controller('profileController',function($scope,$http,factory_userData,factory_userGoals,factory_userBills,factory_utils,factory_userCards,factory_mfb,factory_userSpending){$scope.date=new Date();factory_userData.userDataFactory().success(function(data){$scope.userData=data;});factory_userData.userJobs().success(function(data){$scope.userJobs=data;});factory_utils.getCurrency().success(function(data){$scope.currencies=data;});factory_userGoals.userGoalsFactory().success(function(data){$scope.userGoals=data;});factory_userGoals.userTravelLocation().success(function(data){$scope.userTravelGoals=data;});factory_userBills.getBlls().success(function(data){$scope.userBills=data;});factory_userBills.upComing().success(function(data){$scope.upComing=data;});factory_userCards.getCards().success(function(data){$scope.userCards=data;});factory_userCards.ccIssuer().success(function(data){$scope.ccIssuer=data;});factory_userCards.ccTypes().success(function(data){$scope.ccTypes=data;});$scope.float_buttons=factory_mfb.mfb();factory_userSpending.dailySpending($scope);$scope.nav=function(path){$scope.template.url=path;};$scope.templates=[{name:'Spendable',url:'/spendableCard'},{name:'Account',url:'/app/html/card_account.html'},{name:'Goals',url:'/app/html/card_goals.html'},{name:'Transactions',url:'/app/html/card_transactions.html'},{name:'Bills',url:'/app/bills/BillView.html'},{name:'Credit cards',url:'/app/creditcards/CreditCardView.html'},];$scope.template=$scope.templates[0];$scope.addTransaction=function(){$scope.showAddTransaction=true;};$scope.backAddTransaction=function(){$scope.showAddTransaction=false;};});app.controller('thisController',function($scope,$http,$filter,factory_userData){$scope.days=[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];$scope.months=[{id:1,month:"Jan"},{id:2,month:'Feb'},{id:3,month:'Mar'},{id:4,month:'Apr'},{id:5,month:'May'},{id:6,month:'Jun'},{id:7,month:'Jul'},{id:8,month:'Aug'},{id:9,month:'Sept'},{id:10,month:'Oct'},{id:11,month:'Nov'},{id:12,month:'Dec'}];factory_userData.userJobs().success(function(data){$scope.items=data;})
$scope.userAddData=function(){$.ajax({method:"POST",url:"/ajax/userName",data:{fname:$('#init_firstname').val(),lname:$('#init_lastname').val(),job:$('#jobtype').val()}}).done(function(msg){window.location.href='/init_setup_2';});};$scope.statusAddData=function(){var bdate=$('#birthYear').val()+"-"+$('#birthMonth').val()+"-"+$('#birthDay').val();$.ajax({method:"POST",url:"/ajax/userStatus",data:{bdate:bdate,gender:gender_flg,status:user_status}}).done(function(msg){window.location.href='/init_setup_3';});};var cardData=[];var mthly_income='';$scope.cardAddData=function(){if(cardData.length>0)
{cardData=JSON.parse(cardData);}
$.ajax({method:"POST",url:"/ajax/userFinance",data:{mthlyInc:$('#mthlyIncome').val(),currency:$('#currencySelect').val(),cards:cardData}}).done(function(msg){window.location.href='/init_setup_4';});};$scope.spendableAddData=function(){$.ajax({method:"POST",url:"/ajax/userPlan",data:{mth_saving:$('#mthlySaving').html(),mth_spending:$('#mthlySpendable').html(),dd_spending:$('#dailySpendable').html(),dd_saving:$('#dailySaving').html()}}).done(function(msg){window.location.href='/init_complete';});};$http.get("/getAllTransactions").success(function(response){$scope.transactions=response;$scope.todaysTrans=$filter('filter')($scope.transactions,{trans_date:$filter('date')(new Date(),'yyyy-MM-dd')},true);$scope.spentToday=0;angular.forEach($scope.todaysTrans,function(value){$scope.spentToday+=value.amount;});$scope.remainingToday=$scope.userData.d_spendable-$scope.spentToday;});});app.factory('factory_userData',function($http){return{userDataFactory:function(){return $http.get("/ajax/userData");},userJobs:function(){return $http.get("/ajax/getUserJobs");}}})
app.factory('factory_userGoals',function($http){return{userGoalsFactory:function(){return $http.get("/ajax/userGoals");},userTravelLocation:function(){return $http.get("/ajax/getUserTravelGoal");},userTargetGoals:function(){return $http.get("/ajax/getUserTargetGoal");}};});app.factory('factory_userBills',function($http){return{getBlls:function(){return $http.get("/bill/getBills");},upComing:function(){return $http.get("/bill/upComing");}}});app.factory('factory_utils',function($http){return{getCurrency:function(){return $http.get("/ajax/currency");},upComing:function(){return $http.get("/bill/upComing");}}});app.factory('factory_userCards',function($http){return{getCards:function(){return $http.get("/card/getCards");},ccIssuer:function(){return $http.get("/ajax/ccIssuer");},ccTypes:function(){return $http.get("/ajax/ccTypes");}}});app.factory('factory_mfb',function($http){return{mfb:function(){return[{label:'Home',icon:'ion-home',url:'/app/html/card_spendable.html.php'},{label:'Account',icon:'ion-plus',url:'/app/html/card_account.html'},{label:'Bills',icon:'ion-ios-list-outline',url:'/app/html/card_goals.html'},{label:'Transactions',icon:'ion-calculator',url:'/app/html/card_transactions.html'}];}}});app.factory('factory_userSpending',function($http){return{spendableFlg:false},{dailySpending:function($scope){return $http.get("/todaySpending").success(function(response){var windowTodaySpending=typeof response[0]["todaySpending"]!='undefined'?response[0]["todaySpending"]:0;$scope.d_spendable=response[0]["d_spendable"];$scope.todaySpending=windowTodaySpending;$scope.todaySpendable=$scope.d_spendable-$scope.todaySpending;if($scope.todaySpendable<0){$scope.todaySpendable=0}
var json={"data":[$scope.todaySpending,$scope.todaySpendable],"labels":["Spent","Spendable"],"colours":["#8D8D8D","#87D2DA"],"option":{responsive:true,maintainAspectRatio:true,segmentShowStroke:true,segmentStrokeColor:"#fff",segmentStrokeWidth:2,percentageInnerCutout:80,animationSteps:100,animateRotate:true}};$scope.spendableDough=json;});}}});var gender_flg='';var user_status='';$('#gender_female').click(function(){gender_flg='female';});$('#gender_male').click(function(){gender_flg='male';});$('#status_single').click(function(){user_status=0;});$('#status_married').click(function(){user_status=1;});$('#creditCard_true').click(function(){$('#addCreditCard').show('slow');});$('#creditCard_false').click(function(){$('#addCreditCard').hide('slow');});$('#addCreditCard').hide();function monthDiff(future)
{var start=new Date(future),end=new Date(),diff=new Date(start-end);month=diff/1000/60/60/24/31;return Math.round(month);}
function listLocalStorage()
{for(var i=0;i<localStorage.length;i++){console.log(localStorage.getItem(localStorage.key(i))+" | KEY:"+localStorage.key(i).length);}}
function dayDiff(future)
{var start=new Date(future),end=new Date(),diff=new Date(start-end);day=diff/1000/60/60/24;return Math.round(day);}
$(function(){var $window=$(window),$document=$(document),transitionSupported=typeof document.body.style.transitionProperty==="string",scrollTime=1;$(document).on("click","a[href*=#]:not([href=#])",function(e){var target,avail,scroll,deltaScroll;if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){target=$(this.hash);target=target.length?target:$("[id="+this.hash.slice(1)+"]");if(target.length){avail=$document.height()-$window.height();if(avail>0){scroll=target.offset().top;if(scroll>avail){scroll=avail;}}else{scroll=0;}
deltaScroll=$window.scrollTop()-scroll;if(!deltaScroll){return;}
e.preventDefault();if(transitionSupported){$("html").css({"margin-top":deltaScroll+"px","transition":scrollTime+"s ease-in-out"}).data("transitioning",scroll);}else{$("html, body").stop(true,true).animate({scrollTop:scroll+"px"},scrollTime*1000);return;}}}});if(transitionSupported){$("html").on("transitionend webkitTransitionEnd msTransitionEnd oTransitionEnd",function(e){var $this=$(this),scroll=$this.data("transitioning");if(e.target===e.currentTarget&&scroll){$this.removeAttr("style").removeData("transitioning");$("html, body").scrollTop(scroll);}});}});