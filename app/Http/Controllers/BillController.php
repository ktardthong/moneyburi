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
}