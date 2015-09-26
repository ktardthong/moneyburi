<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

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
}