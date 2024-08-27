<?php get_header(); ?>

<main id="main-content" class="site-main" role="main">
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

    <?php
    // Lấy giá trị sắp xếp từ query string nếu có
    $orderby = isset( $_GET['orderby'] ) ? $_GET['orderby'] : 'date';
    $meta_key = '';
    $orderby_clause = $orderby;

    // Điều chỉnh meta_key và orderby cho các tùy chọn sắp xếp khác nhau
    if ( $orderby === 'star_rating' ) {
        $meta_key = '_yatch_star_rating';
        $orderby_clause = 'meta_value_num';
    } elseif ( $orderby === 'review_count' ) {
        $meta_key = '_yatch_review_count';
        $orderby_clause = 'meta_value_num';
    } elseif ( $orderby === 'price' ) {
        $meta_key = '_yatch_price';
        $orderby_clause = 'meta_value_num';
    }

    // Tạo custom query để lấy bài viết từ post type 'yatch'
    $args = array(
        'post_type'      => 'yatch',
        'posts_per_page' => 10, // Số bài viết muốn hiển thị
        'order'          => 'DESC', // Sắp xếp theo thứ tự giảm dần
        'orderby'        => $orderby_clause, // Sắp xếp theo tùy chọn
    );

    if ( $meta_key ) {
        $args['meta_key'] = $meta_key;
    }

    $yatch_query = new WP_Query( $args );

    if ( $yatch_query->have_posts() ) :
        ?>
        <div id="yatch-posts" class="list-view">
        <?php
        while ( $yatch_query->have_posts() ) : $yatch_query->the_post();
            ?>
            
            <article <?php post_class(); ?>>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                </header>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </a>
                    </div>
                <?php endif; ?>
            </article>
            <?php
        endwhile;

        // Phân trang nếu cần thiết
        the_posts_pagination();

        ?>
        
        </div>

        <?php



    else :
        echo '<p>No yatchs found.</p>';
    endif;

    // Reset lại dữ liệu của WP_Query
    wp_reset_postdata();
    ?>
</main><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

