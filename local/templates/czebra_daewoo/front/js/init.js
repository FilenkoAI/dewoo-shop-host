$(document).ready(function () {
    $('.catalog-mobil-menu').slinky({
        title: true,
        resize: true
    });
    mobileMenuTitleIcon();
    mobileMenuHideChat();
    $('.block-catalog-menu').slinky({
        title: true
    });
    $(".input-rating").rating({
        showCaption: false,
        step: 0.1,
        rtl: false
    });
    mobilMenu();
    cardModals();
    menuExtension();
    var czAdd = new CzebraProduct();
    czAdd.activate();
    changeSelectedShop();
    openSelectCityModal();
    searchCityModal();
    firstStep();
    // secondStep();
    scrollHeader();
    // thirdStep();
    fourthStep();
    renewHeaderCart();
    // quickOrder();
    maskInputs(['.phone-mask input', '[name="USER_LOGIN"]', '[name="LOGIN"]']);
    $("[data-phone='yes_fastbuy'], [name='phone'], [data-phone='yes_FORM_AVAILABILITY']").inputmask("+7 (999) 999-99-99");
    customScroll();
    commentGetFull();
    tabsDelivery();
    sliderBannerMobilMain();
    openFilterCatalog();
    sliderMain();
    sliderStockMain();
    sliderNoveltyMain();
    customSelect();
    sliderCard();
    sliderVideoCard();
    sliderNavCard();
    tabsCard();
    sliderFeaturesCard();
    sliderItems();
    sliderVideoMain();
    selectCity();
    searchSite();
    accordPaymentBtn();
    countItem();
    customFile();
    tableTarifDelivery();
    rangeValue();
    tabSupportCard();
    sliderInTabs();
    sliderBannerMobilMain();
    fixedConfirmOrder();
    formQuickOrder();
    openCommentsCard();
    fancyFeaturesCard();
    modalShareBonuse();
    changedPasswordModal();
    changedAddressDeliveryModal();
    changedAddressPickupModal();
    sliderCompare();
    alignStringsCompare();
    photoMagazineModal();
    editOrderModal();
    tabsDeliveryPickup();
    mobilFeaturesCard();
    mobilSliderRecommCard();
    mobilSliderRelatedCard();
    mobilSliderReviews();
    cartMobilForm();
    infoTarifCart();
    renameBtnConfirmOrder();
    alignAdvantages();
    calculateC6v();
    addGoals();
});
function mobileMenuTitleIcon(){
    $('[data-menu-mobile-title-img]').on('click', function (){
        let imageSrc = $(this).data('menu-mobile-title-img');
        if (imageSrc){
            if( $(this).siblings('ul').children('li.header').children('img').length === 0){
                $(this).siblings('ul').children('li.header').append('<img src="' + imageSrc + '"/>');
            }
        }
    })
}
function mobilMenu(){

    $('.left-header-mob .icon-mob-menu span').click(function(){
        // $('.header .wrapp-mobil-menu').addClass('open').show();
        // $('header.header').addClass('bg-mob-menu');
        $('.header .wrapp-mobil-menu').toggleClass('open').show();
        $('header.header').toggleClass('bg-mob-menu');
    });

    $('.close-mobil-menu a').click(function(){
        $('.header .wrapp-mobil-menu').removeClass('open');
        $('header.header').removeClass('bg-mob-menu');
        return false;
    });

}
function sliderMain() {

    $('.slider-main').on('init', function(event, slick){
        $('.wrapp-slider-main').css('overflow', 'inherit');
        $('.wrapp-slider-main').css('max-height', 'none');
    });
    $('.slider-main').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        appendArrows: $('.container-arrows'),
        autoplay: true,
        autoplaySpeed: 2500
    })


}

function sliderStockMain() {
    $('.wrapp-slder-stock-main').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: "unslick"
            }
        ]
    })
}

function sliderNoveltyMain() {
    $('.slider-novelty-main').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                    dots: true
                }
            }
        ]
    })
}


// function addFavorites(){
//     $('.slide-novelty-main .add-to-favorites').click(function(){
//         $(this).toggleClass('selected');
//         return false;
//     });
//
//     $('.item .add-to-favorites').click(function(){
//         $(this).toggleClass('selected');
//         return false;
//     });
// }

function customSelect() {

    $('.select').styler({
        onSelectOpened: function () {
            $(this).find('.jq-selectbox__trigger-arrow').css({transform: 'rotate(-180deg)', transition: '0.5s'});
        },
        onSelectClosed: function () {
            $(this).find('.jq-selectbox__trigger-arrow').css({transform: 'rotate(0deg)', transition: '0.5s'});
        },
    });

    $('.wrapp-search-city select').styler({
        selectSearch: true,
        selectSearchPlaceholder: '',
        onSelectOpened: function () {
            $(this).find('.jq-selectbox__trigger-arrow').css({transform: 'rotate(-180deg)', transition: '0.5s'});
        },
        onSelectClosed: function () {
            $(this).find('.jq-selectbox__trigger-arrow').css({transform: 'rotate(0deg)', transition: '0.5s'});
        },
    });
}

function sliderCard() {
    $('.slider-card').on('init', function(event, slick){
        $('.slider-card').css('overflow', 'inherit');
        $('.slider-card').css('max-height', 'none');
    });
    $('.slider-card').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        asNavFor: '.slider-nav-card',
        dots: true,
        appendDots: $('.top-dots'),
        responsive: [
            {
                breakpoint: 1099,
                settings: {
                    dots: true,
                    appendDots: $('.slider-card'),
                }
            },
        ]
    })
}

function sliderVideoCard() {
    $('.slider-video-card').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        dotsClass: 'slick-video-dots',
        asNavFor: '.slider-video-card-hidden',
    });

    $('.slider-video-card-hidden').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        arrows: false,
        dots: true,
        asNavFor: '.slider-video-card',
        appendDots: $('.top-video-dots')
    });


}

function sliderNavCard() {
    $('.slider-nav-card').on('init', function(event, slick){
        $('.slider-nav-card').css('overflow', 'inherit');
        $('.slider-nav-card').css('max-height', 'none');
    });
    $('.slider-nav-card').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: true,
        dotsClass: 'slick-photo-dots',
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        asNavFor: '.slider-card',
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1500,
                settings: {
                    slidesToShow: 3,
                }
            },
        ]
    });
}

function tabsCard() {
    $('.tabs-card a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
}

function sliderFeaturesCard() {

    $('.slider-features-item-card').slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        dotsClass: 'slick-features-dots'
    });


}

function sliderItems() {
    $('.slider-items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        responsive: [
            {
                breakpoint: 1500,
                settings: {
                    slidesToShow: 3,
                }
            },
        ]
    })
}

function sliderVideoMain() {

    $('.slider-video-main').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: false,
                }
            }
        ]
    });

}

function selectCity() {
    $('.select-city-modal').modal('show');

    $('.ok-city').click(function () {
        $.ajax({
            url: '/local/ajax/select_city.php',
            success: function (data) {
                $('.select-city-modal').modal('hide');
            }
        });
        return false;
    });

    $('.change-city').click(function () {
        $('.select-city-modal').modal('hide');
        // $('.change-select-city-modal').modal('show');
        $.ajax({
            url: '/local/ajax/city.php',
            success: function (data) {
                $('body').append(data);
                $('.change-select-city-modal').modal('show');
                linkRedirectCity();
            }
        });
        return false;
    });

    $('.change-select-city-modal .close-modal').click(function () {
        $('.change-select-city-modal').modal('hide');
    });

    $('.select-city-modal .close-modal').click(function () {
        $('.select-city-modal').modal('hide');
        return false;
    });
}

function searchSite() {
    $('.search a, .search-mobil a').click(function () {
        $('.search-site').modal('show');
        return false;
    });

    $('.search-site .close-modal').click(function () {
        $('.search-site').modal('hide');
        return false;
    });
}

function accordPaymentBtn() {

    $('.info-online-payment-security .btn-accord').click(function () {
        $(this).next('.text-accord').collapse('toggle');
        $(this).toggleClass('active');
        return false;
    });

}

function countItem() {
    $('.item-table-cart .count-item-cart input').TouchSpin({
        min: 1,
        max: 999,
        step: 1,
        decimals: 0,
        buttondown_class: "minus",
        buttonup_class: "plus"
    });
}

function customFile() {
    $('.new-user-form .wrapp-file input').styler({
        filePlaceholder: '',
        fileBrowse: 'Загрузить'
    });
}



function tabsDelivery() {

    $('.menu-tabs a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
        if($(this).data('name')){
            $('.service-nav').text($(this).data('name'))
        }
    });

}

function tableTarifDelivery() {

    $('.open-tarif-table').click(function () {
        $('.wrapp-table-info-tarif').show();
        return false;
    });

    $('.close-table-tarif').click(function () {
        $('.wrapp-table-info-tarif').hide();
        return false;
    });

}

function rangeValue() {

}

function openFilterCatalog() {
    $('.wrapp-open-filters a').click(function () {
        $('.wrapp-catalog-filter').slideToggle();
        $(this).toggleClass('open');

        return false;
    });
}

function tabSupportCard() {
    $('.workarea-tabs-service ul a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
}

function sliderInTabs() {

    $('.tabs-card a[href="#characteristics-tabs"]').on('shown.bs.tab', function (e) {
        $('.slider-features-item-card').slick('refresh');
    });

    $('.tabs-card a[href="#service-support-tabs"]').on('shown.bs.tab', function (e) {
        $('.slider-features-item-card').slick('refresh');
    });

    $('.tabs-card a[href="#getting-product-tabs"]').on('shown.bs.tab', function (e) {
        $('.slider-features-item-card').slick('refresh');
    });

    $('.tabs-card a[href="#reviews-tabs"]').on('shown.bs.tab', function (e) {
        $('.slider-features-item-card').slick('refresh');
    });

    $('.tabs-card a[href="#garanty-xxl-tabs"]').on('shown.bs.tab', function (e) {
        $('.slider-features-item-card').slick('refresh');
    });
}

function sliderBannerMobilMain() {

    $(".slider-banner-mobil").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        dotsClass: 'slick-banner-dots'
    })


}

function fixedConfirmOrder() {

    var offset = $(".fixed-parametrs-order").offset();
    var topPadding = 80,
        bottomPadding = 600;
    if (offset) {
        $(window).scroll(function () {
            if ($(window).scrollTop() > offset.top) {
                if ($(document).height() - bottomPadding > $(window).scrollTop() + $(".fixed-parametrs-order").height()) $(".fixed-parametrs-order").stop().animate({
                    marginTop: $(window).scrollTop() - offset.top + topPadding
                });
            } else {
                $(".fixed-parametrs-order").stop().animate({
                    marginTop: 0
                });
            }
            ;
        });
    }
}

function formQuickOrder() {

    // $('.quick-order a').click(function () {
    //     $('.quick-order-form').modal('show');
    //     return false;
    // });
    //
    // $('.quick-order-form .close-modal').click(function () {
    //     $('.quick-order-form').modal('hide');
    //     return false;
    // });

}

function openCommentsCard() {

    $('.to-answer a').click(function () {
        $(this).parents().next('.answer').slideToggle();
        $(this).toggleClass('opened');

        if ($(this).hasClass('opened')) {
            $(this).text('Скрыть комментарии');
        } else {
            $(this).text('Комментарии');
        }
        ;
        return false;
    });

}

function scrollHeader() {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 144) {
            $('.fixed-header').show();
            $('.static-header').hide();
        } else {
            $('.fixed-header').hide();
            $('.static-header').show();
        }
    });
}

function fancyFeaturesCard() {

    $('.fancy-features-card').fancybox({});
}


function modalShareBonuse() {

    $('.code-sms-share-bonus').modal('show');

    $('.code-sms-share-bonus .close-modal').click(function () {
        $('.code-sms-share-bonus').modal('hide');
        return false;
    });

    $('.ok-share-bonus').modal('show');

    $('.ok-share-bonus .close-modal').click(function () {
        $('.ok-share-bonus').modal('hide');
        return false;
    });
}

function changedPasswordModal() {

    $('.reset-passw-user a').click(function () {
        $('.changed-passw-user').modal('show');
        return false;
    });

    $('.changed-passw-user .close-modal').click(function () {
        $('.changed-passw-user').modal('hide');
        return false;
    });

}

function changedAddressDeliveryModal() {

    $('.info-delivery-user .edit-address, .info-delivery-user .add-new-address a').click(function () {
        $('.address-delivery-modal').modal('show');
        return false;
    });

    $('.address-delivery-modal .close-modal').click(function () {
        $('.address-delivery-modal').modal('hide');
        return false;
    });

}


function changedAddressPickupModal() {
    $('.info-pickup-user .edit-address, .info-pickup-user .add-new-address a').click(function () {
        $('.address-pickup-modal').modal('show');
        return false;
    })

    $('.address-pickup-modal .close-modal').click(function () {
        $('.address-pickup-modal').modal('hide');
        return false;
    });

    $('.address-pickup-modal').on('shown.bs.modal', function (e) {
        $('.slider-photo-magazine').slick('refresh');
    });

    $('.slider-photo-magazine').slick({
        infinite: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
    });


}

function sliderCompare() {

    $('.slider-compare').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        dotsClass: 'slick-compare-dots',
        asNavFor: '.slider-compare-hidden',
    });

    $('.slider-compare-hidden').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        dotsClass: 'slick-compare-dots',
        asNavFor: '.slider-compare',
        appendDots: $('.top-dots-compare')
    });

}

function alignStringsCompare() {
    let strings = $('.name-characteristics').length;
    for (let i = 1; i <= strings; i++) {
        var maxHeight = 0;
        $(`[data-compare="line${i}"`).each(function () {
            if ($(this).outerHeight() > maxHeight) {
                maxHeight = $(this).outerHeight();
            }
        });
        $(`[data-compare="line${i}"`).css('height', maxHeight);
    }

}
function alignAdvantages(){
    let maxHeight = 0;
    $('.features-item-card .top-features-item').each(function () {

        if ($(this).outerHeight() > maxHeight) {
            maxHeight = $(this).outerHeight();
        }
    });
    $('.features-item-card .top-features-item').css('height', maxHeight);
}
function photoMagazineModal() {



    // $('.photo-magazine-modal .close-modal').click(function () {
    //     $('.photo-magazine-modal').modal('hide');
    //     return false;
    // });
    //
    // $('.photo-magazine-modal').on('shown.bs.modal', function (e) {
    //     $('.slider-magazine').slick('refresh');
    // });
    //
    // $('.photo-magazine-modal .slider-magazine').slick({
    //     infinite: false,
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     nextArrow: "<span class='next-slide'></span>",
    //     prevArrow: "<span class='prev-slide'></span>",
    //     asNavFor: '.slider-magazine-nav',
    //     dots: true,
    //     appendDots: $('.top-dots-magazine-nav')
    // });
    //
    // $('.photo-magazine-modal .slider-magazine-nav').slick({
    //     infinite: false,
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     nextArrow: "<span class='next-slide'></span>",
    //     prevArrow: "<span class='prev-slide'></span>",
    //     dots: true,
    //     asNavFor: '.slider-magazine',
    //     focusOnSelect: true
    // });

}

function customScroll() {
    $(".result-search-list-modal").mCustomScrollbar({
        axis: "y",
        theme: "dark",
        scrollButtons: {enable: true}
    });

    if (window.matchMedia('(max-width: 1099px)').matches) {

        $(".select-company-delivery .table-company").mCustomScrollbar({
            axis: "x",
            theme: "dark",
        });
    }
    if(window.matchMedia('(max-width: 1099px)').matches){

        $(".select-company .table-company").mCustomScrollbar({
            axis: "x",
            theme:"dark",
        });
    };

    if(window.matchMedia('(max-width: 1099px)').matches){

        $(".wrapp-txt .wrapp-table").mCustomScrollbar({
            axis: "x",
            theme:"dark",
        });
    };

    if(window.matchMedia('(min-width: 1100px)').matches){

        $(".block-value-filter.dropdown-filter").mCustomScrollbar({
            axis: "y",
            theme:"dark",
        });
    }
}

function editOrderModal() {

    // $('.edit-info').click(function () {
    //     $('.edit-order-modal').modal('show');
    //     return false;
    // });

    // $('.edit-order-modal .close-modal').click(function () {
    //     $('.edit-order-modal').modal('hide');
    //     return false;
    // });

}

function tabsDeliveryPickup() {
    $('.tabs-delivery-pickup a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
}


function mobilFeaturesCard() {

    $('.slider-features-mobil-card').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        dotsClass: 'slick-features-dots-mobil',
        asNavFor: '.slider-features-mobil-card-hidden',
    });

    $('.slider-features-mobil-card-hidden').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
        dots: true,
        appendDots: $('.top-dots-features-mobil'),
        asNavFor: '.slider-features-mobil-card',
    });

}

function mobilSliderRecommCard() {

    $('.slider-recommendation-mobil .block-catalog-items').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
    });

}

function mobilSliderRelatedCard() {

    $('.slider-related-prod-mobil .block-catalog-items').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
    });

}
function filterDropdown(){
    if(window.matchMedia('(min-width: 1100px)').matches){
        $('.name-dropdown-filter').click(function(){
            $(this).toggleClass('open');
            $(this).next('.dropdown-filter').slideToggle();
        });
    }
}

function mobilSliderReviews() {

    $('.wrapp-slider-reviews-mobil').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        nextArrow: "<span class='next-slide'></span>",
        prevArrow: "<span class='prev-slide'></span>",
    });

}

function cartMobilForm() {

    if (window.matchMedia('(max-width: 1099px)').matches) {

        $('.new-user-form .title-user-form').click(function () {
            $(this).toggleClass('active');
            $(this).next('form').slideToggle();
        });

        $('.login-user-form .title-user-form').click(function () {
            $(this).toggleClass('active');
            $(this).next('form').slideToggle();
        });
    }

}

function infoTarifCart() {

    if (window.matchMedia('(max-width: 1099px)').matches) {
        $('.open-tarif-table').click(function () {
            $('.wrapp-info-tarif-mobil').slideToggle();
            $(this).toggleClass('active');
            return false
        })
    }
}

function renameBtnConfirmOrder() {
    if (window.matchMedia('(max-width: 1099px)').matches) {
        $('.cancel-order-btn .btn-trans, .cancel-order-btn .btn-anim').html('Отменить');
        $('.confirm-order-btn .btn-trans, .confirm-order-btn .btn-anim').html('Подтверждаю');
    }
}

function commentGetFull() {
    $('.commentary .open-text, .advantages .open-text, .disadvantages .open-text').on('click', function (event) {
        event.preventDefault();
        let secondPart = $(this).siblings('input[type="hidden"]').val();
        $(this).css('display', 'none');
        $(this).parent().append(secondPart);
    })
}

//добавляем в избранное и обрабатываем все это добро
function markAddedFavs() {
    $.ajax({
        type: "POST",
        url: '/local/ajax/favorites_list.php',
        success: (data) => {
            data = JSON.parse(data);
            for (let key in data) {
                $('.add-to-favorites[data-id=' + data[key] + ']').addClass('selected');
                $('.add-to-favorites a[data-id=' + data[key] + ']').addClass('selected');
            }
        }
    })
}

function addToFavs(e, id) {
    e = e || window.event;
    e.preventDefault();
    let target = e.target || e.srcElement;
    $.ajax({
        type: "POST",
        url: '/local/ajax/favorites.php?id=' + id,
        success: (data) => {
            if (data == 1) {
                target.classList.add('selected');
            } else {
                target.classList.remove('selected');
            }
            renewHeaderFavs();
        }
    })
}

function renewHeaderFavs() {
    $.ajax({
        type: "POST",
        url: '/local/ajax/favorites_list.php',
        success: (data) => {
            data = JSON.parse(data);
            if (data.length > 0) {
                $('.bottom-header .favorites a .count-items').remove();
                $('.bottom-header .favorites a').append('<div class="count-items"><span>' + data.length + '</span></div>')
            } else {
                $('.bottom-header .favorites a .count-items').remove();
            }
        }
    })
}
function renewHeaderCart() {
    $.ajax({
        type: "POST",
        url: '/local/ajax/cart_items.php',
        success: (data) => {
            if (data > 0) {
                $('.bottom-header .cart a .count-items').remove();
                $('.bottom-header .cart a').append('<div class="count-items"><span>' + data + '</span></div>')

                $('.cart-mobil a .counter').remove();
                $('.cart-mobil a').append('<span class="counter">' + data + '</span>')
            } else {
                $('.bottom-header .cart a .count-items').remove();
            }
        }
    })
}

function addToCompare(e, id, url) {
    e = e || window.event;
    e.preventDefault();
    let target = e.target || e.srcElement;
    let link = url;
    if (target.classList.contains('selected')) {
        url = link + '?action=DELETE_FROM_COMPARE_LIST&id=' + id + '&ajax_action=Y';
    } else {
        url = link + '?action=ADD_TO_COMPARE_LIST&id=' + id + '&ajax_action=Y';
    }
    $.ajax({
        type: "POST",
        url: url,
        success: () => {
            if (target.classList.contains('selected')) {
                target.classList.remove('selected');
            } else {
                target.classList.add('selected');
            }
            renewHeaderCompares()
        }
    })
}



function markAddedCompares() {
    $.ajax({
        type: "POST",
        url: "/local/ajax/comparison_list.php",
        success: (data) => {
            let ids = JSON.parse(data);
            for (let key in ids) {
                let item = $('.add-to-compare[data-id=' + ids[key] + ']');
                item.addClass('selected');
            }
        }
    })
}

function renewHeaderCompares() {
    $.ajax({
        type: "POST",
        url: '/local/ajax/comparison_list.php',
        success: (data) => {
            data = JSON.parse(data);
            if (data.length > 0) {
                $('.bottom-header .compare a .count-items').remove();
                $('.bottom-header .compare a').append('<div class="count-items"><span>' + data.length + '</span></div>')
            } else {
                $('.bottom-header .compare a .count-items').remove();
            }
        }
    })
}
function fastBuyDelete(){
        if ($(".body-table-cart").length > 1) {
            $(this).parent().parents('.body-table-cart').slideUp(800, function () {
                $(this).remove();

                if ($(".body-table-cart").length == 0) {
                    showEmptyBasket();
                }
            });
        } else {
            showEmptyBasket();
        }

        // var id = $(this).attr('data-del-id');
        // $.ajax({
        //     url: "/local/ajax/basket/?action=delete&id=" + id,
        //     cache: false,
        //     success: function (data) {
        //         var information = JSON.parse(data);
        //         var insertText = thousandSeparator(information.SUM_ORDER) + " <span class='rubl'>i</span>";
        //         $('.total-price').html(insertText);
        //     }
        // });


        return false;
}
function fastBuy() {
    $('.quick-order-form .close-modal').click(function () {
        $('.quick-order-form').modal('hide');
        return false;
    });

    $(".delete-item-cart a").on("click", function(event) {
        event.preventDefault();
        if ($('.item-table-cart').length > 1) {
            $(this).parents('.item-table-cart').slideUp(800, function () {
                $(this).remove();

                if ($(".body-table-cart").length == 0) {
                    showEmptyBasket();
                }
            });
        } else {
            showEmptyBasket();
        }
        let id = $(this).attr('data-id');
        let data = {
            action: 'recalculateAjax',
            sessid: BX.bitrix_sessid(),
            site_id: "s1",
            site_template_id: "czebra_daewoo",
            via_ajax: "Y",
            lastAppliedDiscounts: "",
            signedParamsString: "",
            template: "main",
            basket: {
                ['DELETE_' + id]: "Y"
            }
        };
        BX.ajax({
            method: 'POST',
            dataType: 'json',
            url: '/local/ajax/fastbuy/index.php',
            data: data,
            onsuccess: BX.delegate(function(result){
                changePrice('.total-price-cart p span', result['BASKET_DATA']['allSum']);
                renewHeaderCart();
           })
        })

        return false;
    });

    $(".count-item-cart input").on('change', function () {
        if($(this).val() <= 0) $(this).val(1);
        else {
            let id = $(this).attr('data-id');
            let data = {
                action: 'recalculateAjax',
                sessid: BX.bitrix_sessid(),
                site_id: "s1",
                site_template_id: "czebra_daewoo",
                via_ajax: "Y",
                lastAppliedDiscounts: "",
                signedParamsString: "",
                template: "main",
                basket: {
                    ['QUANTITY_' + id]: $(this).val()
                }
            };
            BX.ajax({
                method: 'POST',
                dataType: 'json',
                url: '/local/ajax/fastbuy/index.php',
                data: data,
                onsuccess: BX.delegate(function(result){
                    changePrice('.total-price-cart p span', result['BASKET_DATA']['allSum'])
                    changePrice(`.sum-price-item-${result['CHANGED_BASKET_ITEMS'][0]}`, result['BASKET_DATA']['GRID']['ROWS'][result['CHANGED_BASKET_ITEMS'][0]]['SUM_VALUE'])
                })
            })
        }
    });


    function showEmptyBasket() {
        $(".modal-body").html('<p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>');
        $(".table-items-cart").html('<p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>');
    }
    function changePrice(selector, value){
        let formatedValue = thousandSeparator(value) + " <span class='rubl'>i</span>";
        $(selector).html(formatedValue);
    }
}
function openSelectCityModal() {
    $('.top-header .pin a, .open-city-modal, #open_select_city').click(function (event) {
        event.preventDefault()
        if(!$(this).hasClass('disabled')){
            $(this).addClass('disabled');
            $('.change-select-city-modal').remove();
            $.ajax({
                url: '/local/ajax/city.php',
                success:  (data) => {
                    $(this).removeClass('disabled')
                    $('body').append(data);
                    $('.change-select-city-modal').modal('show');
                    linkRedirectCity();
                }
            });
        }
        return false;
    });
}
function openSelectShopModal() {
    $('.open-shop-modal').click(function (event) {
        event.preventDefault();
        if(!$(this).hasClass('disabled')){
            $(this).addClass('disabled');
            $('.change-select-shop-modal').remove();
            $.ajax({
                url: '/local/ajax/shop.php',
                success: (data) => {
                    $(this).removeClass('disabled');
                    $('body').append(data);
                    $('.change-select-shop-modal').modal('show');
                }
            });
        }
        return false;
    });
}

function searchCityModal() {
    $(document).on('input', '#elastic', function () {
        let search = $(this).val();
        $('.elastic .searchable').each(function (index, item){
            if (item.dataset.name.includes(search.toLowerCase()) ){
                $(this).show();
            } else {
                $(this).hide();
            }
        });

        $('.list-city-mobil .searchable').each(function (index, item){
            if (item.dataset.name.includes(search.toLowerCase()) ){
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
}

function linkRedirectCity() {
    $('.column-city a').click(function () {
        let nameCity = $(this).html();
        let linkCity = $(this).attr('href');
        $.ajax({
            method: 'GET',
            url: '/local/ajax/redirectCity.php',
            data:{
                name: nameCity, link: linkCity
            },
            success: function (data) {
                window.location.href = linkCity + window.location.pathname;
            }
        });
        return false;
    });
}
function maskInputs(classes){
    classes.forEach((item) => {
        $(item).mask('+7 (999) 999-99-99');
        $(item).attr('placeholder', '+7 (999) 999-99-99')
    });
}


function quickOrder(event, id){
    event.preventDefault();
    $.ajax({
        url: window.location.href,
        data: {
            action: 'ADD2BASKET',
            id: id,
            ajax_basket: 'Y',
            quantity: 1,
        },
        cache: false,
        success: function (data) {
            callQuickOrderForm();
            ym(31362968,'reachGoal','1-klik');
        }
    });
}
function callQuickOrderForm(){
    $.ajax({
        type: "POST",
        url: '/local/ajax/fastbuy/index.php',
        success: (data) => {
            let wrap = $('.quick-order-form .modal-dialog .modal-content');
            wrap.children().remove();
            wrap.append(data);
            $('.quick-order-form').modal('show');
        }
    })
}
function nextStepSubmit(event){
    event.preventDefault();
    $('#next_step_form').submit();
}
function firstStep(){
    $('#order_login_form a').click(function (event){
        event.preventDefault();
         $(this).parents('form').submit();
    })
}


function updateDeliveryPrice(deliveryPrice){
    deliveryPrice = parseFloat(deliveryPrice);
    let orderPrice = parseFloat($('#order_total_price').val());
    if (deliveryPrice === 0) {
        $('.fixed-parametrs-order .sum-delivery').html(
            "Стоимость доставки <span class='icon-is-free'>Бесплатно</span>"
        );
        $('.fixed-parametrs-order .sum-items-order p span').html(
            orderPrice + "<span class='rubl'>i</span>"
        );
    } else {
        let finalPrice = orderPrice + deliveryPrice;
        $('.fixed-parametrs-order .sum-items-order p span').html(
            thousandSeparator(finalPrice) + "<span class='rubl'>i</span>"
        );
        $('.fixed-parametrs-order .sum-delivery').html(
            "<p class='sum-delivery'>Стоимость доставки <span>" + thousandSeparator(deliveryPrice) + "<span class='rubl'>i</span>" + "</span></p>"
        );
    }
}
function changeDelivery(id){
    $('#order_address_form [name="order_delivery_id"]').val(id);
}
// архаизм

//--архаизм
function thirdStep(){
    $('#order_date_submit').on('click', function (event){
        event.preventDefault();

        if(checkRequiredFields(['#order_date_form [name="date"]', '#order_date_form [name="time"]'])){
            $('#order_date_form').submit();
        }
    })
    // часы
    $('[name="clock"]').click(function(){
        let a = $(this).val();
        $('.wrapp-date-delivery .time-field p span').html(a);
        $('#order_date_form [name="time"]').val(a);
    })
    // календарь
    let date = new Date();
    $('.calendar').datepicker({
        minDate: new Date(),
        maxDate: new Date(date.setMonth(date.getMonth() + 1)),
        onSelect: function (data){
            if(data){
                let months = ['Января', 'Февраля', 'Марта', 'Апреля', 'Мая', 'Июня', 'Июля', 'Августа', 'Сентября', 'Октября', 'Ноября', 'Декабря'];
                let date = data.split('.');
                let selectedDate = new Date(date[2] + '-' + date[1] + '-' + date[0]);
                let day = selectedDate.getDate();
                let month = months[selectedDate.getMonth()];
                $('#order_date_form [name="date"]').val(selectedDate);
                $('.date-field p span').html(day + ' ' + month);
            }
        }
    });
    //необходимые поля для этапа
    function checkRequiredFields(fields){
        for(let i = 0; i< fields.length; i++){
            if(!$(fields[i]).val()){
                let fieldName = $(fields[i]).data('name');
                errorAlert("Выберите" + " " + fieldName);
                return false;
            }
        }
        return true;
    }

}
//--архаизм
function fourthStep(){
    let selectedPaysystem = $('.list-type-payment .list-items-type-payment input[type="radio"]:checked').val();
    $('#next_step_form [name="paysystem_id"]').val(selectedPaysystem);
}
function thousandSeparator(str) {
    var parts = (str + '').split('.'),
        main = parts[0],
        len = main.length,
        output = '',
        i = len - 1;

    while (i >= 0) {
        output = main.charAt(i) + output;
        if ((len - i) % 3 === 0 && i > 0) {
            output = ' ' + output;
        }
        --i;
    }

    if (parts.length > 1) {
        output += '.' + parts[1];
    }
    return output;
}
function errorAlert(error){
    $('.order-alert .modal-body p').html(error);
    $('.order-alert').modal('show');
}

function changeSelectedShop(){
    $('.change-select-shop-modal').on('click', function (event){
        event.preventDefault();
        if(!$(this).hasClass('disabled')){
            $(this).addClass('disabled')
            $.ajax({
                url: '/local/ajax/shop.php',
                success:  (data) => {
                    $(this).removeClass('disabled')
                    $('body').append(data);
                    $('.change-select-city-modal').on('hidden.bs.modal', function (){
                        $('.change-select-city-modal').remove();
                    })
                    $('.change-select-city-modal').modal('show');
                    linkRedirectCity();
                }
            });
        }
    })

}
function cardModals(){
    $('#reviews-tabs .add-reviews a').click(function(){
        $('.reviews-modal').modal('show');
        return false
    });

    $('#ask-question').click(function(){
        $('.ask-modal').modal('show');
        return false;
    });
}

function openReviews(){
    $('[href="#reviews-tabs"]').tab('show');
    const el = document.querySelector('[href="#reviews-tabs"]');
    el.scrollIntoView();
}
function openReviewsMobile(){

}
function menuExtension(){
    $('[data-submenu-name="Аккумуляторная техника"]').css('display', 'none')
    $.ajax({
        url: '/local/ajax/accum.php',
        success: function (data) {
            $('[data-section="Садовая техника"]').append(data);
        }
    });
}

function calculateC6v(){
    $('#show-modal-calculate-c6v').click(function(){

        $.ajax({
            url: '/local/ajax/showCalculateC6vModal.php',
            success: function (data) {
                if(data){
                    $('body').append(data);
                    $('#modal-calculate-c6v').modal('show');
                    $('[data-live-search="true"]').selectpicker();
                    $(".btn.btn-primary" ).on( "click", function() {

                        var startCity = $('#startCity').val();
                        var endCity = $('#endCity').val();
                        var weight = $('#calculate-weight').val();
                        var length = $('#calculate-length').val();
                        var width = $('#calculate-width').val();
                        var height = $('#calculate-height').val();

                        if (weight < 1 || length  < 1 || width < 1 || height < 1) {
                            $('#delivery-result').html('<p class="alert alert-danger">Заполните все поля для расчета</p>');
                            return false
                        }
                        $('#delivery-result').html('<p>Загрузка...</p>');
                        showCalculateC6vPrice(startCity, endCity, length, width, height, weight);
                        return false;
                    });

                    $('#modal-calculate-c6v').on('hidden.bs.modal', function (e) {
                        $(this).remove();
                    });
                }
            }
        });
        return false;
    });
}
function showCalculateC6vPrice(startCity, endCity, length, width, height, weight){
    $.ajax({
        url: '/local/ajax/showCalculateC6vPrice.php',
        data: {
            'startCity': startCity,
            'endCity': endCity,
            'length': length,
            'width': width,
            'height': height,
            'weight': weight,
        },
        success: function (data) {
            if(data){
                $('#delivery-result').html(data);
            }
        }
    });
    return false;
}

function showCalculateC6vPrice2(startCity, endCity, length, width, height, weight){
    $('#loader').css('display', 'flex');
    $.ajax({
        url: '/local/ajax/showCalculateC6vPrice2.php',
        data: {
            'startCity': startCity,
            'endCity': endCity,
            'length': length,
            'width': width,
            'height': height,
            'weight': weight,
        },

        success: function (data) {
            $('#loader').css('display', 'none');
            $('#calculation_result').html(data);
            $('.select-company-delivery .body-table').slideDown();
            $('.select-company-delivery .head-table .open-table').addClass('active');

        }
    });
    return false;
}
// function pasteCalculatedResults(data){
//     let output = '';
//     data.data.forEach(item => {
//         output += `<div className="item-company">
//             <input type="radio" id="company${item.id}" name="delivery-company">
//                 <label htmlFor="company${item.id}">
//                     <div className="wrapp-name-company">
//                         <div className="img-company"><img src="/front/img/pochta.png" alt="">
//                         </div>
//                         <div className="name-company">${item.name}</div>
//                     </div>
//                     <div className="price-delivery-company">${item.price}</div>
//                     <div className="time-delivery-company">${item.days}</div>
//                 </label>
//         </div>`;
//     })
//     $('#calculation_result').html(output);
//
// }

function chosenSelect(){
    $(".departure-city .chosen-select, .receiving-city .chosen-select").chosen();

    $('.departure-city .chosen-select, .receiving-city .chosen-select').on('chosen:showing_dropdown', function() {
        $(".chosen-results").mCustomScrollbar({
            axis: "y",
            theme:"dark",
            scrollButtons:{ enable: true }
        });
    });

    $('.departure-city .chosen-select, .receiving-city .chosen-select').on('chosen:hiding_dropdown', function() {
        if($(".chosen-results").length) {
            $('.chosen-results').mCustomScrollbar('destroy');
        }
    });

}
function changeDeliveryVisualData(type, price, total){
    if(!isNaN(price)){
        price += "<span class='rubl'>i</span>";
    }
    total += "<span class='rubl'>i</span>";
    $('.additional_data .selected_delivery_type .value').html(type);
    $('.additional_data .delivery_price .value').html(price);
    $('.sum-items-order .total').html(total);
}
function openTableCard(){

    // $('.wrapp-btn-calculate .btn-calculate').click(function(){
    //     $('.select-company-delivery .body-table').slideDown();
    //     $('.select-company-delivery .head-table .open-table').addClass('active');
    //     return false;
    // });
    //
    // $('.select-company-delivery .head-table .open-table').click(function(){
    //     $(this).toggleClass('active');
    //     $(this).parents('.head-table').next('.body-table').slideToggle();
    // });
}
function trueQuickOrder(name, phone){
    $.ajax({
        url: '/local/ajax/fastbuy/process.php',
        data: {
            'NAME': name,
            'PHONE': phone
        },
        type: "POST",
        success: function (data){
            data = JSON.parse(data);
            $('.quick-order-form').modal('show')
            if (data.status == 'success'){
                $(".quick-order-form").on("hidden.bs.modal", function(){
                    window.location = '/catalog/'
                });
                // $('.quick-order-form .table-quick-order,.quick-order-form .form-user-quick-order, .quick-order-form p').remove();
                // $('.quick-order-form .modal-body').append("<p style='margin-top: 20px; text-align: center'>Спасибо за заказ! Наш менеджер свяжется с Вами в ближайшее врермя.</p>")
                $('.quick-order-form .modal-content').append(`<div class="modal-body">
                <div class="title-quick-order">Быстрый заказ в “1 клик”</div>
                <a href="javscript:void()" class="close-modal" onclick="$('.quick-order-form').modal('hide')"></a>
                <p style='margin-top: 20px; text-align: center'>Спасибо, Ваш заказ принят!</p>
                <p>Наши менеджеры свяжутся с вами в ближайшее время.</p>
                <p>Номер заказа: ${data.id}</p>
                <p>Всю информацию о заказе, оплате и доставке вы сможете посмотреть в личном кабинете.</p>
                <p><a href="javascript:void(0)" onclick="$('.quick-order-form').modal('hide')">Продолжить покупки.</a></p>
                <p>Присоединитесь к нам в социальных сетях:</p>
                <div class="list-social">
                    <a href="https://www.youtube.com/channel/UCNoSo5_n22ZU91I-h_KW4Vg" target="_blank"><img src="/local/templates/czebra_daewoo/front/img/mobil/yt-footer.svg" alt=""></a>
                    <a href="https://vk.com/daewoopowerproducts" target="_blank"><img src="/local/templates/czebra_daewoo/front/img/mobil/vk-footer.svg" alt=""></a>
                    <a href="https://www.instagram.com/daewoo_power_products/" target="_blank"><img src="/local/templates/czebra_daewoo/front/img/mobil/insta-footer.svg" alt=""></a>
                    <a href="https://www.facebook.com/daewoopowerproductsrussia/" target="_blank"><img src="/local/templates/czebra_daewoo/front/img/mobil/fb-footer.svg" alt=""></a>
                    <a href="https://ok.ru/group/52738602827857/" target="_blank"><img src="/local/templates/czebra_daewoo/front/img/odn.svg" alt=""></a>
                </div>
                `);
            }
        }
    })
}
function mobileMenuHideChat(){
    $('.icon-mob-menu span').on('click', function (){
        $('.comagic-c-consultant-label').css('display', 'none')
    })
    $('.close-mobil-menu a').on('click', function (){
        $('.comagic-c-consultant-label').css('display', 'block')
    })
}

function addGoals(){
    $('[data-czaction="addtocart"]').click(function(){
        ym(31362968,'reachGoal','kupit');
    });
    $('a[id^="btn_form_FORM_ANALOG"]').click(function(){
        ym(31362968,'reachGoal','podbor');
    });
    $('#btn_form_FORM_PRICE_DROP').click(function(){
        ym(31362968,'reachGoal','podpisatsay');
    });
    $('#btn_form_FORM_REVIEWS').click(function(){
        ym(31362968,'reachGoal','otzyv');
    });
}