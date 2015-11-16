<div class="container"
     ng-scrollbars
     ng-scrollbars-config="scroll_config">

        <div ng-show="listData.length==0">
            <hr>
            <h6 align="center">No records found.<br>Guess it's a good thing that you haven't spent much recently. ;)</h6>
            <hr>
        </div>

        <ul class="list-unstyled" ng-repeat="t in listData | orderBy:'-trans_date'"> <!--add filter for today's transcations only-->
                <li>
                        <i class="@{{getCateIcon(t.cate_id)}} pull-left"></i>
                        @{{t.cate_obj[0].name}}

                    <span class="pull-right">@{{t.amount | number:0}}</span>


                </li>

        </ul>
    </div>
