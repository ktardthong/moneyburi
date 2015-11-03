
<div class="container-fluid" >
    <div style="position: absolute;z-index: 5;right: 10px;top:20px" class="col-xs-4 hidden-sm-down card"
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

                <div ng-controller="transactionController">
                    <p>{!! trans('messages.lbl_recentTrans') !!}</p>
                    <trans-recent></trans-recent>
                </div>
                <hr>

            </div>

            <div class="row col-xs-12 col-sm-4 hidden-md-up">
                <div ng-include="'/tpl_overview'"></div>
            </div>

        </div>

        <!-- GOALLLLL -->
        <div class="container" id="goalContainer">
            <span class="lead">{!! trans('messages.lbl_setGoal') !!}</span>
        </div>
        <div class="card card-block animated">
            <div class="page page-home" ng-include="'/goalController'"></div>
        </div>


        <div class="container">
            <span class="lead">{!! trans('messages.lbl_overview') !!}</span>
        </div>
        <div class="card card-block">
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

    <!--Progress bar-->
    <div class="container">
        <span class="lead">{!! trans('messages.lbl_billCreditCard') !!}</span>
    </div>
    <div class="card card-block">

        <div class="col-xs-12 col-sm-6" ng-controller="billController">
            <div class="clearfix">

                <span class="lead">{!! trans('messages.lbl_billUpcoming') !!}</span>

                <div class="pull-right">
                    <small>
                        <a href="#@{{  templates[3].url }}">
                            <i class="ion-plus-circled"></i></a>
                    </small>
                </div>

                <div ng-if="!upComing">{!! trans('messages.lbl_billNone') !!}</div>


                {{-- Bill List loop start here--}}
                <div class="media" ng-repeat="bill in upComing" style="border-style: #fefefe; border-left-color: #9F9F9F">


                    {{-- If bill remove then we show alert here--}}
                    <div class="alert alert-warning"
                         ng-init="removeBillConfirm$index = false"
                         ng-show="removeBillConfirm$index">

                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span></button>

                         {!! trans('messages.lbl_youRemove') !!}
                         @{{ bill.name }}.
                        <strong>
                            <u><a ng-click="undoRemove(bill.id);
                                            removeBillConfirm$index = false;
                                            billContainer$index=true"
                                  class="cursor">{!! trans('messages.lbl_undo') !!}</a></u>
                        </strong> if it was a mistake.
                    </div>

                    {{-- Bill Main container --}}
                    <div class="media list-mb" ng-init="billContainer$index = true" ng-show="billContainer$index">

                        <div class="media-left">
                            <a href="#">
                                <span class="text-muted"> @{{ date | date:'MMM'}}</span>
                                @{{ bill.due_date }}
                            </a>
                        </div>

                        <div class="media-left">
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                          </span>
                        </div>

                        <div class="media-body">

                            <span class="pull-right">

                                <a  ng-click="billOptionContainer$index = true;
                                              showMore$index = false"
                                    ng-show="showMore$index = true"
                                    style="cursor: pointer;margin-left:20px">
                                    <i class="ion-chevron-down"></i>
                                </a>
                                <a  ng-click="billOptionContainer$index = false;
                                              editContainer$index =false;
                                              showMore$index = true"
                                    ng-show="billOptionContainer$index"
                                    class="nav-link cursor">
                                    <i class="ion-chevron-up"></i>
                                    {{--{!! trans('messages.lbl_back') !!}--}}
                                </a>

                            </span>

                            <span class="pull-left">
                                @{{ bill.name }}
                            </span>

                            <h4 class="media-heading ng-binding pull-right">
                                    @{{ bill.amount }}
                            </h4>

                        </div> {{-- end media body--}}

                        <div ng-show="billEdit$index" class="container-fluid pull-left">

                            <button class="btn btn-primary btn-block"></button>

                        </div>

                        {{-- Bill Option --}}
                        <div ng-show="billOptionContainer$index">
                            <div class="container-fluid">
                                <ul class="nav nav-pills">
                                    <li class="nav-item" ng-if="bill.is_paid ==0">
                                        <a  ng-click="editContainer$index=true"
                                            class="nav-link cursor">
                                            <i class="ion-compose"></i>
                                            pay
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a  ng-click="billContainer$index=false;
                                                      removeBillConfirm$index=true;
                                                      removeBill(bill.id)"
                                            class="nav-link cursor">
                                            <i class="ion-trash-b"></i>
                                            {!! trans('messages.lbl_remove') !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> {{-- media list --}}
                </div> {{--  end media --}}
            </div>
        </div>


        {{-- Credit card stuff --}}
        <div class="col-xs-12 col-sm-6">

            <span class="lead">{!! trans('messages.lbl_creditCard') !!}</span>

            <div class="pull-right">
                <small>
                    <a href="@{{ templates[4].url }}">
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