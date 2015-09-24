<?php

//PAGES
Route::get('/','PagesController@home');
Route::get('/login','PagesController@login');
Route::post('/login','PagesController@post_login');
Route::get('/logout','PagesController@logout');
Route::get('/register','PagesController@register');
Route::post('/register','PagesController@post_register');


//PROFILE
Route::get('/profile','ProfileController@index');
Route::get('/profile/update_info','ProfileController@edit');
Route::post('/profile/update','ProfileController@update');

//Transaction
Route::get('/showTransaction','TransactionController@show');


//Init setup
Route::get('/init_setup',function () {
    $page_title = "First time set up - Welcome - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup', compact('page_title', 'page_descs', 'user_data'));
});
Route::get('/init_setup_1',function () {
    $page_title = "First time set up - Name - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup_1', compact('page_title', 'page_descs', 'user_data'));
});
Route::get('/init_setup_2', function () {
    $page_title = "First time set up - Age - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup_2', compact('page_title', 'page_descs', 'user_data'));
});
Route::get('/init_setup_3', function () {
    $page_title = "First time set up - Income & Expense - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup_3', compact('page_title', 'page_descs', 'user_data'));
});
Route::get('/init_setup_4', function () {
    $page_title = "First time set up - Saving - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup_4', compact('page_title', 'page_descs', 'user_data'));
});
Route::get('/init_setup_5', function () {
    $page_title = "First time set up - Complete - Moneyburi";
    $page_descs = "";
    return view('init_setup.init_setup_5', compact('page_title', 'page_descs', 'user_data'));
});

Route::get('login/fb', 'PagesController@loginFB');

Route::get('login/fb/callback', 'PagesController@loginFBCallback');
