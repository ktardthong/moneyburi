

$("#addTransaction").click(function(){
    $("#spendableOverview").hide();
    $("#spendableContainer").load("/ajax/showTransaction");
});


$("#backAddTransaction").click(function(){
    $("#spendableOverview").show();
    $("#spendableContainer").html();
});
