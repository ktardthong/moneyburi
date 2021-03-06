<?php

namespace App\Http\Controllers;


use App\Transaction;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Carbon\Carbon;
use Stevebauman\Location\Facades\Location;


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
        return Transaction::create($data);
    }

    public function getAllTransactionsForCurrentUser()
    {

        if(Auth::user())
        {
            $uid = Auth::user()->id;
            return Transaction::getAllTransactionByUId(Auth::user()->id);
        }
    }

    public function add_transaction(Request $request)
    {
        //Geo info
        $location = Location::get();
        $city       =   $location->cityName;
        $country    =   $location->countryCode;

        $data = array(
            'uid' => Auth::user()->id,
            'flg' => 1,
            'cate_id' => $request->cate_id,
            'trans_type' => $request->trans_type,
//            'trans_repeat' => $request->trans_repeat,
            'cc_id' => $request->cc_id,
            'bill_id' => $request->bill_id,
            'pmt_type' => $request->pmt_type,
            'amount' => $request->amount,
            'location' => $request->location,
            'note' => $request->note,
            'trans_date' => $request->trans_date,
            'lat'       =>$location->latitude,
            'lng'       =>$location->longitude,
            'cityName'  =>$city,
            'postalCode'=>$location->postalCode,
            'countryCode'=>$country,
            'created_at' => Carbon::now(),
            'location_provider' => $request->location_provider

        );
        print_r($data);
        $this->createTransaction($data);

        //return redirect('/profile');
    }

    //Get user total day spending
    public function todaySpending()
    {
        if(Auth::user()) {
            return \App\Transaction::todaySpending();
        }
    }


    //Get user month spending for the current month
    public function userMonthlySpending()
    {
        if(Auth::user())
        {
            return \App\Transaction::userMonthlySpending();
        }
    }

}
