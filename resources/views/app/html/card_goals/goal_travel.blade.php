<div style="background-color: #006e9c;padding-top: 8px;padding-bottom: 8px;" class="animated">

<div ng-controller="goalTravelController"  style="max-width: 400px;margin: auto;" class="card">


    <div ng-model="travelGoalForm" ng-init="travelGoalForm=true" ng-show="travelGoalForm">
        <div class="col-xs-12">
            <h4 class="card-title strong" align="center">
                <span class="fa-stack fa-md">
                  <a href="#goalContainer">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                  </a>
                </span>
                {!! trans('messages.goal_travel') !!}
            </h4>

            <div>

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="text"
                            placeholder="Where to?"
                            gm-places-autocomplete
                            aria-label="How much?"
                            class="input input-lg borderless"
                            ng-model="travelLocation" id="travelLocation"
                            required="required" aria-required="true" aria-invalid="true" style="">

                </md-input-container>


                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="Travel Budget"
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                            class="input input-lg borderless"
                            ng-model="travelAmount" id="travelAmount"
                            ng-keyup="travelSavingCal()"
                            required="required" aria-required="true" aria-invalid="true" style="">

                </md-input-container>

                <div class="row">

                    <div class="col-xs-12 col-sm-6">

                        <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                            <input  ng-required="true"
                                    type="number"
                                    placeholder="Number of travelers"
                                    class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                                    class="input input-lg borderless"
                                    ng-model="travelPax" id="travelPax"
                                    ng-keyup="travelSavingCal()"
                                    required="required" aria-required="true" aria-invalid="true" style="">

                        </md-input-container>

                    </div>

                    <div class="col-xs-12 col-sm-6">

                        <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">
                            <input  ng-required="true"
                                    type="number"
                                    placeholder="Nights"
                                    class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                                    class="input input-lg borderless"
                                    ng-model="travelNights" id="travelNights"
                                    ng-keyup="travelSavingCal()"
                                    required="required" aria-required="true" aria-invalid="true" style="">

                        </md-input-container>
                    </div>
                </div>

                <span class="text-muted">{!! trans('messages.goal_whenYouGo') !!}</span>

                <div class="row" style="margin-bottom: 10px">
                    <div class="col-xs-12 col-sm-6">
                        {{-- Months --}}
                        {!! Form::selectMonth('months', 1 ,
                                              ['ng-model' => 'travel_months','ng-change'=>'travelSavingCal()','class'=>'borderless'] ); !!}
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        {{-- Years --}}
                        {!! Form::selectRange('years', date("Y") , date("Y")+10,date("Y"),
                                              ['ng-model' => 'travel_years','ng-change'=>'travelSavingCal()','class'=>'borderless'] ); !!}
                    </div>
                </div>


                {{-- Goal recomendation here --}}
                <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)" class="boxPadding box">
                    <div class="col-sm-4">
                        <img src="/img/a_boy.png" width="50px">
                    </div>
                    <div class="col-sm-8">
                        To go to @{{ travelLocation?travelLocation:'your destination' }}
                        you will need to save @{{ mthPmt | currency: ''  }} per month for @{{ mthDiff }} month(s)

                        Your spendable will change from
                        @{{ userData.d_spendable | currency: '' }}
                        <i class="ion-arrow-right-c"></i>
                        @{{ userData.d_spendable -( mthPmt/30) | currency: '' }}
                    </div>
                </div>

                {{-- Goal Alert --}}
                <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) <0)" class="row">
                    <div class="alert-warning container">
                        You should not set this goal, because you will not have any daily spending.
                    </div>
                </div>


                {{-- Buttons for submit goal--}}
                <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)">
                    <button class="btn btn-block btn-primary" ng-click="setGoalTravel()">Set Goal!</button>
                </div>

            </div>
        </div>

    </div> {{-- Goal form true --}}

    {{-- IF GOal Created--}}
    <div ng-model="addTravelGoal" ng-init="addTravelGoal=false" ng-show="addTravelGoal">

        <div class="col-xs-12" align="center">
            <h4 class="card-title">{!! trans('messages.goal_created') !!}!</h4>
            <div class="card card-block">
                <span class="fa-stack fa-lg">
                  <a href="#goalContainer" ng-click="goalTemplate.url = '/app/html/card_goals/goal_buying.html'">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

                <a href="#"
                   class="card-link"
                   ng-click="goalTemplate.url = '/app/html/card_goals/goal_summary.html'">{!! trans('messages.goal_allGoals') !!}</a>
            </div>
        </div>
    </div>

</div>

</div>