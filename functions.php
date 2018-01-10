<?php

// Add our own styles after zerif lite styles
add_action( 'wp_enqueue_scripts', 'mtc_enqueue_styles' );
function mtc_enqueue_styles() {

    // Load zerif-lite's style.css (NB: It's the only parent stylesheet that will not be loaded automatically by Wordpress)
    wp_enqueue_style( 'zerif_style', get_template_directory_uri() . '/style.css', array( 'zerif_fontawesome', 'zerif_bootstrap_style' ), 'v1' );

    $deps = array('zerif_ie_style');

    // Make sure our stylesheet is loaded even after the mobile styles, so we can also override that
    // when we want to.
    if ( wp_is_mobile() ){
        $deps[] = 'zerif_style_mobile';
    }

    // Load our own stylesheet at the correct position
    wp_enqueue_style( 'mtc_style', get_stylesheet_directory_uri() . '/style.css', $deps );
}

add_action( 'after_setup_theme', 'mtc_add_custom_image_sizes' );
function mtc_add_custom_image_sizes() {
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'mtc-featured-image-thumbnail', 1110, 350, true );
}

function mtc_remove_page_templates( $templates ) {
    unset( $templates['template-fullwidth.php'] );
    unset( $templates['template-fullwidth-no-title.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'mtc_remove_page_templates' );

require_once 'widget-clients.php';
