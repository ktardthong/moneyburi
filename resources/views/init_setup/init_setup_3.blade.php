@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center"  ng-controller="AddCardController">

        {{-- Income --}}
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Income per month</h4>

            <div class="lead">
                <input  name="mthly_income" type="number" class="borderless fetchData" id="mthlyIncome"
                        style="text-align: center" placeholder="Amount">
            </div>

        </div>


        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Currency?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <select id="currencySelect" ng-model="ng_currency">
                    <option ng-repeat="currency in currencies" value="@{{ currency.id }}">@{{ currency.currency_code }}</option>>
                </select>

            </div>

        </div>

        {{-- Credit card --}}
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Credit card?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <label class="btn btn-circle active radioGender" id="creditCard_false" style="width:100px;height: 100px" >
                <input type="radio" name="gender"  autocomplete="off" checked value="female">
                    No
                </label>

                <label class="btn btn-circle radioGender" id="creditCard_true" style="width:100px;height: 100px" >
                <input type="radio" name="gender" autocomplete="off" value="male">
                    <img src="/img/cc.png" style="padding-top: 12px" width="50px">
                </label>
            </div>

        </div>


        {{-- Pick a card --}}
        <div class="card card-block" style="max-width: 400px" id="addCreditCard">

            <h4 class="card-title strong">Which card?</h4>

            <div class="btn-group lead" data-toggle="buttons">

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
                                <option ng-selected="ccIssuer.selected== BBL"
                                        ng-repeat="ccType in ccTypes" value="@{{ ccType.id }}">@{{ ccType.name }}</option>
                            </select>
                            </p>

                            <p>
                            <input type="text" class="input-lg form-control" placeholder="Credit limit" ng-model="ng_cardLimit">
                            </p>

                            <input type="text" class="input-lg form-control" placeholder="Note for this card" ng-model="ng_cardNote">

                            <p>
                            <input class="btn btn-primary btn-block" type="submit" value="Add card" ng-click="addCard()" >
                            </p>

                        </li>
                    </ul>
                </div>


                <div ng-repeat="card in cardItem" class="card card-block">

                    <span class="pull-right">@{{card.issuer}}</span>
                    <span class="">@{{card.type}}</span>
                    <span class="">@{{card.cclimit}}</span>
                    <span class="">@{{card.ccnote}}</span>

                </div>


            </div>

        </div>




        {{-- Expense --}}
        <div class="card card-block" style="max-width: 400px" ng-controller="AddBillController as BillList">

            <h4 class="card-title strong">Bill</h4>

            <p ng-model="ttlBill" ng-model="">ttl</p>

            <form ng-submit="BillList.addBill()" class="lead">

                <select data-native-menu="false" data-role="listview" ng-model="BillList.billCate">
                    <option ng-repeat="category in BillList.categories" value="@{{category.id}}">@{{category.name}}</option>
                </select>

                <input type="text" ng-model="BillList.billText"  class="borderless"
                       placeholder="Amount">

                <input class="btn btn-primary btn-sm" type="submit" value="+">

            </form>

            <ul class="unstyled">
                <li ng-repeat="bill in BillList.billItem">
                    <span class="">@{{bill.text}}</span>
                </li>
            </ul>

        </div>


        <ul class="pager" ng-controller="thisController">
            <li><a href="/init_setup_2">Previous</a></li>
            <li><a href="#" ng-click="addData()">Next</a></li>
        </ul>

        <div style="max-width: 200px">

            <ul class="dotstyle dotstyle-scaleup" align="center">
                <li><a href="/init_setup_1">User</a></li>
                <li><a href="/init_setup_2">Status</a></li>
                <li class="current"><a href="/init_setup_3">Finance</a></li>
                <li><a href="/init_setup_4">Saving</a></li>
            </ul>

        </div>


    </div> <!-- /container -->

    <script>

    $('#creditCard_true').click(function() {
        $('#addCreditCard').show('slow');
    });

    $('#creditCard_false').click(function() {
        $('#addCreditCard').hide('slow');
    });

    $('#addCreditCard').hide();


    var cardData = [];
    var mthly_income ='';

    var app = angular.module('App', []);

        app.controller('thisController', function($scope,$http) {

            $scope.addData = function() {

                if(cardData.length > 0)
                {
                    cardData = JSON.parse(cardData);
                }

                $.ajax({
                    method: "POST",
                    url:    "/ajax/userFinance",
                    data:   {
                                mthlyInc:   $('#mthlyIncome').val(),
                                currency:   $('#currencySelect').val(),
                                cards:      cardData
                            }
                    })
                    .done(function( msg ) {
                        window.location.href = '/init_setup_4';
                    });
            };

        });

        app.controller('AddCardController', function($scope,$http) {

            var cardList = this;
            $scope.cardItem = [];

            $http.get("/ajax/currency")
            .success(function(response) {
                $scope.currencies = response;
            });

            $http.get("/ajax/ccIssuer")
            .success(function(response) {
                $scope.ccIssuer = response;
            });

            $http.get("/ajax/ccTypes")
            .success(function(response) {
                $scope.ccTypes = response;
            });
            $scope.addCard = function() {
                $scope.cardItem.push({
                                        type:$scope.ng_ccTypes,
                                        issuer:$scope.ng_ccIssuer,
                                        cclimit:$scope.ng_cardLimit,
                                        ccnote: $scope.ng_cardNote
                                      });

                cardData = JSON.stringify($scope.cardItem);

            };

        });



      app.controller('AddBillController', function($scope, $http) {
        var billList = this;

        billList.billItem = [];
        billList.totalBill = 0;


        $http.get("/ajax/billCate")
        .success(function(response) {
            billList.categories = response;
        });

        billList.addBill = function() {

          billList.billItem.push({text:billList.billText + billList.billCate});
          billList.bilText= '';

          var billData = billList.billText + billList.billCate;
          localStorage["billData"] = JSON.stringify(billData);

          var storedNames = JSON.parse(localStorage["billData"]);
          console.log(storedNames);

          billList.totalBill = billList.totalBill + billList.billText;

          console.log(billList.totalBill)
        };

      });
      listLocalStorage();


    </script>
@stop