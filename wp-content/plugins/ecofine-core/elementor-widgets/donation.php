<?php

namespace Elementor;

class ecofine_donate_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'ecofine_donation';
    }
    public function get_title()
    {
        return esc_html__('ecofine donate', 'ecofinecore');
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
            'ecofine_donations_options',
            [
                'label' => esc_html__('ecofine Donate Items', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'ecofine_donations_style',
            [
                'label' => esc_html__('Select Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'donate-one',
                'options' => [
                    'donate-one'  => esc_html__('Style One', 'ecofinecore'),
                    'donate-two'  => esc_html__('Style Two', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_goal_text',
            [
                'label' => esc_html__('Goal Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Goal', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'ecofine_donate_Rise_text',
            [
                'label' => esc_html__('Raised Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Rise', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'ecofine_donate_limit_title',
            [
                'label' => esc_html__('Limit Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 6,
            ]
        );
        $this->add_control(
            'ecofine_donate_limit_dec',
            [
                'label' => esc_html__('Limit Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 30,
                'step' => 1,
                'default' => 15,
            ]
        );
        $this->add_control(
            'ecofine_donate_order',
            [
                'label' => esc_html__('Order By', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__('ASC', 'ecofinecore'),
                    'DESE' => esc_html__('DESE', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_btn_show',
            [
                'label' => esc_html__('Enable Button', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ecofine_donate_btn_text',
            [
                'label' => esc_html__('Button Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Donate Now', 'ecofinecore'),
                'condition' => [
                    'ecofine_donate_btn_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_btn_icon',
            [
                'label' => __('Button Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'exclude_inline_options' => ['svg'],
                'condition' => [
                    'ecofine_donate_btn_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_title_tag',
            [
                'label' => esc_html__('HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1'  => esc_html__('H1', 'ecofinecore'),
                    'h2'  => esc_html__('H2', 'ecofinecore'),
                    'h3'  => esc_html__('H3', 'ecofinecore'),
                    'h4'  => esc_html__('H4', 'ecofinecore'),
                    'h5'  => esc_html__('H5', 'ecofinecore'),
                    'h6'  => esc_html__('H6', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_buttons_new_tab',
            [
                'label' => __('Open New Window?', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ecofinecore'),
                'label_off' => __('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'ecofine_donate_btn_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_buttons_nofollow',
            [
                'label' => __('Add nofollow ?', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'ecofinecore'),
                'label_off' => __('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'ecofine_donate_btn_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_navication',
            [
                'label' => esc_html__('Enable Navication', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();
        //Content tab start
        $this->start_controls_section(
            'ecofine_donate_config_options',
            [
                'label' => esc_html__('ecofine Donate Options', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'enable_container',
            [
                'label' => esc_html__('Enable Container', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_enable',
            [
                'label' => esc_html__('Enable Slide', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'ecofine_donate_conlum',
            [
                'label' => esc_html__('Select Column', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '3',
                'options' => [
                    '12'  => esc_html__('One Column', 'ecofinecore'),
                    '6'  => esc_html__('Two Column', 'ecofinecore'),
                    '4'  => esc_html__('Three Column', 'ecofinecore'),
                    '3'  => esc_html__('Four Column', 'ecofinecore'),
                ],
                'condition' => [
                    'ecofine_donate_slide_enable!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_items',
            [
                'label' => esc_html__('Display Items', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 4,
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_itemss',
            [
                'label' => esc_html__('Display Items', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 4,
                'condition' => [
                    'ecofine_donate_slide_enable!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_dots',
            [
                'label' => esc_html__('Enable Dots', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_loop',
            [
                'label' => esc_html__('Enable Loop', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_speed',
            [
                'label' => esc_html__('Speed', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min'       => 100,
                'max'       => 10000,
                'step'      => 10,
                'default'   => 700,
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                    'ecofine_donate_slide_loop' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_slide_aloop',
            [
                'label' => esc_html__('Enable Auto Loop', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'ecofine_donate_slide_aspeed',
            [
                'label' => esc_html__('Auto Speed Speed', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min'       => 100,
                'max'       => 10000,
                'step'      => 50,
                'default'   => 3000,
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                    'ecofine_donate_slide_aloop' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_box',
            [
                'label' => esc_html__('Css Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ecofine_donate_css_box_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .donate-single',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_box_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-single' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_box_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-single' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ecofine_donate_css_box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-single',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ecofine_donate_css_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-single',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_box_radius',
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
                'selectors' => [
                    '{{WRAPPER}} .donate-single' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_image',
            [
                'label' => esc_html__('Css Image', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_image_height',
            [
                'label' => esc_html__('Image Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .donate-img img' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_image_object',
            [
                'label' => esc_html__('Select Object', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'contain'  => esc_html__('Contain', 'ecofinecore'),
                    'cover'  => esc_html__('Cover', 'ecofinecore'),
                    'fill'  => esc_html__('fill', 'ecofinecore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .donate-img img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ecofine_donate_css_image_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .donate-img img',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_image_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_image_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ecofine_donate_css_image_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-img img',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ecofine_donate_css_image_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-img img',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_image_radius',
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
                'selectors' => [
                    '{{WRAPPER}} .donate-img img' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_content_box',
            [
                'label' => esc_html__('Css Content Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_cbox_align',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'justify' => [
                        'title' => __('Justify', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .donate-contents' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ecofine_donate_css_cbox_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .donate-contents',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_cbox_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-contents' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_cbox_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-contents' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ecofine_donate_css_cbox_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-contents',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ecofine_donate_css_cbox_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-contents',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_cbox_radius',
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
                    'unit' => 'px',
                    'size' => 5,
                ],
                'selectors' => [
                    '{{WRAPPER}} .donate-contents' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_contents',
            [
                'label' => esc_html__('Css Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'ecofine_donate_css_contents_tabs'
        );
        $this->start_controls_tab(
            'ecofine_donate_css_contents_tabs_title',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_tc',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donat-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_thc',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donat-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ecofine_donate_css_content_ttypo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donat-title',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_tmargin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donat-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_tpading',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donat-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'ecofine_donate_css_contents_tabs_dec',
            [
                'label' => __('Dec', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_dc',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donat-dec' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ecofine_donate_css_content_dtypo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donat-dec',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_dmargin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donat-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_dpading',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donat-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'ecofine_donate_css_contents_tabs_profress',
            [
                'label' => __('Progress', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_bc',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donate-progress-bar .progress' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_abc',
            [
                'label' => esc_html__('Active Background', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donate-progress-bar .progress-bar' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
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
                    '{{WRAPPER}} .donate-progress-bar .progress' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_radius',
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
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .donate-progress-bar .progress' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-progress-bar .progress' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_progress_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-progress-bar .progress' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'ecofine_donate_css_contents_tabs_price',
            [
                'label' => __('Price', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_pc',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donate-status' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ecofine_donate_css_content_ptypo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .donate-status',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_pmargin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-price-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_content_ppading',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-price-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_btn',
            [
                'label' => esc_html__('Css Button', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_align',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'justify' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .donate-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'ecofine_donate_css_btn_tabs'
        );
        $this->start_controls_tab(
            'ecofine_donate_css_btn_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_c',
            [
                'label' => esc_html__('Title Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} a.donate-btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_nradius',
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
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_nshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'ecofine_donate_css_btn_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_hc',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_htypo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_hbg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} a.donate-btn:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn:hover',
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_btn_hradius',
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
                'selectors' => [
                    '{{WRAPPER}} a.donate-btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'ecofine_donate_css_btn_hshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} a.donate-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'ecofine_donate_css_dot',
            [
                'label' => esc_html__('Css Nav Dots', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'ecofine_donate_slide_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ecofine_donate_css_dot_align',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} ul.slick-dots' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_dot_ncol',
            [
                'label' => esc_html__('Normal Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.slick-dots li button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_dot_hcol',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ul.slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_donate_css_dot_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} ul.slick-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $dynamic_id = rand(1241, 3256);
        if ($settings['ecofine_donate_slide_enable'] == 'yes') {

            $row = 'active-slide';
            $class = 'slide-item';
            if ($settings['ecofine_donate_slide_dots'] == 'yes') {
                $dots = 'true';
            } else {
                $dots = 'false';
            }
            if ($settings['ecofine_donate_slide_aloop'] == 'yes') {
                $aloop = 'true';
            } else {
                $aloop = 'false';
            }
            if ($settings['ecofine_donate_slide_loop'] == 'yes') {
                $loop = 'true';
            } else {
                $loop = 'false';
            }
            if (is_rtl()) {
                $rtl = 'true';
            } else {
                $rtl = 'false';
            }
            echo '
            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    $("#donate-slide-' . esc_attr($dynamic_id) . '").slick({
                        slidesToShow:  ' . $settings['ecofine_donate_slide_items'] . ',
						rtl: ' . json_encode(is_rtl() == 'yes' ? true : false) . ',
                        slidesToScroll: 4,
                        arrows: false,
                        dots: ' . esc_attr($dots) . ',
                        infinite: ' . esc_attr($loop) . ',
                        autoplay: ' . esc_attr($aloop) . ',';
            if ($aloop == 'true') {
                echo 'speed: ' . esc_attr($settings['ecofine_donate_slide_speed']) . ',';
            }
            if ($aloop == 'true') {
                echo 'autoplaySpeed: ' . esc_attr($settings['ecofine_donate_slide_aspeed']) . ',';
            }
            if ($settings['ecofine_donations_style'] == 'donate-two') {
                echo 'responsive: [
                                {
                                breakpoint: 1124,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 2,
                                    }
                                },
                                {
                                    breakpoint: 992,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2,
                                        }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 4,
                                    }
                                }
                            ]';
            } else {
                echo 'responsive: [
                                {
                                breakpoint: 1124,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 2,
                                    }
                                },
                                {
                                    breakpoint: 992,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2,
                                        }
                                },
                                {
                                    breakpoint: 900,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                }
                            ]';
            }
            echo '
                    });
                });
            </script>';
        } else {
            $row = 'row';
            $class = 'col-12 col-md-6 col-lg-6 col-xl-6 col-xxl-' . esc_attr($settings['ecofine_donate_conlum']) . '';
        }
        if ($settings['ecofine_donate_slide_enable'] == 'yes') {
            $items = -1;
        } else {
            $items = $settings['ecofine_donate_slide_itemss'];
        }
        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $p = new \WP_Query(array(
            'posts_per_page' => $items,
            'post_type'     => 'give_forms',
            'post_status'   => 'publish',
            'paged'         => $paged,
            'order'         => $settings['ecofine_donate_order'],
        ));
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
?>
        <div class="ecofine-donation-wrapper <?php echo esc_attr($settings['ecofine_donations_style']); ?>">
            <div class="<?php echo esc_attr($container); ?> donate-wrapper-inner ">
                <div class="<?php echo esc_attr($row); ?>" id="donate-slide-<?php echo esc_attr($dynamic_id); ?>">
                    <?php
                    if ($settings['ecofine_donate_btn_show'] == true) {
                        $target = $settings['ecofine_donate_buttons_new_tab'] == true ? ' target="_blank"' : '';
                        $nofollow = $settings['ecofine_donate_buttons_nofollow'] == true ? ' rel="nofollow"' : '';
                    }
                    $currency = give_currency_filter();
                    while ($p->have_posts()) : $p->the_post();
                        $goal_option = give_get_meta(get_the_ID());
                        $idd = get_the_ID();
                        $stats = give_goal_progress_stats($idd);
                        $bar_width = $stats['raw_goal'] ? round(($stats['raw_actual'] / $stats['raw_goal']) * 100, 0) : 0;

                        if (has_excerpt()) {
                            $content = get_the_excerpt();
                        } elseif (!empty($goal_option['_give_form_content'])) {
                            $content = $goal_option['_give_form_content'][0];
                        } else {
                            $content = esc_html__('Despite applying for an three times and even hiring a lawyer to assist with the…', 'ecofine');
                        }

                    ?>
                        <div class="<?php echo esc_attr($class); ?>">
                            <div class="donate-single">
                                <div class="donate-img">
                                    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                </div>
                                <div class="donate-contents">
                                    <<?php echo esc_attr($settings['ecofine_donate_title_tag']); ?> class="donat-title">
                                        <a href="<?php echo the_permalink(); ?>" <?php echo esc_attr($target . $nofollow) ?>>
                                            <?php echo wp_trim_words(get_the_title(), $settings['ecofine_donate_limit_title']); ?>
                                        </a>
                                    </<?php echo esc_attr($settings['ecofine_donate_title_tag']); ?>>
                                    <div class="donat-dec">
                                        <?php if (!empty($content)) {
                                            echo wpautop(wp_trim_words($content, $settings['ecofine_donate_limit_dec']));
                                        } ?>
                                    </div>
                                    <div class="donate-progress-bar">
                                        <div class="progress">
                                            <div class="progress-bar" style="width: <?php echo esc_attr($bar_width); ?>%;"></div>
                                        </div>
                                        <div class="donate-price-area">
                                            <div class="donte-price-innter d-flex justify-content-between">
                                                <div class="donate-status goal-status">
                                                    <span class="status-label"><?php echo esc_html($settings['ecofine_donate_goal_text']); ?></span>
                                                    <span class="status-value"><?php echo esc_html($currency) . esc_html($stats['raw_goal']); ?></span>
                                                </div>
                                                <div class="donate-status raised-status">
                                                    <span class="status-label"><?php echo esc_html($settings['ecofine_donate_Rise_text']); ?></span>
                                                    <span class="status-value"><?php echo esc_html($currency) . esc_html($stats['raw_actual']); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if ($settings['ecofine_donate_btn_show'] == true) : ?>
                                            <div class="donate-button">
                                                <a href="<?php echo the_permalink(); ?>" class="donate-btn" <?php echo esc_attr($target . $nofollow) ?>><?php echo esc_html($settings['ecofine_donate_btn_text']) ?> <i class="<?php echo esc_attr($settings['ecofine_donate_btn_icon']['value']) ?>"></i></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query(); ?>
                    <?php if ($settings['ecofine_donate_navication'] == 'yes') { ?>
                        <?php ecofinecore_paginate_nav($p); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new ecofine_donate_Widget);
