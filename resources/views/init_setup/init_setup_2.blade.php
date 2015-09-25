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

            <h4 class="card-title strong">When is your birthday?</h4>

            <div class="lead">
                <select>
                    <?php
                    for($day=1;$day<=31;$day++):?>
                        <option><?=$day?></option>
                    <?php
                    endfor;
                    ?>
                </select>
                <?php
                echo '<select name="birthYear" id="birthYear">';
                $cur_year = date('Y');
                for($year = ($cur_year-800); $year <= ($cur_year); $year++) {
                    if ($year == $cur_year) {
                        echo '<option value="'.$year.'" selected="selected">'.$year.'</option>';
                    } else {
                        echo '<option value="'.$year.'">'.$year.'</option>';
                    }
                }
                echo '<select>';

                ?>
            </div>
        </div>

        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Gender?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <label class="btn btn-circle active radioGender" id="gender_female" style="width:100px;height: 100px" >
                <input type="radio" name="gender"  autocomplete="off" checked value="female">
                    <img src="/img/girl.gif" style="padding-top: 6px" width="35px">
                </label>

                <label class="btn btn-circle radioGender" id="gender_male" style="width:100px;height: 100px" >
                <input type="radio" name="gender" autocomplete="off" value="male">
                    <img src="/img/boy.gif" style="padding-top: 6px" width="35px">
                </label>
            </div>
        </div>


        <div class="card card-block" style="max-width: 400px">

            <h4 class="card-title strong">Status?</h4>

            <div class="btn-group lead" data-toggle="buttons">

                <label class="btn btn-circle active" style="width:100px;height: 100px" >
                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                    Single
                </label>

                <label class="btn btn-circle" style="width:100px;height: 100px" >
                <input type="radio" name="options" id="option2" autocomplete="off">
                    Married
                </label>
            </div>
        </div>

        <nav>
          <ul class="pager">
            <li><a href="/init_setup_1">Previous</a></li>
            <li><a href="/init_setup_3">Next</a></li>
          </ul>
        </nav>
    </div> <!-- /container -->

    <script>
        $('#birthYear').change(function() {
            localStorage.setItem('birthYear', $('#birthYear').val());
            listLocalStorage();
        });

        $('#gender_female').click(function() {
            localStorage.setItem('gender', 'female');
            listLocalStorage();
        });

        $('#gender_male').click(function() {
            localStorage.setItem('gender', 'male');
            listLocalStorage();
        });


        $('input:radio[name=gender]').change(function() {
            var val = $('input:radio[name=theme]:checked').val();
            alert("test");
        });

    </script>

    <style>
    .btn-circle:hover
    {
        /*border-bottom: 2px solid #ccc;*/
    }
    .btn-circle:active, .btn-circle.active
    {
        background-image: url('/img/circle.gif');
        background-size: cover;
        /*border-bottom: 2px solid #ccc;*/

    }
    input[type=range][orient=vertical]
    {
        writing-mode: bt-lr; /* IE */
        -webkit-appearance: slider-vertical; /* WebKit */
        width: 8px;
        height: 175px;
        padding: 0 5px;
    }
    </style>
@stop