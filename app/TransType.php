<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class TransType  extends  Eloquent{
    protected $table = 'trans_type';

    public static function get()
    {
        $data = DB::table('trans_type')
            ->select('id', 'name')
            ->get();
        return json_encode($data);
    }

}