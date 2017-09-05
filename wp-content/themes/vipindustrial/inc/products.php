<?php

add_action( 'init', 'product_register' );
function product_register() {
  $labels = array(
    'name' => _x('Products', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add New', 'Product'),
    'add_new_item' => __('Add New Product'),
    'edit_item' => __('Edit Product'),
    'new_item' => __('New Product'),
    'all_items' => __('All Products'),
    'view_item' => __('View Products'),
    'search_items' => __('Search Products'),
    'not_found' =>  __('No products found'),
    'not_found_in_trash' => __('No products found in Trash'),
    'parent_item_colon' => '',
    'menu_name' => 'Products'
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'register_meta_box_cb' => 'dj_product_meta',
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-generic',
    'taxonomies' => array('featured'),
    'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )
  );
  register_post_type('products',$args);
}

$labels = array(
    'name' => _x( 'Product Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Product Categories' ),
    'all_items' => __( 'All Product Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Product Category' ),
    'update_item' => __( 'Update Product Category' ),
    'add_new_item' => __( 'Add Product Category' ),
    'new_item_name' => __( 'New Product Category' ),
    'menu_name' => __( 'Product Categories' )
  );

register_taxonomy('product_categories',array('products'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'query_var' => true,
    'show_ui' => true
 ));

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

/**/
//hook to add a meta box
add_action( 'add_meta_boxes', 'dj_product_meta' );
function dj_product_meta() {
    //create a custom meta box
    add_meta_box( 'dj-meta', 'Featured Product', 'dj_product_function', 'products', 'normal', 'high' );
}

function dj_product_function( $post ) {
    //retrieve the meta data values if they exist
    $dj_product_featured = get_post_meta( $post->ID, '_dj_product_featured', true );

    echo 'Select yes below to make product featured';
    ?>
    <p>Featured:
    <select name="dj_product_featured">
        <option value="No" <?php selected( $dj_product_featured, 'no' ); ?>>No</option>
        <option value="Yes" <?php selected( $dj_product_featured, 'yes' ); ?>>Yes</option>
    </select>
    </p>
    <?php
}

//hook to save the meta box data
add_action( 'save_post', 'dj_product_save_meta' );
function dj_product_save_meta( $post_ID ) {
    global $post;
    if( $post->post_type == "products" ) {
        if ( isset( $_POST ) ) {
            update_post_meta( $post_ID, '_dj_product_featured', strip_tags( $_POST['dj_product_featured'] ) );
        }
    }
}
?>