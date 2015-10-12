<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use Socialite;
use Illuminate\Routing\Controller;
use Stevebauman\Location\Facades\Location;
use Mail;

class PagesController extends Controller
{
    public function index()
    {

        return redirect('/');
    }

    public function home()
    {
        if(Auth::user())
        {
            return redirect("/profile");
        }
        else
        {
        $page_title     =   "moneyburi!";
        $page_descs     =   "";
        return view('welcome',compact('page_title','page_descs'));
        }
    }

    public function login()
    {
        $page_title     =   "money_bkk!";
        $page_descs     =   "what hit you?";
        return view('pages.login',compact('page_title','page_descs'));
    }


    public function loginFB(Request $request)
    {
        return Socialite::driver('facebook')
                ->scopes(['email','user_friends','user_location','user_birthday'])
                ->redirect();
    }


    public function loginFbCallback(Request $request)
    {
        $socialize_user =  Socialite::driver('facebook')->user();

//        dd($socialize_user);

        $facebook_user_id = $socialize_user->getId(); // unique facebook user id
        $user = User::where('email', $socialize_user->email)->first();

        $location = Location::get();

        $city       =   $location->cityName;
        $country    =   $location->countryName;


        if (!$user) {
            $user = new User;
            $user->fb_id        = $facebook_user_id;
            $user->firstname    = $socialize_user->user['first_name'];
            $user->lastname     = $socialize_user->user['last_name'];
            $user->email        = $socialize_user->email;
            $user->avatar       = $socialize_user->avatar;
            $user->gender       = $socialize_user->user['gender'];
//            $user->access_token = $socialize_user->token;
            $user->city         = $city;
            $user->country      = $country;
            $user->save();

            return redirect('/init_setup');
        }

        // login
        Auth::loginUsingId($user->id);

        return redirect("/profile");
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function register()
    {
        $page_title     =   "Welcome - Moneyburi";
        $page_descs     =   "";
        return view('pages.register',compact('page_title','page_descs'));
    }


    //When setup complete, route to this url to update the init_setup flg
    public function complete_setup(Request $request)
    {
        //Update the init_setup to 1, meaning user will no longer see the welcome screen
        $user_data      =   User::find(Auth::user()->id);
        $user_data->init_setup = 1;
        $user_data->save();

        return redirect('/profile');


    }



    public function post_login(Request $request)
    {
        $frm_email  =   $request->email;
        $frm_pass   =   md5($request->password);

        if(!empty($frm_email) || !empty($frm_pass))
        {
            $user = User::where('email',$frm_email)->where('password',$frm_pass)->first();
            if (!empty($user))
            {
                Auth::loginUsingId($user->id);
                return redirect("/profile/");
            }
            else
            {
                return redirect('/login')->withErrors(trans('messages.label_auth_fail'));
            }
        }
        else
        {
            echo "empty vars";
        }
    }



    public function post_register(Request $request)
    {
        $page_title     =   "money_bkk!";
        $page_descs     =   "what hit you?";


        $data = array(  'email'     =>$request->email,
                        'password'  =>$request->password,
                        'cpassword' =>$request->confirmpassword
        );


        //Verification
        if($data['password']!= $data['cpassword'])
        {
            return redirect('register')->withErrors("password mismatch");
        }

        if(empty($data['email']))
        {
            return redirect('register')->withErrors("email is empty");
        }
        //end verification

        //Check if this email is already registered
        $user =  User::where('email', $request->email)->first();


        if(empty($user))
        {
            if($this->validator($data))
            {
                $this->createUser($data);
                $user = User::where('email', $request->email)->first();


                Mail::send('mails.reg_confirm', ['user' =>  $user], function ($m) use ($user) {
                    $m->to($user->email)->subject('Welcome to Moneyburi!');
                });

                Mail::send('mails.weekly_update', ['user' =>  $user], function ($m) use ($user) {
                    $m->to($user->email)->subject('Weekly Update from Moneyburi');
                });

                Auth::loginUsingId($user->id);
                return redirect('/profile');
            }
            else
            {
                //return redirect('register')->withErrors();
            }
        }
        else
        {
            return redirect('register')->withErrors("user already exist");
        }

    }



    //From AuthController
    protected function createUser(array $data)
    {
        return User::create([
            'email'     => $data['email'],
            'password'  => md5($data['password']),
        ]);
    }


    //From AuthController
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    //View Bill
    public function bill()
    {
        return view('pages.billView');
    }


    //View Creditcards
    public function creditcards()
    {
        return view ('pages.creditcardView');
    }
}
