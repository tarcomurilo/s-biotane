<?php

namespace Elementor;

class eco_skill_image_progressbar_Widget extends Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
        wp_register_script('progressbar', plugin_dir_url(__FILE__) . '/assets/js/progressbar.js', ECOFINE_CORE_VERSION, true);
    }
    public function get_script_depends()
    {
        return ['progressbar'];
    }
    public function get_name()
    {

        return 'skill_image_progressbar';
    }

    public function get_title()
    {
        return esc_html__('Eco Progress Bar Image', 'ecofinecore');
    }

    public function get_icon()
    {

        return 'eicon-skill-bar';
    }

    public function get_categories()
    {
        return ['ecofinecore'];
    }

    protected function register_controls()
    {

        //Content tab start
        $this->start_controls_section(
            'progressbar_options',
            [
                'label' => esc_html__(' Progress Bar Image', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Image', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'number',
            [
                'label'       => esc_html__('Circle Box Number', 'ecofinecore'),
                'type'        => Controls_Manager::NUMBER,
                'min'         => 1,
                'max'         => 100,
                'step'        => 1,
                'default'     => 80,
            ]
        );

        $this->add_control(
            'unit',
            [
                'label'       => __('Circle Box Unit', 'ecofinecore'),
                'type'        => Controls_Manager::TEXT,
                'default'     => '%',
            ]
        );
        $this->add_control(
            'circle_bg',
            [
                'label'       => esc_html__('Circle Background', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'default'   => '#edf7ed'
            ]
        );
        $this->add_control(
            'circle_fill_bg',
            [
                'label'       => esc_html__('Active Color', 'ecofinecore'),
                'type'        => Controls_Manager::COLOR,
                'default'   => '#4BAF47'
            ]
        );
        $this->add_control(
            'note',
            [
                'label' => __('Text options', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'enable',
            [
                'label' => esc_html__('Enable Content', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'ecofinecore'),
                'label_off' => esc_html__('Hide', 'ecofinecore'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Flexible Solutions', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'enable' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'title_tag',
            [
                'label'   => __('Select Title Tag', 'ecofinecore'),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h2',
                'options' => [
                    'h1'   => __('H1', 'ecofinecore'),
                    'h2'   => __('H2', 'ecofinecore'),
                    'h3'   => __('H3', 'ecofinecore'),
                    'h4'   => __('H4', 'ecofinecore'),
                    'h5'   => __('H5', 'ecofinecore'),
                    'h6'   => __('H6', 'ecofinecore'),
                    'span' => __('Span', 'ecofinecore'),
                    'p'    => __('P', 'ecofinecore'),
                    'div'  => __('Div', 'ecofinecore'),
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'progressbar_box_css',
            [
                'label' => esc_html__('Box CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'ecofine_class_box_aligment',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-progressbar-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box',
            ]
        );
        $this->add_responsive_control(
            'radius',
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
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box',
            ]
        );
        $this->add_responsive_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // // **********************************
        //         Image Style 
        //  ************************************ 

        $this->start_controls_section(
            'image_CSS_options',
            [
                'label' => esc_html__('Image Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,

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
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-skill-image > img' => 'height: {{SIZE}}{{UNIT}};',
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
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-skill-image > img' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-skill-image img',
            ]
        );
        $this->add_responsive_control(
            'image_radius',
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
                    '{{WRAPPER}} .eco-skill-image img' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-skill-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-skill-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // ---------- Title Style Start ------

        $this->start_controls_section(
            'progressbar_title_css',
            [
                'label' => esc_html__('Title CSS', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box .eco-progress-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box .eco-progress-title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box .eco-progress-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-progressbar-wrapper .eco-progress-box .eco-progress-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    //Render
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $count_id = rand(100, 10000);
        if ($settings['number'] == 100) {
            $output_number = 1;
        } else if ($settings['number'] < 10) {
            $output_number = '.0' . $settings['number'];
        } else {
            $output_number = '.' . $settings['number'];
        }
        ob_start();
?>
        <div class="eco-progressbar-wrapper">
            <div class="eco-skill-image">
                <?php echo wp_get_attachment_image($settings['image']['id'], 'full'); ?>
                <div class="eco-progress-box" id="circle-wrapper-id-<?php echo $count_id; ?>">
                    <div class="eco-circle-progress-items">
                        <div class="eco-circle-progress-item">
                            <div id="bar-<?php echo $count_id; ?>"></div>
                            <div class="eco-count-numbers">
                                <span class="eco-count-number"><?php echo $settings['number']; ?></span>
                                <span><?php echo $settings['unit']; ?></span>
                            </div>
                        </div>
                    </div>
                    <?php if ($settings['enable'] == 'yes') : ?>
                        <div class="eco-progress-content">
                            <<?php echo esc_attr($settings['title_tag']); ?> class="eco-progress-title"><?php echo esc_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <script>
            (function($) {
                "use strict";
                jQuery(document).ready(function($) {
                    $('#bar-<?php echo $count_id; ?>').circleProgress({
                        value: "<?php echo $output_number; ?>",
                        size: 100,
                        lineCap: "round",
                        emptyFill: "<?php echo $settings['circle_bg']; ?>",
                        thickness: "6",
                        fill: {
                            color: "<?php echo $settings['circle_fill_bg']; ?>"
                        }
                    });
                });
            }(jQuery));
        </script>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_skill_image_progressbar_Widget);
