document.addEventListener('DOMContentLoaded', function () {
    var listViewButton = document.getElementById('list-view');
    var gridViewButton = document.getElementById('grid-view');
    var viewInput = document.getElementById('view-input');
    var customPostList = document.querySelector('.custom-post-list');
    var form = document.getElementById('view-switcher-form');

    listViewButton.addEventListener('click', function () {
        viewInput.value = 'list';
        form.submit();
    });

    gridViewButton.addEventListener('click', function () {
        viewInput.value = 'grid';
        form.submit();
    });

    if (window.location.search.includes('view=list')) {
        customPostList.classList.remove('grid-view');
    } else {
        customPostList.classList.add('grid-view');
    }
});