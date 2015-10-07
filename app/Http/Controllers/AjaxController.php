<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use App\UserJobs;
use App\CateCore;
use App\GoalTravel;
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

    public function pmtTypes()
    {
        return \App\PaymentTypes::get();
    }

    public function transTypes()
    {
        return \App\TransType::get();
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

            //don't forget 'billDue' in card
            if(!empty($cardsData))
            {
                foreach($request->cards as $card)
                {
                    \App\CreditCard::addCard($card);
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


    //Goal Setting for general
    public function setGoalTarget(Request $request)
    {
        if(Auth::user()){
            $data =[
                    'uid'       =>Auth::user()->id,
                    'price'     =>$request->targetPrice,
                    'duration'  =>$request->targetNumPmt,
                    'interest'  =>$request->targetInterest,
                    'where'     =>$request->where
            ];
            DB::table('goal_general')->insert($data);
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


    //Add user bill
    public function addBills(Request $request)
    {
        if(Auth::user()){

            $data =[
                'uid'           => Auth::user()->id,
//                'name'          => $request->travelLocation,
                'cate_id'       => $request->cateId,
                'amount'        => $request->amount,
                'due_date'      => $request->due_date,
            ];
            print_r($data);
            DB::table('user_bills')->insert($data);
            //Update to users table
            \App\userBills::updateBillAmount();

            return \App\userBills::get();
        }
    }

    //Toggle is_paid status from user_bills base on the given ID
    public function togglePaid(Request $request)
    {
        if(Auth::user())
        {
            \App\userBills::togglePaid($request->billId);

            return \App\userBills::get();
        }
    }


    public static function removeBills(Request $request)
    {
        if(Auth::user())
        {
            //Remove bill
            \App\userBills::removeBills($request->billId);

            //Update to users table
            \App\userBills::updateBillAmount();

            return \App\userBills::get();
        }
    }


    //Get user goal Travel goal from their ID
    public function getUserTravelGoal()
    {
        if(Auth::user())
        {
            return \App\GoalTravel::getUserTravelGoal();
        }
    }

    public function getUserTargetGoal()
    {
        if(Auth::user())
        {
            return \App\GoalGeneral::getUserTargetGoal();
        }
    }


    public function updateUserInfo(Request $request)
    {

        /*
            editMonthlyIncome:      $('#editMonthlyIncome').val() ,
            editMonthlyBill:        $('#editMonthlyBill').val(),
            editMonthlySaving:      $('#editMonthlySaving').val(),
            editMonthlySpendable:   $('#editMonthlySpendable').html(),
            editDaySaving:          $('#editDaySaving').html(),
            editDaySpendable:       $('#editDaySpendable').html()
         * */

        if(Auth::user())
        {
            $data = [
                        'mth_income'    =>  $request->editMonthlyIncome,
                        'mth_bill'      =>  $request->editMonthlyBill,
                        'mth_saving'    =>  $request->editMonthlySaving,
                        'mth_spendable' =>  $request->editMonthlySpendable,
                        'd_saving'      =>  $request->editDaySaving,
                        'd_spendable'   =>  $request->editDaySpendable
                    ];
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update($data);
            print_r($data);
        }
    }

}