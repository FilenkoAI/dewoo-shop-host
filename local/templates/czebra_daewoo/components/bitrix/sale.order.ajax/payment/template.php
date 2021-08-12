
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?
global $_SESSION, $USER;
if($USER->IsAuthorized() || $arParams["ALLOW_AUTO_REGISTER"] == "Y")
{
	if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
	{
		if(strlen($arResult["REDIRECT_URL"]) > 0)
		{
			$APPLICATION->RestartBuffer();
			?>
			<script type="text/javascript">
				window.top.location.href='<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
			</script>
			<?
			die();
		}

	}
}

?>

<a name="order_form"></a>


<NOSCRIPT>
	<div class="errortext"><?=GetMessage("SOA_NO_JS")?></div>
</NOSCRIPT>

<?

if (!function_exists("getColumnName"))
{
	function getColumnName($arHeader)
	{
		return (strlen($arHeader["name"]) > 0) ? $arHeader["name"] : GetMessage("SALE_".$arHeader["id"]);
	}
}

if (!function_exists("cmpBySort"))
{
	function cmpBySort($array1, $array2)
	{
		if (!isset($array1["SORT"]) || !isset($array2["SORT"]))
			return -1;

		if ($array1["SORT"] > $array2["SORT"])
			return 1;

		if ($array1["SORT"] < $array2["SORT"])
			return -1;

		if ($array1["SORT"] == $array2["SORT"])
			return 0;
	}
}
?>

	<?
	if(!$USER->IsAuthorized() && $arParams["ALLOW_AUTO_REGISTER"] == "N")
	{
		if(!empty($arResult["ERROR"]))
		{
			foreach($arResult["ERROR"] as $v)
				echo ShowError($v);
		}
		elseif(!empty($arResult["OK_MESSAGE"]))
		{
			foreach($arResult["OK_MESSAGE"] as $v)
				echo ShowNote($v);
		}

		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/auth.php");
	}
	else
	{
		if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
		{
			if(strlen($arResult["REDIRECT_URL"]) == 0)
			{
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/cz_confirm.php");
			}
		}
		else
		{
			?>
			<script type="text/javascript">

			<?if(CSaleLocation::isLocationProEnabled()):?>

				<?
				// spike: for children of cities we place this prompt
				$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
				?>

				BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
					'source' => $this->__component->getPath().'/get.php',
					'cityTypeId' => intval($city['ID']),
					'messages' => array(
						'otherLocation' => '--- '.GetMessage('SOA_OTHER_LOCATION'),
						'moreInfoLocation' => '--- '.GetMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
						'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.GetMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.GetMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
							'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
							'#ANCHOR_END#' => '</a>'
						)).'</div>'
					)
				))?>);

			<?endif?>

			var BXFormPosting = false;
			function submitForm(val)
			{
				$('#hidepanel').show();
				if (BXFormPosting === true)
					return true;

				BXFormPosting = true;
				if(val != 'Y')
					BX('confirmorder').value = 'N';

				var orderForm = BX('ORDER_FORM');
				BX.showWait();

				<?if(CSaleLocation::isLocationProEnabled()):?>
					BX.saleOrderAjax.cleanUp();
				<?endif?>

				BX.ajax.submit(orderForm, ajaxResult);

				return true;
			}

			function ajaxResult(res)
			{
				$('#hidepanel').hide();
				var orderForm = BX('ORDER_FORM');
				try
				{
					// if json came, it obviously a successfull order submit

					var json = JSON.parse(res);
					BX.closeWait();

					if (json.error)
					{
						BXFormPosting = false;
						return;
					}
					else if (json.redirect)
					{
						window.top.location.href = json.redirect;
					}
				}
				catch (e)
				{
					// json parse failed, so it is a simple chunk of html

					BXFormPosting = false;
					BX('order_form_content').innerHTML = res;

					<?if(CSaleLocation::isLocationProEnabled()):?>
						BX.saleOrderAjax.initDeferredControl();
					<?endif?>
				}

				BX.closeWait();
				BX.onCustomEvent(orderForm, 'onAjaxSuccess');
			}

			function SetContact(profileId)
			{
				BX("profile_change").value = "Y";
				submitForm();
			}
			</script>
			<?if($_POST["is_ajax_post"] != "Y")
			{
				?><form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data">
				<?=bitrix_sessid_post()?>
				<div id="order_form_content">
				<?
			}
			else
			{
				$APPLICATION->RestartBuffer();
			}

			if($_REQUEST['PERMANENT_MODE_STEPS'] == 1)
			{
				?>
				<input type="hidden" name="PERMANENT_MODE_STEPS" value="1" />
				<?
			}

			if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
			{
				foreach($arResult["ERROR"] as $v)
					echo ShowError($v);
				?>
				<script type="text/javascript">
					top.BX.scrollToNode(top.BX('ORDER_FORM'));
				</script>
				<?
			}

			?>

                    <div class="wrapp-step-cart">
                        <div class="container">
                            <ul>
                                <li><span class="name-step">Начало</span> <span class="count-step">1</span></li>
                                <li><span class="name-step">Адрес доставки</span><span class="count-step">2</span></li>
                                <li><span class="name-step">Дата доставки</span><span class="count-step">3</span></li>
                                <li class="selected"><span class="name-step">Способ оплаты</span><span class="count-step">4</span></li>
                                <li><span class="name-step">Подтверждение заказа</span><span class="count-step">5</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrapp-registration-order page-type-payment-cart">
                        <div class="container">
                            <div class="workarea-registration-order">
                                <div class="left-column-registration-order">
                                    <div class="cart-type-payment">
                                        <div class="wrapp-bonus-type-payment">
                                            <div class="title-block">Скидки к заказу</div>
                                            <div class="wrapp-promocode">
                                                <div class="icon-promocode">Промокод</div>
                                                <div class="field-promocode">
                                                    <input type="text" id="promocode" placeholder="Введите промокод">
                                                    <span class="btn-promocode">
                                                        <a href="#" id="use_promocode" onclick="promoCodeButton(event)">
                                                            <span class="btn-trans">Применить</span>
                                                            <span class="btn-anim">Применить</span>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="coupon-list-items">
                                                <?foreach($arResult['JS_DATA']['COUPON_LIST'] as $item):?>
                                                    <div class="coupon-item">
                                                        <span><?=$item['COUPON']?></span>
                                                        <span class="coupon-delete"  onclick="promoCodeDelete('<?=$item['COUPON']?>')"><img src="<?=SITE_TEMPLATE_PATH?>/front/img/close2.svg" alt=""></span>
                                                    </div>
                                                <?endforeach;?>
                                            </div>

                                            <div id="promocode_result" style="margin-top: 5px">
                                                <p></p>
                                            </div>
                                        </div>
                                        <?
                                            include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/cz_paysystem.php");
                                        ?>

                                    </div>
                                    <div class="btn-cart-bottom">
                                        <span class="back-step-cart">
                                            <a href="/personal_section/cart/order_date/?from_payment=Y" >
                                                <span class="btn-trans">Назад</span>
                                                <span class="btn-anim">Назад</span>
                                            </a>
                                        </span>
                                        <span class="next-step-cart">
                                            <a href="" onclick="checkPaysystem(event);">
                                                <span class="btn-trans">Продолжить</span>
                                                <span class="btn-anim">Продолжить</span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <?
                                include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/cz_summary.php");
                                ?>
                            </div>

                            <?/*div class="btn-cart-bottom">
                                <span class="back-step-cart">
                                    <a href="/personal_section/cart/order_date/?from_payment=Y" >
                                        <span class="btn-trans">Назад</span>
                                        <span class="btn-anim">Назад</span>
                                    </a>
                                </span>
                                <span class="next-step-cart">
                                    <a href="" onclick="checkPaysystem(event);">
                                        <span class="btn-trans">Продолжить</span>
                                        <span class="btn-anim">Продолжить</span>
                                    </a>
                                </span>
                            </div*/?>
                        </div>
                    </div>


			<?
			if(strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
				echo $arResult["PREPAY_ADIT_FIELDS"];
			?>
			<?if($_POST["is_ajax_post"] != "Y")
			{
				?>
					</div>
					<input type="hidden" name="confirmorder" id="confirmorder" value="Y">
					<input type="hidden" name="profile_change" id="profile_change" value="N">
					<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
					<input type="hidden" name="json" value="Y">
				</form>
				<?
				if($arParams["DELIVERY_NO_AJAX"] == "N")
				{
					?>
					<div style="display:none;"><?$APPLICATION->IncludeComponent("bitrix:sale.ajax.delivery.calculator", "", array(), null, array('HIDE_ICONS' => 'Y')); ?></div>
					<?
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					top.BX('confirmorder').value = 'Y';
					top.BX('profile_change').value = 'N';
				</script>
				<?
				die();
			}
		}
	}
	?>


<?if(CSaleLocation::isLocationProEnabled()):?>

	<div style="display: none">
		<?// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.location.selector.steps", 
			".default", 
			array(
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.location.selector.search", 
			".default", 
			array(
			),
			false
		);?>
	</div>

<?endif?>
<?
    $paySystemId = 0;
    if( $_SESSION['CZ_ORDER']['PAYSYSTEM_ID'] ) {
        $defaultPaySystemId = $_SESSION['CZ_ORDER']['PAYSYSTEM_ID'];
    } else {
        foreach ($arResult['PAY_SYSTEM'] as $arPaySystem) {
            if ($arPaySystem['CHECKED'] == 'Y') $paySystemId = $arPaySystem['ID'];
        }
    }

?>
<div class="order-alert modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p></p>
                <a href="javascript:void(0);" data-dismiss="modal" class="close-modal"></a>
            </div>
        </div>
    </div>
</div>
<div id='hidepanel' style="display:none;"></div>
<script>
jQuery(function($) {initForm();});
BX.addCustomEvent('onAjaxSuccess', function(){ initForm();});
function initForm(){
    styleForm();
    actionFrom();
    inBasketEvent();
}
function styleForm(){
    $("input[data-cz-telefon='Y']").mask("+7(999)999-99-99");

    var locationPropID = $("#location_prop").val();
    if(locationPropID !== undefined)
    {
        var el = $(locationPropID);
        el.attr("data-cz-validated-type", "data");
        el.attr("data-cz-validated-group", "group_order_delivery");
        el.attr("data-cz-validated-msg", "* Необходимо заполнить поле Регион доставки");
    }
}
function actionFrom(){
    $("#ORDER_CONFIRM_BUTTON").click(function(){
        var validBaseFields = cz_validated.run('group_order');
        var validDeliveryFields = deliveryValidate();
        if (validBaseFields && validDeliveryFields) {
            submitForm('Y');
        }
        return false;
    });
}
function deliveryValidate(){
    var result = true;
    var validAdress = $("#delivery_adress_valid").val();
    if (validAdress == "Y") {
        result = cz_validated.run('group_order_delivery');
    }
    return result;
}

function inBasketEvent(){
    
    $('.table-cart .spinner .spin-down').click(function(){     
        var quentity = parseInt($(this).siblings('.table-cart .spinner input[type="text"]').val());
        if($(this).siblings('.table-cart .spinner input[type="text"]').val()>1){
            $(this).siblings('.table-cart .spinner input[type="text"]').val((quentity-1));
            changeQuanSpin(this);
        }
    });
    $('.table-cart .spinner .spin-up').click(function(){
        var quentity = parseInt($(this).siblings('.table-cart .spinner input[type="text"]').val());
        $(this).siblings('.table-cart .spinner input[type="text"]').val((quentity + 1));
        changeQuanSpin(this);
        
    });
    function changeQuanSpin(el){
        var id = $(el).parent().next().val();
         $.ajax({
            url: "/local/ajax/changeQuantity.php?ID=" +id+ "&COUNT="+$(el).siblings('.table-cart .spinner input[type="text"]').val()+"&TYPE=update",
               cache: false,
               success:function(){
                   //$(".cart-total span").load("/local/ajax/loading.php?arParams=" + $("#ajaxParams").val());
                   submitForm();
               }
         });
         var price = parseInt($("#price-" + id).val()) * parseInt($(el).siblings('.table-cart .spinner input[type="text"]').val());
         $("#sum-" + id).html(price.toString().replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1 ") + ' <sup>╤</sup>');
    }
    
   $('.table-cart .spinner input[type="text"]').on('touchspin.on.startspin', changeQuan);
   $('.table-cart .spinner input[type="text"]').change(changeQuan);
   $('.table-cart .spinner input[type="text"]').keypress(function(event) {
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == 13) {
          changeQuan.apply(this);
      }
   });
   
   function changeQuan(){
      var id = $(this).parent().next().val();
      $.ajax({
         url: "/local/ajax/changeQuantity.php?ID=" +id+ "&COUNT="+$(this).val()+"&TYPE=update",
			cache: false,
            success:function(){				
                //$(".cart-total span").load("/local/ajax/loading.php?arParams=" + $("#ajaxParams").val());
                submitForm();
			}
      });
      var price = parseInt($("#price-" + id).val()) * parseInt($(this).val());
      $("#sum-" + id).html(price.toString().replace(/(\d{1,3}(?=(\d{3})+(?:\.\d|\b)))/g,"\$1 ") + ' <sup>╤</sup>');
   }
   
   $("a.ct-del").click(function(){
      var id = $(this).find("[id *= 'basket-id-']").val();
      $.ajax({
         url: "/local/ajax/changeBasket.php?ACTION=CHANGE_QUAN&basketID=" +id+ "&QUANTITY=-1",
			cache: false,
         success:function(){				
				//$("#panel-info-sum").load("/local/ajax/loading.php?arParams=" + $("#ajaxParams").val());
                $(".line-basket").load("/local/ajax/getBasket.php");
                submitForm();
			}
      });
      $(this).parents("tr").detach();
      return false;
   });
}
BX.ready(function(){
    loader = BX('ajax-preloader-wrap');
    BX.showWait = function(node, msg) {
        BX.style(loader, 'display', 'none');
    };
});
function promoCodeButton(event){
    event.preventDefault();
    let promoCode = $('#promocode').val();
    if(promoCode){
        promoCodeUse(promoCode);
    }
}


function promoCodeUse(promoCode){
    $.ajax({
        url: "/local/ajax/promocode.php?action=set_promo_code&promo_code=" + promoCode,
        cache: false,
        success:function(data){
            promoCodeAfter(JSON.parse(data));
        }
    });
}
function promoCodeAfter(data){
    if (data['RESULT'] != 'OK') {
        if(data['RESULT'] != 'OK') {
            $('#promocode_result p').html(data['MESSAGE']);
            console.log('sdf')
        }
    } else {
        submitForm();
    }
}
function promoCodeDelete(promoCode){
    $.ajax({
        url: "/local/ajax/promocode.php?action=del_coupon&coupon=" + promoCode,
        cache: false,
        success:function(){
            submitForm();
        }
    });
}
function checkPaysystem(event){
    event.preventDefault();
    if ($('input[name="PAY_SYSTEM_ID"]:checked').length > 0){
        window.location.href = '/personal_section/cart/order_confirm/';
        return true;
    }
    $('.order-alert p').html('Выберите способ оплаты');
    $('.order-alert').modal('show');
    return false;
}
</script>
