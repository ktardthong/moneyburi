@extends('mail_header')


@section('content')


        <div class="col-sm-3"></div>
        <div class="col-sm-6" >
            <div class="row">
                 <h3 style="margin: 20px 0px 0px 0px;">Moneyburi</h3>
            </div>
            <div class="row">
            <div class="card card-block">

                <img class="card-img-top img-responsive" src="/img/home_screen.gif" style="margin: 10px 0px 20px 0px;" alt="Card image cap">

                <h3 class="card-title strong"><b>Congratulations!</b></h3>

                <h5 class="card-text">You're officially part of our family! <br><br>
                    You'd be delighted to know that you're on your way to achieve your financial goals!</h5>
                {{--<div class="card-block">--}}

               <br>
                <h5 class="card-text">— Team Moneyburi</h5>



                {{--</div>--}}
            </div>
            <div class="container" align="center">
                <small align="center">
                    Built with love from Minneapolis, MN and Chiang Mai, Thailand.<br>
                    © 2015 Moneyburi Company Limited.<br>
                    All rights reserved.
                </small>
            </div>
            </div>
        </div>
@stop