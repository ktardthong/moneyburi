{{--
    The main card
 --}}
<div class="container-fluid" >

    <div class="container">
        <div class="col-sm-8">

        </div>
        <div class="col-sm-4">
            {{-- Only show this at Desktop level--}}
            <div style="position:absolute ;z-index: 5;right: 10px;top:10px;width:220px" class="pull-right hidden-sm-down card">
                <div ng-include="'/tpl_overview'"></div>
            </div>
        </div>
    </div>

    <div class="row" style="background: #F1F1F1">



        <div class="container">
            <?php
            $welcome = 'Hi';
            if (date("H") < 12) {
                $welcome = 'Good morning';
            } else if (date('H') > 11 && date("H") < 18) {
                $welcome = 'Good afternoon';
            } else if(date('H') > 17) {
                $welcome = 'Good evening';
            }
            ?>
            <h2 class="text-left">{{ $welcome }}, @{{ userData.firstname }}!</h2>
            <span class="lead">{!! date('M d, Y') !!}</span>
        </div>

        <div class="card card-block container">

            <div class="row col-xs-12 col-sm-8" ng-controlloer="spendableChartController">

                <daily-spendable-chart></daily-spendable-chart>
                <div class="text-center ">
                    <a href="#@{{  templates[2].url }}" class="lead">
                    <i class="ion-plus-circled"></i>
                    {!! trans('messages.lbl_addTrans') !!}
                    </a>
                </div>

            </div>

            <div class="row col-xs-12 col-sm-4 hidden-md-up" align="center">
                <button ng-click="showMobileOverView=true;hideButton=true;showButton=false"
                        ng-init="showButton=true;"
                        ng-show="showButton"
                        class="btn btn-link">Show Overview</button>

                <button ng-click="showMobileOverView=false;hideButton=false;showButton=true"
                        ng-init="hideButton=false;"
                        ng-show="hideButton"
                        class="btn btn-link">hide Overview</button>

                <div ng-show="showMobileOverView" ng-init="showMobileOverView=false" ng-include="'/tpl_overview'"></div>
            </div>

        </div>

        <!-- GOALLLLL -->
        <div class="container" id="goalContainer">
            <span class="lead">{!! trans('messages.lbl_setGoal') !!}</span>
        </div>
        <div class="card card-block container">
            <div class="page page-home" ng-include="'/goalController'"></div>
        </div>

        {{-- Overview --}}
        <div class="container">
            <span class="lead">{!! trans('messages.lbl_overview') !!}</span>
        </div>
        <div class="card card-block container">
            <div align="center" style="margin: 0 0 10px 0;">
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary-outline active" ng-click="showSpendableWeek()">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Week
                    </label>
                    <label class="btn btn-primary-outline" ng-click="showSpendableMonth()">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Month
                    </label>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6" ng-controller="spendingCategoriesChartController">
                <p>Spending Categories</p>
                <spending-categories-chart></spending-categories-chart>
            </div>

            <div class="col-xs-12 col-sm-6" ng-controller="spendableChartController">
                <p>Overall Spendable</p>
                <spendable-chart></spendable-chart>
            </div>
        </div>


        <div class="container">

            <div class="col-xs-12 col-sm-6" ng-controller="billController">
                <div class="row">

                    <div class="pull-right">
                        <small>
                            <a href="#@{{  templates[3].url }}">
                                <i class="ion-plus-circled"></i></a>
                        </small>
                    </div>
                    <span class="lead">{!! trans('messages.lbl_billUpcoming') !!}</span>

                    <div class="clearfix card card-block">

                        <div ng-if="!$root.rs_userBills">{!! trans('messages.lbl_billNone') !!}</div>

                        {{-- Bill List --}}
                        <bill-list></bill-list>
                    </div>

                </div>
            </div>


            {{-- Credit card stuff --}}
            <div class="col-xs-12 col-sm-6">

                <span class="lead">{!! trans('messages.lbl_creditCard') !!}</span>

                <div class="pull-right">
                    <small>
                        <a href="#@{{ templates[4].url }}">
                            <i class="ion-plus-circled"></i></a>
                    </small>
                </div>

                <div ng-controller="CardController">
                    <card-list></card-list>
                </div>
            </div>
        {{-- end col-sm-6 --}}
        </div>



</div>

<script>

    $("#addTransaction").click(function(){
        $("#spendableOverview").hide();
        $("#spendableContainer").load('/app/html/card_addTransaction.html');
    });

</script>