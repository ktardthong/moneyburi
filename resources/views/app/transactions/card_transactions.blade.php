<div style="margin: auto;" align="center" class="container row card_width">
    <div class="card card-block">
        <add-trans></add-trans>
    </div>

    <div class="card card-block">
        <trans-list></trans-list>
    </div>

    <div class="card card-block">
        <h4 class="card-title">Your Transactions Summary</h4>
        <div align="center" class="boderBtm">
            <div class="btn-group" data-toggle="buttons" align="">

                <label class="btn btn-primary active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Week
                </label>
                <label class="btn btn-primary">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Month
                </label>

            </div>
            <div class="pull-right">
                <a href="#"><i class="fa fa-plus fa-x"></i></a>
            </div>
        </div>

        <div class="row borderBtm">
            <h4 class="card-title strong" align="center">November 2015</h4>
            <div class="pull-left">
                <a a href="#"><i class="fa fa-angle-left fa-x"></i></a>
            </div>
            <div class="pull-right">
                <a a href="#"><i class="fa fa-angle-right fa-x"></i></a>
            </div>
        </div>


        <canvas id="transactionList_canvas" height="250" style="max-width: 350px; margin: auto;" class="img-responsive"></canvas>

        <div class="row">
            <div class="col-xs-12 col-sm-6" align="center">
                <h4>10000</h4>
                <span>Spent</span>
            </div>
            <div class="col-xs-12 col-sm-6" align="center">
                <h4>2000</h4>
                <span>Remaining</span>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function(){
        $(".accordion-inner").collapse('toggle');

//        $('.accordion-body.in').collapse('toggle');
    });

//    var content = document.querySelectorAll("#color");
//    content.style.background_color = "#080808";

    var tdata = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [200, 200, 200, 200, 200, 200, 200]
            },
            {
                label: "My Second dataset",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                data: [28, 48, 40, 19, 280, 80, 90]
            }
        ]
    };
    var ctx = document.getElementById("transactionList_canvas").getContext("2d");
    new Chart(ctx).Line(tdata, {
        bezierCurve: false,
        responsive: false,
        maintainAspectRatio:false

    });
</script>



