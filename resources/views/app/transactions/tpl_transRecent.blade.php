<div class="container"
     ng-scrollbars
     ng-scrollbars-config="scroll_config">

        <div ng-show="listData.length==0">
            <hr>
            <h6 align="center">No records found.<br>Guess it's a good thing that you haven't spent much recently. ;)</h6>
            <hr>
        </div>

        <ul class="list-unstyled" ng-repeat="t in listData | orderBy:'-trans_date'"> <!--add filter for today's transcations only-->

                <!--<div id="circle"> &nbsp;</div>-->
            <!--<small align="center">&mdash;@{{t.trans_date}}&mdash;</small>-->

                <li>
                    {{--<span class="pull-left">--}}
                        <i class="@{{getCateIcon(t.cate_id)}} pull-left"></i>
                        @{{t.cate_obj[0].name}}
                    {{--</span>--}}

                    <span class="pull-right">@{{t.amount | number:0}}</span>
                    {{--<br>--}}

                </li>
                <!--<small><i class="@{{propertyIcons('datetime')}}"></i><br>@{{t.trans_date}}</small>-->


                <!--<li id="collapse@{{$index}}" class="accordion-inner collapse">-->
                    <!--&lt;!&ndash;<div class="accordion-inner">&ndash;&gt;-->
                    <!--<small> <i class="@{{getTransTypeIcon(t.trans_type)}}"></i> @{{t.trans_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
                        <!--<i class="@{{getPmtIcon(t.pmt_type)}}"></i> @{{t.pmt_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
                        <!--|&emsp;&emsp;Added on: @{{t.created_at}} </small>-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->
                <!--</li>-->
        </ul>
    </div>


<!--<md-list-item class="md-2-line" ng-repeat="t in listData | orderBy:'-trans_date' | orderBy:'-created_at'">-->
    <!--<md-icon md-icon="getCateIcon(t.cate_id)" ng-if="$index !== 2" ng-class="{'md-avatar-icon': $index === 1}"></md-icon>-->
    <!--<div class="md-list-item-text" ng-class="{'md-offset': $index == 2 }">-->
        <!--<small> You spent @{{t.currency[0].currency_sym}}@{{t.amount}} on @{{t.cate_obj[0].name}} at @{{t.location}} </small>-->
        <!--<small> <i class="@{{getTransTypeIcon(t.trans_type)}}"></i> @{{t.trans_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
            <!--<i class="@{{getPmtIcon(t.pmt_type)}}"></i> @{{t.pmt_type_obj[0].name}} &emsp;&emsp;|&emsp;&emsp;-->
            <!--|&emsp;&emsp;Added on: @{{t.created_at}} </small>-->
    <!--</div>-->
<!--</md-list-item>-->