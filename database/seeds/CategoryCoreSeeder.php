<?php

use Illuminate\Database\Seeder;

class CategoryCoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_core')->delete();

        $data = [
                    ['id' => 1,  'flg'=> 1, 'name'  => 'Transport'],
                    ['id' => 2,  'flg'=> 1, 'name'  => 'Food'],
                    ['id' => 3,  'flg'=> 1, 'name'  => 'Shopping'],
                    ['id' => 4,  'flg'=> 1, 'name'  => 'Groceries'],
                    ['id' => 5,  'flg'=> 1, 'name'  => 'Entertainment'],
                    ['id' => 6,  'flg'=> 1, 'name'  => 'Travel'],
                    ['id' => 7,  'flg'=> 1, 'name'  => 'Health'],
                    ['id' => 8,  'flg'=> 1, 'name'  => 'Beauty'],
                    ['id' => 9,  'flg'=> 1, 'name'  => 'Utility - Electric'],
                    ['id' => 10, 'flg'=> 1, 'name'  => 'Utility - Internet'],
                    ['id' => 11, 'flg'=> 1, 'name'  => 'Utility - Phone'],
                    ['id' => 12, 'flg'=> 1, 'name'  => 'Utility - Water']
                ];

        DB::table('category_core')->insert($data);
    }
}
