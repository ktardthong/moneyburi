@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center" ng-controller="thisController">


        <div class="card card-block" style="max-width: 400px" >


            <h4 class="card-title strong">Saving</h4>

            <div class="lead" >
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav-item clearfix">
                        <p class="pull-left"> Income   </p>
                        <p class="pull-right" id="mthly_income">@{{userData.mth_income}} </p>
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
                        @{{ (userData.mth_income -1000) - savingPlan }}
                        </p>
                    </li>
                </ul>
                <hr>
            </div>

            <div class="row lead">
                <div class="col-xs-12 col-sm-6">
                    Save
                    <div>
                    Monthly <span id="mthlySaving">@{{savingPlan | number:0}}</span>
                    </div>
                    <div>
                    Daily <span id="dailySaving">@{{savingPlan/30 | number:0}}</span>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6">
                    Spend
                    <div>
                    Monthly  <span id="mthlySpendable"> @{{ ng_mthly_spendable - savingPlan | number:0}}</span>
                    </div>
                    <div>
                        Daily<span id="dailySpendable"> @{{ (ng_mthly_spendable - savingPlan)/30 | number:0}}</span>
                    </div>
                </div>

            </div>

        </div>


        <ul class="pager">
            <li><a href="/init_setup_3">Previous</a></li>
            <li><a href="#" ng-click="spendableAddData()">Complete!</a></li>
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

@stop