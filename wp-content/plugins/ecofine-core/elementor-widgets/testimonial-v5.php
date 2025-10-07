<?php

namespace Elementor;

class testomonial_five_widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_testomonial_five';
    }

    public function get_title()
    {
        return esc_html__('Eco Testimonial V5', 'ecofinecore');
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Deforestation, and climate change, have led to a decline in biodiversity and negative impacts on ecosystems. Ecologists use a variety of methods, such as field observations, experiments, and modeling, to study the complex interactions between .', 'ecofinecore'),
                'label_block' => true,
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
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
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
            'elable_rating',
            [
                'label' => esc_html__('Enable Rating', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'arro_style_select',
            [
                'label' => esc_html__('Select Arrow Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'solid',
                'options' => [
                    '' => esc_html__('Default', 'ecofinecore'),
                    'one'  => esc_html__('One', 'ecofinecore'),
                    'two' => esc_html__('Two', 'ecofinecore'),
                ],
                'condition' => [
                    'eco_enable_arrows' => 'yes',
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

        $this->start_controls_section(
            'testi_content',
            [
                'label' => esc_html__('Testimonial Info Style', 'ecofinecore'),
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
                'selector' => '{{WRAPPER}} .testimonial-v5-name',
            ]
        );
        $this->add_responsive_control(
            'testi_name_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v5-name' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-v5-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-v5-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .testimonial-information .share i',
            ]
        );
        $this->add_responsive_control(
            'rating_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-information .share i' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .testimonial-information .share' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-information .share i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'label' => esc_html__(' Content Style', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'eco_content_tabs'
        );

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
                'selector' => '{{WRAPPER}} .testimonial-v5-content',
            ]
        );
        $this->add_responsive_control(
            'testi_des_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v5-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-v5-content,{{WRAPPER}} .testimonial-v5-content:after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-v5-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'arrowbox_border',
                'label'    => esc_html__('Arow Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-v5-content:after',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-v5-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-v5-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .testimonial-v5-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'testi_des_tab_hover',
            [
                'label' => esc_html__('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'testi_des_color_h',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_backgrounds_h',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content,{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content:after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border_h',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'arrowbox_border_h',
                'label'    => esc_html__('Arow Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content:after',
            ]
        );
        $this->add_responsive_control(
            'box_border_radius_h',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-v5-item-box:hover .testimonial-v5-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
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
            if ($settings['arro_style_select'] == 'one') {
                $eco_title = 'eco-t-titles';
            } else {
                $eco_title = "";
            }
?>
            <script>
                jQuery(document).ready(function($) {
                    "use strict";
                    $('#testimonial-<?php echo esc_attr($_id); ?>').slick({
                        infinite: true,
                        speed: <?php echo json_encode($settings['eco_slider_speed']); ?>,
                        autoplay: <?php echo json_encode($settings['enable_slider_auto_loop'] == 'yes' ? true : false); ?>,
                        arrows: <?php echo json_encode($settings['eco_enable_arrows'] == 'yes' ? true : false); ?>,
                        dots: <?php echo json_encode($settings['eco_enable_dots'] == 'yes' ? true : false); ?>,
                        slidesToShow: <?php echo json_encode($settings['slid_show_item']); ?>,
                        rtl: <?php echo  json_encode(is_rtl() == 'yes' ? true : false); ?>,
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
            $row = 'row';
            $col =  'col-12 col-sm-12 ' . $settings['desktop_col'] . ' ' . $settings['ipadpro_col'] . ' ' . $settings['tab_col'] . '';
            $box = '';
        }
        ?>
        <div class="testi-v5-wrapper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="<?php echo esc_attr($row); ?>" id="testimonial-<?php echo esc_attr($_id); ?>">
                    <?php foreach ($settings['eco_repeater_list'] as $item) : ?>
                        <div class="<?php echo esc_attr($col); ?>">
                            <div class="testimonial-v5-item-box <?php echo esc_attr($box); ?>">
                                <div class="testimonial-v5-content">
                                    <?php echo esc_html($item['description']); ?>
                                </div>
                                <div class="testimonial-v5-info">
                                    <div class="image-wrap">
                                        <?php echo wp_get_attachment_image($item['image']['id'], 'full'); ?>
                                    </div>

                                    <div class="testimonial-information">
                                        <?php if ($item["elable_rating"] == 'yes') : ?>
                                            <div class="share">
                                                <?php echo $this->rating_render($item['testimonial_rating']['size']); ?>
                                            </div>
                                        <?php endif ?>
                                        <<?php echo esc_attr($settings['html_tag']); ?> class="testimonial-v5-name"><?php echo esc_html($item['name']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
                                        <div class="testimonial-designation"> <?php echo esc_html($item['designation']); ?></div>
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
Plugin::instance()->widgets_manager->register(new testomonial_five_widget);
