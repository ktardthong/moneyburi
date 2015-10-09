@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
     <div class="container">

          <form class="form-signin" method="post" action="/login">

            {!! csrf_field() !!}

            <h2 class="form-signin-heading">Please sign in</h2>

            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>

            <div align="center">
                <a href="/login/fb">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-facebook-official fa-stack-1x"></i>
                    </span>
                    login with facebook
                </a>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>

     </div> <!-- /container -->

     <style>
     body {
       padding-top: 40px;
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
       margin-bottom: 10px;
       border-top-left-radius: 0;
       border-top-right-radius: 0;
     }
     </style>
@stop