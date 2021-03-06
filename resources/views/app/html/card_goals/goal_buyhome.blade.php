<div style="background-color: #00B9E7;padding-top: 8px;padding-bottom: 8px;">
    <div ng-controller="goalHomeController" style="max-width: 400px;margin: auto;" class="card">

        <h4 class="card-title strong" align="center">

            <span class="fa-stack fa-lg">
                <a href="#">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                </a>
            </span>Buy a home/condo

        </h4>


        <div class="col-xs-12">
            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Give it a name"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Give it a name"
                        class="input input-lg borderless"
                        ng-model="homeCal.homeName" id="homeName"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="How much?"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                        class="input input-lg borderless"
                        ng-model="homeCal.homePrice" id="homePrice"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Down payment"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Down payment"
                        class="input input-lg borderless"
                        ng-model="homeCal.homeDPmt" id="homeDPmt"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


                <p>
                    <span>Loan from bank</span>
                    <p>@{{homeCal.homePrice - homeCal.homeDPmt }}</p>
                </p>

            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Interest %"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Interest %"
                        class="input input-lg borderless"
                        ng-model="homeCal.homeInterest" id="homeInterest"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Duration (Year) "
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Duration (Year) "
                        class="input input-lg borderless"
                        ng-model="homeCal.homePmtDuration" id="homePmtDuration"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


                <p>
                    <span>Monthly payment</span>
                    <p>

                    @{{ (
                        (homeCal.homePrice - homeCal.homeDPmt)*
                        (1+ ( (homeCal.homeInterest/100) * homeCal.homePmtDuration) )
                        )
                        / ( homeCal.homePmtDuration* 12) | number:0
                    }}

                    <<<
                    </p>
                    <input placeholder="" class="input input-lg borderless" ng-model="homeCal.homeMthPmt" id="homeMthPmt">
                </p>
                @{{homeCal.homePrice - homeCal.homeLoan }}
                @{{ homeCal.homePmtDuration }} + @{{ homeCal.homePrice }} @{{ homeCal.homeLoan}}

                <button class="btn btn-block btn-primary" ng-click="setGoalTravel()">Set Goal!</button>

        </div>

    </div>
</div>