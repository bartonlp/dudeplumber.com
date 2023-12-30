<?php

/**
 * Option Panel
 *
 * @package BlogAI
 */

function blogai_customize_register($wp_customize) {

$blogai_default = blogai_get_default_theme_options();

//=================================
// Trending Posts Section.
//=================================

$wp_customize->add_section('news_ticker_section',
    array(
        'title' => esc_html__('News Ticker', 'blogai'),
        'priority' => 31,
        'capability' => 'edit_theme_options', 
    )
);

$wp_customize->add_setting('enable_news_ticker',
    array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
);
$wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'enable_news_ticker', 
    array(
        'label' => esc_html__('Enable Latest Posts Section', 'blogai'),
        'section' => 'news_ticker_section',
        'type' => 'toggle',
        'priority' => 22,

    )
));

// Setting - number_of_slides.
$wp_customize->add_setting('news_ticker_title',
    array(
        'default' =>  __('Trending', 'blogai'),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
        // 'transport' => $selective_refresh
    )
);

$wp_customize->add_control('news_ticker_title',
    array(
        'label' => esc_html__('News Ticker Title', 'blogai'),
        'section' => 'news_ticker_section',
        'type' => 'text',
        'priority' => 23,
        // 'active_callback' => 'blogai_flash_posts_section_status'

    )
);

// Setting - drop down category for slider.
$wp_customize->add_setting('news_ticker_category',
    array(
        'default' => $blogai_default['news_ticker_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);


$wp_customize->add_control(new blogus_Dropdown_Taxonomies_Control($wp_customize, 'news_ticker_category',
    array(
        'label' => esc_html__('Latest Posts Category', 'blogai'),
        'description' => esc_html__('Posts to be shown on trending posts ', 'blogai'),
        'section' => 'news_ticker_section',
        'type' => 'dropdown-taxonomies',
        'taxonomy' => 'category',
        'priority' => 23,
        // 'active_callback' => 'blogai_flash_posts_section_status'
    )
));

// Feaured slider    
$wp_customize->add_setting(
    'slider_tabs',
    array(
        'default'           => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_attr'
        ));


    $wp_customize->add_control( new Custom_Tab_Control ( $wp_customize,'slider_tabs',
        array(
            'label'                 => '',
            'type' => 'custom-tab-control',
            'section'               => 'frontpage_main_banner_section_settings',
            'controls_general'      => json_encode( array( '#customize-control-show_main_news_section', '#customize-control-main_banner_section_background_image','#customize-control-blogus_slider_image_overlay_color','#customize-control-blogus_slider_layout', '#customize-control-main_slider_section_title', '#customize-control-select_slider_news_category','#customize-control-slider_speed', '#customize-control-recent_post_section_title',  '#customize-control-select_recent_news_category' ) ),
                'controls_design'       => json_encode( array( '#customize-control-slider_overlay_enable','#customize-control-blogus_slider_overlay_color', '#customize-control-blogus_slider_overlay_text_color', '#customize-control-blogus_slider_title_font_size','#customize-control-slider_icon_enable','#customize-control-slider_meta_enable') ),
        )
            
        ));


        // Setting - show_main_news_section.
    $wp_customize->add_setting('show_main_news_section',
        array(
            'default' => $blogai_default['show_main_news_section'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );

    $wp_customize->add_control('show_main_news_section',
        array(
            'label' => esc_html__('Enable Slider Banner Section', 'blogai'),
            'section' => 'frontpage_main_banner_section_settings',
            'type' => 'checkbox',
            'priority' => 10,

        )
    ); 

    //section title
    $wp_customize->add_setting('recent_post_section_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        new Blogus_Section_Title(
            $wp_customize,
            'recent_post_section_title',
            array(
                'label'             => esc_html__( 'Recent Post Section', 'blogai' ),
                'section'           => 'frontpage_main_banner_section_settings',
                'priority'          => 100,
                'active_callback' => 'blogus_main_banner_section_status'
            )
        )
    );


    // Setting - drop down category for slider.
    $wp_customize->add_setting('select_recent_news_category',
        array(
            'default' => $blogai_default['select_recent_news_category'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'absint',
        )
    ); 
    $wp_customize->add_control(new Blogus_Dropdown_Taxonomies_Control($wp_customize, 'select_recent_news_category',
        array(
            'label' => esc_html__('Category', 'blogus'),
            'description' => esc_html__('Posts to be shown on recent 4 Post', 'blogus'),
            'section' => 'frontpage_main_banner_section_settings',
            'type' => 'dropdown-taxonomies',
            'taxonomy' => 'category',
            'priority' => 200,
            'active_callback' => 'blogus_main_banner_section_status',
        )));


    //SLider styling tabs
        $wp_customize->add_setting('slider_overlay_enable',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
        );
        $wp_customize->add_control(new blogus_Toggle_Control( $wp_customize, 'slider_overlay_enable', 
            array(
                'label' => esc_html__('Hide / Show Slider Overlay', 'blogai'),
                'type' => 'toggle',
                'section' => 'frontpage_main_banner_section_settings',
            )
        ));

        //slider Overlay 
       $wp_customize->add_setting(
            'blogus_slider_overlay_color', array( 'sanitize_callback' => 'sanitize_text_field','default' => '#00000099',
            
        ) );
        
        $wp_customize->add_control(new Blogus_Customize_Alpha_Color_Control( $wp_customize,'blogus_slider_overlay_color', array(
           'label'      => __('Overlay Color', 'blogai' ),
            'palette' => true,
            'section' => 'frontpage_main_banner_section_settings')
        ) );

        $wp_customize->add_setting(
        'blogus_slider_overlay_text_color', array( 'sanitize_callback' => 'sanitize_hex_color',
        
    ) );
    
    $wp_customize->add_control( 'blogus_slider_overlay_text_color', array(
       'label'      => __('Overlay Text Color', 'blogai' ),
        'type' => 'color',
        'section' => 'frontpage_main_banner_section_settings')
    );


        $wp_customize->add_setting('blogus_slider_title_font_size',
        array(
            'default'           => 38,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control('blogus_slider_title_font_size',
        array(
            'label'    => esc_html__('Slider title font Size', 'blogai'),
            'section'  => 'frontpage_main_banner_section_settings',
            'type'     => 'number',
        )
    );

    
    $wp_customize->add_setting('slider_meta_enable',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new blogus_Toggle_Control( $wp_customize, 'slider_meta_enable', 
        array(
            'label' => esc_html__('Hide / Show Meta', 'blogai'),
            'type' => 'toggle',
            'section' => 'frontpage_main_banner_section_settings',
        )
    )); 

    // Advertisement Section.
    $wp_customize->add_section('frontpage_advertisement_settings',
    array(
        'title' => esc_html__('Banner Advertisement', 'blogai'),
        // 'priority' => 50,
        'capability' => 'edit_theme_options',
        'panel' => 'header_option_panel',
    )
    );
    // Setting banner_advertisement_image.
    $wp_customize->add_setting('banner_advertisement_image',
    array(
        'default' => $blogai_default['banner_advertisement_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'absint',
        // 'transport' => $selective_refresh
    )
    );

    $wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control($wp_customize, 'banner_advertisement_image',
        array(
            'label' => esc_html__('Banner Section Advertisement', 'blogai'),
            'description' => sprintf(esc_html__('Recommended Size %1$s px X %2$s px', 'blogai'), 930, 100),
            'section' => 'frontpage_advertisement_settings',
            'width' => 930,
            'height' => 100,
            'flex_width' => true,
            'flex_height' => true, 
        )
    )
    );

    /*banner_advertisement_url*/
    $wp_customize->add_setting('banner_advertisement_url',
    array(
        'default' => $blogai_default['banner_advertisement_url'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    )
    );
    $wp_customize->add_control('banner_advertisement_url',
    array(
        'label' => esc_html__('URL Link', 'blogai'),
        'section' => 'frontpage_advertisement_settings',
        'type' => 'url', 
    )
    );

    $wp_customize->add_setting('blogai_open_on_new_tab',
    array(
        'default' => true,
        'sanitize_callback' => 'blogus_sanitize_checkbox',
    )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'blogai_open_on_new_tab', 
    array(
        'label' => esc_html__('Open link in a new tab', 'blogai'),
        'type' => 'toggle',
        'section' => 'frontpage_advertisement_settings', 
    )
    )); 

    // Add editor icon
	if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('news_ticker_title', array(
            'selector'        => '.bs-latest-heading span', 
        ));
    }
}
add_action('customize_register', 'blogai_customize_register');