@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container">

        <div ng-include="'/app/account/tpl_spendable.html'"></div>


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