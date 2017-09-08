<?php

/*  Being custom post types */
add_action('init', 'slideshow_register');
function slideshow_register() {
    $labels = array(
        'name' => _x('Custom Slick Slider', 'post type general name'),
        'singular_name' => _x('Slideshow Item', 'post type singular name'),
        'add_new' => _x('Add New', 'slideshow item'),
        'add_new_item' => __('Add New Slideshow Item'),
        'edit_item' => __('Edit Slideshow Item'),
        'new_item' => __('New Slideshow Item'),
        'all_items' => __('All Sliders'),
        'view_item' => __('View Slideshow Item'),
        'search_items' => __('Search Slideshow'),
        'not_found' =>  __('Nothing found'),
        'not_found_in_trash' => __('Nothing found in Trash'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
      );

    register_post_type( 'slideshow' , $args );
}

$labels = array(
    'name' => _x( 'Slider Location', 'taxonomy general name' ),
    'singular_name' => _x( 'Slider Location', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Slider Location' ),
    'all_items' => __( 'All Slider Locations' ),
    'edit_item' => __( 'Edit Slider Location' ),
    'update_item' => __( 'Update Slider Location' ),
    'add_new_item' => __( 'Add Slider Location' ),
    'new_item_name' => __( 'New Slider Location' ),
    'menu_name' => __( 'Slider Location' )
  );

register_taxonomy('slider_location',array('slideshow'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'query_var' => true,
    'show_ui' => true
 ));


add_action("admin_init", "admin_init");

function admin_init(){
  add_meta_box("url-meta", "Slider Options", "url_meta", "slideshow", "side", "low");
}

function url_meta(){
  global $post;
  $custom = get_post_custom($post->ID);
  $url = $custom["url"][0];
  $url_open = $custom["url_open"][0];
  ?>
  <label>URL:</label>
  <input name="url" value="<?php echo $url; ?>" /><br />
  <input type="checkbox" name="url_open"<?php if($url_open == "on"): echo " checked"; endif ?>> URL open in new window?<br />
  <?php
}

add_action('save_post', 'save_details');
function save_details(){
  global $post;

  if( $post->post_type == "slideshow" ) {
      if(!isset($_POST["url"])):
         return $post;
      endif;
      if($_POST["url_open"] == "on") {
        $url_open_checked = "on";
      } else {
        $url_open_checked = "off";
      }
      update_post_meta($post->ID, "url", $_POST["url"]);
      update_post_meta($post->ID, "url_open", $url_open_checked);
  }

}

function wp_rpt_activation_hook() {
    if(function_exists('add_theme_support')) {
        add_theme_support( 'post-thumbnails', array( 'slideshow' ) ); // Add it for posts
    }
    add_image_size('slider', 1920, 645, true);
}
add_action('after_setup_theme', 'wp_rpt_activation_hook');

// Array of custom image sizes to add
$my_image_sizes = array(
    array( 'name'=>'slider', 'width'=>1920, 'height'=>645, 'crop'=>true ),
);

// For each new image size, run add_image_size() and update_option() to add the necesary info.
// update_option() is good because it only updates the database if the value has changed. It also adds the option if it doesn't exist
foreach ( $my_image_sizes as $my_image_size ){
    add_image_size( $my_image_size['name'], $my_image_size['width'], $my_image_size['height'], $my_image_size['crop'] );
    update_option( $my_image_size['name']."_size_w", $my_image_size['width'] );
    update_option( $my_image_size['name']."_size_h", $my_image_size['height'] );
    update_option( $my_image_size['name']."_crop", $my_image_size['crop'] );
}

// Hook into the 'intermediate_image_sizes' filter used by image-edit.php.
// This adds the custom sizes into the array of sizes it uses when editing/saving images.
add_filter( 'intermediate_image_sizes', 'my_add_image_sizes' );
function my_add_image_sizes( $sizes ){
    global $my_image_sizes;
    foreach ( $my_image_sizes as $my_image_size ){
        $sizes[] = $my_image_size['name'];
    }
    return $sizes;
}
/*  End custom post types */


add_shortcode( 'custom_slickslider', 'slick_slider_shortcode' );
function slick_slider_shortcode($attributs = null) {
  global $slickslider_attributs;
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $slickslider_attributs = shortcode_atts(
    array(
      'location' => '',
      'limit' => -1,
    ), $attributs, 'custom_slickslider'
  );
  $args = array(
    'post_type' => 'slideshow',
    'paged' => $paged,
    'posts_per_page' => $slickslider_attributs['limit'],
    'orderby' => 'menu_order',
    'order' => 'ASC'
  );
  if ($slickslider_attributs['location'] != '') {
    $args['tax_query'] = array(
      array( 'taxonomy' => 'slider_location', 'field' => 'slug', 'terms' => $slickslider_attributs['location'] )
    );
  }

  $the_query = new WP_Query( $args );
  $slides = array();
  if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
      $the_query->the_post();
      $custom = get_post_custom($post->ID);
      $url = $custom["url"][0];
      $url_open = $custom["url_open"][0];
      //$image = the_post_thumbnail('full',  array( 'class' => 'slider-bg' ));
      $image = get_the_post_thumbnail(get_the_ID(), 'full', array( 'class' => 'slider-bg' ));

      if ($url_open == "on") {
        $target = " target='_blank'";
      } else {
        $target = "";
      }

      if ($url != "") {
        $image = '<a href="'.$url.'" '.$target.'>'.$image.'</a>';
      }

      $slides[] = '
        <div class="slide">
          '.$image.'
          <div class="container">
            <div class="row">
                <div class="col col-md-10 col-md-offset-1 slide-caption">
                  '.get_the_content().'
                </div>
            </div>
          </div>
        </div>';
    }
  }
  wp_reset_query();

  return '
  <div class="hero-slider">
    '.implode('', $slides).'
  </div>';
}
?>