<?php
//donate Page Options
CSF::createSection($EcofineThemeOption, array(
    'title'  => esc_html__('Donate Page', 'ecofine'),
    'icon'   => 'fa fa-gift',
    'fields' => array(
        array(
            'id'       => 'ecofine_blog_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'ecofine'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'desc'     => esc_html__('Hide / Show Banner.', 'ecofine'),
        ),
        array(
            'id'      => 'ecofine_donate_layout',
            'type'    => 'select',
            'title'   => esc_html__('Blog Layout', 'ecofine'),
            'subtitle'    => esc_html__('Select The Page layout For donate Single Page', 'ecofine'),
            'options' => array(
                'fullwidth'          => esc_html__('Full Width', 'ecofine'),
                'left-sidebar'  => esc_html__('Left Sidebar', 'ecofine'),
                'right-sidebar' => esc_html__('Right Sidebar', 'ecofine'),
            ),
            'default' => 'right-sidebar',
            'desc'    => esc_html__('Select blog page layout.', 'ecofine'),
        ),

        array(
            'id'          => 'ecofine_donate_widget',
            'type'        => 'select',
            'title'       => esc_html__('Select Sidebar', 'ecofine'),
            'subtitle' => esc_html__('Select The Sidebar', 'ecofine'),
            'options'     => 'sidebars',
            'dependency' => array( 'ecofine_donate_layout', 'any', 'left-sidebar,right-sidebar' ),
        ),
        
        array(
            'id'       => 'ecofine_donate_banner_enable',
            'type'     => 'switcher',
            'title'    => esc_html__('Enable Banner', 'ecofine'),
            'default'  => true,
            'text_on'  => esc_html__('Yes', 'ecofine'),
            'text_off' => esc_html__('No', 'ecofine'),
            'subtitle'     => esc_html__('Hide / Show Banner.', 'ecofine'),
        ),
        array(
            'id'          => 'ecofine_donate_title_tag',
            'type'        => 'select',
            'title'       => esc_html__('Title HTML Tag', 'ecofine'),
            'placeholder' =>  esc_html__('Select an option', 'ecofine'),
            'options'     => array(
                'h1'  => esc_html__('H1', 'ecofine'),
                'h2'  => esc_html__('H2', 'ecofine'),
                'h3'  => esc_html__('H3', 'ecofine'),
                'h4'  => esc_html__('H4', 'ecofine'),
                'h5'  => esc_html__('H5', 'ecofine'),
                'h6'  => esc_html__('H6', 'ecofine'),
            ),
            'default'     => 'h2',
            'subtitle'    => esc_html__('Select The Title HTML Tag For donate signle Banner', 'ecofine'),
        ),
    )
));