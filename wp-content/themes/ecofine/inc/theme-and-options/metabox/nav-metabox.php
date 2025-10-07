<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

//
// Set a unique slug-like ID
//
$navmeta = 'ecofine_navmeta';

//
// Create menu options
//
CSF::createNavMenuOptions( $navmeta, array(
    'data_type' => 'serialize',
) );

CSF::createSection( $navmeta, array(
    'fields' => array(

        array(
            'id'    => 'ecofine_nav_megamenu_show',
            'type'  => 'switcher',
            'title' => esc_html__( 'Enable Mega menu', 'ecofine' ),
            'label' => esc_html__( 'Enable this options if you need Mega Menu', 'ecofine' ),
        ),

        array(
            'id'          => 'ecofine_nav_mmenu_column',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Column', 'ecofine' ),
            'subtitle'    => esc_html__( 'Select your Sub Menu Column Section', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'default'     => '4',
            'options'     => array(
                'column_2' => esc_html__( 'Column 2', 'ecofine' ),
                'column_3' => esc_html__( 'Column 3', 'ecofine' ),
                'column_4' => esc_html__( 'Column 4', 'ecofine' ),
                'column_5' => esc_html__( 'Column 5', 'ecofine' ),
                'column_6' => esc_html__( 'Column 6', 'ecofine' ),
            ),
            'dependency'  => array( 'ecofine_nav_megamenu_show', '==', 'true' ),
        ),
    ),
) );
