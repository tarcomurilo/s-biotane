<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

function ecofine_register_header_footer_custom_post()
{

	// Register Footer Builder Post Type
	register_post_type(
		'ecofine_header',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Ecofine Headers', 'ecofinecore'),
				'singular_name'         => esc_html__('Header', 'ecofinecore'),
				'add_new_item'          => esc_html__('Add New Header', 'ecofinecore'),
				'all_items'             => esc_html__('All Headers', 'ecofinecore'),
				'add_new'               => esc_html__('Add New', 'ecofinecore'),
				'edit_item'             => esc_html__('Edit Header', 'ecofinecore'),
			),
			'rewrite'      => array(
				'slug'       => 'header',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title', 'thumbnail'),
		)
	);

	// Register Footer Builder Post Type
	register_post_type(
		'ecofine_footer',
		array(
			'labels'       => array(
				'name'                  => esc_html__('Ecofine Footers', 'ecofinecore'),
				'singular_name'         => esc_html__('Footer', 'ecofinecore'),
				'add_new_item'          => esc_html__('Add New Footer', 'ecofinecore'),
				'all_items'             => esc_html__('All Footers', 'ecofinecore'),
				'add_new'               => esc_html__('Add New', 'ecofinecore'),
				'edit_item'             => esc_html__('Edit Footer', 'ecofinecore'),
			),
			'rewrite'      => array(
				'slug'       => 'footer',
				'with_front' => true,
			),
			'hierarchical' => true,
			'public' => true,
			'show_ui' => true,
			'exclude_from_search' => true,
			'publicly_queryable' => true,
			'query_var'          => true,
			'has_archive'        => true,
			'menu_icon'    => 'dashicons-editor-kitchensink',
			'show_in_rest'    => false,
			'supports'     => array('title', 'thumbnail'),
		)
	);
}

add_action('init', 'ecofine_register_header_footer_custom_post');


/**
 *  Footer Canvas
 */
function ecofine_header_footer_builder_canvas()
{
	global $post;

	// Check if its a correct post type/types to apply template
	if (!in_array($post->post_type, ['ecofine_footer', 'ecofine_header']) || !did_action('elementor/loaded')) {
		return;
	}
	// Check that a template is not set already
	if ('' !== $post->page_template) {
		return;
	}
	// Make sure its not a page for posts
	if (get_option('page_for_posts') === $post->ID) {
		return;
	}

	//Finally set the page template
	$post->page_template = 'elementor_canvas';
	update_post_meta($post->ID, '_wp_page_template', 'elementor_canvas');
}

add_action('add_meta_boxes', 'ecofine_header_footer_builder_canvas', 10);


add_action('elementor/init', function () {
	// Register the 'ecofine_header' custom post type
	register_post_type('ecofine_header', array(
		'labels' => array(
			'name' => __('ecofine Headers', 'elementor'),
			'singular_name' => __('ecofine Header', 'elementor'),
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title'),
	));
	// Add Elementor support to the 'ecofine_header' custom post type
	add_post_type_support('ecofine_header', 'elementor');

	// Register the 'ecofine_footer' custom post type
	register_post_type('ecofine_footer', array(
		'labels' => array(
			'name' => __('ecofine Footers', 'elementor'),
			'singular_name' => __('ecofine Footer', 'elementor'),
		),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title'),
	));
	// Add Elementor support to the 'ecofine_footer' custom post type
	add_post_type_support('ecofine_footer', 'elementor');
});
