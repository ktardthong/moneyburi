<ul class="list-group">
    <li class="list-group-item clearfix" ng-repeat="bill in BillList.userBills">

        <label>Paid</label>
        <input type="checkbox"
               ng-model="is_paid"
               ng-click="BillList.paidStatus(bill.id)"
               ng-checked="{{bill.is_paid==0? false:true}}">

        <div class="text-left">

            <span class="label label-default label-pill pull-right">
                <span><i class="fa fa-trash" ng-click="showConfirm($event,bill.id)"></i> </span>
                <span ng-show="false" ng-model="confirmDelete" id="{{$index}}">Del</span>
            </span>
        </div>

        <div class="pull-left text-center lead">

            <div>
                <span class="text-muted"> {{ date | date:'MMM'}}</span>
            </div>
            <div>
                {{ bill.due_date }}
            </div>
        </div>

        <div class="text-center lead">

        <!-- Category name -->
        {{ bill.name }}
        <br>
        {{ bill.amount }}



        </div>

    </li>
</ul>