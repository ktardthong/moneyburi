<div class="row">
    <div class="col-xs-12">
        <div class="clearfix">

            <div class="card-block white_bg">

                <span class="fa-stack fa-lg">
                  <a ng-click="goalTemplate.url = '/goal/goal_buying'" style="cursor:pointer">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-bullseye fa-stack-1x fa-inverse"></i>
                  </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a ng-click="goalTemplate.url = '/goal/goal_travel'" style="cursor:pointer">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-plane fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a ng-click="goalTemplate.url = '/goal/goal_buycar'" style="cursor:pointer">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg">
                    <a ng-click="goalTemplate.url = '/goal/goal_buyhome'" style="cursor:pointer">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                    </a>
                </span>

                <span class="fa-stack fa-lg pull-right">
                  <a ng-click="goalTemplate.url = '/goal/goal_summary'" style="cursor:pointer">
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