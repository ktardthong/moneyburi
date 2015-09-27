<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class TransRepeat  extends  Eloquent{
    protected $table = 'trans_repeat';

    public static function get()
    {
        $data = DB::table('trans_repeat')
                    ->select('id', 'name')
                    ->get();
        return json_encode($data);
    }

}