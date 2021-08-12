// 'use strict';
//
// function CzebraProduct() { }
//
// CzebraProduct.prototype = {
//     activate: function () {
//         /*$.ajax({
//             url: "/local/ajax/basket/?action=list",
//             cache: false,
//             success: function (data) {
//                 data = JSON.parse(data);
//                 for (i in data.basket) {
//                     var elem = $("[data-cz-buy='" + data.basket[i] + "']");
//                     elem.attr("data-cz-basket", "yes");
//
//                     elem.text("уже в корзине");
//                     elem.addClass("in-basket");
//                     elem.removeClass('cart-icon');
//                     elem.addClass('no-padding-cart');
//                 }
//
//             }
//         });*/
//         BX.ajax.runAction('sale.BasketItem.list', {
//             filter: {
//                 orderId:111
//             }
//         }).then(function(response){
//             console.log(response);
//         });
//     },
//
//     refresh: function () {
//         $("[data-czaction='']").unbind('click');//тут отписываем всех с атрибутом data-czaction
//         this.activate();
//     },
//
//     buttonEvents: function () {
//         $("[data-czaction='gobasket']").click(function () {
//             window.location.href = "/personal/cart/";
//             return false;
//         });
//
//         $("[data-czaction='addtocart']").click(function () {
//             var _elem = $(this);
//             var id = _elem.attr("data-cz-id");
//             var quantity = $("[data-czquantity='" + id + "']").val();
//             if (quantity == undefined) {
//                 quantity = 1;
//             }
//             $.ajax({
//                 url: window.location.href,
//                 data: {
//                     action: 'ADD2BASKET',
//                     id: id,
//                     ajax_basket: 'Y',
//                     quantity: quantity
//                 },
//                 cache: false,
//                 success: function (data) {
//                     data = JSON.parse(data);
//                     if (data.STATUS == 'OK') {
//                         _elem.attr("data-cz-basket", "yes");
//
//                         BX.onCustomEvent(window, 'OnBasketChange');
//                     }
//
//                     $(elem).text("уже в корзине");
//                     $(elem).addClass("in-basket");
//                     $(elem).removeClass('cart-icon');
//                     $(elem).addClass('no-padding-cart');
//                 }
//             });
//             return false;
//         });
//     }
// }