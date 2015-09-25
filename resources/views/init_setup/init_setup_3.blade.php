@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center">

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
        <div class="card card-block" style="max-width: 400px" id="addCreditCard" ng-controller="AddCardController as CardList">

            <h4 class="card-title strong">Which card?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <form ng-submit="CardList.addCard()" class="lead">
                    <div class="lead" >
                        <ul class="nav nav-pills nav-stacked">
                            <li class="nav-item clearfix">
                            Issuer
                            <select ng-model="CardList.issuer">
                                <option>BBL</option>
                                <option>KBANK</option>
                                <option>SCB</option>
                            </select>
                            <p>
                            Type
                            <select ng-model="CardList.cardtype">
                                <option>Visa</option>
                                <option>Master Card</option>
                                <option>Amex</option>
                            </select>
                            </p>

                            <p>
                            Credit Limit
                            <input type="text" class="input-lg" placeholder="Credit limit" ng-model="CardList.cardLimit">
                            </p>

                            <input type="text" class="input-lg" placeholder="Note for this card" ng-model="CardList.cardNote">

                            <input class="btn btn-primary btn-sm" type="submit" value="+">

                            </li>
                        </ul>
                    </div>
                </form>

                <ul class="unstyled">
                    <li ng-repeat="card in CardList.cardItem">
                        <span class="">@{{card.text}}</span>
                        test
                    </li>
                </ul>

            </div>

        </div>


        {{-- Income --}}
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Income per month</h4>

            <div class="lead">
                <input name="mthly_income" type="number" class="borderless fetchData" style="text-align: center" placeholder="Amount">
            </div>

        </div>

        {{-- Expense --}}
        <div class="card card-block" style="max-width: 400px" ng-controller="AddBillController as BillList">

            <h4 class="card-title strong">Bill</h4>

            <p ng-model="ttlBill" ng-model="""></p>

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


        <ul class="pager">
            <li><a href="/init_setup_2">Previous</a></li>
            <li><a href="/init_setup_4">Previous</a></li>
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



    var app = angular.module('App', []);

        app.controller('thisController', function($scope, $http) {

        });

      app.controller('AddCardController', function() {
        var cardList = this;

        cardList.addCard = function() {

            console.log("test click add card");

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
//        localStorage["names"] = JSON.stringify(names);

      });
      listLocalStorage();
    </script>
@stop