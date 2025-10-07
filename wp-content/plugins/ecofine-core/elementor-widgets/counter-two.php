<?php

namespace Elementor;

class ecofine_counter_two_widget extends Widget_Base
{

	public function get_name()
	{
		return 'thenepul_counter_v2';
	}

	public function get_title()
	{
		return esc_html__('Eco Counter V2', 'ecofinecore');
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
			'counter_options',
			[
				'label' => esc_html__('eco Counter', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__('Icon', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
		$repeater->add_control(
			'number',
			[
				'label'   => esc_html__('Number', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 999999999,
				'step'    => 1,
				'default' => 540,
			]
		);
		$repeater->add_control(
			'symble',
			[
				'label'   => esc_html__('Symble', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('+', 'ecofinecore'),
			]
		);
		$this->add_control(
			'html_tag',
			[
				'label' => esc_html__('Title HTML Tag', 'ecofinecore'),
				'description' => esc_html__('Add HTML Tag For Title', 'ecofinecore'),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'h6',
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
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Happy Customers', 'ecofinecore'),
				'dynamic' => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'counters',
			[
				'label'       => esc_html__('Counter List', 'ecofinecore'),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title'  => esc_html__('Team member', 'ecofinecore'),
						'number' => esc_html__('200', 'ecofinecore'),
						'symble' => esc_html__('+', 'ecofinecore'),
					],
					[
						'title'  => esc_html__('Complete project', 'ecofinecore'),
						'number' => esc_html__('10', 'ecofinecore'),
						'symble' => esc_html__('+', 'ecofinecore'),
					],
					[
						'title'  => esc_html__('Winning award', 'ecofinecore'),
						'number' => esc_html__('20', 'ecofinecore'),
						'symble' => esc_html__('+', 'ecofinecore'),
					],
					[
						'title'  => esc_html__('Client review', 'ecofinecore'),
						'number' => esc_html__('900', 'ecofinecore'),
						'symble' => esc_html__('+', 'ecofinecore'),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
		$this->add_control(
			'container_full',
			[
				'label'        => esc_html__('Enable Full Container', 'ecofinecore'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'ecofinecore'),
				'label_off'    => esc_html__('Hide', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'desktop_col',
			[
				'label'   => __('Columns On Desktop', 'ecofinecore'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-3',
				'options' => [
					'col-xl-12' => __('1 Column', 'ecofinecore'),
					'col-xl-6'  => __('2 Column', 'ecofinecore'),
					'col-xl-4'  => __('3 Column', 'ecofinecore'),
					'col-xl-3'  => __('4 Column', 'ecofinecore'),
					'col-xl-2'  => __('6 Column', 'ecofinecore'),
				],
			]
		);
		$this->add_control(
			'laptop_col',
			[
				'label'   => __('Columns for Laptop', 'ecofinecore'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-lg-3',
				'options' => [
					'col-lg-12' => __('1 Column', 'ecofinecore'),
					'col-lg-6'  => __('2 Column', 'ecofinecore'),
					'col-lg-4'  => __('3 Column', 'ecofinecore'),
					'col-lg-3'  => __('4 Column', 'ecofinecore'),
					'col-lg-2'  => __('6 Column', 'ecofinecore'),
				],
			]
		);

		$this->add_control(
			'tab_col',
			[
				'label'   => __('Columns On Tablet', 'ecofinecore'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-md-6',
				'options' => [
					'col-md-12' => __('1 Column', 'ecofinecore'),
					'col-md-6'  => __('2 Column', 'ecofinecore'),
					'col-md-4'  => __('3 Column', 'ecofinecore'),
					'col-md-3'  => __('4 Column', 'ecofinecore'),
					'col-md-2'  => __('6 Column', 'ecofinecore'),
				],
			]
		);
		$this->end_controls_section();

		// *********************************************************
		//                Box Style Css
		// *********************************************************

		$this->start_controls_section(
			'counter_box',
			[
				'label' => esc_html__('Box', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border_right_box_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-v2-wrapper .eco-counter-item',
			]
		);
		$this->start_controls_tabs(
			'counter_box_tabs'
		);
		$this->start_controls_tab(
			'counter_main_box_tabs',
			[
				'label' => __('Main Box', 'ecofinecore'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-counter-v2-wrapper',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-v2-wrapper',
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
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-v2-wrapper' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-v2-wrapper',
			]
		);
		$this->add_responsive_control(
			'box_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-v2-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-counter-v2-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'Counter_box',
			[
				'label' => __('Counter Box', 'ecofinecore'),
			]
		);
		$this->add_responsive_control(
			'alignment',
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

					'right'   => [
						'title' => __('Right', 'ecofinecore'),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .eco-counter-items' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'main_box_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-counter-items',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'main_box_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-items',
			]
		);
		$this->add_responsive_control(
			'main_box_radius',
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
				'default'    => [
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-items' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'main_box_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-items',
			]
		);
		$this->add_responsive_control(
			'main_box_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-items' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'main_box_padding',
			[
				'label'      => esc_html__('Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-items' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		// *********************************************************
		//                Icon Style Css
		// *********************************************************

		$this->start_controls_section(
			'icon_css',
			[
				'label' => __('Icon Style', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'icon_tabs'
		);
		$this->start_controls_tab(
			'icon_tab_normal',
			[
				'label' => __('Normal', 'ecofinecore'),
			]
		);
		$this->add_responsive_control(
			'icon_size',
			[
				'label'      => esc_html__('Icon Size', 'ecofinecore'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'font-size: {{SIZE}}{{UNIT}};',
				],
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_color',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'icon_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_box_Shadow::get_type(),
			[
				'name'     => 'icon_shadow',
				'label'    => esc_html__('icon Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_responsive_control(
			'icon_radius',
			[
				'label'      => esc_html__('Border Radius', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => esc_html__('SVG Wigth', 'ecofinecore'),
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon svg' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'icon_tab_hover',
			[
				'label' => __('Hover', 'ecofinecore'),
			]
		);
		$this->add_responsive_control(
			'icon_hcolor',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'icon_hbg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_box_Shadow::get_type(),
			[
				'name'     => 'icon_hshadow',
				'label'    => esc_html__('icon Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_hborder',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon',
			]
		);
		$this->add_responsive_control(
			'icon_hradius',
			[
				'label'      => esc_html__('Border Radius', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-v2-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'counter_number',
			[
				'label' => esc_html__('Number CSS', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'number_color',
			[
				'label'     => esc_html__('Number Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-count-v2-timer' => 'color: {{VALUE}}',
					'{{WRAPPER}} .eco-counter-V2-numner span' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'number_title_typo',
				'label'    => esc_html__('Title Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-count-v2-timer,{{WRAPPER}} .eco-counter-V2-numner span',
			]
		);
		$this->add_responsive_control(
			'number_margin',
			[
				'label'      => esc_html__('Number Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-count-v2-timer' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-counter-V2-numner span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'number_padding',
			[
				'label'      => esc_html__('Number Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-count-v2-timer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-counter-V2-numner span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'counter_title',
			[
				'label' => esc_html__('Title CSS', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__('Title Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-V2-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__('Title Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-counter-item .eco-counter-V2-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__('Title Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-V2-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label'      => esc_html__('Title Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-counter-item .eco-counter-V2-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	//Render
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$count_id = rand(120, 12314);
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		if ($settings['container_full'] == 'yes') {
			$container = 'container-fluid';
		} else {
			$container = 'container';
		}
		echo '
        <script>
			jQuery(document).ready(function($) {
				"use strict";
				$(".timer").countTo();
				$(".count-process").appear(function() {
				$(".timer").countTo();
				}, {
				accY: -200
				});
			});
		</script>
        ';
		ob_start();
?>
		<div class="eco-counter-v2-wrapper eco-counter-box-<?php echo esc_attr($count_id); ?>">
			<div class="<?php echo esc_attr($container); ?>">
				<div class="row">
					<?php foreach ($settings['counters'] as $item) : ?>
						<div class="<?php echo esc_attr($column); ?> col-sm-6 col-12 eco-counter-col">
							<div class="eco-counter-items">
								<div class="eco-counter-item">
									<?php if (!empty($item['icon']['value'])) : ?>
										<div class="eco-counter-v2-icon">
											<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
										</div>
									<?php endif; ?>
									<div class="eco-counter-content count-process">
										<div class="eco-counter-V2-numner">
											<h2 class="eco-count-v2-timer timer" data-to="<?php echo esc_attr($item['number']); ?>" data-speed="5000">
												<?php echo esc_html($item['number']); ?>
											</h2>
											<?php if (!empty($item['symble'])) : ?>
												<span><?php echo esc_html($item['symble']); ?></span>
											<?php endif; ?>
										</div>
										<?php if (!empty($item['title'])) : ?>
											<<?php echo esc_attr($settings['html_tag']); ?> class="eco-counter-V2-title"><?php echo esc_html($item['title']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
										<?php endif; ?>
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
Plugin::instance()->widgets_manager->register(new ecofine_counter_two_widget);
