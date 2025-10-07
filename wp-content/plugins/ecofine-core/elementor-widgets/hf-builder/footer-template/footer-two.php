<?php

namespace Elementor;

class footer_two_widget extends Widget_Base
{

    public function get_name()
    {

        return 'footer_two';
    }

    public function get_title()
    {
        return esc_html__('Eco Footer Template V2 ', 'ecofinecore');
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
            'footer_icon_box',
            [
                'label' => esc_html__('Footer Top Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'ititle_html_tag',
            [
                'label' => esc_html__('HTML Tag', 'ecofinecore'),
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
            'enable_footer_top',
            [
                'label'        => esc_html__('Enable Footer Top', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'ft_icon',
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
            'ft_title',
            [
                'label' => esc_html__('Label', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block'   => true,
            ]
        );

        $repeater->add_control(
            'ft_des',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'ft_icon_box_list',
            [
                'label'   => esc_html__('Icon Box List', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [
                        'ft_title' => esc_html__('Address', 'ecofinecore'),
                        'ft_des' => esc_html__('2416 Mapleview DriveTampa, FL 33634', 'ecofinecore'),
                    ],
                    [
                        'ft_title' => esc_html__('E-mail Address', 'ecofinecore'),
                        'ft_des' => esc_html__('Mobile : 000 2324 39493', 'ecofinecore'),
                    ],
                    [
                        'ft_title' => esc_html__('Contact Number', 'ecofinecore'),
                        'ft_des' => esc_html__('Telephone : 0029129102320', 'ecofinecore'),
                    ],

                ],
                'title_field' => '{{{ ft_title }}}',
                'condition' => [
                    'enable_footer_top' => 'yes',
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
            'about_widget_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'about_widget_des',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('It is a long established fact that a reader will be distracted typically offer a range', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'button_Text',
            [
                'label' => esc_html__('Button Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
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
        $this->add_responsive_control(
            'quick_link_align',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'flex-end' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .footer-justify-content' => 'justify-content: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'news_content',
            [
                'label' => esc_html__('Recent News', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'edit_widget_from_appearance!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'news_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Recent News', 'ecofinecore'),
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
            'newslatter_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('NewsLetter', 'ecofinecore'),
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
                'selector' => '{{WRAPPER}} .footer-two-wrapper',
            ]
        );
        $this->add_responsive_control(
            'footer_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-inner-section' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-inner-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // --------------
        //-------------- Footer Bottom Style Start -----------------
        // --------------

        $this->start_controls_section(
            'footer_top_box_css',
            [
                'label' => esc_html__('Footer Top Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'footer_top_main_box_margin',
            [
                'label'      => esc_html__('Top Area Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-top' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'footer_icon_box_style',
            [
                'label' => __('Icon Box Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'footer_top_box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .ft-two-top-info',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'footer_top_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-info',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'footer_top_box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-info',
            ]
        );
        $this->add_responsive_control(
            'footer_top_box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-two-top-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_responsive_control(
            'icon-positon',
            [
                'label'     => __('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'flex-start'   => [
                        'title' => __('Start', 'ecofinecore'),
                        'icon'  => 'eicon-align-start-v',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-align-center-h',
                    ],
                    'flex-end'  => [
                        'title' => __('End', 'ecofinecore'),
                        'icon'  => 'eicon-align-end-v',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .ft-two-top-info' => 'align-items: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'header_top_icon_size',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-icon',
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
                    '{{WRAPPER}} .ft-two-top-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'min_icon_width',
            [
                'label'      => esc_html__('Min Width', 'ecofinecore'),
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
                    '{{WRAPPER}} .ft-two-top-icon' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-two-top-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .ft-two-top-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .ft-two-top-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .ft-two-top-title',
            ]
        );
        $this->add_responsive_control(
            'icon_box_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-two-top-title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .ft-two-top-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_box_des_tab',
            [
                'label' => esc_html__('Content ', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_box_des_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .ft-two-top-des',
            ]
        );
        $this->add_responsive_control(
            'icon_box_des_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-two-top-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .ft-two-top-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-two-top-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .widget_title',
            ]
        );
        $this->add_responsive_control(
            'link_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .widget_title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .widget_title' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .footer-two-about-text',
            ]
        );
        $this->add_responsive_control(
            'about_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-about-text' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-two-about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'about_button_normal',
            [
                'label' => __('Button', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'about_button_hober_tab',
            [
                'label' => esc_html__('Hover Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns:before',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-social-btn .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-social-btn .theme-btns:hover',
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
                'selector' => '{{WRAPPER}} .quick_link_list ul li',
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
                    '{{WRAPPER}} .quick_link_list ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .quick_link_list ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
        $this->add_responsive_control(
            'recent_post_gap',
            [
                'label' => esc_html__('Gap', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .footer-three-post-thum-widget' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
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
            'min_image_width',
            [
                'label' => esc_html__('Min Image Width', 'ecofinecore'),
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
                    '{{WRAPPER}} .footer-three-post-thum-widget .foote-latest-post-imgage img' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .foote-latest-post-imgage' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .foote-latest-post-imgage' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
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
                'selector' => '{{WRAPPER}} .ft-post-title a',
            ]
        );
        $this->add_responsive_control(
            'recent_post_title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-post-title a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'recent_post_title_color_hover',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-post-title a:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .ft-post-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-post-title a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
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
                'selector' => '{{WRAPPER}} .ft-post-date',
            ]
        );
        $this->add_responsive_control(
            'date_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ft-post-date' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .ft-post-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .ft-post-date' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .footer-two-newslatter-des',
            ]
        );
        $this->add_responsive_control(
            'newslatter_dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-newslatter-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .footer-two-newslatter-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-newslatter-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-newsletter-item input.wpcf7-form-control.wpcf7-submit:hover' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .footer-two-copyright-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'Copyright_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-copyright-area',
            ]
        );
        $this->add_responsive_control(
            'Copyright_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-copyright-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-copyright-area' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .footer-two-copyright-text',
            ]
        );
        $this->add_responsive_control(
            'Copyright_text_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-copyright-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .footer-two-copyright-text a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_text_color_hover',
            [
                'label'       => esc_html__('Link Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-copyright-text a:hover' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .footer-two-copyright-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-copyright-text' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .footer-two-copyright-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-copyright-menu ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_color_hover',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-two-copyright-menu ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'Copyright_menu_borde_style',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .footer-two-copyright-menu ul li a',
            ]
        );
        $this->add_responsive_control(
            'Copyright_menu_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .footer-two-copyright-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .footer-two-copyright-menu ul li a' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        <footer class="footer-two-wrapper">
            <div class="footer-two-inner-section">
                <div class="container">
                    <div class="footer-two-top">
                        <div class="row">
                            <?php foreach ($settings['ft_icon_box_list'] as $icon_list) : ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="ft-two-top-info">
                                        <div class="ft-two-top-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($icon_list['ft_icon'], ['aria-hidden' => 'true']); ?>
                                        </div>
                                        <div class="info">
                                            <?php if (!empty($icon_list['ft_title'])) : ?>
                                                <<?php echo esc_attr($settings['ititle_html_tag']); ?> class="ft-two-top-title"><?php echo esc_html($icon_list['ft_title']); ?> </<?php echo esc_attr($settings['ititle_html_tag']); ?>>
                                            <?php endif; ?>
                                            <div class="ft-two-top-des"> <?php echo wp_kses($icon_list['ft_des'], $allowed_html); ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php if ($settings['edit_widget_from_appearance'] != 'yes') { ?>
                        <div class="footer-two-widget-area">
                            <div class="row justify-content-between">
                                <div class="col-md-6 col-xl-3">
                                    <div class="widget footer-two-widget">
                                        <div class="widget-about">
                                            <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['about_widget_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                            <div class="footer-two-about-text"> <?php echo esc_html($settings['about_widget_des']); ?> </div>
                                            <div class="footer-two-social-btn">
                                                <?php if (!empty($settings['button_link']['url'])) {
                                                    $this->add_link_attributes('button_link', $settings['button_link']);
                                                } ?>
                                                <a <?php echo $this->get_render_attribute_string('button_link'); ?> class=" theme-btns"><span> <?php echo esc_html($settings['button_Text']); ?> <i class="fas fa-angle-double-right"></i> </span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3 footer-justify-content">
                                    <div class="widget footer-two-widget">
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
                                <div class="col-md-6 col-xl-3">
                                    <div class="widget footer-two-widget">
                                        <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['news_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
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
                                                        <div class="footer-three-post-thum-widget ft-two-post-widget">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <div class="foote-latest-post-imgage"> <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?> </div>
                                                            <?php endif; ?>
                                                            <div class="footer-post-date-title-wrp">
                                                                <div class="ft-post-title"> <a href="<?php echo the_permalink(); ?>"> <?php echo wp_trim_words(get_the_title(), $settings['title_lanth']); ?> </a> </div>
                                                                <div class="ft-post-date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date(); ?> </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="widget footer-two-widget">
                                        <<?php echo esc_attr($settings['html_tag']); ?> class="widget_title"> <?php echo esc_html($settings['newslatter_title']); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                        <div class="footer-two-newslatter-des"> <?php echo wp_kses($settings['newslatter_widget_des'], $allowed_html); ?> </div>
                                        <form class="newsletter-form">
                                            <?php echo do_shortcode($settings['Contact_form']); ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4') && $settings['edit_widget_from_appearance'] == 'yes') : ?>
                            <div class="footer-widget-area footer-two-widget-area">
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
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="footer-two-copyright-area">
                        <div class="footer-two-copyright-text"> <?php echo wp_kses_post($settings['Copyright']); ?></div>
                        <div class="footer-two-copyright-menu">
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

Plugin::instance()->widgets_manager->register(new footer_two_widget);
