<?php
namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class UserJobs  extends  Eloquent{
    protected $table = 'user_jobs';

    public static function get()
    {
        $data = DB::table('users_jobs')
                ->select('id', 'name')
                ->get();
        return json_encode($data);
    }

}