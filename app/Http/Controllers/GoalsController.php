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
    //Display Goal's card
    public function card_goal()
    {
        return view('app.html.card_goals');
    }

    //Goal Buying
    public function goal_buying()
    {
        return view('app.html.card_goals.goal_buying');
    }

    public function goal_summary()
    {
        return view('app.html.card_goals.goal_summary');
    }

    public function goal_buycar()
    {
        return view('app.html.card_goals.goal_buycar');
    }

    public function goal_travel()
    {
        return view('app.html.card_goals.goal_travel');
    }

    public function goal_buyhome()
    {
        return view('app.html.card_goals.goal_buyhome');
    }


    //Get the list of user goal
    public static function getUserGoals()
    {
        return \App\CardApp::getAllGoals();
    }
}