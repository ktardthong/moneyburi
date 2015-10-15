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
                    ['id' => 1,     'name'  => 'Visa',      'cc_icon'=> 'fa fa-cc-visa' ],
                    ['id' => 2,     'name'  => 'MasterCard','cc_icon'=> 'fa fa-cc-mastercard' ],
                    ['id' => 3,     'name'  => 'Amex',      'cc_icon'=> 'fa fa-cc-amex' ],
                    ['id' => 4,     'name'  => 'Diners',    'cc_icon'=> 'fa fa-cc-diners-club' ],
                    ['id' => 5,     'name'  => 'Jcb',       'cc_icon'=> 'fa fa-cc-jcb'],
                    ['id' => 6,     'name'  => 'Paypal',    'cc_icon'=> 'fa fa-cc-paypal'],
                    ['id' => 7,     'name'  => 'Discover',  'cc_icon'=> 'fa fa-cc-discover']
                ];
        DB::table('cc_types')->insert($data);
    }
}
