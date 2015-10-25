
<div class="container-fluid" >
    <div style="position: absolute;z-index: 5;right: 0;top:20px" class="col-xs-4 hidden-sm-down card"
         ng-include="'/tpl_overview'"></div>

    <div style="margin-top: 8px">&nbsp;</div>


    <div class="row">

        <div class="card card-block">

            <div class="col-xs-12 col-sm-8" ng-controlloer="spendableChartController">

                <daily-spendable-chart></daily-spendable-chart>
                <div class="text-center ">
                    <a href="#" class="lead" ng-click="nav(templates[3].url)">
                    <i class="ion-plus-circled"></i>
                    {!! trans('messages.lbl_addTrans') !!}
                    </a>
                </div>

                {{--<div ng-controller="transactionController">--}}
                    {{--<p>{!! trans('messages.lbl_recentTrans') !!}</p>--}}
                    {{--<trans-recent></trans-recent>--}}
                {{--</div>--}}
                {{--<hr>--}}

            </div>

            <div class="row col-xs-12 col-sm-4 hidden-md-up">
                <div ng-include="'/tpl_overview'"></div>
            </div>

        </div>

        <!-- GOALLLLL -->
        <div class="container" id="goalContainer">
            <span class="lead">{!! trans('messages.lbl_setGoal') !!}</span>
        </div>
        <div class="card card-block">
            <div class="page page-home" ng-include="'/goalController'"></div>
        </div>


        <div class="container">
            <span class="lead">{!! trans('messages.lbl_overview') !!}</span>
        </div>
        <div class="card card-block">
            <div class="col-xs-12 col-sm-4">
                <span>{!! date('M Y') !!}</span>
                <div class="pull-right">
                    <small>
                        <a a href="#">
                            <i class="fa fa-cog"></i></a>
                    </small>
                </div>

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

                <span>{!! trans('messages.lbl_spendingCate') !!}</span>
                <progress class="progress progress-success" value="25" max="100"></progress>

                <span>{!! trans('messages.lbl_spendingCate') !!}</span>
                <progress class="progress progress-success" value="25" max="100"></progress>

                <span>{!! trans('messages.lbl_spendingCate') !!}</span>
                <progress class="progress progress-success" value="25" max="100"></progress>


            </div>
            <div class="col-xs-12 col-sm-8" ng-controller="spendableChartController">
                <spendable-chart></spendable-chart>
            </div>
        </div>

    <!--Progress bar-->
    <div class="container">
        <span class="lead">{!! trans('messages.lbl_billCreditCard') !!}</span>
    </div>
    <div class="card card-block">

        <div class="col-xs-12 col-sm-6">
            <div class="clearfix">

                <span class="lead">{!! trans('messages.lbl_billUpcoming') !!}</span>

                <div class="pull-right">
                    <small>
                        <a href="#" ng-click="nav(templates[4].url)">
                            <i class="ion-plus-circled"></i></a>
                    </small>
                </div>

                <div ng-if="!upComing">{!! trans('messages.lbl_billNone') !!}</div>

                <div class="clearfix" ng-repeat="bill in upComing">

                    <div class="pull-left text-center">

                        <div>
                            <span class="text-muted"> {!! date('M') !!}</span>
                        </div>
                        <div>
                            @{{ bill.due_date }}
                        </div>
                    </div>

                    <div class="center-block pull-right text-muted">
                        <span>@{{ bill.amount | number: 2}}</span>
                        <br>
                        <span class="list-title" style="">
                            <a href="#">@{{ bill.name }}</a>
                        </span>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6">

            <span class="lead">{!! trans('messages.lbl_creditCard') !!}</span>

            <div class="pull-right">
                <small>
                    <a href="#" ng-click="nav(templates[5].url)">
                        <i class="ion-plus-circled"></i></a>
                </small>
            </div>

            <div ng-controller="CardController">
                <card-list></card-list>
            </div>
        </div>



    </div>



</div>

<script>

    $("#addTransaction").click(function(){
        $("#spendableOverview").hide();
        $("#spendableContainer").load('/app/html/card_addTransaction.html');
    });

</script>