$(document).ready(function () {


    $('.wrapp-card .block-card-info .wrapp-related-product .caption-slider-related .expensive').click(function () {
        $('.wrapp-related-product .slider-items').slick('slickNext');
    });

    $('.wrapp-card .block-card-info .wrapp-related-product .caption-slider-related .cheap').click(function () {
        $('.wrapp-related-product .slider-items').slick('slickPrev');
    })


    // Выравнивание характеристик
    showLineCharack(lineCharack);

    $(".receiving-city .chosen-select").chosen();

    $('.receiving-city .chosen-select').on('chosen:showing_dropdown', function() {
        $(".chosen-results").mCustomScrollbar({
            axis: "y",
            theme:"dark",
            scrollButtons:{ enable: true }
        });
    });

    $('.left-column-registration-order .wrapp-address-delivery .tab-content #pickup .table-items-pickup .body-table-pickup .list-service .item-service input[type=radio]').styler();

    $('.wrapp-registration-order .workarea-registration-order .left-column-registration-order .cart-type-payment .list-type-payment .wrapp-radio input[type=radio]').styler();

    openFixedBlockCard();
    mobilSliderRecCard();


});


function showLineCharack(callback) {
    callback();
}

function lineCharack() {
    $('.wrapp-card .block-card-info .wrapp-tabs-card #characteristics-tabs .wrapp-characteristics .block-characteristics .wrapp-table-characteristics').css({display: 'grid'});
    let countProp = $(".wrapp-table-characteristics .item-characteristics").length;
    let roundingСountProp = Math.round(countProp/2);
    $('.wrapp-table-characteristics').css({'gridTemplateRows' : 'repeat('+ roundingСountProp + ',auto)'});
}



/* Новая карточка товара */

function openFixedBlockCard(){
    $('.wrapp-new-accord-mobil .link-accord.charackteristics button').click(function () {
        $('.info-fixed-accord.charackteristics').show();
        $('body').addClass('no-scroll');
    });

    $('.wrapp-new-accord-mobil .link-accord.accessories button').click(function () {
        $('.info-fixed-accord.accessories').show();
        $('body').addClass('no-scroll');
        $('.block-accessories-mobil .slider-recommendation-mobil-new').slick('reinit');
    });

    $('.wrapp-new-accord-mobil .link-accord.reviews button').click(function () {
        $('.info-fixed-accord.reviews').show();
        $('body').addClass('no-scroll');
    });

    $('.wrapp-new-accord-mobil .link-accord.services button').click(function () {
        $('.info-fixed-accord.services').show();
        $('body').addClass('no-scroll');
    });

    $('.close-info-fixed').click(function() {
        $(this).parents('.info-fixed-accord').hide();
        $('body').removeClass('no-scroll');
    });
}

function mobilSliderRecCard() {

    $('.slider-recommendation-mobil-new').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
    });

}
