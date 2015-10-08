<?php

namespace App\Http\Controllers;


use Validator;
use Auth;


class SpendableController extends Controller
{
    public static function get()
    {
        return \App\SpendableTracker::get();
    }


    //Get monthly spendable transaction
    public static function getMonth()
    {
        return \App\SpendableTracker::getMonth();
    }
}