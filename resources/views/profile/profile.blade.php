@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="row">

            <div class="col-sm-12">

                {{--<h1 class="page-header">welcome</h1>--}}

                <div class="row">

                    <div class="col-xs-12 col-sm-3">
                        <div class="card card-block">
                             <ul class="nav nav-sidebar">
                                <li class="active" align="center">
                                    <a href="#">
                                        <img src="/img/user_avatar.gif" class="img-circle">
                                         <br>
                                         John Doe
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="#" title="Overview" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-home"></i> <span class="sr-only">(current)</span> Home </a></li>
                                <li><a href="#" title="Overview" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-line-chart"></i> Transaction</a></li>
                                <li><a href="#" title="Add Transaction" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-pencil-square-o"></i>Add Transaction</a></li>
                                <li><a href="#">Spending Categories</a></li>
                                <li><a href="#">Goal</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-9">
                        <div class="card card-block">
                            <h4 class="card-title">Spendable</h4>

                            <div class="container-fluid" align="center">

                                {{-- Graph section--}}
                                <div class="col-xs-12 col-sm-7">

                                    <div style="position: relative;" class="row">
                                        <div style="width: 100%; height: 40px; position: absolute;
                                                    top: 50%; left: 0; margin-top: -20px;
                                                    line-height:19px; text-align: center;
                                                    z-index: 999999999999999">
                                            <p class="display-1">100</p>
                                        </div>

                                        <canvas id="budgetChart" onclick="spendableDough()"></canvas>
                                    </div>
                                    <a href="#" class="lead" id="addTransaction"> + Add transaction</a>

                                </div>

                                <div class="col-xs-12 col-sm-5">

                                    <div id="spendableContainer"></div>

                                    <div id="spendableOverview">

                                         <ul class="list-group container lead">
                                            <div>
                                               <span class="pull-right">150</span>
                                               started today
                                            </div>
                                            <div>
                                               <span class="pull-right">50</span>
                                               spent today
                                            </div>
                                            <hr>
                                            <div>
                                                <span class="pull-right">100</span>
                                                remaining today
                                            </div>
                                            <hr>
                                        </ul>

                                        <p>
                                            <ul class="list-group container lead">
                                            <div>
                                                <span class="pull-right">400</span>
                                                this week
                                            </div>
                                            <div>
                                                <span class="pull-right">2,000</span>
                                                this month
                                            </div>
                                             <div>
                                                <span class="pull-right">18,000</span>
                                                this year
                                             </div>
                                            </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">

                    <div class="col-xs-12 col-sm-3">
                        <div class="card card-block">
                            <h4 class="card-title">Notification / Coaching</h4>
                            <ul class="list-group container">
                                <div class="bottom_border">
                                    You have spent over 2000 in groceries, open membership at BigD for 15% off next purchase
                                </div>
                                <div class="bottom_border">
                                    How was your lunch? Note your expense here
                                </div>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="card card-block">
                            <h4 class="card-title strong">Goal</h4>
                            <ul class="list-group container lead">
                               <select >
                                <option selected>Select your goal</option>
                                <option>Get out of debt</option>
                                <option>Travel</option>
                                <option>Buy something</option>
                               </select>
                               <p>
                                <label>How much?</label><input type="number">
                               </p>
                            </ul>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-3">

                        <div class="card card-block">
                            <h4 class="card-title">Account
                                <small><small>since July 2015</small></small></h4>
                            <ul class="list-group container lead">
                                <div>
                                   <span class="pull-right">14,000</span>
                                   Cash
                                </div>
                                <div>
                                    <span class="pull-right">-2,000</span>
                                    Credit card
                                    <ul class="list-unstyled">
                                        <ul>
                                            <li>
                                                <span class="pull-right">-800</span>
                                                Kbank
                                            </li>
                                            <li>
                                                <span class="pull-right">-1,200</span>
                                                SCB</li>
                                        </ul>

                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="card card-block">
                            <h4 class="card-title strong">Spending Categories</h4>
                            <ul class="list-group container lead">
                            <div>
                               <span class="label label-default label-success pull-right">14,000</span>
                               <a href="">Shopping</a>
                            </div>
                            <div>
                                <span class="label label-default label-info pull-right">-2,000</span>
                                <a href="">Groceries</a>
                            </div>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

    </div>



    {{--<footer class="footer hidden-sm">--}}
        {{--<div class="container">--}}
               {{--<nav class="navbar navbar-light bg-faded">--}}
                 {{--<ul class="nav navbar-nav">--}}
                   {{--<li class="nav-item active">--}}
                     {{--<a class="nav-link" href="#"> <i class="fa fa-home"></i></a>--}}
                   {{--</li>--}}
                   {{--<li class="nav-item">--}}
                     {{--<a class="nav-link" href="#"><i class="fa fa-line-chart"></i></a>--}}
                   {{--</li>--}}
                   {{--<li class="nav-item">--}}
                     {{--<a class="nav-link" href="#"><i class="fa fa-pencil-square-o"></i></a>--}}
                   {{--</li>--}}
                   {{--<li class="nav-item">--}}
                     {{--<a class="nav-link" href="#">About</a>--}}
                   {{--</li>--}}
                 {{--</ul>--}}
               {{--</nav>--}}
        {{--</div>--}}
    {{--</footer>--}}


    <script>

    function spendableDough()
    {
        alert("test");
    }

    var data = [
        {
            value: 50,
            color: "#a0a0a0",
            highlight: "#fefefe",
            label: "Spent"
        },
        {
            value: 100,
            color: "#88d2db",
            highlight: "#FFC870",
            label: "Spendable"
        }
    ];
   var ctx = document.getElementById("budgetChart").getContext("2d");
   var myDoughnutChart = new Chart(ctx).Doughnut(data,{
                            responsive: true,
                            maintainAspectRatio: true,

                            //Boolean - Whether we should show a stroke on each segment
                            segmentShowStroke : true,

                            //String - The colour of each segment stroke
                            segmentStrokeColor : "#fff",

                            //Number - The width of each segment stroke
                            segmentStrokeWidth : 2,

                            //Number - The percentage of the chart that we cut out of the middle
                            percentageInnerCutout : 80, // This is 0 for Pie charts

                            //Number - Amount of animation steps
                            animationSteps : 100,

                            //Boolean - Whether we animate the rotation of the Doughnut
                            animateRotate : true

                            });

    </script>

    <style>
    .footer {
      position: absolute;
      bottom: 0;
      /*width: 100%;*/
      /* Set the fixed height of the footer here */
      height: 60px;
      background-color: #f5f5f5;
    }

    </style>
@stop