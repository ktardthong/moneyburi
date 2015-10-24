<div class="" align="center" style="padding-bottom: 20px" ng-controller="billController as bill">

    <div class="text-muted pull-right">
        <small>
            <a ng-click="showBilList=true" href="#"> <i class="ion-ios-list-outline"></i> {!! trans('messages.lbl_billShow') !!} </a>
        </small>
        <small>
            <a ng-click="showBill=true" href="#"> <i class="ion-plus"></i> {!! trans('messages.lbl_billAdd') !!} </a>
        </small>
    </div>

    <h3 id="userBillUpdate">
        @{{rs_sumBills }}
    </h3>

    <div ng-init="showBill=false" ng-show="showBill" class="card card-block">
        <a ng-click="showBill=false" href="#" class="pull-right">
            <i class="ion-close-round"></i>
        </a>
        <h4 class="card-title strong">Bill</h4>


            <form ng-submit="bill.addBill()" class="lead">

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
</div>