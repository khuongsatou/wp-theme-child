<?php
function twentytwentyfour_child_enqueue_styles() {

    echo 'style loaded ';
    $parent_style = 'twentytwentyfour-style'; // Đây là handle của style từ Parent Theme

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twentytwentyfour-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        // array(),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'twentytwentyfour_child_enqueue_styles' );



function custom_enqueue_scripts() {
    echo 'script loaded ';
    // Enqueue script.js từ Child Theme
    wp_enqueue_script(
        'twentytwentyfour-child-script', // Tên script
        get_stylesheet_directory_uri() . '/script.js', // Đường dẫn đến script.js
        array(), // Dependencies (các thư viện cần trước, nếu có)
        wp_get_theme()->get('Version'), // this only works if you have Version in the style header, // Phiên bản của script
        true // Đặt true để tải script trong footer, false để tải trong header
    );
}

add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );


require 'portfolio.php';
