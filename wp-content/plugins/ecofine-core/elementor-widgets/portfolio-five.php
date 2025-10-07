<?php

namespace Elementor;

class portfolio_five_widget extends Widget_Base
{

    public function get_name()
    {
        return 'portfolio_five';
    }

    public function get_title()
    {
        return esc_html__('Eco Portfolio V5', 'ecofinecore');
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
        $options = array();
        $args = array(
            'hide_empty' => false,
        );
        $categories = get_categories($args);
        foreach ($categories as $key => $category) {
            $options[$category->term_id] = $category->name;
        }
        $this->start_controls_section(
            'project_content_section',
            [
                'label' => esc_html__('Portfolio Option', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'item_show',
            [
                'label'   => esc_html__('Disply Items', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 3,
            ]
        );
        $this->add_control(
            'enable_cat',
            [
                'label'        => esc_html__('Post By Category', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'post_cat',
            [
                'label'     => __('Select Categoris', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::SELECT2,
                'multiple'  => true,
                'options'   => $options,
                'condition' => [
                    'enable_cat' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_lanth',
            [
                'label'   => esc_html__('Title Length ', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 30,
                'step'    => 1,
                'default' => 6,
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
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
            'orderby',
            [
                'label'   => esc_html__('Order Type', 'ecofinecore'),
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
        $this->add_responsive_control(
            'order',
            [
                'label'   => esc_html__('Order', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC'  => esc_html__('ASC', 'ecofinecore'),
                    'DESE' => esc_html__('DESE', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label'        => esc_html__('Show Navication', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
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
            'desktop_col',
            [
                'label' => esc_html__('Columns On Desktop', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
                    'col-xl-12'  => esc_html__('1 Column', 'ecofinecore'),
                    'col-xl-6'  => esc_html__('2 Column', 'ecofinecore'),
                    'col-xl-4'  => esc_html__('3 Column', 'ecofinecore'),
                    'col-xl-3'  => esc_html__('4 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'ipadpro_col',
            [
                'label' => esc_html__('Columns On Ipad Pro', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-lg-4',
                'options' => [
                    'col-lg-12'  => esc_html__('1 Column', 'ecofinecore'),
                    'col-lg-6'  => esc_html__('2 Column', 'ecofinecore'),
                    'col-lg-4'  => esc_html__('3 Column', 'ecofinecore'),
                    'col-lg-3'  => esc_html__('4 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'tab_col',
            [
                'label' => esc_html__('Columns On Tablet', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-md-6',
                'options' => [
                    'col-md-12'  => esc_html__('1 Column', 'ecofinecore'),
                    'col-md-6'  => esc_html__('2 Column', 'ecofinecore'),
                    'col-md-4'  => esc_html__('3 Column', 'ecofinecore'),
                    'col-md-3'  => esc_html__('4 Column', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_slide!' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_slide',
            [
                'label' => esc_html__('Enable Slide', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'enable_arrows',
            [
                'label'        => esc_html__('Enable Arrows ', 'ecofinecore'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('On', 'ecofinecore'),
                'label_off'    => esc_html__('Off', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_slider_auto_loop',
            [
                'label'        => esc_html__('Enable Auto Loop ', 'ecofinecore'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('On', 'ecofinecore'),
                'label_off'    => esc_html__('Off', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'slid_show_item',
            [
                'label' => esc_html__('Display Item', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 4,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'slider_speed',
            [
                'label'     => esc_html__('Slide Speed', 'ecofinecore'),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 500,
                'max'       => 8000,
                'step'      => 10,
                'default'   => 800,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        //===========================================//
        //========= PROJECT BOX STYLE START ========//
        //=========================================//

        $this->start_controls_section(
            'box_style',
            [
                'label' => esc_html__('Box Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_align',
            [
                'label' => esc_html__('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-box .portfolio-five-box-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .portfolio-five-box:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-box:before',
            ]
        );
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-box:before',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-box:before' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===============================================
        // =========== IMAGE STYLE CSS ===================
        // ===============================================

        $this->start_controls_section(
            'image_style',
            [
                'label' => esc_html__('Image Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__('Height', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'min_image_height',
            [
                'label'      => esc_html__('Min Height', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box img' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__('width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
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
                    '{{WRAPPER}} .portfolio-five-box img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-box img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===================================================
        // ============== CONTENT STYLE ======================
        // ===================================================

        $this->start_controls_section(
            'content_tab_style',
            [
                'label' => esc_html__('Content Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('service_Content_tabs');
        $this->start_controls_tab(
            'services_title_normal_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'ptitle_typography',
                'selector' => '{{WRAPPER}} .portfolio-five-title',
            ]
        );
        $this->add_responsive_control(
            'ptitle_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ptitle_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // ===================== Category STYLE====================
        $this->start_controls_tab(
            'category_tab ',
            [
                'label' => esc_html__('Category', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'cat_typography',
                'selector' => '{{WRAPPER}} .portfolio-five-category a',
            ]
        );

        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-category ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_color_h',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-category ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-category ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-category ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typography',
                'selector' => '{{WRAPPER}} .portfolio-five-icon a',
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
                    '{{WRAPPER}} .portfolio-five-icon a' => 'min-width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-icon a' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-icon a' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-five-icon a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .portfolio-five-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_shadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-icon a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-icon a',
            ]
        );
        $this->add_responsive_control(
            'icon_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-icon a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-icon a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-icon a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-five-icon a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .portfolio-five-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_box_Shadow::get_type(),
            [
                'name'     => 'icon_hshadow',
                'label'    => esc_html__('icon Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-icon a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_hborder',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-five-icon a:hover',
            ]
        );
        $this->add_responsive_control(
            'icon_hradius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .portfolio-five-icon a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        $unique_id = rand(2585, 8241);
        if ($settings['enable_slide'] == 'yes') {
            $column = 'project-slide-item';
            $slider = 'slide'; ?>

            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    $('#project-<?php echo esc_attr($unique_id); ?>').slick({
                        infinite: true,
                        rtl: <?php echo json_encode(is_rtl() == 'yes' ? true : false); ?>,
                        speed: <?php echo json_encode($settings['slider_speed']); ?>,
                        autoplay: <?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false); ?>,
                        arrows: <?php echo json_encode($settings['enable_arrows'] == 'yes' ? true : false); ?>,
                        dots: false,
                        slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                        slidesToScroll: 1,
                        cssEase: 'linear',
                        prevArrow: $(".slider-prev"),
                        nextArrow: $(".slider-next"),
                        responsive: [{
                                breakpoint: 1200,
                                settings: {
                                    slidesToShow: 3,
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 991,
                                settings: {
                                    slidesToShow: 2,
                                    arrows: false,
                                }
                            },
                            {
                                breakpoint: 767,
                                settings: {
                                    slidesToShow: 1,
                                    arrows: false,
                                }
                            }
                        ]
                    });
                });
            </script>
        <?php
        } else {
            $slider = '';
            $column = $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'];
        }
        ?>
        <?php
        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if ($settings['enable_cat'] == 'yes' && !empty($settings['post_cat'])) {
            $p = new \WP_Query(array(
                'posts_per_page' => esc_attr($settings['item_show']),
                'post_type'      => 'ecofine_portfolio',
                'paged'          => $paged,
                'order'          => esc_attr($settings['orderby']),
                'tax_query'      => array(
                    array(
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $settings['post_cat'],
                    ),
                ),
            ));
        } else {
            $p = new \WP_Query(array(
                'posts_per_page' => esc_attr($settings['item_show']),
                'post_type'      => 'ecofine_portfolio',
                'paged'          => $paged,
                'orderby'        => esc_attr($settings['orderby']),
                'order'          => esc_attr($settings['order']),
            ));
        }
        ob_start();
        ?>
        <div class="portfolio-five-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="row" id="project-<?php echo esc_attr($unique_id); ?>">
                    <?php while ($p->have_posts()) : $p->the_post(); ?>
                        <div class="<?php echo esc_attr($column); ?> ">
                            <div class="portfolio-five-box <?php echo esc_attr($slider); ?>">
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                <div class="portfolio-five-box-content">
                                    <?php $project_catagorys = get_the_terms(get_the_ID(), 'ecofine_portfolio_cat');
                                    if ($project_catagorys && !is_wp_error($project_catagorys)) : ?>
                                        <div class="portfolio-five-category">
                                            <ul>
                                                <?php
                                                foreach ($project_catagorys as $project_catagory) : ?>
                                                    <li><a href="<?php echo esc_url(get_term_link($project_catagory->slug, 'ecofine_portfolio_cat')) ?>">
                                                            <?php echo esc_html($project_catagory->name) ?>
                                                        </a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                    <<?php echo esc_attr($settings['html_tag']); ?> class="portfolio-five-title"> <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), $settings['title_lanth']); ?> </a></<?php echo esc_attr($settings['html_tag']); ?>>
                                    <div class="portfolio-five-icon"><a href=""> <i aria-hidden="true" class="fas fa-arrow-right"></i> </a></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                    wp_reset_query(); ?>
                </div>
                <?php if ($settings['pagination'] == 'yes') { ?>
                    <?php ecofinecore_paginate_nav($p); ?>
                <?php } ?>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new portfolio_five_widget);
