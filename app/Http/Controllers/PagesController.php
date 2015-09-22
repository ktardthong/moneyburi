<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {

        return redirect('/');
    }

    public function home()
    {
        $page_title     =   "moneyburi!";
        $page_descs     =   "";
        return view('welcome',compact('page_title','page_descs'));
    }

    public function login()
    {
        $page_title     =   "money_bkk!";
        $page_descs     =   "what hit you?";
        return view('pages.login',compact('page_title','page_descs'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function register()
    {
        $page_title     =   "money_bkk!";
        $page_descs     =   "what hit you?";
        return view('pages.register',compact('page_title','page_descs'));
    }


    public function init_setup()
    {
        $page_title     =   "money_bkk!";
        $page_descs     =   "what hit you?";
        $user_data      = User::find(Auth::user()->id);
        return view('pages.init_setup',compact('page_title','page_descs','user_data'));
    }

    public function post_init_setup(Request $request)
    {
        $user_data = [
                     'prefer_pmt'    => $request->prefer_pmt,
                     'mth_income'    => $request->mth_income,
                     'net_worth'     => $request->net_worth,
                     ];

        $expense_data = [
                        'cate_id'       => $request->cate_id,
                        'mth_expense'   => $request->mth_expense]
                        ;

        $x=0;
        DB::table('users')
            ->where('id', Auth::user()->id)
            ->update($user_data);

        // Assuming expenses create on the first day
        $first_day = date('Y-m-01');
        foreach ($expense_data['cate_id'] as $c) {
            $data = [
                "uid"        => Auth::user()->id,
                "trans_date" => $first_day,
                "amount"     => $expense_data['mth_expense'][$x],
                "cate_id"    => $c,
                "trans_type" => 0,
                "repeat"     => 1,
                "note"       => null,
                "pmt_type"   => $request->prefer_pmt
            ];
            $data = [
                    "amount_cap"   =>   $expense_data['mth_expense'][$x],
                    "cate_id"      =>   $c,
                    "recurring"    =>   1,
                    "uid"          =>   Auth::user()->id,
                    "start_date"   =>   $first_day
                    ];
            Budget::newBudget($data);
//            Transaction::create($data);
            $x++;
            print_r($data);
        }

        print_r($user_data);
        print_r($expense_data);
    }



    public function post_login(Request $request)
    {
        echo $frm_email  =   $request->email;
        echo $frm_pass   =   md5($request->password);

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


        $data = array(  'name'      =>$request->name,
                        'email'     =>$request->email,
                        'firstname' =>$request->firstname,
                        'lastname'  =>$request->lastname,
                        'password'  =>$request->password
        );

        if(empty($data['name']))
        {
            return redirect('register')->withErrors("Username is empty");
        }
        elseif(empty($data['email']))
        {
            return redirect('register')->withErrors("email is empty");
        }

        //Check if this email is already registered
        $user =  User::where('email', $request->email)->first();


        if(empty($user))
        {
            if($this->validator($data))
            {
                $this->createUser($data);
                $user = User::where('email', $request->email)->first();

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
            'username'  => $data['name'],
            'firstname' => $data['firstname'],
            'lastname'  => $data['lastname'],
            'email'     => $data['email'],
            'password'  => md5($data['password']),
        ]);
    }


    //From AuthController
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
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
}
