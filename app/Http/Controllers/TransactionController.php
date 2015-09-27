<?php

namespace App\Http\Controllers;


use App\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Tests\Caster\CasterTest;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function show()
    {
        $page_title     =   "moneyburi!";
        $page_descs     =   "";

        return view('transaction.transaction',compact('page_title','page_descs', 'cates'));
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
            'uid' => Auth::user()->id,
            'flg' => 1,
            'cate_id' => $request->cate_id,
            'trans_type' => $request->trans_type,
            'trans_repeat' => $request->trans_repeat,
            'pmt_type' => $request->pmt_type,
            'amount' => $request->amount,
            'location' => $request->location,
            'note' => $request->note,
            'trans_date' => $request->trans_date,
            'created_at' => Carbon::now()
        );

        $this->createTransaction($data);

        return redirect('/profile');
    }

}
