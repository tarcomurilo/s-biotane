<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postgallery = 'ecofine_postmeta_gallery';

//
// Create a metabox
//
CSF::createMetabox( $postgallery, array(
    'title'        => esc_html('Post Format image Gallery','ecofine'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'gallery',
) );

//
// Create a section
//
CSF::createSection( $postgallery, array(
    'title'  => esc_html__( 'Add Gallery Image', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'ecofine_post_gallery',
            'type'        => 'gallery',
            'title'       => esc_html('Gallery','ecofine'),
            'add_title'   => esc_html('Add Image','ecofine'),
            'edit_title'  => esc_html('Edit Image','ecofine'),
            'clear_title' => esc_html('Remove Image','ecofine'),
        ),
    ),
) );