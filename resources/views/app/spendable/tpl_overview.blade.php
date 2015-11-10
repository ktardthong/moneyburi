<div>

    <div id="accordion" role="tablist" aria-multiselectable="true">
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
              <div ng-controller="transactionController">
                   <trans-recent></trans-recent>
              </div>
            </div>
        </div>
    </div>


    <div class="text-center" style="padding-top: 30px">

    </div>



    <div id="spendableContainer" ng-show="showAddTransaction">
        <div ng-include="'/app/html/card_addTransaction.html'"></div>
    </div>

    <div id="spendableOverview" ng-hide="showAddTransaction">

    </div>

</div>