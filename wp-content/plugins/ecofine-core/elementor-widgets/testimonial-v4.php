<?php

namespace Elementor;

class testomonial_four_widget extends Widget_Base
{

    public function get_name()
    {

        return 'testomonial_four';
    }

    public function get_title()
    {
        return esc_html__('Eco Testimonial V4', 'ecofinecore');
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
            'eco_title_options',
            [
                'label' => esc_html__('Eco Testomonial', 'ecofinecore'),
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
            'image',
            [
                'label' => esc_html__('Image', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'name',
            [
                'label'       => esc_html__('Name', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Marvin McKinney', 'ecofinecore'),
                'label_block' => true,
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
            'designation',
            [
                'label'       => esc_html__('Desiganation', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('CFO', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Deforestation, and climate change, have led to a decline in biodiversity and negative impacts on ecosystems. Ecologists use a variety of methods, such as field observations, experiments, and modeling, to study the complex interactions between .', 'ecofinecore'),
                'label_block' => true,
                'rows'      => 15,
            ]
        );

        $this->end_controls_section();

        //==================================================//
        //========= TESTIMONIAL TITLE STYLE START==========//
        //================================================//

        $this->start_controls_section(
            'eco_title_CSS_title',
            [
                'label' => esc_html__('Title Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_box',
            [
                'label' => esc_html__('Title Box', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'title_box_align',
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
                    '{{WRAPPER}} .testimonial-items' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .testimonial-items' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_title_box_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_title_box_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonial-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'eco_titles_tabs'
        );
        $this->start_controls_tab(
            'eco_titles_tabs_stitle',
            [
                'label' => __('Small Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'eco_section_stitle_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-section-stitle',
            ]
        );
        $this->add_responsive_control(
            'eco_section_stitle_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-section-stitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_section_stitle_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-section-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_section_stitle_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-section-stitle span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'eco_titles_tabs_title',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'eco_section_title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-t-title',
            ]
        );
        $this->add_responsive_control(
            'eco_section_title_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-t-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'eco_high_light_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .highlight-heading',
            ]
        );
        $this->add_responsive_control(
            'calfic_high_light_c',
            [
                'label' => esc_html__('High Light Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-t-title .highlight-heading::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_section_title_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-t-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_section_title_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-t-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //=================================================//
        //========= TESTIMONIAL BOX STYLE START===========//
        //===============================================//

        $this->start_controls_section(
            'box_tab_style',
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
                    '{{WRAPPER}} .testimonial-four-item-info' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-four-item-info',
            ]
        );
        $this->add_responsive_control(
            'box_backgrounds_triangle ',
            [
                'label'     => esc_html__('Triangle Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .triangle-down' => 'border-top-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-four-item-info',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-item-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-four-item-info',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-item-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-four-item-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ===============================================
        // ========== TESTIMONIAL CONTENT INFO ===========
        // ===============================================

        $this->start_controls_section(
            'testi_content',
            [
                'label' => esc_html__('Testimonial Info', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'testi_content_tabs'
        );
        $this->start_controls_tab(
            'testi_image_tab',
            [
                'label' => esc_html__('Image', 'ecofinecore'),
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
                        'max' => 300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                        'max' => 300,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-four-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-four-item-box .testimonial-four-image img',
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-item-box .testimonial-four-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-four-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-four-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_name_tab',
            [
                'label' => esc_html__('Name', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_name_typo',
                'selector' => '{{WRAPPER}} .testimonial-four-name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-four-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_designation_tab',
            [
                'label' => esc_html__('Designation', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_designation_typo',
                'selector' => '{{WRAPPER}} .testimonial-four-deg',
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-four-deg' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-deg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-deg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        //==========================================//
        //=========== CONTENT STYLE START===========//
        //========================================//

        $this->start_controls_section(
            'rating_Style',
            [
                'label' => esc_html__(' Contetn Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'eco_content_tabs'
        );
        $this->start_controls_tab(
            'testi_rating_tab',
            [
                'label' => esc_html__('Rating', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'rating_designation_typo',
                'selector' => '{{WRAPPER}} .testimonial-three-rating i',
            ]
        );
        $this->add_responsive_control(
            'rating_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-rating i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'rating_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-rating' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rating_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-rating i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_des_tab',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'testi_des_typo',
                'selector' => '{{WRAPPER}} .testimonial-four-des',
            ]
        );
        $this->add_responsive_control(
            'testi_des_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-four-des' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_des_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_des_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-four-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //==========================================//
        //======= TESTIMONIAL ICON STYLE START=========//
        //========================================//

        $this->start_controls_section(
            'icon_Style',
            [
                'label' => esc_html__('Icon Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'icon_typo',
                'selector' => '{{WRAPPER}} .testimonial-three-quit',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-three-quit' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-three-quit',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-three-quit',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-three-quit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
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
                    '{{WRAPPER}} .testimonial-three-quit' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-quit' => 'height: {{SIZE}}{{UNIT}};',
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
            'eco_svg_width',
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
                    '{{WRAPPER}} .testimonial-three-quit svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_svg_height',
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
                    '{{WRAPPER}} .testimonial-three-quit svg' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-quit' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-three-quit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        //==========================================//
        //=========== CONTENT STYLE START===========//
        //========================================//

        $this->start_controls_section(
            'testi_arrow_content',
            [
                'label' => esc_html__('Testimonial Arrow Style', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Dode Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_dode_color',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .slick-dots li button',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'arrow_height',
            [
                'label'      => esc_html__('Height', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'arrow_width',
            [
                'label'      => esc_html__('width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 150,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'left_arrow_typography',
                'selector' => '{{WRAPPER}} .testimonial-arrow-wrapper button',
            ]
        );
        $this->add_responsive_control(
            'left_arrow_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_arrow_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_arrow_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .testimonial-arrow-wrapper button',
            ]
        );
        $this->add_control(
            'more_options2',
            [
                'label' => esc_html__('Background Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_arrow_background_hover',
                'label' => esc_html__('Background Hover', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .testimonial-arrow-wrapper button:hover',
            ]
        );
        $this->add_responsive_control(
            'left_arrow_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_arrow_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_arrow_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-arrow-wrapper button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
?>
        <div class="testimonial-four-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="testimonial-four-item-box ">
                    <div class="testimonial-four-image">
                        <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                    </div>
                    <div class="testimonial-four-item-info">
                        <<?php echo esc_attr($settings['html_tag']); ?> class="testimonial-four-name"><?php echo esc_html($settings['name']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                        <span class="testimonial-four-deg"><?php echo esc_html($settings['designation']); ?></span>
                        <div class="testimonial-four-des"> <?php echo esc_html($settings['description']); ?> </div>
                    </div>
                </div>
            </div>
        </div>

<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new testomonial_four_widget);
