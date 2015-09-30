<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class PaymentTypes  extends  Eloquent{
    protected $table = 'payment_types';

    public static function get()
    {
        $data = DB::table('payment_types')
            ->select('id', 'name')
            ->get();
        return json_encode($data);
    }

}