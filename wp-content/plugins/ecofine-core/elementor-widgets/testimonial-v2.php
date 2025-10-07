<?php

namespace Elementor;

class Ecofine_testimonial_v2_Widget extends Widget_Base
{

    public function get_name()
    {

        return 'Ecofine_testimonial_v2';
    }

    public function get_title()
    {
        return esc_html__('Eco Testimonial V2', 'ecofinecore');
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
            'enable_title',
            [
                'label' => esc_html__('Enable Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'eco_section_stitle',
            [
                'label' => esc_html__('Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Clients talk', 'ecofinecore'),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_section_stitle_tag',
            [
                'label' => esc_html__('HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h6',
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
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_section_title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Leading the way to a greener tomorrow', 'ecofinecore'),
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_section_title_tag',
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
                    'p'  => esc_html__('P', 'ecofinecore'),
                    'span'  => esc_html__('span', 'ecofinecore'),
                    'div'  => esc_html__('Div', 'ecofinecore'),
                ],
                'condition' => [
                    'enable_title' => 'yes',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'icon',
            [
                'label'   => esc_html__('Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'ico ico-quote22',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $repeater->add_control(
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
            'html_tag',
            [
                'label' => esc_html__('Name HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
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
        $repeater->add_control(
            'name',
            [
                'label'       => esc_html__('Name', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('Marvin McKinney', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label'       => esc_html__('Desiganation', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => esc_html__('CFO', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Ecology is crucial for our understanding of the natural world, and is becoming increasingly important as human activities, such as pollution, deforestation, and climate change, have led to a decline.', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'bg_icon',
            [
                'label'   => esc_html__('Background Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-quote-left',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'elable_rating',
            [
                'label' => esc_html__('Enable Rating', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $repeater->add_control(
            'testimonial_rating',
            [
                'label' => __('Rating', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => .5,
                    ],
                ],
                'default' => [
                    'size' => 5,
                ],
                'condition' => [
                    'elable_rating' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_repeater_list',
            [
                'label'       => esc_html__('Repeater List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'name' => esc_html__('Manaf Hasan', 'ecofinecore'),
                        'designation' => esc_html__('CFO/Founder', 'ecofinecore'),
                    ],
                    [
                        'name' => esc_html__('Manaf Hasan', 'ecofinecore'),
                        'designation' => esc_html__('CFO/Founder', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Testimonial Options', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'default' => 'col-xl-6',
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
                'default' => 'col-lg-6',
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
                'default' => 'col-md-12',
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
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'eco_enable_arrows',
            [
                'label'        => esc_html__('Enable Arrows ', 'ecofinecore'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('On', 'ecofinecore'),
                'label_off'    => esc_html__('Off', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'no',
                'condition' => [
                    'enable_title' => 'yes',
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_enable_dots',
            [
                'label'        => esc_html__('Enable Dots ', 'ecofinecore'),
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
                'default' => 2,
                'condition' => [
                    'enable_slide' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'eco_slider_speed',
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
        $this->start_controls_tabs(
            'normal_box_tabs'
        );
        $this->start_controls_tab(
            'normal_box_tab',
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
                    '{{WRAPPER}} .testimonial-item-box' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box',
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-item-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow_hover',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_hover',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box:hover',
            ]
        );

        $this->add_responsive_control(
            'border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
                        'max' => 200,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .image-wrap img' => 'height: {{SIZE}}{{UNIT}};',
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
                        'max' => 200,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .image-wrap img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-wrap img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .image-wrap img',
            ]
        );
        $this->add_responsive_control(
            'testi_image_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .image-wrap img' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .image-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .image-wrap img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testimonial-name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_name_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testimonial-name' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testimonial-designation',
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-designation' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'testi_designation_color_hover',
            [
                'label'     => esc_html__('Hover  Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testimonial-designation' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testi-two-box .share i',
            ]
        );
        $this->add_responsive_control(
            'rating_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-two-box .share i' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testi-quit-two .share' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two .share i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testmonial-content',
            ]
        );
        $this->add_responsive_control(
            'testi_des_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testmonial-content' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testmonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testmonial-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testi-quit-two',
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testi-quit-two' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testi-quit-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testi-quit-two',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testi-quit-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'icon_hover_style',
            [
                'label' => esc_html__('Icon Hover Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'icon_color_h',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testi-quit-two' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg_h',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testi-quit-two',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'icon_border_h',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testi-quit-two',
            ]
        );
        $this->add_responsive_control(
            'icon_border_redius_h',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .testi-quit-two' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two svg' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testi-quit-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
    protected function rating_render($value = '')
    {
        $ratefull = '<i class="bi bi-star-fill"></i>';
        $ratehalf = '<i class="bi bi-star-half"></i>';
        $rateO = '<i class="bi bi-star"></i>';

        if ($value > 4.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratefull;
        } elseif ($value <= 4.75 && $value > 4.25) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $ratehalf;
        } elseif ($value <= 4.25 && $value > 3.75) {
            return $ratefull . $ratefull . $ratefull . $ratefull . $rateO;
        } elseif ($value <= 3.75 && $value > 3.25) {
            return $ratefull . $ratefull . $ratefull . $ratehalf . $rateO;
        } elseif ($value <= 3.25 && $value > 2.75) {
            return $ratefull . $ratefull . $ratefull . $rateO . $rateO;
        } elseif ($value <= 2.75 && $value > 2.25) {
            return $ratefull . $ratefull . $ratehalf . $rateO . $rateO;
        } elseif ($value <= 2.25 && $value > 1.75) {
            return $ratefull . $ratefull . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.75 && $value > 1.25) {
            return $ratefull . $ratehalf . $rateO . $rateO . $rateO;
        } elseif ($value <= 1.25) {
            return $ratefull . $rateO . $rateO . $rateO . $rateO;
        }
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $_id = rand(2585, 8241);
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
        if ($settings['enable_slide'] == 'yes') {
            $row = 'no-row';
            $col = 'testmonial-slide-item';
            $box = 'testi-box';
            if ($settings['eco_enable_arrows'] == 'yes') {
                $eco_title = 'eco-t-titles';
            }
?>
            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    $('#testimonial-<?php echo esc_attr($_id); ?>').slick({
                        infinite: true,
                        rtl: <?php echo json_encode(is_rtl() == 'yes' ? true : false); ?>,
                        speed: <?php echo json_encode($settings['eco_slider_speed']); ?>,
                        autoplay: <?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false); ?>,
                        arrows: <?php echo json_encode($settings['eco_enable_arrows'] == 'yes' ? true : false); ?>,
                        dots: <?php echo json_encode($settings['eco_enable_dots'] == 'yes' ? true : false); ?>,
                        slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                        slidesToScroll: 1,
                        prevArrow: $(".testimonial-prev"),
                        nextArrow: $(".testimonial-next"),
                        cssEase: 'linear',
                        responsive: [{
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 1,
                            }
                        }]
                    });
                });
            </script>
        <?php
        } else {
            $box = '';
            $row = 'row';
            $col =  'col-12 col-sm-12 ' . $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'] . '';
        }
        ?>
        <div class="testimonial-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <?php if ($settings['enable_title'] == 'yes') : ?>
                    <div class="testimonial-items">
                        <div class="eco-section-title">
                            <?php if (!empty($settings['eco_section_stitle'])) {
                                echo '<' . esc_attr($settings['eco_section_stitle_tag']) . ' class="eco-section-stitle">
                                <span>' . esc_html($settings['eco_section_stitle']) . '</span></' . esc_attr($settings['eco_section_stitle_tag']) . '>';
                            } ?>
                            <<?php echo esc_attr($settings['eco_section_title_tag']); ?> class="eco-t-title <?php echo esc_attr($eco_title) ?>">
                                <?php echo wp_kses($settings['eco_section_title'], 'eco_allowed_html'); ?>
                            </<?php echo esc_attr($settings['eco_section_title_tag']); ?>>
                        </div>
                        <?php if ($settings['eco_enable_arrows'] == 'yes') : ?>
                            <div class="testimonial-arrow">
                                <div class="testimonial-arrow-wrapper">
                                    <button class="testimonial-prev"><i class="bi bi-arrow-left"></i></button>
                                    <button class="testimonial-next"><i class="bi bi-arrow-right"></i></button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="<?php echo esc_attr($row); ?>" id="testimonial-<?php echo esc_attr($_id); ?>">
                    <?php foreach ($settings['eco_repeater_list'] as $item) : ?>
                        <div class="<?php echo esc_attr($col); ?>">
                            <div class="testimonial-item-box testi-two-box <?php echo esc_attr($box); ?>">
                                <?php if (!empty($item['icon'])) : ?>
                                    <span class="testi-quit-two">
                                        <?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if ($item["elable_rating"] == 'yes') : ?>
                                    <div class="share share-rating">
                                        <?php echo $this->rating_render($item['testimonial_rating']['size']); ?>
                                    </div>
                                <?php endif ?>
                                <div class="testimonial-item-content">
                                    <p class="testmonial-content"> <?php echo esc_html($item['description']); ?> </p>
                                </div>
                                <div class="testimonial-info two">
                                    <div class="image-wrap">
                                        <?php echo wp_get_attachment_image($item['image']['id'], 'full'); ?>
                                    </div>

                                    <div class="testimonial-information">
                                        <?php if (!empty($item['bg_icon'])) : ?>
                                            <span class="testi-quit testi-bg">
                                                <?php \Elementor\Icons_Manager::render_icon($item['bg_icon'], ['aria-hidden' => 'true']); ?>
                                            </span>
                                        <?php endif; ?>
                                        <<?php echo esc_attr($settings['html_tag']); ?> class="testimonial-name"><?php echo esc_html($item['name']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                        <span class="testimonial-designation"> <?php echo esc_html($item['designation']); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new Ecofine_testimonial_v2_Widget);
