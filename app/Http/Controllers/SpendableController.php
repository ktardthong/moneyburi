<?php

namespace App\Http\Controllers;


use Validator;
use Auth;


class SpendableController extends Controller
{
    public static function get()
    {
        if(Auth::user()){
            return \App\SpendableTracker::get();
        }
    }


    //Get monthly spendable transaction
    public static function getMonth()
    {
        if(Auth::user()) {
            return \App\SpendableTracker::getMonth();
        }
    }
}