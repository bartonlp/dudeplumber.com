<?php
/**
 * Theme functions and definitions
 *
 * @package BlogAI
 */

if ( ! function_exists( 'blogai_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function blogai_enqueue_styles() {
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'blogus-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'blogai-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogus-style-parent' ), '1.0' );
		wp_dequeue_style( 'blogus-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'blogai-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		//wp_enqueue_style( 'blogai-dark', get_template_directory_uri() . '/css/colors/dark.css');

		if(is_rtl()){
		wp_enqueue_style( 'blogus_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'blogai_enqueue_styles', 9999 );

if ( ! function_exists( 'blogai_enqueue_scripts' ) ) :
	/**
	 * @since 0.1
	 */
	function blogai_enqueue_scripts() {
	
		wp_enqueue_script( 'blogai-ticker-js', get_stylesheet_directory_uri() .'/js/jquery.marquee.min.js', array('jquery'), '1.0', true); 
		wp_enqueue_script( 'blogai-custom', get_stylesheet_directory_uri() .'/js/custom.js', array('jquery'), '1.0', true); 
		
		$header_time_enable = get_theme_mod('header_time_enable','true'); 
		$blogia_date_time_show_type = get_theme_mod('blogia_date_time_show_type','blogia_default'); 
		if (($header_time_enable == 'true') || ($blogia_date_time_show_type == 'blogia_default')) {

			wp_enqueue_script('blogia-custom-time', get_stylesheet_directory_uri() . '/js/custom-time.js' , array('jquery')); 

		} 
	}

endif;
add_action( 'wp_enqueue_scripts', 'blogai_enqueue_scripts', 99999 ); 

add_action( 'customize_register', 'blogai_customizer_rid_values', 1000 );
function blogai_customizer_rid_values($wp_customize) {

  $wp_customize->remove_control('blogus_content_layout');   

}

function blogai_theme_setup() {

//Load text domain for translation-ready
load_theme_textdomain('blogai', get_stylesheet_directory() . '/languages');

require( get_stylesheet_directory() . '/hooks/hook-front-page-main-banner-section.php' );
require( get_stylesheet_directory() . '/hooks/hook-front-page-ticker-section.php' );
require( get_stylesheet_directory() . '/hooks/hook-ad-banner-section.php' );
require( get_stylesheet_directory() . '/customizer-default.php' );
require( get_stylesheet_directory() . '/frontpage-options.php' );
require( get_stylesheet_directory() . '/general-options.php' );
require( get_stylesheet_directory() . '/font.php' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
} 
add_action( 'after_setup_theme', 'blogai_theme_setup' );


if (!function_exists('blogai_get_block')) :
    /**
     *
     *
     * @since Blogai 1.0.0
     *
     */
    function blogai_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('hooks/blocks/block-' . $section, $block);

    }
endif;


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogai_widgets_init() {

	$blogus_footer_column_layout = esc_attr(get_theme_mod('blogus_footer_column_layout',3));
	
	$blogus_footer_column_layout = 12 / $blogus_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'blogai' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );


	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'blogai' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$blogus_footer_column_layout.' rotateInDownLeft animated bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'blogai_widgets_init' );