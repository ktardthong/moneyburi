<div  ng-repeat="card in userCards">
    <div class="alert alert-warning" ng-init="removeConfirm$index = false" ng-show="removeConfirm$index">
        You have removed @{{ card.issuer_name }}.
        <strong><u><a href="#">Undo</a></u></strong> if it was a mistake.
    </div>
    <div class="media list-mb" ng-init="mediaContainer$index = true" ng-show="mediaContainer$index">
        <div class="media-left">
            <a href="#">
                <i class="@{{ card.cc_icon }} fa-2x"></i>
            </a>
        </div>
        <div class="media-body">
            <span class="pull-right">
                <a href="#" ng-click="optionContainer$index = true"> <i class="ion-chevron-right"></i> </a>

                <div ng-show="optionContainer$index">
                    <div class="container-fluid">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="#" ng-click="editContainer$index=true" class="nav-link">
                                <i class="ion-compose"></i>
                                Edit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" ng-click="mediaContainer$index=false;removeConfirm$index=true" class="nav-link">
                                <i class="ion-trash-b"></i>
                                Remove
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" ng-click="optionContainer$index = false;editContainer$index =false" class="nav-link">
                                <i class="ion-chevron-left"></i>
                                Back
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>

            </span>

            <h4 class="media-heading">@{{ card.issuer_name }}</h4>
            ending with @{{ card.last_four }}


            <div ng-show="editContainer$index" class="container-fluid pull-left">
                <input type="number" placeholder="Last four" class="form-control" value="@{{ card.last_four }}">
                <input type="number" placeholder="Last four" class="form-control" value="@{{ card.cc_limit }}">
                <input type="number" placeholder="Last four" class="form-control" value="@{{ card.due_date }}">
                <input type="number" placeholder="Last four" class="form-control" value="@{{ card.exp_mth }}">
                <input type="number" placeholder="Last four" class="form-control" value="@{{ card.exp_year }}">
                <input type="text" placeholder="Last four" class="form-control" value="@{{ card.card_notes }}">
                <button class="btn btn-primary btn-block"></button>
            </div>



        </div>
    </div>

</div>