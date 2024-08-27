document.getElementById('list-view').addEventListener('click', function() {
    document.getElementById('yatch-posts').className = 'list-view';
});

document.getElementById('grid-view').addEventListener('click', function() {
    document.getElementById('yatch-posts').className = 'grid-view';
});


document.getElementById('sort-by').addEventListener('change', function() {
    var sortBy = this.value;
    var currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('orderby', sortBy);
    window.location.href = currentUrl.href;
});

