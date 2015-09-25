<?php

use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->delete();

        $data = [
                ['id' => 1,     'name'  => 'Cash'],
                ['id' => 2,     'name'  => 'Credit Card']
                ];
        DB::table('payment_types')->insert($data);
    }
}
