<div ng-controller="billController"  style="margin: auto;" align="center" class="container row card_width">

    {{-- If there is no bills here --}}
    <div ng-if="rs_userBills.length == 0">
        no bills here, why don't add one?
        <button ng-click="$root.showBill=true;
                          $root.billOverview=true" class="btn btn-link">
                          {!! trans('messages.lbl_billAdd') !!}
                          <i class="ion-plus-round"></i> </button>
    </div>


    {{-- and if there is some bills to be show --}}
    <div ng-if="rs_userBills.length > 0" ng-show="$root.billOverview" ng-init="$root.billOverview=true">


{{--            <canvas   id="billDough"
                        class="chart chart-doughnut"
                        value="billDough"
                        chart="billDough"
                        chart-data="bill_data"
                        chart-labels="bill_labels">
            </canvas>--}}

            <div class="card card-block container-fluid">

                <small>
                    Total Bill
                </small>
                <h2 id="userBillUpdate">
                    @{{rs_sumBills | currency: '' }}
                </h2>
            </div>



             <div class="btn-group" data-toggle="buttons">
                 <label class="btn btn-primary-outline active" ng-click="billStatus();$root.showBill=false;allBill=true">
                     <input type="radio" name="options" id="option1" autocomplete="off" checked> All Bills
                 </label>
                 <label class="btn btn-primary-outline" ng-click="billStatus(1);$root.showBill=false;allBill=true">
                     <input type="radio" name="options" id="option2" autocomplete="off"> Paid
                 </label>
                 <label class="btn btn-primary-outline" ng-click="billStatus(0);$root.showBill=false;allBill=true">
                      <input type="radio" name="options" id="option3" autocomplete="off"> UnPaid
                 </label>
                 <label class="btn btn-primary-outline" ng-click="$root.showBill=true;
                                                                   $root.billOverview=true;
                                                                   allBill=false">
                    <input type="radio" name="options" id="option3" autocomplete="off">
                    {!! trans('messages.lbl_billAdd') !!}
                    <i class="ion-plus-round"></i>
                 </label>
             </div>
             {{--<button ng-click="$root.showBill=true;
                               $root.billOverview=true" class="btn btn-link">
                               {!! trans('messages.lbl_billAdd') !!}
                               <i class="ion-plus-round"></i> </button>--}}

        <div class="card card-block" ng-show="$root.showBill">
                <bill-view></bill-view>
        </div>
        <div class="card card-block" ng-init="allBill=true" ng-show="allBill">
            <bill-list></bill-list>
        </div>

    </div>

</div>