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

            if(Auth::user()) {
                echo $request->currency;
                foreach($request->cards as $card)
                {
                    print_r($card);
                }
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

}