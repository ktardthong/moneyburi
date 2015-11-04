<div style="background-color: #c4e3f3;padding-top: 8px;padding-bottom: 8px;"  ng-controller="goalTargetController">

    <div  style="max-width: 400px;margin: auto;" class="card row" ng-init="showEdit=true" ng-show="showEdit">


            <h4 class="card-title strong" align="center">

                <span class="fa-stack fa-md">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-bullseye fa-stack-1x fa-inverse"></i>
                </span>

                {!! trans('messages.goal_setGoal') !!}

            </h4>

            <div class="container">

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="text"
                            placeholder="{!! trans('messages.goal_name') !!}"
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched"
                            aria-label="{!! trans('messages.goal_name') !!}"
                            class="input input-lg borderless"
                            ng-model="targetName" id="targetName"
                            required="required" aria-required="true" aria-invalid="true" style="">
                </md-input-container>


                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="{!! trans('messages.goal_amount') !!}"
                            ng-keyup="goalCal()"
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched"
                            aria-label="{!! trans('messages.goal_amount') !!}"
                            class="input input-lg borderless"
                            ng-model="targetPrice" id="targetPrice"
                            required="required" aria-required="true" aria-invalid="true" style="">
                </md-input-container>


                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        {{-- Months --}}
                        {!! Form::selectMonth('months', 1 ,
                                              ['ng-model' => 'buying_months','ng-change'=>'goalCal()','class'=>'borderless'] ); !!}
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        {{-- Years --}}
                        {!! Form::selectRange('years', date("Y") , date("Y")+10,date("Y"),
                                              ['ng-model' => 'buying_years','ng-change'=>'goalCal()','class'=>'borderless'] ); !!}
                    </div>
                    <button ng-click="optionContainer=true" class="btn btn-link pull-right"
                            ng-init="true"
                            ng-show="showMore">{!! trans('messages.lbl_more') !!}</button>
                </div>


                <div class="row">

                    <div ng-show="optionContainer" ng-init="optionContainer=false">

                        <button ng-click="optionContainer=false;showMore=true"  class="btn btn-link pull-right" ng-init="false" ng-show="showMore=true;">Hide</button>

                        {{-- Location --}}
                        <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                            <input  ng-required="true"
                                    type="text"
                                    placeholder="{!! trans('messages.goal_where') !!}"
                                    gm-places-autocomplete
                                    class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="{!! trans('messages.goal_where') !!}"
                                    class="input input-lg borderless"
                                    ng-model="targetWhereBuying" id="targetWhereBuying"
                                    required="required" aria-required="true" aria-invalid="true" style="">
                        </md-input-container>


                    </div>
                </div>




                {{-- If Goal is feasible --}}
                <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)" class="boxPadding">
                    <div class="col-sm-4">
                        <img src="/img/a_boy.png" width="50px">
                    </div>
                    <div class="col-sm-8">
                        To set goal for @{{ targetName?targetName:'your destination' }}  in @{{ buyingMonthSelect | date: 'MMM' }}, @{{ buyingYearSelect }}
                        you will need to save @{{ mthPmt | currency: ''  }} per month for @{{ mthDiff }} month(s)

                        Your spendable will change from
                        @{{ userData.d_spendable | currency: '' }}
                        <i class="ion-arrow-right-c"></i>
                        @{{ userData.d_spendable -( mthPmt/30) | currency: '' }}
                    </div>
                </div>

                <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)" class="boxPadding">
                    <button class="btn btn-block btn-primary"
                                    ng-click="setGoalTarget()">Set Goal!</button>
                </div>

                {{-- If goal shouldn't be set --}}
                <div ng-if="( userData.d_spendable -( mthPmt/30) < 0)" class="row">
                    <div class="alert alert-warning">
                        If you set this goal your spendable will be nagative!
                        Consider lengthen the time
                    </div>
                </div>


                <div ng-init="success=false" ng-show="success" style="background-image: url('/img/shine.png');background-size: cover">
                    <h3 class="md-headline text-center">{!! trans('messages.goal_created') !!}</h3>
                    <a style="cursor:pointer"
                       class="card-link"
                       ng-click="goalTemplate.url = '/goal/goal_summary'">{!! trans('messages.goal_allGoals') !!}</a>
                </div>
            </div>
    </div>

</div>