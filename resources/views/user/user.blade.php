@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    {{--<div ng-include="/app/html/card_userEdit.html"></div>--}}

    <div ng-controller="profileController">

        <div class="col-xs-12 col-sm-12">

            <div class="row">
                <div class="row">
                    <div class="page page-home" ng-include="templates[6].url" ngview ></div>
                </div>
            </div>

        </div>

    </div>


@stop