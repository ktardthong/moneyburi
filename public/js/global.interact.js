

$("#addTransaction").click(function(){
    $("#spendableOverview").hide();
    $("#spendableContainer").load("/showTransaction");
});


$("#backAddTransaction").click(function(){
    $("#spendableOverview").show();
    $("#spendableContainer").html();
});
