<?php

use Illuminate\Database\Seeder;

class CCIssuerSeeder extends Seeder
{
    public function run()
    {
        DB::table('cc_issuer')->delete();

        $data = [
            ['id' => 1,     'name'  => 'BBL' ,          'icon' => '/banks_logo/bbl.png'],
            ['id' => 2,     'name'  => 'Central Card',  'icon' => '/banks_logo/centralCard.png'],
            ['id' => 3,     'name'  => 'KBANK',         'icon' => '/banks_logo/kbank.png'],
            ['id' => 4,     'name'  => 'Citibank',      'icon' => '/banks_logo/citi.png'],
            ['id' => 5,     'name'  => 'CIMB THAI',     'icon' => '/banks_logo/cimb.png'],
            ['id' => 6,     'name'  => 'TMB',           'icon' => '/banks_logo/tmb.png'],
            ['id' => 7,     'name'  => 'TESCO',         'icon' => '/banks_logo/tesco.png'],
            ['id' => 8,     'name'  => 'SCB',           'icon' => '/banks_logo/scb.png'],
            ['id' => 9,     'name'  => 'Thanachart',    'icon' => '/banks_logo/thanachart.png'],
            ['id' => 10,     'name'  => 'Bank of China','icon' => '/banks_logo/bbl.png'],
            ['id' => 11,     'name'  => 'KTC',          'icon' => '/banks_logo/ktc.png'],
            ['id' => 12,     'name'  => 'Krungsri',     'icon' => '/banks_logo/krungsri.png'],
            ['id' => 13,     'name'  => 'UOB',          'icon' => '/banks_logo/uob.png'],
            ['id' => 14,     'name'  => 'Standard Chartered','icon' => '/banks_logo/standard.png'],
            ['id' => 15,     'name'  => 'AMEX',         'icon' => '/banks_logo/amex.png'],
            ['id' => 16,     'name'  => 'First Choice', 'icon' => '/banks_logo/bbl.png'],
            ['id' => 17,     'name'  => 'AEON',         'icon' => '/banks_logo/aeon.png'],
            ['id' => 18,     'name'  => 'ICBC',         'icon' => '/banks_logo/bbl.png'],
        ];
        DB::table('cc_issuer')->insert($data);
    }
}
