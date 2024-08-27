
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



// Thêm Post Type mới
function twentytwentyfour_child_create_post_type() {
    register_post_type( 'my_custom_post_type',
      array(
        'labels' => array(
          'name' => 'Bài viết tùy chỉnh', // Tên hiển thị cho Post Type
          'singular_name' => 'Bài viết tùy chỉnh', // Tên hiển thị cho một bài viết
          'add_new' => 'Thêm mới',
          'add_new_item' => 'Thêm bài viết mới',
          'edit_item' => 'Chỉnh sửa bài viết',
          'new_item' => 'Bài viết mới',
          'view_item' => 'Xem bài viết',
          'search_items' => 'Tìm kiếm bài viết',
          'not_found' => 'Không tìm thấy bài viết',
          'not_found_in_trash' => 'Không tìm thấy bài viết trong thùng rác',
        ),
        'public' => true, // Cho phép hiển thị Post Type công khai
        'has_archive' => true, // Cho phép tạo archive cho Post Type
        'menu_position' => 5, // Vị trí trong menu quản trị
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ), // Hỗ trợ các tính năng cho Post Type
      )
    );
  }
  add_action( 'init', 'twentytwentyfour_child_create_post_type' );


function create_post_type() {
  // ... (code tạo post type my_custom_post_type) ...

  register_taxonomy( 'product_type', 'my_custom_post_type', array(
    'labels' => array(
      'name' => 'Loại sản phẩm',
      'singular_name' => 'Loại sản phẩm',
    ),
    'hierarchical' => true, // Cho phép tạo phân cấp cho Taxonomy
    'public' => true,
  ));
}
add_action( 'init', 'create_post_type' );


// Trong template-parts/content-my_custom_post_type.php
$terms = get_the_terms( get_the_ID(), 'product_type' );
if ( $terms ) {
  echo '<div class="product-type">';
  foreach ( $terms as $term ) {
    echo $term->name;
  }
  echo '</div>';
}
?>