$(function() {
    $(".delete-item-cart").click(function (event) {
        event.preventDefault();
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
        return false;
    });

    $("[name='quantity']").change(function () {
        if ($(this).val().length > 0) {
            var id = $(this).attr('data-id-count');
            $.ajax({
                url: "/local/ajax/basket/?action=update&id=" + id + "&quantity=" + $(this).val(),
                cache: false,
                success: function (data) {
                    var information = JSON.parse(data);
                    var insertText = thousandSeparator(information.SUM_ORDER) + " <span class='rubl'>i</span>";
                    $('.total-price').html(insertText);
                    for (var i in information.ITEM) {
                        insertText = thousandSeparator(information.ITEM[i].SUM) + " <span class='rubl'>i</span>"
                        $('[data-sum="' + information.ITEM[i].ID + '"]').html(insertText);
                    }
                }
            });
        }
    });
});

function thousandSeparator(str) {
    var parts = (str + '').split('.'),
        main = parts[0],
        len = main.length,
        output = '',
        i = len - 1;

    while(i >= 0) {
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
function showEmptyBasket(){
    $(".workarea-cart .container").html('<p>Ваша корзина пуста. Начните делать <a href="/catalog/">покупки прямо сейчас</a>.</p>');
}