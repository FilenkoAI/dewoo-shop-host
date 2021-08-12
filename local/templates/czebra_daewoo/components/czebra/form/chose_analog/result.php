<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(false);?>

<p class="form_result_message"><?=$arParams['USER_MESSAGE_ADD']?></p>
<script>
    $(function(){
        ym(31362968,'reachGoal','otpravit-analog'); //В script.js  не пашет
        gtag('event', 'otpravit-analog', {'event_category': 'Forma'});
    });
</script>