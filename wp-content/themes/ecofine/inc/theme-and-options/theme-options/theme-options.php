<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
//
// Set a unique slug-like ID
//
$EcofineThemeOption = 'Ecofine_Theme_Option';

//
// Create options
//
CSF::createOptions( $EcofineThemeOption, array(
	'framework_title' => wp_kses(
		sprintf( __( "Ecofine Options <small>V %s</small>", 'ecofine' ), $ecofine_theme_data->get( 'Version' ) ),
		array( 'small' => array() )
	),
	'menu_title'      => esc_html__( 'Theme Options', 'ecofine' ),
	'menu_slug'       => 'theme-options',
	'menu_type'       => 'submenu',
	'menu_parent'     => 'themes.php',
	'class'           => 'ecofine-theme-option-wrapper',
	'defaults'        => ecofine_default_theme_options(),
	'footer_credit'   => wp_kses(
		__( 'Developed by: <a target="_blank" href="https://ecofine.com">Ecofine</a>', 'ecofine' ),
		array(
			'a' => array(
				'href'   => array(),
				'target' => array(),
			),
		)
	),
) );

//
// General options
//
require_once 'general-options.php';

//
// Typography options
//
require_once 'typography-options.php';

//
// Header options
//
require_once 'header-options.php';

//
// Layout options
//
CSF::createSection( $EcofineThemeOption, array(
	'title' => esc_html__( 'Layout & Options', 'ecofine' ),
	'id'    => 'ecofine_page_options',
	'icon'  => 'fa fa-calculator',
) );

//
// Banner options
//
require_once 'banner-options.php';

//
// Blog Page options
//
require_once 'blog-page-options.php';

//
// Single Post options
//
require_once 'single-post-options.php';

//
// Archive Page options
//
require_once 'archive-page-options.php';


//
// Search Page options
//
require_once 'search-page-options.php';

//
// Donation Page options
//
require_once 'donation-options.php';

//
// Error Page options
//
require_once 'error-page-options.php';

//
// WooCommerce options
//
if ( class_exists( 'WooCommerce' ) ) {

    CSF::createSection( $EcofineThemeOption, array(
        'title' => esc_html__( 'Shop Options', 'ecofine' ),
        'id'    => 'ecofine_shop_options',
        'icon'  => 'fa fa-shopping-cart',
    ) );

    //
    // Shop options
    //
    require_once 'woocommerce/shop-options.php';

    //
    // Single Shop options
    //
    require_once 'woocommerce/single-shop-page.php';
}
//
// Portfolio options
//
require_once 'portfolio-options.php';

//
// Team options
//
require_once 'team-options.php';

//
// Footer options
//
require_once 'footer-options.php';

//
// Code Editor options
//
CSF::createSection( $EcofineThemeOption, array(
	'title' => esc_html__( 'Code Editor', 'ecofine' ),
	'id'    => 'ecofine_code_editor_options',
	'icon'  => 'fa fa-code',
) );

//
// CSS options
//
CSF::createSection( $EcofineThemeOption, array(
	'parent' => 'ecofine_code_editor_options',
	'title'  => esc_html__( 'CSS Editor', 'ecofine' ),
	'icon'   => 'fa fa-pencil-square-o',
	'fields' => array(
		array(
			'id'       => 'ecofine_css_editor',
			'type'     => 'code_editor',
			'title'    => esc_html__( 'CSS Editor', 'ecofine' ),
			'settings' => array(
				'theme' => 'mbo',
				'mode'  => 'css',
			),
		),
	),
) );

//
// Backup options
//
CSF::createSection( $EcofineThemeOption, array(
	'title'       => esc_html__( 'Backup', 'ecofine' ),
	'icon'        => 'fas fa-shield-alt',
	'description' => esc_html__( 'Backup Theme Options all Data', 'ecofine' ),
	'fields'      => array(
		array(
			'type' => 'backup',
		),
	),
) );