<?php
namespace App;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class GoalTravel  extends  Eloquent{

    public static function getUserTravelGoal()
    {
        if(Auth::user())
        {
            $data = DB::table('goal_travel')
                ->where('uid',Auth::user()->id)
                ->get();
            return json_encode($data);
        }
    }

} 