$(function(){
    $("[name='register_submit_button']").click(function(){
        $("[name='REGISTER[LOGIN]']").val($("[name='REGISTER[EMAIL]']").val());

        var result;
        if (cz_validated.run('reggroup') && confirmPsw()){
            result = true;
        } else {
            result = false;
        }

        return result;
    });
});

function confirmPsw() {
    if ($("[name='REGISTER[PASSWORD]']").val().length > 0) {
        if ($("[name='REGISTER[PASSWORD]']").val() !== $("[name='REGISTER[CONFIRM_PASSWORD]']").val()) {
            cz_validated.run('reggroup2');
            return false;
        }
    }
    return true;
}
