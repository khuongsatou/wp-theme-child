<?php
get_header(); // Gọi header.php
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    while ( have_posts() ) :
        the_post(); // Lấy dữ liệu của bài viết hiện tại
    ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); // Hiển thị tiêu đề bài viết ?></a></h1>
            </header><!-- .entry-header -->

            <div class="entry-meta">
                <?php
                // Hiển thị metadata của bài viết: ngày đăng và tác giả
                echo '<span class="posted-on">' . get_the_date() . '</span>';
                echo '<span class="byline"> by ' . get_the_author() . '</span>';
                ?>
            </div><!-- .entry-meta -->

            <div class="entry-content">
                <?php
                the_content(); // Hiển thị nội dung của bài viết

                wp_link_pages( array(
                    'before' => '<div class="page-links">' . __( 'Pages:', 'textdomain' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php
                // Hiển thị các thông tin khác như category và tag
                echo '<span class="cat-links">' . __( 'Posted in', 'textdomain' ) . ' ' . get_the_category_list( ', ' ) . '</span>';
                echo '<span class="tags-links">' . get_the_tag_list( '', ', ' ) . '</span>';
                ?>
            </footer><!-- .entry-footer -->
        </article><!-- #post-<?php the_ID(); ?> -->

        <?php
        // Nếu có bình luận, hiển thị phần bình luận
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

        // Hiển thị link đến bài viết trước và bài viết tiếp theo
        the_post_navigation( array(
            'prev_text' => '<span class="nav-subtitle">' . __( 'Previous:', 'textdomain' ) . '</span> <span class="nav-title">%title</span>',
            'next_text' => '<span class="nav-subtitle">' . __( 'Next:', 'textdomain' ) . '</span> <span class="nav-title">%title</span>',
        ) );

    endwhile; // Kết thúc vòng lặp
    ?>

    </main><!-- #main -->
</div><!-- #primary -->




<?php
get_sidebar(); // Gọi sidebar.php nếu có
get_footer(); // Gọi footer.php
?>
