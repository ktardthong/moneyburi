<div class="row" style="margin: auto" class="wrapper">


    <div class="scrolls">

    <div ng-repeat="goal in userGoals" class="scroll-container" style="margin-right:10px;">

        <div class="media list-mb card_width box boxPadding" ng-init="billContainer$index = true" ng-show="billContainer$index">

            <div class="media-left">
                <a href="#">
                    <i ng-if="goal.goal_type == 1" class="fa fa-bullseye"></i>
                    <i ng-if="goal.goal_type == 2" class="fa fa-plane"></i>
                    <i ng-if="goal.goal_type == 3" class="fa fa-car"></i>
                    <i ng-if="goal.goal_type == 4" class="fa fa-house"></i>
                </a>
                <img src="/img/cars_logo/@{{ goal.ext }}" ng-if="goal.goal_type==3" width="50px">
            </div>


                <div class="media-body">

                    <h4 class="media-heading ng-binding pull-right">
                        @{{ goal.name }}
                    </h4>

                    <br>

                    Saving per month@{{ goal.mth_saving }}

                    <span class="pull-left">

                    </span>
                </div> {{-- end media body--}}


            </div> {{-- media list --}}
    </div>



    {{--<div ng-repeat="t in userTravelGoals" class="scroll-container" style="margin-right:10px;">
        <div class="card card-block" style="padding:10px;max-width: 250px">
            <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
            </span>
            <div class="card-title color_606">
                @{{ t.where_to }}
            </div>
            <p class="color_606">
                <small>
                <ul class="list-unstyled">
                    <li>Budget@{{t.budget | currency: '' }}</li>
                    <li>Going there in @{{ t.month | date: "MMM" }} @{{ t.year }} </li>
                    <li>Nights @{{t.nights}}</li>
                </ul>
                </small>
            </p>
            <progress class="progress color_f59" value="10" max="100">0%</progress>
        </div>


    </div>--}}

    <div ng-repeat="t in userTargets" class="scroll-container">

            <!--<div class="card card-block">
                <h4 class="card-title"><i class="fa fa-gift fa-x"></i> @{{ t.name }}</h4>
                <p class="card-text">Price @{{ t.price }} Duration @{{ t.duration }}</p>
                <a href="#" class="card-link"><i class="fa fa-trash fa-2x"></i> Delete</a>
                <a href="#" class="card-link">Another link</a>
            </div>-->

    </div>
    </div>
</div>