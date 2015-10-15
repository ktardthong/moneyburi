<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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
        'created_at'];

    public static function getAllTransactionByUId($uid)
    {
        $data = DB::table('transaction')
            ->select('cate_id', 'trans_type', 'trans_repeat', 'pmt_type', 'cc_id', 'amount', 'location', 'note', 'trans_date', 'created_at')
            ->where('uid', $uid)
            ->get();
        return json_encode($data);
    }
}
