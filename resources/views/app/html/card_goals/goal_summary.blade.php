<div class="row" style="margin: auto" class="wrapper" ng-controller="goalController">

    <div align="center" style="margin: 0 0 10px 0;">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary-outline active" ng-click="getActiveGoals()">
                <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
            </label>
            <label class="btn btn-primary-outline" ng-click="getCompletedGoal()">
                <input type="radio" name="options" id="option2" autocomplete="off"> Completed
            </label>
        </div>
    </div>

    <div ng-repeat="goal in userGoals" style="margin-right:10px;">

        <div class="col-xs-12 col-sm-6 media list-mb boxPadding" ng-init="billContainer$index = true" ng-show="billContainer$index">

            <div class="media-left">
                <a href="#">
                    <i ng-if="goal.goal_type == 1" class="fa fa-bullseye fa-2x"></i>
                    <i ng-if="goal.goal_type == 2" class="fa fa-plane fa-2x"></i>
                    <i ng-if="goal.goal_type == 3" class="fa fa-car fa-2x"></i>
                    <i ng-if="goal.goal_type == 4" class="fa fa-house fa-2x"></i>
                </a>
                {{--<img src="/img/cars_logo/@{{ goal.ext }}" ng-if="goal.goal_type==3" width="50px">--}}
            </div>


            <div class="media-body">

                <h4 class="media-heading ng-binding pull-left">
                    @{{ goal.name }}
                </h4>

                <span class="pull-right">

                    <small>
                        <div>
                            Created Date @{{ momentFormat(goal.created_at) }}
                            <br>
                            Achievement Date @{{ momentMonth(goal.created_at,goal.duration)  }}

                        </div>

                        <div>
                            Saving per month@{{ goal.mth_saving | currency: '' }}
                        </div>

                        <div>
                            Duration @{{ goal.duration_complete  }} /@{{ goal.duration  }}
                            <progress   class="progress progress-info"
                                        value="@{{ goal.duration_complete  }}"
                                        max="@{{ goal.duration  }}">@{{ goal.duration_complete  }}%</progress>
                        </div>
                    </small>
                </span>

            </div> {{-- end media body--}}


            </div> {{-- media list --}}
    </div>


</div>