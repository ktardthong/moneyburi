{{-- Bill Compact List --}}
<div class="" align="center" style="padding-bottom: 20px" ng-controller="billController">

    <div ng-if="!rs_userBills">
        No bills here
    </div>


    <div class="text-muted pull-right">
        <small>
            <a ng-click="showBilList=true" href="#"> <i class="ion-ios-list-outline"></i> {!! trans('messages.lbl_billShow') !!} </a>
        </small>
        <small>
            <a ng-click="$root.showBill=true" href="#"> <i class="ion-plus"></i> {!! trans('messages.lbl_billAdd') !!} </a>
        </small>
    </div>

    <h3 id="userBillUpdate">
        @{{rs_sumBills }}
    </h3>

    <div ng-init="$root.showBill=false" ng-show="showBill" class="card card-block">
        <bill-view></bill-view>
    </div>


</div>