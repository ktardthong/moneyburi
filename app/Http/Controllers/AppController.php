<?php

namespace App\Http\Controllers;


use App\Transaction;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Tests\Caster\CasterTest;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Log;
use Carbon\Carbon;

class AppController extends Controller
{

    function spendableCard()
    {
        return view('app.html.card_spendable');
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
}