{!! csrf_token() !!}
<div style="max-width: 400px;margin: auto;" ng-controller="billController">

     Card Blade

     <canvas id="doughnut" class="chart chart-doughnut"
       chart-data="data" chart-labels="labels">
     </canvas>

    <user-bill></user-bill>
    <bill-compact-list ng-init="showBilList=false" ng-show="showBilList"></bill-compact-list>
    <bill-list></bill-list>
</div>