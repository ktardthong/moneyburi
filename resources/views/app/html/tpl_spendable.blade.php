<div class="row white_bg" ng-controller="userController" style="padding-top: 15px;margin-bottom: 10px">

    <div ng-if="ng_spendable < 0" class="alert-danger">{!! trans('messages.err_spenndableNegative') !!}</div>

    <div id="alert_message" class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{!! trans('messages.lbl_close') !!}</span>
        </button>
        <strong>{!! trans('messages.lbl_save') !!}</strong>
    </div>

    <div class="col-xs-12 col-sm-6">
        <canvas id="pie" class="chart chart-doughnut"
                chart-data="data"
                chart-labels="labels"
                chart-legend="true"
                chart-colours="colours">
        </canvas>

        <!-- Daily saving and spendable -->
        <div class="row text-muted">
            <div class="col-xs-12 col-sm-6">
                <label>{!! trans('messages.lbl_youCanSpend') !!}</label>
                <span id="editDaySpendable">@{{ (ng_mthlyIncome - ng_mthlyBill - ng_mthlySaving )/30 | currency: ''}}</span>
                and
            </div>
            <div class="col-xs-12 col-sm-6">
                <label>{!! trans('messages.lbl_youWillSave') !!}</label>
                <span id="editDaySaving">@{{ ng_mthlySaving/30 | currency: '' }}</span>
                {!! trans('messages.lbl_perday') !!}
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-6">
        <div class="col-xs-12">
            <small><label>{!! trans('messages.lbl_currency') !!}</label></small>
            <md-select ng-model="ng_currency" id="currencySelect"
                       aria-required="true"
                       aria-invalid="true"
                       aria-label="Currency">

                <md-option  ng-repeat="(index,item) in currencies" value="@{{ item.id }}"
                            ng-selected="(@{{item.id}} == @{{ userData.currency }}) ? true:false"
                            value="@{{item.id}}">@{{item.currency_code}}</md-option>
            </md-select>
        </div>

        <div class="col-xs-12">
            <small><label>{!! trans('messages.lbl_mth_income') !!}</label></small>
            <h3>
            <input class="form-control borderless"
                   ng-keyup="calPie()"
                   ng-model="ng_mthlyIncome" id="editMonthlyIncome">
            </h3>
        </div>

        <div class="col-xs-12" ng-controller="BillController as BillList">
            <small><label> <b> - </b> Monthly Bill</label></small>
            <h3>
                <span ng-model="ng_mthlyBill" id="editMonthlyBill">@{{ng_mthlyBill}}</span>
            </h3>

            <a ng-click="showBill=true">{!! trans('messages.lbl_billAdd') !!} <i class="ion-plus-circled"></i></a>
            <bill-list></bill-list>
            <div ng-init="showBill=false" ng-show="showBill" class="card card-block">
                <button ng-click="showBill=false">{!! trans('messages.lbl_close') !!}</button>
                <bill-view></bill-view>
            </div>


        </div>

        <div class="col-xs-12">
            <small><label> <b> - </b> {!! trans('messages.lbl_mth_saving') !!}</label></small>
            <input class="form-control borderless" ng-keyup="calPie()" ng-model="ng_mthlySaving" id="editMonthlySaving">
        </div>

        <div class="container-fluid">
            <small><label> <b> = </b> {!! trans('messages.lbl_mth_spendable') !!} </label></small>
            <h3>
                <span ng-model="ng_spendable" id="editMonthlySpendable">@{{ (ng_mthlyIncome - ng_mthlyBill - ng_mthlySaving) }}</span>
            </h3>
            <hr>
        </div>
    </div>
<div>

<button ng-if="ng_spendable > 0"
        class="btn btn-primary btn-block" ng-click="saveInfo()">{!! trans('messages.lbl_save') !!}</button>

</div>

<script>
    $('#alert_message').hide();
</script>