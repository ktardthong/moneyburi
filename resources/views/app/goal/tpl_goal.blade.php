<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">

            <div class="card-block white_bg">

                <span class="fa-stack fa-lg">
                  <a href="#goalContainer" ng-click="goalTemplate.url = '/goal/goal_buying'">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-bullseye fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a href="#goalContainer" ng-click="goalTemplate.url = '/goal/goal_travel'">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a href="#goalContainer" ng-click="goalTemplate.url = '/goal/goal_buycar'">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a href="#goalContainer" ng-click="goalTemplate.url = '/goal/goal_buyhome'">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg pull-right">
                  <a href="#goalContainer" ng-click="goalTemplate.url = '/goal/goal_summary'">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-list fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

            </div>

            <div class="page page-right"
                 ng-init="goalTemplate.url='/goal/goal_summary'"
                 ng-include="goalTemplate.url" ngview ></div>

        </div>
    </div>

</div>