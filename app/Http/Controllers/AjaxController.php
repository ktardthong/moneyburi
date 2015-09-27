<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use App\UserJobs;
use Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function getUserJob()
    {
        return UserJobs::get();
    }

    public function billCate()
    {
        return \App\CateCore::get();
    }

    public function ccIssuer()
    {
        return \App\CardApp::cc_issuer();
    }

    public function ccTypes()
    {
        return \App\CardApp::cc_types();
    }

    public function user_currencies()
    {
        return \App\CardApp::user_currencies();
    }

    public function userFinanceData(Request $request)
    {
        if(Auth::user()) {

            //Update Currency
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                        'mth_income'    =>   $request->mthlyInc,
                        'currency'      =>   $request->currency,
                ]);

            //Add Cards
            $cardsData = $request->cards;
            if(!empty($cardsData))
            {
                foreach($request->cards as $card)
                {

                    DB::table('cc_users')->insert(
                        [
                            'flg'       => 1,
                            'uid'       => 3,
                            'cc_issuer' => $card['issuer'],
                            'cc_types'  => $card['type'],
                            'cc_limit'  => $card['cclimit'],
                            'card_notes'=> $card['ccnote']
                        ]
                    );

                }//End foreach
            }
            else
            {
                echo "empty request";
            }



        }
    }


    /**
     * @param Request $request
     */
    public function userData()
    {
        if(Auth::user()) {

            return json_encode(User::find(Auth::user()->id));

        }
    }



    public function userInfoUpdate(Request $request)
    {
        if(Auth::user()) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                            'firstname' =>  $request->fname,
                            'lastname'  =>  $request->lname,
                            'job'       =>  $request->job
                         ]);
        }
    }

    public function userStatus(Request $request)
    {
        if(Auth::user()) {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'birthdate' =>  $request->bdate,
                    'gender'    =>  $request->gender,
                    'status'    =>  $request->status
                ]);
        }
    }

    public function userplan(Request $request)
    {
        if(Auth::user()){
            echo ">>>";
            echo $request->dd_saving;
            echo $request->dd_spending;
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'mth_saving'    =>  $request->mth_saving,
                    'mth_spendable' =>  $request->mth_spending,
                    'd_saving'      =>  $request->dd_saving,
                    'd_spendable'   =>  $request->dd_spending
                ]);
        }

    }

}