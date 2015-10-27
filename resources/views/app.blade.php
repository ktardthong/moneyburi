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

            {{-- On page Load show Money Quote --}}
            <div ng-show='isRouteLoading' class='loading-indicator'>
                <div class='loading-indicator-body' align="center">
                    <h3 class='loading-title'>Loading...</h3>
                    {!! $quote['quote'] !!} - {!! $quote['author'] !!}
                    <route-loading-indicator></route-loading-indicator>
                </div>
            </div>

            <div class="row">
                <div class="page page-right" ng-view>

                </div>
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
@stop