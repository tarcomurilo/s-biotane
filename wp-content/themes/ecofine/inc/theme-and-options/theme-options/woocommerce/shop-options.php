<?php
//shop Page Options
CSF::createSection( $EcofineThemeOption, array(
    'parent' => 'ecofine_shop_options',
    'title'  => esc_html__( 'Shop Page', 'ecofine' ),
    'icon'   => 'fa fa-long-arrow-right',
    'fields' => array(
        array(
            'id'      => 'ecofine_shop_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'shop Layout', 'ecofine' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'ecofine' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecofine' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'ecofine' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select shop page layout.', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_shop_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'ecofine' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Hide / Show Banner.', 'ecofine' ),
        ),
    ),
) );