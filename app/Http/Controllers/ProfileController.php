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
use Illuminate\Support\Facades\Input;
use Image;


class ProfileController extends Controller
{
    public function index()
    {
        if(empty(Auth::user()->id))
        {
            return redirect('/profile#/login');
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
        $quote = \App\MoneyQuote::orderByRaw("RAND()")->first();

        return view('user.user',compact('page_title','page_descs','quote'));
    }


    public function imageUpload()
    {
        if(Input::file())
        {
            $image = Input::file('image');
            $filename  = time() . '.' . $image->getClientOriginalExtension();

            $path = public_path('userimg/' . $filename);

            Image::make($image->getRealPath())->resize(200, 200)->save($path);
            $user = \App\User::find(Auth::user()->id);
            $user->avatar = $filename;
            $user->save();
            return redirect('/user');
        }
        else{
            echo "no file";
        }
    }


    public function edit()
    {
        $page_title     =   "Profile - Moneyburi";
        $page_descs     =   "";

//        $user_data      =   User::find(Auth::user()->id);

        return view('user.edit',compact('page_title','page_descs'));
    }


    public function spendable()
    {
        return view('app.html.tpl_spendable');
    }
}