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
        DB::table('trans_type')->delete();
        $data = [
                 ['id' => 1, 'name'  => 'Expense'],
                 ['id' => 2, 'name'  => 'Income'],
                 ['id' => 3, 'name'  => 'Bill']
                ];
        DB::table('trans_type')->insert($data);
    }
}
