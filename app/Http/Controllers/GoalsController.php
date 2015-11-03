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



    public function goalAmount()
    {
        $active_flg =1;
        $goal_general = DB::table('goal_general')
        ->where('uid',Auth::user()->id)
        ->where('flg',$active_flg)
        ->select('goal_general.id','uid','name','where','mth_saving',
        'duration','duration_complete',
        DB::RAW('1 as goal_type'),'created_at');

        $goal_travel =  DB::table('goal_travel')
        ->where('uid',Auth::user()->id)
        ->where('flg',$active_flg)
        ->select('goal_travel.id','uid','goal_travel.where_to','goal_travel.where_to', 'mth_saving',
        'duration','duration_complete',
        DB::RAW('2 as goal_type'),'created_at');

        $goal_home =  DB::table('goal_home')
        ->where('uid',Auth::user()->id)
        ->where('flg',$active_flg)
        ->select('goal_home.id','uid','name','where', 'mth_saving',
        'duration','duration_complete',
        DB::RAW('4 as goal_type'),'created_at');

        $goal = DB::table('goal_car')
        ->join('carbrandname', 'goal_car.brand', '=', 'carbrandname.id')
        ->where('uid',Auth::user()->id)
        ->where('goal_car.flg',$active_flg)
        ->select('goal_car.id','uid','model as name','carbrandname.images as ext', 'mth_saving',
        'duration','duration_complete',
        DB::RAW('3 as goal_type'),'goal_car.created_at')

        ->union($goal_travel)
        ->union($goal_home)
        ->union($goal_general)

        ->get();

}

    public static function removeGoal(Request $request)
    {
        $goal_table = null;

        switch($request->goal['goal_type']){
            case 1:
                $goal_table = 'goal_general';
            break;
            case 2:
                $goal_table = 'goal_travel';
            break;
            case 3:
                $goal_table = 'goal_car';
            break;
            case 4:
                $goal_table = 'goal_home';
            break;
        }




        $userData = \App\User::find(Auth::user()->id);
        $userData->d_spendable   =  $request->adjusted ;
        $userData->mth_spendable =  $request->adjusted * 30 ;

        if($request->remove == 1)
        {
            $userData->goal_saving   =  $userData->goal_saving - $request->goal['mth_saving'];
            $remove_flg = 0;
        }
        else
        {
            $userData->goal_saving   =  $userData->goal_saving + $request->goal['mth_saving'];
            $remove_flg = 1;
        }



        $userData->save();

        $data = DB::table($goal_table)
                ->where('id', $request->goal['id'])
                ->update(['is_cancel' => $request->remove,'flg'=>$remove_flg]);

        return json_encode($data);

    }
}