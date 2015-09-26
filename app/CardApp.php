<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CardApp  extends  Eloquent{
//    protected $table = 'user_jobs';

    public static function cc_issuer()
    {
        $data = DB::table('cc_issuer')
                ->select('id', 'name')
                ->get();
        return json_encode($data);
    }


    public static function cc_types()
    {
        $data = DB::table('cc_types')
                ->select('id', 'name')
                ->get();
        return json_encode($data);
    }
}