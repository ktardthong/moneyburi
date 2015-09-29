<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use App\UserJobs;
use App\CateCore;
use Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;




class AjaxController extends Controller
{
    public function getUserJob()
    {
        return UserJobs::get();
    }

    public function billCate()
    {
        return CateCore::get();
    }

    public function transRepeat()
    {
        return \App\TransRepeat::get();
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
                            'uid'       => Auth::user()->id,
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


    // FROM init_set up 2
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

    //initi_setup4
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


    //Goal setting for Travel
    public function setGoalTravel(Request $request)
    {
        if(Auth::user()){

            $data =[
                        'uid'       => Auth::user()->id,
                        'where_to'  => $request->travelLocation,
                        'budget'    => $request->travelAmount,
                        'pax'       => $request->travelPax,
                        'nights'    => $request->travelNights,
                        'periods'   => $request->periods,
                        'mth_saving'=> round($request->travelSavingMth,2),
                        'month'     => $request->monthSelect,
                        'year'      => $request->yearSelect
                    ];
            print_r($data);
            DB::table('goal_travel')->insert($data);

        }
    }

    //Get user goal Travel goal from their ID
    public function getUserTravelGoal()
    {
        if(Auth::user())
        {
            return \App\CardApp::getUserTravelGoal();
        }
    }

}