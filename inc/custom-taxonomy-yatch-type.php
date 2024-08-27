<?php
// Tạo custom taxonomy 'Yatch Type' cho post type 'yatch'
function create_yatch_type_taxonomy() {
    $labels = array(
        'name'              => _x( 'Yatch Types', 'taxonomy general name', 'textdomain' ),
        'singular_name'     => _x( 'Yatch Type', 'taxonomy singular name', 'textdomain' ),
        'search_items'      => __( 'Search Yatch Types', 'textdomain' ),
        'all_items'         => __( 'All Yatch Types', 'textdomain' ),
        'parent_item'       => __( 'Parent Yatch Type', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Yatch Type:', 'textdomain' ),
        'edit_item'         => __( 'Edit Yatch Type', 'textdomain' ),
        'update_item'       => __( 'Update Yatch Type', 'textdomain' ),
        'add_new_item'      => __( 'Add New Yatch Type', 'textdomain' ),
        'new_item_name'     => __( 'New Yatch Type Name', 'textdomain' ),
        'menu_name'         => __( 'Yatch Type', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true, // Sử dụng phân cấp như Category
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'yatch-type' ),
    );

    register_taxonomy( 'yatch-type', array( 'yatch' ), $args );
}

add_action( 'init', 'create_yatch_type_taxonomy', 0 );
