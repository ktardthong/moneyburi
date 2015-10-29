<div style="background-color: #006e9c;padding-top: 8px;padding-bottom: 8px;">

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
                Travel Goal
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



            <span class="text-muted">When you want to go?</span>

            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <z-month-select></z-month-select>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div year-drop offset="0" range="10"></div>
                </div>
            </div>

            <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)" class="boxPadding">
                <div class="alert-success">
                    To go to @{{ travelLocation?travelLocation:'your destination' }}  in @{{ monthSelect | date: 'MMM' }}, @{{ yearSelect }}
                    you will need to save @{{ mthPmt | currency: ''  }} per month for @{{ mthDiff }} month(s)
                </div>

                <div class="alert-info">

                    <span class="fa-stack fa-md">
                      <a href="#goalContainer" ng-click="goalTemplate.url = '/app/html/card_goals/goal_buying.html'">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-info fa-stack-1x fa-inverse"></i>
                      </a>
                    </span>

                    After setting this goal, your daily spendable will be @{{ userData.d_spendable -( mthPmt/30) | currency: '' }}
                    from @{{ userData.d_spendable | currency: '' }}.

                </div>

                <span id="mthPmt">@{{ mthPmt }}</span>@{{ monthSelect | date: 'MMM' }}

                <button class="btn btn-block btn-primary" ng-click="setGoalTravel()">Set Goal!</button>
            </div>

            <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) <0)">
                <div class="alert-danger">
                    You should not set this goal, because you will not have any daily spending.
                </div>
            </div>


        </div>


    </div>

    </div>


    <div ng-model="addTravelGoal" ng-init="addTravelGoal=false" ng-show="addTravelGoal">

        <div class="col-xs-12" align="center">
            <h4 class="card-title">Goal created!</h4>
            <div class="card card-block">
                <span class="fa-stack fa-lg">
                  <a href="#goalContainer" ng-click="goalTemplate.url = '/app/html/card_goals/goal_buying.html'">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

                <a href="#"
                   class="card-link"
                   ng-click="goalTemplate.url = '/app/html/card_goals/goal_summary.html'"
                        >Show All Goals</a>
            </div>
        </div>
    </div>

</div>

</div>