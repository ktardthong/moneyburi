<div class="card card-block " ng-controller="goalController" ng-app="App">

    <md-toolbar class="md-menu-toolbar">
        <div layout="row">
            <md-toolbar-filler layout layout-align="center center">
                <md-icon class="fa fa-bullseye fa-2x"></md-icon>

            </md-toolbar-filler>
            <h2 class="md-toolbar-tools">
                <label>
                Goal
                </label>
                <md-menu-bar>

                    <md-input-container>

                        <md-select ng-model="goal_template">
                            <md-option  ng-repeat="t in goal_templates" value="{{t.name}}" ng-value="'{{ t.url}}'">
                                {{t.name}}
                            </md-option>
                        </md-select>

                    </md-input-container>

                </md-menu-bar>

            </h2>
        </div>
    </md-toolbar>

    <h4>



    </h4>
    <div class="row">

        <div ng-cloak>
            <md-content class="md-padding">
                <md-tabs md-dynamic-height md-border-bottom md->
                    <md-tab label="Summary">
                        <md-content class="md-padding">
                            <div class="slide-animate" ng-include="goal_templates[0].url"></div>
                        </md-content>
                    </md-tab>

                    <md-tab label="Set Target">
                        <md-content class="md-padding">
                            <div class="slide-animate" ng-include="goal_templates[1].url"></div>
                        </md-content>
                    </md-tab>

                    <md-tab label="Travel">
                        <md-content class="md-padding">
                            <div class="slide-animate" ng-include="goal_templates[2].url"></div>
                        </md-content>
                    </md-tab>

                    <md-tab label="Buy Home/Condo">
                        <md-content class="md-padding">
                            <div class="slide-animate" ng-include="goal_templates[2].url"></div>
                            <p>test</p>
                        </md-content>
                    </md-tab>

                    <md-tab label="Buy Car">
                        <md-content class="md-padding">
                            <div class="slide-animate" ng-include="goal_templates[4].url"></div>
                            <p>test</p>
                        </md-content>
                    </md-tab>

                </md-tabs>
            </md-content>
        </div>

        <div class="col-xs-12 col-sm-12">
            <!--<select ng-model="goal_template" ng-options="t.name for t in goal_templates">-->
                <!--<option value="">Goal</option>-->
            <!--</select>-->

        </div>

        <div class="col-xs-12 col-sm-12">
            <div class="slide-animate" ng-include="goal_template"></div>
        </div>
    </div>
</div>