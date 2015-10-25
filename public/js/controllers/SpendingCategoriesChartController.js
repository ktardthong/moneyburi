//Spendable
var spendableDate  =[];
var spendableAmount=[];
var spendableRemain=[];


var weeklySpendable=[];
var weeklyDate=[];
var weeklyAmount=[];
var weeklyRemain=[];

app.controller('spendingCategoriesChartController', function($scope, $http,$window) {


    $scope.showSpendableWeek = function(){
        $http.get("/spendableTracker/get")
            .success(function (response) {
                $window.weeklySpendable = response;

                //Getting the date
                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyDate[i] = weeklySpendable[i].date;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyAmount[i] = weeklySpendable[i].spendable;
                }

                for (i = 0; i < weeklySpendable.length; i++) {
                    weeklyRemain[i] = weeklySpendable[i].remain;
                }
            });
        $scope.labels = weeklyDate;
        $scope.data = [
            weeklyAmount,
            weeklyRemain
        ];
    };

    $scope.showSpendableMonth = function(){

        $http.get("/spendableTracker/getMonth")
            .success(function (response) {

                $window.spendableData = response;

                //Getting the date
                for (i = 0; i < spendableData.length; i++) {
                    spendableDate[i] = spendableData[i].date;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableAmount[i] = spendableData[i].spendable;
                }

                for (i = 0; i < spendableData.length; i++) {
                    spendableRemain[i] = spendableData[i].remain;
                }
            });
            $scope.labels = spendableDate;
            $scope.data = [
                spendableAmount,
                spendableRemain
            ];
    };


    //By default show the last 7 transaction
    $scope.showSpendableWeek();

    var randomScalingFactor = function(){
        return Math.round(Math.random()*100);
    };
    //var barChartData = {
    //    labels : ["Food","Shopping","Groceries","Health","Utilities","Entertainment","Travel"],
    //    datasets : [
    //        {
    //            fillColor : "rgba(220,220,220,0.5)",
    //            strokeColor : "rgba(220,220,220,0.8)",
    //            highlightFill: "rgba(220,220,220,0.75)",
    //            highlightStroke: "rgba(220,220,220,1)",
    //            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    //        },
    //        {
    //            fillColor : "rgba(151,205,151,0.5)",
    //            strokeColor : "rgba(151,205,151,0.8)",
    //            highlightFill : "rgba(151,205,151,0.75)",
    //            highlightStroke : "rgba(151,205,151,1)",
    //            data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
    //        }
    //    ]
    //};
    //
    //
    //var ctx = angular.element($('#barChart')).getContext('2d');
    //    //document.getElementById("barChart").getContext("2d");
    //var hBarChart = new Chart(ctx).HorizontalBar(barChartData, {
    //        responsive: true,
    //        barShowStroke: false
    //    });
    //

    $scope.c_options = {
        "responsive": true,
        "barShowStroke": false,
        "scaleShowHorizontalLines": false,
        "legendTemplate" : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
    };



    $scope.chart = {
        title: "Chart",
        type: "HorizontalBar",
        height: 200,
        //"width": 600,
        options: {
            chart: {
                events: {}
                //responsive: true,
                //barShowStroke: false,
                //scaleShowHorizontalLines: false
            },
            responsive: true,
            barShowStroke: false,
            scaleShowHorizontalLines: false,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

        },
        data: {
            labels: ["Food","Shopping","Groceries","Health","Utilities","Entertainment","Travel"],
            datasets: [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,0)",
                    highlightFill: "rgba(220,220,220,0.75)",
                    highlightStroke: "rgba(220,220,220,0)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                },
                {
                    fillColor : "rgba(151,205,151,0.5)",
                    strokeColor : "rgba(151,205,151,0)",
                    highlightFill : "rgba(151,205,151,0.75)",
                    highlightStroke : "rgba(151,205,151,0)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                }
            ]
        }
    }

})
.directive('spendingCategoriesChart', function() {
    return {
        restrict: 'E',
        templateUrl: '/spendingCateChart'
    };
});
