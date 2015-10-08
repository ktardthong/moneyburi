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
                <div class="row">
                    <div class="page page-home" ng-include="template.url" ngview ></div>
                </div>
            </div>

        </div>

        <div class="col-xs-12">




            <nav mfb-menu position="br"
                 effect="slidein"
                 label="Home"
                 active-icon="fa fa-times"
                 resting-icon="fa fa-plus"
                 toggling-method="click">

              <button   mfb-button
                        ng-repeat="mfb in float_buttons"
                        ng-click="nav(mfb.url)"
                        icon="@{{mfb.icon}}" label="@{{ mfb.label }}"></button>
            </nav>

        </div>




           {{-- <div class="col-sm-12">

                <div class="row">

                    <div class="col-xs-12 col-sm-3">
                        <div class="card card-block">
                            <h4 class="card-title">Notification / Coaching</h4>
                            <ul class="list-group container">
                                <div class="bottom_border">
                                    You have spent over 2000 in groceries, open mgiembership at BigD for 15% off next purchase
                                </div>
                                <div class="bottom_border">
                                    How was your lunch? Note your expense here
                                </div>
                            </ul>
                        </div>
                    </div>


                    --}}{{-- Spending Categories --}}{{--
                    <div class="col-xs-12 col-sm-3">
                        --}}{{--<div class="slide-animate" ng-include="'/app/html/card_spendingCate.html'"></div>--}}{{--
                    </div>

                </div>
            </div>--}}

    </div>
@stop