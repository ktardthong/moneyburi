<md-list class="row card" ng-cloak >
    <a href="#" ng-click="showBilList=false" class="pull-right">
        <i class="ion-close-round"></i>
    </a>
    <md-subheader class="md-no-sticky">Total bills</md-subheader>

    <md-list-item ng-repeat="bill in BillList.userBills">
        <p class="text-muted pull-left"> @{{ bill.name }} </p>@{{ bill.amount }}
        <p class="pull-right">
            <a href="">
            <i class="ion-ios-arrow-right"></i></a>
        </p>
    </md-list-item>
    <md-divider></md-divider>
</md-list>