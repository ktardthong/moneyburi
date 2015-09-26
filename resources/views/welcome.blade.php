@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center">
        <img src="/img/home_screen.gif" style="max-width: 400px;">
    </div>
@stop