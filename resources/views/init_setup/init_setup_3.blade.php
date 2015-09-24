@extends('...master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')
    <div class="container" align="center">


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

        {{-- Income --}}
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Income per month</h4>

            <div class="lead">
                <input name="mthly_income" type="number" class="borderless fetchData" style="text-align: center" placeholder="Amount">
            </div>
        </div>

        {{-- Expense --}}
        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Bill</h4>

            <div class="lead">
                <input name="mthly_bill" type="number" class="borderless fetchData" style="text-align: center" placeholder="Amount">
            </div>
        </div>

        <nav>
          <ul class="pager">
            <li><a href="/init_setup_2">Previous</a></li>
            <li><a href="/init_setup_4">Next</a></li>
          </ul>
        </nav>
    </div> <!-- /container -->
@stop