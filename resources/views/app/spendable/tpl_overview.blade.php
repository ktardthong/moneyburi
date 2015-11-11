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
            {{--<daily-spendable-chart class="container"></daily-spendable-chart>--}}

            <div class="container-fluid">

                <p>
                    <span>@{{ $root.data_monthlhlySpent }}</span>
                    <span class="text-muted">
                    Spent this month
                    </span>
                </p>

                <p>
                    <span>@{{ $root.monthlyRemain }}</span>
                    <span class="text-muted">
                    Remaining this month
                    </span>
                </p>

                <p>
                    <span>1000</span>
                    <span class="text-muted">
                    {{ trans('messages.lbl_thisYear') }}
                    </span>
                </p>
            </div>
        </div>
    </div>

    {{-- Transaction --}}
    <div class="container-fluid" ng-controller="transactionController">
       <trans-recent ng-init="transactionShow=false" ng-show="transactionShow"></trans-recent>
    </div>

    {{--<div id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title cursor">
            <a data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="text-center">
                    <span class="text-muted">{!! trans('messages.lbl_thisMonthSpending') !!}</span>
                </div>
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
            <div class="text-muted container">
                    <i class="fa fa-credit-card"></i>
                    <span>Credit card: </span> @{{ sumAmountCC }}
                </div>

                <div class="text-muted container">
                    <i class="fa fa-money"></i>
                    <span>Cash </span> @{{ sumAmountCC }}
            </div>
        </div>
      </div>
      <div class="panel panel-default">
          <div class="panel-heading" role="tab" id="headingTwo">
            <h4 class="panel-title cursor">
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <div class="text-center">
                    <span class="text-muted"> {!! trans('messages.lbl_yourSaving') !!} </span>
                </div>
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            <div class="container">
                        <ul class="list-unstyled">
                            <li> {{ trans('messages.lbl_thisWeek') }}   <span class="pull-right text-success">400</span> </li>
                            <li> {{ trans('messages.lbl_thisMonth') }}  <span class="pull-right text-success">2000</span> </li>
                            <li> {{ trans('messages.lbl_thisYear') }}   <span class="pull-right text-success">18000</span> </li>
                        </ul>
            </div>
          </div>
      </div>
      <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <div class="text-center">
                      <span class="text-muted lead">{!! trans('messages.lbl_todayTransction') !!}</span>
                  </div>
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">

            </div>
        </div>
    </div>--}}

    <div id="spendableContainer" ng-show="showAddTransaction">
        <div ng-include="'/app/html/card_addTransaction.html'"></div>
    </div>

    <div id="spendableOverview" ng-hide="showAddTransaction">

    </div>

</div>
<style>
.vertical {
  display: inline-block;
  width: 20%;
  height: 40px;
  -webkit-transform: rotate(-90deg); /* Chrome, Safari, Opera */
  transform: rotate(-90deg);
}
.vertical {
  box-shadow: inset 0px 4px 6px #ccc;
}
.progress-bar {
  box-shadow: inset 0px 4px 6px rgba(100,100,100,0.6);
}
</style>