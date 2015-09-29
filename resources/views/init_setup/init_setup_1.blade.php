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

            <h4 class="card-title strong">Hello, what is your name?</h4>

            <div class="lead">
                <input  id="init_firstname" name="firstname" type="text"
                        value="@{{ userData.firstname }}"
                        class="borderless" style="text-align: center" placeholder="First name" required autofocus   >
                <br>
                <input id="init_lastname"  name="lastname" type="text"
                       value="@{{ userData.lastname }}"
                       class="borderless " style="text-align: center" placeholder="Last name" required>
            </div>
        </div>

        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">What do you do?</h4>

            <div class="lead">

                <select id="jobtype">
                    <option ng-repeat="x in items" value="@{{ x.id }}">@{{ x.name}}</option>
                </select>

            </div>
        </div>

        <ul class="pager">
            <li><a href="/init_setup">Previous</a></li>
            <li><a href="#" ng-click="userAddData()">Next</a></li>
        </ul>

        <div style="max-width: 200px">

            <ul class="dotstyle dotstyle-scaleup" align="center">
                <li class="current"><a href="/init_setup_1">User</a></li>
                <li><a href="/init_setup_2">Status</a></li>
                <li><a href="/init_setup_3">Finance</a></li>
                <li><a href="/init_setup_4">Saving</a></li>
            </ul>

        </div>

    </div> <!-- /container -->

@stop