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


    //Get the list of car brands
    public function getCarBrands()
    {
        if(Auth::user()) {
            return DB::table('carbrandname')->get();
        }
    }

    //Add new goal into trackers
    public function addGoalTracker(Request $request)
    {
        $data = [
                 'goal_id'      =>  $request->goal_id,
                 'uid'          =>  Auth::user()->id,
                 'goal_type'    =>  $request->goal_type,
                 'is_completed' =>  0,
               ];
    }


    //Get the list of user goal
    //if 0 is completed 1 is in progress
    public static function getUserGoals()
    {
        if(Auth::user())
        {
            return \App\CardApp::getAllGoals();
        }
        else
        {
            echo "no user";
        }
    }

    //Show only Completed Goal
    public static function showCompletedGoal(Request $request)
    {
        return \App\CardApp::getAllGoals($request->active_goal_flg);
    }
}