<?php

use Illuminate\Database\Seeder;

class UserjobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_jobs')->delete();
        $data = [
                    ['id' => 1,     'name'  => 'Student'],
                    ['id' => 2,     'name'  => 'Salary man/woman'],
                    ['id' => 3,     'name'  => 'Business Owner / Freelance'],
                    ['id' => 999,   'name'  => 'Others'],
                ];
        DB::table('users_jobs')->insert($data);
    }
}
