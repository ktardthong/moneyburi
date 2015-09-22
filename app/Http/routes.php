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