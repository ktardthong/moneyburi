@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')


    <div>

        <div class="col-xs-12 col-sm-12">

            <div class="row" ng-controller="profileController">

                <h4>{!! trans('messages.lbl_account') !!}</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" href="#profile" role="tab" data-toggle="tab">{!! trans('messages.lbl_profile') !!}</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#spendable" role="tab" data-toggle="tab">{!! trans('messages.lbl_spendableSetting') !!}</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="profile" ng-include="'/profile/update_info'">profile</div>
                  <div role="tabpanel" class="tab-pane" id="spendable" ng-include="'/profile/spendable'">profile</div>
                </div>
            </div>
        </div>

    </div>


@stop