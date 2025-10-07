<?php

namespace Elementor;

class eco_footer_three_widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_footer_three';
    }

    public function get_title()
    {
        return esc_html__('Eco Footer Template V3 ', 'ecofinecore');
    }

    public function get_icon()
    {

        return 'eicon-shape';
    }

    public function get_categories()
    {
        return ['ecofinecore'];
    }


    protected function register_controls()
    {
        $this->start_controls_section(
            'footer_top_area',
            [
                'label' => esc_html__('Footer Top', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'footer_top_enable',
            [
                'label'     => esc_html__('Enable Footer Top', 'ecofinecore'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Yes', 'ecofinecore'),
                'label_off' => esc_html__('No', 'ecofinecore'),
                'default'   => 'no',
            ]
        );
        $this->add_control(
            'footer_logo',
            [
                'label' => esc_html__('Logo', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'footer_top_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'header_right_Social_Icon',
            [
                'label' => esc_html__('Social Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_social_icon',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'footer_social_icon_link',
            [
                'label' => __('Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ecofinecore'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'footer_social_icon_list',
            [
                'label'   => esc_html__('Icons List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'eco_social_icon_link' => '#',
                        'footer_social_icon' => 'fab fa-instagram',
                    ],
                    [
                        'eco_social_icon_link' => '#',
                        'footer_social_icon' => 'fab fa-twitter',
                    ],
                    [
                        'eco_social_icon_link' => '#',
                        'footer_social_icon' => 'fab fa-instagram',
                    ],
                    [
                        'eco_social_icon_link' => '#',
                        'footer_social_icon' => 'fab fa-linkedin-in',
                    ],
                ],
                'condition' => [
                    'footer_top_enable' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'widget_area_enable',
            [
                'label' => esc_html__('Widget Area', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Quick Links Title HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h5',
                'options' => [
                    'h1'  => esc_html__('H1', 'ecofinecore'),
                    'h2'  => esc_html__('H2', 'ecofinecore'),
                    'h3'  => esc_html__('H3', 'ecofinecore'),
                    'h4'  => esc_html__('H4', 'ecofinecore'),
                    'h5'  => esc_html__('H5', 'ecofinecore'),
                    'h6'  => esc_html__('H6', 'ecofinecore'),
                    'p'  => esc_html__('P', 'ecofinecore'),
                    'span'  => esc_html__('span', 'ecofinecore'),
                    'div'  => esc_html__('Div', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'edit_widget_from_appearance',
            [
                'label'     => esc_html__('Edit Widget From Appearance?', 'ecofinecore'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Yes', 'ecofinecore'),
                'label_off' => esc_html__('No', 'ecofinecore'),
                'default'   => 'no',
                'description'   => esc_html__('If this option is enable then you can add / remove / edit widgets from Appearance -> Widgets -> Footer Widgets. If Disable you can only edit widgets from here.', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'widgetbackground',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-three-wrapper',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'footer_list',
            [
                'label' => esc_html__('About Widget', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'about_widget_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'about_widget_des',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('An IT consultancy can help you assess your technology needs and develop a technology strategy that aligns.', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'newslatterc_options',
            [
                'label' => esc_html__('Newslatter Control ', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'Contact_form',
            [
                'label' => esc_html__('Contat Form Short Code', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'footer_link_widget',
            [
                'label' => esc_html__('link Widget', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'link_widget_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Page', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'link_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('link', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'link_url',
            [
                'label' => __('Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'ecofinecore'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'eco_link_list',
            [
                'label'   => esc_html__('Icons List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'link_title' => esc_html__('FAQ', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Counter', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Testimonial', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Work Process', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Gallery', 'ecofinecore'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'footer_link_widget2',
            [
                'label' => esc_html__('Contact List', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'link_widget_title2',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('link', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'contact_icon',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-map-marker-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'contact_small_title',
            [
                'label' => esc_html__('Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'contact_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'contact_list',
            [
                'label'   => esc_html__('Contact List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_small_title' => esc_html__('Address', 'ecofinecore'),
                        'contact_title' => esc_html__('66 Broklyant, New York Us', 'ecofinecore'),
                    ],
                    [
                        'contact_small_title' => esc_html__('Phone Number', 'ecofinecore'),
                        'contact_title' => esc_html__('012 345 678 910', 'ecofinecore'),
                    ],
                    [
                        'contact_small_title' => esc_html__('Email', 'ecofinecore'),
                        'contact_title' => esc_html__('abcd@gmail.com', 'ecofinecore'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();
        // ----------------------------------------------
        $this->start_controls_section(
            'latest-post',
            [
                'label' => esc_html__('Latest Post', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'recent_post_widget_title',
            [
                'label' => esc_html__('Recent Post', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recent Posts', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__('Title Length ', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 20,
                'step'    => 1,
                'default' => 4,
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__('Display Item', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1,
                'default' => 2,
            ]
        );
        $this->add_control(
            'order',
            [
                'label'   => esc_html__('Order By', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__('ASC', 'ecofinecore'),
                    'DESE' => esc_html__('DESE', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__('Order by', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'          => esc_html__('None', 'ecofinecore'),
                    'ID'            => esc_html__('ID', 'ecofinecore'),
                    'date'          => esc_html__('Date', 'ecofinecore'),
                    'name'          => esc_html__('Name', 'ecofinecore'),
                    'title'         => esc_html__('Title', 'ecofinecore'),
                    'comment_count' => esc_html__('Comment count', 'ecofinecore'),
                    'rand'          => esc_html__('Random', 'ecofinecore'),
                ],
            ]
        );
        $this->end_controls_section();


        // ----------- Copyright Option ----------------

        $this->start_controls_section(
            'Copyright_option',
            [
                'label' => esc_html__('Copyright', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'Copyright',
            [
                'label'       => __('Copyright Text', 'ecofinecore'),
                'type'        => Controls_Manager::WYSIWYG,
                'default'     => 'Copyright © 2023. All Rights Reserved.',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'footer_menu_options',
            [
                'label' => esc_html__('Menu List', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_menu',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'footer_menu_link',
            [
                'label' => esc_html__('Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ecofinecore'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'footer_menu_list',
            [
                'label'   => esc_html__('Contact List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'footer_menu' => esc_html__('Trams & Condition', 'ecofinecore'),
                    ],
                    [
                        'footer_menu' => esc_html__('Privacy Policy', 'ecofinecore'),
                    ],
                    [
                        'footer_menu' => esc_html__('Contact Us', 'ecofinecore'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        // --------------
        //-------------- Footer Style Start -----------------
        // --------------

        $this->start_controls_section(
            'footer_box_css',
            [
                'label' => esc_html__('Footer Box Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-three-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // --------------
        //-------------- Footer Style Start -----------------
        // --------------

        $this->start_controls_section(
            'footer_top_box',
            [
                'label' => esc_html__('Footer Top', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'footer_top_enable' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_top_box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-three-top-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-top-item',
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_footer_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'eco_logo_tabs'
        );

        $this->start_controls_tab(
            'eco_logo_normal_tab',
            [
                'label' => esc_html__('Logo Logo', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'eco_logo_height',
            [
                'label'      => esc_html__('Height', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 400,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_logo_width',
            [
                'label'      => esc_html__('width', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 400,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_logo_object',
            [
                'label'     => esc_html__('Object Fit', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__('Fill', 'ecofinecore'),
                    'contain' => esc_html__('Contain', 'ecofinecore'),
                    'cover'   => esc_html__('Cover', 'ecofinecore'),
                    'none'    => esc_html__('None', 'ecofinecore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-top-logo img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_logo_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_logo_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-top-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->start_controls_tabs(
            'social_icon_tabs'
        );
        $this->start_controls_tab(
            'social_icon_tab_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'social_icon_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-top-social-item li a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_bg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 130,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 130,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-top-social-item li a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_radius',
            [
                'label' => esc_html__('Border Radius', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',

                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_shadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-top-social-item a',
            ]
        );
        $this->add_responsive_control(
            'social_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'social_icon_tab_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'social_icon_hcolor',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_hbg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'social_icon_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-top-social-item li a:hover',
            ]
        );
        $this->add_responsive_control(
            'social_icon_hradius',
            [
                'label' => esc_html__('Border Radius', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',

                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-top-social-item li a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'social_icon_hshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-top-social-item li a:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // --------------
        // ----------------Footer About Widget Style------------------
        // --------------

        $this->start_controls_section(
            'about_style_options',
            [
                'label' => esc_html__('About Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'about_style_tabs'
        );

        $this->start_controls_tab(
            'about_normal_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'about_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-about-widget-info .footer-three-widget-title',
            ]
        );
        $this->add_responsive_control(
            'about_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-about-widget-info .footer-three-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'about_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-about-widget-info .footer-three-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-about-widget-info .footer-three-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'about_des_normal_tab',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'about_dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-widget-des',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-widget-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-widget-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_dec_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-widget-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'newslatter_style',
            [
                'label' => esc_html__('Newslatter Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'newslatter_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-newsletter-item input[type="email"]',
            ]
        );
        $this->add_control(
            'newslatter_color',
            [
                'label' => esc_html__('Text Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input[type="email"]' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'placeholder_color',
            [
                'label' => esc_html__('placeholder Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input[type="email"]::placeholder' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'newslatter_border',
                'selector' => '{{WRAPPER}} .footer-newsletter-item input[type="email"]',
            ]
        );
        $this->add_responsive_control(
            'newslatter_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-newsletter-item input[type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-newsletter-item input[type="email"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'Newslatter_Button_style',
            [
                'label' => esc_html__('Newslatter Button', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'Newslatter_button_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit',
            ]
        );
        $this->add_control(
            'newslatter_btn_text_color',
            [
                'label' => esc_html__('Text Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        // -----------------
        // ------------------ Link Widget Style Start ------------=
        // ------------------

        $this->start_controls_section(
            'link_style_options',
            [
                'label' => esc_html__('Link Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'link_style_tabs'
        );

        $this->start_controls_tab(
            'link_normal_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-menu-widget .footer-three-widget-title',
            ]
        );
        $this->add_responsive_control(
            'link_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-menu-widget .footer-three-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-menu-widget .footer-three-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-menu-widget .footer-three-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'link_list_normal_tab',
            [
                'label' => esc_html__('List Style', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-link-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-link-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_color_hover',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-link-menu ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-link-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-link-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // -----------------
        // ------------------ Contact List Widget Style Start ------------=
        // ------------------

        $this->start_controls_section(
            'link_style_options2',
            [
                'label' => esc_html__('Contact List Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'link_style_tabs2'
        );

        $this->start_controls_tab(
            'link_normal_tab2',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_title_typo2',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-service-list-widget .footer-three-widget-title',
            ]
        );
        $this->add_responsive_control(
            'link_title_color2',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-service-list-widget .footer-three-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_title_margin2',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-service-list-widget .footer-three-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_title_padding2',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-service-list-widget .footer-three-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'link_list_normal_tab2',
            [
                'label' => esc_html__('List Style', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'contact_icon_style',
            [
                'label'     => __('Contact Icon Style', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'contact_icon_size',
            [
                'label'      => esc_html__('Icon Size', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-contact-iocn ' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_icon_width',
            [
                'label'      => esc_html__('Width', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-contact-iocn ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_icon_height',
            [
                'label'      => esc_html__('Height', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-contact-iocn ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-iocn ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'contact_icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-three-contact-iocn ',
            ]
        );
        $this->add_control(
            'contact_small_title_style',
            [
                'label'     => __('Small Title Style', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo2',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-contact-stitle',
            ]
        );
        $this->add_responsive_control(
            'link_list_color2',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-stitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'link_list_margin2',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_padding2',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'contact_title_style',
            [
                'label'     => __('Title Style', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'contact_link_list_typo2',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-contact-title',
            ]
        );
        $this->add_responsive_control(
            'contact_link_list_color2',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'contact_link_list_margin2',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'contact_link_list_padding2',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-contact-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // --------------------------
        // ------------- Recent Post  Widget Style Start ----------=
        // --------------------------

        $this->start_controls_section(
            'recent_post_widget',
            [
                'label' => esc_html__('Recent Post Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'recent_post_section_title_tabs'
        );

        $this->start_controls_tab(
            'recent_post_section__normal_tab',
            [
                'label' => esc_html__('Section Title', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'recent_post_section_title',
            [
                'label' => esc_html__('Recent Post Section Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'recent_post_section_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-recent-post-widget .footer-three-widget-title',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'recent_post_section_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-recent-post-widget .footer-three-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'recent_post_section_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-recent-post-widget .footer-three-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'recent_post_section_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-recent-post-widget .footer-three-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        // Image Tab -----------
        $this->start_controls_tabs(
            'image_style_tabs'
        );

        $this->start_controls_tab(
            'image_normal_tab',
            [
                'label' => esc_html__('Image', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'Image_height',
            [
                'label' => esc_html__('image Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget .foote-latest-post-imgage img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Image Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget .foote-latest-post-imgage img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',

                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget .foote-latest-post-imgage img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        // Post Title
        $this->start_controls_tabs(
            'recent_post_title_tabs'
        );

        $this->start_controls_tab(
            'recent_post_title_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'recent_post_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-latest-post-title a',
            ]
        );
        $this->add_responsive_control(
            'recent_post_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-latest-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'recent_post_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-latest-post-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'recent_post_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-latest-post-title a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        // post Date
        $this->start_controls_tabs(
            'recent_post_date_tabs'
        );

        $this->start_controls_tab(
            'recent_post_date_tab',
            [
                'label' => esc_html__('Date ', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'date_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-date',
            ]
        );
        $this->add_responsive_control(
            'date_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'date_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //
        // ----------------Copyright Style------------------
        //

        $this->start_controls_section(
            'Copyright_style_options',
            [
                'label' => esc_html__('Copyright', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'Copyright_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-three-copyright-text',
            ]
        );
        $this->add_responsive_control(
            'Copyright_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-copyright-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'Copyright_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-three-copyright_area',
            ]
        );
        $this->add_control(
            'copyright_note',
            [
                'label' => __('Menu Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-copyright-item ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color_hover',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-three-copyright-item ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-copyright_area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-three-copyright_area' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $allowed_html = array(
            'h1'    => array(),
            'h2'    => array(),
            'h3'    => array(),
            'h4'    => array(),
            'h5'    => array(),
            'h6'    => array(),
            'span'  => array('style' => array(),),
            'a'     => array(
                'href'   => array(),
                'target' => array(),
                'title'  => array(),
                'rel'    => array(),
            ),
            'strong'  => array('style' => array(),),
            'del'  => array('datetime' => array(),),
            'small'  => array(),
            'span'   => array(
                'style' => array(),
            ),
            'br'    => array(),
            'em'    => array(),
            'ul'    => array(),
            'li' => array()
        );
?>
        <div class="footer-three-wrapper footer-wrapper">
            <?php if ($settings['footer_top_enable'] == 'yes') : ?>
                <div class="footer-three-top-wrapper">
                    <div class="container">
                        <div class="footer-three-top-item">
                            <div class="footer-three-top-logo">
                                <?php echo wp_get_attachment_image($settings['footer_logo']['id'], 'full'); ?>
                            </div>
                            <div class="footer-top-social-item">
                                <ul>
                                    <?php foreach ($settings['footer_social_icon_list'] as $fsocial) :
                                        $url      = $fsocial['footer_social_icon_link']['url'];
                                        $target   = $fsocial['footer_social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $fsocial['footer_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                        <li>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                <?php \Elementor\Icons_Manager::render_icon($fsocial['footer_social_icon'], ['aria-hidden' => 'true']); ?>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($settings['edit_widget_from_appearance'] != 'yes') { ?>
                <div class="footer-three-content-wrp">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-one">
                                <div class="footer-three-about-widget-info">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-three-widget-title"> <?php echo esc_html($settings['about_widget_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-three-widget-des"> <?php echo wp_kses($settings['about_widget_des'], $allowed_html); ?> </div>
                                    <div class="footer-three-contact-form">
                                        <?php echo do_shortcode($settings['Contact_form']); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-tow">
                                <div class="footer-three-menu-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-three-widget-title"> <?php echo esc_html($settings['link_widget_title']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-three-link-menu">
                                        <ul>
                                            <?php foreach ($settings['eco_link_list'] as $link_list) :
                                                $url      = $link_list['link_url']['url'];
                                                $target   = $link_list['link_url']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $link_list['link_url']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                                <li>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                        <?php echo esc_html($link_list['link_title']); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-three">
                                <div class="footer-three-service-list-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-three-widget-title"><?php echo esc_html($settings['link_widget_title2']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <?php foreach ($settings['contact_list'] as $contact) : ?>
                                        <div class="footer-three-contact-item">
                                            <div class="footer-three-contact-iocn">
                                                <?php \Elementor\Icons_Manager::render_icon($contact['contact_icon'], ['aria-hidden' => 'true']); ?>
                                            </div>
                                            <div class="footer-three-content-content">
                                                <div class="footer-three-contact-stitle"> <?php echo esc_html($contact['contact_small_title']); ?> </div>
                                                <div class="footer-three-contact-title"> <?php echo esc_html($contact['contact_title']); ?> </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-four">
                                <div class="footer-three-recent-post-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-three-widget-title"><?php echo esc_html($settings['recent_post_widget_title']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-three-recent-post">
                                        <ul>
                                            <?php
                                            $p = new \WP_Query(array(
                                                'posts_per_page' =>  $settings['item_show'],
                                                'post_type'      => 'post',
                                                'orderby'        => esc_attr($settings['orderby']),
                                                'order'          => esc_attr($settings['order']),
                                            ));
                                            while ($p->have_posts()) : $p->the_post(); ?>
                                                <li>
                                                    <div class="footer-three-post-thum-widget">
                                                        <?php if (has_post_thumbnail()) : ?>
                                                            <div class="foote-latest-post-imgage"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?> </div>
                                                        <?php endif; ?>
                                                        <div class="footer-post-date-title-wrp">
                                                            <div class="footer-three-latest-post-title"> <a href="<?php echo the_permalink(); ?>"> <?php echo wp_trim_words(get_the_title(), $settings['title_lanth']); ?> </a> </div>
                                                            <div class="footer-three-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?> </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>

                <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') && $settings['edit_widget_from_appearance'] == 'yes') : ?>
                    <div class="footer-widget-area">
                        <div class="container">
                            <div class="row">
                                <?php if (is_active_sidebar('footer-1')) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar('footer-1'); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>

                                <?php if (is_active_sidebar('footer-2')) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar('footer-2'); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>

                                <?php if (is_active_sidebar('footer-3')) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar('footer-3'); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>

                                <?php if (is_active_sidebar('footer-3')) : ?>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                        <?php dynamic_sidebar('footer-4'); ?>
                                    </div><!-- .widget-area -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            };
            ?>
        </div>

        <div class="footer-three-copyright_area">
            <div class="container">
                <div class="footer-three-copyright-item">
                    <div class="footer-three-copyright-text">
                        <?php echo $settings['Copyright']; ?>
                    </div>
                    <div class="footer-three-footer-menu">
                        <ul>
                            <?php foreach ($settings['footer_menu_list'] as $footer_list) :
                                $url      = $footer_list['footer_menu_link']['url'];
                                $target   = $footer_list['footer_menu_link']['is_external'] ? ' target="_blank"' : '';
                                $nofollow = $footer_list['footer_menu_link']['nofollow'] ? ' rel="nofollow"' : '';
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                        <?php echo esc_html($footer_list['footer_menu']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new eco_footer_three_widget);
