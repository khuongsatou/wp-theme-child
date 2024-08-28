<?php
// Tạo custom post type 'yatch'
function create_yatch_post_type() {
    $labels = array(
        'name'                  => _x( 'Yatchs', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Yatch', 'Post type singular name', 'textdomain' ),
        'menu_name'             => _x( 'Yatchs', 'Admin Menu text', 'textdomain' ),
        'name_admin_bar'        => _x( 'Yatch', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Yatch', 'textdomain' ),
        'new_item'              => __( 'New Yatch', 'textdomain' ),
        'edit_item'             => __( 'Edit Yatch', 'textdomain' ),
        'view_item'             => __( 'View Yatch', 'textdomain' ),
        'all_items'             => __( 'All Yatchs', 'textdomain' ),
        'search_items'          => __( 'Search Yatchs', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Yatchs:', 'textdomain' ),
        'not_found'             => __( 'No yatchs found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No yatchs found in Trash.', 'textdomain' ),
        'featured_image'        => _x( 'Yatch Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
        'archives'              => _x( 'Yatch archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into yatch', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this yatch', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter yatchs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Yatchs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Yatchs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'yatch' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'menu_icon'          => 'dashicons-admin-site',
    );

    register_post_type( 'yatch', $args );
}

add_action( 'init', 'create_yatch_post_type' );


# Hiển Thị Các Box trong editing
function add_yatch_meta_boxes() {
    add_meta_box(
        'yatch_details',
        'Yatch Details',
        'render_yatch_meta_boxes',
        'yatch',
        'side',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_yatch_meta_boxes' );

function render_yatch_meta_boxes( $post ) {
    $star_rating = get_post_meta( $post->ID, '_yatch_star_rating', true );
    $review_count = get_post_meta( $post->ID, '_yatch_review_count', true );
    $price = get_post_meta( $post->ID, '_yatch_price', true );
    ?>
    <p>
        <label for="yatch_star_rating">Star Rating:</label>
        <input type="number" name="yatch_star_rating" id="yatch_star_rating" value="<?php echo esc_attr( $star_rating ); ?>" min="1" max="5" />
    </p>
    <p>
        <label for="yatch_review_count">Review Count:</label>
        <input type="number" name="yatch_review_count" id="yatch_review_count" value="<?php echo esc_attr( $review_count ); ?>" />
    </p>
    <p>
        <label for="yatch_price">Price:</label>
        <input type="number" name="yatch_price" id="yatch_price" value="<?php echo esc_attr( $price ); ?>" />
    </p>
    <?php
}

function save_yatch_meta_boxes( $post_id ) {
    if ( array_key_exists( 'yatch_star_rating', $_POST ) ) {
        update_post_meta( $post_id, '_yatch_star_rating', $_POST['yatch_star_rating'] );
    }
    if ( array_key_exists( 'yatch_review_count', $_POST ) ) {
        update_post_meta( $post_id, '_yatch_review_count', $_POST['yatch_review_count'] );
    }
    if ( array_key_exists( 'yatch_price', $_POST ) ) {
        update_post_meta( $post_id, '_yatch_price', $_POST['yatch_price'] );
    }
}
add_action( 'save_post', 'save_yatch_meta_boxes' );


# Hiển Thị Các Cột Tùy Chỉnh Trong Admin
function add_yatch_columns( $columns ) {
    $columns['star_rating'] = 'Star Rating';
    $columns['review_count'] = 'Review Count';
    $columns['price'] = 'Price';
    return $columns;
}
add_filter( 'manage_yatch_posts_columns', 'add_yatch_columns' );

function fill_yatch_columns( $column, $post_id ) {
    if ( $column === 'star_rating' ) {
        echo get_post_meta( $post_id, '_yatch_star_rating', true );
    } elseif ( $column === 'review_count' ) {
        echo get_post_meta( $post_id, '_yatch_review_count', true );
    } elseif ( $column === 'price' ) {
        echo get_post_meta( $post_id, '_yatch_price', true );
    }
}
add_action( 'manage_yatch_posts_custom_column', 'fill_yatch_columns', 10, 2 );


# CURD list yatch


function ajax_search_yatchs() {
    $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';
    $orderby = isset($_POST['sort_by']) ? sanitize_text_field($_POST['sort_by']) : 'date';
    $meta_key = '';
    $orderby_clause = $orderby;

    if ($orderby === 'star_rating') {
        $meta_key = '_yatch_star_rating';
        $orderby_clause = 'meta_value_num';
    } elseif ($orderby === 'review_count') {
        $meta_key = '_yatch_review_count';
        $orderby_clause = 'meta_value_num';
    } elseif ($orderby === 'price') {
        $meta_key = '_yatch_price';
        $orderby_clause = 'meta_value_num';
    }

    $args = array(
        'post_type' => 'yatch',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => $orderby_clause,
        's' => $search_term,
    );

    if ($meta_key) {
        $args['meta_key'] = $meta_key;
    }

    $yatch_query = new WP_Query($args);

    if ($yatch_query->have_posts()) {
        while ($yatch_query->have_posts()) {
            $yatch_query->the_post();
            ?>
            <article <?php post_class(); ?>>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                </header>
                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <div class="yatch-meta">
                    <p><strong>Star Rating:</strong> <?php echo get_post_meta(get_the_ID(), '_yatch_star_rating', true); ?> stars</p>
                    <p><strong>Review Count:</strong> <?php echo get_post_meta(get_the_ID(), '_yatch_review_count', true); ?> reviews</p>
                    <p><strong>Price:</strong> $<?php echo number_format(get_post_meta(get_the_ID(), '_yatch_price', true)); ?></p>
                </div>
            </article>
            <?php
        }
    } else {
        echo '<p>No yachts found.</p>';
    }

    wp_reset_postdata();

    die(); // Dừng việc xử lý
}

add_action('wp_ajax_search_yatchs', 'ajax_search_yatchs');
add_action('wp_ajax_nopriv_search_yatchs', 'ajax_search_yatchs');

