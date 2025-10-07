<?php

namespace Elementor;

class eco_slider_Widget extends Widget_Base
{

    public function get_name()
    {

        return 'eco_slider';
    }

    public function get_title()
    {
        return esc_html__('Eco Slider', 'ecofinecore');
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
            'image',
            [
                'label'   => esc_html__('Background Image', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_responsive_control(
            'image_background_color',
            [
                'label' => esc_html__('Background Opacity', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-item:after' => 'background-color: {{VALUE}}',
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
            'slider_title_tag',
            [
                'label' => esc_html__('HTML Tag', 'ecofinecore'),
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
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__(' Small Efforts Make Big Change', 'ecofinecore'),
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
            'enable_button_two',
            [
                'label'        => esc_html__('Enable Button Two', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
                'condition'   => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_text_two',
            [
                'label'     => esc_html__('Button ', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__('Get Started', 'ecofinecore'),
                'condition' => [
                    'enable_button' => 'yes',
                    'enable_button_two' => 'yes',
                ],
            ]
        );
        $repeater->add_control(
            'button_link_two',
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
                    'enable_button_two' => 'yes',
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
        $this->add_control(
            'enable_social_media',
            [
                'label'        => esc_html__('Enable Social Media', 'ecofinecore'),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Show', 'ecofinecore'),
                'label_off'    => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default'      => 'yes',
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'social_text',
            [
                'label'     => esc_html__('Social Media Name ', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => esc_html__('Get Started', 'ecofinecore'),

            ]
        );
        $repeater->add_control(
            'social_midia_link',
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
            ]
        );
        $this->add_control(
            'social_media',
            [
                'label'       => esc_html__('Social Media List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'social_text' => esc_html__('Facebooki', 'ecofinecore'),
                        'social_midia_link' => esc_html__('#', 'ecofinecore'),

                    ],
                ],
                'title_field' => '{{{ social_text }}}',
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
            'eco_enable_dots',
            [
                'label' => esc_html__('Enable Dots Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
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
                    '{{WRAPPER}} .slider-item-bg::after' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .slider-item-bg' => 'height: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-item-bg .row' => 'justify-content: {{VALUE}};text-align: {{VALUE}};',
                    '{{WRAPPER}} .slider-content-box' => 'justify-content: {{VALUE}};',
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
                    '{{WRAPPER}} .slider-content-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slider-content-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // =============================================//
        // ========= SLIDER CONTENT STYLE START ========//
        // =============================================//


        // Subtitle Style
        $this->start_controls_section(
            'subtitle_style_options',
            [
                'label' => esc_html__('Subtitle', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-stitle',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-stitle' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slide-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();


        // Title Style
        $this->start_controls_section(
            'title_style_options',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => __('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-title ',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-title p,{{WRAPPER}} .slide-title,
                    {{WRAPPER}} .slide-title strong' => 'color: {{VALUE}};',

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
                    '{{WRAPPER}} .slide-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slide-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'hero_options',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slide-dec',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slide-dec' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .slide-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .slide-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
                    '{{WRAPPER}} .theme-btns.style-one' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .theme-btns.style-one' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .theme-btns.style-one',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_ncolor',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-one' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_nbg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-one' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_nborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-one',
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
                    '{{WRAPPER}} .theme-btns.style-one' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .theme-btns.style-one:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_nshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-one',
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
                    '{{WRAPPER}} .theme-btns.style-one:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons__shape_Css_hbg',
            [
                'label' => esc_html__('Background Shape Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-one:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hbg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-one:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-one:hover',
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
                    '{{WRAPPER}} .theme-btns.style-one:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_hshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-one:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ---------------- Button Style Two --------------

        $this->start_controls_section(
            'button_CSS_options_two',
            [
                'label' => esc_html__('Button Two CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->add_responsive_control(
            'button_CSS_margin_two',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_CSS_padding_two',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'buttons_tabs_two'
        );
        $this->start_controls_tab(
            'buttons_tabs_normal_two',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'buttons_Css_typo_two',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-two',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_color_two',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_bg_two',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_Css_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-two',
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_radisu',
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
                    '{{WRAPPER}} .theme-btns.style-two' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .theme-btns.style-two:before' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_Css_shadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-two',
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'buttons_two_tabs_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'buttons_Css_hover_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_two_shape_Css_hbg',
            [
                'label' => esc_html__('Background Shape Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'buttons_two_Css_hbg',
            [
                'label' => esc_html__('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .theme-btns.style-two:before' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'buttons_two_Css_hborder',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns.style-two:hover',
            ]
        );
        $this->add_responsive_control(
            'buttons_two_Css_hradisu',
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
                    '{{WRAPPER}} .theme-btns.style-two:hover' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'buttons_two_Css_hshadow',
                'label' => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .theme-btns:hover',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // ========================================================
        // =============== Social Media Style Css =================
        // ========================================================

        $this->start_controls_section(
            'social_option_css',
            [
                'label' => esc_html__('Social Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'social_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .slider-social-area ul li a',
            ]
        );
        $this->add_responsive_control(
            'social_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-social-area ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_color_hover',
            [
                'label' => esc_html__('Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-social-area ul li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-social-area ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .slider-social-area ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'slider_arrow_css',
            [
                'label' => esc_html__('Arrow Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'arrow_typography',
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slick-arrow',
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
                    '{{WRAPPER}} .eco-slider-wrapper .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-slider-wrapper .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'arrow_tabs'
        );
        $this->start_controls_tab(
            'left_arrow_tab',
            [
                'label' => esc_html__('Left Arrow Style', 'ecofinecore'),
            ]
        );

        $this->add_responsive_control(
            'left_arrow_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-prev' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'left_arrow_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-prev:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'left_arrow_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-prev',
            ]
        );
        $this->add_control(
            'left_arrow_bg_hover',
            [
                'label' => esc_html__('Backgeound Hover Color', 'ecofinecore'),
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
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-prev:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'left_arrow_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-prev',
            ]
        );
        $this->add_responsive_control(
            'left_arrow_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-slider-wrapper .slider-prev' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-slider-wrapper .slider-prev' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'right_arrow',
            [
                'label' => esc_html__('Right Arrow Style', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'right_arrow_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-next' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'right_arrow_color_hover',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-next' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'right_arrow_background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-next',
            ]
        );
        $this->add_control(
            'right_arrow_bg_hover',
            [
                'label' => esc_html__('Backgeound Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'right_arrow_background_hover',
                'label' => esc_html__('Background Hover', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-next',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'rightarrow_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slider-next',
            ]
        );
        $this->add_responsive_control(
            'right_arrow_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'right_arrow_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-next' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'right_arrow_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slider-next' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_dote_css',
            [
                'label' => esc_html__('Dote Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slider_dote_width',
            [
                'label' => esc_html__('Dote Width', 'ecofinecore'),
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
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'slider_dote_height',
            [
                'label' => esc_html__('Dote Hieght', 'ecofinecore'),
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
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'Date_background',
                'label' => esc_html__('Background ', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button',
            ]
        );
        $this->add_responsive_control(
            'active_background_color',
            [
                'label' => esc_html__('Active Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li.slick-active button' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'Dote_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button',
            ]
        );
        $this->add_responsive_control(
            'dote_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_Margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'dote_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-slider-wrapper .slick-dots li button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
                            dots: true,
                            fade: true,
                            draggable: true,
                            pauseOnHover: false,
                            arrows: <?php echo json_encode($settings['eco_slider_arrow'] == 'yes' ? true : false); ?>,

                            prevArrow: $(".slider-prev"),
                            nextArrow: $(".slider-next"),
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
        <div class="eco-slider-wrapper">
            <div class="slider-area">
                <div class="slider-items" id="slider<?php echo esc_attr($SliderId); ?>">
                    <?php foreach ($settings['sliders'] as $item) : ?>
                        <div class="slider-item">
                            <div class="slider-item-bg" style="background-image:url( <?php echo esc_url(wp_get_attachment_image_url($item['image']['id'], 'full')); ?> ) ">
                                <div class="eco-table">
                                    <div class="eco-table-cell">
                                        <div class="container">
                                            <div class="row">
                                                <div class="eco-slider-column col-xl-7 col-lg-8 col-md-11">
                                                    <div class="slider-content-box">
                                                        <?php if (!empty($item['slide_subtitle'])) : ?>
                                                            <div class="slide-stitle" data-animation="fadeInUp" data-delay=".5s"> <?php echo $item['slide_subtitle']; ?></div>
                                                        <?php endif; ?>
                                                        <<?php echo esc_attr($settings['slider_title_tag']); ?> class="slide-title" data-animation="fadeInUp" data-delay="1s">
                                                            <?php echo $item['title']; ?>
                                                        </<?php echo esc_attr($settings['slider_title_tag']); ?>>
                                                        <?php if ($item["enable_dec"] == 'yes') : ?>
                                                            <div class="slide-dec" data-animation="fadeInUp" data-delay="1.6s"> <?php echo $item['des']; ?> </div>
                                                        <?php endif; ?>

                                                        <?php if ($item["enable_button"] == 'yes') : ?>
                                                            <div class="settings-button-wrapper" data-animation="fadeInUp" data-delay="1.8s">
                                                                <?php if (!empty($item['button_text'])) :
                                                                    $target = $item['button_link']['is_external'] ? ' target="_blank"' : '';
                                                                    $nofollow = $item['button_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                    <a href="<?php echo esc_url($item['button_link']['url']) ?>" class="theme-btns style-one" <?php echo  $target . $nofollow ?>> <span> <?php echo esc_html($item['button_text']) ?><i class="fas fa-angle-double-right"></i> </span></a>
                                                                <?php endif; ?>
                                                                <?php if (!empty($item['button_text_two'])) :
                                                                    $target = $item['button_link_two']['is_external'] ? ' target="_blank"' : '';
                                                                    $nofollow = $item['button_link_two']['nofollow'] ? ' rel="nofollow"' : '';
                                                                ?>
                                                                    <a href="<?php echo esc_url($item['button_link_two']['url']) ?>" class="theme-btns style-two" <?php echo  $target . $nofollow ?>> <span> <?php echo esc_html($item['button_text_two']) ?><i class="fas fa-angle-double-right"></i> </span></a>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <?php if ($settings["enable_social_media"] == 'yes') : ?>
                <div class="slider-social-area">
                    <ul>
                        <?php foreach ($settings['social_media'] as $social) : ?>
                            <li>
                                <?php if (!empty($social['social_text'])) {
                                    $target = $social['social_midia_link']['is_external'] ? ' target="_blank"' : '';
                                    $nofollow = $social['social_midia_link']['nofollow'] ? ' rel="nofollow"' : '';
                                } ?>
                                <a href="<?php echo esc_url($social['social_midia_link']['url']) ?>" <?php echo  $target . $nofollow ?>> <?php echo esc_html($social['social_text']) ?> </a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
            <?php if ($settings["eco_slider_arrow"] == 'yes') : ?>
                <div class="slider-arrow-wrapper">
                    <button class="slider-prev"><i class="bi bi-arrow-left"></i></button>
                    <button class="slider-next"><i class="bi bi-arrow-right"></i></button>
                </div>
            <?php endif ?>

        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_slider_Widget);
