

$("#addTransaction").click(function(){
    $("#spendableOverview").hide();
    $("#spendableContainer").load("/showTransaction");
});


$("#backAddTransaction").click(function(){
    $("#spendableOverview").show();
    $("#spendableContainer").html();
});

//Getting data from form to local storage
$( ".fetchData" ).keyup(function() {
    localStorage.setItem(this.name, this.value);
    console.log(localStorage.getItem(this.name));
});
