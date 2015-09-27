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
                    <option selected>Day</option>
                    <option ng-repeat="day in days">@{{ day }}</option>
                </select>


                <select id="birthMonth">
                    <option selected>Month</option>
                    <option ng-repeat="m in months" value="@{{ m.id }}">@{{ m.month }}</option>
                </select>

                <?php
                echo '<select name="birthYear" id="birthYear">';
                echo "<option selected>Year</option>";
                $cur_year = date('Y');
                for($year = ($cur_year-80); $year <= ($cur_year); $year++) {
                        echo '<option value="'.$year.'">'.$year.'</option>';
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

                <label class="btn btn-circle active" id="status_single" style="width:100px;height: 100px" >
                <input type="radio" name="options" autocomplete="off" checked>
                    <img src="/img/boy.gif" style="padding-top: 12px" width="30px">
                </label>

                <label class="btn btn-circle" id="status_married" style="width:100px;height: 100px" >
                <input type="radio" name="options"autocomplete="off">
                    <img src="/img/couple_80.gif" style="padding-top: 12px" width="50px">
                </label>
            </div>
        </div>

        <ul class="pager">
            <li><a href="/init_setup_1">Previous</a></li>
            <li><a href="#" ng-click="addData()">Next</a></li>
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

        var gender_flg='';
        var user_status='';

        $('#gender_female').click(function() {
            gender_flg = 'female';
        });

        $('#gender_male').click(function() {
            gender_flg = 'male';
        });

        $('#status_single').click(function() {
            user_status = 0;
        });

        $('#status_married').click(function() {
            user_status = 1;
        });

        var app = angular.module('App',[]);

        app.controller('thisController', function($scope, $http) {
            $scope.days     = [1,	2,	3,	4,	5,	6,	7,	8,	9,	10,	11,	12,	13,	14,	15,	16,	17,	18,	19,	20,	21,	22,	23,	24,	25,	26,	27,	28,	29,	30,	31];
            $scope.months   = [{id: 1, month: "Jan"}, {id: 2,month: 'Feb'},{id: 3,month: 'Mar'},{id: 4,month: 'Apr'},{id: 5,month: 'May'}, {id: 6,month: 'Jun'},{id: 7,month: 'Jul'},{id: 8,month: 'Aug'},
                               {id: 9,month: 'Sept'},{id: 10,month: 'Oct'},{id: 11,month: 'Nov'},{id: 12,month: 'Dec'}];

            $scope.addData = function() {

                var bdate = $('#birthYear').val()+"-"+$('#birthMonth').val()+"-"+$('#birthDay').val();

                $.ajax({
                        method: "POST",
                        url: "/ajax/userStatus",
                        data:  {    bdate:  bdate,
                                    gender: gender_flg,
                                    status: user_status
                               }
                        })
                        .done(function( msg ) {
                            window.location.href = '/init_setup_3';
                        });
            };
        });

    </script>

@stop