<?php
/**
 * Created by PhpStorm.
 * User: Kantatorn
 * Date: 10/7/2015
 * Time: 11:19 AM
 */

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

class SpendableTracker extends Model
{
    protected $table = 'spendable_tracker';


    //Get weekly
    public static function get()
    {
        $data = DB::table('spendable_tracker')
                    ->orderBy(DB::raw('DATE(created_at)'), 'Asc')
                    ->where('uid',Auth::user()->id)
                    ->select(DB::raw('DATE_FORMAT(DATE(created_at),\'%a %d\') as date,spendable, sum(t_transaction) as remain'))
                    ->groupby(DB::raw('DATE(created_at)'))
                    ->limit(7)->get();
        return json_encode($data);
    }



    public static function getMonth()
    {
        $data = DB::table('spendable_tracker')
            ->orderBy(DB::raw('DATE(created_at)'), 'Asc')
            ->where('uid',Auth::user()->id)
            ->where(DB::raw('month(created_at)'),DB::raw('month(CURDATE())'))
            ->select(DB::raw('DATE_FORMAT(DATE(created_at),\'%a %d\') as date,spendable, sum(t_transaction) as remain'))
            ->groupby(DB::raw('DATE(created_at)'))
            ->get();

        return json_encode($data);
    }
} 