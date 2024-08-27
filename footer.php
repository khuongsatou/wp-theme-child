</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="site-info">
        <?php
        // Hiển thị tên trang và năm hiện tại
        echo '&copy; ' . date('Y') . ' ' . get_bloginfo('name');
        ?>
        <span class="sep"> | </span>
        <?php
        // Hiển thị link đến trang chủ
        printf( esc_html__( 'Proudly powered by %s', 'textdomain' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'textdomain' ) ) . '">WordPress</a>' );
        ?>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
