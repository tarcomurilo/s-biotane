<?php

namespace Elementor;

class eco_portfolio_details_widget extends Widget_Base
{

    public function get_name()
    {
        return 'eco_portfolio_details';
    }

    public function get_title()
    {
        return esc_html__('Eco Portfolio Details', 'ecofinecore');
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
            'portfolio_details_options',
            [
                'label' => esc_html__('Portfolio Details', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_responsive_control(
            'select_iamge',
            [
                'label' => esc_html__('Image type', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'featured',
                'options' => [
                    'featured'  => esc_html__('Featured', 'ecofinecore'),
                    'custom' => esc_html__('Custom', 'ecofinecore'),
                ],
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'select_iamge' => 'custom',
                ],
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('A large company ', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
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
        $this->add_control(
            'sort_details',
            [
                'label' => esc_html__('Description', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Aliquam eros justo, posuere loborti vive rra laoreet matti ullamc orper posu ere viverra .Aliquam eros justo, posuere lobortis non, vive rra laoreet augue mattis fermentum ullamcorper viverra laoreet Aliquam eros justo, posuere loborti  Aliquam eros justo, posuere loborti viverra laoreet matti ullamcorper posuere viverra .Aliquam eros justo, posuere lobortis non, ', 'ecofinecore'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'project_details_lavel',
            [
                'label' => esc_html__('Details Label', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Client', 'ecofinecore'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'html_tag',
            [
                'label' => esc_html__('Label HTML Tag', 'ecofinecore'),
                'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'h3',
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
            'details_Name',
            [
                'label' => esc_html__('Details name', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('David Butler', 'ecofinecore'),
                'show_label' => false,
            ]
        );
        $this->add_control(
            'list',
            [
                'label' => esc_html__('Detais List', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'project_details_lavel' => esc_html__('Client', 'ecofinecore'),
                        'details_Name' => esc_html__('David Butler', 'ecofinecore'),
                    ],
                    [
                        'project_details_lavel' => esc_html__('Category', 'ecofinecore'),
                        'details_Name' => esc_html__('Succulent Seeds', 'ecofinecore'),
                    ],
                    [
                        'project_details_lavel' => esc_html__('150000  USD', 'ecofinecore'),
                        'details_Name' => esc_html__('Project Value ', 'ecofinecore'),
                    ],
                    [
                        'project_details_lavel' => esc_html__('Date', 'ecofinecore'),
                        'details_Name' => esc_html__('March 21, 2023', 'ecofinecore'),
                    ],

                ],
                'title_field' => '{{{ project_details_lavel }}}',
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Box  Style Css
        // *********************************************************

        $this->start_controls_section(
            'box_css_options',
            [
                'label' => esc_html__('Box', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'box_alignment',
            [
                'label'     => __('Alignment', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::CHOOSE,
                'options'   => [
                    'left'    => [
                        'title' => __('Left', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-left',
                    ],
                    'center'  => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'justify' => [
                        'title' => __('Center', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title' => __('Right', 'ecofinecore'),
                        'icon'  => 'eicon-text-align-right',
                    ],
                ],
                'default'   => 'left',
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'text-align: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'box_bg',
                'label'    => esc_html__('Background', 'ecofinecore'),
                'types'    => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'box_shadow',
                'label'    => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'box_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-wrapper',
            ]
        );
        $this->add_responsive_control(
            'box_radius',
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-details-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Image  Style Css
        // *********************************************************

        $this->start_controls_section(
            'image_css',
            [
                'label' => esc_html__('Image', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label'      => esc_html__('Height', 'ecofinecore'),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 800,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-details-image img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'object',
            [
                'label'     => esc_html__('Object Fit', 'ecofinecore'),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'default'   => 'cover',
                'options'   => [
                    'fill'    => esc_html__('Fill', 'ecofinecore'),
                    'contain' => esc_html__('Contain', 'ecofinecore'),
                    'cover'   => esc_html__('Cover', 'ecofinecore'),
                    'none'    => esc_html__('None', 'ecofinecore'),
                ],
                'selectors' => [
                    '{{WRAPPER}} .eco-portfolio-details-image img' => 'object-fit: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name'     => 'image_border',
                'label'    => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-image img',
            ]
        );

        $this->add_responsive_control(
            'image_radius',
            [
                'label'      => esc_html__('image Radius', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-details-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'image_shadow',
                'label'    => esc_html__('Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .eco-portfolio-details-image img',
            ]
        );
        $this->add_responsive_control(
            'image_margin',
            [
                'label'      => esc_html__('Margin', 'ecofinecore'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors'  => [
                    '{{WRAPPER}} .eco-portfolio-details-image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .eco-portfolio-details-image img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        // *********************************************************
        //                Content  Style Css
        // *********************************************************

        $this->start_controls_section(
            'content_css',
            [
                'label' => esc_html__('Content', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'content_tabs'
        );
        $this->start_controls_tab(
            'content_tab_title',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-details-title',
            ]
        );
        $this->add_responsive_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details-title a' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .portfolio-details-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .portfolio-details-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'des_tab_stitle',
            [
                'label' => __('Descrtiption', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-content',
            ]
        );
        $this->add_responsive_control(
            'des_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'des_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();


        // *********************************************************
        //                Portfolio Details  Style Css
        // *********************************************************
        $this->start_controls_section(
            'port_content_css',
            [
                'label' => esc_html__('Portfolio List Style', 'ecofinecore'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'port_content_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'port_content_paddng',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'port_background',
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .portfolio-details ul li',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'port_content_border',
                'label' => esc_html__('Border', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-details ul li',
            ]
        );
        $this->add_responsive_control(
            'port_content_radius',
            [
                'label' => esc_html__('Radius', 'ecofinecore'),
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
                    '{{WRAPPER}} .portfolio-details ul li' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'port_content_shadow',
                'label' => esc_html__('Box Shadow', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-details ul li',
            ]
        );
        $this->start_controls_tabs(
            'content_list_tabs'
        );
        $this->start_controls_tab(
            'content_tab_ltitle',
            [
                'label' => __('Title', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ltitle_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-name',
            ]
        );
        $this->add_responsive_control(
            'ltitle_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'ltitle_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'ltitle_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        $this->start_controls_tab(
            'label_tab_stitle',
            [
                'label' => __('Label', 'ecofinecore'),
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'label_typo',
                'label' => esc_html__('Typography', 'ecofinecore'),
                'selector' => '{{WRAPPER}} .portfolio-details ul li span',
            ]
        );
        $this->add_responsive_control(
            'label_color',
            [
                'label' => esc_html__('Color', 'ecofinecore'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_margin',
            [
                'label' => esc_html__('Margin', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'label_padding',
            [
                'label' => esc_html__('Padding', 'ecofinecore'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .portfolio-details ul li span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
        $unique = get_the_ID();
        $portfolio_meta = get_post_meta($unique, 'ecofine_portfolio', true);
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
        ob_start();
?>
        <div class="eco-portfolio-details-wrapper">
            <div class="eco-portfolio-details-box">
                <div class="row">
                    <div class="col-xl-7 col-lg-6 col-6 col-sm-12 col-12">
                        <div class="eco-portfolio-details-image">
                            <?php if ($settings['select_iamge'] == 'featured') {
                                the_post_thumbnail('full', array('class' => 'img-responsive'));
                            } else {
                                echo wp_get_attachment_image($settings['image']['id'], 'full');
                            } ?>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 col-6 col-sm-12 col-12">
                        <div class="eco-portfolio-details-content">
                            <!-- Title -->
                            <?php if (!empty($settings['title'])) : ?>
                                <<?php echo esc_attr($settings['title_tag']); ?> class="portfolio-details-title">
                                    <?php echo esc_html($settings['title']); ?>
                                </<?php echo esc_attr($settings['title_tag']); ?>>
                            <?php endif; ?>
                            <!-- decription -->
                            <div class="portfolio-content"><?php echo wp_kses($settings['sort_details'], $allowed_html); ?></div>
                        </div>
                        <div class="portfolio-details">
                            <ul>
                                <?php foreach ($settings['list'] as $item) : ?>
                                    <li>
                                        <span> <?php echo esc_html($item['project_details_lavel']); ?></span>
                                        <<?php echo esc_attr($settings['html_tag']); ?> class="portfolio-name"> <?php echo wp_kses($item['details_Name'], $allowed_html); ?> </<?php echo esc_attr($settings['html_tag']); ?>>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        echo ob_get_clean();
    }
}
Plugin::instance()->widgets_manager->register(new eco_portfolio_details_widget);
