<div style="position: relative;" class="row">
    <div style="width: 100%; height: 10px; position: absolute;
                top: 50%; left: 0; margin-top: -40px;
                line-height:19px; text-align: center;
                z-index: 99">

        <div class="text-center">
            <small>
                <h6>{!! date('M ') !!}</h6>
            </small>
        </div>

        <h5>
            <small>
                <strong ng-if="$root.monthlyRemain !=0">
                @{{ $root.rs_userMonthlySpending.data[1] - $root.rs_userMonthlySpending.data[0] | currency: '' }}
                </strong>
            <small>
        </h5>

        <div class="text-center">
            {!! trans('messages.lbl_from') !!}
            @{{ $root.rs_userMonthlySpending.data[1] | currency: '' }}
        </div>

    </div>

    <canvas
            class="chart chart-doughnut"
            chart-data="$root.rs_userMonthlySpending.data"
            chart-labels="$root.rs_userMonthlySpending.labels"
            chart-colours="$root.rs_userMonthlySpending.colours"
            chart-options="$root.rs_userMonthlySpending.option">

            </canvas>
</div>