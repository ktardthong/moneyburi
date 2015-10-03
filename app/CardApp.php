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





    public static function getAllGoals()
    {
        if(Auth::user()) {

            $uid = Auth::user()->id;

            $q = "SELECT  (
                    SELECT COUNT(*)
                    FROM   goal_car
                    WHERE		uid=$uid
                    ) AS car,

                    (
                    SELECT COUNT(*)
                    FROM   goal_general
                            WHERE		uid=$uid
                    ) AS general,

                    (
                    SELECT COUNT(*)
                    FROM   goal_home
                            WHERE		uid=$uid
                    ) AS home,

                    (
                    SELECT COUNT(*)
                    FROM   goal_travel
                            WHERE		uid=$uid
                    ) AS travel
                    FROM    dual";
            $data = DB::select($q, array());

            return json_encode($data[0]);
        }
    }
}