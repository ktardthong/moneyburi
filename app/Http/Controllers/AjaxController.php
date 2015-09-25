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
}