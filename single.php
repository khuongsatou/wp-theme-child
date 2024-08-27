
<?php get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php 
            // Kiểm tra xem bài viết hiện tại có phải là Post Type mới hay không
            if ( get_post_type() == 'my_custom_post_type' ) :
              the_title( '<h1 class="entry-title">', '</h1>' ); 
            else :
              // Hiển thị tiêu đề mặc định nếu không phải là Post Type mới
              the_title( '<h2 class="entry-title">', '</h2>' );
            endif;
          ?>
        </header>

        <div class="entry-content">
          <?php 
            // Kiểm tra xem bài viết hiện tại có phải là Post Type mới hay không
            if ( get_post_type() == 'my_custom_post_type' ) :
              the_content(); 
            else :
              // Hiển thị nội dung mặc định nếu không phải là Post Type mới
              the_excerpt();
            endif;
          ?>
        </div>

        <footer class="entry-footer">
          <?php
          wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'my-theme-child' ),
            'after'  => '</div>',
          ) );
          ?>
        </footer>
      </article>
    </div>
    <div class="col-md-4">
      <?php get_sidebar(); ?>
    </div>
  </div>
</div>


<?php get_footer(); ?>