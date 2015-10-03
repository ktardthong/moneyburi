<?php
namespace App;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class GoalGeneral  extends  Eloquent{

    public static function getUserTargetGoal()
    {
        if(Auth::user())
        {
            $data = DB::table('goal_general')
                ->where('uid',Auth::user()->id)
                ->get();
            return json_encode($data);
        }
    }

} 