@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center" ng-controller="MainCtrl">


        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Thak you</h4>

            <div class="lead">

               <small> Pleas confirm the following information </small>
                <br>
                <img src="/img/boy.gif">
                <br>
                @{{ ng_firstname }} @{{ ng_lastname }}

                <br>
                Born in
                @{{ ng_brithyear }}
                <br>

                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item clearfix">
                        Income: @{{ ng_mthly_income }}
                    </li>
                    <li class="nav-item clearfix">
                        Bill:   @{{ ng_mthly_bill }}
                    </li>
                    <li>
                        Saving: @{{ ng_mthly_saving }}
                    </li>
                </ul>

                <form ng-submit="setupItem.completeThis()" class="lead" ng-controller="SetupController as setupItem">
                    <input class="btn btn-primary btn-sm btn-block" type="submit" value="Complete">
                </form>
            </div>


        </div>


        <nav>
          <ul class="pager">
            <li><a href="/init_setup_4">Previous</a></li>
            <li><a href="/init_complete">Complete</a></li>
          </ul>
        </nav>
    </div> <!-- /container -->

    <script>
//    var mthly_income = localStorage.getItem('mthly_income');
//    var mthly_bill = localStorage.getItem('mthly_bill');
//    var mthly_spendable = mthly_income - mthly_bill;
//
    var app = angular.module('App', []);

    app.controller('MainCtrl', ['$scope', '$window', function($scope, $window) {
      $scope.ng_firstname       = localStorage.getItem('firstname');
      $scope.ng_lastname        = localStorage.getItem('lastname');
      $scope.ng_brithyear       = localStorage.getItem('BirthYear');
      $scope.ng_mthly_income    = localStorage.getItem('mthly_income');
      $scope.ng_mthly_bill      = localStorage.getItem('mthly_bill');
      $scope.ng_mthly_saving    = localStorage.getItem('mthly_saving');

    }]);
    listLocalStorage();


    app.controller('SetupController', function($scope,$location) {
        var setup = this;

        setup.completeThis = function() {
          window.location.href = '/init_complete';
        };

      });
    </script>
@stop