<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        <nav id="footer-navigation" class="footer-navigation" role="navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_id'        => 'footer-menu',
            ) );
            ?>
        </nav>
    </div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
