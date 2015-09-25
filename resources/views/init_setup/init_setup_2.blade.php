@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center" ng-controller="thisController">


        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">When is your birthday?</h4>

            <div class="lead">
                <select id="birthDay">
                    <option ng-repeat="day in days">@{{ day }}</option>
                </select>


                <select id="birthMonth">
                    <option ng-repeat="month in months">@{{ month }}</option>
                </select>

                <?php
                echo '<select name="birthYear" id="birthYear">';
                $cur_year = date('Y');
                for($year = ($cur_year-800); $year <= ($cur_year); $year++) {
                    if ($year == $cur_year) {
                        echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                    } else {
                        echo '<option value="'.$year.'">'.$year.'</option>';
                    }
                }
                echo '<select>';

                ?>
            </div>
        </div>

        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Gender?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <label class="btn btn-circle active radioGender" id="gender_female" style="width:100px;height: 100px" >
                <input type="radio" name="gender"  autocomplete="off" checked value="female">
                    <img src="/img/girl.gif" style="padding-top: 6px" width="35px">
                </label>

                <label class="btn btn-circle radioGender" id="gender_male" style="width:100px;height: 100px" >
                <input type="radio" name="gender" autocomplete="off" value="male">
                    <img src="/img/boy.gif" style="padding-top: 6px" width="35px">
                </label>
            </div>
        </div>


        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Status?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <label class="btn btn-circle active" style="width:100px;height: 100px" >
                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                    <img src="/img/boy.gif" style="padding-top: 12px" width="30px">
                </label>

                <label class="btn btn-circle" style="width:100px;height: 100px" >
                <input type="radio" name="options" id="option2" autocomplete="off">
                    <img src="/img/couple_80.gif" style="padding-top: 12px" width="50px">
                </label>
            </div>
        </div>

        <ul class="pager">
            <li><a href="/init_setup_1">Previous</a></li>
            <li><a href="/init_setup_3">Next</a></li>
        </ul>

        <div style="max-width: 200px">

            <ul class="dotstyle dotstyle-scaleup" align="center">
                <li><a href="/init_setup_1">User</a></li>
                <li class="current"><a href="/init_setup_2">Status</a></li>
                <li><a href="/init_setup_3">Finance</a></li>
                <li><a href="/init_setup_4">Saving</a></li>
            </ul>

        </div>
    </div> <!-- /container -->

    <script>
        var app = angular.module('App',[]);

        app.controller('thisController', function($scope, $http) {
            $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
            $scope.months   = ["Jan",'Feb','Mar','Apr','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
        });

        $('#birthYear').change(function() {
            localStorage.setItem('birthYear', $('#birthYear').val());
            listLocalStorage();
        });

        $('#birthMonth').change(function() {
            localStorage.setItem('birthMonth', $('#birthMonth').val());
            listLocalStorage();
        });

        $('#birthDay').change(function() {
            localStorage.setItem('birthDay', $('#birthDay').val());
            listLocalStorage();
        });





        $('#gender_female').click(function() {
            localStorage.setItem('gender', 'female');
            listLocalStorage();
        });

        $('#gender_male').click(function() {
            localStorage.setItem('gender', 'male');
            listLocalStorage();
        });


    </script>

    <style>
    .btn-circle:hover
    {
        /*border-bottom: 2px solid #ccc;*/
    }
    .btn-circle:active, .btn-circle.active
    {
        background-image: url('/img/circle.gif');
        background-size: cover;
        /*border-bottom: 2px solid #ccc;*/

    }
    input[type=range][orient=vertical]
    {
        writing-mode: bt-lr; /* IE */
        -webkit-appearance: slider-vertical; /* WebKit */
        width: 8px;
        height: 175px;
        padding: 0 5px;
    }
    </style>
@stop