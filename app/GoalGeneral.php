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


    //Update user spendable
    //Convert daily saving to reflect spendable
    public static function updateSpendable($goal_mth_saving)
    {
        if(Auth::user())
        {
            $user = \App\User::find(Auth::user()->id);
            $user->mth_spendable    = $user->mth_spendable - $goal_mth_saving;
            $user->d_spendable      = $user->d_spendable  - ($goal_mth_saving/30);
            $user->goal_saving      = $goal_mth_saving;
            $user->save();
        }
    }

} 