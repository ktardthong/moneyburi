<div style="position: relative;" class="row">
    <span class="lead">{!! date('Y-M-d') !!}</span>
    <div style="width: 100%; height: 10px; position: absolute;
                top: 50%; left: 0; margin-top: -40px;
                line-height:19px; text-align: center;
                z-index: 99">

        <div class="text-center">
            <small>
                <h6>{!! trans('messages.lbl_spendable') !!}</h6>
            </small>
        </div>

        <h4>
            <strong ng-if="d_spendable - todaySpending !=0">@{{ userData.d_spendable - todaySpending | currency: '' }}</strong>
        </h4>

        <div class="text-center">
            <small>
                {!! trans('messages.lbl_from') !!}
                @{{ userData.d_spendable | currency: '' }}
            </small>
        </div>

    </div>

    <canvas
            class="chart chart-doughnut"
            chart-data="spendableDough.data"
            chart-labels="spendableDough.labels"
            chart-colours="spendableDough.colours"
            chart-options="spendableDough.option"></canvas>
</div>