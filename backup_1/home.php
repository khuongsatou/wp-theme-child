<?php
    get_header();
?>

<form method="GET" id="sort-posts-form">
    <label for="sortby">Sắp xếp theo:</label>
    <select name="sortby" id="sortby">
        <option value="date" <?php selected( isset($_GET['sortby']) ? $_GET['sortby'] : 'date' , 'date' ); ?>>Ngày đăng</option>
        <option value="title" <?php selected( isset($_GET['sortby']) ? $_GET['sortby'] : 'title' , 'title' ); ?>>Tiêu đề</option>
        <option value="rand" <?php selected( isset($_GET['sortby']) ? $_GET['sortby'] : 'rand' , 'rand' ); ?>>Ngẫu nhiên</option>
    </select>
    <button type="submit">Sắp xếp</button>
</form>

<div class="view-switcher">
    <button id="list-view" class="switch-view <?php echo isset($_GET['view']) && $_GET['view'] == 'list' ? 'active' : ''; ?>">Danh sách</button>
    <button id="grid-view" class="switch-view <?php echo !isset($_GET['view']) || $_GET['view'] == 'grid' ? 'active' : ''; ?>">Lưới</button>
</div>

<form method="GET" id="view-switcher-form">
    <input type="hidden" name="view" id="view-input" value="<?php echo isset($_GET['view']) ? $_GET['view'] : 'grid'; ?>">
</form>



<?php
$sortby = isset($_GET['sortby']) ? $_GET['sortby'] : 'date';
// Truy vấn bài viết từ Custom Post Type
$args = array(
    'post_type' => 'portfolio', // Thay 'portfolio' bằng tên CPT của bạn
    'posts_per_page' => 10, // Số lượng bài viết muốn hiển thị
    'orderby' => $sortby,
    'order' => ($sortby === 'title') ? 'ASC' : 'DESC',
);

$custom_query = new WP_Query( $args );

if ( $custom_query->have_posts() ) : ?>
    <div class="custom-post-list">
        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
            <div class="custom-post-item">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                <div class="post-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <?php
    // Phân trang nếu cần
    the_posts_pagination();
else : ?>
    <p>Không có bài viết nào được tìm thấy.</p>
<?php endif; ?>

<?php
// Khôi phục lại truy vấn gốc
wp_reset_postdata();
?>



<?php
    get_footer();
?>