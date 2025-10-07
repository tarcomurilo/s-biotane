<?php

namespace Elementor;

class eco_skillabar_Widget extends Widget_Base
{
    public function get_script_depends()
    {
        return ['counterup', 'appear'];
    }
    public function get_name()
    {

        return 'eco_Skillabar';
    }

    public function get_title()
    {
        return esc_html__('Eco Skill Bar', 'ecofinecore');
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
            'skillbar_options',
            [
                'label' => esc_html__('Skill Bar', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new Repeater();

        $repeater->add_control(
            'title',
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
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'skill_box_css',
            [
                'label' => esc_html__('Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_width',
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
            'alignment',
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
            'number_align',
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

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'box_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-skills-wrapper .skillbar-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-skills-wrapper .skillbar-item',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-skills-wrapper .skillbar-item',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'box_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .eco-skills-wrapper .skillbar-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'skill_content_css',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
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
                'name' => 'title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}}  .skill-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__('Title Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill-title' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .skill-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name' => 'active_bg',
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
                'name' => 'progress_bg',
                'label' => esc_html__('Background', 'ecofinecore'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .skillbar-item .skillbar',
            ]
        );
        $this->add_responsive_control(
            'progress_height',
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
            'progress_border',
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
            'number_alignment',
            [
                'label' => __('Alignment', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'selectors_dictionary' => [
                    'left'   => 'left:0;right:auto',
                    'right'  => 'right:0',
                ],
                'selectors'            => [
                    '{{WRAPPER}} .skill-percent-count-wrap' => '{{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'number_color',
            [
                'label' => esc_html__('Number Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .skill-percent-count-wrap' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'number_tyoo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .skill-percent-count-wrap',
            ]
        );
        $this->add_responsive_control(
            'number_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skill-percent-count-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'number_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .skill-percent-count-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $count_id = rand(120, 12314);
        ob_start();
?>
        <div class="eco-skills-main-wrapper">
            <div class="eco-skills-wrapper">

                <?php if ($settings['skills']) : ?>
                    <?php foreach ($settings['skills'] as $skill) : ?>
                        <div class="skillbar-item">
                            <div class="skill-title"><?php echo esc_html($skill['title']); ?></div>
                            <div class="skillbar" data-percent="<?php echo esc_attr($skill['percent']['size']); ?>%">
                                <div class="skill-percent-count-wrap">
                                    <span class="skill-percent-count"><?php echo esc_html($skill['percent']['size']); ?></span>%
                                </div>
                                <div class="count-bar"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

            </div>
        </div>
        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {
                    $(".skillbar").each(function() {
                        $(this).appear(function() {
                            $(this).find(".count-bar").animate({
                                width: $(this).attr("data-percent")
                            }, 3000);
                        });
                    });

                    $(".skill-percent-count").counterUp({
                        delay: 10,
                        time: 3000
                    });
                });
            })(jQuery);
        </script>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_skillabar_Widget);
