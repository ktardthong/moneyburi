<?php

namespace App;

use App\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Tests\Caster\CasterTest;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class userBills extends  Eloquent{
    protected $table = 'user_bills';

    //get the bill list
    public static function get()
    {
        if(Auth::user()->id)
        {
            $data = \App\userBills::where('user_bills.flg',1)
                                    ->where('uid',Auth::user()->id)
                                    ->join('category_core', 'user_bills.cate_id', '=', 'category_core.id')
                                    ->where('category_core.flg',1)
                                    ->select('user_bills.id as id',
                                             'user_bills.amount',
                                             'user_bills.is_paid',
                                             'user_bills.due_date','category_core.name')
                                    ->get();
            return json_encode($data);
        }
    }

    //get the total bill amount
    public static function sumBillAmount()
    {
        if(Auth::user()->id)
        {
            $data = \App\userBills::where('flg',1)
                                    ->where('uid',Auth::user()->id)
                                    ->sum('amount');
            return $data;
        }
    }


    //Update bill amount to user table
    public static function updateBillAmount()
    {
        if(Auth::user()->id)
        {

            if(\App\User::where('id',Auth::user()->id)
                        ->update(['mth_bill' => userBills::sumBillAmount()]))
            {
                return "update okay";
            }
            else
            {
                return "error log this";
            }
        }
    }


    //Toggle paid status based on billID
    public static function togglePaid($billId)
    {
        if(Auth::user()->id)
        {

            $user = userBills::find($billId);
            $user->is_paid = $user->is_paid == 0? 1:0;
            $user->save();
        }
    }

    //Remove bills
    public static function removeBills($billId)
    {
        if(Auth::user()->id)
        {
            $user = userBills::find($billId);
            $user->flg = 0;
            $user->save();
        }
    }

    //Up coming bills
    public static function upcomingBill()
    {
        $data = \App\userBills::where('user_bills.flg',1)
                                ->where('user_bills.due_date','>',date("d"))
                                ->where('uid',Auth::user()->id)
                                ->where('user_bills.is_paid',0)
                                ->join('category_core', 'user_bills.cate_id', '=', 'category_core.id')
                                ->where('category_core.flg',1)
                                ->select('user_bills.id as id',
                                    'user_bills.amount',
                                    'user_bills.is_paid',
                                    'user_bills.due_date','category_core.name')
                                ->orderBy('user_bills.due_date', 'asc')
                                ->get();
        return json_encode($data);
    }
} 