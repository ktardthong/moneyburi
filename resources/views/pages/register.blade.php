@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
     <div class="container-fluid" style="max-width:600px">
        @if($errors->any())
            <h4>
                <div class="alert alert-danger" role="alert">{{$errors->first()}}</div>
            </h4>
        @endif

        <form class="container card" method="post" action="/register">

            {!! csrf_field() !!}

            <h2 class="form-signin-heading" align="center">
            {!!  trans('messages.lbl_welcome') !!}
            </h2>

            <md-input-container md-no-float="" class="col-xs-12 col-sm-6 md-input-has-placeholder md-default-theme md-input-invalid">
                {!! Form::text('first_name','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_firstname'),'autofocus','required']) !!}
            </md-input-container>

            <md-input-container md-no-float="" class="col-xs-12 col-sm-6 md-input-has-placeholder md-default-theme md-input-invalid">
                {!! Form::text('last_name','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_lastname'),'required']) !!}
            </md-input-container>

            <br>
            <md-input-container md-no-float="" class="col-xs-12 col-sm-6 md-input-has-placeholder md-default-theme md-input-invalid">
                {!! Form::password('password',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_password'),'required']) !!}
            </md-input-container>

            <md-input-container md-no-float="" class="col-xs-12 col-sm-6 md-input-has-placeholder md-default-theme md-input-invalid">
                {!! Form::password('confirmpassword',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_confirmPass'),'required']) !!}
            </md-input-container>

            <br>
            <md-input-container md-no-float="" class="col-xs-12 md-input-has-placeholder md-default-theme md-input-invalid">
                {!! Form::text('email','',['class'=>'form-control input input-lg','placeholder'=>trans('messages.lbl_email'),'required']) !!}
            </md-input-container>


            <div class="col-xs-12">
                {!! Form::label('birthday', trans('messages.lbl_birthday'),['class'=> 'lead']) !!}
                {!! Form::selectMonth('month'); !!}
                {!! Form::selectRange('day', 1, 31); !!}
                {!! Form::selectYear('year', date("Y"), date("Y")-90) !!}
            </div>


            <div class="col-xs-12">
                {!! Form::radio('sex','Male',  ['class' => 'field', 'required'])!!}  {!! trans('messages.lbl_male')!!}
                {!! Form::radio('sex','Female',['class' => 'field', 'required'])!!}  {!! trans('messages.lbl_female') !!}
            </div>


            <div class="text-muted col-xs-12">
                <small>
                By clicking Sign Up, you agree to our Terms and that you have read our Data Policy, including our Cookie Use.
                </small>
            </div>
            {!! Form::submit(trans('messages.lbl_signup'),['class'=>'btn btn-md btn-primary btn-block']); !!}
        </form>

     </div> <!-- /container -->

 @stop