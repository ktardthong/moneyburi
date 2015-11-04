<div class="card card-block" ng-controller="goalAutoController" style="max-width: 400px;margin: auto;" class="card">

    <h4 class="card-title strong" align="center">
        <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-car fa-stack-1x fa-inverse"></i>
        </span>
        Buy a car
    </h4>


    <div class="row">
        <div class="container">

            {{-- Brands --}}
            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">
                <md-input-container flex>
                    <label>Brand</label>
                    <md-select ng-model="autoBrand">
                        <md-option ng-repeat="car in carBrandsList" value="@{{car.id}}">
                            <img src="/img/cars_logo/@{{ car.images }}" width="30px"> @{{ car.brandname }}
                        </md-option>
                    </md-select>
                </md-input-container>

                {{--<input  ng-required="true"
                        type="text"
                        placeholder="Brand"
                        gm-places-autocomplete
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Brand"
                        class="input input-lg borderless"
                        ng-model="autoBrand" id="autoBrand"
                        required="required" aria-required="true" aria-invalid="true" style="">--}}

            </md-input-container>

            {{-- Car model --}}
            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="text"
                        placeholder="Model"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="Model"
                        class="input input-lg borderless"
                        ng-model="autoModel" id="autoModel"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            <md-input-container md-no-float="" class="md-input-has-placeholder md-default-theme md-input-invalid">

                <input  ng-required="true"
                        type="number"
                        placeholder="How much?"
                        class="ng-pristine md-input ng-invalid ng-invalid-required ng-touched" aria-label="How much?"
                        class="input input-lg borderless"
                        ng-model="autoPrice" id="autoPrice"
                        ng-keyup="carCal()"
                        required="required" aria-required="true" aria-invalid="true" style="">

            </md-input-container>


            {{-- Years --}}
            {!! Form::selectRange('months', 1, 100,1,['ng-model' => 'car_month','ng-change'=>'carCal()','class'=>'borderless'] ); !!}



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

            </div>

            {{-- Recommend or Suggest the goal --}}
            <div ng-if="spendableDay > 0" style="margin:8px" class="box boxPadding">
                <div class="col-sm-4">
                    <img src="/img/a_boy.png" width="50px">
                </div>
                <div class="col-sm-8">
                    Your Monthly payment @{{ autoPrice/car_month | currency: '' }}
                    <br/>
                    Your spendable will change from
                    @{{ userData.d_spendable | currency: '' }}
                    <i class="ion-arrow-right-c"></i>
                    @{{ spendableDay | currency: '' }}
                </div>
            </div>
        </div>

        {{-- if the number is negative --}}
        <div ng-if="spendableDay < 0" class="row alert alert-warning">
            You shouldn't set this goal
        </div>
    </div>

    {{-- Button only show if the spendable day is greater than 0 --}}
    <button ng-if="spendableDay>0"
            ng-click="addCarGoal()"
            class="btn btn-block btn-primary">Set Goal!</button>

</div>
