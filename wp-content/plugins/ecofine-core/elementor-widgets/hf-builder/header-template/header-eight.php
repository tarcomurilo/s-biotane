<?php

namespace Elementor;

class eco_header_template_eight extends Widget_Base
{

    public function get_name()
    {
        return 'eco-header_eight';
    }

    public function get_title()
    {
        return esc_html__('Eco Header Eight', 'ecofinecore');
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
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'header_contact_info_icon',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-clock',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'header_contact_info_content',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Working: 8.00am - 5.00pm', 'ecofinecore'),
            ]
        );
        $this->add_control(
            'header_contact_info',
            [
                'label' => esc_html__('Contact Info List', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'header_contact_info_content' => esc_html__('Working: 8.00am - 5.00pm', 'ecofinecore'),
                    ],
                    [
                        'header_contact_info_content' => esc_html__('info@ecofine.com', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ header_contact_info_content }}}',
            ]
        );

        // <=======> Header top Contact <=======>
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'header_contact_label',
            [
                'label' => esc_html__('Contact Label', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Help', 'ecofinecore'),
            ]
        );
        $repeater->add_control(
            'header_contact_link',
            [
                'label' => esc_html__('Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'header_contact',
            [
                'label'       => esc_html__('Contact List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'header_contact_label' => esc_html__('Help', 'ecofinecore'),
                    ],
                    [
                        'header_contact_label' => esc_html__('Support', 'ecofinecore'),
                    ],
                    [
                        'header_contact_label' => esc_html__(' Contact ', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ header_contact_label }}}',
            ]
        );

        // <=======> Header Social <=======>
        $this->add_control(
            'top_social_label',
            [
                'label' => esc_html__('Label', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default' => esc_html__('Visit Us:', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'top_social_title',
            [
                'label'       => esc_html__('Title', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'social_list_icon',
            [
                'label'   => esc_html__('Icon', 'ecofinecore'),
                'type'    => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value'   => 'fab fa-facebook-f',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $repeater->add_control(
            'social_link',
            [
                'label' => esc_html__('Link', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::URL,
                'options' => ['url', 'is_external', 'nofollow'],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'ecofine_social_list',
            [
                'label'       => esc_html__('Social List', 'ecofinecore'),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default' => [
                    [
                        'top_social_title' => esc_html__('Facebook', 'ecofinecore'),
                    ],
                    [
                        'top_social_title' => esc_html__('Instagram', 'ecofinecore'),
                    ],
                    [
                        'top_social_title' => esc_html__('Twitter ', 'ecofinecore'),
                    ],
                    [
                        'top_social_title' => esc_html__(' Linkedin ', 'ecofinecore'),
                    ],
                ],
                'title_field' => '{{{ top_social_title }}}',
            ]
        );
        $this->end_controls_section();

        // <=======> Menu and Logo <=======>
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
        $this->add_control(
            'header_search_icon',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-search',
                    'library' => 'fa-solid',
                ],
            ]
        );
        $this->end_controls_section();

        // <=======> Button Content <=======>
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
                'default' => esc_html__('Get a quote', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'header_button_icon',
            [
                'label' => esc_html__('Icon', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'far fa-arrow-right',
                    'library' => 'fa-solid',
                ],
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
                ],
                'label_block' => true,
            ]
        );
        $this->end_controls_section();

        // <=======> Header Top Style <=======>
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
                    '{{WRAPPER}} .header-eight-top-bar' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'top_bg_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-eight-top-bar',
            ]
        );
        $this->add_responsive_control(
            'top_header_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-top-bar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-eight-top-bar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs(
            'header_top_tabs'
        );

        $this->start_controls_tab(
            'htop_contact_info',
            [
                'label' => esc_html__('Contact Info', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'htop_contact_info_typo',
                'selector' => '{{WRAPPER}} .header-eight-contact-info',
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_color',
            [
                'label'       => esc_html__('Text Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-contact-info, .header-eight-contact-info a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_hcolor',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-contact-info a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_border_color',
            [
                'label' => esc_html__('Border Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info ul li' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'htop_contact_info_icon',
            [
                'label' => esc_html__('Icon Styles', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'htop_contact_info_icon_typo',
                'selector' => '{{WRAPPER}} .header-eight-contact-info-icon',
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_icon_color',
            [
                'label'       => esc_html__('Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-contact-info-icon' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'svg_styles',
            [
                'label' => esc_html__('SVG Styles', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_svg_color',
            [
                'label'       => esc_html__('SVG Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-contact-info-icon svg path' => 'fill: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_svg_width',
            [
                'label' => esc_html__('Width', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info-icon svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_info_svg_height',
            [
                'label' => esc_html__('Height', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-contact-info-icon svg' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'top_header_contact_info_style',
            [
                'label' => esc_html__('Contact', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'contact_right_border_color',
            [
                'label' => esc_html__('Border Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .header-eight-top-wrapper' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'htop_contact_typo',
                'selector' => '{{WRAPPER}} .header-eight-top-wrapper .header-eight-contact ul li a',
            ]
        );
        $this->add_responsive_control(
            'htop_contact_color',
            [
                'label'       => esc_html__('Text Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-top-wrapper .header-eight-contact ul li a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_hcolor',
            [
                'label'       => esc_html__('Hover Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .header-eight-top-wrapper .header-eight-contact ul li a:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-top-wrapper .header-eight-contact ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'htop_contact_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight-top-wrapper .header-eight-contact ul li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'header_top_social_style_options',
            [
                'label' => esc_html__('Social', 'ecofinecore'),
            ]
        );
        $this->add_responsive_control(
            'top_social_icon_label_gap',
            [
                'label' => esc_html__('Label Gap', 'ecofinecore'),
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
                    '{{WRAPPER}} .social-title' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'     => 'top_social_icon_label_typo',
                'selector' => '{{WRAPPER}} .social-title',
            ]
        );
        $this->add_responsive_control(
            'top_social_icon_label_color',
            [
                'label'       => esc_html__('Label Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'selectors'   => [
                    '{{WRAPPER}} .social-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'social_icon_style',
            [
                'label'     => esc_html__('social Icon Style', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
        $this->add_responsive_control(
            'top_social_icon_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-social a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'top_social_icon_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-social a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        // <=======> Logo Styles <=======>
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

        // <=======> Menu Styles <=======>
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
                'selector' => '{{WRAPPER}} .header-eight .menu-area',
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'menu_box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-eight .menu-area',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'menu_box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .header-eight .menu-area',
            ]
        );
        $this->add_responsive_control(
            'menu_box_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .header-eight .menu-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .header-eight .menu-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        // <=======> Mobile Menu Styles <=======>
        $this->start_controls_section(
            'mobile_menu_settings',
            [
                'label' => esc_html__('Mobile Menu', 'ecofinecore'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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

        // <=======> Button Styles <=======>
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
        $allowed_html = array(
            'h1'    => array(),
            'h2'    => array(),
            'h3'    => array(),
            'h4'    => array(),
            'h5'    => array(),
            'h6'    => array(),
            'span'  => array('style' => array(),),
            'a'     => array(
                'href'   => array(),
                'target' => array(),
                'title'  => array(),
                'rel'    => array(),
            ),
            'strong'  => array('style' => array(),),
            'del'  => array('datetime' => array(),),
            'small'  => array(),
            'span'   => array(
                'style' => array(),
            ),
            'br'    => array(),
            'em'    => array(),
            'ul'    => array(),
            'li' => array()
        );
?>

        <!-- <=========> Mobile Menu <=========> -->
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

        <!-- <=========> Header Area <=========> -->
        <header class="header-section header-eight">
            <div class="header-eight-section">
                <?php if ($settings['top_header_enable'] == 'yes') : ?>
                    <div class="header-eight-top-bar">
                        <div class="container ">
                            <div class="row justify-content-center justify-content-between align-items-center">
                                <div class="col-xl-10 col-lg-10 col-md-12 col-12">
                                    <div class="header-eight-top-wrapper">
                                        <div class="header-eight-contacts">
                                            <div class="header-eight-contact-info">
                                                <ul>
                                                    <?php foreach ($settings['header_contact_info'] as $contact_info) : ?>
                                                        <li>
                                                            <div class="header-eight-contact-info-icon">
                                                                <?php \Elementor\Icons_Manager::render_icon($contact_info['header_contact_info_icon'], ['aria-hidden' => 'true']); ?>
                                                            </div>
                                                            <div class="header-eight-contact-info">
                                                                <?php if (!empty($contact_info['header_contact_info_content'])) : ?>
                                                                    <?php echo wp_kses($contact_info['header_contact_info_content'], $allowed_html) ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>

                                            <div class="header-eight-contact">
                                                <ul>
                                                    <?php foreach ($settings['header_contact'] as $contact) :
                                                        $url      = $contact['header_contact_link']['url'];
                                                        $target   = $contact['header_contact_link']['is_external'] ? ' target="_blank"' : '';
                                                        $nofollow = $contact['header_contact_link']['nofollow'] ? ' rel="nofollow"' : '';
                                                    ?>
                                                        <li>
                                                            <a href="<?php echo esc_url($url); ?>">
                                                                <?php echo esc_html($contact['header_contact_label']); ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-2 col-lg-2 col-md-12 col-12">
                                    <div class="header-eight-social">
                                        <?php if (!empty($settings['top_social_label'])) : ?>
                                            <span class="social-title"> <?php echo esc_html($settings['top_social_label']); ?> </span>
                                        <?php endif; ?>
                                        <div class="social-list-wrap">
                                            <?php foreach ($settings['ecofine_social_list'] as $social) :
                                                $url      = $social['social_link']['url'];
                                                $target   = $social['social_link']['is_external'] ? ' target="_blank"' : '';
                                                $nofollow = $social['social_link']['nofollow'] ? ' rel="nofollow"' : '';
                                            ?>

                                                <a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
                                                    <?php \Elementor\Icons_Manager::render_icon($social['social_list_icon'], ['aria-hidden' => 'true']); ?>
                                                </a>

                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <div class="sticky-wrapper" id="<?php echo esc_attr($settings['enable_sticky'] == 'yes' ? 'sticky-menu' : 'no-sticky'); ?>">
                    <div class="menu-area ">
                        <div class="container ">
                            <div class="row align-items-center headeer-eight-menu-wrp justify-content-between">
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

                                <div class="header-eight-menu col-auto">
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
                                    <div class="button search-open header-eight-search">
                                        <?php \Elementor\Icons_Manager::render_icon($settings['header_search_icon'], ['aria-hidden' => 'true']); ?>
                                    </div>
                                </div>

                                <div class="col-auto d-none d-xl-block">
                                    <div class="header-eight-button">
                                        <?php if (!empty($settings['button_link']['url'])) {
                                            $this->add_link_attributes('button_link', $settings['button_link']);
                                        } ?>
                                        <a <?php echo $this->get_render_attribute_string('button_link'); ?> class="theme-btns"><span> <?php echo esc_html($settings['button_Text']); ?> <div class="button-icon"><?php \Elementor\Icons_Manager::render_icon($settings['header_button_icon'], ['aria-hidden' => 'true']); ?></div> </span> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- <=========> Search Popup <=========> -->
        <div class="header-search-popup header-eight-search-popup">
            <div class="header-search-overlay search-open"></div>
            <div class="header-search-popup-content">
                <form method="get" class="searchform pop_search" action="<?php echo esc_url(home_url('/')); ?>">
                    <span class="screen-reader-text"><?php esc_html_e('Search here...', 'ecofine') ?></span>
                    <input type="search" value="<?php echo esc_attr(get_search_query()) ?>" name="s" placeholder="<?php esc_attr_e('Search here... ', 'ecofine') ?>" title="<?php esc_attr_e('Search for:', 'ecofine') ?>">
                    <button type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <script>
            (function($) {
                "use strict";
                jQuery(".site").addClass("header-template-eight-activate");
            })(jQuery);
        </script>
<?php
    }
}

Plugin::instance()->widgets_manager->register(new eco_header_template_eight);
?>