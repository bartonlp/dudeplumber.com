<?php
/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function blogai_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Rubik:400,500,700| Onest Sans:400,500,700&display=swap');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function blogai_scripts_styles() {
    wp_enqueue_style( 'blogus-fonts', blogai_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'blogai_scripts_styles' );