<?php

namespace Elementor;

class eco_about_us_two_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'ecofinecore_about_us_three';
    }

    public function get_title()
    {
        return esc_html__('Eco About V3', 'ecofinecore');
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
            'ecofinecore_about_options',
            [
                'label' => esc_html__('About Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'stitle',
            [
                'label' => esc_html__('Small Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('ABOUT US in my organization', 'ecofinecore'),
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
                'default' => __('The true supporter of eco-', 'ecofinecore'),
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
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
        $this->add_control(
            'highilite_title',
            [
                'label' => esc_html__('Highlights Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('friendliness'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'content',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('Abandoned or Orphaned Street Children', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'skilbar_separator',
            [
                'label' => esc_html__('Skil Bar Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'skill_bar_enable',
            [
                'label' => esc_html__('Enable Skil Bar', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'skill_title',
            [
                'label'       => __('Title', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default'     => 'Problem Solving',
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'percent',
            [
                'label' => __('Percentage', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 80,
                ],
            ]
        );
        $this->add_control(
            'skills',
            [
                'label'       => __('Skill List', 'ecofinecore'),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'title'   => 'Problem Solving',
                        'percent' => 80
                    ],
                ],
                'title_field' => '{{{ title }}}',
                'condition' => [
                    'skill_bar_enable' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'icon_box_separator',
            [
                'label' => esc_html__('Icon Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_content_enable',
            [
                'label' => esc_html__('Enable Icon Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
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
            'icon_title',
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
        $this->add_control(
            'icon_list',
            [
                'label'       => esc_html__('List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'icon_title' => esc_html__('Children Fleeing Abuse or Violence', 'ecofinecore'),
                    ],
                    [
                        'icon_title' => esc_html__('Survival Street Children Poor', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ icon_title }}}',
                'condition' => [
                    'icon_content_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'about_buttom_separator',
            [
                'label' => esc_html__('About Buttom Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'enable_button',
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
            'button_text',
            [
                'label' => esc_html__('Button Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Explore more', 'ecofinecore'),
                'show_label' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'button_url',
            [
                'label' => esc_html__('Button Url', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'ecofinecore'),
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
                'condition' => [
                    'enable_button' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'enable_author_enable',
            [
                'label' => esc_html__('Enable Author Area', 'ecofinecore'),
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
                'label' => esc_html__('Author Image', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'enable_author_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'sin_image',
            [
                'label' => esc_html__('Signature', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'enable_author_enable' => 'yes',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_css_options',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
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
                'selector' => '{{WRAPPER}} .about-item .about-small-stitle',
            ]
        );
        $this->add_responsive_control(
            'stitle_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-item .about-small-stitle' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-item .about-small-stitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-item .about-small-stitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .about-item .about-v3-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-item .about-v3-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_color_highlight',
            [
                'label' => esc_html__('Highlight Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-item .about-v3-title span' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-item .about-v3-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-item .about-v3-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'des_tab',
            [
                'label' => __('Description', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'dec_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-des',
            ]
        );
        $this->add_responsive_control(
            'dec_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-des' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-v3-des' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-des' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // =======================================//
        // ======= START DESCRIPTION STYLE =======//
        // =======================================//

        $this->start_controls_section(
            'skill_content_css',
            [
                'label' => esc_html__('Skill Bar', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'skill_bar_enable' => 'yes',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_box_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
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
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_alignment',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'skill_number_align',
            [
                'label' => __('Number Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-long-arrow-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors_dictionary' => [
                    'left'  => 'left: 0;right:auto',
                    'right' => 'right:0',
                ],
                'selectors' => [
                    '{{WRAPPER}} .skillbar .skill-percent-count-wrap' => '{{VALUE}}',
                ],
                'condition' => [
                    'alignment' => 'right',
                ],
            ]
        );

        $this->start_controls_tabs(
            'skill_content_tab'
        );
        $this->start_controls_tab(
            'skill_title_tab',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'skill_title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}}  .skill-title',
            ]
        );
        $this->add_responsive_control(
            'skill_title_color',
            [
                'label' => esc_html__('Title Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_title_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skill-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_title_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skill-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'skill_progress_tab',
            [
                'label' => __('Progress Bar', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'note1',
            [
                'label' => __('Active Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'skill_active_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .skillbar .count-bar',
            ]
        );

        $this->add_control(
            'note2',
            [
                'label' => __('Background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'skill_progress_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .skillbar-item .skillbar',
            ]
        );
        $this->add_responsive_control(
            'skill_progress_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item .skillbar' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_progress_border',
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
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item .skillbar' => 'border-radius: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item .skillbar .count-bar' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'skill_number_tab',
            [
                'label' => __('Number', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'skill_number_color',
            [
                'label' => esc_html__('Number Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skillbar-item .skillbar .skill-percent-count-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'skill_number_tyoo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .skillbar-item .skillbar .skill-percent-count-wrap',
            ]
        );
        $this->add_responsive_control(
            'skill_number_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skillbar-item .skillbar .skill-percent-count-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'skill_number_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skillbar-item .skillbar .skill-percent-count-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        //======================================================//
        //=========== Inner Box STYLE START===========//
        //====================================================//



        // --------- Inner Box content  --------

        $this->start_controls_section(
            'inner_box_content',
            [
                'label' => esc_html__('Ion Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'icon_content_enable' => 'yes',
                ],
            ]
        );
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'icon_tab_normal',
            [
                'label' => __('Icon', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'icon_size',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-icon',
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
                    '{{WRAPPER}} .about-v3-icon' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-icon' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'icon_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-icon' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .about-v3-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'title_tabs',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'inner_title_typo',
                'label'    => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-icon-text',
            ]
        );
        $this->add_responsive_control(
            'title_colors',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-icon-text' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_margins',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-icon-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'title_paddings',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-icon-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        //======================================//
        //======= Button Style css ============//
        //====================================//

        $this->start_controls_section(
            'button_CSS_options',
            [
                'label' => esc_html__('Button CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'button_content_tabs'
        );
        $this->start_controls_tab(
            'button_normal',
            [
                'label' => __('Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography',
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_alignment',
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

                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-btn' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover',
            [
                'label' => __('Hover', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'border_text_typography_hover',
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns:hover',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_background_hover',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns:before',
            ]
        );
        $this->add_responsive_control(
            'button_color_hover',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_border_radius_hover',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-btn .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-v3-btn .theme-btns:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'image_CSS_options',
            [
                'label' => esc_html__('Author Image Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,

            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        $this->start_controls_tab(
            'main_Image',
            [
                'label' => esc_html__('Author Image', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'Image_height',
            [
                'label' => esc_html__('image Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-img img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_width',
            [
                'label' => esc_html__('Image Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-img img' => 'width: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .about-v3-autohr-img img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_margin_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .about-image ivideo-v4-grid-image .video-v4-small-two,{{WRAPPER}} .about-image ivideo-v4-grid-image .video-v4-small-one img',
            ]
        );
        $this->add_responsive_control(
            'image_margin_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .about-v3-autohr-img img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-img img ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'image_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-img img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'small_Image',
            [
                'label' => esc_html__('Signature', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'small_Image_height',
            [
                'label' => esc_html__('image Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-sin img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_width',
            [
                'label' => esc_html__('Image Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-sin img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_object',
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
                    '{{WRAPPER}} .about-v3-autohr-sin img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-sin' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'small_image_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .about-v3-autohr-sin' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
?>
        <?php if ($settings['skill_bar_enable'] == 'yes') : ?>
            <script>
                (function($) {
                    "use strict";
                    $(document).ready(function() {
                        $(".about-skillbar").each(function() {
                            $(this).appear(function() {
                                $(this).find(".count-bar").animate({
                                    width: $(this).attr("data-percent")
                                }, 3000);
                            });
                        });

                        $(".skill-count").counterUp({
                            delay: 10,
                            time: 3000
                        });
                    });
                })(jQuery);
            </script>
        <?php endif ?>
        <div class="about-section-wraper about-three">
            <div class="container">
                <div class="about_content">
                    <div class="about-item">
                        <?php if (!empty($settings['stitle'])) : ?>
                            <<?php echo esc_attr($settings['stitle_html_tag']); ?> class="about-small-stitle"> <?php echo esc_html($settings['stitle']); ?> </<?php echo esc_attr($settings['stitle_html_tag']); ?>>
                        <?php endif ?>
                        <?php if (!empty($settings['title'])) : ?>
                            <<?php echo esc_attr($settings['html_tag']); ?> class="about-v3-title"> <?php echo esc_html($settings['title']); ?> <span> <?php echo esc_html($settings['highilite_title']); ?> </span> </<?php echo esc_attr($settings['html_tag']); ?>>
                        <?php endif ?>
                        <?php if (!empty($settings['content'])) : ?>
                            <div class="about-v3-des"> <?php echo esc_html($settings['content']); ?> </div>
                        <?php endif ?>
                    </div>
                    <?php if ($settings['skill_bar_enable'] == 'yes') : ?>
                        <div class="eco-skills-wrapper">
                            <?php if ($settings['skills']) : ?>
                                <?php foreach ($settings['skills'] as $skill) : ?>
                                    <div class="skillbar-item">
                                        <?php if (!empty($skill['skill_title'])) : ?>
                                            <div class="skill-title skill-t-2"><?php echo esc_html($skill['skill_title']); ?></div>
                                        <?php endif; ?>
                                        <div class="skillbar about-skillbar" data-percent="<?php echo esc_attr($skill['percent']['size']); ?>%">
                                            <div class="skill-percent-count-wrap">
                                                <span class="skill-percent-count"><?php echo esc_html($skill['percent']['size']); ?></span>%
                                            </div>
                                            <div class="count-bar"></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif ?>
                    <div class="about-three-items">
                        <?php if ($settings['icon_content_enable'] == 'yes') : ?>
                            <?php foreach ($settings['icon_list'] as $iconTitle) : ?>
                                <div class=" about-v3-icon-area">
                                    <div class="about-v3-icon">
                                        <?php \Elementor\Icons_Manager::render_icon($iconTitle['icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                    <div class="about-v3-icon-text"> <?php echo esc_html($iconTitle['icon_title']); ?></div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif ?>
                        <div class="about-v3-buttom-area">
                            <?php if ($settings['enable_button'] == 'yes') :
                                if (!empty($settings['button_url']['url'])) {
                                    $this->add_link_attributes('button_url', $settings['button_url']);
                                } ?>
                                <div class="about-v3-btn">
                                    <a <?php echo $this->get_render_attribute_string('button_url'); ?> class=" theme-btns"><span> <?php echo esc_html($settings['button_text']); ?> <i class="fas fa-angle-double-right"></i></span></a>
                                </div>
                            <?php endif ?>
                            <?php if ('yes' == $settings['enable_author_enable']) : ?>
                                <div class="about-v3-autohr-area">
                                    <div class="about-v3-autohr-img"> <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?> </div>
                                    <div class="about-v3-autohr-sin"> <?php echo wp_get_attachment_image($settings['sin_image']['id'], 'full'); ?> </div>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_about_us_two_Widget);
