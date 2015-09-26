<?php

use Illuminate\Database\Seeder;

class CCTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cc_types')->delete();

        $data = [
                    ['id' => 1,     'name'  => 'VISA'],
                    ['id' => 2,     'name'  => 'MASTERCARD'],
                    ['id' => 3,     'name'  => 'AMEX']
                ];
        DB::table('cc_types')->insert($data);
    }
}
