@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    {{-- Main container--}}
    <div ng-controller="profileController"  ng-cloak  ng-app="App">

        <div class="container-fluid" style="background: #F1f1f1">

            {{-- On page Load show Money Quote --}}
            <div ng-show="isRouteLoading"
                 style="position: absolute; width:70%;
                            top:100px;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            vertical-align: middle;
                            margin: auto;">
                <div class="loading-indicator">
                    <div class='loading-indicator-body' align="center">
                        <h3 class='loading-title'>Loading...</h3>
                        {!! $quote['quote'] !!} - {!! $quote['author'] !!}
                        <route-loading-indicator></route-loading-indicator>
                    </div>
                </div>

            </div>

            <div class="row" ng-controller="transactionController">
                <div class="page page-right" ng-view></div>
            </div>

            <?php if(\Auth::user()): ?>
            <div class="col-xs-12">

                <nav mfb-menu position="br"
                     effect="slidein"
                     active-icon="ion-close-round"
                     resting-icon="ion-navicon"
                     toggling-method="click">

                  <a   mfb-button
                        mfb-button-close
                            ng-repeat="mfb in float_buttons"
                            ng-click="loc(mfb.url)"
                            icon="@{{mfb.icon}}" label="@{{ mfb.label }}"></a>
                </nav>

            </div>
            <?php endif; ?>

            <div align="center" class="text-muted">
                <small>
                    {{ $location->cityName }}, {{ $location->countryCode  }} - From your Internet address
                </small>
            </div>

        </div>
    </div>
@stop