<?php

use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->delete();

        DB::table('transaction')->insert([
                [
                    'id' => 1,
                    'uid' => 1,
                    'flg'  => 1,
                    'cate_id'  => 3,
                    'trans_type'     => 1,
                    'trans_repeat'    => 1,
                    'pmt_type'    => 1,
                    'amount'=> 320.00,
                    'location'       => 239362832612,
                    'note'      => 'Note 1',
                    'trans_date'   => '2015-10-01 17:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 2,
                    'uid' => 1,
                    'flg'  => 1,
                    'cate_id'  => 1,
                    'trans_type'     => 1,
                    'trans_repeat'    => 3,
                    'pmt_type'    => 1,
                    'amount'=> 1500.00,
                    'location'       => 2393312832612,
                    'note'      => 'Note 2',
                    'trans_date'   => '2015-10-01 16:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 3,
                    'uid' => 1,
                    'flg'  => 1,
                    'cate_id'  => 6,
                    'trans_type'     => 1,
                    'trans_repeat'    => 2,
                    'pmt_type'    => 2,
                    'amount'=> 2400.00,
                    'location'       => 22313312832612,
                    'note'      => 'Note 3',
                    'trans_date'   => '2015-10-01 18:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],

                [
                    'id' => 4,
                    'uid' => 2,
                    'flg'  => 1,
                    'cate_id'  => 3,
                    'trans_type'     => 1,
                    'trans_repeat'    => 1,
                    'pmt_type'    => 1,
                    'amount'=> 320.00,
                    'location'       => 239362832612,
                    'note'      => 'Note 1',
                    'trans_date'   => '2015-10-01 17:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 5,
                    'uid' => 2,
                    'flg'  => 1,
                    'cate_id'  => 1,
                    'trans_type'     => 1,
                    'trans_repeat'    => 3,
                    'pmt_type'    => 1,
                    'amount'=> 1500.00,
                    'location'       => 2393312832612,
                    'note'      => 'Note 2',
                    'trans_date'   => '2015-10-01 16:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 6,
                    'uid' => 2,
                    'flg'  => 1,
                    'cate_id'  => 6,
                    'trans_type'     => 1,
                    'trans_repeat'    => 2,
                    'pmt_type'    => 2,
                    'amount'=> 2400.00,
                    'location'       => 22313312832612,
                    'note'      => 'Note 3',
                    'trans_date'   => '2015-10-01 18:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],

                [
                    'id' => 7,
                    'uid' => 3,
                    'flg'  => 1,
                    'cate_id'  => 3,
                    'trans_type'     => 1,
                    'trans_repeat'    => 1,
                    'pmt_type'    => 1,
                    'amount'=> 320.00,
                    'location'       => 239362832612,
                    'note'      => 'Note 1',
                    'trans_date'   => '2015-10-01 17:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 8,
                    'uid' => 3,
                    'flg'  => 1,
                    'cate_id'  => 1,
                    'trans_type'     => 1,
                    'trans_repeat'    => 3,
                    'pmt_type'    => 1,
                    'amount'=> 1500.00,
                    'location'       => 2393312832612,
                    'note'      => 'Note 2',
                    'trans_date'   => '2015-10-01 16:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ],
                [
                    'id' => 9,
                    'uid' => 3,
                    'flg'  => 1,
                    'cate_id'  => 6,
                    'trans_type'     => 1,
                    'trans_repeat'    => 2,
                    'pmt_type'    => 2,
                    'amount'=> 2400.00,
                    'location'       => 22313312832612,
                    'note'      => 'Note 3',
                    'trans_date'   => '2015-10-01 18:43:09',
                    'created_at'  =>  '2015-10-02 17:43:09',
                    'updated_at' =>  '2015-10-02 17:43:09'
                ]
            ]
        );
    }
}
