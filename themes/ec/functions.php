<?php
/**
 * EC functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage EC
 * @since EC 1.0
 */

/**
 * EC only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentysixteen
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen' );

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
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
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
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentysixteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'twentysixteen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'twentysixteen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'twentysixteen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentysixteen-fonts', twentysixteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'twentysixteen-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentysixteen-style' ), '20160816' );
	wp_style_add_data( 'twentysixteen-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'twentysixteen-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

	wp_enqueue_script( 'twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );

	wp_localize_script( 'twentysixteen-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'twentysixteen' ),
		'collapse' => __( 'collapse child menu', 'twentysixteen' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'twentysixteen_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list'; 

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

add_filter( 'excerpt_length', function($length) {
    return 20;
});

/*-------------- Custom-post-type-Leadership --------------*/

function leadership_post_type() {
	register_post_type( 'leadership',
		array(
			'labels' => array(
				'name' => __( 'Leadership' ),
				'singular_name' => __( 'Leadership' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-admin-users',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail')
		)
	);
}
add_action( 'init', 'leadership_post_type' );

/*-------------- Custom-post-type-Pillars --------------*/

function pillars_post_type() {
	register_post_type( 'Pillars',
		array(
			'labels' => array(
				'name' => __( 'Pillars' ),
				'singular_name' => __( 'Pillars' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-admin-users',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail')
		)
	);
}
add_action( 'init', 'pillars_post_type' );

/*-------------- Custom-post-type-chair-bio --------------*/

function chairbio_post_type() {
	register_post_type( 'Chair Bio',
		array(
			'labels' => array(
				'name' => __( 'Chair Bio' ),
				'singular_name' => __( 'Chair Bio' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-admin-users',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail')
		)
	);
}
add_action( 'init', 'chairbio_post_type' );

/*-------------- Custom-post-type-Press-Release --------------*/

function pressrelease_post_type() {
	register_post_type( 'Press Release',
		array(
			'labels' => array(
				'name' => __( 'Press Release' ),
				'singular_name' => __( 'Press Release' )
			),
		'public' => true,
		'menu_icon'=> 'dashicons-admin-users',
		'has_archive' => true,
		'supports' => array( 'title', 'editor',  'thumbnail')
		)
	);
}
add_action( 'init', 'pressrelease_post_type' );

/*-----------------Event----------------------*/

add_action('admin_enqueue_scripts', 'my_admin_theme_script');

function my_admin_theme_script() {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_script( 'wp-jquery-date-picker', get_template_directory_uri() . '/js/admin.js' );
	
}
function esad_admin_styles() {
  wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');	
}
add_action('admin_print_styles', 'esad_admin_styles');


function save_custom_event_meta($post_id) {
  global $post, $event_meta;
	// verify nonce
	if (!wp_verify_nonce($_POST['event_time_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['event_location_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	if (!wp_verify_nonce($_POST['event_date_noncename'], plugin_basename(__FILE__))) {
        return $post_id;
    }
	
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
	
	$event_meta['event_time'] = $_POST['event_time'];
	$event_meta['event_location'] = $_POST['event_location'];
	$event_meta['event_date'] = date('Y-m-d',strtotime($_POST['event_date']));

    // Add values of $events_meta as custom fields
    foreach ($event_meta as $key => $value) { // Cycle through the $events_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'save_custom_event_meta');

// Event post type
$event_labels = array(
	'name' => _x('Events', 'post type general name'),
	'singular_name' => _x('Event', 'post type singular name'),
	'add_new' => _x('Add New', 'Event'),
	'add_new_item' => __("Add New Event"),
	'edit_item' => __("Edit Event"),
	'new_item' => __("New Event"),
	'view_item' => __("View Events"),
	'search_items' => __("Search Events"),
	'not_found' =>  __('No Events found'),
	'not_found_in_trash' => __('No Events found in Trash'),
	'parent_item_colon' => ''
);
register_post_type( 'event',
	array(
		'hierarchical' => true,
		'labels' => $event_labels,
		'public' => true,
		'query_var' => true,
		'menu_icon' => 'dashicons-businessman',
		'show_ui' => true,
		'exclude_from_search' => true,
		'supports' => array (  'title','editor', 'thumbnail' ),
	)
);

add_action('admin_init', 'custom_meta_vale');
function custom_meta_vale() {
	add_meta_box('custom_info', __('Extra Event Fields', 'quotable'), 'event_extra_info', array( 'event'), 'side', 'low');
}

function event_extra_info(){
	global $post;
	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="event_date_noncename" id="event_date_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="event_time_noncename" id="event_time_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	echo '<input type="hidden" name="event_location_noncename" id="event_location_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// Get the default_product data if its already been entered
  
	echo '<label>Event Date</label><br/><input style="width:100%;" type="text" name="event_date" class="datepicker" id="event_date" value="' . esc_attr( get_post_meta( get_the_ID(), 'event_date', true) ). '" /><br/><br/>';
	echo '<label>Event Time</label><br/><input style="width:100%;" type="text" name="event_time" id="event_time" value="' . esc_attr( get_post_meta( get_the_ID(), 'event_time', true) ). '" /><br/><br/>';
	echo '<label>Event Location</label><br/><textarea rows="2" style="width:100%;"  name="event_location" id="event_location"  />' . esc_attr( get_post_meta( get_the_ID(), 'event_location', true) ). '</textarea><br/><br/>';
}

/*---------------------Upcoming-Event-shortcode----------------------------*/

add_shortcode('upcoming_event_list','upcoming_event_list_shortcode');
function upcoming_event_list_shortcode(){
	$today= date('Y-m-d');query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'meta_query'=>array(
		'key'=>'event_date',
		'value'=> $today,
		'compare'=> '>='
	),
	'order'=>'ASC' ));
		if(have_posts()) {
		while(have_posts()) : the_post();
		$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$result .='
			<div class="event-box">
				<div class="row align-items-center">
					<div class="col-md-3 date">
						<h3>'. date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).'<br /> '.date("Y", strtotime($event_date)).'</h3>
						<p>'. get_post_meta(get_the_ID(),'event_location', true) .'</p>
					</div>
					<div class="col-md-9 event-detail">
						<h2><a href="'. get_permalink() .'"> '. get_the_title() .'</a></h2>
						'. get_the_excerpt() .'
					</div>
				</div>
			</div>';
		endwhile; wp_reset_query();
		} else {
			echo '<div class="event-box"><div class="date text-center"><h3>No Upcoming Event</h3></div></div>';
		}
return $result; }

/*---------------------Past-Event-shortcode----------------------------*/

add_shortcode('past_event_list','past_event_list_shortcode');
function past_event_list_shortcode(){
	$today= date('Y-m-d');
	query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'meta_value',
	'meta_query'=>array(
		'key'=>'event_date',
		'value'=> $today,
		'compare'=> '<'
	),
	'order'=>'DESC' ));
		if(have_posts()) {
		while(have_posts()) : the_post();
		$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$result .='
			<div class="event-box '.strtotime($event_date).'">
				<div class="row align-items-center">
					<div class="col-md-3 date">
						<h3>'. date("d", strtotime($event_date)).', '.date("F", strtotime($event_date)).'<br /> '.date("Y", strtotime($event_date)).'</h3>
						<p>'. get_post_meta(get_the_ID(),'event_location', true) .'</p>
					</div>
					<div class="col-md-9 event-detail">
						<h2><a href="'. get_permalink() .'"> '. get_the_title() .'</a></h2>
						'. get_the_excerpt() .'
					</div>
				</div>
			</div>';
		endwhile; wp_reset_query();
		} else{
			echo '<div class="event-box"><div class="date text-center"><h3>No Past Event</h3></div></div>';
		}
return $result; }

function content($num) {
	$theContent = get_the_content();
	$output = preg_replace('/<img[^>]+./','', $theContent);
	$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
	$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
	$limit = $num+1;
	$content = explode(' ', $output, $limit);
	array_pop($content);
	$content = implode(" ",$content)."...";
	echo $content;
}

/*---------------------Event-gallery-shortcode----------------------------*/

add_shortcode('event_gallery_list','event_gallery_list_shortcode');
function event_gallery_list_shortcode(){
	$today= date('m/d/Y');
	query_posts(array('post_type'=>'event', 'meta_key' => 'event_date',
	'orderby' => 'rand', 'posts_per_page'=> 4,
	/*'meta_query'=>array(
	'key'=>'event_date',
	'value'=> $today,
	'compare'=> '<'
	),*/ 
	'order'=>'ASC' ));
	if(have_posts()) {
		$result .='<div class="mt-5 text-center">
			<h2 class="mb-5">Event <span class="color-red">Gallery</span></h2>
			<div class="row justify-content-center">';
			while(have_posts()) : the_post();
			$event_date = get_post_meta(get_the_ID(),'event_date', true);
			$gallery_data = get_post_meta(get_the_ID(), 'gallery_data', true );
			if ( isset( $gallery_data['image_url'] ) ) 
			{ 
				for( $i = 0; $i < 1; $i++ ) 
				{ 
					$image_url =  $gallery_data['image_url'][$i] ;
					$attachment_id = attachment_url_to_postid($image_url );
					$result .='<div class="col-md-3 slide"><a data-fancybox="gallery" href="'. $gallery_data['image_url'][$i] .'">'. wp_get_attachment_image($attachment_id,'medium') .'</a></div>';
				}
			}
		endwhile; wp_reset_query(); 
		$result .='</div></div>';
		} else{
	$result .='<div class="event-box"><div class="date text-center"><h3>No Event Gallery</h3></div></div>';
	}
return $result;}