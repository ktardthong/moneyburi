<?php

use Illuminate\Database\Seeder;

class SpendableTrackerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('spendable_tracker')->delete();

        $data = [
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-01'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-02'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-03'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-04'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-05'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-06'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-07'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-08'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-09'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-10'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-11'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-12'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-13'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-14'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-15'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-16'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-17'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-18'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-19'],
            ['ref_id'=>200, 'uid'  => 3,'spendable'=>1000,'remaing_day'=>1000,'created_at'=>'2015-10-20'],
        ];

        DB::table('spendable_tracker')->insert($data);
    }
}
