<?php get_header(); ?>

<main id="main-content" class="site-main" role="main">
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <span class="posted-on"><?php echo get_the_date(); ?></span>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <footer class="entry-footer">
                <?php
                // Hiển thị các taxonomy liên quan nếu có
                $terms = get_the_terms( get_the_ID(), 'yatch-type' );
                if ( $terms && ! is_wp_error( $terms ) ) :
                    $yatch_types = wp_list_pluck( $terms, 'name' );
                    echo '<div class="yatch-types">' . esc_html( implode( ', ', $yatch_types ) ) . '</div>';
                endif;
                ?>
            </footer>
        </article>

        <?php
        // Nếu bạn muốn hiển thị phần bình luận
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    endwhile;
    ?>
</main><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
