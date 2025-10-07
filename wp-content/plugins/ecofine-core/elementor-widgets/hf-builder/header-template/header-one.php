<?php

namespace Elementor;

class eco_header_template_one extends Widget_Base
{

    public function get_name()
    {
        return 'eco-header_one';
    }

    public function get_title()
    {
        return esc_html__('Eco Header One', 'ecofinecore');
    }

    public function get_icon()
    {
        return 'eicon-shape';
    }

    public function get_categories()
    {
        return ['ecofinecore'];
    }

    private function get_available_menus()
    {
        $menus = wp_get_nav_menus();
        $options = [];
        foreach ($menus as $menu) {
            $options[$menu->slug] = $menu->name;
        }

        return $options;
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'header_top_bar',
            [
                'label' => esc_html__('Header Top Bar', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'top_header_enable',
            [
                'label' => esc_html__('Enable Top Header', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->start_controls_tabs(
            'header_top_tabs',
        );
        $this->start_controls_tab(
            'top_left_content',
            [
                'label'     => esc_html__('Top Left', 'restlycore'),
                'condition' => [
                    'top_header_enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'promotion_icon',
            [
                'label' => esc_html__('Icon', 'restlycore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->add_control(
            'promotion_text',
            [
                'label' => esc_html__('Text', 'ecofinecore'),
                'type'        => Controls_Manager::TEXTAREA,
                'default' => esc_html__('It will be used for advertising on the website', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'header_top_right_content',
            [
                'label'     => esc_html__('Top Right', 'restlycore'),
                'condition' => [
                    'top_header_enable' => 'yes',
                ],
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'top_contact_icon',
            [
                'label'   => esc_html__('Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fas fa-map-marker-alt',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'top_list_content',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'type'        => Controls_Manager::TEXTAREA,
                'default' => esc_html__('New York 20235, United States Of America', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'top_list',
            [
                'label' => esc_html__('Repeater List', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'top_list_content' => esc_html__('(629) 555-0129', 'ecofinecore'),
                    ],
                    [
                        'top_list_content' => esc_html__('info@example.com', 'ecofinecore'),
                    ],
                    [
                        'top_list_content' => esc_html__('6391 Elgin. Celina, 10299', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ top_list_content }}}',
            ]
        );
        $this->add_control(
            'top_header_social_options',
            [
                'label' => esc_html__('Social Item', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'top_social_label',
            [
                'label' => esc_html__('Label', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__('Follow On', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'top_social_icon',
            [
                'label' => esc_html__('Social Icon', 'restlycore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'top_social_link',
            [
                'label'       => esc_html__('Link', 'restlycore'),
                'type'        => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'restlycore'),
                'options'     => ['url', 'is_external', 'nofollow'],
                'default'     => [
                    'url'         => '',
                    'is_external' => true,
                    'nofollow'    => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'top_social_list',
            [
                'label'     => esc_html__('Social List', 'restlycore'),
                'type'      => \Elementor\Controls_Manager::REPEATER,
                'fields'    => $repeater->get_controls(),
                'default'   => [
                    [
                        'top_social_label' => esc_html__('Facebook', 'restlycore'),
                    ],
                    [
                        'top_social_label' => esc_html__('Twitter', 'restlycore'),
                    ],
                    [
                        'top_social_label' => esc_html__('Instagram', 'restlycore'),
                    ],
                ],
                'title_field' => '{{{ top_social_label }}}',
                'condition' => [
                    'top_header_enable' => 'yes',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'logo_settings',
            [
                'label' => esc_html__('Menu & Logo', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'logo_select',
            [
                'label' => esc_html__('Select Logo', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Default', 'ecofinecore'),
                    'cunstom' => esc_html__('Coustom Logo', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'logo',
            [
                'label'       => __('Logo', 'ecofinecore'),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'logo_select' => 'cunstom',
                ],
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'mobile_logo_select',
            [
                'label' => esc_html__('Select Mobile Logo', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Default', 'ecofinecore'),
                    'cunstom' => esc_html__('Coustom Logo', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'mobile_logo',
            [
                'label'       => __('Logo', 'ecofinecore'),
                'type'        => Controls_Manager::MEDIA,
                'label_block' => true,
                'condition' => [
                    'mobile_logo_select' => 'cunstom',
                ],
                'default'     => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'mobile_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .ot-menu-wrapper .mobile-logo',
            ]
        );

        $menus = $this->get_available_menus();

        if (!empty($menus)) {
            $this->add_control(
                'menu_select',
                [
                    'label' => __('Menu', 'ecofinecore'),
                    'type' => Controls_Manager::SELECT,
                    'options' => $menus,
                    'default' => array_keys($menus)[0],
                    'save_default' => true,
                    'separator' => 'after',
                    'description' => sprintf(__('Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'ecofinecore'), admin_url('nav-menus.php')),
                ]
            );
        } else {
            $this->add_control(
                'menu_select',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<strong>' . __('There are no menus in your site.', 'ecofinecore') . '</strong><br>' . sprintf(__('Go to the <a href="%s" target="_blank">Menus screen</a> to create five.', 'ecofinecore'), admin_url('nav-menus.php?action=edit&menu=0')),
                    'separator' => 'after',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                ]
            );
        }

        $this->add_control(
            'enable_sticky',
            [
                'label' => esc_html__('Enable Sticky Menu', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_responsive_control(
            'sticky_bg',
            [
                'label' => esc_html__('Sticky Background', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .menu-area.sticky' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'enable_sticky' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'header_buttons',
            [
                'label' => esc_html__('Buttons Arrea', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'button_Text',
            [
                'label' => esc_html__('Button Text', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Get Started', 'ecofinecore'),
                'label_block' => true,
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => esc_html__('Button Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // ----------- Header Top Style Start ----------------

        $this->start_controls_section(
            'header_top_style',
            [
                'label' => esc_html__('Header Top Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'top_bg_color',
            [
                'label'       => esc_html__('Background Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-one .header-top' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'top_bg_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-one .header-top',
            ]
        );
        $this->add_responsive_control(
            'top_header_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-one .header-top' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_header_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-one .header-top' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'header_top_style_tabs'
        );
        $this->start_controls_tab(
            'top_header_left_content_style',
            [
                'label' => esc_html__('Left Content', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'top_contact_icon_gap',
            [
                'label' => esc_html__('Gap', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .promostion-test i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_contact_typo',
                'selector' => '{{WRAPPER}} .promostion-test',
            ]
        );
        $this->add_responsive_control(
            'text_color',
            [
                'label'       => esc_html__('Text Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .promostion-test' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promostion-test' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .promostion-test' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'top_right_content_tab',
            [
                'label' => esc_html__('Right Content', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'top_right_content_icon_gap',
            [
                'label' => esc_html__('Icon Gap', 'ecofinecore'),
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
                    '{{WRAPPER}} .header-links li i' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_right_content_gap',
            [
                'label' => esc_html__('Content Gap', 'ecofinecore'),
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
                    '{{WRAPPER}} .header-links li' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_right_content_icon_color',
            [
                'label'       => esc_html__('Icon Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-links li i' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_right_content_typo',
                'selector' => '{{WRAPPER}} .header-links li',
            ]
        );
        $this->add_responsive_control(
            'top_right_content_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-links li' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'top_social_icon_style',
            [
                'label' => esc_html__('Social Icon', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'top_social_icon_gap',
            [
                'label' => esc_html__('Icon Gap', 'ecofinecore'),
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
                    '{{WRAPPER}} .header-social a:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_social_icon_typo',
                'selector' => '{{WRAPPER}} .header-social a',
            ]
        );
        $this->add_responsive_control(
            'top_social_icon_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-social a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'social_icon_color_hover',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-social a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'social_label_style',
            [
                'label'     => esc_html__('social Label Style', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_social_label_typo',
                'selector' => '{{WRAPPER}} .header-social .social-title',
            ]
        );
        $this->add_responsive_control(
            'top_social_label_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-social .social-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'top_social_label_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-social .social-title',
            ]
        );
        $this->add_responsive_control(
            'top_social_label_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-social .social-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_social_label_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-social .social-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
        $this->start_controls_section(
            'logo_style',
            [
                'label' => esc_html__(' Logo Style ', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'logo_width',
            [
                'label' => esc_html__('Logo Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'condition' => [
                    'logo_select' => 'cunstom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-logo img' => 'width: {{SIZE}}px;max-width: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'logo_height',
            [
                'label' => esc_html__('Logo Height', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'condition' => [
                    'logo_select' => 'cunstom',
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],

                'selectors' => [
                    '{{WRAPPER}} .header-logo img' => 'height: {{SIZE}}px;height-width: {{SIZE}}px;',
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
                'condition' => [
                    'logo_select' => 'cunstom',
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-logo a img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'logo_typography',
                'selector' => '{{WRAPPER}} .header-logo a',
            ]
        );
        $this->add_responsive_control(
            'logo_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-logo a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'header_logo_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'header_logo_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'menu_css_options',
            [
                'label' => esc_html__(' Menu Style ', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'menu_box_style',
            [
                'label' => esc_html__('menu Box Style', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'menu_box_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .header-four .menu-area',
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-four .menu-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'menu_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-four .menu-area',
            ]
        );
        $this->add_responsive_control(
            'menu_box_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-four .menu-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_box_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-four .menu-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'menu_style_tabs'
        );
        $this->start_controls_tab(
            'main_menu_tab',
            [
                'label' => esc_html__('Main Menu', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'menu_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'menu_hcolor',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'menu_typo',
                'selector' => '{{WRAPPER}} .main-menu>ul>li>a',
            ]
        );
        $this->add_responsive_control(
            'menu_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'menu_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'sub_menu_tab',
            [
                'label' => esc_html__('Sub Menu', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'submenu_typo',
                'selector' => '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a',
            ]
        );
        $this->add_responsive_control(
            'submenu_width',
            [
                'label'      => esc_html__('Min Width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 300,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a' => 'min-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_hcolor',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_bg',
            [
                'label'     => esc_html__('background', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_hbg',
            [
                'label'     => esc_html__('Hover Background', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_border',
            [
                'label'     => esc_html__('Border Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul.sub-menu li' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_align',
            [
                'label'     => esc_html__('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul.sub-menu li' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'submenu_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu li.no-mega ul.sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'mega_menu_tab',
            [
                'label' => esc_html__('Mega Menu', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'mega_typo',
                'selector' => '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a',
            ]
        );
        $this->add_responsive_control(
            'mega_width',
            [
                'label'      => esc_html__('Box Width', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 1600,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default'    => [
                    'unit' => 'px',
                    'size' => 1320,
                ],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu>ul>li.mega>ul' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_align',
            [
                'label'     => esc_html__('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => esc_html__('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'  => [
                        'title' => esc_html__('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_bg',
            [
                'label'     => esc_html__('Box bg', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu>ul>li.mega>ul' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_hcolor',
            [
                'label'     => esc_html__('Hover Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mega_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .main-menu li.mega ul.sub-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'mega_top',
            [
                'label'     => esc_html__('Mega Hadding', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'mega_hadding_typo',
                'selector' => '{{WRAPPER}} .main-menu ul li.mega > ul > li > a',
            ]
        );
        $this->add_responsive_control(
            'mega_hadding_color',
            [
                'label'     => esc_html__('Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li.mega > ul > li > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mega_hadding_border_color',
            [
                'label'     => esc_html__('border Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .main-menu ul li.mega > ul > li > a' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();



        $this->start_controls_section(
            'mobile_menu_settings',
            [
                'label' => esc_html__('Mobile Menu', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_bg',
            [
                'label' => esc_html__('background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .ot-menu-area' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mobile_menu_main_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}}  .ot-menu-wrapper .ot-menu-area',
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .ot-menu-area' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_main_two_bg',
            [
                'label' => esc_html__('background Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .ot-menu-area' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'mobile_menu_main_two_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}}  .ot-menu-wrapper .ot-menu-area',
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_max_main_width',
            [
                'label' => esc_html__('Max Width', 'ecofinecore'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 800,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .ot-menu-area' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs(
            'mobile_meni_tabs'
        );

        $this->start_controls_tab(
            'mobile_menu_icon_tab',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_icon_size',
                'selector' => '{{WRAPPER}} .ot-menu-toggle',
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_color',
            [
                'label' => esc_html__('Icon Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_hcolor',
            [
                'label' => esc_html__('Icon Hover Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_bg',
            [
                'label' => esc_html__('background', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_hbg',
            [
                'label' => esc_html__('Hover background', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'mobile_menu_logo_tab',
            [
                'label' => esc_html__('Logo', 'ecofinecore'),
            ]
        );

        $this->add_responsive_control(
            'mobile_logo_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
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
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .mobile-logo img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'mobile_logo_bg',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .ot-menu-wrapper .mobile-logo',
            ]
        );

        $this->add_responsive_control(
            'mobile_menu_align',
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
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .mobile-logo' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_logo_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .mobile-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_logo_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-menu-wrapper .mobile-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'mobile_menu_tab',
            [
                'label' => esc_html__('menu', 'ecofinecore'),
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_menu_typo',
                'selector' => '{{WRAPPER}} .ot-mobile-menu ul li a',
            ]
        );

        $this->add_responsive_control(
            'mobile-menu_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul li a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_menu_active',
            [
                'label' => esc_html__('Active Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul li.ot-active>a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_menu_border_color',
            [
                'label' => esc_html__('Border Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul li' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'mobile_menu_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_menu_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'mobile_menu_arrow_note',
            [
                'label' => esc_html__('Arrow Icon Options', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mobile_menu_arrow_typo',
                'selector' => '{{WRAPPER}} .ot-mobile-menu ul .ot-item-has-children>a .ot-mean-expand',
            ]
        );

        $this->add_responsive_control(
            'mobile_arrow_color',
            [
                'label' => esc_html__(' Icon Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul .ot-item-has-children>a .ot-mean-expand' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'mobile_arrow_icon_bg',
            [
                'label' => esc_html__('Text Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ot-mobile-menu ul .ot-item-has-children>a .ot-mean-expand' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'button_css_options',
            [
                'label' => esc_html__('Button', 'ecofinecore'),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'button_tabs'
        );

        $this->start_controls_tab(
            'button_normar_tab',
            [
                'label' => esc_html__('Normal', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'button_typo',
                'selector' => '{{WRAPPER}} .header-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_color',
            [
                'label'     => esc_html__(' Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-button .theme-btns' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_bg',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header-button .theme-btns',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'selector' => '{{WRAPPER}} .header-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_radius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-button .theme-btns' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_shadow',
                'selector' => '{{WRAPPER}} .header-button .theme-btns',
            ]
        );
        $this->add_responsive_control(
            'button_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-button .theme-btns' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_box_padding',
            [
                'label'      => esc_html__('Padding', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-button .theme-btns' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_hover_tab',
            [
                'label' => esc_html__('Hover', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'button_hcolor',
            [
                'label'     => esc_html__(' Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-button .theme-btns:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'button_hbg',
                'types'    => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .header-button .theme-btns:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'button_hborder',
                'selector' => '{{WRAPPER}} .header-button .theme-btns:hover',
            ]
        );
        $this->add_responsive_control(
            'button_hradius',
            [
                'label'      => esc_html__('Border Radius', 'ecofinecore'),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors'  => [
                    '{{WRAPPER}} .header-button .theme-btns:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_hshadow',
                'selector' => '{{WRAPPER}} .header-button .theme-btns:hover',
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

?>

        <!--==============================
        Mobile Menu
============================== -->

        <div class="ot-menu-wrapper">
            <div class="ot-menu-area text-center">
                <button class="ot-menu-toggle"><i class="far fa-times"></i> </button>
                <div class="mobile-logo">
                    <?php
                    if ($settings['mobile_logo_select'] == 'cunstom') { ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php
                            $logo_alt = get_post_meta($settings['mobile_logo']['id'], '_wp_attachment_image_alt', true);
                            $logo_title = get_the_title($settings['mobile_logo']['id']);
                            ?>
                            <img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt; ?>" title="<?php echo $logo_title; ?>">
                        </a>

                    <?php } elseif (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                    ?>
                        <h2>
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php esc_html(bloginfo('name')); ?>
                            </a>
                        </h2>
                    <?php  } ?>

                </div>
                <div class="ot-mobile-menu">
                    <?php
                    if ($settings['menu_select']) {
                        $header_menu = $settings['menu_select'];
                    } else {
                        $header_menu = '';
                    }
                    wp_nav_menu(
                        array(
                            'menu'           => $header_menu,
                            'container'      => false,
                            'theme_location' => 'mainmenu',
                            'menu_id'        => 'mainmenu',
                            'menu_class'     => '',

                        )
                    );
                    ?>
                </div>
            </div>
        </div>
        <!--==============================
Header Area
==============================-->
        <header class="ot-header header-one">
            <?php if ($settings['top_header_enable'] == 'yes') : ?>
                <div class="header-top">
                    <div class="container container-1720">
                        <div class="row justify-content-center justify-content-between align-items-center">
                            <?php if (!empty($settings['promotion_text'])) : ?>
                                <div class="col-xl-4 col-lg-12 col-md-12 col-12 header-top-left">
                                    <div class="promostion-test">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['promotion_icon'], ['aria-hidden' => 'true']); ?>
                                        <?php echo esc_html($settings['promotion_text']); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-12 header-top-right">
                                <div class="header-links">
                                    <ul>
                                        <?php foreach ($settings['top_list'] as $topItem) : ?>
                                            <li>
                                                <?php \Elementor\Icons_Manager::render_icon($topItem['top_contact_icon'], ['aria-hidden' => 'true']); ?>
                                                <?php echo esc_html($topItem['top_list_content']); ?>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                </div>
                                <div class="header-social">
                                    <?php if (!empty($settings['top_social_label'])) : ?>
                                        <span class="social-title"> <?php echo esc_html($settings['top_social_label']); ?> </span>
                                    <?php endif; ?>
                                    <?php foreach ($settings['top_social_list'] as $social) :
                                        $url      = $social['top_social_link']['url'];
                                        $target   = $social['top_social_link']['is_external'] ? ' target="_blank"' : '';
                                        $nofollow = $social['top_social_link']['nofollow'] ? ' rel="nofollow"' : '';
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                            <?php \Elementor\Icons_Manager::render_icon($social['top_social_icon'], ['aria-hidden' => 'true']); ?>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>

            <div class="sticky-wrapper" id="<?php echo esc_attr($settings['enable_sticky'] == 'yes' ? 'sticky-menu' : 'no-sticky'); ?>">
                <div class="container container-1720">
                    <div class="row align-items-center justify-content-between">
                        <div class="header-logo col-auto">
                            <?php
                            if ($settings['logo_select'] == 'cunstom') { ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php
                                    $logo_alt = get_post_meta($settings['logo']['id'], '_wp_attachment_image_alt', true);
                                    $logo_title = get_the_title($settings['logo']['id']);
                                    ?>
                                    <img src="<?php echo $settings['logo']['url'] ?>" alt="<?php echo $logo_alt; ?>" title="<?php echo $logo_title; ?>">
                                </a>

                            <?php
                            } elseif (has_custom_logo()) {
                                the_custom_logo();
                            } else {
                            ?>
                                <h2>
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php esc_html(bloginfo('name')); ?>
                                    </a>
                                </h2>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <?php
                                if ($settings['menu_select']) {
                                    $header_menu = $settings['menu_select'];
                                } else {
                                    $header_menu = '';
                                }
                                wp_nav_menu(
                                    array(
                                        'menu'           => $header_menu,
                                        'container'      => false,
                                        'theme_location' => 'mainmenu',
                                        'menu_id'        => 'mainmenu',
                                        'menu_class'     => '',
                                    )
                                );
                                ?>
                            </nav>
                            <button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
                        </div>
                        <div class="col-auto d-none d-xl-block">
                            <div class="header-button">
                                <?php if (!empty($settings['button_link']['url'])) {
                                    $this->add_link_attributes('button_link', $settings['button_link']);
                                } ?>
                                <a <?php echo $this->get_render_attribute_string('button_link'); ?> class=" theme-btns"><span> <?php echo esc_html($settings['button_Text']); ?> <i class="fas fa-angle-double-right"></i> </span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            <header>
                <script>
                    (function($) {
                        "use strict";
                        jQuery(".site").addClass("header-template-one-activate");
                    })(jQuery);
                </script>
        <?php
    }
}

Plugin::instance()->widgets_manager->register(new eco_header_template_one);
        ?>