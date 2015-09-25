<?php

use Illuminate\Database\Seeder;

class TransRepeatSeeder extends Seeder
{
    public function run()
    {
        DB::table('trans_repeat')->delete();

        $data = [['id' => 1, 'name'  => 'None'],
                 ['id' => 2, 'name'  => 'Daily'],
                 ['id' => 3, 'name'  => 'Weekly'],
                 ['id' => 4, 'name'  => 'Monthly']
                ];
        DB::table('trans_repeat')->insert($data);
    }
}
