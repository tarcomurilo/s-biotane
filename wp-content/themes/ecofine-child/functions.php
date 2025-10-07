<?php
/*
 * This is the child theme for Ecofine theme.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'ecofine_child_enqueue_styles' );
function ecofine_child_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
/*
 * Your code goes below
 */

function delete_post_type(){
  unregister_post_type( 'ecofine_team' );

}
add_action('init','delete_post_type', 100);