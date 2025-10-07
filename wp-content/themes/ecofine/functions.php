<?php
/**
 * ecofine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ecofine
 */

$ecofine_theme_data = wp_get_theme();
/*
 * Define theme version
 */
define( 'ECOFINE_VERSION', ( WP_DEBUG ) ? time() : $ecofine_theme_data->get( 'Version' ) );

// Inc folder directory
define( 'ECOFINE_INC_DIR', get_template_directory() . '/inc/' );

// Theme Default Setup
require_once ECOFINE_INC_DIR . 'theme-setup.php';

//  Register widget area
require_once ECOFINE_INC_DIR . 'widget-area-ini.php';
//  Comments Template
require_once ECOFINE_INC_DIR . 'comments-template.php';
/**
 * TGM Plugin
 */
require_once ECOFINE_INC_DIR . 'plugins-activation.php';
//  Script and Css Load
require_once ECOFINE_INC_DIR . 'css-and-js.php';

/** Implement the Custom Header feature.*/
require_once ECOFINE_INC_DIR . 'custom-header.php';


/** Functions which enhance the theme by hooking into WordPress */
require_once ECOFINE_INC_DIR . 'template-functions.php';
require_once ECOFINE_INC_DIR . 'theme-and-options/theme-options/default-theme-options.php';
require_once ECOFINE_INC_DIR . 'nav-menu-walker.php';

/** Customizer additions. */
require_once ECOFINE_INC_DIR . 'customizer.php';

if ( class_exists( 'CSF' ) ) {
	require_once ECOFINE_INC_DIR . 'theme-and-options/metabox-and-options.php';
	require_once ECOFINE_INC_DIR . 'inline-css.php';
}

/**
 * Give Plugin Override Function
 */
function ecofine_override_wpgive_css_file() {
    wp_enqueue_style(
        'donate-multi-styles',
        get_template_directory_uri() . '/assets/css/donate-multi-styles.css',
        'give-sequoia-template-css'
    );
}
add_action('wp_print_styles', 'ecofine_override_wpgive_css_file', 10);

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}