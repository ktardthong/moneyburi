<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;
use Auth;
use Carbon;
use Image;

class BillController extends Controller
{
    //Get the list of bills
    public static function getBill()
    {
        if(Auth::user())
        {
            return \App\userBills::get();
        }
    }

    //Get the total sum amount
    public static function sumBill()
    {
        if(Auth::user())
        {
            return \App\userBills::sumBillAmount();
        }
    }

    //Up coming bill
    public static function comingBill()
    {
        if(Auth::user())
        {
            return \App\userBills::upcomingBill();
        }
    }

    //Toggle bill status
    public function billStatus(Request $request)
    {
        if(Auth::user())
        {
            return \App\userBills::upcomingBill($request->bill_status);
        }
    }


    public function getViewBill()
    {
        return view('app.bills.tpl_billView');
    }

    public function billCompactList()
    {
        return view('app.bills.tpl_billCompactList');
    }

    public function billList()
    {
        return view('app.bills.tpl_billList');
    }

    public function userBill()
    {
        return view('app.bills.tpl_userBill');
    }

    //Main Card display for bill
    public function billCard()
    {
        if(Auth::user()){
            return view('app.bills.tpl_billCard');
        }
        else{
            return view('pages.login');
        }

    }
}