<?php get_header(); ?>

<main id="main-content" class="site-main" role="main">
    <!-- Form tìm kiếm -->
    <div class="search-form-container">
        <input type="text" id="search-term" placeholder="Search Yachts..." />
        <button id="search-button">Search</button>
    </div>

    <div class="view-toggle">
        <button id="list-view">List View</button>
        <button id="grid-view">Grid View</button>
    </div>
    <div class="sort-options">
        <label for="sort-by">Sort by:</label>
        <select id="sort-by">
            <option value="date">Date</option>
            <option value="star_rating">Star Rating</option>
            <option value="review_count">Review Count</option>
            <option value="price">Price</option>
        </select>
    </div>

    <!-- Kết quả tìm kiếm -->
    <div id="yatch-posts" class="list-view">
        <?php
        // Hiển thị danh sách mặc định (có thể giống như trước)
        ?>
    </div>
</main><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>




<script>
jQuery(document).ready(function($) {
    function fetchYatchs() {
        var searchTerm = $('#search-term').val();
        var sortBy = $('#sort-by').val();

        var data = {
            'action': 'search_yatchs',
            'search_term': searchTerm,
            'sort_by': sortBy
        };

        $.post('<?php echo admin_url('admin-ajax.php'); ?>', data, function(response) {
            $('#yatch-posts').html(response);
        });
    }

    // Gọi hàm fetchYatchs() ngay khi trang được load
    fetchYatchs();

    // Tìm kiếm khi nhấn nút search
    $('#search-button').on('click', function() {
        fetchYatchs();
    });

    // Sắp xếp khi thay đổi tùy chọn sort
    $('#sort-by').on('change', function() {
        fetchYatchs();
    });

    // Chuyển đổi giữa chế độ list và grid
    $('#list-view').on('click', function() {
        $('#yatch-posts').removeClass('grid-view').addClass('list-view');
    });

    $('#grid-view').on('click', function() {
        $('#yatch-posts').removeClass('list-view').addClass('grid-view');
    });
});


</script>