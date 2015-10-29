<div class="row" style="margin: auto" class="wrapper">


    <div class="scrolls">

    <div ng-repeat="t in userTravelGoals" class="scroll-container" style="margin-right:10px;">
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


    </div>

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