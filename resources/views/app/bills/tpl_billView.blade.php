<div ng-controller="billController">

    <a ng-click="showBill=false" href="#" class="pull-right">
        <i class="ion-close-round"></i>
    </a>

    <h4 class="card-title strong">Bill</h4>


        <form ng-submit="addBill()" class="lead">

            <md-input-container flex>
                <md-select ng-model="ng_billCate" id="billCate">
                    <md-option ng-repeat="category in billCate" value="@{{category.id}}">@{{category.name}}</md-option>
                </md-select>
            </md-input-container>


            <input placeholder="Amount" class="input input-lg borderless text-center"
                   ng-model="ng_billAmount"
                   id="billAmount" autocomplete="off" ng-keyup="checkVal()">

            <label>Due on </label>
            <select  ng-model="ng_billDue" id="billDue">
                <option ng-repeat="day in days" value="@{{day}}">@{{day}}</option>
            </select>
            <label> of the month</label>

            <input class="btn btn-primary btn-block" type="submit" value="Add"
                    ng-show="displayAddNewBill">
        </form>

</div>