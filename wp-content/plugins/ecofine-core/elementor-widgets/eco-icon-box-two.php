<?php

namespace Elementor;

class eco_icon_box__v2_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'eco_icon_box_two';
    }

    public function get_title()
    {
        return esc_html__('Eco Icon Box V2', 'ecofinecore');
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
            'icon_box_options',
            [
                'label' => esc_html__('Icon Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'select_style',
            [
                'label' => esc_html__('Select Style Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    'one' => esc_html__('One', 'ecofinecore'),
                    'two'  => esc_html__('Two', 'ecofinecore'),
                    'three'  => esc_html__('Three', 'ecofinecore'),
                ],
                'default' => 'one'
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
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
            'icon_attr',
            [
                'label'   => esc_html__('Attrribute', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('01', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'title',
            [
                'label'   => esc_html__('Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Sustain Solutions', 'ecofinecore'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $repeater->add_control(
            'enable_link',
            [
                'label'        => esc_html__('Enable Link', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'link',
            [
                'label'         => __('Link', 'ecofinecore'),
                'type'          => \Elementor\Controls_Manager::URL,
                'placeholder'   => __('https://your-link.com', 'ecofinecore'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'condition' => [
                    'enable_link' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label'   => esc_html__('Description', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('change societal attitudes towards street children', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'list',
            [
                'label'       => esc_html__('List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title' => esc_html__('Sustain Solutions', 'ecofinecore'),
                    ],
                    [
                        'title' => esc_html__('skills training', 'ecofinecore'),
                    ],
                    [
                        'title' => esc_html__('Sensitivity programs', 'ecofinecore'),
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
            'container',
            [
                'label'        => esc_html__('Enable Container', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'   => __('Columns On Desktop', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-xl-3',
                'options' => [
                    'col-xl-12' => __('1 Column', 'ecofinecore'),
                    'col-xl-6'  => __('2 Column', 'ecofinecore'),
                    'col-xl-4'  => __('3 Column', 'ecofinecore'),
                    'col-xl-3'  => __('4 Column', 'ecofinecore'),
                    'col-xl-2'  => __('6 Column', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'laptop_col',
            [
                'label'   => __('Columns for Laptop', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-lg-3',
                'options' => [
                    'col-lg-12' => __('1 Column', 'ecofinecore'),
                    'col-lg-6'  => __('2 Column', 'ecofinecore'),
                    'col-lg-4'  => __('3 Column', 'ecofinecore'),
                    'col-lg-3'  => __('4 Column', 'ecofinecore'),
                    'col-lg-2'  => __('6 Column', 'ecofinecore'),
                ],
            ]
        );

        $this->add_control(
            'tab_col',
            [
                'label'   => __('Columns On Tablet', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12' => __('1 Column', 'ecofinecore'),
                    'col-md-6'  => __('2 Column', 'ecofinecore'),
                    'col-md-4'  => __('3 Column', 'ecofinecore'),
                    'col-md-3'  => __('4 Column', 'ecofinecore'),
                    'col-md-2'  => __('6 Column', 'ecofinecore'),
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'box_css',
            [
                'label' => esc_html__('Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .icon-box-v3-style',
                'condition' => [
                    'select_style' => 'three',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .icon-box-v3-style',
                'condition' => [
                    'select_style' => 'three',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_box_radius',
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
                'condition' => [
                    'select_style' => 'three',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-v3-style' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'icon_box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .icon-box-v3-style',
                'condition' => [
                    'select_style' => 'three',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-v3-style' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'select_style' => 'three',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-v3-style' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'select_style' => 'three',
                ],
            ]
        );
        $this->start_controls_tabs(
            'box_tabs'
        );
        $this->start_controls_tab(
            'box_tab_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'alignment',
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
                    'right'   => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'center',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-v2-single_item' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .eco-v3-single_item' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-v2-single_item,{{WRAPPER}} .eco-v3-single_item',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item,{{WRAPPER}} .eco-v3-single_item',
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
                'selectors'  => [
                    '{{WRAPPER}} .eco-v2-single_item' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item,{{WRAPPER}} .eco-v3-single_item',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-v2-single_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_tab_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-v2-single_item:hover,{{WRAPPER}} .eco-v3-single_item:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_hborder',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item:hover,{{WRAPPER}} .eco-v3-single_item:hover',
            ]
        );

        $this->add_responsive_control(
            'box_hradius',
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
                    '{{WRAPPER}} .eco-v2-single_item:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_hshadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item:hover,{{WRAPPER}} .eco-v3-single_item:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ========================================================
        // ================= Icon Style Start =====================
        // ========================================================

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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'font-size: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon:hover ' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon:hover ' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon:hover,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon:hover,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon:hover ',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon:hover,{{WRAPPER}} .eco-v3-single_item .eco-v3-icon:hover ',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-v2-single_item .eco-v2-icon:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .eco-v3-single_item .eco-v3-icon:hover ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // *********************************************************
        //                Content  Style Css
        // *********************************************************

        $this->start_controls_section(
            'content_css',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('content_tabs');
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
                'selector' => '{{WRAPPER}} .icon-box-v2-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-v2-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-box-v2-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_hcolor',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-v2-title:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .icon-box-v2-title a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .icon-box-v2-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .icon-box-v2-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'attr_tab',
            [
                'label' => __('Attrribute', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'attr_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .icon-attr',
            ]
        );
        $this->add_responsive_control(
            'attr_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-attr' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'attr_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .icon-attr',
            ]
        );
        $this->add_responsive_control(
            'attr_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-attr' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'attr_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-attr' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'des_tab',
            [
                'label' => __('Description', 'ecofinecore'),
                'condition' => [
                    'description' => 'yes',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'des_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .icon-box-v3-des',
            ]
        );
        $this->add_responsive_control(
            'des_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .icon-box-v3-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-v3-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .icon-box-v3-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        if ($settings['container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        if ($settings['select_style'] == 'three') {
            $icon_box_v3_s = 'icon-box-v3-style';
        } else {
            $icon_box_v3_s = '';
        }
        ob_start();
?>
        <div class="eco-icon-box-v2-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="eco-icon-v2-box <?php echo esc_attr($icon_box_v3_s); ?>">
                    <div class="row">
                        <?php foreach ($settings['list'] as $item) : ?>
                            <div class="<?php echo esc_attr($column); ?> col-12">
                                <?php if ($settings['select_style'] == 'one') : ?>
                                    <div class="eco-v2-single_item item-two ">
                                        <div class="eco-v2-icon two">
                                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                            <span class="icon-attr"> <?php echo esc_html($item['icon_attr']); ?></span>
                                        </div>
                                        <?php if ($item['enable_link'] == 'yes') :
                                            $url      = $item['link']['url'];
                                            $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                            <?php endif; ?>
                                            <?php if (!empty($item['title'])) : ?>
                                                <<?php echo esc_attr($settings['title_tag']); ?> class="icon-box-v2-title">
                                                    <?php echo esc_html($item['title']); ?>
                                                </<?php echo esc_attr($settings['title_tag']); ?>>
                                            <?php endif; ?>
                                            <?php if ($item['enable_link'] == 'yes') : ?>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>

                                <!-- Style Two Start -->
                                <?php if ($settings['select_style'] == 'two') : ?>
                                    <div class="eco-v2-single_item three-item">
                                        <div class="eco-v2-icon three">
                                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                            <span class="icon-attr"> <?php echo esc_html($item['icon_attr']); ?></span>
                                        </div>
                                        <?php if ($item['enable_link'] == 'yes') :
                                            $url      = $item['link']['url'];
                                            $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                            $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                        ?>
                                            <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                            <?php endif; ?>
                                            <?php if (!empty($item['title'])) : ?>
                                                <<?php echo esc_attr($settings['title_tag']); ?> class="icon-box-v2-title">
                                                    <?php echo esc_html($item['title']); ?>
                                                </<?php echo esc_attr($settings['title_tag']); ?>>
                                            <?php endif; ?>
                                            <?php if ($item['enable_link'] == 'yes') : ?>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
                                <!-- Style Two Start -->
                                <?php if ($settings['select_style'] == 'three') : ?>
                                    <div class="eco-v3-single_item">
                                        <div class="eco-v3-icon">
                                            <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                            <span class="icon-attr"> <?php echo esc_html($item['icon_attr']); ?></span>
                                        </div>
                                        <?php if (!empty($item['title'])) : ?>
                                            <<?php echo esc_attr($settings['title_tag']); ?> class="icon-box-v2-title">
                                                <?php if ($item['enable_link'] == 'yes') :
                                                    $url      = $item['link']['url'];
                                                    $target   = $item['link']['is_external'] ? ' target="_blank"' : '';
                                                    $nofollow = $item['link']['nofollow'] ? ' rel="nofollow"' : '';
                                                ?>
                                                    <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                    <?php endif; ?>
                                                    <?php echo esc_html($item['title']); ?>
                                                    <?php if ($item['enable_link'] == 'yes') : ?>
                                                    </a>
                                                <?php endif ?>
                                            </<?php echo esc_attr($settings['title_tag']); ?>>
                                        <?php endif ?>
                                        <?php if (!empty($item['title'])) : ?>
                                            <div class="icon-box-v3-des"> <?php echo esc_html($item['description']); ?> </div>
                                        <?php endif ?>
                                    </div>
                                <?php endif ?>
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
Plugin::instance()->widgets_manager->register(new eco_icon_box__v2_Widget);
