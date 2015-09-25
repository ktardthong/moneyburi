<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('currencies')->delete();
        $data = [
                 ['id' => 1, 'currency_code'  => 'USD', 'currency_desc'  => 'Income', 'currency_sym' => '$'],
                 ['id' => 2, 'currency_code'  => 'THB', 'currency_desc'  => 'Income', 'currency_sym' => '฿'],
                 ['id' => 3, 'currency_code'  => 'JPY', 'currency_desc'  => 'Income', 'currency_sym' => '¥'],
                ];
        DB::table('currencies')->insert($data);
    }
}
