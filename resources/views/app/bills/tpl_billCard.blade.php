<div style="max-width: 400px;margin: auto;" ng-controller="billController">

     <div>
          <canvas id="doughnut" class="chart chart-doughnut"
                     chart-data="data"
                     chart-labels="labels">
          </canvas>
          @{{rs_sumBills }}
     </div>

     <div align="center" style="margin: 0 0 10px 0;">
         <div class="btn-group" data-toggle="buttons">
             <label class="btn btn-primary-outline active" ng-click="billStatus()">
                 <input type="radio" name="options" id="option1" autocomplete="off" checked> All Bills
             </label>
             <label class="btn btn-primary-outline" ng-click="billStatus(1)">
                 <input type="radio" name="options" id="option2" autocomplete="off"> Paid
             </label>
             <label class="btn btn-primary-outline" ng-click="billStatus(0)">
                  <input type="radio" name="options" id="option3" autocomplete="off"> UnPaid
              </label>
         </div>
     </div>

    <div class="card card-block">
        <bill-list ng-init="allBill=true" ng-show="allBill"></bill-list>
    </div>

</div>