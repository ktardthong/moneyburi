<div  ng-repeat="card in userCards">

    <div class="alert alert-warning" ng-init="removeConfirm$index = false" ng-show="removeConfirm$index">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        {!! trans('messages.lbl_youRemove') !!}
        @{{ card.issuer_name }}.
        <strong><u>
        <a  ng-click="undoRemoveCard(card.id);
                     mediaContainer$index = true;
                     removeConfirm$index = false"
            class="cursor">
            {!! trans('messages.lbl_undo') !!}</a></u></strong> if it was a mistake.
    </div>

    <div class="media list-mb" ng-init="mediaContainer$index = true" ng-show="mediaContainer$index">
        <div class="media-left">
            <a href="#">
                <i class="@{{ card.cc_icon }} fa-2x"></i>
            </a>
        </div>

        {{-- Media body --}}
        <div class="media-body">
            <span class="pull-right">
                <a ng-click="optionContainer$index = true;" class="cursor">
                    <i class="ion-chevron-right"></i> </a>
            </span>

            <h4 class="media-heading">@{{ card.issuer_name }}</h4>
            {!!trans('messages.lbl_cc_endwith') !!}
            @{{ card.last_four }}

        </div>

        <div ng-show="optionContainer$index">
                <div class="container-fluid">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a  ng-click="editContainer$index=true"
                                class="nav-link cursor">
                                <i class="ion-compose"></i>
                                {!! trans('messages.lbl_edit') !!}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  ng-click="mediaContainer$index=false;
                                          removeConfirm$index=true;
                                          removeCard(card.id)"
                                class="nav-link cursor">
                                <i class="ion-trash-b"></i>
                                {!! trans('messages.lbl_remove') !!}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a  ng-click="optionContainer$index = false;editContainer$index =false"
                                class="nav-link cursor">
                                <i class="ion-chevron-left"></i>
                                {!! trans('messages.lbl_back') !!}s
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
        {{-- end optionContainer--}}
    </div>

</div>