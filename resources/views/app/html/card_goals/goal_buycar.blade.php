<div class="card card-block" ng-controller="goalAutoController" style="max-width: 400px;margin: auto;" class="card">

    <h4 class="card-title strong" align="center">
        <span class="fa-stack fa-lg">
            <a href="#goalContainer" ng-click="goalTemplate.url = '/app/html/card_goals/goal_buycar.html'">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-car fa-stack-1x fa-inverse"></i>
            </a>
        </span>
        Buy a car</h4>


    <div class="col-xs-12">
        <div class="col-xs-12">

            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Name of the car"
                        gm-places-autocomplete
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Name of the car?"
                        class="input input-lg borderless"
                        ng-model="autoName" id="autoName"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="number"
                        placeholder="How much?"
                        gm-places-autocomplete
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                        class="input input-lg borderless"
                        ng-model="autoPrice" id="autoPrice"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Brand"
                        gm-places-autocomplete
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Brand"
                        class="input input-lg borderless"
                        ng-model="autoBrand" id="autoBrand"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Model"
                        gm-places-autocomplete
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Model"
                        class="input input-lg borderless"
                        ng-model="autoModel" id="autoModel"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>

            <button class="btn btn-link" ng-click="showMore=true">more</button>



            <div class="row" ng-show="showMore" ng-init="showMore=false">

                <button class="btn btn-link" ng-click="showMore=false">hide</button>

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="Down Payment"
                            gm-places-autocomplete
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Down Payment"
                            class="input input-lg borderless"
                            ng-model="autoDPmt" id="autoDPmt"
                            required="required" aria-required="true" aria-invalid="true" style="">

                </md-input-container>

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="Number of payments (mths)"
                            gm-places-autocomplete
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Number of payments (mths)"
                            class="input input-lg borderless"
                            ng-model="autoNumPmt" id="autoNumPmt"
                            required="required" aria-required="true" aria-invalid="true" style="">

                </md-input-container>

                <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                    <input  ng-required="true"
                            type="number"
                            placeholder="Interest %"
                            gm-places-autocomplete
                            class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Interest %"
                            class="input input-lg borderless"
                            ng-model="autoInterest" id="autoInterest"
                            required="required" aria-required="true" aria-invalid="true" style="">

                </md-input-container>


            <p>
                <span>Monthly payment</span>
                <p>
                @{{
                    ((autoPrice - autoDPmt) / autoNumPmt) * (1+ (autoInterest/100) ) | number:0
                }}
                </p>
            </p>

            </div>

        </div>
    </div>


    <button class="btn btn-block btn-primary">Set Goal!</button>

</div>