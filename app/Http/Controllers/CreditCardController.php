<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Socialite;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CreditCardController extends Controller
{
    //The main card page
    public  function index()
    {
        if(Auth::user()){
            return view('app.creditcards.CreditCardView');
        }
        else{
            return view('pages.login');
        }
    }

    //List of user creditcards
    public function tpl_cardList()
    {
        return view('app.creditcards.tpl_cardList');
    }


    //Get the list of user credit cards
    public static function getCC()
    {
        if(Auth::user()) {
            return \App\CreditCard::get();
        }
    }


    //Add user credit card
    public static function addCard(Request $request)
    {
        if(Auth::user()) {
            $data = [
                'type'      => $request->type,
                'issuer'    => $request->issuer,
                'cclimit'   => $request->cclimit,
                'ccnote'    => $request->ccnote,
                'due_date'  => $request->billDue,
                'exp_mth'   => $request->expMth,
                'exp_year'  => $request->expYear,
                'last_four' => $request->lastFour
            ];


            \App\CreditCard::addCard($data);
        }
    }


    //Remove card
    public static function removeCard(Request $request)
    {
        echo $request->cardId;
        if(Auth::user()) {
            \App\CreditCard::removeCard($request->cardId);
        }
    }

    //Undo remove card
    public static function undoRemoveCard(Request $request)
    {
        if(Auth::user()) {
            \App\CreditCard::undoRemoveCard($request->cardId);
        }
    }


    //Sum month transaction for the current month
    public static function sumMonthTransaction()
    {
        $q = DB::table('transaction')
                ->whereRaw('MONTH(trans_date) = ?', [date('m')])
                ->where('flg',1)
                ->where('pmt_type',2)
                ->where('uid',Auth::user()->id)
                ->sum('amount');
        return $q;
    }


    //Get CC spending from user cards
    //Return the sum of CC use for the current month for user
    public static function useCardTransaction()
    {
        $q = DB::table('transaction')
            ->groupBy('cc_users.id')
            ->whereRaw('MONTH(trans_date) = ?', [date('m')])
            ->where('transaction.flg',1)
            ->where('pmt_type',2)
            ->where('cc_users.flg',1)
            ->where('transaction.uid',Auth::user()->id)
            ->join('cc_users', 'transaction.cc_id', '=', 'cc_users.id')
            ->join('cc_issuer', 'cc_users.cc_issuer', '=', 'cc_issuer.id')
            ->join('cc_types', 'cc_users.cc_types', '=', 'cc_types.id')
            ->select('amount','cc_issuer.name','cc_users.*','cc_types.cc_icon')
            ->get();
        return $q;
    }
}