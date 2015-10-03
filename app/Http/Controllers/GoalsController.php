<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Socialite;
use Illuminate\Routing\Controller;
use Stevebauman\Location\Facades\Location;

class GoalsController extends Controller
{
    public static function getUserGoals()
    {
        return \App\CardApp::getAllGoals();
    }
}