<div>

    <div align="center" style="margin: 10px 0 10px 0;">
        <div class="btn-group row" data-toggle="buttons">
            <label  class="btn btn-sm btn-primary-outline active"
                    ng-click="overAllShow=true;
                              extraSavingShow=false;
                              transactionShow=false;">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Overview
            </label>
            <label  class="btn btn-sm btn-primary-outline"
                    ng-click="overAllShow=false;
                              extraSavingShow=false ;
                              transactionShow=true;">
                <input type="radio" name="options" id="option2" autocomplete="off"> Transaction
            </label>
        </div>
    </div>

    {{-- Over all spending for the current month--}}
    <div class="container-fluid" ng-init="overAllShow=true" ng-show="overAllShow">

        <div class="row">

            <monthly-spendable-chart></monthly-spendable-chart>

            <div class="container-fluid">

                <div class="text-center boxPadding">
                    <h5>@{{ $root.data_monthlhlySpent | currency:'' }}</h5>
                    <span class="text-muted">
                        <small>Spent this month</small>
                    </span>
                </div>

                <div class="text-center boxPadding">
                    <h5>@{{ $root.monthlyRemain }}</h5>
                    <span class="text-muted">
                        <small>Remaining this month</small>
                    </span>
                </div>

                <div class="text-center boxPadding">
                    <h5>1000</h5>
                    <span class="text-muted">
                        <small>{{ trans('messages.lbl_thisYear') }}</small>
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- Transaction --}}
    <div class="container-fluid">
       <trans-recent ng-init="transactionShow=false" ng-show="transactionShow"></trans-recent>
    </div>


    <div id="spendableContainer" ng-show="showAddTransaction">
        <div ng-include="'/app/html/card_addTransaction.html'"></div>
    </div>

    <div id="spendableOverview" ng-hide="showAddTransaction">

    </div>

</div>
