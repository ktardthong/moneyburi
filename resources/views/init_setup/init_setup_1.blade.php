@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center" ng-controller="thisController">

        <form action="/init_setup_2" method="post">
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Hello, what is your name?</h4>

            <div class="lead">
                <input id="init_firstname" name="firstname" type="text" class="borderless fetchData" style="text-align: center" placeholder="First name" required>
                <br>
                <input id="init_lastname"  name="lastname" type="text" class="borderless fetchData" style="text-align: center" placeholder="Last name" required>
            </div>
        </div>

        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">What do you do?</h4>

            <div class="lead">
            <div class="btn-group">
                <button type="button"
                        class="btn btn-secondary dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Select</button>

                <div class="dropdown-menu">
                  <a class="dropdown-item"
                     href="#"
                     ng-repeat="x in items" value="@{{ x.id }}">@{{ x.name}}</a>
                </div>

              </div>
            </div>
        </div>

        <ul class="pager">
            <li><a href="/init_setup">Previous</a></li>
            <li><a href="/init_setup_2">Next</a></li>
        </ul>

        <div style="max-width: 200px">

            <ul class="dotstyle dotstyle-scaleup" align="center">
                <li class="current"><a href="/init_setup_1">User</a></li>
                <li><a href="/init_setup_2">Status</a></li>
                <li><a href="/init_setup_3">Finance</a></li>
                <li><a href="/init_setup_4">Saving</a></li>
            </ul>

        </div>


        </form>

    </div> <!-- /container -->

    <script>
        $(function(){

            $(".dropdown-menu a").click(function(){
              var selText = $(this).text();
              $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
            });

//            $("#btnSearch").click(function(){
//                alert($('.btn-select').text()+", "+$('.btn-select2').text());
//            });

        });

        var app = angular.module('App', []);
        app.controller('thisController', function($scope, $http) {
            $http.get("/ajax/geUserJobs")
            .success(function(response) {
                $scope.items = response;
            });
        });

        $('#init_firstname').val(localStorage.getItem('firstname'));
        $('#init_lastname').val(localStorage.getItem('lastname'));
    </script>
@stop