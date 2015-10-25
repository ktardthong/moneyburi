<div style="max-width: 400px;margin: auto;">

     <div ng-controller="billController">
     <canvas id="doughnut" class="chart chart-doughnut"
            chart-data="data"
            chart-labels="labels">
     </canvas>
     </div>

    <user-bill></user-bill>
    <bill-compact-list ng-init="showBilList=false" ng-show="showBilList"></bill-compact-list>
    {{--<bill-list></bill-list>--}}
</div>