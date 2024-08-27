
<?php
function twentytwentyfour_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles' );


// Ví dụ: Thêm một chức năng tùy chỉnh cho theme child
function twentytwentyfour_child_main_function() {
    // Nội dung hàm tùy chỉnh của bạn
    echo "load main";
}

/**
 * Register Custom Navigation Walker
 */




add_action( 'init', 'twentytwentyfour_child_main_function' );


// require_once "template-parts/content.php";



