@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    <div ng-include="'/app/html/init_setup/setup.html'"></div>

@stop