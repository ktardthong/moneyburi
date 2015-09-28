@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    {{-- Main container--}}
    <div class="row" ng-controller="profileController">

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
                                         @{{userData.firstname }} @{{ userData.lastname }}
                                    </a>
                                </li>

                                <div>

                                     <select ng-model="template" ng-options="t.name for t in templates">
                                         <option value="">(blank)</option>
                                     </select>


                                <li class="active">
                                    <a href="#" title="Overview" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-home"></i> <span class="sr-only">(current)</span> Home </a></li>
                                <li><a href="#" title="Overview" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-line-chart"></i> Transaction</a></li>
                                <li><a href="#" title="Add Transaction" data-toggle="tooltip" data-placement="top">
                                    <i class="fa fa-pencil-square-o"></i>Add Transaction</a></li>
                                <li><a href="#">Spending Categories</a></li>
                                <li><a href="#">Goal</a></li>
                                <li><a href="#" ng-click="showEdit()">Edit</a></li>
                                </div>
                            </ul>
                        </div>
                    </div>

                    {{-- Main cards, default card_spendable--}}
                    <div class="col-xs-12 col-sm-9">
                        <div class="slide-animate" ng-include="template.url"></div>
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

                    {{-- Goals--}}
                    <div class="col-xs-12 col-sm-3">
                        <div class="slide-animate" ng-include="'/app/html/card_goals.html'"></div>
                    </div>

                    {{-- Account--}}
                    <div class="col-xs-12 col-sm-3">
                        <div class="slide-animate" ng-include="'/app/html/card_account.html'"></div>
                    </div>

                    {{-- Spending Categories --}}
                    <div class="col-xs-12 col-sm-3">
                        <div class="slide-animate" ng-include="'/app/html/card_spendingCate.html'"></div>
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


        var app = angular.module('App', ['ngAnimate']);

        app.controller('profileEdit', function($scope, $http) {
            $http.get("/ajax/userData")
            .success(function(response) {
                $scope.userData = response;
            });

            $scope.mthlyIncome  =   $scope.userData.mth_income;
            $scope.mthlyBill    =   $scope.userData.mth_bill;
            $scope.mthlySaving  =   $scope.userData.mth_saving;

            $scope.mthlySpendable = $scope.mthlyIncome - ($scope.mthlyBill - $scope.mthlySaving) ;
        });

        app.controller('profileController', function($scope, $http) {

            $http.get("/ajax/userData")
            .success(function(response) {
                $scope.userData = response;
            });

            $http.get("/ajax/currency")
            .success(function(response) {
                $scope.currencies = response;
            });

            $scope.templates =
              [ { name: 'Spendable' , url: '/app/html/card_spendable.html'},
                { name: 'Account'   , url: '/app/html/card_account.html'},
                { name: 'Goals'     , url: '/app/html/card_goals.html'},
                { name: 'Edit'      , url: '/app/html/card_userEdit.html'}
              ];
            $scope.template = $scope.templates[0];

            $scope.showEdit = function(page) {
                console.log('edit '+page);

            };

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