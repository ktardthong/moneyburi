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
            ['id' => 4,     'name'  => 'CitiBank'],
            ['id' => 5,     'name'  => 'KTC'],
            ['id' => 6,     'name'  => 'AEON']
        ];
        DB::table('cc_issuer')->insert($data);
    }
}
