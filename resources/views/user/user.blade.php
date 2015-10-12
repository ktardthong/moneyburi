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
                    {{--<div class="page page-home" ng-include="templates[6].url" ngview ></div>--}}
                </div>

                <h4>Account</h4>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link" href="#profile" role="tab" data-toggle="tab">Profile</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#spendable" role="tab" data-toggle="tab">Spendable</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="profile" ng-include="'/profile/update_info'">profile</div>
                  <div role="tabpanel" class="tab-pane" id="spendable" ng-include="'/app/account/tpl_spendable.html'">profile</div>
                  <div role="tabpanel" class="tab-pane" id="messages">...</div>
                  <div role="tabpanel" class="tab-pane" id="settings">...</div>
                </div>
            </div>
        </div>

    </div>


@stop