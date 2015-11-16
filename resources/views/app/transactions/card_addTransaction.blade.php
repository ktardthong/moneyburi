<div class="container">
    <form class="transaction">

        <div class="btn-group btn-block" data-toggle="buttons" >
            <label class="btn btn-primary-outline" ng-repeat="p in pmtTypes"
                   ng-class="{'active':p.id == defaultPmtType}" ng-click="pmtSelected(p.id)" ng-init="selectedPmtType = defaultPmtType">
                <input type="radio" ng-model="selectedPmtType" ng-value="p.id">
                @{{p.name}}
            </label>
        </div>

        <div class="btn-group btn-block" data-toggle="buttons">
            <label class="btn btn-primary-outline" ng-repeat="t in transTypes track by t.id" id="trans_type"
                   ng-class="{'active':t.id == $parent.defaultTransType}" ng-click="transSelected(t.id)" ng-init="selectedTransType = defaultTransType">
                <input type="radio"ng-model="selectedTransType" ng-value="t.id">
                @{{t.name}}
            </label>
        </div>

        <p>
            <md-select ng-show="selectedPmtType==2" ng-model="selectedCC"  placeholder="Select Credit Card">
                <md-option ng-value="cc.id" ng-repeat="cc in creditCards">@{{cc.issuer_name}} @{{cc.type_name}} @{{cc.card_notes}}</md-option>
            </md-select>
        </p>

        <p>
            <md-select ng-show="selectedTransType==3" ng-model="selectedBill"  placeholder="Select Bill">
                <md-option ng-value="bill.id" ng-repeat="bill in bills">@{{bill.name}} @{{bill.amount}}</md-option>
            </md-select>
        </p>

        <p>
            <!--<input type="date" ng-model="trans_date" id="trans_date" class="input input-md form-control" value>-->
            <md-datepicker ng-model="trans_date"></md-datepicker>
        </p>

        <p>
            <md-select ng-model="cate_id" ng-init="cate_id=selectedCate" placeholder="Select Category" >
                <md-option ng-value="cate.id" ng-repeat="cate in cateCore">@{{cate.name}}</md-option>
            </md-select>
        </p>

        <!--<p>-->

            <!--<select id="trans_repeat" name=trans_repeat" class="btn btn-secondary btn-block dropdown-toggle" style="line-height: 38px; height: 38px;"-->
                    <!--ng-model="trans_repeat"  ng-options="repeat.name for repeat in transRepeat track by repeat.id">-->
                <!--<option value="">How Frequent</option>-->
            <!--</select>-->
        <!--</p>-->

        <p>
            <!--<input id="amount" type="number" step="any" pattern="^((\d+)|(\d{1,3})(\,\d{3}|)*)(\.\d{2}|)$" ng-model="amount" placeholder="Amount" class="input input-md form-control">-->
            <md-input-container md-no-float>
                <input ng-model="amount" type="number" step="0.01" placeholder="Amount">
            </md-input-container>
        </p>

        <p>
            <!--<input id="location" type="text" ng-model="location" placeholder="Location" class="input input-md form-control">-->
            <md-input-container md-no-float>
                <input ng-model="location" type="number" placeholder="Location">
            </md-input-container>
        </p>

        <p>
            <!--<input id="note" type="text" ng-model="note" placeholder="Note" class="input input-md form-control">-->
            <md-input-container md-no-float>
                <input ng-model="note" type="text" placeholder="Note">
            </md-input-container>
        </p>

        {{--<button type="button" class="btn btn-default btn-sm pull-left" ng-click="backAddTransaction()"><i class="fa fa-arrow-left fa"></i> back</button>--}}
        <button ng-click="doAdd()" class="btn btn-info btn-sm pull-right">+ Add</button>

    </form>
</div>
