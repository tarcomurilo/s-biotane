<?php

namespace Elementor;

class footer_five_widget extends Widget_Base
{

    public function get_name()
    {

        return 'footer_five';
    }

    public function get_title()
    {
        return esc_html__('Eco Footer Template V5', 'ecofinecore');
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
        // ------------------------------

        $this->start_controls_section(
            'footer_icon_box',
            [
                'label' => esc_html__('Footer Top Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_footer_icon_area',
            [
                'label'        => esc_html__('Enable Icon Box Area', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'ititle_html_tag',
            [
                'label' => esc_html__('HTML Tag', 'ecofinecore'),
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'footer_icon',
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
            'foote_Icon_Title',
            [
                'label' => esc_html__('Label', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'footer_icon_des',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'icon_box_list',
            [
                'label'   => esc_html__('box_List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'foote_Icon_Title' => esc_html__('Address', 'ecofinecore'),
                        'footer_icon_des' => esc_html__('2416 Mapleview DriveTampa, FL 33634', 'ecofinecore'),
                    ],
                    [
                        'foote_Icon_Title' => esc_html__('E-mail Address', 'ecofinecore'),
                        'footer_icon_des' => esc_html__('Main Email : contact@website', 'ecofinecore'),
                    ],
                    [
                        'foote_Icon_Title' => esc_html__('Contact Number', 'ecofinecore'),
                        'footer_icon_des' => esc_html__('Telephone : 0029129102320', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ foote_Icon_Title }}}',
                'condition' => [
                    'enable_footer_icon_area' => 'yes',
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
                'default' => 'h3',
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
                'selector' => '{{WRAPPER}} .footer-widget-area',
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
            'about_logo',
            [
                'label' => __('Logo', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'about_widget_des',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('A gym, also known as a fitness center or health club, is a facility dedicated to physical fitness and exercise gyms and typically offer a range', 'ecofinecore'),
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
            'eco_social_icon',
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
            'eco_social_icon_link',
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
            'eco_social_icon_list',
            [
                'label'   => esc_html__('Icons List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'eco_social_icon_link' => '#',
                    ],
                    [
                        'eco_social_icon_link' => '#',
                    ],
                    [
                        'eco_social_icon_link' => '#',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'footer_link_widget',
            [
                'label' => esc_html__('Quick Links', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'Quick_Links_widget_title',
            [
                'label' => esc_html__('Quick Links', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Quick Links', 'ecofinecore'),
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
                        'link_title' => esc_html__('About Us', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Our Mission', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Meet The Teams', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Our Projects', 'ecofinecore'),
                    ],
                    [
                        'link_title' => esc_html__('Contact Us', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ link_title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'gallery_content',
            [
                'label' => esc_html__('gallery content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'gallery_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Gallery', 'ecofinecore'),
                'label_block'   => true,
            ]
        );
        $this->add_control(
            'gallery_image',
            [
                'label' => esc_html__('Add Images', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'show_label' => false,
                'default' => [],
            ]
        );

        $this->end_controls_section();

        // ------------------------------

        $this->start_controls_section(
            'newslatter_control_style',
            [
                'label' => esc_html__('Newslatter Style', 'ecofinecore'),
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
                'default' => esc_html__('It,s important for businesses to carefully consider their pay.', 'ecofinecore'),
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

        // ---------------------------

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
                'default'     => 'Copyright © 2023 All Rights Reserved.',
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'menu_item',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );
        $repeater->add_control(
            'menu_item_url',
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
            'menu_item_list',
            [
                'label'   => esc_html__('Icons List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'menu_item' => esc_html__('Trams & Condition', 'ecofinecore'),
                    ],
                    [
                        'menu_item' => esc_html__('Privacy Policy', 'ecofinecore'),
                    ],
                    [
                        'menu_item' => esc_html__('Contact Us', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ menu_item }}}',
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
                'selector' => '{{WRAPPER}} .footer-five-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-five-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // --------------
        //-------------- Footer Bottom Style Start -----------------
        // --------------

        $this->start_controls_section(
            'footer_bottom_box_css',
            [
                'label' => esc_html__('Footer Top Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_footer_icon_area' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_border_color',
            [
                'label'     => esc_html__('Border Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card' => 'border-color: {{VALUE}}',
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card:not(:first-child)' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        // Icon Style

        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_box_normal',
            [
                'label' => __('Icon Style', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_top_icon_size',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon',
            ]
        );
        $this->add_responsive_control(
            'icon_width',
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
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
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
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'svg_size_note',
            [
                'label' => __('SVG Icon Size', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_svg_width',
            [
                'label' => esc_html__('SVG With', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_svg_height',
            [
                'label' => esc_html__('SVG Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_box_title_tab',
            [
                'label' => esc_html__('Label', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_label',
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_box_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_label' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_box_des_tab',
            [
                'label' => esc_html__('Title ', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_des_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_title',
            ]
        );
        $this->add_responsive_control(
            'icon_box_des_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_des_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_des_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-contact-card .footer-five-info-card_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'footer_widget_title_style',
            [
                'label' => esc_html__('Footer Wiget Title Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-widget .widget_title',
            ]
        );
        $this->add_responsive_control(
            'link_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-widget .widget_title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .footer-five-widget .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-five-widget .widget_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'about_logo_style_options',
            [
                'label' => esc_html__('About Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'about_logo_style_tabs'
        );

        $this->start_controls_tab(
            'about_logo_tab',
            [
                'label' => esc_html__('Logo Style', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'logo_Image_height',
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
                    '{{WRAPPER}} .widget-about .footer-five-logo img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_image_width',
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
                    '{{WRAPPER}} .widget-about .footer-five-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'logo_object',
            [
                'label' => esc_html__('Object Fit', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'fill'  => esc_html__('Fill', 'ecofinecore'),
                    'contain' => esc_html__('Contain', 'ecofinecore'),
                    'cover' => esc_html__('Cover', 'ecofinecore'),
                    'none' => esc_html__('None', 'ecofinecore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-logo img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_logo_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .widget-about .footer-five-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_logo_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .widget-about .footer-five-logo' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .widget-about .footer-five-about-text',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-about-text' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .widget-about .footer-five-about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .widget-about .footer-five-about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        // ------- Social Icon Style
        $this->add_control(
            'social_media_heading',
            [
                'label' => esc_html__('Social Icon Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->start_controls_tabs(
            'eco_social_icon_tabs'
        );
        $this->start_controls_tab(
            'eco_social_icon_tabs_normal',
            [
                'label' => __('Icon Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'eco_social_icon_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .widget-about .footer-five-social-btn a',
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_bg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-social-btn a' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'eco_social_icon_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .widget-about .footer-five-social-btn a',
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_radius',
            [
                'label' => esc_html__('Radius', 'ecofinecore'),
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
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'eco_social_icon_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .widget-about .footer-five-social-btn a',
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-social-btn a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-social-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'eco_social_icon_tabs_hover',
            [
                'label' => __('Icon Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_hcolor',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_hcolorbg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'eco_social_icon_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .widget-about .footer-five-social-btn a:hover',
            ]
        );
        $this->add_responsive_control(
            'eco_social_icon_hradius',
            [
                'label' => esc_html__('Radius', 'ecofinecore'),
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
                'selectors' => [
                    '{{WRAPPER}} .widget-about .footer-five-social-btn a:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'eco_social_icon_hshadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .widget-about .footer-five-social-btn a:hover',
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
                'label' => esc_html__('Quick Links Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'link_list_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .quick_link_list ul li a',
            ]
        );
        $this->add_responsive_control(
            'link_list_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quick_link_list ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'link_list_color_hover',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quick_link_list ul li a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .quick_link_list ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .quick_link_list ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // -----------------
        // ------------------ Link Two Widget Style Start ------------=
        // ------------------

        $this->start_controls_section(
            'gallery_style_options',
            [
                'label' => esc_html__('Gallery Wiget Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'gallery_Image_height',
            [
                'label' => esc_html__('image Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_image_width',
            [
                'label' => esc_html__('Image Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 300,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_image_object',
            [
                'label' => esc_html__('Object Fit', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'fill'  => esc_html__('Fill', 'ecofinecore'),
                    'contain' => esc_html__('Contain', 'ecofinecore'),
                    'cover' => esc_html__('Cover', 'ecofinecore'),
                    'none' => esc_html__('None', 'ecofinecore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'gallery_image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-gallery .gallery-thumb',
            ]
        );
        $this->add_responsive_control(
            'gallery_image_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'gallery_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-five-gallery .gallery-thumb' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
            'newslatter_Description_tab',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'newslatter_dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-newslatter-des',
            ]
        );
        $this->add_responsive_control(
            'newslatter_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-newslatter-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-five-newslatter-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-five-newslatter-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            'newslatter_btn_bg_color',
            [
                'label' => esc_html__('Background Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'background-color: {{VALUE}}',
                ],
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
        $this->add_control(
            'newslatter_btn_text_hover_color',
            [
                'label' => esc_html__('Text Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'newslatter_btn_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit',
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_radius',
            [
                'label' => esc_html__('Border Radius', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'newslatter_btn_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'Copyright_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .footer-five-copyright-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'Copyright_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-copyright-area',
            ]
        );
        $this->add_responsive_control(
            'Copyright_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-copyright-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-five-copyright-area' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'copyright_tabs'
        );

        $this->start_controls_tab(
            'copyright_text_tab',
            [
                'label' => esc_html__('Text', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'Copyright_text_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-copyright-text',
            ]
        );
        $this->add_responsive_control(
            'Copyright_text_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-copyright-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_text_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-copyright-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_text_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-copyright-text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'copyright_menu_tab',
            [
                'label' => esc_html__('Menu', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'Copyright_menu_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-five-copyright-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-copyright-menu ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color_hover',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-five-copyright-menu ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-copyright-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-five-copyright-menu ul li a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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

        <footer class="footer-five-wrapper">
            <div class="container">
                <div class="footer-five-contact-card">
                    <?php foreach ($settings['icon_box_list'] as $icon_list) : ?>
                        <div class="footer-five-info-card">
                            <div class="footer-five-info-card_icon">
                                <?php \Elementor\Icons_Manager::render_icon($icon_list['footer_icon'], ['aria-hidden' => 'true']); ?>
                            </div>
                            <div class="footer-five-info-card_content">
                                <<?php echo esc_attr($settings['ititle_html_tag']); ?> class="footer-five-info-card_label"> <?php echo esc_html($icon_list['foote_Icon_Title']); ?> </<?php echo esc_attr($settings['ititle_html_tag']); ?>>
                                <div class="footer-five-info-card_title"> <?php echo wp_kses($icon_list['footer_icon_des'], $allowed_html); ?> </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($settings['edit_widget_from_appearance'] != 'yes') { ?>
                    <div class="footer-five-widget-area">
                        <div class="row justify-content-between">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget footer-five-widget">
                                    <div class="widget-about">
                                        <div class="footer-five-logo">
                                            <a>
                                                <?php echo wp_get_attachment_image($settings['about_logo']['id'], 'full'); ?>
                                            </a>
                                        </div>
                                        <p class="footer-five-about-text"> <?php echo wp_kses($settings['about_widget_des'], $allowed_html); ?> </p>
                                        <div class="footer-five-social-btn">
                                            <?php foreach ($settings['eco_social_icon_list'] as $social_icon) :
                                                $url      = $social_icon['eco_social_icon_link']['url'];
                                                $target   = $social_icon['eco_social_icon_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $social_icon['eco_social_icon_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>
                                                <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                    <?php \Elementor\Icons_Manager::render_icon($social_icon['eco_social_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget footer-five-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['Quick_Links_widget_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="quick_link_list">
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
                            <div class="col-md-6 col-xl-auto">
                                <div class="widget footer-five-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['gallery_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-five-gallery">
                                        <?php foreach ($settings['gallery_image'] as $image) : ?>
                                            <div class="gallery-thumb">
                                                <img src="<?php echo esc_attr($image['url']); ?>" alt="gallery">
                                                <a href="<?php echo esc_attr($image['url']); ?>" class="gallery-btn popup-image"> <i class="far fa-eye"></i> </a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="widget footer-five-widget">
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['newslatter_widget_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="footer-five-newslatter-des"> <?php echo wp_kses($settings['newslatter_widget_des'], $allowed_html); ?> </div>
                                    <form class="newsletter-form">
                                        <?php echo do_shortcode($settings['Contact_form']); ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') && $settings['edit_widget_from_appearance'] == 'yes') : ?>
                        <div class="footer-widget-area footer-five-widget-area">
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
                }; ?>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="footer-five-copyright-area">
                        <div class="footer-five-copyright-text"> <?php echo wp_kses_post($settings['Copyright']); ?></div>
                        <div class="footer-five-copyright-menu">
                            <ul>
                                <?php foreach ($settings['menu_item_list'] as $menu_item) :
                                    $urls      = $menu_item['menu_item_url']['url'];
                                    $targets   = $menu_item['menu_item_url']['is_external'] ? ' target="_blank"' : '';
                                    $nofollows = $menu_item['menu_item_url']['nofollow'] ? ' rel="nofollow"' : '';
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($urls); ?>" <?php echo $targets . $nofollows; ?>>
                                            <?php echo esc_html($menu_item['menu_item']); ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
<?php

    }
}

Plugin::instance()->widgets_manager->register(new footer_five_widget);
