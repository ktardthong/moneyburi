<div style="background-color: #c4e3f3;padding-top: 8px;padding-bottom: 8px;"  ng-controller="goalTargetController">

    <div  style="max-width: 400px;margin: auto;" class="card row" ng-init="showEdit=true" ng-show="showEdit">

        <div class="col-xs-12">

            <h4 class="card-title strong" align="center">

                <span class="fa-stack fa-md">
                  <a href="#goalContainer" ng-click="goalTemplate.url = '/app/html/card_goals/goal_buying.html'">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-bullseye fa-stack-1x fa-inverse"></i>
                  </a>
                </span>
                Set a goal

            </h4>

            <div class="col-xs-12">

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="text"
                            placeholder="Name your goal"
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                            class="input input-lg borderless"
                            ng-model="targetName" id="targetName"
                            required="required" aria-required="true" aria-invalid="true" style="">
                </md-input-container>


                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="How much?"
                            ng-keyup="goalCal()"
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                            class="input input-lg borderless"
                            ng-model="targetPrice" id="targetPrice"
                            required="required" aria-required="true" aria-invalid="true" style="">
                </md-input-container>


                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <buying-month-select></buying-month-select>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div buying-year-drop offset="0" range="10"></div>
                    </div>
                    <button ng-click="optionContainer=true" class="btn btn-link pull-right" ng-init="true" ng-show="showMore">More</button>
                </div>




                <div class="row">

                    <div ng-show="optionContainer" ng-init="optionContainer=false">

                        <button ng-click="optionContainer=false;showMore=true"  class="btn btn-link pull-right" ng-init="false" ng-show="showMore=true;">Hide</button>

                        <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                            <input  ng-required="true"
                                    type="text"
                                    placeholder="Where?"
                                    gm-places-autocomplete
                                    class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Where?"
                                    class="input input-lg borderless"
                                    ng-model="targetWhere" id="targetWhere"
                                    required="required" aria-required="true" aria-invalid="true" style="">
                        </md-input-container>


                    </div>
                </div>

            </div>
        </div>


        <div ng-if="(mthPmt > 0)&& ( userData.d_spendable -( mthPmt/30) > 0)" class="boxPadding">

                To set goal for @{{ targetName?targetName:'your destination' }}  in @{{ buyingMonthSelect | date: 'MMM' }}, @{{ buyingYearSelect }}
                you will need to save @{{ mthPmt | currency: ''  }} per month for @{{ mthDiff }} month(s)

            <button class="btn btn-block btn-primary"
                    ng-click="setGoalTarget()">Set Goal!</button>
        </div>

    </div>

    <div ng-init="success=false" ng-show="success" style="background-image: url('/img/shine.png');background-size: cover">
        <h3 class="md-headline text-center">Goal Created!</h3>
        <a href="#"
           class="card-link"
           ng-click="goalTemplate.url = '/app/html/card_goals/goal_summary.html'">Show All Goals</a>
    </div>


</div>