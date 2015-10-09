<?php

namespace App\Http\Controllers;


use App\CardApp;
use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;
use Carbon;

class ProfileController extends Controller
{
    public function index()
    {
        if(empty(Auth::user()->id))
        {
            return redirect('/login');
        }

        $page_title     =   "Profile - Moneyburi";
        $page_descs     =   "";

        $user_data      =   User::find(Auth::user()->id);

        if($user_data['init_setup'] ==0)
        {
            return redirect('/init_setup');
        }

        $location = Location::get();
        return view('profile.profile',compact('page_title','page_descs','location'));
    }

    /*
     * User page
     * */
    public function user()
    {
        if(empty(Auth::user()->id))
        {
            return redirect('/login');
        }

        $page_title     =   "Profile - Moneyburi";
        $page_descs     =   "";

//        $user_data      =   User::find(Auth::user()->id);

        return view('user.user',compact('page_title','page_descs'));
    }
}