<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header Setings
CSF::createSection( $EcofineThemeOption, array(
    'id'     => 'ecofine_header_settings',
    'title'  => esc_html__( 'Header Settings', 'ecofine' ),
    'icon'   => 'fa fa-header',
    'fields' => array(
        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Select Header Style 1', 'ecofine' ),
        ),
        array(
            'id'         => 'select_header_type',
            'type'       => 'button_set',
            'title'      => esc_html__( 'Select header Type', 'ecofine' ),
            'subtitle'      => esc_html__( 'Select your Header Type Default or Elementor', 'ecofine' ),
            'options'    => array(
              'headers_default'  => esc_html__( 'Default Headers', 'ecofine' ),
              'headers_elementor' => esc_html__( 'Elementor Headers', 'ecofine' ),
            ),
            'default'    => 'headers_default'
        ),

        array(
			'id'            => 'site_header_elementor',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Header', 'ecofine' ),
			'empty_message' => esc_html__( 'No Header Template Found. You can create header template from Ecofine Headers > Add New.', 'ecofine' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'ecofine_header',
				'posts_per_page' => - 1,
			),
			'desc'          => esc_html__( 'Select site header from here. Selected template will be used for all pages by default.', 'ecofine' ),
            'dependency'       => array(
                array( 'select_header_type', '==', 'headers_elementor' ),
            ),
        ),


		array(
			'type'       => 'notice',
			'id'         => 'site_header_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom header selected. You can edit/create Header Template in the', 'ecofine'),
				admin_url('edit.php?post_type=ecofine_header'),
				esc_html__('Ecofine Headers', 'ecofine'),
				esc_html__('dashboard tab.', 'ecofine')
			),
			'dependency'       => array(
                array( 'select_header_type', '==', 'headers_elementor' ),
            ),
		),



        array(
            'id'       => 'ecofine_header_styles',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Select Style', 'ecofine' ),
            'subtitle' => esc_html__( 'Choose Your Header Style For Global', 'ecofine' ),
            'default'  => 'one',
            'options'  => array(
                'one' => get_theme_file_uri( 'assets/image/header-1.jpg' ),
                'two' => get_theme_file_uri( 'assets/image/header-2.jpg' ),
                'three' => get_theme_file_uri( 'assets/image/header-3.jpg' ),
                'four' => get_theme_file_uri( 'assets/image/header-4.jpg' ),
            ),
            'dependency'       => array(
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER ONE STICKY  OPTIONS _________
        //______-------________------________---------
        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Sticky Menu Options', 'ecofine' ),
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_enable_sticky_menu1',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Sticky Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Sticky Menu If you need', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'               => 'ecofine_header_sticky1',
            'type'             => 'color',
            'title'            => esc_html__( 'Sticky Menu Background', 'ecofine' ),
            'subtitle'         => esc_html__( 'Add Background Color for Sticky Menu', 'ecofine' ),
            'output_mode'      => 'background-color',
            'output'           => '.header-one .sticky-wrapper.sticky .menu-area',
            'output_important' => true,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'ecofine_enable_sticky_menu1', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER LOGO OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Site Logo Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_show_hlogo1',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Logo Options if you need', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' =>array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            )
        ),
        array(
            'id'         => 'ecofine_logo1',
            'type'       => 'media',
            'title'      => esc_html__( 'SIte Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Upload Header Logo if you do not use Wordpress Default logo option ', 'ecofine' ),
            'library'    => 'image',
            'dependency' => array(
                array( 'ecofine_header_styles|ecofine_show_hlogo1', '==|==', 'one|true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'          => 'ecofine_logo1_size',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Size', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add logo Size if you need Logo Size', 'ecofine' ),
            'unit'        => 'px',
            'output'      => '.header-one .header-logo img',
            'output_mode' => 'width',
            'dependency' => array(
                array( 'ecofine_header_styles|ecofine_show_hlogo1', '==|==', 'one|true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
		
		   //______-------________------________---------
        //__________ HEADER MOBILE LOGO OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Site Mobile Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_mobile_logo_enable',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Logo for Mobile Options if you need', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'mobile_logo',
            'type'       => 'media',
            'title'      => esc_html__( 'Mobile Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Upload Mobile Header Logo if you Need  ', 'ecofine' ),
            'library'    => 'image',
			'dependency' => array(
                array( 'ecofine_mobile_logo_enable', '==', 'true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
		  array(
                    'id'                  => 'mobile_logo_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Mobile Logo Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Background color or Gradient color for Mobile Logo', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.ot-menu-wrapper .mobile-logo',
                ),
        //______-------________------________---------
        //__________ HEADER TOP AREA SECTION _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_topbar_show1',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Header Top Section Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header_topbar',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Header Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'This FieldSet for Header Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'ecofine_topbar_show1', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_promotion_text',
                    'type'     => 'wp_editor',
                    'title'    => esc_html__( 'Promotion Text', 'ecofine' ),
                    'subtitle' => esc_html__( 'It will be used for advertising on the website', 'ecofine' ),
                    'default'  => esc_html__( 'It will be used for advertising on the website', 'ecofine' ),
                    'height'    =>  '100px',
                ),
                array(
                    'id'       => 'ecofine_topbar_left',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Info List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Info here', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_topbar_info',
                            'type'     => 'wp_editor',
                            'title'    => esc_html__( 'Content', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Content for info list', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_info_icon',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Icon for info list', 'ecofine' ),
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_info'      => esc_html__( '(629) 555-0129', 'ecofine' ),
                            'ecofine_topbar_info_icon' => 'bi bi-telephone-fill',
                        ),
                        array(
                            'ecofine_topbar_info'      => esc_html__( 'info@example.com', 'ecofine' ),
                            'ecofine_topbar_info_icon' => 'bi bi-envelope-fill',
                        ),
                        array(
                            'ecofine_topbar_info'      => esc_html__( '6391 Elgin St. Celina, 10299', 'ecofine' ),
                            'ecofine_topbar_info_icon' => 'bi bi-geo-alt-fill',
                        ),
                    ),
                ),
                array(
                    'id'      => 'ecofine_social_title',
                    'type'    => 'text',
                    'title'    => esc_html__( 'Social Title', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Social Title Here', 'ecofine' ),
                    'default'  => esc_html__( 'Follow On :', 'ecofine' ),
                  ),
                array(
                    'id'       => 'ecofine_topbar_social',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Social Icon List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Social Link here', 'ecofine' ),
                    'fields'   => array(
                          array(
                            'id'       => 'ecofine_topbar_social_label',
                            'type'     => 'text',
                            'title'    => esc_html__( 'label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Social name Here', 'ecofine' ),
                            'default'  => esc_html__( 'Facebook', 'ecofine' ),
                        ),
                        array(
                            'id'      => 'ecofine_topbar_social_link',
                            'type'    => 'link',
                            'title'   => esc_html__( 'Link', 'ecofine' ),
                            'default' => array(
                                'url'    => '#',
                                'target' => '_blank',
                            ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_social_icon',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Icon for Social', 'ecofine' ),
                            'default'  => 'fab fa-facebook-f',
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_social_label' => esc_html__( 'Facebook', 'ecofine' ),
                            'ecofine_topbar_social_icon'  => 'fab fa-facebook-f',
                        ),
                        array(
                            'ecofine_topbar_social_label' => esc_html__( 'Twitter', 'ecofine' ),
                            'ecofine_topbar_social_icon'  => 'fab fa-twitter',
                        ),
                        array(
                            'ecofine_topbar_social_label' => esc_html__( 'Linkedin', 'ecofine' ),
                            'ecofine_topbar_social_icon'  => 'fab fa-linkedin-in',
                        ),
                        array(
                            'ecofine_topbar_social_label' => esc_html__( 'Instagram', 'ecofine' ),
                            'ecofine_topbar_social_icon'  => 'fab fa-instagram',
                        ),
                    ),
                ),

                //================ HEADER TOP SECTION CSS OPTIONS ================
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Header Top CSS Options', 'ecofine' ),
                ),

                array(
                    'id'                  => 'ecofine_topbar_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Background image/color or Gradient color for Heade Top Section', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.header-one .header-top',
                ),

                array(
                    'id'          => 'ecofine_topbar_spacing',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Spacing', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Spacing on Top Header if you use background', 'ecofine' ),
                    'output'      => '.header-one .header-top',
                    'output_mode' => 'padding',
                ),
                array(
                    'id'          => 'ecofine_topbar_radius',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Radius', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Border Radius on Top Header if you use background and if you need', 'ecofine' ),
                    'output'      => '.header-one .header-top',
                    'output_mode' => 'border-radius',
                ),
                array(
                    'id'       => 'ecofine_topbar_promotion_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Promotion Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Heade Top Promotion Text', 'ecofine' ),
                    'output'   => '.header-one .header-top .promostion-test',
                ),
                array(
                    'id'       => 'ecofine_topbar_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Heade Top Text', 'ecofine' ),
                    'output'   => '.header-one .header-top .header-links ul li',
                ),
                array(
                    'id'       => 'ecofine_topbar_icon_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Icon Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top icon', 'ecofine' ),
                    'output'   => '.header-one .header-top .header-links ul li i',
                ),
                array(
                    'id'       => 'ecofine_topbar_link_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Link Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add color for any Link', 'ecofine' ),
                    'output'   => array( '.header-one .header-links ul li a', '.header-one .header-socials-icon ul li a' ),
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Header Top Social Icon Styel', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_topbar_social_title_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Title Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon Title', 'ecofine' ),
                    'output'   => '.header-one .header-top .header-social .social-title',
                ),
                array(
                    'id'       => 'ecofine_topbar_social_icon_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Icon Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon', 'ecofine' ),
                    'output'   => '.header-one .header-top .header-social a',
                ),
                array(
                    'id'       => 'ecofine_topbar_social_icon_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Icon Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon Hover', 'ecofine' ),
                    'output'   => '.header-one .header-top .header-social a:hover',
                ),
            ),
        ),

        //______-------________------________---------
        //__________ HEADER ONE MENU OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header-menu_group1',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
            ),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_top_header1_menu_ncolors',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'ecofine' ),
                    'output'   => '.header-one .main-menu > ul > li > a',
                ),
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_color1',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-one .main-menu ul.sub-menu li a',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor1',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-one .main-menu ul.sub-menu li a',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor1_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-one .main-menu ul.sub-menu li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_border',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'ecofine' ),
                    'output'      => '.header-one .main-menu ul.sub-menu li',
                    'output_mode' => 'border-color',
                ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER GET A QUOTE OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_show',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Get A Quote', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Get A Quote button Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_text',
            'type'       => 'text',
            'title'      => esc_html__( 'Button Text', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Guote Button Text Here', 'ecofine' ),
            'default'    => esc_html__( 'Discover More', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'ecofine_cta_show', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_link',
            'type'       => 'link',
            'title'      => esc_html__( 'Link', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Quote Button Link Here', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'ecofine_cta_show', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_fieldset',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'This Options for Header Quite Button', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'one', 'all' ),
                array( 'ecofine_cta_show', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_cta_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Color Here', 'ecofine' ),
                    'output'   => '.header-one .header-button .theme-btns',
                ),
                array(
                    'id'          => 'ecofine_cta_bg',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-one .header-button .theme-btns',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Hover Color Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_cta_hcolor',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Hover Color Here', 'ecofine' ),
                    'output'   => '.header-one .header-button .theme-btns:hover',
                ),
                array(
                    'id'          => 'ecofine_cta_hbg',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background hover Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-one .header-button .theme-btns:hover',
                ),
            ),
        ),
        //______-------________------________---------
        //__________ END THE HEADER ONE OPTIONS _________
        //______-------________------________---------


        //______-------________------________---------
        //__________ HEADER TWO MENU OPTIONS _________
        //______-------________------________---------
        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Sticky Menu Options 2', 'ecofine' ),
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_enable_sticky_menu2',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Sticky Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Sticky Menu If you need', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'               => 'ecofine_header_sticky2',
            'type'             => 'color',
            'title'            => esc_html__( 'Sticky Menu Background', 'ecofine' ),
            'subtitle'         => esc_html__( 'Add Background Color for Sticky Menu', 'ecofine' ),
            'output_mode'      => 'background-color',
            'output'           => '.header-two .sticky-bar .main-header',
            'output_important' => true,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'ecofine_enable_sticky_menu2', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER TWO lOGO OPTIONS _________
        //______-------________------________---------
        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Site Logo Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_show_hlogo2',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Logo Options if you need', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_logo2',
            'type'       => 'media',
            'title'      => esc_html__( 'SIte Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Upload Header Logo if you do not use Wordpress Default logo option ', 'ecofine' ),
            'library'    => 'image',
            'dependency' => array(
                array( 'ecofine_header_styles|ecofine_show_hlogo2', '==|==', 'two|true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            )
        ),
        array(
            'id'          => 'ecofine_logo2_size',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Size', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add logo Size if you need Logo Size', 'ecofine' ),
            'unit'        => 'px',
            'output'      => '.header-two .header-logo img',
            'output_mode' => 'width',
            'dependency' => array(
                array( 'ecofine_header_styles|ecofine_show_hlogo2', '==|==', 'two|true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            )
        ),
        
        //______-------________------________---------
        //__________ HEADER TWO MENU OPTIONS _________
        //______-------________------________---------
        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header-menu_group2',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_top_header2_menu_ncolors',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'ecofine' ),
                    'output'   => '.header-two .main-navigation ul li a',
                ),
                array(
                    'id'       => 'ecofine_header2_menu_bg',
                    'type'     => 'background',
                    'title'    => esc_html__( 'Background', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Background Color for Menu Area', 'ecofine' ),
                    'output'   => '.site-header.header-two .main-header',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_color2',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-two .main-navigation ul li ul li a',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor2',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-two .main-navigation ul li ul',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_border2',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'ecofine' ),
                    'output'      => '.site-header.header-two .main-navigation ul li ul li a',
                    'output_mode' => 'border-color',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Sub Menu Hover CSS', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_hcolor2',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-two .main-navigation ul li ul li a:hover',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_hbgcolor2',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-two .main-navigation ul li ul li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Header Menu Attribute Options', 'ecofine' ),
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_c2',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color For Menu Attribute Text', 'ecofine' ),
                    'output_mode'      => 'color',
                    'output'           => '.header-two .navbar ul li a[title]:after',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_bg2',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Background Color For Menu Attribute', 'ecofine' ),
                    'output_mode'      => 'background-color',
                    'output'           => '.header-two .navbar ul li a[title]:after',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_border2',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Symble Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Symble Color For Menu Attribute', 'ecofine' ),
                    'output_mode'      => 'border-left-color',
                    'output'           => '.header-two .navbar ul li a[title]:before',
                    'output_important' => true,
                ),
            ),
        ),
   
        //______-------________------________---------
        //__________ HEADER Support OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Support Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_support_show',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Support Button', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Support button Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_fieldset3',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Support Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'This Options for Header Quite Button', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'ecofine_support_show', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_support_icon',
                    'type'     => 'icon',
                    'title'    => esc_html__( 'Icon', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Icon for info list', 'ecofine' ),
                    'default'  => 'fas fa-phone-alt',
                    
                ),
                array(
                    'id'         => 'ecofine_support_text',
                    'type'       => 'text',
                    'title'      => esc_html__( 'Text', 'ecofine' ),
                    'subtitle'   => esc_html__( 'Add Support Text for support Option', 'ecofine' ),
                    'default'    => esc_html__( 'Need help?', 'ecofine' ),
                ),
                array(
                    'id'         => 'ecofine_support_number',
                    'type'       => 'text',
                    'title'      => esc_html__( 'Number', 'ecofine' ),
                    'subtitle'   => esc_html__( 'Add number for support Option', 'ecofine' ),
                    'default'    => esc_html__( '(808) 555-0111', 'ecofine' ),
                ),
                array(
                    'id'         => 'ecofine_support_link',
                    'type'       => 'link',
                    'title'      => esc_html__( 'Link', 'ecofine' ),
                    'subtitle'   => esc_html__( 'Add Support Button Link Here', 'ecofine' ),
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Support Bytton Style Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_support_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Support Button Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Support Button text Color Here', 'ecofine' ),
                    'output'   => '.header-two .header-button .theme-btns',
                ),
                array(
                    'id'          => 'ecofine_Support_btn_bg',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Support Button Background Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-two .header-button .theme-btns',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Hover Color Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_support_text_color_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Support Button text Hover Color Here', 'ecofine' ),
                    'output'   => '.header-two .header-button .theme-btns:hover',
                ),
                array(
                    'id'          => 'ecofine_Support_btn_bg_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Support Button Background hover Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-two .header-button .theme-btns:hover',
                ),
            ),
        ),



        //______-------________------________---------
        //__________ HEADER TWO BUTTON OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Button Options', 'ecofine' ),
            'dependency' =>array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
           
        ),
        array(
            'id'         => 'ecofine_btn_show2',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Get A Quote', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Get A Quote button Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' =>array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_btn_text2',
            'type'       => 'text',
            'title'      => esc_html__( 'Button Text', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Guote Button Text Here', 'ecofine' ),
            'default'    => esc_html__( 'Discover More', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'ecofine_btn_show2', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_btn_link2',
            'type'       => 'link',
            'title'      => esc_html__( 'Link', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Quote Button Link Here', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'ecofine_btn_show2', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_btn_fieldset2',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'This Options for Header Quite Button', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'two', 'all' ),
                array( 'ecofine_btn_show2', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_btn_color2',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Color Here', 'ecofine' ),
                    'output'   => '.header-two .header-button .theme-btns',
                ),
                array(
                    'id'          => 'ecofine_btn_bg2',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-two .header-button .theme-btns',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Hover Color Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_btn_color2_hover',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Hover Color Here', 'ecofine' ),
                    'output'   => '.header-two .header-button .theme-btns:hover',
                ),
                array(
                    'id'          => 'ecofine_btn_bg2_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background hover Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-two .header-button .theme-btns:hover',
                ),
            ),
        ),


        //______-------________------________---------
        //__________ END HEADER TWO OPTIONS _________
        //______-------________------________---------


        //______-------________------________---------
        //__________ START HEADER THREE  OPTIONS _________
        //______-------________------________---------

        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Sticky Menu Options 3', 'ecofine' ),
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_enable_sticky_menu3',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Sticky Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Sticky Menu If you need', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'               => 'ecofine_header_sticky3',
            'type'             => 'color',
            'title'            => esc_html__( 'Sticky Menu Background', 'ecofine' ),
            'subtitle'         => esc_html__( 'Add Background Color for Sticky Menu', 'ecofine' ),
            'output_mode'      => 'background-color',
            'output'           => '.header-three .sticky-wrapper.sticky .menu-area',
            'output_important' => true,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'ecofine_enable_sticky_menu3', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        
        //______-------________------________---------
        //__________ HEADER THREE SITE LOGO OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Site Logo Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_show_hlogo3',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Logo Options if you need', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' =>array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_logo3',
            'type'       => 'media',
            'title'      => esc_html__( 'SIte Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Upload Header Logo if you do not use Wordpress Default logo option ', 'ecofine' ),
            'library'    => 'image',
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles|ecofine_show_hlogo3', '==|==', 'three|true', 'all' ),
            ) 
        ),
        array(
            'id'          => 'ecofine_logo3_size',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Size', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add logo Size if you need Logo Size', 'ecofine' ),
            'unit'        => 'px',
            'output'      => '.header-three .header-logo img',
            'output_mode' => 'width',
            'dependency' =>array(
                array( 'ecofine_header_styles|ecofine_show_hlogo3', '==|==', 'three|true', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            )
        ),

        //______-------________------________---------
        //__________ HEADER THREE TOP AREA SECTION _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Top Section', 'ecofine' ),
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_topbar_show3',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Header Top Section Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header_topbar3',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Header Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'This FieldSet for Header Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'ecofine_topbar_show3', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_topbar_left3',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Info List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Info here', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_topbar_info3',
                            'type'     => 'wp_editor',
                            'title'    => esc_html__( 'Content', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Content for info list', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_info_icon3',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Icon for info list', 'ecofine' ),
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_info3'      => esc_html__( '(629) 555-0329', 'ecofine' ),
                            'ecofine_topbar_info_icon3' => 'bi bi-telephone-fill',
                        ),
                        array(
                            'ecofine_topbar_info3'      => esc_html__( 'info@example.com', 'ecofine' ),
                            'ecofine_topbar_info_icon3' => 'bi bi-envelope-fill',
                        ),
                        array(
                            'ecofine_topbar_info3'      => esc_html__( '6393 Elgin St. Celina, 30299', 'ecofine' ),
                            'ecofine_topbar_info_icon3' => 'bi bi-geo-alt-fill',
                        ),
                    ),
                ),
              
                array(
                    'id'       => 'ecofine_topbar_social3',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Social Icon List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Social Link here', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_topbar_social_label3',
                            'type'     => 'text',
                            'title'    => esc_html__( 'label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Social name Here', 'ecofine' ),
                            'default'  => esc_html__( 'Facebook', 'ecofine' ),
                        ),
                        array(
                            'id'      => 'ecofine_topbar_social_link3',
                            'type'    => 'link',
                            'title'   => esc_html__( 'Link', 'ecofine' ),
                            'default' => array(
                                'url'    => 'facebook.com',
                                'target' => '_blank',
                            ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_social_icon3',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Icon for Social', 'ecofine' ),
                            'default'  => 'fab fa-facebook-f',
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_social_label3' => esc_html__( 'Facebook', 'ecofine' ),
                            'ecofine_topbar_social_icon3'  => 'fab fa-facebook-f',
                        ),
                        array(
                            'ecofine_topbar_social_label3' => esc_html__( 'Twitter', 'ecofine' ),
                            'ecofine_topbar_social_icon3'  => 'fab fa-twitter',
                        ),
                        array(
                            'ecofine_topbar_social_label3' => esc_html__( 'Linkedin', 'ecofine' ),
                            'ecofine_topbar_social_icon3'  => 'fab fa-linkedin-in',
                        ),
                        array(
                            'ecofine_topbar_social_label3' => esc_html__( 'Instagram', 'ecofine' ),
                            'ecofine_topbar_social_icon3'  => 'fab fa-instagram',
                        ),
                    ),
                ),

                //================ HEADER TOP SECTION CSS OPTIONS ================
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Header Top CSS Options', 'ecofine' ),
                ),

                array(
                    'id'                  => 'ecofine_topbar_bg3',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Background image/color or Gradient color for Heade Top Section', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.header-three .header-top',
                ),

                array(
                    'id'          => 'ecofine_topbar_spacing2',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Spacing', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Spacing on Top Header if you use background', 'ecofine' ),
                    'output'      => '.header-three .header-top',
                    'output_mode' => 'padding',
                ),
                array(
                    'id'          => 'ecofine_topbar_radius3',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Radius', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Border Radius on Top Header if you use background and if you need', 'ecofine' ),
                    'output'      => '.header-three .header-top',
                    'output_mode' => 'border-radius',
                ),
                array(
                    'id'       => 'ecofine_topbar_text_color3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Heade Top Text', 'ecofine' ),
                    'output'   => '.header-three .header-top .header-links ul li',
                ),
                array(
                    'id'       => 'ecofine_topbar_icon_color3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Icon Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top icon', 'ecofine' ),
                    'output'   => '.header-three .header-top .header-links ul li i',
                ),
                array(
                    'id'       => 'ecofine_topbar_link_color3',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Link Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add color for any Link', 'ecofine' ),
                    'output'   => array( '.header-three .header-links ul li a', '.header-three .header-socials-icon ul li a' ),
                ),
            ),
        ),

        //______-------________------________---------
        //__________ HEADER THREE MENU OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'ecofine' ),
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header-menu_group3',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'ecofine' ),
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_top_header3_menu_ncolors',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'ecofine' ),
                    'output'   => '.header-three .main-navigation ul li a',
                ),
                array(
                    'id'       => 'ecofine_header3_menu_bg',
                    'type'     => 'background',
                    'title'    => esc_html__( 'Background', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Background Color for Menu Area', 'ecofine' ),
                    'output'   => '.site-header.header-three .main-header',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_color3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-three .main-navigation ul li ul li a',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor3',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-three .main-navigation ul li ul',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_border3',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'ecofine' ),
                    'output'      => '.site-header.header-three .main-navigation ul li ul li a',
                    'output_mode' => 'border-color',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Sub Menu Hover CSS', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_hcolor3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-three .main-navigation ul li ul li a:hover',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_hbgcolor3',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-three .main-navigation ul li ul li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Header Menu Attribute Options', 'ecofine' ),
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_c3',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color For Menu Attribute Text', 'ecofine' ),
                    'output_mode'      => 'color',
                    'output'           => '.header-three .navbar ul li a[title]:after',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_bg3',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Background Color For Menu Attribute', 'ecofine' ),
                    'output_mode'      => 'background-color',
                    'output'           => '.header-three .navbar ul li a[title]:after',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_header_menu_attribute_border3',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Symble Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Symble Color For Menu Attribute', 'ecofine' ),
                    'output_mode'      => 'border-left-color',
                    'output'           => '.header-three .navbar ul li a[title]:before',
                    'output_important' => true,
                ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER GET A QUOTE OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_show3',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Get A Quote', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Get A Quote button Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_text3',
            'type'       => 'text',
            'title'      => esc_html__( 'Button Text', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Guote Button Text Here', 'ecofine' ),
            'default'    => esc_html__( 'Discover More', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'ecofine_cta_show3', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_link3',
            'type'       => 'link',
            'title'      => esc_html__( 'Link', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Quote Button Link Here', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'ecofine_cta_show3', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_fieldset3',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'This Options for Header Quite Button', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'three', 'all' ),
                array( 'ecofine_cta_show3', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_cta_color3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Color Here', 'ecofine' ),
                    'output'   => '.header-three .header-button .theme-btns',
                ),
                array(
                    'id'          => 'ecofine_cta_bg3',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-three .header-button .theme-btns',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Hover Color Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_cta_hcolor3',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Hover Color Here', 'ecofine' ),
                    'output'   => '.header-three .header-button .theme-btns:hover',
                ),
                array(
                    'id'          => 'ecofine_cta_hbg3',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background hover Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-three .header-button .theme-btns:hover',
                ),
            ),
        ),
        
                //______-------________------________---------________---------
        //________--------- HEADER FOUR STICKY  OPTIONS ________---------
        //______-------________------________---------________---------

        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Sticky Menu Options', 'ecofine' ),
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_enable_sticky_menu4',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Sticky Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Sticky Menu If you need', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'               => 'ecofine_header_sticky4',
            'type'             => 'color',
            'title'            => esc_html__( 'Sticky Menu Background', 'ecofine' ),
            'subtitle'         => esc_html__( 'Add Background Color for Sticky Menu', 'ecofine' ),
            'output_mode'      => 'background-color',
            'output'           => '.header-four .sticky-wrapper.sticky .menu-area',
            'output_important' => true,
            'dependency'       => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'ecofine_enable_sticky_menu1', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'                  => 'ecofine_sticky_bg4',
            'type'                => 'background',
            'title'               => esc_html__( 'Background', 'ecofine' ),
            'subtitle'            => esc_html__( 'Add Background image/color or Gradient color for Header sticky Menu', 'ecofine' ),
            'background_gradient' => true,
            'background_origin'   => true,
            'output'              => '.header-four .sticky-wrapper.sticky .menu-area',
            'dependency'       => array(
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),

        //______-------________------________---------
        //__________ HEADER FOUR LOGO OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Site Logo Options', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_show_hlogo4',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Logo Options if you need', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_logo4',
            'type'       => 'media',
            'title'      => esc_html__( 'SIte Logo', 'ecofine' ),
            'subtitle'   => esc_html__( 'Upload Header Logo if you do not use Wordpress Default logo option ', 'ecofine' ),
            'library'    => 'image',
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles|ecofine_show_hlogo4', '==|==', 'four|true', 'all' ),
            ) 
        ),
        array(
            'id'          => 'ecofine_logo4_size',
            'type'        => 'number',
            'title'       => esc_html__( 'Logo Size', 'ecofine' ),
            'subtitle'    => esc_html__( 'Add logo Size if you need Logo Size', 'ecofine' ),
            'unit'        => 'px',
            'output'      => '.header-four .header-logo img',
            'output_mode' => 'width',
            'dependency' =>array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles|ecofine_show_hlogo4', '==|==', 'four|true', 'all' ),
            )
        ),
        //______-------________------________---------
        //__________ HEADER FOUR TOP AREA SECTION _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_topbar_show4',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Header Top Section Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_header_topbar4',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Header Topbar', 'ecofine' ),
            'subtitle'   => esc_html__( 'This FieldSet for Header Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'ecofine_topbar_show4', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_topbar_left4',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Info List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Info here', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_topbar_label',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Content for info Label', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_info4',
                            'type'     => 'wp_editor',
                            'title'    => esc_html__( 'Content', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Content for info list', 'ecofine' ),
                        ),
                        
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_label'      => esc_html__( 'Address:', 'ecofine' ),
                            'ecofine_topbar_info4'      => esc_html__( 'New York 20235, United States Of America', 'ecofine' ),
                            
                        ),
                        array(
                            'ecofine_topbar_label'      => esc_html__( 'Hot Link:', 'ecofine' ),
                            'ecofine_topbar_info4'      => esc_html__( '(629) 555-0129', 'ecofine' ),
                           
                        ),
                    ),
                ),
                array(
                    'id'      => 'ecofine_social_title4',
                    'type'    => 'text',
                    'title'    => esc_html__( 'Social Title', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Social Title Here', 'ecofine' ),
                    'default'  => esc_html__( 'Follow On :', 'ecofine' ),
                  ),
                array(
                    'id'       => 'ecofine_topbar_social4',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Social Icon List', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Top Social Link here', 'ecofine' ),
                    'fields'   => array(
                          array(
                            'id'       => 'ecofine_topbar_social_label4',
                            'type'     => 'text',
                            'title'    => esc_html__( 'label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Social name Here', 'ecofine' ),
                            'default'  => esc_html__( 'Facebook', 'ecofine' ),
                        ),
                        array(
                            'id'      => 'ecofine_topbar_social_link4',
                            'type'    => 'link',
                            'title'   => esc_html__( 'Link', 'ecofine' ),
                            'default' => array(
                                'url'    => '#',
                                'target' => '_blank',
                            ),
                        ),
                        array(
                            'id'       => 'ecofine_topbar_social_icon4',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Icon for Social', 'ecofine' ),
                            'default'  => 'fab fa-facebook-f',
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_topbar_social_label4' => esc_html__( 'Facebook', 'ecofine' ),
                            'ecofine_topbar_social_icon4'  => 'fab fa-facebook-f',
                        ),
                        array(
                            'ecofine_topbar_social_label4' => esc_html__( 'Twitter', 'ecofine' ),
                            'ecofine_topbar_social_icon4'  => 'fab fa-twitter',
                        ),
                        array(
                            'ecofine_topbar_social_label4' => esc_html__( 'Linkedin', 'ecofine' ),
                            'ecofine_topbar_social_icon'  => 'fab fa-linkedin-in',
                        ),
                        array(
                            'ecofine_topbar_social_label4' => esc_html__( 'Instagram', 'ecofine' ),
                            'ecofine_topbar_social_icon4'  => 'fab fa-instagram',
                        ),
                    ),
                ),

                //================ HEADER TOP SECTION CSS OPTIONS ================
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Header Top CSS Options', 'ecofine' ),
                ),

                array(
                    'id'                  => 'ecofine_topbar_bg4',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Background image/color or Gradient color for Heade Top Section', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.header-four .header-top-bar',
                ),

                array(
                    'id'          => 'ecofine_topbar_spacing4',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Spacing', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Spacing on Top Header if you use background', 'ecofine' ),
                    'output'      => '.header-four .header-top-bar',
                    'output_mode' => 'padding',
                ),
                array(
                    'id'          => 'ecofine_topbar_radius4',
                    'type'        => 'spacing',
                    'title'       => esc_html__( 'Background Radius', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Border Radius on Top Header if you use background and if you need', 'ecofine' ),
                    'output'      => '.header-four .header-top-bar',
                    'output_mode' => 'border-radius',
                ),
                array(
                    'id'       => 'label_color4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Label Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Heade Top Label Text', 'ecofine' ),
                    'output'   => '.header-four .header-top-bar .header-links li span',
                ),
                array(
                    'id'       => 'ecofine_topbar_text_color4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Heade Top Text', 'ecofine' ),
                    'output'   => '.header-four .header-top-bar .header-links ul li',
                ),
                array(
                    'id'       => 'ecofine_topbar_link_color4',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Link Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add color for any Link', 'ecofine' ),
                    'output'   => array( '.header-four .header-top-bar .header-links ul li a', '.header-four .header-socials-icon ul li a' ),
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Header Top Social Icon Styel', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_topbar_social_title_color4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Title Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon Title', 'ecofine' ),
                    'output'   => '.header-four .header-top-bar .header-social .social-title',
                ),
                array(
                    'id'       => 'ecofine_topbar_social_icon_color4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Icon Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon', 'ecofine' ),
                    'output'   => '.header-four .header-top-bar .header-social a',
                ),
                array(
                    'id'       => 'ecofine_topbar_social_icon_color_hover4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Social Icon Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Header Top Social Icon Hover', 'ecofine' ),
                    'output'   => '.header-four .header-top-bar .header-social a:hover',
                ),
            ),
        ),

        //______-------________------________---------
        //__________ HEADER FOUR MENU OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Header Menu Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_header-menu_group4',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Site Header Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your Site Header Options here', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
            ), 
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Parent Menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_top_header4_menu_ncolors',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Menu Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Nav Menu Normal and Hover Color', 'ecofine' ),
                    'output'   => '.header-four .main-menu > ul > li > a',
                ),
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Sub menu Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_header_submenu_color4',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'   => '.header-four .main-menu ul.sub-menu li a',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor4',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-four .main-menu ul.sub-menu li a',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_bgcolor4_hover',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub Menu Text', 'ecofine' ),
                    'output'      => '.header-four .main-menu ul.sub-menu li a:hover',
                    'output_mode' => 'background-color',
                ),
                array(
                    'id'          => 'ecofine_header_submenu_border4',
                    'type'        => 'color',
                    'title'       => esc_html__( 'border Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color For Sub menu', 'ecofine' ),
                    'output'      => '.header-four .main-menu ul.sub-menu li',
                    'output_mode' => 'border-color',
                ),
            ),
        ),
        //______-------________------________---------
        //__________ HEADER GET A QUOTE OPTIONS _________
        //______-------________------________---------

        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_show4',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Get A Quote', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Get A Quote button Here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'select_header_type', '==', 'headers_default' ),
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_cta_text4',
            'type'       => 'text',
            'title'      => esc_html__( 'Button Text', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Guote Button Text Here', 'ecofine' ),
            'default'    => esc_html__( 'Discover More', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'ecofine_cta_show4', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_link4',
            'type'       => 'link',
            'title'      => esc_html__( 'Link', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Get A Quote Button Link Here', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'ecofine_cta_show4', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_cta_fieldset',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Get A Quote Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'This Options for Header Quite Button', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_header_styles', '==', 'four', 'all' ),
                array( 'ecofine_cta_show4', '==', 'true' ),
                array( 'select_header_type', '==', 'headers_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_cta_color4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Color Here', 'ecofine' ),
                    'output'   => '.header-four .header-button .theme-btns',
                ),
                array(
                    'id'          => 'ecofine_cta_bg4',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-four .header-button .theme-btns',
                ),
                array(
                    'type'    => 'notice',
                    'style'   => 'success',
                    'content' => esc_html__( 'Hover Color Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_cta_hcolor4',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Button Text Hover Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Header Get A Quote Button text Hover Color Here', 'ecofine' ),
                    'output'   => '.header-four .header-button .theme-btns:hover',
                ),
                array(
                    'id'          => 'ecofine_cta_hbg4',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Hover Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Header Get A Quote Button Background hover Color Here', 'ecofine' ),
                    'output_mode' => 'background-color',
                    'output'      => '.header-four .header-button .theme-btns:before',
                ),
            ),
        ),
    ),
) );