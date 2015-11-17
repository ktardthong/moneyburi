<?php

namespace App\Http\Controllers;


use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Stevebauman\Location\Facades\Location;

class AppController extends Controller
{

    //The main card for our app
    function spendableCard()
    {
        if(Auth::user()){

            $page_title     =   "Welcome to Moneymore!";
            $page_descs     =   "";
            return view('app.html.card_spendable',compact('page_title','page_descs'));
        }
        else{
            return view('pages.login');
        }
    }


    public function location()
    {
        $location = Location::get();
        return "$location->cityName ,$location->countryCode  - From your Internet address";
    }

    //Spendable Overview
    public function tpl_overview()
    {
        return view('app.spendable.tpl_overview');
    }


    //Template for all goals
    public function goalController()
    {
        return view('app.goal.tpl_goal');
    }

    //Daily SpendableDough
    public function dailyDough()
    {
        return view('app.spendableChart.tpl_dailySpendableChart');
    }

    //Line graph spendable
    function spendableChart()
    {
        return view('app.spendableChart.tpl_spendableChart');
    }

    //Dough monthly spendable chart
    function monthlySpendableChart()
    {
        return view('app.spendableChart.tpl_monthlySpendableChart');
    }


    //horizontal bar graph showing Spending Categories
    function spendingCategoriesChart()
    {
        return view('app.spendingCategoriesChart.tpl_spendingCategoriesChart');
    }

    //all trans list
    function transList()
    {
        return view('app.transactions.tpl_transList');
    }

    //recent trans
    function transRecent()
    {
        return view('app.transactions.tpl_transRecent');
    }

    //add trans
    function addTrans()
    {
        return view('app.transactions.card_addTransaction');
    }

    //trans page
    function transactions()
    {
        if(Auth::user()){
            return view('app.transactions.card_transactions');
        }
        else{
            return view('pages.login');
        }
    }
}