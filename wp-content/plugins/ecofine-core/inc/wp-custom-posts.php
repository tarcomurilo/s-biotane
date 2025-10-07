<?php

if ( !function_exists( 'ecofine_options' ) ) {
    function ecofine_options( $option = '', $default = null ) {
        $defaults = ecofine_default_theme_options();
        $options = get_option( 'Ecofine_Theme_Option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}
add_action( 'init', 'ecofinecore_custom_post_type' );
function ecofinecore_custom_post_type() {
    register_post_type( 'ecofine_portfolio',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Portfolio', 'ecofinecore' ),
                'singular_name' => esc_html__( 'Portfolio', 'ecofinecore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-image-filter', 'ecofinecore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => ecofine_options( 'ecofine_portfolio_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
    register_post_type( 'ecofine_team',
        array(
            'labels'       => array(
                'name'          => esc_html__( 'Team', 'ecofinecore' ),
                'singular_name' => esc_html__( 'Team', 'ecofinecore' ),
            ),
            'show_in_rest' => true,
            'supports'     => array( 'title', 'thumbnail', 'page-attributes', 'editor', 'excerpt' ),
            'menu_icon'    => esc_attr__( 'dashicons-admin-users', 'ecofinecore' ),
            'public'       => true,
            'rewrite'      => array(
                'slug'       => ecofine_options( 'ecofine_team_custom_slug' ),
                'with_front' => true,
            ),
        )
    );
}
/*** Custom taxonomy ***/
add_action( 'init', 'ecofinecore_custom_post_taxonomy' );
function ecofinecore_custom_post_taxonomy() {
    register_taxonomy(
        'ecofine_portfolio_cat',
        'ecofine_portfolio',
        array(
            'label'             => esc_html__( 'Portfolio Category', 'ecofinecore' ),
            'query_var'         => true,
            'hierarchical'      => true,
            'public'            => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'show_in_nav_menus' => true,
            'show_in_rest'      => true,
            'show_tagcloud'     => true,
            'rewrite'           => array(
                'slug'       => ''.ecofine_options( 'ecofine_portfolio_custom_slug' ).'-category',
                'with_front' => true,
            ),
        )
    );
    register_taxonomy(
        'ecofine_portfolio_tag',
        'ecofine_portfolio',
        array(
            'label'             => esc_html__( 'Portfolio Tag', 'ecofinecore' ),
            'hierarchical'      => false,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'show_in_rest'    => true,
            'rewrite'           => array(
                'slug'       => ''.ecofine_options( 'ecofine_portfolio_custom_slug' ).'-tag',
                'with_front' => true,
            ),
        )
    );
}