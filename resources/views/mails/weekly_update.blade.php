@extends('mail_header')


@section('content')


    <div class="col-sm-3"></div>
    <div class="col-sm-6" >
        <div class="row">
            <h3 style="margin: 20px 0px 10px 0px;">Moneyburi</h3>
        </div>
        <div class="row">
            <div class="card card-block">
                <div class="card-text">
                    <h5>Dear {{$user->firstname}},<br><br>
                        Here's your weekly update!
                    </h5>
                    <br>
                    <h5 class="card-text">— Team Moneyburi</h5>
                    <hr>
                </div>
                <div class="container-fluid borderBtm" align="center">

                    <div class="row">

                        <div style="position: relative;" class="row">
                            <div style="width: 100%; height: 40px; position: absolute;
                                                    top: 50%; left: 0; margin-top: -20px;
                                                    line-height:19px; text-align: center;
                                                    z-index: 999999999999999">
                                <p class="display-1">100</p>
                            </div>

                            <canvas id="budgetChart"></canvas>
                        </div>
                    </div>

                    <div class="row">
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
                            <ul class="list-group container">
                                <div>
                                    <span class="pull-right text-success">400</span>
                                    this week
                                </div>
                                <div>
                                    <span class="pull-right text-success">2,000</span>
                                    this month
                                </div>
                                <div>
                                    <span class="pull-right text-success">18,000</span>
                                    this year
                                </div>
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row" style="background: #f5f5f5">
                    <div class="col-xs-12 col-sm-6 lead">
                        <div class="clearfix">

                            <span>Goals</span>
                            <ul>
                                <li>test</li>
                            </ul>
                            <div class="card" style="max-width: 250px">
                                <div class="card-block white_bg ">
                                    <h4 class="card-header"></h4>

                        <span class="fa-stack fa-lg">
                            <a href="#">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>

                        <span class="fa-stack fa-lg">
                            <a href="#">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                            </a>
                        </span>

                        <span class="fa-stack fa-lg">
                          <a href="#">
                              <i class="fa fa-circle fa-stack-2x"></i>
                              <i class="fa fa-bullseye fa-stack-1x fa-inverse"></i>
                          </a>
                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row borderBtm">
                    <div class="col-sm-6">
                        <span>This month</span>

                        <div class="center-block clearfix">
                            <div class="pull-left text-center">
                                <div class="text-success">
                                    <small>
                                        <strong>1000</strong>
                                    </small>
                                </div>
                            </div>
                            <div class="center-block pull-right">
                                <div class="text-muted">
                                    <small>
                                        <strong> -1000</strong>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <progress class="progress progress-success" value="25" max="100"></progress>

                        <span>Spending Categories</span>
                        <progress class="progress progress-success" value="25" max="100"></progress>

                        <span>Spending Categories</span>
                        <progress class="progress progress-success" value="25" max="100"></progress>

                        <span>Spending Categories</span>
                        <progress class="progress progress-success" value="25" max="100"></progress>


                    </div>
                    <div class=" col-sm-6" ng-controller="spendableChartController">
                        <spendable-chart></spendable-chart>
                    </div>
                </div>

                <!--Progress bar-->
                <div class="row borderBtm">

                    <div class="col-sm-6">
                        <div class="clearfix">

                            <span class="lead">Upcoming bill</span>

                            <div class="pull-right">
                                <small>
                                    <a href="#" ng-click="nav(templates[4].url)">
                                        <i class="fa fa-info-circle"></i></a>
                                </small>
                            </div>

                            <div class="clearfix" ng-repeat="bill in upComing">

                                <div class="pull-left text-center">

                                    <div>
                                        <span class="text-muted"> @{{ date | date:'MMM'}}</span>
                                    </div>
                                    <div>
                                        @{{ bill.due_date }}
                                    </div>
                                </div>

                                <div class="center-block pull-right">

                        <span>
                            @{{ bill.name }}
                        </span>
                                    @{{ bill.amount }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row borderBtm">
                    <div class="col-sm-6">

                        <span class="lead">Credit cards</span>
                        <div class="pull-right">
                            <small>
                                <a href="#" ng-click="nav(templates[5].url)">
                                    <i class="fa fa-info-circle"></i></a>
                            </small>
                        </div>
                        <div ng-controller="CardController">
                            <card-list></card-list>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container" align="center">
            <small align="center">
                Built with love from Minneapolis, MN and Chiang Mai, Thailand.<br>
                © 2015 Moneyburi Company Limited.<br>
                All rights reserved.
            </small>
        </div>
    </div>



        <script>
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
@stop