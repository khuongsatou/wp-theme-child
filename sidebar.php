<aside id="secondary" class="widget-area">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); // Hiển thị các widget đã được thêm vào sidebar từ WordPress admin ?>
    <?php else : ?>
        <!-- Hiển thị nội dung mặc định nếu chưa có widget nào -->
        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Search', 'textdomain' ); ?></h2>
            <?php get_search_form(); // Hiển thị form tìm kiếm ?>
        </section>

        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Recent Posts', 'textdomain' ); ?></h2>
            <ul>
                <?php
                // Hiển thị 5 bài viết gần đây nhất
                $recent_posts = wp_get_recent_posts( array(
                    'numberposts' => 5,
                    'post_status' => 'publish',
                ) );
                foreach ( $recent_posts as $post ) :
                ?>
                    <li>
                        <a href="<?php echo get_permalink( $post['ID'] ); ?>">
                            <?php echo esc_html( $post['post_title'] ); ?>
                        </a>
                    </li>
                <?php endforeach; wp_reset_query(); ?>
            </ul>
        </section>

        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Categories', 'textdomain' ); ?></h2>
            <ul>
                <?php
                // Hiển thị danh mục
                wp_list_categories( array(
                    'title_li' => '',
                ) );
                ?>
            </ul>
        </section>

        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Archives', 'textdomain' ); ?></h2>
            <ul>
                <?php
                // Hiển thị danh sách lưu trữ theo tháng
                wp_get_archives( array(
                    'type' => 'monthly',
                    'limit' => 12,
                ) );
                ?>
            </ul>
        </section>

        <section class="widget">
            <h2 class="widget-title"><?php esc_html_e( 'Meta', 'textdomain' ); ?></h2>
            <ul>
                <?php wp_register(); // Hiển thị liên kết đăng nhập/đăng ký ?>
                <li><?php wp_loginout(); ?></li>
            </ul>
        </section>
    <?php endif; ?>
</aside><!-- #secondary -->
