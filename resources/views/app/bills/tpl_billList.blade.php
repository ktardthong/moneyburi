<div class="media bottom_border" ng-repeat="bill in listBillStatus" style="border-style: #fefefe; border-left-color: #9F9F9F">
  <div class="media-left">
    <a href="#">
        <span class="text-muted"> @{{ date | date:'MMM'}}</span>
        @{{ bill.due_date }}
    </a>
  </div>
  <div class="media-body">
    <i class="fa fa-cutlery"></i>
    @{{ bill.name }}
    <div class="pull-right">
        @{{ bill.amount }}
    </div>
  </div>
</div>