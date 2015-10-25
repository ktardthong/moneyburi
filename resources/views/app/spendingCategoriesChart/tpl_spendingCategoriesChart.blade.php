<!--<div class="pull-right">-->
    <!--<div class="btn-group" data-toggle="buttons">-->
        <!--<label class="btn btn-primary-outline active" ng-click="showSpendableWeek()">-->
            <!--<input type="radio" name="options" id="option1" autocomplete="off" checked> Week-->
        <!--</label>-->
        <!--<label class="btn btn-primary-outline" ng-click="showSpendableMonth()">-->
            <!--<input type="radio" name="options" id="option2" autocomplete="off"> Month-->
        <!--</label>-->
    <!--</div>-->
<!--</div>-->

<chart-js id="horizontalBar"
          width="@{{chart.width}}"
          height="@{{chart.height}}"
          title="@{{chart.title}}"
          type="@{{chart.type}}"
          data="@{{chart.data}}"
          options="@{{c_options}}"
          ng-model="chart.data">
</chart-js>