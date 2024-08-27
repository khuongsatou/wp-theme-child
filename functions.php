
<?php
function twentytwentyfour_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style') );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles' );

function custom_enqueue_scripts() {
    echo 'script loaded ';
    // Enqueue script.js từ Child Theme
    wp_enqueue_script(
        'twentytwentyfour-child-script', // Tên script
        get_stylesheet_directory_uri() . '/js/toggle-list-yatch.js', // Đường dẫn đến script.js
        array(), // Dependencies (các thư viện cần trước, nếu có)
        wp_get_theme()->get('Version'), // this only works if you have Version in the style header, // Phiên bản của script
        true // Đặt true để tải script trong footer, false để tải trong header
    );
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );



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

// Include file custom-post-type-yatch.php
require_once 'inc/custom-post-type-yatch.php';

// Include file custom-taxonomy-yatch-type.php
require_once 'inc/custom-taxonomy-yatch-type.php';
