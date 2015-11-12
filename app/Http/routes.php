<?php

//Language switcher
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

//APP - Angular
Route::get('/tpl_overview','AppController@tpl_overview');
Route::get('/goalController', 'AppController@goalController');
Route::get('/dailySpendableDough', 'AppController@dailyDough');
Route::get('/spendableChart', 'AppController@spendableChart');

Route::get('/spendableCard', 'AppController@spendableCard');    //the main card
Route::get('/monthlySpendableChart','AppController@monthlySpendableChart');

//Route::get('/spendableChart', 'AppController@spendableChart');

Route::get('/spendingCateChart', 'AppController@spendingCategoriesChart');
Route::get('/transList', 'AppController@transList');
Route::get('/transRecent', 'AppController@transRecent');
Route::get('/addTrans', 'AppController@addTrans');
Route::get('/transCard', 'AppController@transactions');



//PAGES
Route::get('/','PagesController@home');
Route::get('/welcome', 'PagesController@welcome');
Route::get('/login','PagesController@login');
Route::post('/login','PagesController@post_login');
Route::get('/logout','PagesController@logout');
Route::get('/register','PagesController@register');
Route::post('/register','PagesController@post_register');
Route::get('/bill'       ,'PagesController@bill');
Route::get('/credit_cards','PagesController@creditcards');


//USER
Route::get('/user','ProfileController@user');


//PROFILE
Route::get('/profile','AppController@spendableCard');
Route::get('/profile/update_info','ProfileController@edit');
Route::get('/profile/spendable','ProfileController@spendable');
Route::post('/profile/update','ProfileController@update');


//Transaction
Route::get('/showTransaction'   ,   'TransactionController@show');
Route::post('/add_transaction'  ,   'TransactionController@add_transaction');
Route::get('/getAllTransactions',   'TransactionController@getAllTransactionsForCurrentUser');
Route::get('/todaySpending'     ,   'TransactionController@todaySpending');
Route::get('/userMonthlySpending',  'TransactionController@userMonthlySpending');


//Upload image
Route::post('/profileImage/upload', 'ProfileController@imageUpload');

//Facebook login
Route::get('login/fb', 'PagesController@loginFB');
Route::get('login/fb/callback', 'PagesController@loginFBCallback');



//Ajax
Route::get('ajax/getUserJobs',   'AjaxController@getUserJob');
Route::get('ajax/billCate',     'AjaxController@billCate');
Route::get('ajax/transRepeat',  'AjaxController@transRepeat');
Route::get('ajax/ccIssuer',     'AjaxController@ccIssuer');
Route::get('ajax/ccTypes',      'AjaxController@ccTypes');
Route::get('ajax/currency',     'AjaxController@user_currencies');
Route::get('ajax/userData',     'AjaxController@userData');
Route::get('ajax/pmtTypes',     'AjaxController@pmtTypes');
Route::get('ajax/transTypes',     'AjaxController@transTypes');

//AJAX POST
Route::post('ajax/userPlan',        'AjaxController@userplan');
Route::post('ajax/userFinance',     'AjaxController@userFinanceData');
Route::post('ajax/userName',        'AjaxController@userInfoUpdate');
Route::post('ajax/userStatus',      'AjaxController@userStatus');
Route::post('ajax/InitUpdate',      'AjaxController@initUpdate');



//BILLS
Route::get('/bill/billCard',         'BillController@billCard');         //Bill card landing
Route::get('bill/tpl_billList',     'BillController@billList');         //List of bills
Route::get('bill/billCompactList',  'BillController@billCompactList');  //Compact bill list
Route::get('bill/viewBills',        'BillController@getViewBill');      //The bill calculator
Route::get('bill/getBills',         'BillController@getBill');
Route::get('bill/userBill',         'BillController@userBill');
Route::get('bill/sumBillAmount',    'BillController@sumBill');
Route::get('bill/upComing',         'BillController@comingBill');
Route::post('ajax/addBills',        'AjaxController@addBills');
Route::post('ajax/togglePaid',      'AjaxController@togglePaid');
Route::post('ajax/removeBills',     'AjaxController@removeBills');
Route::post('bill/billStatus',      'BillController@billStatus');    //get is paid or unpaid bill
Route::post('ajax/undoRemoveBills', 'AjaxController@undoRemoveBills');

//CREDIT CARDS
Route::get('card/mainCard',       'CreditCardController@index');
Route::get('card/tpl_cardList',   'CreditCardController@tpl_cardList');
Route::get('card/getCards',       'CreditCardController@getCC');
Route::post('card/addCard',       'CreditCardController@addCard');
Route::post('card/removeCard',    'CreditCardController@removeCard');
Route::post('card/undoRemoveCard',    'CreditCardController@undoRemoveCard');
Route::get('card/sumMonthTransaction', 'CreditCardController@sumMonthTransaction');
Route::get('card/useCardTransaction', 'CreditCardController@useCardTransaction');

//Spendable Tracker
Route::get('spendableTracker/get',       'SpendableController@get');
Route::get('spendableTracker/getMonth',  'SpendableController@getMonth');



//User Setting
Route::post('ajax/updateUserInfo',  'AjaxController@updateUserInfo');
Route::post('ajax/updateUserData',  'AjaxController@updateUserData');




//GOALS
Route::get('goal/card_goal',        'GoalsController@card_goal');       //goal Container card
Route::get('goal/goal_buying',      'GoalsController@goal_buying');      //goal buying
Route::get('goal/goal_summary',     'GoalsController@goal_summary');     //goal summary card
Route::get('goal/goal_travel',      'GoalsController@goal_travel');     //goal summary card
Route::get('goal/goal_buycar',      'GoalsController@goal_buycar');     //goal summary card
Route::get('goal/goal_buyhome',     'GoalsController@goal_buyhome');     //goal summary card
Route::get('goal/getCarBrands',     'GoalsController@getCarBrands');     //list of car brands

Route::get('ajax/userGoals',        'GoalsController@getUserGoals');    //get the list of user goal
Route::post('ajax/showCompletedGoal',       'GoalsController@showCompletedGoal');    //get the list of user goal
Route::post('ajax/setGoalTravel',   'AjaxController@setGoalTravel');
Route::post('ajax/setGoalTarget',   'AjaxController@setGoalTarget');
Route::get('ajax/getUserTravelGoal',     'AjaxController@getUserTravelGoal');
Route::post('ajax/setCarGoal',           'AjaxController@setCarGoal');  //Set goal for car
Route::post('ajax/removeGoal',           'GoalsController@removeGoal');  //Set goal for car


//mails
Route::get('/mail_reg_confirm',function () {
    return view('mails.reg_confirm', compact('user'));
});
Route::get('/mail_weekly_update',function () {
    return view('mails.weekly_update');
});




//Init setup
Route::get('init_setup',function () {

    if(!Auth::user()){
        return view('pages.login');
    }
    $page_title = "First time set up -  Moneyburi";
    $page_descs = "";

    if(Auth::user()->init_setup == 1)
    {
        return redirect("/");
    }

    $quote = \App\MoneyQuote::orderByRaw("RAND()")->first();
    return view('init_setup.init_setup', compact('page_title', 'page_descs', 'user_data','quote'));
});
//END INIT SETUP
