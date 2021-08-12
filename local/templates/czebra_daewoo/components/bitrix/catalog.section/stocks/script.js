$(function () {
    $(document).on('click', '[data-show-more]', function () {
        let btn = $(this);
        let page = btn.attr('data-next-page');
        let id = btn.attr('data-show-more');
        let bx_ajax_id = btn.attr('data-ajax-id');
        let block_id = "#wrap_news_" + bx_ajax_id;    //то куда будет вставляться догружаемый материал, можно менять
        let data = {
            bxajaxid: bx_ajax_id
        };
        data['PAGEN_' + id] = page;
        console.log(data)
        //тут ещё пайджинг удалить
        $.ajax({
            type: "GET",
            url: window.location.href,
            data: data,
            timeout: 3000,
            success: (data) => {
                $(block_id).append(data);
                $(this).parent().remove();  //если кнопка обернута div, то нужно будет удалть именно его $(this).parent().remove();
                //при необходимости можно написать код, который будет выполняться после догрузки
                markAddedFavs();
                markAddedCompares();
            }
        });
    });
    markAddedFavs();
    markAddedCompares();
});
