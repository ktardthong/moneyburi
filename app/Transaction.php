<?php

namespace App;

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
}
