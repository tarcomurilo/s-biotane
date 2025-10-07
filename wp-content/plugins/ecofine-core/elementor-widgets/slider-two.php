<?php

namespace Elementor;

class eco_slider_two_Widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_slider_two';
    }

    public function get_title()
    {
        return esc_html__('Eco Slider V2', 'ecofinecore');
    }

    public function get_icon()
    {

        return 'eicon-slider-album';
    }

    public function get_categories()
    {
        return ['eco'];
    }

    protected function register_controls()
    {

        //Content tab start
        $this->start_controls_section(
            'slider_option',
            [
                'label' => esc_html__('Slider', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'enable_shape',
            [
                'label'        => esc_html__('Enable Background Shape', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label'   => esc_html__('Background Image', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'slide_subtitle',
            [
                'label'   => esc_html__('Small Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Donate To Contribution', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'div',
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
            'title',
            [
                'label'   => esc_html__('Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__(' Preserving the earth for future', 'ecofinecore'),
            ]
        );
        $repeater->add_control(
            'highlighttitle',
            [
                'label'   => esc_html__('Highlight Title', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('generations', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'enable_dec',
            [
                'label'        => esc_html__('Enable Description', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'des',
            [
                'label'   => esc_html__('Description', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__(' Description is the pattern of narrative development that aims to make vivid a place, object, character, or group. Description is one of four rhetorical modes, along with exposition, argumentation,', 'ecofinecore'),
                'condition' => [
                    'enable_dec' => 'yes',
                ],
                'rows'   =>     10,
            ]
        );
        $repeater->add_control(
            'enable_border_shape',
            [
                'label'        => esc_html__('Enable Border ', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'enable_button',
            [
                'label'        => esc_html__('Enable Button ', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'button_text',
            [
                'label'     => esc_html__('Button ', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__('Get Started', 'ecofinecore'),
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_link',
            [
                'label'       => esc_html__('Url', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ecofinecore'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'label_block' => true,
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                    'custom_attributes' => false,
                ],
                'condition'   => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'enable_video_button',
            [
                'label' => esc_html__('Enable Video Button', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'tronixcore'),
                'label_off' => esc_html__('Hide', 'tronixcore'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );
        $repeater->add_control(
            'video_button_text',
            [
                'label' => esc_html__('Text', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Watch Video', 'tronixcore'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'video_icon',
            [
                'label' => esc_html__('Icon', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'fa-solid',
                ],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'video_link',
            [
                'label' => __('Link', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'condition' => [
                    'enable_video_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'enable_slider_image',
            [
                'label'        => esc_html__('Enable Image ', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater->add_control(
            'slider_image',
            [
                'label' => __('Image', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'enable_slider_image' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sliders',
            [
                'label'       => esc_html__('Repeater List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => esc_html__('Donate To Contribution', 'ecofinecore'),
                        'list_content' => esc_html__('One important area of ecology is conservation biology, which focuses on protecting endangered species and ecosystems. .', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        //Start settings  options control
        $this->start_controls_section(
            'slider_options',
            [
                'label' => __('Slider Options', 'ecofinecore'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'eco_slider_arrow',
            [
                'label' => esc_html__('Enable Arrow Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'eco_slider_autoplay',
            [
                'label' => esc_html__('Enable autoplay', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'eco_slider_speed',
            [
                'label' => esc_html__('Slider Speed', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 500,
                'max' => 10000,
                'step' => 100,
                'default' => 5000,
            ]
        );
        $this->end_controls_section();

        // ====================================================
        // Slider Style css
        // ====================================================

        $this->start_controls_section(
            'home_slider_options',
            [
                'label' => __('Slider Options', 'ecofinecore'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_background_color',
            [
                'label' => esc_html__('Background Opacity', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-item-bg::after' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_height',
            [
                'label' => __('Slider Height (px)', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 300,
                        'max' => 1200,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-item-bg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_width',
            [
                'label' => __('Content Column Width (%)', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .eco-slider-column' => 'flex:0 0 {{SIZE}}%;max-width: {{SIZE}}%;',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_align',
            [
                'label'       => esc_html__('Content Align', 'ecofinecore'),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],

                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .slider-v2-item-bg .row' => 'justify-content: {{VALUE}};text-align: {{VALUE}};',
                    '{{WRAPPER}} .slider-v2-content-box' => 'justify-content: {{VALUE}};',
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
                    '{{WRAPPER}} .slider-v2-item-bg .row' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-v2-item-bg .row' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'background_line_shape',
            [
                'label' => esc_html__('Backgeound line Shape', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background_line_shape_bg',
                'label' => esc_html__('Background ', 'ecofinecore'),
                'types' => ['gradient'],
                'selector' => '{{WRAPPER}} .line1:before,{{WRAPPER}} .line2:before,{{WRAPPER}} .line3:before',
            ]
        );
        $this->add_responsive_control(
            'background_line_shape_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .line1:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .line2:before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .line3:before' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // =============================================//
        // ========= SLIDER CONTENT STYLE START ========//
        // =============================================//


        // Subtitle Style
        $this->start_controls_section(
            'content_style_options',
            [
                'label' => esc_html__('Content Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'small_title_style',
            [
                'label' => __('Small Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-2-stitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-2-stitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slide-2-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'subtitle_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slide-2-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'title_style_options',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-2-title ',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-2-title' => 'color: {{VALUE}};',

                ],
            ]
        );
        $this->add_control(
            'htitle_color',
            [
                'label'       => esc_html__('Highlight Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-2-title span',

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
                    '{{WRAPPER}} .slide-2-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slide-2-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'description_style_options',
            [
                'label' => __('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-2-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-2-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .slide-2-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slide-2-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'border_shape_style',
            [
                'label' => esc_html__('Border Shape Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->start_controls_tabs(
            'line_shape_tabs'
        );
        $this->start_controls_tab(
            'line_shape_tab',
            [
                'label' => __('Line', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'line_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                'selectors' => [
                    '{{WRAPPER}} .slider-line' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'line_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-line' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'line_bg_h',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .testimonial-item-box.testi-box:hover .slider-line',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'line_border_h',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .testimonial-item-box.testi-box:hover .slider-line',
            ]
        );
        $this->add_responsive_control(
            'line_redius_h',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .testimonial-item-box.testi-box:hover .slider-line' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'line_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-line' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'line_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-line' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'circle_shape_tab',
            [
                'label' => __('Circle', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'circle_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                    '{{WRAPPER}} .slider-line .ball' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::before' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::after' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'circle_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-line .ball' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::before' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'circle_bg_h',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .slider-line .ball,{{WRAPPER}} .slider-line::before,{{WRAPPER}} .slider-line:after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'circle_border_h',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slider-line .ball,{{WRAPPER}} .slider-line::before,{{WRAPPER}} .slider-line:after',
            ]
        );
        $this->add_responsive_control(
            'circle_redius_h',
            [
                'label'      => esc_html__('Border Redius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-line .ball' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'circle_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-line .ball' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line::before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .slider-line:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'circle_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-line .ball' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        // Start One Button section
        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__('Button CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'button_CSS_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.slider-2btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_CSS_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.slider-2btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'buttons_tabs'
        );
        $this->start_controls_tab(
            'buttons_tabs_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'buttons_Css_typos',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.slider-2btn' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'buttons_Css_nbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_nborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nradisu',
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
                    '{{WRAPPER}} .theme-btns.slider-2btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .theme-btns.slider-2btn:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_nshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'buttons_tabs_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hcolor',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.slider-2btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons__shape_Css_hbg',
            [
                'label' => esc_html__('Background Shape Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.slider-2btn:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'buttons_Css_hbg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn:hover',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hradisu',
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
                    '{{WRAPPER}} .theme-btns.slider-2btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_hshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.slider-2btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'video_button_style',
            [
                'label' => esc_html__('Video Button Style', 'tronixcore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'video_buttons_tabs'
        );
        $this->start_controls_tab(
            'video_button_normal_taba',
            [
                'label' => __('Normal', 'tronixcore'),
            ]
        );
        $this->add_responsive_control(
            'icon_height',
            [
                'label' => esc_html__('Height', 'tronixcore'),
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
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_width',
            [
                'label' => esc_html__('Width', 'tronixcore'),
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
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_btn_typos',
                'label' => esc_html__('Typography', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn',
            ]
        );
        $this->add_responsive_control(
            'video_btn_color',
            [
                'label' => esc_html__('Color', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'video_btn_bg_color',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border',
                'label' => esc_html__('Border', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn:before',
            ]
        );
        $this->add_responsive_control(
            'video_btn_radius',
            [
                'label' => esc_html__('Border Radius', 'tronixcore'),
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
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow',
                'label' => esc_html__('Shadow', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'video_btn_hover',
            [
                'label' => __('Hover', 'tronixcore'),
            ]
        );
        $this->add_responsive_control(
            'video_btn_color_hover',
            [
                'label' => esc_html__('Color', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'video_btn_bg_color_hover',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'video_btn_border_hover',
                'label' => esc_html__('Border', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn:before:hover',
            ]
        );
        $this->add_responsive_control(
            'video_btn_radius_hover',
            [
                'label' => esc_html__('Border Radius', 'tronixcore'),
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
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'video_btn_shadow_hover',
                'label' => esc_html__('Shadow', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn .play-btn:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_responsive_control(
            'margin_video_btn',
            [
                'label' => esc_html__('Margin', 'tronixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'padding_video_btn',
            [
                'label' => esc_html__('Padding', 'tronixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn .play-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'video_text_tabs'
        );
        $this->start_controls_tab(
            'video_text_taba',
            [
                'label' => __('Video Text Style', 'tronixcore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'video_text_typos',
                'label' => esc_html__('Typography', 'tronixcore'),
                'selector' => '{{WRAPPER}} .slider-v2-video-btn span',
            ]
        );
        $this->add_responsive_control(
            'video_text_color',
            [
                'label' => esc_html__('Color', 'tronixcore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'video_text_margin',
            [
                'label' => esc_html__('Margin', 'tronixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'videotext_padding',
            [
                'label' => esc_html__('Padding', 'tronixcore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-v2-video-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'Image Style',
            [
                'label' => esc_html__('Image Style', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'image_tabs'
        );
        $this->start_controls_tab(
            'image_tab',
            [
                'label' => esc_html__('Image', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'content_text_align',
            [
                'label'       => esc_html__('Content Align', 'ecofinecore'),
                'type'        => Controls_Manager::CHOOSE,
                'label_block' => false,

                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],

                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],

                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'selectors' => [
                    '{{WRAPPER}} .slider-two-image-item' => 'justify-content: {{VALUE}};',
                ],
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slider-two-image-item .slider-two-image img',
            ]
        );
        $this->add_responsive_control(
            'testi_image_border_color',
            [
                'label'     => esc_html__('Hover Border Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'border-color: {{VALUE}}',
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-two-image-item .slider-two-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'image_shape_tab',
            [
                'label' => esc_html__('Shape Style', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'shape_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .slider-two-image:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'shape_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slider-two-image:before',
            ]
        );
        $this->add_responsive_control(
            'shape_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-two-image:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'shape_heading',
            [
                'label' => esc_html__('Shape Two Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'shape2_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .slider-two-image:after',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'shape2_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slider-two-image:after',
            ]
        );
        $this->add_responsive_control(
            'shape2_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .slider-two-image:after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_arrow_css',
            [
                'label' => esc_html__('Arrow Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'arrow_tabs'
        );
        $this->start_controls_tab(
            'left_arrow_tab',
            [
                'label' => esc_html__('Arrow Style', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'arrow_typography',
                'selector' => '{{WRAPPER}} .eco-slider-two-wrapper .slick-arrow',
            ]
        );
        $this->add_responsive_control(
            'slider_arrow_width',
            [
                'label' => esc_html__('Arrow Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_arrow_height',
            [
                'label' => esc_html__('Arrow Hieght', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_arrow_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_arrow_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'left_arrow_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev',
            ]
        );
        $this->add_responsive_control(
            'left_arrow_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'right_arrow',
            [
                'label' => esc_html__('Hover Style', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'arrow_color_hover',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-next' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'arrow_background_hover',
                'label' => esc_html__('Background Hover', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-two-wrapper .slider-next',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'arrow_border_hover',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-slider-two-wrapper .slider-next',
            ]
        );
        $this->add_responsive_control(
            'arrow_border_radius_hvoer',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-two-wrapper .slider-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        ob_start();
        $SliderId = rand(1241, 3256);
?>
        <script>
            (function($) {
                "use strict";
                //Documnet Ready Function
                $(document).ready(function() {
                    // slider - active
                    function homeSlider() {
                        var SliderActive = $('#slider<?php echo esc_attr($SliderId) ?>');

                        SliderActive.slick({
                            slidesToShow: 1,
                            rtl: <?php echo json_encode(is_rtl() == 'yes' ? true : false); ?>,
                            autoplay: <?php echo json_encode($settings['eco_slider_autoplay'] == 'yes' ? true : false); ?>,
                            speed: 1000, // slide speed
                            autoplaySpeed: <?php echo json_encode($settings['eco_slider_speed']); ?>,
                            dots: false,
                            fade: true,
                            draggable: true,
                            pauseOnHover: false,
                            arrows: <?php echo json_encode($settings['eco_slider_arrow'] == 'yes' ? true : false); ?>,

                            prevArrow: $(".slider-v2-prev"),
                            nextArrow: $(".slider-v2-next"),
                            responsive: [{
                                    breakpoint: 992,
                                    settings: {
                                        arrows: false
                                    }
                                },
                                {
                                    breakpoint: 768,
                                    settings: {
                                        dots: false,
                                        arrows: false
                                    }
                                }
                            ]
                        });

                        function doAnimations(elements) {
                            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
                            elements.each(function() {
                                var $this = $(this);
                                var $animationDelay = $this.data('delay');
                                var $animationType = 'animated ' + $this.data('animation');
                                $this.css({
                                    'animation-delay': $animationDelay,
                                    '-webkit-animation-delay': $animationDelay
                                });
                                $this.addClass($animationType).one(animationEndEvents, function() {
                                    $this.removeClass($animationType);
                                });
                            });
                        }

                        SliderActive.on('init', function(e, slick) {
                            var $firstAnimatingElements = $('.slider-item:first-child').find('[data-animation]');
                            doAnimations($firstAnimatingElements);
                        });

                        SliderActive.on('beforeChange', function(e, slick, currentSlide, nextSlide) {
                            var $animatingElements = $('.slider-item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
                            doAnimations($animatingElements);
                        });
                    }
                    homeSlider();
                });
            })(jQuery);
        </script>
        <div class="eco-slider-two-wrapper">
            <div class="slider-items" id="slider<?php echo esc_attr($SliderId); ?>">
                <?php foreach ($settings['sliders'] as $item) : ?>
                    <div class="slider-item">
                        <div class="slider-v2-item-bg" style="background-image:url( <?php echo esc_url(wp_get_attachment_image_url($item['image']['id'], 'full')); ?> ) ">
                            <?php if ($item["enable_shape"] == 'yes') : ?>
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="line3"></div>
                            <?php endif; ?>
                            <div class="eco-table">
                                <div class="eco-table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="eco-slider-column col-xl-6 col-lg-7 col-md-12">
                                                <div class="slider-v2-content-box">
                                                    <?php if (!empty($item['slide_subtitle'])) : ?>
                                                        <div class="slide-2-stitle" data-animation="fadeInUp" data-delay=".5s"> <?php echo $item['slide_subtitle']; ?></div>
                                                    <?php endif; ?>
                                                    <<?php echo esc_attr($settings['html_tag']); ?> class="slide-2-title" data-animation="fadeInUp" data-delay="1s"> <?php echo $item['title']; ?> <span> <?php echo $item['highlighttitle']; ?> </span> </<?php echo esc_attr($settings['html_tag']); ?>>
                                                    <?php if ($item["enable_dec"] == 'yes') : ?>
                                                        <div class="slide-2-dec" data-animation="fadeInUp" data-delay="1.6s"> <?php echo $item['des']; ?> </div>
                                                    <?php endif; ?>
                                                    <?php if ($item["enable_border_shape"] == 'yes') : ?>
                                                        <div class="slider-line" data-animation="fadeInUp" data-delay="1.7s">
                                                            <div class="ball"></div>
                                                            <div class="ball"></div>
                                                            <div class="ball"></div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($item["enable_button"] == 'yes') : ?>
                                                        <div class="slider-v2-btn-area" data-animation="fadeInUp" data-delay="1.8s">
                                                            <?php if (!empty($item['button_text'])) :
                                                                $target = $item['button_link']['is_external'] ? ' target="_blank"' : '';
                                                                $nofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                            ?>
                                                                <a href="<?php echo esc_url($item['button_link']['url']) ?>" class="theme-btns slider-2btn" <?php echo  $target . $nofollow ?>> <span> <?php echo esc_html($item['button_text']) ?><i class="fas fa-angle-double-right"></i> </span></a>
                                                            <?php endif; ?>
                                                            <?php if (!empty($item['enable_video_button'])) :
                                                                if (!empty($item['video_link']['url'])) {
                                                                    $this->add_link_attributes('video_link', $item['video_link']);
                                                                } ?>
                                                                <div class="slider-v2-video-btn">
                                                                    <a <?php echo $this->get_render_attribute_string('video_link'); ?> class="play-btns" id="video-btn-<?php echo esc_attr($unique_id); ?>">
                                                                        <?php \Elementor\Icons_Manager::render_icon($item['video_icon'], ['aria-hidden' => 'true']); ?>
                                                                    </a>
                                                                    <span><?php echo esc_html($item['video_button_text']); ?></span>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php if (!empty($item['enable_slider_image'])) : ?>
                                                <div class="eco-slider-column col-xl-6 col-lg-5 col-md-12">
                                                    <div class="slider-two-image-item">
                                                        <div class="slider-two-image">
                                                            <?php echo wp_get_attachment_image($item['slider_image']['id'], 'full'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <?php if ($settings["eco_slider_arrow"] == 'yes') : ?>
                <div class="slider-v2-arrow-wrapper">
                    <button class="slider-v2-prev">Prev</button>
                    <button class="slider-v2-next">Next</button>
                </div>
            <?php endif ?>

        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_slider_two_Widget);
