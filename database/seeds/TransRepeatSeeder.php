<?php

use Illuminate\Database\Seeder;

class TransRepeatSeeder extends Seeder
{
    public function run()
    {
        DB::table('trans_repeat')->delete();

        $data = [['id' => 0, 'name'  => 'None'],
                 ['id' => 1, 'name'  => 'Daily'],
                 ['id' => 2, 'name'  => 'Weekly'],
                 ['id' => 3, 'name'  => 'Monthly']
                ];
        DB::table('trans_repeat')->insert($data);
    }
}
