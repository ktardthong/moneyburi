@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
     <div class="container">
        @if($errors->any())
            <h4>
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            </h4>
        @endif

        <form class="form-signin" method="post" action="/register">

            {!! csrf_field() !!}

            <h2 class="form-signin-heading" align="center">
            {!!  trans('messages.lbl_welcome') !!}
            </h2>

            {!! Form::text('first_name','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_firstname'),'autofocus','required']) !!}
            {!! Form::text('last_name','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_lastname'),'required']) !!}

            <br>
            {!! Form::text('email','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_email'),'required']) !!}

            <br>
            {!! Form::password('password',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_password'),'required']) !!}
            {!! Form::password('confirmpassword',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_confirmPass'),'required']) !!}


            {!! Form::label('birthday', trans('messages.lbl_birthday'),['class'=> 'lead']) !!}
            <div>
                {!! Form::selectMonth('month'); !!}
                {!! Form::selectRange('day', 1, 31); !!}
                {!! Form::selectYear('year', date("Y"), date("Y")-90) !!}
            </div>

            <br>

            {!! Form::radio('sex','Male',  ['class' => 'field', 'required'])!!}  {!! trans('messages.lbl_male')!!}
            {!! Form::radio('sex','Female',['class' => 'field', 'required'])!!}  {!! trans('messages.lbl_female') !!}


            <div align="center" class="text-muted">
                Or
                <br>

                <span class="fa-stack fa-lg">
                  <a href="/login/fb">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

            </div>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> {!! trans('messages.lbl_remember_me') !!}
              </label>
            </div>


            <div class="text-muted">
                <small>
                By clicking Sign Up, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.
                </small>
            </div>
            {!! Form::submit(trans('messages.lbl_signup'),['class'=>'btn btn-lg btn-primary btn-block']); !!}
        </form>

     </div> <!-- /container -->

     <style>
     body {
       /*padding-top: 40px;*/
       padding-bottom: 40px;
       background-color: #eee;
     }

     .form-signin {
       max-width: 330px;
       padding: 15px;
       margin: 0 auto;
     }
     .form-signin .form-signin-heading,
     .form-signin .checkbox {
       margin-bottom: 10px;
     }
     .form-signin .checkbox {
       font-weight: normal;
     }
     .form-signin .form-control {
       position: relative;
       height: auto;
       -webkit-box-sizing: border-box;
               box-sizing: border-box;
       padding: 10px;
       font-size: 16px;
     }
     .form-signin .form-control:focus {
       z-index: 2;
     }
     .form-signin input[type="email"] {
       margin-bottom: -1px;
       border-bottom-right-radius: 0;
       border-bottom-left-radius: 0;
     }
     .form-signin input[type="password"] {
       /*margin-bottom: 10px;*/
       border-top-left-radius: 0;
       border-top-right-radius: 0;
     }
     </style>
@stop