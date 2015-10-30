<?php

namespace App;

use Validator;
use Auth;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CreditCard extends  Eloquent{
    protected $table = 'cc_users';

    //get the bill list
    public static function get()
    {
        if (Auth::user()->id) {
            $data = \App\CreditCard::where('cc_users.flg',1)
                                    ->where('cc_users.uid',Auth::user()->id)
                                    ->join('cc_issuer', 'cc_users.cc_issuer', '=', 'cc_issuer.id')
                                    ->join('cc_types', 'cc_users.cc_types', '=', 'cc_types.id')
                                    ->select('cc_issuer.name as issuer_name',
                                             'cc_types.name as type_name',
                                             'cc_users.card_notes',
                                             'cc_users.cc_limit',
                                             'cc_users.due_date',
                                             'cc_users.exp_mth',
                                             'cc_users.exp_year',
                                             'cc_users.last_four',
                                             'cc_types.cc_icon',
                                             'cc_users.id'
                                            )
                                    ->get();
            return json_encode($data);
        }
        else
        {
            echo "unauthorize";
        }
    }


    //Add card
    public static function addCard($data)
    {
        if (Auth::user()->id) {
            DB::table('cc_users')->insert(
                [
                    'flg'           => 1,
                    'uid'           => Auth::user()->id,
                    'cc_issuer'     => $data['issuer'],
                    'cc_types'      => $data['type'],
                    'cc_limit'      => $data['cclimit'],
                    'card_notes'    => $data['ccnote'],
                    'due_date'      => $data['due_date'],
                    'exp_mth'       => $data['exp_mth'],
                    'exp_year'      => $data['exp_year'],
                    'last_four'     => $data['last_four']
                ]
            );
        }
    }


    //Remove card
    public static function removeCard($cardId)
    {
        if(Auth::user()->id){
            DB::table('cc_users')->where('uid',Auth::user()->id)
                                 ->where('id',$cardId)
                                 ->update(['flg'=>0]);
        }
    }


    //Undo remove card
    public static function undoRemoveCard($cardId)
    {
        if(Auth::user()->id){
            DB::table('cc_users')->where('uid',Auth::user()->id)
                ->where('id',$cardId)
                ->update(['flg'=>1]);
        }
    }
} 