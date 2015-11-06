<div ng-controller="billController"  style="max-width: 400px;margin: auto;margin: 0 0 10px 0;" align="center">

    {{-- If there is no bills here --}}
    <div ng-if="rs_userBills.length == 0">
        no bills here, why don't add one?
        <button ng-click="$root.showBill=true;
                          $root.billOverview=true" class="btn btn-link">
                          {!! trans('messages.lbl_billAdd') !!}
                          <i class="ion-plus-round"></i> </button>
    </div>

    <div class="card card-block" ng-show="$root.showBill">
        <bill-view></bill-view>
    </div>

    {{-- and if there is some bills to be show --}}
    <div ng-if="rs_userBills.length > 0" ng-show="$root.billOverview" ng-init="$root.billOverview=true">

          <canvas   id="billDough"
                    class="chart chart-doughnut"
                    chart-data="bill_data"
                    chart-labels="bill_labels">
          </canvas>

              <h4>@{{rs_sumBills | currency: '' }}</h4>
              <button ng-click="$root.showBill=true;
                                $root.billOverview=true" class="btn btn-link">
                                {!! trans('messages.lbl_billAdd') !!}
                                <i class="ion-plus-round"></i> </button>

         <div>
             <div class="btn-group" data-toggle="buttons">
                 <label class="btn btn-primary-outline active" ng-click="billStatus()">
                     <input type="radio" name="options" id="option1" autocomplete="off" checked> All Bills
                 </label>
                 <label class="btn btn-primary-outline" ng-click="billStatus(1)">
                     <input type="radio" name="options" id="option2" autocomplete="off"> Paid
                 </label>
                 <label class="btn btn-primary-outline" ng-click="billStatus(0)">
                      <input type="radio" name="options" id="option3" autocomplete="off"> UnPaid
                  </label>
             </div>
         </div>

        <div class="card card-block">
            <bill-list ng-init="allBill=true" ng-show="allBill"></bill-list>
        </div>

    </div>

</div>