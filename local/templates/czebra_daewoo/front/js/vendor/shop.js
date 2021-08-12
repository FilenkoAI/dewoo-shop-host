'use strict';
//видоизмененный, не использовать в других проектах
function CzebraProduct() { }

CzebraProduct.prototype = {
    activate: function () {
        var obj = this;
        BX.ajax.runAction('czebra:project.api.basket.get').then(function(response){
            if (response.status == 'success') {
                for (var i in response.data) {
                    var elem = $("[data-czbuy='" + response.data[i] + "']");
                    if ( !elem.hasClass('in-basket') ){
                        obj.styleBeforeAddBasket(elem);
                    }
                }
                obj.buttonClick();
            }
        });
    },

    styleBeforeAddBasket: function (elem) {
        elem.attr("data-czaction", "gobasket");
        elem.text("в корзине");
        elem.addClass("in-basket");
    },

    buttonClick: function () {
        $("[data-czaction='gobasket']").click(function () {
            window.location.href = "/personal_section/cart/order_start/";
            return false;
        });

        var obj = this;
        $("[data-czaction='addtocart']").click(function () {
            var _elem = $(this);
            var id = _elem.attr("data-czbuy");
            var quantity = $("[data-czquantity='" + id + "']").val();
            if (quantity == undefined) {
                quantity = 1;
            }
            $.ajax({
                // возможно придется поменять на windows.location.href, пришлось это сделать, т.к. не работает в сравнении ajax
                url: '/catalog/',
                data: {
                    action: 'ADD2BASKET',
                    id: id,
                    ajax_basket: 'Y',
                    quantity: quantity
                },
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.STATUS == 'OK') {
                        BX.onCustomEvent(window, 'OnBasketChange');
                        obj.styleBeforeAddBasket(_elem);
                        obj.refreshButtonClick();
                        renewHeaderCart();
                    }
                }
            });
            return false;
        });
    },

    refreshButtonClick: function () {
        $("[data-czaction='gobasket']").unbind('click');
        $("[data-czaction='addtocart']").unbind('click');
        this.buttonClick();
    }
};
