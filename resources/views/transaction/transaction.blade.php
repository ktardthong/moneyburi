@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    <div class="container" ng-controller="transaction">
        <form class="transaction" method="post" action="/add_transaction" >
            {!! csrf_field() !!}

            <div class="btn-group btn-block" data-toggle="buttons">
                <label class="btn btn-info active">
                <input type="radio" name="pmt_type" value="1" id="cash" autocomplete="off" checked> Cash
                </label>
                <label class="btn btn-info">
                <input type="radio" name="pmt_type" value="2" id="credit" autocomplete="off"> Credit Card
                </label>
            </div>

            <div class="btn-group btn-block" data-toggle="buttons">
                <label class="btn btn-info active">
                  <input type="radio" name="trans_type" value="1" id="expense" autocomplete="off" checked> Expense
                </label>
                <label class="btn btn-info">
                  <input type="radio" name="trans_type" value="2" id="income" autocomplete="off"> Income
                </label>
            </div>

            <p>
                <input type="date" name="trans_date" class="input input-md form-control" value>
            </p>

            <p>
                <select id="cate" name="cate_id" type="button" class="btn btn-secondary btn-block dropdown-toggle"
                        style="line-height: 38px; height: 38px;">
                    <option >Select Category</option>
                    <option ng-repeat="c in cateCore" value="@{{ c.id }}">@{{ c.name}}</option>
                </select>
            </p>

            <p>
                <select id="repeat" name="trans_repeat" type="button" class="btn btn-secondary btn-block dropdown-toggle"
                        style="line-height: 38px; height: 38px;">
                    <option >How Frequent</option>
                    <option ng-repeat="t in transRepeat" value="@{{ t.id }}">@{{ t.name}}</option>
                </select>
            </p>

            <p>
                <input type="number" name="amount" placeholder="Amount" class="input input-md form-control">
            </p>

            <p>
                <input type="text" name="location" placeholder="Location" class="input input-md form-control">
            </p>

            <p>
                <input type="text" name="note" placeholder="Note" class="input input-md form-control">
            </p>

            <button type="button" class="btn btn-default btn-sm pull-left" id="backAddTransaction"><i class="fa fa-arrow-left fa"></i> back</button>
            <button type="submit" class="btn btn-info btn-sm pull-right">+ Add</button>

        </form>
    </div>


    <script>
        $(function(){

            $(".dropdown-menu a").click(function(){
                var selText = $(this).text();
                $(this).parents('.btn').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
            });


        });

        var app = angular.module('App', []);
        app.controller('transaction', function($scope, $http) {
            $http.get("/ajax/billCate")
                    .success(function(response) {
                        $scope.cateCore = response;
                    });

            $http.get("/ajax/transRepeat")
                    .success(function(response) {
                        $scope.transRepeat = response;
                    });
        });

//        $('#init_firstname').val(localStorage.getItem('firstname'));
//        $('#init_lastname').val(localStorage.getItem('lastname'));

    </script>

@stop