<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package BlogAI
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'blogai' ); ?></a>
    <div class="wrapper" id="custom-background-css">
      <!--header--> 
      <header class="bs-headthree"> 
      <div class="bs-head-detail d-none d-lg-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="d-flex flex-wrap align-items-center justify-content-start">
                <!-- <div class="top-date"><span class="day">5</span><span class="deta">may 2021</span></div> -->
                <div class="top-date py-1 px-2"> 
                <?php
                  // Return if date display option is not enabled
                  $header_date_enable = esc_attr(get_theme_mod('header_date_enable','true'));
                  $header_time_enable = esc_attr(get_theme_mod('header_time_enable','true'));
                  $blogai_date_time_show_type = get_theme_mod('blogai_date_time_show_type','blogai_default');
                  if(($header_date_enable == true) || ($header_time_enable == true)) {
                    if ( $blogai_date_time_show_type == 'blogai_default' ) {
                      if($header_date_enable == true) { ?>
                        <span class="day"> <?php echo date_i18n('D. M jS, Y ', strtotime(current_time("Y-m-d")));?></span> 
                      <?php } if($header_time_enable == true) { ?>
                        <span  id="time" class="time"></span>
                      <?php }  
                    } elseif( $blogai_date_time_show_type == 'wordpress_date_setting') {
                      if($header_date_enable == true) { ?>
                        <span class="day"> <?php echo date_i18n( get_option( 'date_format' ) ); ?></span> 
                      <?php } if($header_time_enable == true) { ?>
                        <span class="time"> <?php $format = get_option('') . ' ' . get_option('time_format');
                        print date_i18n($format, current_time('timestamp')); ?></span>
                      <?php } 
                    } 
                  } ?> 
                </div>
              </div>
            </div>
            <!--/col-md-6-->
            <div class="col-lg-6">
             <?php do_action('blogus_action_header_social_section'); ?>
            </div>
            <!--/col-md-6-->
          </div>
        </div>
      </div>
      <!-- Main Menu Area-->
      <?php $background_image = get_theme_support( 'custom-header', 'default-image' );
        if ( has_header_image() ) {
          $background_image = get_header_image();
        } ?>
      <div class="bs-header-main d-none d-lg-block" <?php if ( has_header_image() ) { ?> style="background-image:url('<?php echo esc_url($background_image);?>')"<?php } ?>>
        <div class="inner" <?php if ( has_header_image() ) { ?> style="background-color:#00000040;"<?php } ?>>
          <div class="container">
            <div class="row align-items-center">
            
              <div class="navbar-header col-md-4 text-md-start d-none d-lg-block">
                <?php the_custom_logo(); 
              if (display_header_text()) : ?>
              <div class="site-branding-text">
                  <?php if (is_front_page() || is_home()) { ?>
                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                  <?php } else { ?>
                  <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                  <?php } ?>
                  <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
              </div>
              <?php endif; ?>
              </div>
                <!-- Add Banner Advertise -->
                <?php do_action('blogia_action_banner_advertisement'); ?> 
            </div>
          </div>
        </div>
      </div>
      <!-- /Main Menu Area-->
      <div class="bs-menu-full">
        <nav class="navbar navbar-expand-lg navbar-wp">
          <div class="container">
            <!-- Right nav -->
            <div class="m-header align-items-center">
              <!-- navbar-toggle -->
              <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar-wp" aria-controls="navbar-wp" aria-expanded="false"
                aria-label="Toggle navigation"> 
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-header">
                <?php the_custom_logo(); 
                  if (display_header_text()) : ?>
                <div class="site-branding-text">
                  <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                  <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                </div>
                <?php endif; ?>
              </div>
              <div class="right-nav"> 
                <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
                  if($blogus_menu_search == true) { ?>
                    <a class="msearch ml-auto" href=".bs_model" data-bs-toggle="modal"> <i class="fa fa-search"></i> </a>
                <?php } ?>
              </div>
            </div>
            <!-- /Right nav -->
            <!-- Navigation -->
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbar-wp">
              <?php $blogus_menu_align_setting = get_theme_mod('blogus_menu_align_setting','ml-auto');
                if(is_rtl()) { wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'  => 'nav-collapse collapse',
                        'menu_class' => 'nav navbar-nav sm-rtl',
                        'fallback_cb' => 'blogus_fallback_page_menu',
                        'walker' => new blogus_nav_walker()
                  ) ); 
                } else
                {
                  wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'container'  => 'nav-collapse collapse',
                    'menu_class' => $blogus_menu_align_setting . ' nav navbar-nav',
                    'fallback_cb' => 'blogus_fallback_page_menu',
                    'walker' => new blogus_nav_walker()
                  ) );
              } ?>
            </div>
            <!-- Right nav -->
            <div class="desk-header right-nav pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                  <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
                    $blogus_subsc_link = get_theme_mod('blogus_subsc_link', '#'); 
                    $blogus_menu_subscriber  = get_theme_mod('blogus_menu_subscriber','true');
                    $blogus_subsc_open_in_new  = get_theme_mod('blogus_subsc_open_in_new', true);
                  if($blogus_menu_search == true) { ?>
                <a class="msearch ml-auto" href=".bs_model" data-bs-toggle="modal">
                  <i class="fa fa-search"></i>
                </a> 
              <?php } if($blogus_menu_subscriber == true) { ?>
                <a class="subscribe-btn" href="<?php echo esc_url($blogus_subsc_link); ?>" <?php if($blogus_subsc_open_in_new) { ?> target="_blank" <?php } ?> ><i class="fas fa-bell"></i></a>
              <?php } $blogus_lite_dark_switcher = get_theme_mod('blogus_lite_dark_switcher','true');
                if($blogus_lite_dark_switcher == true){ ?>
                <label class="switch" for="switch">
                  <input type="checkbox" name="theme" id="switch">
                  <span class="slider"></span>
                </label>
              <?php } ?>     
                </div>
            <!-- /Right nav -->
          </div>
        </nav>
      </div>
      <!--/main Menu Area-->
    </header>
    <!-- Add News ticker -->
    <?php do_action('blogai_action_front_page_ticker_section'); ?> 
    
<!--mainfeatured start-->
<div class="mainfeatured mt-5">
    <!--container-->
    <div class="container">
        <!--row-->
        <div class="row">              
    <?php do_action('blogai_action_front_page_main_section_1'); ?> 
        </div><!--/row-->
    </div><!--/container-->
</div>
<!--mainfeatured end-->
<?php
do_action('blogus_action_featured_ads_section');
?>   