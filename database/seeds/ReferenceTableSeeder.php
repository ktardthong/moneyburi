<?php

use Illuminate\Database\Seeder;

class ReferenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reference')->delete();

        $data = [
                 //User action start with 1XX
                 ['id' => 100, 'name'  => 'User Add'    , 'description' => 'User Add'],
                 ['id' => 101, 'name'  => 'User Update' , 'description' => 'User Update'],
                 ['id' => 102, 'name'  => 'User Delete' , 'description' => 'User Delete'],

                //System action start with 2XX
                 ['id' => 200, 'name'  => 'System Add'   , 'description' => 'System Add'],
                 ['id' => 201, 'name'  => 'System Update', 'description' => 'System Update'],
                 ['id' => 202, 'name'  => 'System Delete', 'description' => 'System Delete'],

                ];

        DB::table('reference')->insert($data);
    }
}
