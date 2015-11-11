<div  data-toggle="buttons" ng-controller="CardController">

    <div class="card card-block lead">
        <div class="lead" >
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item clearfix">
                    <md-input-container style="margin-right: 10px;" flex>
                        <label>Size</label>
                        <md-select ng-model="ng_ccIssuer">
                            <md-option ng-repeat="ccIssuer in ccIssuer" value="{{ ccIssuer.id }}">{{ ccIssuer.name }}</md-option>
                        </md-select>
                    </md-input-container>

                    <!--Issuer
                    <select ng-model="ng_ccIssuer">
                        <option ng-selected="ccIssuer.selected== BBL"
                                ng-repeat="ccIssuer in ccIssuer" value="{{ ccIssuer.id }}">{{ ccIssuer.name }}</option>
                    </select>-->
                    <p>
                        Type
                        <select ng-model="ng_ccTypes">
                            <option ng-selected="ccIssuer.selected== BBL"
                                    ng-repeat="ccType in ccTypes" value="{{ ccType.id }}">{{ ccType.name }}</option>
                        </select>
                    </p>

                    <p>
                        <input type="text" class="input-lg form-control" placeholder="Credit limit" ng-model="ng_cardLimit">
                    </p>

                    <input type="text" class="input-lg form-control" placeholder="Note for this card" ng-model="ng_cardNote">

                    <label>Due on </label>
                    <select  ng-controller="thisController" ng-mode="billDue" id="billDue">
                        <option ng-repeat="day in days" value="{{day}}">{{day}}</option>
                    </select>
                    <label> of the month</label>

                    <div class="row">
                        Last four digit
                        <input ng-model="" class="borderless">
                    </div>

                    <div class="row">
                        <label>Expiration</label>
                        Day
                        <input ng-model="expMonth" placeholder="Month" id="expMth">
                        Year
                        <input ng-model="expYear" placeholder="Year" id="expYear">
                    </div>

                    <p>
                        <input class="btn btn-primary btn-block" type="submit" value="Add card" ng-click="addCard()" >
                    </p>

                </li>
            </ul>
        </div>
    </div>



    <div ng-repeat="card in cardItem" class="card card-block">

        <span class="pull-right">{{card.issuer}}</span>
        <span class="">{{card.type}}</span>
        <span class="">{{card.cclimit}}</span>
        <span class="">{{card.ccnote}}</span>

    </div>

    <h4>Card list</h4>
    <div>
        <card-list></card-list>
    </div>

</div>

