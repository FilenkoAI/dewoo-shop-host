$(function(){
    $('.useful-reviews a').on('click', function (event){
        event.preventDefault();
        let container = $(this).parent().parent()
        let reviewId = container.data('review');
        let type = $(this).data('action');
        let session = BX.bitrix_sessid();
        let data = {
            reviewId,
            type,
            session: session
        }
        $.ajax({
            type: "GET",
            url: '/local/ajax/likes.php',
            data: data,
            timeout: 3000,
            success: function (data) {
                data = JSON.parse(data);
                console.log(data);
                if(data.IS_ERROR == 'N'){
                    container.find(data.CHANGE_FIRST.selector).text(data.CHANGE_FIRST.value);
                    if(data.CHANGE_SECOND){
                        container.find(data.CHANGE_SECOND.selector).text(data.CHANGE_SECOND.value);
                    }
                }
            }
        });
    })

})

