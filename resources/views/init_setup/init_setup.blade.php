@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    {{-- On page Load show Money Quote --}}
    <div ng-show='isRouteLoading' class='loading-indicator'>
        <div class='loading-indicator-body' align="center">
            <h3 class='loading-title'>Loading...</h3>
            {!! $quote['quote'] !!} - {!! $quote['author'] !!}
            <route-loading-indicator></route-loading-indicator>
        </div>
    </div>

    <div ng-controller="profileController">
     <div ng-show="isLoaded">

        {{-- Cover --}}
        <div ng-init="$root.init_step_1 = true" ng-show="$root.init_step_1" align="center">

            <h3>{!! trans('messages.lbl_welcome') !!}! - {!! trans('messages.lbl_step') !!} 1/3</h3>
            <img src="/img/setup_1.png" class="img-responsive" width="400px">

            <ul class="pager">
                <li><a  ng-click="$root.init_step_1 = false;
                                 $root.init_step_2 = true"
                        style="cursor: pointer">{!! trans('messages.lbl_next') !!}</a></li>
            </ul>
        </div>


        {{-- User Spendable --}}
        <div ng-init="$root.init_step_2 = false" ng-show="$root.init_step_2">

            <h3 align="center">{!! trans('messages.lbl_yourFinance') !!} - {!! trans('messages.lbl_step') !!} 2/3</h3>
            <div ng-include="'/profile/spendable'"></div>

        </div>


        {{-- Jobs and other info --}}
        <div ng-init="$root.init_step_3 = false" ng-show="$root.init_step_3" align="center">

            <h3>{!! trans('messages.lbl_yourInfo') !!} - {!! trans('messages.lbl_step') !!} 3/3</h3>

            <div class="card card-block card_width">
                <h5>what do you do?</h5>
                <md-select ng-model="userJobType" id="jobtype" aria-required="true" aria-invalid="true"
                            aria-label="Last Name">

                    <md-option  ng-repeat="(index,item) in userJobs"
                                ng-selected="(@{{item.id}} == @{{ userData.job }}) ? true:false"
                                value="@{{item.id}}">@{{item.name}}</md-option>
                </md-select>
                <button
                        class="btn btn-primary btn-block"
                        ng-click="initUpdate()">{!! trans('messages.lbl_save') !!}</button>
            </div>

            <ul class="pager">
                <li><a  ng-click="$root.init_step_2 = true;
                                 $root.init_step_3  = false"
                        style="cursor: pointer">{!! trans('messages.lbl_previous') !!}</a></li>
            </ul>
        </div>


      </div>
    </div>

@stop