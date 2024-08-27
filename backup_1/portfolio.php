<?php


function custom_post_type_init() {
    $labels = array(
        'name'               => _x( 'Portfolios', 'post type general name' ),
        'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
        'menu_name'          => _x( 'Portfolios', 'admin menu' ),
        'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar' ),
        'add_new'            => _x( 'Add New', 'portfolio' ),
        'add_new_item'       => __( 'Add New Portfolio' ),
        'new_item'           => __( 'New Portfolio' ),
        'edit_item'          => __( 'Edit Portfolio' ),
        'view_item'          => __( 'View Portfolio' ),
        'all_items'          => __( 'All Portfolios' ),
        'search_items'       => __( 'Search Portfolios' ),
        'parent_item_colon'  => __( 'Parent Portfolios:' ),
        'not_found'          => __( 'No portfolios found.' ),
        'not_found_in_trash' => __( 'No portfolios found in Trash.' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'portfolio' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );

    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'custom_post_type_init' );


function create_custom_taxonomy() {
    $labels = array(
        'name'              => _x( 'Genres', 'taxonomy general name' ),
        'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Genres' ),
        'all_items'         => __( 'All Genres' ),
        'parent_item'       => __( 'Parent Genre' ),
        'parent_item_colon' => __( 'Parent Genre:' ),
        'edit_item'         => __( 'Edit Genre' ),
        'update_item'       => __( 'Update Genre' ),
        'add_new_item'      => __( 'Add New Genre' ),
        'new_item_name'     => __( 'New Genre Name' ),
        'menu_name'         => __( 'Genres' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'genre' ),
    );

    register_taxonomy( 'genre', array( 'portfolio' ), $args );
}
add_action( 'init', 'create_custom_taxonomy' );
