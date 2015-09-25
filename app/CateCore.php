<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CateCore  extends  Eloquent{
    protected $table = 'category_core';

    public static function get()
    {
        $data = DB::table('category_core')
                    ->where('flg',1)
                    ->select('id', 'name')
                    ->get();
        return json_encode($data);
    }

}