<div class="row animated" style="margin: auto" class="wrapper" ng-controller="goalController">

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


    <div ng-if="rs_userGoals == ''">
        No goals here
    </div>


    {{-- Looping usergoals --}}
    <div ng-repeat="goal in userGoals" style="margin-right:10px;">

        <div class="col-xs-12 col-sm-6  boxPadding">

            {{-- Confirm Goal Remove --}}
            <div ng-show="removeGoalConfirm$index"
                 ng-init="removeGoalConfirm$index = false"
                 class="alert alert-warning">

                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span></button>

                 You are removing a goal,
                 You will gain from
                 @{{ rs_userData.d_spendable}}
                 ->
                 @{{ Number(rs_userData.d_spendable) + Number(goal.mth_saving) | currency: '' }}
                 <a ng-click="goalContainer$index = true;
                              removeGoalConfirm$index = false;
                              undoGoalRemove(goal)" class="cursor">Undo</a>
            </div>

            {{-- Media Container --}}
            <div class="media list-mb card card-block" ng-init="goalContainer$index = true" ng-show="goalContainer$index">

                <div class="media-left">
                    <a href="#">
                        <i ng-if="goal.goal_type == 1" class="fa fa-bullseye fa-2x"></i>
                        <i ng-if="goal.goal_type == 2" class="fa fa-plane fa-2x"></i>
                        <i ng-if="goal.goal_type == 3" class="fa fa-car fa-2x"></i>
                        <i ng-if="goal.goal_type == 4" class="fa fa-house fa-2x"></i>
                    </a>
                </div>


                <div class="media-body">
                    <div class="clearfix">
                    <h4 class="lead media-heading ng-binding pull-left">
                        @{{ goal.name }}
                    </h4>

                    <div class="pull-right">
                        <a ng-click="goalOption$index = true">
                            <i class="ion-chevron-down"></i>
                        </a>
                    </div>
                    </div>
                    <div class="media-body">
                        <progress   class="progress progress-info"
                                    value="@{{ goal.duration_complete  }}"
                                    max="@{{ goal.duration  }}">@{{ goal.duration_complete  }}%</progress>
                    </div>
                </div> {{-- end media body--}}



                {{-- Dispaly optional index stuff --}}
                <div ng-show="goalOption$index" ng-init="goalOption$index = false">

                    <div class="container">

                        <small>
                            Completed @{{ goal.duration_complete  }} /@{{ goal.duration  }}
                            <div>
                                <i class="fa fa-clock-o"></i> Created @{{ momentFormat(goal.created_at) }}
                                <br>
                                <i class="fa fa-trophy"></i> Due on @{{ momentMonth(goal.created_at,goal.duration)  }}
                                <br>
                                <i class="fa fa-money"></i>Saving per month@{{ goal.mth_saving | currency: '' }}
                            </div>
                            <div class="container-fluid">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a  ng-click="goalContainer$index=false;
                                                      removeGoalConfirm$index=true;
                                                      removeGoal(goal)"
                                            class="nav-link cursor">
                                            <i class="ion-trash-b"></i>
                                            {!! trans('messages.lbl_remove') !!}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </small>
                    </div>
                </div>

            </div>{{-- media list --}}

        </div>
    </div>


</div>