<div ng-if="listBillStatus.length == 0">nothing here</div>
{{-- List the bills --}}
<div class="media" ng-repeat="bill in listBillStatus" style="border-style: #fefefe; border-left-color: #9F9F9F">
    {{-- If bill remove then we show alert here--}}
    <div class="alert alert-warning"
       ng-init="removeBillConfirm$index = false"
       ng-show="removeBillConfirm$index">

       <button type="button" class="close" data-dismiss="alert" aria-label="Close">

       <span aria-hidden="true">&times;</span></button>

       {!! trans('messages.lbl_youRemove') !!}
       @{{ bill.name }}.
      <strong>
          <u><a ng-click="undoRemove(bill.id);
                          removeBillConfirm$index = false;
                          billContainer$index=true"
                class="cursor">{!! trans('messages.lbl_undo') !!}</a></u>
      </strong> if it was a mistake.
    </div>

      {{-- Bill Main container --}}
      <div class="media list-mb" ng-init="billContainer$index = true" ng-show="billContainer$index">

          <div class="media-left">
              <a href="#">
                  <span class="text-muted"> @{{ date | date:'MMM'}}</span>
                  @{{ bill.due_date }}
              </a>
          </div>

          <div class="media-left">
            <span class="fa-stack fa-lg">
              <i class="fa fa-circle fa-stack-2x"></i>
              <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
            </span>
          </div>

          <div class="media-body">

              <span class="pull-right">

                  <a  ng-click="billOptionContainer$index = true;
                                showMore$index = false"
                      ng-show="showMore$index = true"
                      style="cursor: pointer;margin-left:20px">
                      <i class="ion-chevron-down"></i>
                  </a>
                  <a  ng-click="billOptionContainer$index = false;
                                editContainer$index =false;
                                showMore$index = true"
                      ng-show="billOptionContainer$index"
                      class="nav-link cursor">
                      <i class="ion-chevron-up"></i>
                      {{--{!! trans('messages.lbl_back') !!}--}}
                  </a>

              </span>

              <span class="pull-left">
                  @{{ bill.name }}
              </span>

              <h4 class="media-heading ng-binding pull-right">
                      @{{ bill.amount }}
              </h4>

          </div> {{-- end media body--}}

          <div ng-show="billEdit$index" class="container-fluid pull-left">

              <button class="btn btn-primary btn-block"></button>

          </div>

          {{-- Bill Option --}}
          <div ng-show="billOptionContainer$index">
              <div class="container-fluid">
                  <ul class="nav nav-pills">
                      <li class="nav-item" ng-if="bill.is_paid ==0">
                          <a  ng-click="editContainer$index=true; bill.showTrans=!bill.showTrans"
                              class="nav-link cursor">
                              <i class="ion-compose"></i>
                              pay
                          </a>
                      </li>
                      <li class="nav-item">
                          <a  ng-click="billContainer$index=false;
                                        removeBillConfirm$index=true;
                                        removeBill(bill.id)"
                              class="nav-link cursor">
                              <i class="ion-trash-b"></i>
                              {!! trans('messages.lbl_remove') !!}
                          </a>
                      </li>
                  </ul>
              </div>
          </div>

          <div ng-init="bill.showTrans=false" ng-show="bill.showTrans" class="card card-block">
              <add-bill-trans bill="bill"></add-bill-trans>
          </div>

      </div> {{-- media list --}}
</div> {{--  end media --}}