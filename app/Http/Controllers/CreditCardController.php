<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Socialite;
use Illuminate\Routing\Controller;

class CreditCardController extends Controller
{
    //The main card page
    public  function index()
    {
        return view('app.creditcards.CreditCardView');
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
        if(Auth::user()) {
            \App\CreditCard::removeCard($request->cardId);
        }
    }
}