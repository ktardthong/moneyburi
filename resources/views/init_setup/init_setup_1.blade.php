@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center">

        <form action="/init_setup_2" method="post">
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Hello, what is your name?</h4>

            <div class="lead">
                <input id="init_firstname" name="firstname" type="text" class="borderless fetchData" style="text-align: center" placeholder="First name" required>
                <br>
                <input id="init_lastname"  name="lastname" type="text" class="borderless fetchData" style="text-align: center" placeholder="Last name" required>
            </div>
        </div>

        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">What do you do?</h4>

            <div class="lead">
                <select class="form-conrol input-lg">
                    <option>Student</option>
                    <option>Office worker</option>
                    <option>Freelance</option>
                </select>
            </div>
        </div>

        <nav>
          <ul class="pager">
            <li><a href="/init_setup">Previous</a></li>
            <li><a href="/init_setup_2">Next</a></li>
          </ul>
        </nav>
        </form>

    </div> <!-- /container -->

    <script>
       $('#init_firstname').val(localStorage.getItem('firstname'));
       $('#init_lastname').val(localStorage.getItem('lastname'));
    </script>
@stop