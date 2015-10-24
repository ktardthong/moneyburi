<div class="row white_bg" style="padding-top: 15px;margin-bottom: 10px" ng-controller="userController">

    <div ng-if="rs_mthlyIncome - rs_sumBills - rs_mthlySaving < 0"
         class="alert-danger">{!! trans('messages.err_spendableNegative') !!}</div>

    <div id="alert_message" class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">{!! trans('messages.lbl_close') !!}</span>
        </button>
        <strong>{!! trans('messages.lbl_save') !!}</strong>
    </div>

    <div class="col-xs-12 col-sm-6"  >
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
                <span id="editDaySpendable">@{{ (rs_mthlyIncome - rs_sumBills - rs_mthlySaving )/30 | currency: ''}}</span>
                and
            </div>
            <div class="col-xs-12 col-sm-6">
                <label>{!! trans('messages.lbl_youWillSave') !!}</label>
                <span id="editDaySaving">@{{ rs_mthlySaving/30 | currency: '' }}</span>
                {!! trans('messages.lbl_perday') !!}
            </div>
        </div>
    </div>

    {{-- The right side --}}
    <div class="col-xs-12 col-sm-6">
        <div class="col-xs-12">
            <label>{!! trans('messages.lbl_currency') !!}</label>
            <md-select ng-model="ng_currency" id="currencySelect"
                       aria-required="true"
                       aria-invalid="true"
                       aria-label="Currency">

                <md-option  ng-repeat="(index,item) in currencies" value="@{{ item.id }}"
                            ng-selected="(@{{item.id}} == @{{ userData.currency }}) ? true:false"
                            value="@{{item.id}}">@{{item.currency_code}}</md-option>
            </md-select>
        </div>


        {{-- Monthly Income --}}
        <div class="col-xs-12">
            <label>{!! trans('messages.lbl_mth_income') !!}</label>
            <input class="borderless lg-form-input text-muted"
                   ng-keyup="calPie()"
                   ng-model="rs_mthlyIncome" id="editMonthlyIncome">
        </div>


        {{-- Monthly Saving --}}
        <div class="col-xs-12">
            <label> <b> - </b> {!! trans('messages.lbl_mth_saving') !!}</label>
            <span>
            <input  class="borderless lg-form-input text-muted"
                    ng-keyup="calPie()"
                    ng-model="rs_mthlySaving" id="editMonthlySaving">
            </span>
        </div>


        {{-- Monthly Bills --}}
        <div class="col-xs-12">
            <label> <h4> - </h4> {!! trans('messages.lbl_mth_bills') !!}</label>
            <user-bill></user-bill>
            <bill-compact-list ng-init="showBilList=false" ng-show="showBilList"></bill-compact-list>
        </div>



        <div class="container-fluid">
            <small><label> <b> = </b> {!! trans('messages.lbl_mth_spendable') !!} </label></small>
            <h3>
                <span   ng-model="ng_spendable"
                        id="editMonthlySpendable">@{{ (rs_mthlyIncome - rs_sumBills - rs_mthlySaving) }}</span>
            </h3>
            <hr>
        </div>
    </div>
<div>

<button ng-if="rs_mthlyIncome - rs_sumBills - rs_mthlySaving > 0"
        class="btn btn-primary btn-block" ng-click="saveInfo()">{!! trans('messages.lbl_save') !!}</button>

</div>

<script>
    $('#alert_message').hide();
</script>