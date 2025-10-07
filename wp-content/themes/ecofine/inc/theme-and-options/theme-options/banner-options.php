<?php

//Banner Options
CSF::createSection( $EcofineThemeOption, array(
    'parent' => 'ecofine_page_options',
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'ecofine' ),
    'icon'   => 'fa fa-flag',
    'fields' => array(
        array(
            'id'                    => 'ecofine_banner_default_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'ecofine' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => 'to right',
                'background-size'               => 'cover',
                'background-position'           => 'center center',
                'background-repeat'             => 'no-repeat',
            ),
            'output'                => '.breadcroumb-area',
            'subtitle'              => esc_html__( 'Select banner default properties for all page / post. You can override this settings on individual page / post.', 'ecofine' ),
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_breadcrumb_normal_color',
            'type'     => 'color',
            'title'    => esc_html__( 'Breadcrumb Text Color', 'ecofine' ),
            'output'   => '.breadcroumn-contnt .brea-title',
            'subtitle' => esc_html__( 'Breadcrumb Text Color', 'ecofine' ),
            'desc'     => esc_html__( 'Select breadcrumb text color.', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_breadcrumb_link_color',
            'type'     => 'link_color',
            'title'    => esc_html__( 'Breadcrumb Link Color', 'ecofine' ),
            'output'   => array( '.bre-sub span a span' ),
            'subtitle' => esc_html__( 'Breadcrumb Link color', 'ecofine' ),
            'desc'     => esc_html__( 'Select breadcrumb link and link hover color.', 'ecofine' ),
        ),
        array(
            'id'          => 'ecofine_breadcrumb_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Breadcrumb Spacing', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add Breadcrumb Content Spacing', 'ecofine' ),
            'output'      => '.breadcroumb-area',
            'output_mode' => 'padding', // or margin, relative
        ),
        array(
            'id'          => 'ecofine_breadcrumb_select_html',
            'type'        => 'select',
            'title'       => esc_html__( 'HTML Tag', 'ecofine' ),
            'subtitle'    => esc_html__( 'Select Title HTML Tag', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'options'     => array(
                'h1' => esc_html__( 'H1', 'ecofine' ),
                'h2' => esc_html__( 'H2', 'ecofine' ),
                'h3' => esc_html__( 'H3', 'ecofine' ),
                'h4' => esc_html__( 'H4', 'ecofine' ),
                'h5' => esc_html__( 'H5', 'ecofine' ),
                'h6' => esc_html__( 'H6', 'ecofine' ),
            ),
            'default'     => 'h2',
        ),
    ),
) );