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
        $page_title     =   "Profile - Moneyburi";
        $page_descs     =   "";
        return view('profile.profile',compact('page_title','page_descs'));
    }
}