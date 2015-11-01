<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Auth;

class CardApp  extends  Eloquent{
//    protected $table = 'user_jobs';


    //Getting CC issuer
    public static function cc_issuer()
    {
        $data = DB::table('cc_issuer')
                ->select('id', 'name')
                ->get();
        return json_encode($data);
    }

    //Getting CC types
    public static function cc_types()
    {
        $data = DB::table('cc_types')
                ->select('id', 'name')
                ->get();
        return json_encode($data);
    }

    //Getting currencies
    public static function user_currencies()
    {
        $data = DB::table('currencies')
                ->select('id', 'currency_code','currency_desc','currency_sym')
                ->get();
        return json_encode($data);
    }




    //Get all user goals
    public static function getAllGoals()
    {
        $active_flg =1;
        if(Auth::user()) {

            $uid = Auth::user()->id;

            $goal_general = DB::table('goal_general')
                            ->where('uid',Auth::user()->id)
                            ->where('flg',$active_flg)
                            ->select('uid','name','where','mth_saving',
                                      DB::RAW('1 as goal_type'),'created_at');

            $goal_travel = DB::table('goal_travel')
                            ->where('uid',Auth::user()->id)
                            ->where('flg',$active_flg)
                            ->select('uid','goal_travel.where_to','goal_travel.where_to', 'mth_saving',
                                      DB::RAW('2 as goal_type'),'created_at')
                            ;

            $goal = DB::table('goal_car')
                        ->join('carbrandname', 'goal_car.brand', '=', 'carbrandname.id')
                        ->where('uid',Auth::user()->id)
                        ->where('goal_car.flg',$active_flg)
                        ->select('uid','model as name','carbrandname.images as ext', 'mth_saving',
                                  DB::RAW('3 as goal_type'),'goal_car.created_at')
                        ->union($goal_travel)
                        ->union($goal_general)
                        ->get();

            return json_encode($goal);
        }
    }
}