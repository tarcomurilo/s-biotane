<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Header Style
CSF::createSection( $EcofineThemeOption, array(
    'title'  => esc_html__( 'Footer Options', 'ecofine' ),
    'id'     => 'ecofine_footer_options',
    'icon'   => 'fa fa-header',
    'fields' => array(
        array(
            'type'    => 'heading',
            'content' => esc_html__( 'Select Footer Style', 'ecofine' ),
        ),
        array(
            'id'         => 'select_footer_type',
            'type'       => 'button_set',
            'title'      => esc_html__( 'Select Footer Type', 'ecofine' ),
            'subtitle'      => esc_html__( 'Select your Footer Type Default or Elementor', 'ecofine' ),
            'options'    => array(
              'footer_default'  => esc_html__( 'Default Footers', 'ecofine' ),
              'footer_elementor' => esc_html__( 'Elementor Footers', 'ecofine' ),
            ),
            'default'    => 'footer_default'
        ),


        array(
			'id'            => 'site_elementor_footer',
			'type'          => 'select',
			'title'         => esc_html__( 'Select Footer', 'ecofine' ),
			'placeholder'   => esc_html__( 'Default', 'ecofine' ),
			'empty_message' => esc_html__( 'No footer Template Found. You can create footer template from Ecofine Footers > Add New.', 'ecofine' ),
			'options'       => 'posts',
			'query_args'    => array(
				'post_type'      => 'ecofine_footer',
				'posts_per_page' => - 1,
			),
			'desc'          => esc_html__( 'Select site footer from here. Selected template will be used for all pages by default.', 'ecofine' ),
            'dependency'       => array(
                array( 'select_footer_type', '==', 'footer_elementor' ),
            ),
        ),


		array(
			'type'       => 'notice',
			'id'         => 'site_footer_notice',
			'style'      => 'warning',
			'content' => sprintf(
				'%s <a href="%s" target="_blank">%s</a> %s',
				esc_html__('Custom footer selected. You can edit/create footer Template in the', 'ecofine'),
				admin_url('edit.php?post_type=ecofine_footer'),
				esc_html__('Ecofine Footers', 'ecofine'),
				esc_html__('dashboard tab.', 'ecofine')
			),
			'dependency'       => array(
                array( 'select_footer_type', '==', 'footer_elementor' ),
            ),
		),


        array(
            'id'       => 'ecofine_footer_styles',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Select Style', 'ecofine' ),
            'subtitle' => esc_html__( 'Select Your Footer For Global', 'ecofine' ),
            'default'  => 'one',
            'options'  => array(
                'one' => get_theme_file_uri( 'assets/image/footer-1.jpg' ),
                'two' => get_theme_file_uri( 'assets/image/footer-2.jpg' ),
            ),
            'dependency' => array( 'select_footer_type', '==', 'footer_default' ),
        ),
        //////////////////////////////////////
        ///____  WIDGET LAYOUT  ______ //////
        /////////////////////////////////////
        array(
            'type'    => 'heading',
            'style'   => 'info',
            'content' => esc_html__( 'Widget layout Section', 'ecofine' ),
            'dependency' => array( 'select_footer_type', '==', 'footer_default' ),
        ),
        array(
            'id'       => 'footer_column_layout',
            'type'     => 'image_select',
            'title'    => esc_html__( 'Footer Widget Columns', 'ecofine' ),
            'subtitle' => esc_html__( 'Select your Footer Widget Columns Style', 'ecofine' ),
            'options'  => array(
                '12'      => get_template_directory_uri() . '/assets/image/widgets/footer_col_12.png',
                '6_6'     => get_template_directory_uri() . '/assets/image/widgets/footer_col_6_6.png',
                '4_4_4'   => get_template_directory_uri() . '/assets/image/widgets/footer_col_4_4_4.png',
                '3_3_3_3' => get_template_directory_uri() . '/assets/image/widgets/footer_col_3_3_3_3.png',
                '3_2_3_4' => get_template_directory_uri() . '/assets/image/widgets/footer_col_3_2_3_4.png',
                '8_4'     => get_template_directory_uri() . '/assets/image/widgets/footer_col_8_4.png',
                '4_8'     => get_template_directory_uri() . '/assets/image/widgets/footer_col_4_8.png',
                '6_3_3'   => get_template_directory_uri() . '/assets/image/widgets/footer_col_6_3_3.png',
                '3_3_6'   => get_template_directory_uri() . '/assets/image/widgets/footer_col_3_3_6.png',
                '8_2_2'   => get_template_directory_uri() . '/assets/image/widgets/footer_col_8_2_2.png',
                '2_2_8'   => get_template_directory_uri() . '/assets/image/widgets/footer_col_2_2_8.png',
                '6_2_2_2' => get_template_directory_uri() . '/assets/image/widgets/footer_col_6_2_2_2.png',
                '2_2_2_6' => get_template_directory_uri() . '/assets/image/widgets/footer_col_2_2_2_6.png',
            ),
            'default'  => '3_3_3_3',
            'after'    => esc_attr__( 'Select Footer Column layout View for widgets.', 'ecofine' ),
            'dependency' => array( 'select_footer_type', '==', 'footer_default' ),
        ),

        //////////////////////////////////////
        ///_  FOOTER DESIGN SECTION FOR FOOTER ONE _ //////
        ////////////////////////////////////
        array(
            'type'       => 'subheading',
            'style'      => 'info',
            'content'    => esc_html__( 'Footer widget CSS Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_footer_css_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer CSS Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your color for footer area', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
            ),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Footer Background Options', 'ecofine' ),
                ),
                array(
                    'id'                  => 'ecofine_footer_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Footer Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Your Footer Background image/color/Gradient Here', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.footer-one .footer-widgets-area',
                ),
                array(
                    'id'               => 'ecofine_footer_title_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Footer Title', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Footer Title', 'ecofine' ),
                    'output'           => 'footer.footer-one .footer-widgets-area .widget-title',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_footer_content_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Footer Content', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Footer Content', 'ecofine' ),
                    'output'           => array( 'footer.footer-one p', 'footer.footer-one ul li', 'footer.footer-one', 'footer.footer-one span', 'footer.footer-one table', 'footer.footer-one td', 'footer.footer-one th', 'footer.footer-one label',' footer.footer-one .ecofinecore-about-widget-doc', 'footer.footer-one .company-subscribe-widget', 'footer.footer-one .ecofinecore-widget-post-thum li .recent-widget-date' ),
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_footer_link_c',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Footer Link Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'ecofine' ),
                    'output'           => array( 'footer.footer-one a', 'footer.footer-one ul li a' ),
                    'output_important' => true,
                ),
            ),
        ),
   
        ///////////////////////////////////////////////////
        ///_  FOOTER DESIGN SECTION FOR FOOTER two _ //////
        ///////////////////////////////////////////////////
        array(
            'type'       => 'subheading',
            'style'      => 'info',
            'content'    => esc_html__( 'Footer widget CSS Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_footer_css2_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer CSS Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your color for footer area', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
            ),
            'fields'     => array(
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Footer Background Options', 'ecofine' ),
                ),
                array(
                    'id'                  => 'ecofine_footer2_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Footer Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Your Footer Background image/color/Gradient Here', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.site-footer.footer-two',
                ),
                array(
                    'id'               => 'ecofine_footer2_title_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Footer Title', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Footer Title', 'ecofine' ),
                    'output'           => 'footer.footer-two .footer-widgets-area h4.widget-title',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_footer2_content_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Footer Content', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Footer Content', 'ecofine' ),
                    'output'           => array( 'footer.footer-two p', 'footer.footer-two ul li', 'footer.footer-two', 'footer.footer-two span', 'footer.footer-two table', 'footer.footer-two td', 'footer.footer-two th', 'footer.footer-two label', 'footer.footer-two .ecofinecore-about-widget-doc', 'footer.footer-two .ecofinecore-widget-post-thum li .recent-widget-date' ),
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_footer2_link_c',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Footer Link Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'ecofine' ),
                    'output'           => array( 'footer.footer-two a', 'footer.footer-two ul li a' ),
                    'output_important' => true,
                ),
            ),
        ),

        //////////////////////////////////////
        ///_  FOOTER TWO TOP SECTION _ //////
        ////////////////////////////////////
        array(
            'type'       => 'heading',
            'style'      => 'info',
            'content'    => esc_html__( 'Footer Top Section', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_show_ft_top2',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Top Footer', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Top Footer if you need', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
            ) 
        ),
        array(
            'id'         => 'ecofine_ft_top2_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Top Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your color for footer area', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
                array( 'ecofine_show_ft_top2', '==', 'true' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_ft_top2_group',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Footer Top Options', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Your Content for Footer Top Section', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_ft_top2_label',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Your Label Name Here', 'ecofine' ),
                            'default'  => esc_html__( 'Our Location', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_ft_top2_content',
                            'type'     => 'wp_editor',
                            'title'    => esc_html__( 'Content', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Your info Content Here', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_ft_top2_icon',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add info Icon here', 'ecofine' ),
                            'default'  => 'fas fa-map-marker-alt',
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_ft_top2_label'   => esc_html__( 'Our Location', 'ecofine' ),
                            'ecofine_ft_top2_content' => __( '2416 Mapleview DriveTampa, </br> FL 33634', 'ecofine' ),
                            'ecofine_ft_top2_icon'    => 'fas fa-map-marker-alt',
                        ),
                        array(
                            'ecofine_ft_top2_label'   => esc_html__( 'Call us', 'ecofine' ),
                            'ecofine_ft_top2_content' => __( 'Telephone : 0029129102320 </br>
                            Mobile : 000 2324 39493', 'ecofine' ),
                            'ecofine_ft_top2_icon'    => 'fas fa-phone-alt',
                        ),
                        array(
                            'ecofine_ft_top2_label'   => esc_html__( 'Our Email', 'ecofine' ),
                            'ecofine_ft_top2_content' => __( 'Main Email : contact@website </br>
                            ComInquiries : Info@mail.com', 'ecofine' ),
                            'ecofine_ft_top2_icon'    => 'fas fa-envelope',
                        ),
                    ),
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'CSS Options', 'ecofine' ),
                ),
                array(
                    'id'          => 'ecofine_fttop_bg',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Background Color for Header Top Section', 'ecofine' ),
                    'output'      => '.site-footer.footer-two .ft-top-info',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'icon CSS Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_fttop_icon_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Icon Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for Icon', 'ecofine' ),
                    'output'   => '.site-footer.footer-two .footer-top-inner .ft-top-info .icon',
                ),
                array(
                    'id'          => 'ecofine_ficon_bg',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Icon Background Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Icon Background Color for Header Top Section', 'ecofine' ),
                    'output'      => '.site-footer.footer-two .footer-top-inner .ft-top-info .icon',
                    'output_mode' => 'background-color',
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Content CSS Options', 'ecofine' ),
                ),
                array(
                    'id'       => 'ecofine_fttop_label_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Label Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for content label', 'ecofine' ),
                    'output'   => '.footer-two .footer-top-inner .ft-top-info .footer-icon-title',
                ),
                array(
                    'id'       => 'ecofine_fttop_content_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Content Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Color for content', 'ecofine' ),
                    'output'   => '.footer-two .footer-top-inner .ft-top-info .footer-top-des',
                ),
                array(
                    'id'       => 'ecofine_fttop_link_color',
                    'type'     => 'link_color',
                    'title'    => esc_html__( 'Link Color', 'ecofine' ),
                    'subtitle' => esc_html__( 'if you add link then use this options', 'ecofine' ),
                    'output'   => '.footer-two .footer-top-inner .ft-top-info .info a',
                ),
            ),
        ),


        //////////////////////////////////////
        ///____ COPYRIGHT SECTION ____ //////
        ////////////////////////////////////

        array(
            'type'    => 'heading',
            'style'   => 'info',
            'content' => esc_html__( 'CopyRight Section', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
        ),
        array(
            'id'            => 'ecofine_copyright_text',
            'type'          => 'wp_editor',
            'title'         => esc_html__( 'Copyright Text', 'ecofine' ),
            'subtitle'      => esc_html__( 'Site copyright text', 'ecofine' ),
            'desc'          => esc_html__( 'Type site copyright text here.', 'ecofine' ),
            'tinymce'       => true,
            'quicktags'     => true,
            'media_buttons' => false,
            'height'        => '100px',
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
        ),
        //////////////////////////////////////
        ///_  COPYRIGHT COLOR OPTIONS _ /////
        ////////////////////////////////////

        array(
            'id'         => 'ecofine_footer_copyright_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Copyright CSS Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your color for footer Copyright area', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
            'fields'     => array(
                array(
                    'id'                  => 'ecofine_copyright_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Copyright Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Your copyright Background image/color/Gradient Here', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.site-footer.footer-one .copyright-area',
                ),
                array(
                    'id'               => 'ecofine_copyright_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Copyright Text', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Copyright ', 'ecofine' ),
                    'output'           => '.site-footer.footer-one .copyright-area .site-info',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_copyrightr_link_c',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Copyright Link Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'ecofine' ),
                    'output'           => '.site-footer.footer-one .copyright-area .site-info a',
                    'output_important' => true,
                ),
            ),
        ),

        //////////////////////////////////////
        ///_  COPYRIGHT COLOR OPTIONS _ /////
        ////////////////////////////////////

        array(
            'id'         => 'ecofine_footer2_copyright_options',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Copyright CSS Options', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add your color for footer Copyright area', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
            'fields'     => array(
                array(
                    'id'                  => 'ecofine_copyright2_bg',
                    'type'                => 'background',
                    'title'               => esc_html__( 'Copyright Background', 'ecofine' ),
                    'subtitle'            => esc_html__( 'Add Your copyright Background image/color/Gradient Here', 'ecofine' ),
                    'background_gradient' => true,
                    'background_origin'   => true,
                    'output'              => '.site-footer.footer-two .copyright-inner',
                ),
                array(
                    'id'               => 'ecofine_copyright2_c',
                    'type'             => 'color',
                    'title'            => esc_html__( 'Copyright Text', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add Color for Copyright ', 'ecofine' ),
                    'output'           => '.site-footer.footer-two .copyright-inner .site-info',
                    'output_important' => true,
                ),
                array(
                    'id'               => 'ecofine_copyrightr2_link_c',
                    'type'             => 'link_color',
                    'title'            => esc_html__( 'Copyright Link Color', 'ecofine' ),
                    'subtitle'         => esc_html__( 'Add color for Footer Link Color', 'ecofine' ),
                    'output'           => '.site-footer.footer-two .copyright-inner .site-info a',
                    'output_important' => true,
                ),
            ),
        ),
        array(
            'type'       => 'submessage',
            'style'      => 'info',
            'content'    => esc_html__( 'Socials Link', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_show_ft_social',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Enable Footer Social', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Footer Social here', 'ecofine' ),
            'default'    => true,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
        ),
        array(
            'id'         => 'ecofine_ft_social_fieldset',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Social Section', 'ecofine' ),
            'subtitle'   => esc_html__( 'Add Social Info for Footer', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', '==', 'one', 'all' ),
                array( 'ecofine_show_ft_social', '==', 'true' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
            'fields'     => array(
                array(
                    'id'       => 'ecofine_ft_socials',
                    'type'     => 'group',
                    'title'    => esc_html__( 'Socials Info', 'ecofine' ),
                    'subtitle' => esc_html__( 'Add Footer Social Link here', 'ecofine' ),
                    'fields'   => array(
                        array(
                            'id'       => 'ecofine_ft_social_label',
                            'type'     => 'text',
                            'title'    => esc_html__( 'Label', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Social name Here', 'ecofine' ),
                            'default'  => esc_html__( 'Facebook', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_ft_social_icon',
                            'type'     => 'icon',
                            'title'    => esc_html__( 'Social Icon', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Social Icon Here', 'ecofine' ),
                            'default'  => 'fab fa-facebook-f',
                        ),
                        array(
                            'id'       => 'ecofine_ft_social_link',
                            'type'     => 'link',
                            'title'    => esc_html__( 'Link', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add social Link here', 'ecofine' ),
                        ),
                    ),
                    'default'  => array(
                        array(
                            'ecofine_ft_social_label' => esc_html__( 'Facebook', 'ecofine' ),
                            'ecofine_ft_social_icon'  => 'fab fa-facebook-f',
                        ),
                        array(
                            'ecofine_ft_social_label' => esc_html__( 'Twitter', 'ecofine' ),
                            'ecofine_ft_social_icon'  => 'fab fa-twitter',
                        ),
                        array(
                            'ecofine_ft_social_label' => esc_html__( 'Instagram', 'ecofine' ),
                            'ecofine_ft_social_icon'  => 'fab fa-instagram',
                        ),
                        array(
                            'ecofine_ft_social_label' => esc_html__( 'Linkedin', 'ecofine' ),
                            'ecofine_ft_social_icon'  => 'fab fa-linkedin-in',
                        ),
                    ),
                ),

                //////////////////////////////////////
                ///_  SOCIAL COLOR OPTIONS _ /////
                ////////////////////////////////////
                
                array(
                    'type'    => 'submessage',
                    'style'   => 'info',
                    'content' => esc_html__( 'Footer Social Color Options', 'ecofine' ),
                ),
                array(
                    'id'         => 'ecofine_footer_social_css_filedseet',
                    'type'       => 'fieldset',
                    'title'      => esc_html__( 'Footer Social Css Options', 'ecofine' ),
                    'subtitle'   => esc_html__( 'Add your color for Footer Social', 'ecofine' ),
                    'dependency' => array( 'ecofine_footer_styles', '==', 'one', 'all' ),
                    'fields'     => array(
                        array(
                            'id'       => 'ecofine_footer_social_c',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Social Icon color', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Color for Social icon ', 'ecofine' ),
                            'output'   => '.site-footer.footer-one .copyright-area .social-icons ul li a',
                        ),
                        array(
                            'id'          => 'ecofine_footer_social_bgc',
                            'type'        => 'color',
                            'title'       => esc_html__( 'Social background', 'ecofine' ),
                            'subtitle'    => esc_html__( 'Add Color for Social icon Background', 'ecofine' ),
                            'output'      => '.site-footer.footer-one .copyright-area .social-icons ul li a',
                            'output_mode' => 'background-color',
                        ),
                        array(
                            'type'    => 'notice',
                            'style'   => 'success',
                            'content' => esc_html__( 'Hover Options', 'ecofine' ),
                        ),
                        array(
                            'id'       => 'ecofine_footer_social_hc',
                            'type'     => 'color',
                            'title'    => esc_html__( 'Social Icon color', 'ecofine' ),
                            'subtitle' => esc_html__( 'Add Color for Social icon ', 'ecofine' ),
                            'output'   => '.site-footer.footer-one .copyright-area .social-icons ul li a:hover',
                        ),
                        array(
                            'id'          => 'ecofine_footer_social_hbgc',
                            'type'        => 'color',
                            'title'       => esc_html__( 'Social background', 'ecofine' ),
                            'subtitle'    => esc_html__( 'Add Color for Social icon Background', 'ecofine' ),
                            'output'      => '.site-footer.footer-one .copyright-area .social-icons ul li a:hover',
                            'output_mode' => 'background-color',
                        ),
                    ),
                ),
            ),
        ),
        //////////////////////////////////////
        /////_  SOCIAL COLOR OPTIONS _ //////
        ////////////////////////////////////
        array(
            'type'       => 'heading',
            'content'    => esc_html__( 'Menu Options', 'ecofine' ),
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', '==', 'two', 'all' ),
            )
        ),
        array(
            'id'         => 'ecofine_show_ft_menu',
            'type'       => 'switcher',
            'title'      => esc_html__( 'Footer Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Enable Footer Menu here', 'ecofine' ),
            'default'    => false,
            'text_on'    => esc_html__( 'Enabled', 'ecofine' ),
            'text_off'   => esc_html__( 'Disabled', 'ecofine' ),
            'text_width' => 100,
            'dependency' => array(
                array( 'select_footer_type', '==', 'footer_default' ),
                array( 'ecofine_footer_styles', 'any', 'two', 'all' ),
            )
        ),
        array(
            'id'         => 'ecofine_ftmenu_fieldset',
            'type'       => 'fieldset',
            'title'      => esc_html__( 'Footer Menu', 'ecofine' ),
            'subtitle'   => esc_html__( 'Select your Menu for Footer', 'ecofine' ),
            'dependency' => array(
                array( 'ecofine_footer_styles', 'any', 'two', 'all' ),
                array( 'ecofine_show_ft_menu', '==', 'true' ),
                array( 'select_footer_type', '==', 'footer_default' ),
            ),
            'fields'     => array(
                array(
                    'id'          => 'ecofine_ftmenu',
                    'type'        => 'select',
                    'title'       =>  esc_html__( 'Select Menu', 'ecofine' ),
                    'subtitle'    =>  esc_html__( 'Select Menu for footer', 'ecofine' ),
                    'options'     => 'menus',
                    'placeholder' => esc_html__( 'Select Menu for Footer', 'ecofine' ),
                ),
                array(
                    'type'    => 'submessage',
                    'style'   => 'success',
                    'content' => esc_html__( 'Css Options', 'ecofine' ),
                ),
                array(
                    'id'      => 'ecofine_ftmenu_link_color',
                    'type'    => 'link_color',
                    'title'   => esc_html__( 'Link Color', 'ecofine' ),
                    'subtitle'   => esc_html__( 'Add Link Color footer menu', 'ecofine' ),
                    'output'  => '.site-footer.footer-two .copyright-inner .footer-menu ul li a',
                    'dependency' => array( 'ecofine_footer_styles', '==', 'two', 'all' ),
                ),
                array(
                    'id'          => 'ecofine_ftmenu_line_color',
                    'type'        => 'color',
                    'title'       => esc_html__( 'Line Color', 'ecofine' ),
                    'subtitle'    => esc_html__( 'Add Color for footer menu line', 'ecofine' ),
                    'output'      => '.site-footer.footer-two .copyright-inner .footer-menu ul li a::after',
                    'output_mode' => 'background-color',
                    'dependency' => array( 'ecofine_footer_styles', '==', 'two', 'all' ),
                ),

                
            ),
        ),
    ),
) );
