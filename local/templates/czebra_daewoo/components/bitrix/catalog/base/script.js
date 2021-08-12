let sortSelect = $('.sorting .select');
let countToShowSelect = $('.show-count-items .select');
if(sortSelect){
    sortSelect.on('change', function () {
        let currentUrl = new URL(window.location);
        let sort = this.options[this.selectedIndex].value;
        currentUrl.searchParams.delete('sort');
        currentUrl.searchParams.append('sort', sort);
        window.location.href = currentUrl;
    })
}
if(countToShowSelect){
    countToShowSelect.on('change', function (){
        let currentUrl = new URL(window.location);
        let sort = this.options[this.selectedIndex].value;
        currentUrl.searchParams.delete('count_to_show');
        currentUrl.searchParams.append('count_to_show', sort);
        window.location.href = currentUrl;
    })
}
