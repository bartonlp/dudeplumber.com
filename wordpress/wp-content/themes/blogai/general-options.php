<?php

/**
 * Option Panel
 *
 * @package BlogAI
 */

function blogai_general_customize_register($wp_customize) {

    $blogai_default = blogai_get_default_theme_options();

    //Date Section
    $wp_customize->add_section( 'blogai_date_section' , array(
        'title' => __('Date', 'blogai'),
        'priority' => 1,
        'panel' => 'header_option_panel',
    ) );

    $wp_customize->add_setting('header_date_enable',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'header_date_enable', 
        array(
            'label' => esc_html__('Hide / Show Date', 'blogai'),
            'type' => 'toggle',
            'section' => 'blogai_date_section',
        )
    ));

    $wp_customize->add_setting('header_time_enable',
        array(
            'default' => true,
            'sanitize_callback' => 'blogus_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(new Blogus_Toggle_Control( $wp_customize, 'header_time_enable', 
        array(
            'label' => esc_html__('Hide / Show Time', 'blogai'),
            'type' => 'toggle',
            'section' => 'blogai_date_section',
        )
    ));

    // date in header display type
    $wp_customize->add_setting( 'blogai_date_time_show_type', array(
        'default'           => 'blogai_default',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'blogus_sanitize_select',
    ) );

    $wp_customize->add_control( 'blogai_date_time_show_type', array(
        'type'     => 'radio',
        'label'    => esc_html__( 'Date / Time in header display type:', 'blogai' ),
        'choices'  => array(
            'blogai_default'          => esc_html__( 'Theme Default Setting', 'blogai' ),
            'wordpress_date_setting' => esc_html__( 'From WordPress Setting', 'blogai' ),
        ),
        'section'  => 'blogai_date_section', 
    ) );

    

}
add_action('customize_register', 'blogai_general_customize_register');