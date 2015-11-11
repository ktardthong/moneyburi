<?php

namespace App;

use Validator;
use Auth;
use Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CreditCard extends  Eloquent{
    protected $table = 'cc_users';

    //Get the list of Currently Active Creditcards and current usage for the current month
    public static function get()
    {
        if (Auth::user()->id) {
            $data = DB::table('transaction')
                    ->groupBy('cc_users.id')
                    ->whereRaw('MONTH(trans_date) = ?', [date('m')])
                    ->where('transaction.flg',1)
                    ->where('pmt_type',2)
                    ->where('cc_users.flg',1)
                    ->where('transaction.uid',Auth::user()->id)
                    ->join('cc_users', 'transaction.cc_id', '=', 'cc_users.id')
                    ->join('cc_issuer', 'cc_users.cc_issuer', '=', 'cc_issuer.id')
                    ->join('cc_types', 'cc_users.cc_types', '=', 'cc_types.id')
                    ->select('amount','cc_issuer.name','cc_issuer.icon',
                             'cc_users.card_notes',
                             'cc_users.cc_limit',
                             'cc_users.due_date',
                             'cc_users.exp_mth',
                             'cc_users.exp_year',
                             'cc_users.last_four',
                             'cc_users.id',
                             'cc_types.cc_icon')
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