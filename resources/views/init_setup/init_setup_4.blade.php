@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center" >


        <div class="card card-block" style="max-width: 400px" ng-controller="MainCtrl">

            <h4 class="card-title strong">Saving</h4>

            <div class="lead" >
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item clearfix">
                        <p class="pull-left"> Income   </p>
                        <p class="pull-right" id="mthly_income">@{{ng_mthly_income}} </p>
                    </li>
                    <li class="nav-item clearfix">
                        <p class="pull-left"> - Bills   </p>
                        <p class="pull-right" id="mthly_bill">@{{ ng_mthly_bill }}</p>
                    </li>
                    <li class="nav-item clearfix">
                         <p class="pull-left"> - Saving   </p>
                         <p class="pull-right">
                         <input type="number"
                                ng-model="savingPlan"
                                name="mthly_saving"
                                class="borderless fetchData" placeholder="@{{savingPlan}}" value="@{{savingPlan}}"> </p>

                    </li>
                    <hr>
                    <li class="nav-item clearfix">
                        <p class="pull-left"> Spendable  </p>
                        <p class="pull-right" id="mthly_spendable" ng-model="mthly_spendable">
                        @{{ ng_mthly_spendable - savingPlan }}
                        </p>
                    </li>
                </ul>
                <hr>
            </div>

            <div class="row lead">
                <div class="col-xs-12 col-sm-6">
                    Save
                    <div>
                    Monthly @{{savingPlan}}
                    </div>
                    <div>
                    Daily @{{savingPlan/30 | number:0}}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    Spend
                    <div>
                    Monthly  @{{ ng_mthly_spendable - savingPlan }}
                    </div>
                    <div>
                    Daily @{{ (ng_mthly_spendable - savingPlan)/30 | number:0}}
                    </div>
                </div>

            </div>

        </div>


        <ul class="pager">
            <li><a href="/init_setup_3">Previous</a></li>
            <li><a href="/init_setup_5">Next</a></li>
        </ul>

        <div style="max-width: 200px">

            <ul class="dotstyle dotstyle-scaleup" align="center">
                <li><a href="/init_setup_1">User</a></li>
                <li><a href="/init_setup_2">Status</a></li>
                <li><a href="/init_setup_3">Finance</a></li>
                <li class="current"><a href="/init_setup_4">Saving</a></li>
            </ul>

        </div>
    </div> <!-- /container -->

    <script>
        var mthly_income = localStorage.getItem('mthly_income');
        var mthly_bill = localStorage.getItem('mthly_bill');
        var mthly_spendable = mthly_income - mthly_bill;

        var app = angular.module('App', []);

        app.controller('MainCtrl', ['$scope', '$window', function($scope, $window) {
          $scope.ng_mthly_income    = $window.mthly_income;
          $scope.ng_mthly_bill      = $window.mthly_bill;
          $scope.ng_mthly_spendable = $window.mthly_spendable;
        }]);


        /*$('#ng_mthly_spendable').attr('value', mthly_spendable);
        $('#maxSpendable').attr('max',mthly_spendable);
        $('#mthly_income').html(mthly_income);
        $('#mthly_bill').html(mthly_bill);
        $('#mthly_spendable').html(mthly_spendable);*/



        console.log(">>"+localStorage.getItem('mthly_income'));
        listLocalStorage();
    </script>


@stop