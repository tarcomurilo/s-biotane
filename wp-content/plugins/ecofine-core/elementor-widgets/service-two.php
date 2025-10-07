<?php

namespace Elementor;

class eco_service_V2_Widget extends Widget_Base
{

    public function get_name()
    {

        return 'ECOFINE_service_V2';
    }

    public function get_title()
    {
        return esc_html__('eco Service V2', 'ecofinecore');
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

        //Content tab start
        $this->start_controls_section(
            'services_v2_options',
            [
                'label' => __('Services', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();
        $repeater->add_control(
            'number',
            [
                'label'       => __('Number', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('01', 'ecofinecore'),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon',
            [
                'label'   => __('Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-star',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'       => __('Title', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__('Carbon Offsetting', 'ecofinecore'),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'desc',
            [
                'label'   => __('Description', 'ecofinecore'),
                'type'    => Controls_Manager::TEXTAREA,
                'rows'    => 5,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => esc_html__('Ecology is crucial for our understanding', 'ecofinecore'),
            ]
        );
        $repeater->add_control(
            'enable_btn',
            [
                'label'        => esc_html__('Enable Button', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'         => __('Link', 'ecofinecore'),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __('htecos://your-link.com', 'ecofinecore'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'dynamic'       => [
                    'active' => true,
                ],
                'condition'     => [
                    'enable_btn' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'services',
            [
                'label'       => __('Service List', 'ecofinecore'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title' => esc_html__('Carbon Offsetting', 'ecofinecore'),
                        'desc'  => esc_html__('Ecology is crucial for our understanding', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __('Select Title Tag', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h3',
                'options' => [
                    'h1'   => __('H1', 'ecofinecore'),
                    'h2'   => __('H2', 'ecofinecore'),
                    'h3'   => __('H3', 'ecofinecore'),
                    'h4'   => __('H4', 'ecofinecore'),
                    'h5'   => __('H5', 'ecofinecore'),
                    'h6'   => __('H6', 'ecofinecore'),
                    'span' => __('Span', 'ecofinecore'),
                    'p'    => __('P', 'ecofinecore'),
                    'div'  => __('Div', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'btn_text',
            [
                'label'   => esc_html__('Button Text', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Read More', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'services_slider',
            [
                'label' => __('Options', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_full_container',
            [
                'label'        => esc_html__('Enable Full Container', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'enable_slide',
            [
                'label'        => esc_html__('Enable Slide', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'     => esc_html__('Display Items', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => 30,
                'step'      => 1,
                'default'   => 3,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'dots',
            [
                'label'        => esc_html__('Enable Dots', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'arrow',
            [
                'label'        => esc_html__('Enable Arrow', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'speed',
            [
                'label'       => __('Speed', 'ecofinecore'),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '200'  => __('200 m seconds', 'ecofinecore'),
                    '300'  => __('300 m seconds', 'ecofinecore'),
                    '400'  => __('400 m seconds', 'ecofinecore'),
                    '500'  => __('500 m seconds', 'ecofinecore'),
                    '600'  => __('600 m seconds', 'ecofinecore'),
                    '700'  => __('700 m seconds', 'ecofinecore'),
                    '800'  => __('800 m seconds', 'ecofinecore'),
                    '900'  => __('900 m seconds', 'ecofinecore'),
                    '1000' => __('1 seconds', 'ecofinecore'),
                    '2000' => __('2 seconds', 'ecofinecore'),
                    '3000' => __('3 seconds', 'ecofinecore'),
                ],
                'default'     => '400',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'loop',
            [
                'label'        => esc_html__('Enable Loop', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label'        => esc_html__('Enable AutoPlay', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'    => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'autoplay_speed',
            [
                'label'       => __('Autoplay Speed', 'ecofinecore'),
                'type'        => Controls_Manager::SELECT,
                'show_label'  => true,
                'label_block' => false,
                'options'     => [
                    '2000'  => __('2 seconds', 'ecofinecore'),
                    '3000'  => __('3 seconds', 'ecofinecore'),
                    '4000'  => __('4 seconds', 'ecofinecore'),
                    '5000'  => __('5 seconds', 'ecofinecore'),
                    '6000'  => __('6 seconds', 'ecofinecore'),
                    '7000'  => __('7 seconds', 'ecofinecore'),
                    '8000'  => __('8 seconds', 'ecofinecore'),
                    '9000'  => __('9 seconds', 'ecofinecore'),
                    '10000' => __('10 seconds', 'ecofinecore'),
                ],
                'default'     => '4000',
                'condition'   => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'more_options',
            [
                'label'     => __('Service Column Settings', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'     => __('Columns On Desktop', 'ecofinecore'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-3',
                'options'   => [
                    'col-xl-12' => __('1 Column', 'ecofinecore'),
                    'col-xl-6'  => __('2 Column', 'ecofinecore'),
                    'col-xl-4'  => __('3 Column', 'ecofinecore'),
                    'col-xl-3'  => __('4 Column', 'ecofinecore'),
                    'col-xl-2'  => __('6 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'laptop_col',
            [
                'label'     => __('Columns for Laptop', 'ecofinecore'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-3',
                'options'   => [
                    'col-lg-12' => __('1 Column', 'ecofinecore'),
                    'col-lg-6'  => __('2 Column', 'ecofinecore'),
                    'col-lg-4'  => __('3 Column', 'ecofinecore'),
                    'col-lg-3'  => __('4 Column', 'ecofinecore'),
                    'col-lg-2'  => __('6 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'     => __('Columns On Tablet', 'ecofinecore'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
                    'col-md-12' => __('1 Column', 'ecofinecore'),
                    'col-md-6'  => __('2 Column', 'ecofinecore'),
                    'col-md-4'  => __('3 Column', 'ecofinecore'),
                    'col-md-3'  => __('4 Column', 'ecofinecore'),
                    'col-md-2'  => __('6 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__('Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'box_alignment',
            [
                'label'     => __('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'justify' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg_hover',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-item:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                'default'    => [
                    'unit' => 'px',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // *********************************************************
        //                Number Style Css
        // *********************************************************

        $this->start_controls_section(
            'num_css',
            [
                'label' => __('Number Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'num_tabs'
        );
        $this->start_controls_tab(
            'num_tab_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'num_size',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'num_width',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'num_height',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'num_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'num_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'num_shadow',
                'label'    => esc_html__('Number Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'num_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_responsive_control(
            'num_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'num_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'num_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'num_tab_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'num_hcolor',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'num_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'num_hshadow',
                'label'    => esc_html__('num Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'num_hborder',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num',
            ]
        );
        $this->add_responsive_control(
            'num_hradius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-num' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // *********************************************************
        //                Icon Style Css
        // *********************************************************

        $this->start_controls_section(
            'icon_css',
            [
                'label' => __('Icon Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_tabs'
        );
        $this->start_controls_tab(
            'icon_tab_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'icon_size',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_svg_width',
            [
                'label' => esc_html__('SVG Width', 'ecofinecore'),
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
                    '{{WRAPPER}} .eco-service-v2-contents .eco-service-v2-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'services_svg_color_hover',
            [
                'label'     => esc_html__('Icon Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon svg path' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'icon_tab_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'icon_hcolor',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-item:hover .eco-service-v2-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // *********************************************************
        //                Content Style Css
        // *********************************************************

        $this->start_controls_section(
            'contents_css',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'contents_tabs'
        );

        $this->start_controls_tab(
            'title_tab',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'dec_tab',
            [
                'label' => __('Content', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'dec_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-dec' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'btn_tab',
            [
                'label' => __('Button', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-service-v2-button a',
            ]
        );
        $this->add_responsive_control(
            'btn_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-button a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_hcolor',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-button a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-button a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'btn_icon_options',
            [
                'label' => esc_html__('Icon Style Options', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btn_icon _typography',
                'selector' => '{{WRAPPER}} .eco-service-v2-button .btns i',
            ]
        );
        $this->add_responsive_control(
            'btn_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-service-v2-button .btns i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'btn_icon_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-service-v2-button .btns i',
            ]
        );
        $this->add_responsive_control(
            'btn_icon_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-service-v2-button .btns i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $_id = rand(1241, 3256);
        if ($settings['enable_slide'] == 'yes') {
            $column = 'eco-service-item';
            echo '
            <script>
			jQuery(document).ready(function($) {
				"use strict";
				$("#service-' . esc_attr($_id) . '").slick({
                    slidesToShow: ' . json_encode($settings['item_show']) . ',
                    slidesToScroll: 4,
                    dots: ' . json_encode($settings['dots'] == 'yes' ? true : false) . ',
                    arrows: false,
                    infinite: ' . json_encode($settings['loop'] == 'yes' ? true : false) . ',
                    speed: ' . json_encode($settings['speed']) . ',
                    autoplay: ' . json_encode($settings['autoplay'] == 'yes' ? true : false) . ',
                    autoplaySpeed: ' . json_encode($settings['autoplay_speed']) . ',
                    responsive: [
                      {
                        breakpoint: 1400,
                        settings: {
                          slidesToShow: 3,
                          slidesToScroll: 3,
                          infinite: true,
                          dots: true
                        }
                      },
                      {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          infinite: true,
                          dots: true
                        }
                      },
                      {
                        breakpoint: 768,
                        settings: {
                          slidesToShow: 1,
                          slidesToScroll: 1
                        }
                      },
                    ]
                });
			});
			</script>';
        } else {
            $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        }
        if ($settings['enable_full_container'] == 'yes') {
            $container = 'container-fluid';
        } else {
            $container = 'container';
        }
        ob_start();
?>
        <div class="eco-service-v2-wrapper">
            <div class="eco-service-v2-wrapper-inner">
                <div class="<?php echo esc_attr($container); ?>">
                    <div class="row" id="service-<?php echo esc_attr($_id); ?>">
                        <?php foreach ($settings['services'] as $item) :
                        ?>
                            <div class="<?php echo esc_attr($column); ?> col-sm-6 col-12">
                                <div class="eco-service-v2-items">
                                    <div class="eco-service-v2-item">
                                        <div class="eco-service-v2-content-box">
                                            <div class="eco-service-v2-contents">

                                                <?php if (!empty($item['icon'])) : ?>
                                                    <h2 class="eco-service-v2-num"> <?php echo esc_html($item['number']); ?> </h2>
                                                <?php endif; ?>

                                                <?php if (!empty($item['icon'])) : ?>
                                                    <div class="eco-service-v2-icon">
                                                        <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="eco-service-v2-content">
                                                    <<?php echo esc_attr($settings['title_tag']); ?> class="eco-service-v2-title"><?php echo esc_html($item['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
                                                    <?php if (!empty($item['desc'])) : ?>
                                                        <div class="eco-service-v2-dec"><?php echo esc_html($item['desc']); ?></div>
                                                    <?php endif; ?>
                                                    <?php if ($item['enable_btn'] == 'yes') :
                                                        $url      = $item['link']['url'];
                                                        $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                                        $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                                    ?>
                                                        <div class="eco-service-v2-button">
                                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?> class="btns"><?php echo esc_html($settings['btn_text']); ?>
                                                                <i class="far fa-plus"></i></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_service_V2_Widget);
