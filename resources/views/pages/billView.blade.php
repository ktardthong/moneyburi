<div class="card card-block" ng-controller="BillController as BillList">

     <div class="" align="center" style="padding-bottom: 20px">

        <h4 class="card-title strong">Bill</h4>

        <p ng-model="ttlBill" ng-model=""></p>

        <form ng-submit="BillList.addBill()" class="lead">

            <md-input-container flex>
            <md-select ng-model="BillList.billCate" id="billCate">
                <md-option ng-repeat="category in BillList.categories" value="{{category.id}}">{{category.name}}</md-option>
            </md-select>
            </md-input-container>


            <input placeholder="Amount" class="input input-lg borderless text-center"
                  ng-model="BillList.billText" id="billAmount">

            <label>Due on </label>
            <select  ng-controller="thisController" ng-mode="billDue" id="billDue">
                <option ng-repeat="day in days" value="{{day}}">{{day}}</option>
            </select>
            <label> of the month</label>

            <input class="btn btn-primary btn-block" type="submit" value="Add">

        </form>

    </div>


    <h4>Total Bill {{ BillList.sumBills }}</h4>
    <bill-list></bill-list>


</div>