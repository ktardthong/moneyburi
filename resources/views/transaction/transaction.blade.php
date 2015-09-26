@extends('master')

@section('title')
    {{ $page_title }}
@stop

@section('description')
    {{$page_descs}}
@stop


@section('content')

    <form class="transaction" method="post" action="/add_transaction">
        {!! csrf_field() !!}

        <div class="btn-group btn-block" data-toggle="buttons">
            <label class="btn btn-info active">
            <input type="radio" name="options" id="option1" autocomplete="off" checked> Cash
            </label>
            <label class="btn btn-info">
            <input type="radio" name="options" id="option2" autocomplete="off"> Credit Card
            </label>
        </div>

        <div class="btn-group btn-block" data-toggle="buttons">
            <label class="btn btn-info active">
              <input type="radio" name="options" id="option1" autocomplete="off" checked> Expense
            </label>
            <label class="btn btn-info">
              <input type="radio" name="options" id="option2" autocomplete="off"> Income
            </label>
        </div>

        <p>
            <input type="date" class="input input-md form-control" value>
        </p>

        <p>
            <input type="number" placeholder="Amount" class="input input-md form-control">
        </p>

        <p>
            <input type="text" placeholder="Location" class="input input-md form-control">
        </p>

        <p>
            <input type="text" placeholder="note" class="input input-md form-control">
        </p>

        <button type="button" class="btn btn-default btn-sm pull-left" id="backAddTransaction"><i class="fa fa-arrow-left fa"></i> back</button>
        <button type="submit" class="btn btn-info btn-sm pull-right">+ Add</button>

    </form>

@stop