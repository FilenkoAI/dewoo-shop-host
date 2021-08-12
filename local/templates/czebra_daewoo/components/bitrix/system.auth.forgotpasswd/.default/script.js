$(function(){
    $("[name='USER_PHONE_NUMBER']").mask('+7 (999) 999-99-99');
    $("[name='send_account_info']").click( function(event){
        $("[name='USER_LOGIN']").val($("[name='USER_PHONE_NUMBER']").val());
        return true;
    });
});

