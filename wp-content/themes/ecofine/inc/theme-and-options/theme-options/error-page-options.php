<?php
CSF::createSection( $EcofineThemeOption, array(
    'parent' => 'ecofine_page_options',
    'title'  => esc_html__( 'Error 404', 'ecofine' ),
    'icon'   => 'fa fa-exclamation-triangle',
    'fields' => array(

        array(
            'id'       => 'ecofine_error_page_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Error Banner', 'ecofine' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_error_page_title',
            'type'       => 'text',
            'title'      => esc_html__( 'Banner Title', 'ecofine' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'ecofine' ),
            'dependency' => array( 'ecofine_error_page_banner', '==', 'true' ),
        ),
        array(
            'id'           => 'ecofine_error_image',
            'type'         => 'media',
            'title'        => esc_html__( 'Error Image', 'ecofine' ),
            'library'      => 'image',
            'button_title' => esc_html__( 'Upload Image', 'ecofine' ),
            'desc'         => esc_html__( 'Upload error page image', 'ecofine' ),
        ),
        array(
            'id'            => 'ecofine_not_found_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Not Found Text', 'ecofine' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '150px',
            'desc'          => esc_html__( 'Type not found text here.', 'ecofine' ),
        ),

        array(
            'id'       => 'ecofine_go_back_home',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Go Back Home Button', 'ecofine' ),
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Enable or disable go back home button.', 'ecofine' ),
            'default'  => true,
        ),
        array(
            'id'         => 'ecofine_error_page_button_text',
            'type'       => 'text',
            'dependency' => array( 'ecofine_go_back_home', '==', 'true' ),
            'title'      => esc_html__( 'Bottom Text', 'ecofine' ),
            'desc'       => esc_html__( 'Type Banner Title Here.', 'ecofine' ),
            'default'    => esc_html__( 'Go Back Home', 'ecofine' ),
        ),
    ),
) );