@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    {{-- Main container--}}
    <div ng-controller="profileController">

        <div class="col-xs-12 col-sm-12">

            <div class="row">
                <div class="page page-right" ng-view></div>
            </div>

            <div class="col-xs-12">

                <nav mfb-menu position="br"
                     effect="slidein"
                     active-icon="ion-close-round"
                     resting-icon="ion-navicon"
                     toggling-method="click">

                  <a   mfb-button
                            ng-repeat="mfb in float_buttons"
                            ng-click="loc(mfb.url)"
                            icon="@{{mfb.icon}}" label="@{{ mfb.label }}"></a>
                </nav>


            </div>




        <div align="center" class="text-muted">
            <small>
                {{ $location->cityName }}, {{ $location->countryCode  }} - From your Internet address
            </small>
        </div>

    </div>
@stop