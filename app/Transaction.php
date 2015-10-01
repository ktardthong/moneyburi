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
        'amount',
        'location',
        'note',
        'trans_date',
        'created_at'];

    public static function getAllTransactionByUId($uid)
    {
        $data = DB::table('transaction')
            ->select('cate_id', 'trans_type', 'trans_repeat', 'pmt_type', 'amount', 'location', 'note', 'trans_date', 'created_at')
            ->where('uid', $uid)
            ->get();
        return json_encode($data);
    }
}
