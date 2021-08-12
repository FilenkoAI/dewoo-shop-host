function checkInFav(){
    $.ajax({
        type: "POST",
        url: '/local/ajax/comparison_list.php',
        success: (data) => {
            data = JSON.parse(data);
            let item = $('.wrapp-compare-favorites-card .compare-card');
            let id = item.data('id');
            for(let key in data){
                if(data[key] == id){
                    item.addClass('selected');
                    break;
                }
            }
        }
    })
    $.ajax({
        type: "POST",
        url: '/local/ajax/favorites_list.php',
        success: (data) => {
            data = JSON.parse(data);
            let item = $('.wrapp-compare-favorites-card .favorites-card');
            let id = item.data('id');
            for(let key in data){
                if(data[key] == id){
                    item.addClass('selected');
                    break;
                }
            }
        }
    })
}


checkInFav();