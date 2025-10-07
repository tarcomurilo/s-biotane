<?php

namespace Elementor;

class eco_accordion_Widget extends Widget_Base
{

    public function get_name()
    {
        return 'eco_accordion';
    }
    public function get_title()
    {

        return esc_html__('Eco Faq', 'ecofinecore');
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
            'eco_faq_options',
            [
                'label' => esc_html__('Eco Accordion', 'ecofinecore'),
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
                'eco_faq_title' => '{{{ list_title }}}',
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
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .faq-accordion .accordion-item'   => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .faq-accordion .accordion-button' => 'text-align: {{VALUE}}',
                    '{{WRAPPER}} .eco-accordion-wraper ' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'faq_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-accordion-wraper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'eco_faq_css_box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-accordion-wraper',
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
                    '{{WRAPPER}} .eco-accordion-wraper' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eco_faq_css_box_shoadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-accordion-wraper',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-accordion-wraper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-accordion-wraper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
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
                    '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-button' => 'background-color: {{VALUE}}',
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
                    '{{WRAPPER}} .eco-accordion-wraper .accordion-header .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_box_bg_active',
            [
                'label'     => esc_html__('Background Color', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-accordion-wraper .accordion-header .accordion-button:not(.collapsed)' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'eco_faq_css_title_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-button',
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
                    '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-button' => 'border-radius: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'eco_faq_css_title_shoadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-button',
            ]
        );
        $this->add_responsive_control(
            'eco_faq_css_title_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-accordion-wraper .faq-accordion .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $_id = rand(1241, 3256);
        if ($settings['enable_container'] == 'yes') {
            $container = 'container';
        } else {
            $container = 'container-fluid';
        }
        ob_start();
?>
        <div class="eco-accordion-wraper">
            <div class="<?php echo esc_attr($container); ?>">
                <div class="accordion faq-accordion" id="eco-faq">
                    <?php $count = 0;
                    foreach ($settings['eco_faqs'] as $item) : $count++;
                        if ($item['eco_faq_active'] == 'yes') {
                            $active = 'collapse';
                            $show = 'show';
                        } else {
                            $active = 'collapsed';
                            $show = '';
                        }
                    ?>
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
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_accordion_Widget);
