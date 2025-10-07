<?php
/*
Plugin Name: Ecofine Core
Author: ThemePul
Author URI: http://themepul.com
Version: 1.1.1
Description: This plugin is Required for Ecofine WordPress theme
Text Domain: ecofinecore
 */

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
define( 'ECOFINE_CORE_VERSION', '1.1.1' );
define( 'ECOFINE_CORE', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__ ) ) . '/' );
define( 'ECOFINE_CORE_ASSETS', trailingslashit( ECOFINE_CORE . 'assets' ) );

// Translate direction
load_plugin_textdomain( ' ecofinecore', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/*
 *  Template Library
 */
add_action( 'elementor/init', function() {
    include_once 'inc/elementor-template-library/template-library.php';
} );

/*
 *  Add CSF
 */
require_once 'inc/library/codestar-framework/codestar-framework.php';

/*
 *  Add Elementor Addons
 */
include_once 'elementor-widgets/custom-elements-for-elementor.php';

/*
 *  HEADER AND FOOTER BUILDER
 */
include_once 'elementor-widgets/hf-builder/header-footer-builder.php';

/*
 *  Add Ecofine Core Function
 */
include_once 'inc/ecofinecore-functions.php';

/*
 *  Add Demo Function
 */
include_once 'inc/demo.php';

/*
 *  Add Elementor Addons Icon
 */
include_once 'addon-icon.php';

/*
 *  Add Custom WordPress Widgets
 */
if ( class_exists( 'CSF' ) ) {
    include_once 'inc/widgets/custom-widgets.php';
    include_once 'inc/icons.php';
}

/*
 *  Add Custom Post Type
 */
$theme = wp_get_theme();
if ( 'Ecofine' == $theme->name || 'Ecofine' == $theme->parent_theme ) {
    include_once 'inc/wp-custom-posts.php';
}

// Registering toolkit files
function ecofinecorecore_files() {
    wp_enqueue_style( 'iconfont', ECOFINE_CORE_ASSETS . 'css/iconfont.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', ECOFINE_CORE_ASSETS . 'css/flaticon.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', ECOFINE_CORE_ASSETS . 'css/icofont.min.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'owl-css', ECOFINE_CORE_ASSETS . 'css/owl.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'animate-min', ECOFINE_CORE_ASSETS . 'css/animate-min.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'ecofinecore-custom-widgets', ECOFINE_CORE_ASSETS . 'css/custom-widgets.css', array(), ECOFINE_CORE_VERSION, 'all' );
	wp_enqueue_script( 'ecofinecore-count-js', ECOFINE_CORE_ASSETS . 'js/count-to.js', array( 'jquery' ), ECOFINE_CORE_VERSION, true );
    wp_enqueue_script( 'owl-js', ECOFINE_CORE_ASSETS . 'js/owl.js', array( 'jquery' ), ECOFINE_CORE_VERSION, true );
	wp_enqueue_script( 'counterup', ECOFINE_CORE_ASSETS . 'js/counterup.min.js', array( 'jquery' ), ECOFINE_CORE_VERSION, true );
	wp_enqueue_script( 'appear', ECOFINE_CORE_ASSETS . 'js/appear.js', array( 'jquery' ), ECOFINE_CORE_VERSION, true );
    wp_enqueue_script( 'isotop-min-js', ECOFINE_CORE_ASSETS . 'js/isotop-min.js', array( 'jquery' ), ECOFINE_CORE_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'ecofinecorecore_files' );
/**
 * Enqueue Backend Styles And Scripts.
 **/
function ecofinecore_backend_css_js( $screen ) {
    wp_enqueue_style( 'bootstrap-icons', get_theme_file_uri( 'assets/bootstrap/bootstrap-icons.css' ), array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'iconfont', ECOFINE_CORE_ASSETS . 'css/iconfont.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'flaticon', ECOFINE_CORE_ASSETS . 'css/flaticon.css', array(), ECOFINE_CORE_VERSION, 'all' );
    wp_enqueue_style( 'icofont', ECOFINE_CORE_ASSETS . 'css/icofont.min.css', array(), ECOFINE_CORE_VERSION, 'all' );
}
add_action( 'admin_enqueue_scripts', 'ecofinecore_backend_css_js' );