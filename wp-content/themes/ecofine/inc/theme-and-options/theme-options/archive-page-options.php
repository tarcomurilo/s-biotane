<?php
//Archive Options
CSF::createSection( $EcofineThemeOption, array(
    'parent' => 'ecofine_page_options',
    'title'  => esc_html__( 'Archive Page', 'ecofine' ),
    'icon'   => 'fa fa-archive',
    'fields' => array(
        array(
            'id'      => 'ecofine_archive_layout',
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
            'id'       => 'ecofine_archive_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Banner', 'ecofine' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Enable or disable archive page banner.', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_archive_pagination',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Archive Pagination', 'ecofine' ),
            'default'  => true,
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'desc'     => esc_html__( 'Enable or disable archive Pagination.', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_archive_banner_title_static_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Static Title Color', 'ecofine' ),
            'output'     => '.page-header .container h2.archive-title',
            'dependency' => array( 'ecofine_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner Static title color.', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_archive_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'ecofine' ),
            'output'     => '.archive-title span',
            'dependency' => array( 'ecofine_archive_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'ecofine' ),
        ),
    ),
) );