@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
     <div class="container" align="center">

        <img src="/img/setup_1.png" class="img-responsive" width="400px">

        <nav>
          <ul class="pager">
            <li><a href="/init_setup_1">Next</a></li>
          </ul>
        </nav>

     </div> <!-- /container -->

@stop