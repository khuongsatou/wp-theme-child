<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if ( is_singular() ) {
            the_title( '<h1 class="entry-title">', '</h1>' ); // Hiển thị tiêu đề bài viết khi đang xem bài viết đơn lẻ
        } else {
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); // Hiển thị tiêu đề bài viết với liên kết khi đang xem danh sách bài viết
        }
        ?>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(); // Hiển thị hình ảnh nổi bật (featured image) với liên kết tới bài viết ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>

        <div class="entry-meta">
            <?php
            // Hiển thị metadata của bài viết: ngày đăng và tác giả
            echo '<span class="posted-on">' . get_the_date() . '</span>';
            echo '<span class="byline"> by ' . get_the_author() . '</span>';
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if ( is_singular() ) {
            the_content(); // Hiển thị toàn bộ nội dung bài viết khi đang xem bài viết đơn lẻ

            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'textdomain' ),
                'after'  => '</div>',
            ) );
        } else {
            the_excerpt(); // Hiển thị đoạn trích (excerpt) của bài viết khi đang xem danh sách bài viết
        }
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        // Hiển thị category và tag liên quan đến bài viết
        echo '<span class="cat-links">' . __( 'Posted in', 'textdomain' ) . ' ' . get_the_category_list( ', ' ) . '</span>';
        echo '<span class="tags-links">' . get_the_tag_list( '', ', ' ) . '</span>';

        // Hiển thị liên kết để chỉnh sửa bài viết nếu người dùng có quyền chỉnh sửa
        edit_post_link(
            sprintf(
                __( 'Edit <span class="screen-reader-text">%s</span>', 'textdomain' ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
