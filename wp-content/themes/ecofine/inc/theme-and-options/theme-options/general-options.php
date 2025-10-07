<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
CSF::createSection( $EcofineThemeOption, array(
    'title'  => esc_html__( 'General', 'ecofine' ),
    'icon'   => 'fa fa-cogs',
    'fields' => array(
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Custom Theme Color', 'ecofine' ),
        ),
        array(
            'id'       => 'enable_color_Mode',
            'type'     => 'switcher',
            'default'  => false,
            'title'    => esc_html__( 'Enable Color Mode', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Your Theme Primary and Secondary Color Mode', 'ecofine' ),
        ),
        array(
            'id'          => 'primary_color_mode',
            'type'        => 'color',
            'title'       => esc_html__( 'Primary Color', 'ecofine' ),
            'dependency'  => array( 'enable_color_Mode', '==', 'true' ),
            'default'     => '#4BAF47', 
        ),
        array(
            'id'          => 'secondary_color_mode',
            'type'        => 'color',
            'title'       => esc_html__( 'Secondary Color', 'ecofine' ),
            'dependency'  => array( 'enable_color_Mode', '==', 'true' ),
            'default'     => '#24231D', 
        ),

        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Preloader Options', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_enable_preloader',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Preloader', 'ecofine' ),
            'subtitle' => esc_html__( 'Select Site Preloader. Default Enable', 'ecofine' ),
        ),
        array(
            'id'          => 'ecofine_preloader_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color One', 'ecofine' ),
            'dependency'  => array( 'ecofine_enable_preloader', '==', 'true' ),
            'output'      => '.theme-loader:before',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'ecofine_preloader2_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader color Two', 'ecofine' ),
            'dependency'  => array( 'ecofine_enable_preloader', '==', 'true' ),
            'output'      => '.theme-loader:after',
            'output_mode' => 'border-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'id'          => 'ecofine_preloader3_color',
            'type'        => 'color',
            'title'       => esc_html__( 'Preloader Full Width Background', 'ecofine' ),
            'dependency'  => array( 'ecofine_enable_preloader', '==', 'true' ),
            'output'      => '.preloader-area',
            'output_mode' => 'background-color', // Supports css properties like ( border-color, color, background-color etc )
        ),
        array(
            'type'    => 'notice',
            'style'   => 'success',
            'content' => esc_html__( 'Comment Options', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_enable_page_cmt',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Comment for page', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Comment section on Page', 'ecofine' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Top To Bottom Button Settings', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_enable_top_to_bottom',
            'type'     => 'switcher',
            'default'  => true,
            'title'    => esc_html__( 'Enable Top To Bottom Icon', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Top To Bottom Icon', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_enable_ttb_icon',
            'type'       => 'icon',
            'title'      => esc_html__( 'Select Icon', 'ecofine' ),
            'default'    => 'bi bi-arrow-up',
            'dependency' => array( 'ecofine_enable_top_to_bottom', '==', 'true' ),
        ),
        array(
            'id'          => 'ecofine_enable_ttb_bgi',
            'type'        => 'color',
            'title'       => esc_html__( 'Icon Color', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add Color for Top To bottom icon', 'ecofine' ),
            'dependency'  => array( 'ecofine_enable_top_to_bottom', '==', 'true' ),
            'output'      => '.to-top',
            'output_mode' => 'color',
        ),
        array(
            'id'          => 'ecofine_enable_ttb_bg',
            'type'        => 'color',
            'title'       => esc_html__( 'Background Color', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add Background Color for Top To bottom icon', 'ecofine' ),
            'dependency'  => array( 'ecofine_enable_top_to_bottom', '==', 'true' ),
            'output'      => '.to-top',
            'output_mode' => 'background-color',
        ),
    ),
) );