<?php

namespace Elementor;

class eco_footer_four_widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_footer_four';
    }

    public function get_title()
    {
        return esc_html__('Eco Footer Template V4 ', 'ecofinecore');
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
                'default'   => 'yes',
            ]
        );

        $this->add_control(
            'footer_top_icon_box_content',
            [
                'label' => esc_html__('Icon Box', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'footer_top_enable' => 'yes',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_top_icon',
            [
                'label'   => esc_html__('Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-laravel',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'footer_top_icon_title',
            [
                'label'   => esc_html__('Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'footer_top_icon_des',
            [
                'label'   => esc_html__('Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'footer_top_list',
            [
                'label'       => esc_html__('List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'condition' => [
                    'footer_top_enable' => 'yes',
                ],
                'default'     => [
                    [
                        'footer_top_icon_title' => esc_html__('Location', 'ecofinecore'),
                        'footer_top_icon_des' => esc_html__('258 Daniel Mansion 258 Berlin Germany', 'ecofinecore'),
                    ],
                    [
                        'footer_top_icon_title' => esc_html__('Working Hours', 'ecofinecore'),
                        'footer_top_icon_des' => esc_html__('Weekdays 8am-22pm Weekend 10am -12pm', 'ecofinecore'),
                    ],
                    [
                        'footer_top_icon_title' => esc_html__('Contact Us', 'ecofinecore'),
                        'footer_top_icon_des' => esc_html__('ecofineinfo@ecofine.com (+259)2257 6156 ', 'ecofinecore'),
                    ],
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
                'selector' => '{{WRAPPER}} .footer-four-wrapper',
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
            'footer_logo',
            [
                'label' => esc_html__('Logo', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'about_widget_des',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('An IT consultancy can help you assess your technology needs and develop a technology strategy that aligns.', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'social_options',
            [
                'label' => esc_html__('Social Control ', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'ecofin_social_icon',
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
            'ecofin_social_icon_link',
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
            'ecofin_social_icon_list',
            [
                'label'   => esc_html__('Icons List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'ecofin_social_icon' => 'fab fa-facebook-f',
                    ],
                    [
                        'ecofin_social_icon' => 'fab fa-twitter',
                    ],
                    [
                        'ecofin_social_icon' => 'fab fa-instagram',
                    ],
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
                'default' => esc_html__('Quick links', 'ecofinecore'),
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
                        'link_title' => esc_html__('Credit industrys', 'ecofinecore'),
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
                    [
                        'link_title' => esc_html__('FAQ', 'ecofinecore'),
                    ],
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'newslatter_control_style',
            [
                'label' => esc_html__('Newslatter Control Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'newslatter_widget_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Newsletter', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'newslatter_widget_des',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Its important for businesses to carefully consider their pay.', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'Contact_form',
            [
                'label' => esc_html__('Newslatter Form', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $this->end_controls_section();
        // ----------------------------------------------


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
                'selector' => '{{WRAPPER}} .footer-four-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // --------------
        //-------------- Footer Top Style Start -----------------
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
                'selector' => '{{WRAPPER}} .footer-four-top-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-top-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-top-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-top-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-top-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // footer Top Box Content

        $this->start_controls_section(
            'top_content_css',
            [
                'label' => esc_html__('Footer Top Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('footer_top_icon_tabs');
        $this->start_controls_tab(
            'footer_top_icon_tab',
            [
                'label' => __('Icon Style', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'top_icon_width',
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
                    '{{WRAPPER}} .footer-four-icon ' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_min_icon_width',
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
                    '{{WRAPPER}} .footer-four-icon ' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_icon_height',
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
                    '{{WRAPPER}} .footer-four-icon ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_icon_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-icon',
            ]
        );
        $this->add_responsive_control(
            'top_icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'top_icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-four-icon',
            ]
        );
        $this->add_responsive_control(
            'top_margin_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_icon_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->start_controls_tabs('content_tabs');
        $this->start_controls_tab(
            'top_title_tab',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_title_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-box-title',
            ]
        );
        $this->add_responsive_control(
            'top_title_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-box-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'top_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'top_des_tab',
            [
                'label' => __('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_des_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-box-des',
            ]
        );
        $this->add_responsive_control(
            'top_des_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-box-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_des_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-box-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_des_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-box-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                'selector' => '{{WRAPPER}} .footer-four-widget-des',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-widget-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-four-widget-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-widget-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'social_icon_style_option',
            [
                'label' => esc_html__('Social Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

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
                'selector' => '{{WRAPPER}} .footer-four-menu-widget .footer-four-widget-title',
            ]
        );
        $this->add_responsive_control(
            'link_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-menu-widget .footer-four-widget-title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .footer-four-menu-widget .footer-four-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-menu-widget .footer-four-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_responsive_control(
            'List_width',
            [
                'label' => esc_html__('List Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],

                'selectors' => [
                    '{{WRAPPER}} .footer-four-link-menu ul li' => 'width: {{SIZE}}%;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-link-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-link-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_color_hover',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-link-menu ul li a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-four-link-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-four-link-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'newslatter_style_control',
            [
                'label' => esc_html__('NewsLatter Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'newslatter_style_tabs'
        );

        $this->start_controls_tab(
            'newslatter_normal_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'newslatter_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-four-newslatter-widget .footer-four-widget-title',
            ]
        );
        $this->add_responsive_control(
            'newslatter_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-four-newslatter-widget .footer-four-widget-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'newslatter_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-newslatter-widget .footer-four-widget-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-four-newslatter-widget .footer-four-widget-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'newslatter_des_style',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'newslatter_dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .newslatter-des',
            ]
        );
        $this->add_responsive_control(
            'newslatter_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newslatter-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_dec_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .newslatter-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_dec_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .newslatter-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'newslatter_tab',
            [
                'label' => esc_html__('Newslatter Style', 'ecofinecore'),
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
        <?php if ($settings['footer_top_enable'] == 'yes') : ?>
            <div class="container">
                <div class="footer-four-top-wrapper">
                    <div class="row">
                        <?php foreach ($settings['footer_top_list'] as $footer_top) : ?>
                            <div class="clo-xl-4 col-lg-4 col-md-6">
                                <div class="footer-four-icon-box">
                                    <div class="footer-four-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($footer_top['footer_top_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="footer-four-icon-box-content">
                                        <div class="footer-four-box-title"><?php echo esc_html($footer_top['footer_top_icon_title']); ?> </div>
                                        <div class="footer-four-box-des"> <?php echo esc_html($footer_top['footer_top_icon_des']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="footer-four-wrapper footer-wrapper">
            <?php if ($settings['edit_widget_from_appearance'] != 'yes') { ?>
                <div class="footer-three-content-wrp">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-one">
                                <div class="footer-four-about-widget-info">
                                    <div class="footer-four-logo">
                                        <?php echo wp_get_attachment_image($settings['footer_logo']['id'], 'full'); ?>
                                    </div>
                                    <div class="footer-four-widget-des"> <?php echo wp_kses($settings['about_widget_des'], $allowed_html); ?> </div>
                                    <div class="footer-four-social-widget">
                                        <ul>
                                            <?php foreach ($settings['ecofin_social_icon_list'] as $social_icon) :
                                                $url      = $social_icon['ecofin_social_icon_link']['url'];
                                                $target   = $social_icon['ecofin_social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $social_icon['ecofin_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                                <li>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                        <?php \Elementor\Icons_Manager::render_icon($social_icon['ecofin_social_icon'], ['aria-hidden' => 'true']); ?>
                                                    </a>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-6 col-12 coloum-tow">
                                <div class="footer-four-menu-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-four-widget-title"> <?php echo esc_html($settings['link_widget_title']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-four-link-menu">
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

                            <div class="col-xl-3 col-lg-3 col-md-6 col-12 coloum-four">
                                <div class="footer-four-newslatter-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="footer-four-widget-title"><?php echo esc_html($settings['newslatter_widget_title']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-four-newslatter">
                                        <div class="newslatter-des"> <?php echo wp_kses($settings['newslatter_widget_des'], $allowed_html); ?> </div>
                                        <?php echo do_shortcode($settings['Contact_form']); ?>
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

Plugin::instance()->widgets_manager->register(new eco_footer_four_widget);
