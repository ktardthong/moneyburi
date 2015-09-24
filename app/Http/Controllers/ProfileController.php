<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

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

        return view('profile.profile',compact('page_title','page_descs'));
    }
}