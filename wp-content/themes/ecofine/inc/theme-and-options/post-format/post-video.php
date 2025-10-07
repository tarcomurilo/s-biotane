<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$postvideo = 'ecofine_postmeta_video';

//
// Create a metabox
//
CSF::createMetabox( $postvideo, array(
    'title'        => esc_html('Post Format Video','ecofine'),
    'post_type'    => array( 'post' ),
    'post_formats' => 'video',
) );

//
// Create a section
//
CSF::createSection( $postvideo, array(
    'title'  => esc_html__( 'Add Video Link ', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'ecofine_post_video',
            'type'     => 'text',
            'title'    => esc_html__( 'Video Link', 'ecofine' ),
            'subtitle' => esc_html__( 'Add Post Video Link here', 'ecofine' ),
            'default'  => 'https://www.youtube.com/watch?v=yfFYBo0jtF0'
        ),
       
    ),
) );