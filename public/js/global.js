var gender_flg='';
var user_status='';

$('#gender_female').click(function() {
    gender_flg = 'female';
});

$('#gender_male').click(function() {
    gender_flg = 'male';
});

$('#status_single').click(function() {
    user_status = 0;
});

$('#status_married').click(function() {
    user_status = 1;
});

$('#creditCard_true').click(function() {
    $('#addCreditCard').show('slow');
});

$('#creditCard_false').click(function() {
    $('#addCreditCard').hide('slow');
});

$('#addCreditCard').hide();


function listLocalStorage()
{
    for (var i = 0; i < localStorage.length; i++){
        console.log(localStorage.getItem(localStorage.key(i)) + " | KEY:"+localStorage.key(i).length);

    }
}



