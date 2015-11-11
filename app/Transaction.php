<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $fillable = ['uid',
        'flg',
        'cate_id',
        'trans_type',
        'trans_repeat',
        'pmt_type',
        'cc_id',
        'bill_id',
        'amount',
        'location',
        'note',
        'trans_date',
        'created_at',
        'lat',
        'lng',
        'cityName',
        'postalCode',
        'countryCode',
        'created_at',
        'location_provider'];

    public static function getAllTransactionByUId($uid)
    {
        $data = DB::table('transaction')
            ->select('cate_id', 'trans_type', 'trans_repeat', 'pmt_type', 'cc_id', 'amount', 'location', 'note', 'trans_date', 'created_at')
            ->where('uid', $uid)
            ->get();
        return json_encode($data);
    }

    //User spending today
    public static function todaySpending()
    {
        $data = DB::table('users')
                ->where('uid', Auth::user()->id)
                ->rightjoin('transaction','transaction.uid','=','users.id')
                ->where('trans_date',date('Y-m-d'))
                ->select('users.d_spendable',DB::raw('sum(transaction.amount) as todaySpending'))
                ->get() ;

        if(empty($data[0]->todaySpending))
        {
            $data = DB::table('users')->where('id',Auth::user()->id)->select('users.d_spendable')->get();
        }
        return json_encode($data);
    }

    //Get the sum of user spending for the month
    public static function userMonthlySpending()
    {
        $data = DB::table('users')
            ->where('uid', Auth::user()->id)
            ->rightjoin('transaction','transaction.uid','=','users.id')
            ->whereRaw('MONTH(trans_date) = ?', [date('m')])
            ->select('users.mth_spendable',DB::raw('sum(transaction.amount) as monthSpending'))
            ->get() ;

        return $data;
    }
}
