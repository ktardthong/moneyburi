<div class="card card_width">
{{--<div class="card card-block">--}}
    <add-trans></add-trans>
{{--</div>--}}

<div class="card card-block" >
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
            <a a href="#"><i class="fa fa-plus fa-x"></i></a>
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
    <!--<ul class="list-group" ng-repeat="t in listData">-->
        <!--<li class="list-group-item">{{t.trans_date}}&emsp;&emsp;|&emsp;&emsp;You spent {{t.currency[0].currency_sym}}{{t.amount}} on {{t.cate_obj[0].name}} at {{t.location}}</li>-->
    <!--</ul>-->


    <!--<ul class="nav nav-stacked" id="accordion1" ng-repeat="t in listData">-->
        <!--<li class="panel"> <a data-toggle="collapse" >-->
            <!--{{t.trans_date}}&emsp;&emsp;|&emsp;&emsp;You spent {{t.currency[0].currency_sym}}{{t.amount}} on {{t.cate_obj[0].name}} at {{t.location}}-->
        <!--</a>-->

            <!--<ul class="collapse">-->
                <!--<li>{{t}}</li>-->
            <!--</ul>-->

        <!--</li>-->
    <!--</ul>-->
        <!--<div class="accordion" id="accordion2">-->
            <!--<div class="list-group" ng-repeat="t in listData">-->
                <!--<hr>-->
                <!--<ul class="accordion-heading">-->
                            <!--&lt;!&ndash;<div id="circle"> &nbsp;</div>&ndash;&gt;-->

                            <!--<span class="fa-stack fa-pull-left" style="margin-top: -5px;">-->
                                <!--&lt;!&ndash;<i class="fa fa-circle-o fa-stack-2x"></i>&ndash;&gt;-->
                                <!--<i class="{{getCateIcon(t.cate_id)}} fa-stack-1x"></i>-->
                            <!--</span>-->
                            <!--<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" data-target="#collapse{{$index}}"-->
                               <!--aria-expanded="true" aria-controls="#collapse{{$index}}">-->
                                <!--&emsp;&emsp;You spent {{t.currency[0].currency_sym}}{{t.amount}} on {{t.cate_obj[0].name}} at {{t.location}}-->
                            <!--</a>-->
                            <!--<small><i class="{{propertyIcons('datetime')}}"></i>&emsp;|&emsp;{{t.trans_date}}</small>-->


                        <!--<li id="collapse{{$index}}" class="accordion-inner collapse in">-->
                            <!--&lt;!&ndash;<div class="accordion-inner">&ndash;&gt;-->
                                <!--<small> <i class="{{getTransTypeIcon(t.trans_type)}}"></i> {{t.trans_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
                                    <!--<i class="{{getPmtIcon(t.pmt_type)}}"></i> {{t.pmt_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
                                    <!--Recurring: {{t.trans_repeat_obj[0].name}}&emsp;&emsp;|&emsp;&emsp;-->
                                    <!--Added on: {{t.created_at}} </small>-->
                            <!--&lt;!&ndash;</div>&ndash;&gt;-->
                        <!--</li>-->
                <!--</ul>-->
            <!--</div>-->
        <!--</div>-->
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



