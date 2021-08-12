$(function(){
    $(document).on('click', '[data-show-more]', function(){
        var btn = $(this);
        var page = btn.attr('data-next-page');
        var id = btn.attr('data-show-more');
        var bx_ajax_id = btn.attr('data-ajax-id');
        var block_id = "#wrap_news_"+bx_ajax_id;    //то куда будет вставляться догружаемый материал, можно менять
        
        var data = {
            bxajaxid: bx_ajax_id
        };
        data['PAGEN_' + id] = page;

        $(this).remove();       //если кнопка обернута div, то нужно будет удалть именно его $(this).parent().remove();
        //тут ещё пайджинг удалить

        $.ajax({
            type: "GET",
            url: window.location.href,
            data: data,
            timeout: 3000,
            success: function(data) {
                console.log(data)
                $(block_id).append(data);
                //при необходимости можно написать код, который будет выполняться после догрузки
            }
        });
    });

    //Если пайджинг, то расскомментировать код, чтобы по ajax не было обновления
    //$(".nav-nav a").click(function(){
    //    window.location = $(this).attr("href");
    //});
});