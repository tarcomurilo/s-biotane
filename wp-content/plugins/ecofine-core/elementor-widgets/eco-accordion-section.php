<?php

namespace Elementor;

class eco_accordion_section_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'Faq_section';
    }

    public function get_title()
    {
        return esc_html__('Eco Faq Section', 'ecofinecore');
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
            'ecofinecore_Faq_options',
            [
                'label' => esc_html__('Faq Content', 'ecofinecore'),
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
                'label'   => esc_html__('Choose Image', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_responsive_control(
            'image_background_color',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-faq-section-bg::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'image_width',
            [
                'label'      => esc_html__('Width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range'      => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eco-faq-section-bg' => 'width: {{SIZE}}%;',
                ],
            ]
        );
        $this->add_responsive_control(
            'bg_alignment',
            [
                'type'                 => \Elementor\Controls_Manager::CHOOSE,
                'label'                => esc_html__('Alignment', 'ecofinecore'),
                'options'              => [
                    'left'  => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon'  => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon'  => 'eicon-long-arrow-right',
                    ],
                ],
                'default'              => 'left',
                'toggle'               => true,
                'selectors_dictionary' => [
                    'left'  => 'left: 0',
                    'right' => 'left:auto;right:0',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .eco-faq-section-bg' => '{{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'reverge',
            [
                'type'                 => \Elementor\Controls_Manager::CHOOSE,
                'label'                => esc_html__('Row Reverse', 'ecofinecore'),
                'options'              => [
                    'left'  => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon'  => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon'  => 'eicon-long-arrow-right',
                    ],
                ],
                'default'              => 'right',
                'toggle'               => true,
                'selectors_dictionary' => [
                    'left'  => 'flex-direction:row',
                    'right' => 'flex-direction:row-reverse',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .row.reverge' => '{{VALUE}}',
                ],
                'condition'            => [
                    'bg_alignment' => 'right',
                ],
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => esc_html__('Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('ask something', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'stitle_html_tag',
            [
                'label' => esc_html__('Small Title HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h4',
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
            'title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Keep the scene green by taking the lead', 'ecofinecore'),
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'section_title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
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
                    'p'  => esc_html__('P', 'ecofinecore'),
                    'span'  => esc_html__('span', 'ecofinecore'),
                    'div'  => esc_html__('Div', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('It is a long established fact that a reader will be distr acted bioiiy the end gail readable content of a page when looking.', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'eco_faq_options',
            [
                'label' => esc_html__('Eco Accordion', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'eco_faq_active',
            [
                'label'        => esc_html__('Active FAQ', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $repeater->add_control(
            'eco_faq_title',
            [
                'label'       => esc_html__('Title', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('How much time do I need to volunteer?', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'more_options',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'eco_faq_content',
            [
                'label'      => esc_html__('Content', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::WYSIWYG,
                'default'    => esc_html__('Lorem Ipsum is simply dummy text of the printing and industry. been the industry,s standard dummy text ever since the printer took galley scrambled it to make a type specimen book.', 'ecofinecore'),
                'show_label' => false,
            ]
        );
        $this->add_control(
            'eco_faqs',
            [
                'label'          => esc_html__('FAQ List', 'ecofinecore'),
                'type'           => \Elementor\Controls_Manager::REPEATER,
                'fields'         => $repeater->get_controls(),
                'default'        => [
                    [
                        'eco_faq_active'  => 'yes',
                        'eco_faq_title'   => esc_html__('How much time do I need to volunteer?', 'ecofinecore'),
                        'eco_faq_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and industry. been the industry,s standard dummy text ever since the printer took galley scrambled it to make a type specimen book.', 'ecofinecore'),
                    ],
                    [
                        'eco_faq_active'  => 'no',
                        'eco_faq_title'   => esc_html__('How much time do I need to volunteer?', 'ecofinecore'),
                        'eco_faq_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and industry. been the industry,s standard dummy text ever since the printer took galley scrambled it to make a type specimen book.'),
                    ],
                    [
                        'eco_faq_active'  => 'no',
                        'eco_faq_title'   => esc_html__('How much time do I need to volunteer?', 'ecofinecore'),
                        'eco_faq_content' => esc_html__('Lorem Ipsum is simply dummy text of the printing and industry. been the industry,s standard dummy text ever since the printer took galley scrambled it to make a type specimen book.'),
                    ],
                ],
                'title_field' => '{{{ eco_faq_title }}}',
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
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
                    'p'  => esc_html__('P', 'ecofinecore'),
                    'span'  => esc_html__('span', 'ecofinecore'),
                    'div'  => esc_html__('Div', 'ecofinecore'),
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'eco_faq_css',
            [
                'label' => esc_html__('Box CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'more_options',
            [
                'label' => esc_html__('Additional Options', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'full_width',
            [
                'label' => esc_html__('Full Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_responsive_control(
            'full_width_faq_css_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'full_width_faq_css_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_align',
            [
                'label'     => __('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'separator' => 'before',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-item'   => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content ' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'faq_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'eco_faq_css_box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_radius',
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
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eco_faq_css_box_shoadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-faq-section-wrapper .eco-faq-section-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        // =============================================
        // ========== Faq Top Title STYLE CSS ==========
        // ==============================================

        $this->start_controls_section(
            'content_css_options',
            [
                'label' => esc_html__('Faq Top Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'content_css_tabs'
        );
        $this->start_controls_tab(
            'stitle_tab',
            [
                'label' => __(' Small Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-small-stitle',
            ]
        );
        $this->add_responsive_control(
            'stitle_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-small-stitle' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'stitle_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-small-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'stitle_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-small-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_tab',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'dec_tab',
            [
                'label' => __('Dec', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-dec' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dec_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .faq-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // =======================================
        // ========== CONTENT STYLE CSS ==========
        // =======================================
        $this->start_controls_section(
            'eco_faq_css_title',
            [
                'label' => esc_html__('Faq Content Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'eco_content_tabs'
        );

        $this->start_controls_tab(
            'style_title_tab',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'eco_faq_css_title_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_color',
            [
                'label'     => esc_html__('Title Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_color_h',
            [
                'label'     => esc_html__('Title Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-button:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_bg',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'active_bg_color',
            [
                'label' => esc_html__('Active Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'active_color',
            [
                'label' => esc_html__('Text Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_bg_active',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'eco_faq_css_title_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-button',
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_radius',
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
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eco_faq_css_title_shoadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-accordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        // ===================================================
        $this->start_controls_tab(
            'style_description_tab',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'eco_faq_css_dec_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-body',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_dec_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'body_bg_color',
            [
                'label'     => esc_html__('Body Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_dec_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_dec_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .faq-accordion .accordion-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // =======================================
        // ========== Icon Style CSS ==========
        // =======================================
        $this->start_controls_section(
            'icon_style_css',
            [
                'label' => esc_html__('Icon Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'eco_icon_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .faq-accordion .accordion-button::after',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-button::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_icon_bg_color',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-button::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'icon_color_collapse',
            [
                'label' => esc_html__('collapse show', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_color_c',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)::after' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_icon_bg_color_c',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-header .accordion-button:not(.collapsed)::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
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
        $_id = rand(1241, 3256);
        if ($settings['full_width'] == 'yes') {
            $full_width = 'faq-full-width';
            $column = "col-xl-6";
            $column2 = "col-xl-6";
        } else {
            $full_width = '';
            $column = "col-xl-7";
            $column2 = "col-xl-5";
        };
        ob_start();
?>

        <div class="eco-faq-section-wrapper">
            <div class="eco-faq-section-item">
                <div class="eco-faq-section-bg" style="background-image:url( <?php echo esc_url(wp_get_attachment_image_url($settings['image']['id'], 'full')); ?> ) ">
                </div>
                <div class="<?php echo esc_attr($container); ?>">
                    <div class="row reverge">
                        <div class="col-xl-6 col-lg-5  col-md-12  col-12"></div>
                        <div class="col-xl-6 col-lg-7  col-md-12  col-12">
                            <div class="eco-faq-section-content ">
                                <div class="faq-content">
                                    <<?php echo esc_attr($settings['stitle_html_tag']); ?> class="about-small-stitle"> <?php echo $settings['stitle']; ?></<?php echo esc_attr($settings['stitle_html_tag']); ?>>
                                    <<?php echo esc_attr($settings['section_title_tag']); ?> class="faq-title"> <?php echo $settings['title']; ?> </<?php echo esc_attr($settings['section_title_tag']); ?>>
                                    <div class="faq-dec"> <?php echo $settings['content']; ?> </div>
                                </div>
                                <div class="accordion faq-accordion" id="eco-faq">
                                    <?php $count = 0;
                                    foreach ($settings['eco_faqs'] as $item) : $count++;
                                        if ($item['eco_faq_active'] == 'yes') {
                                            $active = 'collapse';
                                            $show = 'show';
                                        } else {
                                            $active = 'collapsed';
                                            $show = '';
                                        } ?>
                                        <div class="accordion-item">
                                            <<?php echo esc_attr($settings['html_tag']); ?> class="accordion-header" id="faq<?php echo esc_attr($count) ?>">
                                                <button class="accordion-button <?php echo esc_attr($active); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#eco-faq-item-<?php echo esc_attr($_id . $count) ?>" aria-expanded="false" aria-controls="eco-faq-item-<?php echo esc_attr($_id . $count) ?>">
                                                    <?php echo esc_html($item['eco_faq_title']); ?>
                                                </button>
                                            </<?php echo esc_attr($settings['html_tag']); ?>>
                                            <div id="eco-faq-item-<?php echo esc_attr($_id . $count) ?>" class="accordion-collapse collapse <?php echo esc_attr($show); ?>" aria-labelledby="faq<?php echo esc_attr($count) ?>" data-bs-parent="#eco-faq">
                                                <div class="accordion-body"><?php echo wp_kses_post($item['eco_faq_content']); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_accordion_section_Widget);
