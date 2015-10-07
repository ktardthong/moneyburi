<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Socialite;
use Illuminate\Routing\Controller;

class CreditCardController extends Controller
{

    //Get the list of user credit cards
    public static function getCC()
    {
        return \App\CreditCard::get();
    }


    //Add user credit card
    public static function addCard(Request $request)
    {
        if(Auth::user()) {
            $data = [
                'type' => $request->type,
                'issuer' => $request->issuer,
                'cclimit' => $request->cclimit,
                'ccnote' => $request->ccnote,
                'due_date'=> $request->billDue
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