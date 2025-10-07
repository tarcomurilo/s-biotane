<?php

if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

//
// Metabox of the PAGE
// Set a unique slug-like ID
//
$ecofinemetabox = 'ecofine_metabox';

//
// Create a metabox
//
CSF::createMetabox( $ecofinemetabox, array(
    'title'        => 'Metabox Options',
    'post_type'    => array( 'page', 'post', 'ecofine_portfolio', 'ecofine_team' ),
    'show_restore' => true,
) );

//
// Create a section
//
CSF::createSection( $ecofinemetabox, array(
    'title'  => esc_html__( 'Header', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'         => 'select_header_meta_type',
            'type'       => 'button_set',
            'title'      => esc_html__( 'Select Header Type', 'ecofine' ),
            'subtitle'      => esc_html__( 'Select your Header Type Default or Elementor', 'ecofine' ),
            'options'    => array(
              'headermeta_default'  => esc_html__( 'Default Headers', 'ecofine' ),
              'headermeta_elementor' => esc_html__( 'Elementor Headers', 'ecofine' ),
            ),
            'default'    => 'headermeta_default'
        ),

        array(
			'id'      => 'header_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Header', 'ecofine' ),
            'subtitle'      => esc_html__( 'Select Your Header, we are used Theme Default Header', 'ecofine' ),
			'empty_message' => esc_html__( 'No header template found. You can create header template from Ecofine Headers > Add New.', 'ecofine' ),
			'placeholder'   => esc_html__( 'Default', 'ecofine' ),
            'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'ecofine_header',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select header for this page', 'ecofine'),
            'dependency'  => array( 'select_header_meta_type', '==', 'headermeta_elementor' ),
		),

        array(
            'id'       => 'ecofine_meta_enable_header',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Header', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable this Options if you need', 'ecofine' ),
            'dependency'  => array( 'select_header_meta_type', '==', 'headermeta_default' ),
        ),
        array(
            'id'          => 'ecofine_meta_select_header',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Header Style', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'options'     => array(
                'one'   => esc_html__( 'Header One', 'ecofine' ),
                'two'   => esc_html__( 'Header Two', 'ecofine' ),
                'three' => esc_html__( 'Header Three', 'ecofine' ),
                'four' => esc_html__( 'Header Four', 'ecofine' ),
            ),
            'dependency'  => array(
                array( 'select_header_meta_type', '==', 'headermeta_default' ),
                array( 'ecofine_meta_enable_header', '==', 'true' ),
            ) 
        ),
        array(
            'id'       => 'ecofine_meta_enable_header_menu',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Header Menus', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable this Options if you need', 'ecofine' ),
            'dependency'  => array(
                array( 'select_header_meta_type', '==', 'headermeta_default' ),
            ) 
        ),
        array(
            'id'          => 'ecofine_meta_select_menu',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Menu', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'options'     => 'menus',
            'dependency'  => array(
                array( 'select_header_meta_type', '==', 'headermeta_default' ),
                array( 'ecofine_meta_enable_header_menu', '==', 'true' ),
            )
        ),
        array(
            'id'       => 'ecofine_meta_select_logo',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Specific Logo', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Specific Logo Options', 'ecofine' ),
            'dependency'  => array(
                array( 'select_header_meta_type', '==', 'headermeta_default' ),
            )
        ),
        array(
            'id'         => 'ecofine_meta_logo',
            'type'       => 'media',
            'title'      => esc_html__( 'Specific Logo', 'ecofine' ),
            'subtitle'   => esc_html__( '  Upload Specific Logo for page, post, Custom Post', 'ecofine' ),
            'library'    => 'image',
            'dependency'  => array(
                array( 'select_header_meta_type', '==', 'headermeta_default' ),
                array( 'ecofine_meta_select_logo', '==', 'true' ),
            )
        ),

    ),
) );

// Create layout section
CSF::createSection( $ecofinemetabox, array(
    'title'  => esc_html__( 'Layout', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'          => 'ecofine_layout_meta',
            'type'        => 'select',
            'title'       => esc_html__( 'Layout', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'options'     => array(
                'full-width'    => esc_html__( 'Full Width', 'ecofine' ),
                'left-sidebar'  => esc_html__( 'Left Sidebar', 'ecofine' ),
                'right-sidebar' => esc_html__( 'Right Sidebar', 'ecofine' ),
            ),
            'desc'        => esc_html__( 'Select layout', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_sidebar_meta',
            'type'       => 'select',
            'title'      => esc_html__( 'Sidebar', 'ecofine' ),
            'options'    => 'ecofine_sidebars',
            'dependency' => array( 'ecofine_layout_meta', 'any', 'left-sidebar,right-sidebar' ),
            'desc'       => esc_html__( 'Select sidebar you want to show with this page.', 'ecofine' ),
        ),
        array(
            'id'       => 'ecofine_meta_page_navbar',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Pagination', 'ecofine' ),
            'subtitle' => esc_html__( 'This Options only for Default page', 'ecofine' ),
            'default'  => true,
        ),
        array(
            'id'          => 'ecofine_meta_page_spacing',
            'type'        => 'spacing',
            'title'       => esc_html__( 'Padding', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add Page Padding If you need', 'ecofine' ),
            'output'      => '.site-main.content-area',
            'output_mode' => 'padding',
        ),
    ),
) );

// Create a section
CSF::createSection( $ecofinemetabox, array(
    'title'  => esc_html__( 'Banner / Breadcrumb Area', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'       => 'ecofine_meta_enable_banner',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Banner', 'ecofine' ),
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable banner.', 'ecofine' ),
        ),
        array(
            'id'                    => 'ecofine_meta_banner_options',
            'type'                  => 'background',
            'title'                 => esc_html__( 'Banner Background', 'ecofine' ),
            'background_gradient'   => true,
            'background_origin'     => false,
            'background_clip'       => false,
            'background_blend-mode' => false,
            'default'               => array(
                'background-color'              => '',
                'background-gradient-color'     => '',
                'background-gradient-direction' => '',
                'background-size'               => '',
                'background-position'           => '',
                'background-repeat'             => 'no-repeat',
            ),
            'dependency'            => array( 'ecofine_meta_enable_banner', '==', true ),
            'output'                => '.breadcroumb-area',
            'desc'                  => esc_html__( 'If you use gradient background color (Second Color) then background image will not working. Gradient background priority is higher then background image', 'ecofine' ),
        ),
        array(
            'id'         => 'ecofine_meta_banner_title_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Banner Title Color', 'ecofine' ),
            'output'     => '.breadcroumn-contnt .brea-title',
            'dependency' => array( 'ecofine_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select banner title color.', 'ecofine' ),
        ),

        array(
            'id'         => 'ecofine_meta_breadcrumb_normal_color',
            'type'       => 'color',
            'title'      => esc_html__( 'Breadcrumb Text Color', 'ecofine' ),
            'output'     => '.bre-sub span',
            'subtitle'   => esc_html__( 'Breadcrumb Text Color', 'ecofine' ),
            'dependency' => array( 'ecofine_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb text color.', 'ecofine' ),
        ),

        array(
            'id'         => 'ecofine_meta_breadcrumb_link_color',
            'type'       => 'link_color',
            'title'      => esc_html__( 'Breadcrumb Link Color', 'ecofine' ),
            'output'     => array( '.bre-sub span a' ),
            'subtitle'   => esc_html__( 'Breadcrumb Link color', 'ecofine' ),
            'dependency' => array( 'ecofine_meta_enable_banner', '==', true ),
            'desc'       => esc_html__( 'Select breadcrumb link and link hover color.', 'ecofine' ),
        ),

    ),
) );
CSF::createSection( $ecofinemetabox, array(
    'title'  => esc_html__( 'Footer Settings', 'ecofine' ),
    'icon'   => 'fas fa-rocket',
    'fields' => array(
        array(
            'id'         => 'select_footer_meta_type',
            'type'       => 'button_set',
            'title'      => esc_html__( 'Select Footer Type', 'ecofine' ),
            'subtitle'      => esc_html__( 'Select your Footer Type Default or Elementor', 'ecofine' ),
            'options'    => array(
              'footermeta_default'  => esc_html__( 'Default Footers', 'ecofine' ),
              'footermeta_elementor' => esc_html__( 'Elementor Footers', 'ecofine' ),
            ),
            'default'    => 'footermeta_default'
        ),

        array(
			'id'      => 'footer_style_meta',
			'type'    => 'select',
			'title'         => esc_html__( 'Select Footer', 'ecofine' ),
            'subtitle'         => esc_html__( 'Select Your Footer, we are used Theme Default Footer', 'ecofine' ),
			'empty_message' => esc_html__( 'No Footer Template Found. You can create footer template from Ecofine Footers > Add New.', 'ecofine' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'ecofine_footer',
				'posts_per_page' => -1,
			),
			'desc'    => esc_html__('Select footer for this page', 'ecofine'),
            'dependency' => array( 'select_footer_meta_type', '==', 'footermeta_elementor' ),
		),

        array(
            'id'       => 'ecofine_meta_footer_style_shwo',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Enable Footer Style', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Footer Style for Specific Page, post or Custom Post', 'ecofine' ),
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'default'  => false,
            'desc'     => esc_html__( 'Enable or disable Footer Style.', 'ecofine' ),
            'dependency' => array( 'select_footer_meta_type', '==', 'footermeta_default' ),
        ),
        array(
            'id'          => 'ecofine_meta_footer_styles',
            'type'        => 'select',
            'title'       => esc_html__( 'Footer Styles', 'ecofine' ),
            'subtitle'    => esc_html__( 'Select Your Footer', 'ecofine' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofine' ),
            'options'     => array(
                'one' => esc_html__( 'Footer One', 'ecofine' ),
                'two' => esc_html__( 'Footer Two', 'ecofine' ),
                'three' => esc_html__( 'Footer Three', 'ecofine' ),
            ),
            'dependency'  => array(
                array( 'ecofine_meta_footer_style_shwo', '==', true ),
                array( 'select_footer_meta_type', '==', 'footermeta_default' ),
            ),
        ),
		array(
            'id'       => 'ecofine_meta_footer2_top_show',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Footer Top Section', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Footer Top Section for Specific Page, post or Custom Post', 'ecofine' ),
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable Footer Style.', 'ecofine' ),
            'dependency'  => array(
                array( 'ecofine_meta_footer_styles', '==', 'two' ),
                array( 'select_footer_meta_type', '==', 'footermeta_default' ),
            ),
        ),
        array(
            'id'       => 'ecofine_meta_footer3_top_show',
            'type'     => 'switcher',
            'title'    => esc_html__( 'Footer Top Section', 'ecofine' ),
            'subtitle' => esc_html__( 'Enable Footer Top Section for Specific Page, post or Custom Post', 'ecofine' ),
            'text_on'  => esc_html__( 'Yes', 'ecofine' ),
            'text_off' => esc_html__( 'No', 'ecofine' ),
            'default'  => true,
            'desc'     => esc_html__( 'Enable or disable Footer Style.', 'ecofine' ),
            'dependency'  => array(
                array( 'ecofine_meta_footer_styles', '==', 'three' ),
                array( 'select_footer_meta_type', '==', 'footermeta_default' ),
            ),
        ),
    ),
) );