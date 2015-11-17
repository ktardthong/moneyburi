@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

     <div class="container card_width" style="margin-top:30px">
           @if (count($errors) > 0)
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
          @endif
          <form class="form-signin card card_width container" method="post" action="/login">

            {!! csrf_field() !!}

            <h2 class="form-signin-heading text-center">
                {!! trans('messages.lbl_sign_in') !!}
            </h2>

            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <label  for="inputEmail" class="sr-only">{!! trans('messages.lbl_email') !!}</label>
                <input  name="email" type="email" id="inputEmail" class="form-control white_bg"
                        placeholder="{!! trans('messages.lbl_email') !!}" required autofocus>

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <label  for="inputPassword" class="sr-only">{!! trans('messages.lbl_password') !!}</label>
                <input  name="password" type="password" id="inputPassword" class="form-control"
                        placeholder="{!! trans('messages.lbl_password') !!}" required>

            </md-input-container>

            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me"> {!! trans('messages.lbl_remember_me') !!}
              </label>
            </div>

            {{--<div align="center" class="text-muted">
                Or
                <br>
                <span class="fa-stack fa-md">
                    <a href="/login/fb">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </a>
                </span>
            </div>--}}

            <div class="row">
                <button class="btn btn-sm btn-primary btn-block" type="submit">{!! trans('messages.lbl_sign_in') !!}</button>
            </div>
          </form>


     </div> <!-- /container -->


@stop