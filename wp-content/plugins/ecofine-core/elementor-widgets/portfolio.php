<?php

namespace Elementor;

class eco_portfolio_Widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_portfolio';
    }

    public function get_title()
    {
        return esc_html__('Eco Portfolio', 'ecofinecore');
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
            'project_slide_options',
            [
                'label' => esc_html__('project Filtter', 'ecofinecore'),
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
            'menunote',
            [
                'label' => __('Category menu Settings', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_menu',
            [
                'label' => esc_html__('Enable Menu', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',

            ]
        );
        $this->add_control(
            'menuallynote',
            [
                'label' => __('manually Categoy', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enalbe_cat',
            [
                'label' => esc_html__('Manually Select', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'ecofine_portfolio',
            [
                'label' => esc_html__('Select Category', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
                'options' => ecofinecore_portfolio_cat_list(),
                'condition' => [
                    'enalbe_cat' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'show_all',
            [
                'label' => esc_html__('Enable All Project Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'all_text',
            [
                'label' => esc_html__('Test', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('All Projects', 'ecofinecore'),
                'placeholder' => esc_html__('Type your title here', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'show_all' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
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
            'title_lanth',
            [
                'label'   => esc_html__('Title Length ', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 12,
                'step'    => 1,
                'default' => 3,
            ]
        );
        $this->add_control(
            'orderby',
            [
                'label' => esc_html__('Order by', 'ecofinecore'),
                'type' => Controls_Manager::SELECT,
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
        $this->add_control(
            'order',
            [
                'label'   => esc_html__('Order', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'DESE',
                'options' => [
                    'ASC'  => esc_html__('ASC', 'ecofinecore'),
                    'DESE' => esc_html__('DESE', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'display_item',
            [
                'label' => esc_html__('Display Items', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 9,
            ]
        );
        $this->add_control(
            'note2',
            [
                'label' => __('Enable Container', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desktop_col',
            [
                'label'     => __('Columns On Desktop', 'ecofinecore'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-xl-4',
                'options'   => [
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
                'label'     => __('Columns for Laptop', 'ecofinecore'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-lg-4',
                'options'   => [
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
            ]
        );
        $this->add_control(
            'gutters',
            [
                'label' => esc_html__('Gutters', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],

            ]
        );
        $this->add_control(
            'notebb',
            [
                'label' => __('Enable Button', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable_btns',
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
            'notepage',
            [
                'label' => __('Pagination Settings', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Enable Pagination', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->end_controls_section();

        //===========================================//
        //=========== MENU STYLE START ===========//
        //=========================================//

        $this->start_controls_section(
            'portfolio_menu_css',
            [
                'label' => esc_html__('Menu Css', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_menu' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_align',
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
                    '{{WRAPPER}} .project-filter' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .project-menu ul li',
            ]
        );
        $this->add_responsive_control(
            'menu_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-menu ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_acolor',
            [
                'label' => esc_html__('Active Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-menu ul li.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-portfolio-wrapper .project-filter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .project-menu ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->start_controls_tabs(
            'section_tabs'
        );
        $this->start_controls_tab(
            'section_normal_tab',
            [
                'label' => esc_html__('Normal', 'ecofinecore'),
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
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-portfolio-content' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'reverge',
            [
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'label' => esc_html__('Row Reverse', 'ecofinecore'),
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-right',
                    ],
                ],
                'default' => 'riht',
                'toggle'  => true,
                'selectors_dictionary' => [
                    'right'   => 'flex-direction:row',
                    'left'  => 'flex-direction:row-reverse',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .content_inner' => '{{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_width',
            [
                'label'      => esc_html__('Box Width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'custom'],
                'range' => [
                    '%' => [
                        'min' => 50,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-item .eco-portfolio-content-wrp:hover .eco-portfolio-content' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .eco-portfolio-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-content',
            ]
        );
        $this->add_responsive_control(
            'team_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-content',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-item .eco-portfolio-content-wrp:hover .eco-portfolio-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-item .eco-portfolio-content-wrp:hover .eco-portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'box_hover_tab',
            [
                'label' => esc_html__('Hover', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_hover',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .eco-portfolio-content:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-content:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-content:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-content:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
                    '{{WRAPPER}} .eco-portfolio-content-wrp img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-content-wrp img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-content-wrp img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-content-wrp img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-content-wrp img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-content-wrp' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-content-wrp' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $this->start_controls_tabs('ecofine_Content_tabs');
        $this->start_controls_tab(
            'services_title_normal_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'selector' => '{{WRAPPER}} .project-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-title a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-title a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .project-stitle',
            ]
        );

        $this->add_responsive_control(
            'cat_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-cats ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'cat_color_h',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-cats ul li a:hover' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .project-cats ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .project-cats ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //=================================================//
        //========== PROJECT TWO ICON STYLE START==========//
        //=================================================//

        $this->start_controls_section(
            'icon_Style',
            [
                'label' => esc_html__('Icon Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-icon' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .project-icon',
            ]
        );
        $this->add_responsive_control(
            'project_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-icon' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'project_icon_color_hover',
            [
                'label'     => esc_html__('Icon Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .project-icon:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'label'    => esc_html__('Icon Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .project-icon',
            ]
        );
        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Backgroun Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg_hover',
                'label'    => esc_html__('Icon Background Hover', 'ecofinecore'),
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .project-icon:hover',
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .project-icon',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'svg_options',
            [
                'label' => esc_html__('Svg Image Control', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'ecofine_svg_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ecofine_svg_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .project-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .project-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }

        $procatagoris = get_terms(['taxonomy' => 'ecofine_portfolio_cat', 'hide_empty' => true]);
        $unique = rand(35245545, 541541745);
        // project Query 
        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        if ($settings['enalbe_cat'] == 'yes' && !empty($settings['ecofine_portfolio'])) {
            $p = new \WP_Query(array(
                'posts_per_page' => $settings['display_item'],
                'post_type' => 'ecofine_portfolio',
                'paged'     => $paged,
                'orderby'     => esc_attr($settings['orderby']),
                'order'     => esc_attr($settings['order']),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'ecofine_portfolio_cat',
                        'field'    => 'slug',
                        'terms' => $settings['ecofine_portfolio'],
                    )
                ),
            ));
        } else {
            $p = new \WP_Query(array(
                'posts_per_page' => $settings['display_item'],
                'post_type' => 'ecofine_portfolio',
                'paged'     => $paged,
                'orderby'     => esc_attr($settings['orderby']),
                'order'     => esc_attr($settings['order']),
            ));
        }
        ob_start();
?>
        <script>
            jQuery(window).ready(function($) {
                'use strict';
                jQuery('.project-filter li').on('click', function() {
                    jQuery('.project-filter li').removeClass('active');
                    jQuery(this).addClass('active');
                    var selector = jQuery(this).attr('data-filter');
                    jQuery('.projectlist-<?php echo esc_attr($unique) ?>').isotope({
                        filter: selector,
                    });
                });
            });
            jQuery(window).on('load', function($) {
                'use strict';
                jQuery(".projectlist-<?php echo esc_attr($unique) ?>").isotope();
            });
        </script>
        <div class="eco-portfolio-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <?php if ($settings['enable_menu'] == 'yes') : ?>
                    <div class="project-menu">
                        <?php if ($settings['enalbe_cat'] == 'yes' || !is_wp_error($procatagoris)) : ?>
                            <ul class="project-filter">
                                <?php if ($settings['show_all'] == 'yes') : ?>
                                    <li class="active" data-filter="*"><?php echo esc_html($settings['all_text']); ?></li>
                                <?php endif; ?>
                                <?php if ($settings['enalbe_cat'] == 'yes') {
                                    foreach ($settings['ecofine_portfolio'] as $cat_slug) {
                                        $catTerms = get_term_by('slug', $cat_slug, 'ecofine_portfolio_cat');
                                        echo ' <li class="" data-filter=".' . $catTerms->slug . '">' . $catTerms->name . '</li>';
                                    }
                                } elseif (!empty($procatagoris) && !is_wp_error($procatagoris)) {
                                    foreach ($procatagoris as $procatagori) {
                                        echo '<li class="" data-filter=".' . $procatagori->slug . '">' . $procatagori->name . '</li>';
                                    }
                                } ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <div class="row projectlist-<?php echo esc_attr($unique) ?> g-<?php echo esc_attr($settings['gutters']['size']); ?> ">
                    <?php while ($p->have_posts()) : $p->the_post();
                        $project_catagory = get_the_terms(get_the_ID(), 'ecofine_portfolio_cat');
                        if ($project_catagory && !is_wp_error($project_catagory)) {
                            $project_cat_list = array();
                            foreach ($project_catagory as $ecofine_portfolio) {
                                $project_cat_list[] = $ecofine_portfolio->slug;
                            }
                            $project_catshow = join(" ", $project_cat_list);
                        } else {
                            $project_catshow = '';
                        }
                    ?>
                        <div class="<?php echo esc_attr($column); ?> p-coloums <?php echo esc_attr($project_catshow); ?>">
                            <div class="eco-portfolio-item">
                                <div class="eco-portfolio-content-wrp">
                                    <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                    <div class="eco-portfolio-content">
                                        <div class="item-content-heading">
                                            <?php $project_catagorys = get_the_terms(get_the_ID(), 'ecofine_portfolio_cat');
                                            if ($project_catagorys && !is_wp_error($project_catagorys)) : ?>
                                                <div class="project-cats">
                                                    <span>
                                                        <ul>
                                                            <?php foreach ($project_catagorys as $project_catagory) {
                                                                echo '<li><a href="' . esc_url(get_term_link($project_catagory->slug, 'ecofine_portfolio_cat')) . '">' . esc_html($project_catagory->name) . '</a></li>';
                                                            } ?>
                                                        </ul>
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                            <<?php echo esc_attr($settings['html_tag']); ?> class="project-title"><a href="<?php echo the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), esc_html($settings['title_lanth'])); ?></a> </>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
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
Plugin::instance()->widgets_manager->register(new eco_portfolio_Widget);
