<div  ng-controller="CardController" style="max-width: 400px;margin: auto" >

    <div class="clearfix">
        <div class="pull-right"><button class="btn btn-link"  ng-click="addCardVisible=true"><i class="ion-plus"></i> Add </button></div>
        <h4 class="pull-left">Card list</h4>
    </div>

    <div class="card card-block lead" ng-show="addCardVisible" ng-show="false">

        <div class="row">
            <button class="btn btn-link pull-right" ng-click="addCardVisible=false">hide</button>
        </div>

        <div class="lead" >
            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item clearfix">
                    Issuer
                    <select ng-model="ng_ccIssuer">
                        <option ng-selected="ccIssuer.selected== BBL"
                                ng-repeat="ccIssuer in ccIssuer" value="@{{ ccIssuer.id }}">@{{ ccIssuer.name }}</option>
                    </select>
                    <p>
                        Type
                        <select ng-model="ng_ccTypes">
                            <option ng-selected="ccIssuer.selected== BBL" class="form-control"
                                    ng-repeat="ccType in ccTypes" value="@{{ ccType.id }}">@{{ ccType.name }}</option>
                        </select>
                    </p>

                    <p>
                        <input type="text" class="input-lg form-control borderless"
                               placeholder="Credit limit"
                               ng-model="ng_cardLimit">
                    </p>
                    <label>Due on </label>
                    <select  ng-controller="thisController" ng-mode="billDue" id="billDue">
                        <option ng-repeat="day in days" value="@{{day}}">@{{day}}</option>
                    </select>
                    <label> of the month</label>

                    <div class="row">
                        <input ng-model="lastFour" class="borderless" placeholder="Last four digit">
                    </div>

                    <div class="row">
                        <button class="btn btn-link pull-right" ng-click="cardMoreDetail=true; btnControl =true">show more</button>
                        <button class="btn btn-link pull-right" ng-show="btnControl" ng-show="false" ng-click="cardMoreDetail=false;btnControl=false">Hide</button>
                    </div>

                    <!-- More details-->
                    <div class="container-fluid"  ng-show="cardMoreDetail" ng-show="false">

                        <input type="text" class="input-lg form-control borderless" placeholder="Note for this card" ng-model="ng_cardNote">

                        <p>
                            <label>Expiration</label>
                            <input ng-model="expMonth" placeholder="Month" id="expMth" class="borderless">
                            <input ng-model="expYear" placeholder="Year" id="expYear" class="borderless">
                        </p>

                    </div>

                    <div style="margin-top: 8px">
                        <input class="btn btn-primary btn-block" type="submit" value="Add card" ng-click="addCard()" >
                    </div>

                </li>
            </ul>
        </div>
    </div>


    <div ng-if="!userCards.length" class="text-muted">You don't have card yet, why don't add one?
            <button class="btn btn-link"  ng-click="addCardVisible=true"><i class="ion-plus"></i> Add </button>
        </div>

        <div ng-if="userCards.length" class="text-muted card container-fluid">
            <card-list></card-list>
    </div>


</div>