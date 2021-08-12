let sortSelect = document.querySelector('.sorting-videoreviews .select');
if(sortSelect){
    sortSelect.change = function () {
        let currentUrl = new URL(window.location);
        let sort = this.options[this.selectedIndex].value;
        currentUrl.searchParams.delete('sort');
        currentUrl.searchParams.append('sort', sort);
        window.location.href = currentUrl;
    }
}
