<h4 class="card-title">Your Recent Transactions</h4>

<div class="btn-group" data-toggle="buttons" align="">

    <label class="btn btn-primary active">
        <input type="radio" name="options" id="option_all" autocomplete="off" ng-model="range" value="all"> All
    </label>

    <label class="btn btn-primary">
        <input type="radio" name="options" id="option_week" autocomplete="off" ng-model="range" value="week"> Week
    </label>
    <label class="btn btn-primary">
        <input type="radio" name="options" id="option_month" autocomplete="off" ng-model="range" value="month"> Month
    </label>
    <label class="btn btn-primary">
        <input type="radio" name="options" id="option_year" autocomplete="off"ng-model="range" value="year"> Year
    </label>
</div>

    <div class="accordion" id="accordion2">
        <div ng-show="listData.length==0">
            <hr>
            <h6 align="center">No records found.<br>Guess it's a good thing that you haven't spent much recently. ;)</h6>
            <hr>
        </div>

        <div class="list-group" ng-repeat="t in listData | orderBy:'-trans_date' | orderBy:'-created_at'">
            <hr>
            <ul class="accordion-heading">
                <!--<div id="circle"> &nbsp;</div>-->

                                <span class="fa-stack fa-pull-left" style="margin-top: -5px;">
                                    <!--<i class="fa fa-circle-o fa-stack-2x"></i>-->
                                    <i class="@{{getCateIcon(t.cate_id)}} fa-stack-1x"></i>
                                </span>
                <h6 class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" data-target="#collapse@{{$index}}"
                   aria-expanded="false" aria-controls="#collapse@{{$index}}" >
                   &emsp;&emsp;You spent @{{t.currency[0].currency_sym}}@{{t.amount}} on @{{t.cate_obj[0].name}} at @{{t.location}}
                </h6>
                <small><i class="@{{propertyIcons('datetime')}}"></i>&emsp;|&emsp;@{{t.trans_date}}</small>


                <li id="collapse@{{$index}}" class="accordion-inner collapse">
                    <!--<div class="accordion-inner">-->
                    <small> <i class="@{{getTransTypeIcon(t.trans_type)}}"></i> @{{t.trans_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;
                        <i class="@{{getPmtIcon(t.pmt_type)}}"></i> @{{t.pmt_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;
                        |&emsp;&emsp;Added on: @{{t.created_at}} </small>
                    <!--</div>-->
                </li>
            </ul>
        </div>
    </div>