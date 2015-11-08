<?php

use Illuminate\Database\Seeder;

class CCIssuerSeeder extends Seeder
{
    public function run()
    {
        DB::table('cc_issuer')->delete();

        $data = [
            ['id' => 1,     'name'  => 'BBL'],
            ['id' => 2,     'name'  => 'Central Card'],
            ['id' => 3,     'name'  => 'KBANK'],
            ['id' => 4,     'name'  => 'Citibank'],
            ['id' => 5,     'name'  => 'CIMB THAI'],
            ['id' => 6,     'name'  => 'TMB'],
            ['id' => 7,     'name'  => 'TESCO'],
            ['id' => 8,     'name'  => 'SCB'],
            ['id' => 9,     'name'  => 'Thanachart'],
            ['id' => 10,     'name'  => 'Bank of China'],
            ['id' => 11,     'name'  => 'KTC'],
            ['id' => 12,     'name'  => 'Krungsri'],
            ['id' => 13,     'name'  => 'UOB'],
            ['id' => 14,     'name'  => 'Standard Chartered'],
            ['id' => 15,     'name'  => 'AMEX'],
            ['id' => 16,     'name'  => 'First Choice'],
            ['id' => 17,     'name'  => 'AEON'],
            ['id' => 18,     'name'  => 'ICBC'],
        ];
        DB::table('cc_issuer')->insert($data);
    }
}
