<?php

use Illuminate\Database\Seeder;

class TranstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [['id' => 1, 'name'  => 'Expense'],
                 ['id' => 2, 'name'  => 'Income']];
        DB::table('trans_type')->insert($data);
    }
}
