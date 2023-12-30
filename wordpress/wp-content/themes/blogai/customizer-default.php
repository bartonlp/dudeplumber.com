<?php
/**
 * Default theme options.
 *
 * @package BlogAI
 */

if (!function_exists('blogai_get_default_theme_options')):

/**
 * Get default theme options
 *
 * @since 1.0.0
 *
 * @return array Default theme options.
 */
function blogai_get_default_theme_options() {

    $defaults = array();

    $defaults['select_recent_news_category'] = 0;
    $defaults['show_main_news_section'] = 0;

    
    $defaults['banner_advertisement_image'] = '';
    $defaults['banner_advertisement_url'] = '#';

    $defaults['enable_news_ticker'] = 1;
    $defaults['news_ticker_title'] = __('Trending', 'blogai');
    $defaults['news_ticker_category'] = 0;

	return $defaults;

}
endif;