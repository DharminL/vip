<?php
/**
 * VIP Industrial functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * VIP Industrial only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function vipindustrial_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/vipindustrial
	 * If you're building a theme based on VIP Industrial, use a find and replace
	 * to change 'vipindustrial' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'vipindustrial' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'vipindustrial-featured-image', 2000, 1200, true );

	add_image_size( 'vipindustrial-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Main Menu', 'vipindustrial' ),
		'footer-menu' => __( 'Footer Menu', 'vipindustrial' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 550,
		'height'      => 130,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', vipindustrial_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'vipindustrial' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'vipindustrial' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'vipindustrial' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'vipindustrial' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'vipindustrial' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters VIP Industrial array of starter content.
	 *
	 * @since VIP Industrial 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'vipindustrial_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'vipindustrial_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vipindustrial_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( vipindustrial_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter VIP Industrial content width of the theme.
	 *
	 * @since VIP Industrial 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'vipindustrial_content_width', $content_width );
}
add_action( 'template_redirect', 'vipindustrial_content_width', 0 );

/**
 * Register custom fonts.
 */
function vipindustrial_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'vipindustrial' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since VIP Industrial 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function vipindustrial_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'vipindustrial-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'vipindustrial_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vipindustrial_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'vipindustrial' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'vipindustrial' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Column', 'vipindustrial' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'vipindustrial' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Column Area', 'vipindustrial' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area', 'vipindustrial' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Column', 'vipindustrial' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'vipindustrial' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

    // Fourth Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Forth Footer Column', 'vipindustrial' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The forth footer widget area', 'vipindustrial' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

}
add_action( 'widgets_init', 'vipindustrial_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since VIP Industrial 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function vipindustrial_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vipindustrial' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'vipindustrial_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since VIP Industrial 1.0
 */
function vipindustrial_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'vipindustrial_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function vipindustrial_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
//add_action( 'wp_head', 'vipindustrial_pingback_header' );

/**
 * Display custom color CSS.
 */
function vipindustrial_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo vipindustrial_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'vipindustrial_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function vipindustrial_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'vipindustrial-fonts', vipindustrial_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'vipindustrial-style', get_stylesheet_uri() );
	// Icon fonts
	wp_enqueue_style( 'vipindustrial-fontawesome-style', get_theme_file_uri( '/assets/css/font-awesome.min.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-flaticon-style', get_theme_file_uri( '/assets/css/flaticon.css' ), array( 'vipindustrial-style' ), '1.0' );

	// Bootstrap core CSS
	wp_enqueue_style( 'vipindustrial-bootstrap-style', get_theme_file_uri( '/assets/css/bootstrap.min.css' ), array( 'vipindustrial-style' ), '1.0' );

	// Plugins for this template
	wp_enqueue_style( 'vipindustrial-animate-style', get_theme_file_uri( '/assets/css/animate.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-owl-carousel', get_theme_file_uri( '/assets/css/owl.carousel.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-owl-theme', get_theme_file_uri( '/assets/css/owl.theme.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-slick-style', get_theme_file_uri( '/assets/css/slick.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-slick-theme', get_theme_file_uri( '/assets/css/slick-theme.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-owl-transitions', get_theme_file_uri( '/assets/css/owl.transitions.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-jquery-fancybox', get_theme_file_uri( '/assets/css/jquery.fancybox.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-bootstrap-select', get_theme_file_uri( '/assets/css/bootstrap-select.min.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_enqueue_style( 'vipindustrial-magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.css' ), array( 'vipindustrial-style' ), '1.0' );

	// Custom styles for this template
	wp_enqueue_style( 'vipindustrial-main-style', get_theme_file_uri( '/assets/css/style.css' ), array( 'vipindustrial-style' ), '1.0' );


	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'vipindustrial-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'vipindustrial-style' ), '1.0' );
		wp_style_add_data( 'vipindustrial-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'vipindustrial-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'vipindustrial-style' ), '1.0' );
	wp_style_add_data( 'vipindustrial-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// All Javascripts
	wp_enqueue_script( 'vipindustrial-jquery-main', get_theme_file_uri( '/assets/js/jquery.min.js' ), array(), '1.0', true );
	wp_enqueue_script( 'vipindustrial-bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array(), '1.0', true );

	// Plugins for this template
	wp_enqueue_script( 'vipindustrial-plugin-collection', get_theme_file_uri( '/assets/js/jquery-plugin-collection.js' ), array(), '1.0', true );
	wp_enqueue_script( 'vipindustrial-portfolio', get_theme_file_uri( '/assets/js/portfolio.js' ), array(), '1.0', true );
	// Google map api
	wp_enqueue_script( 'vipindustrial-google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCYASi1EEKKgncdw8Xim7Av50zmQVXQshk', array(), '1.0', true );
    // Custom script for this template
	wp_enqueue_script( 'vipindustrial-script', get_theme_file_uri( '/assets/js/script.js' ), array(), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vipindustrial_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since VIP Industrial 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function vipindustrial_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'vipindustrial_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since VIP Industrial 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function vipindustrial_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'vipindustrial_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since VIP Industrial 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function vipindustrial_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'vipindustrial_post_thumbnail_sizes_attr', 10, 3 );

function change_custom_logo_class( $html ) {
    //$html = str_replace( 'custom-logo', 'navbar-brand', $html );
    $html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

    return $html;
}
add_filter( 'get_custom_logo', 'change_custom_logo_class' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since VIP Industrial 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function vipindustrial_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'vipindustrial_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/**
 * Products Custom post type.
 */
require get_parent_theme_file_path( '/inc/products.php' );

/**
 * Slick Custom slider.
 */
require get_parent_theme_file_path( '/inc/custom-slider.php' );

/**
* Social Media icon helper functions
*/
function vipindustrial_get_social_sites() {
	// Store social site names in array
	$social_sites = array(
		'facebook',
		'twitter',
		'linkedin',
		'instagram',
		'google-plus',
		'rss',
		'youtube',
	);
	return $social_sites;
}

// Get user input from the Customizer and output the linked social media icons
function vipindustrial_show_social_icons() {
	$social_sites = vipindustrial_get_social_sites();

	// Any inputs that aren't empty are stored in $active_sites array
	foreach( $social_sites as $social_site ) {
		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[] = $social_site;
		}
	}

	// For each active social site, add it as a list item
	if ( !empty( $active_sites ) ) {
		echo "<ul class='social-links'>";
			foreach ( $active_sites as $active_site ) { ?>
				<li>
					<a href="<?php echo get_theme_mod( $active_site ); ?>">
						<?php if( $active_site == 'vimeo' ) { ?>
							<i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
						} else if( $active_site == 'email' ) { ?>
							<i class="fa fa-envelope"></i> <?php
						} else { ?>
							<i class="fa fa-<?php echo $active_site; ?>"></i> <?php
						} ?>
					</a>
				</li>
			<?php }
		echo "</ul>";
	}
}

function vipindustrial_sanitize_email( $email, $setting ) {
	return ( is_email($email) ? $email : $setting->default );
}

function vipindustrial_sanitize_number_absint( $number, $setting ) {
  // If the input is an absolute integer, return it; otherwise, return the default
  return ( $number ? $number : $setting->default );
}

function vipindustrial_display_email() {
	echo '<i class="fa fa-envelope-o" aria-hidden="true"></i>'. get_theme_mod( 'vipindustrial_email' );
}

function vipindustrial_display_phonenumber() {
	echo '<i class="fa fa-volume-control-phone" aria-hidden="true"></i>'. get_theme_mod( 'vipindustrial_phone' );
}
function vipindustrial_sanitize_map( $map, $setting ) {
	return ( $map ? $map : $setting->default );
}
function vipindustrial_display_address() {
	echo get_theme_mod( 'vipindustrial_map' );
}
//search sidebar

/* ----------- Search Form ---------- */
add_filter( 'get_search_form', 'my_search_form' );
function my_search_form( $form ) {
    $form = '
	<div class="widget search-widget">
	<form role="search" method="get" id="searchform" class="searchform form" action="' . home_url( '/' ) . '" >
        <input type="text" value="' . get_search_query() . '" name="s" id="s" class="s-in form-control" placeholder="Search here.." />
    </form>
	</div>
	';

    return $form;
}
/* ----------- End ---------- */

//body class add for blog
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {
    if ( is_home() ) {
        $classes[] = 'blog-with-sidebar-page blog-with-right-sidebar blog-pg';
    }
	if(is_single())
	{
		$classes[] = 'blog-details-page';
	}
	if(is_page(264))
	{
		$classes[] = 'faq-pg';
	}
    return $classes;
}

//blog pagination 
function wpbeginner_numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link('&#8249;') );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="current"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>�</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="current"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>�</li>' . "\n";
 
        $class = $paged == $max ? ' class="current"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link('&raquo;') );
 
    echo '</ul>' . "\n";
 
}