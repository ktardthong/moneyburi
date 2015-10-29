<div>
    <div class="text-center" style="padding-top: 30px">
        <span class="text-muted lead">{!! trans('messages.lbl_yourBalance') !!}</span>
    </div>

    <div class="progress">
        <progress class="progress" value="0" max="100">0%</progress>
    </div>

    <div id="spendableContainer" ng-show="showAddTransaction">
        <div ng-include="'/app/html/card_addTransaction.html'"></div>
    </div>

    <div id="spendableOverview" ng-hide="showAddTransaction">

        <div class="text-center">
            <span class="text-muted lead"> {!! trans('messages.lbl_yourSaving') !!} </span>
        </div>
        <div class="container">
            <ul class="list-unstyled">
                <li> {!! trans('messages.lbl_thisWeek') !!} <span class="pull-right">400</span> </li>
                <li> {!! trans('messages.lbl_thisMonth') !!} <span class="pull-right">2000</span> </li>
                <li> {!! trans('messages.lbl_thisYear') !!} <span class="pull-right">18000</span> </li>
            </ul>
        </div>


        <div class="text-center" style="max-height: 120px;">
            <span class="text-muted lead">{!! trans('messages.lbl_todayTransction') !!}</span>
            <div ng-controller="transactionController">
                <trans-recent></trans-recent>
            </div>
        </div>


    </div>

</div>