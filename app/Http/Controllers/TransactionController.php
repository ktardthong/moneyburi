<?php

namespace App\Http\Controllers;


use App\Transaction;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;

class TransactionController extends Controller
{
    public function show()
    {
        $page_title     =   "moneyburi!";
        $page_descs     =   "";
        return view('transaction.transaction',compact('page_title','page_descs'));
    }

    protected function createTransaction(array $data)
    {
        return Transaction::create($data
//            [
////            'email'     => $data['email'],
////            'password'  => md5($data['password']),
//            'uid' => 234,
//            'flg' => 1,
//            'cate_id' => 3,
//            'trans_type' => 2,
//            'trans_repeat' => 2,
//            'pmt_type' => 3,
//            'amount' => 2500,
//            'location' => 234325235,
//            'note' => 'note note note',
//            'trans_date' => '2015-09-25 21:14:31',
//            'created_at' => '2015-09-25 23:14:31'
//        ]
        );
    }

    public function add_transaction(Request $request)
    {
        $data = array(
            'uid' => 234,
            'flg' => 1,
            'cate_id' => 3,
            'trans_type' => 2,
            'trans_repeat' => 2,
            'pmt_type' => 3,
            'amount' => 2500,
            'location' => 234325235,
            'note' => 'note note note',
            'trans_date' => '2015-09-25 21:14:31',
            'created_at' => '2015-09-25 23:14:31'
        );

        $this->createTransaction($data);

        return redirect('/profile');
    }


}
