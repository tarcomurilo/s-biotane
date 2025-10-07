<?php
//search Options
CSF::createSection( $EcofineThemeOption, array(
    'parent' => 'ecofine_page_options',
    'title'  => esc_html__( 'Search Page', 'ecofine' ),
    'icon'   => 'fa fa-search',
    'fields' => array(
        array(
            'id'      => 'ecofine_search_layout',
            'type'    => 'select',
            'title'   => esc_html__( 'Archive Layout', 'ecofine' ),
            'options' => array(
                'grid'          => esc_html__( 'Grid Full', 'ecofine' ),
                'grid-ls'       => esc_html__( 'Grid With Left Sidebar', 'ecofine' ),
                'grid-rs'       => esc_html__( 'Grid With Right Sidebar', 'ecofine' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecofine' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'ecofine' ),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__( 'Select blog page layout.', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_search_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable search Banner', 'ecofine' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Enable or disable search page banner.', 'ecofine' ),
        ),
    ),
) );