<?php

namespace Elementor;

class Eco_call_list_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'eco_call_addons';
	}

	public function get_title()
	{
		return esc_html__('Eco Call Us', 'ecofinecore');
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
			'contact_info',
			[
				'label' => esc_html__('Contact Info', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __('backgriund Image', 'ecofinecore'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_responsive_control(
			'bg_color_opacity',
			[
				'label' => esc_html__('Opacity Color', 'ecofinecore'),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-call-info-item:after' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon',
			[
				'label'   => esc_html__('Icon', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'bi bi-telephone-fill',
					'library' => 'solid',
				],
			]
		);
		$this->add_control(
			'label',
			[
				'label'       => esc_html__('Title', 'ecofinecore'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__('Need help?', 'ecofinecore'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'number',
			[
				'label'       => esc_html__('Number', 'ecofinecore'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__('(808) 555-0111', 'ecofinecore'),
				'label_block' => true,
			]
		);
		$this->add_control(
			'dec',
			[
				'label'      => esc_html__('Details', 'ecofinecore'),
				'type' 		 => \Elementor\Controls_Manager::WYSIWYG,
				'default'    => esc_html__('Lorem Ipsum is simply is dumiomy is text Lorem Ipsum is simply is ou our o dummy text', 'ecofinecore'),
				'show_label' => true,
				'dynamic'    => [
					'active' => true,
				],
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'box_css',
			[
				'label' => esc_html__(' Box', 'ecofinecore'),
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
					'{{WRAPPER}} .eco-call-info-item' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-call-info-item',
				'selector' => '{{WRAPPER}} .eco-call-info-item:after',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item',
				'selector' => '{{WRAPPER}} .eco-call-info-item:after',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item',
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
					'{{WRAPPER}} .eco-call-info-item' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eco-call-info-item:after' => 'border-radius: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-call-info-item:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-call-info-item:after' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'font-size: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_color',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'icon_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_box_Shadow::get_type(),
			[
				'name'     => 'icon_shadow',
				'label'    => esc_html__('icon Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_responsive_control(
			'icon_radius',
			[
				'label'      => esc_html__('Border Radius', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'icon_svg_size',
			[
				'label' => esc_html__('SVG Size', 'ecofinecore'),
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon svg' => 'width: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'icon_hbg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_box_Shadow::get_type(),
			[
				'name'     => 'icon_hshadow',
				'label'    => esc_html__('icon Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'icon_hborder',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-icon',
			]
		);
		$this->add_responsive_control(
			'icon_hradius',
			[
				'label'      => esc_html__('Border Radius', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'content_css',
			[
				'label' => esc_html__('Content', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs(
			'contact_tabs'
		);
		$this->start_controls_tab(
			'content_title',
			[
				'label' => __('Title', 'ecofinecore'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typo',
				'label'    => esc_html__('Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__('Title Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-call-info-item .eco-call-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'content_num',
			[
				'label' => __('Number', 'ecofinecore'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'num_typo',
				'label'    => esc_html__('Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-Number',
			]
		);
		$this->add_responsive_control(
			'num_color',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-call-Number' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'num_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-Number' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'num_padding',
			[
				'label'      => esc_html__('Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-Number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();


		$this->start_controls_tab(
			'content_dec',
			[
				'label' => __('Content', 'ecofinecore'),
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'dec_typo',
				'label'    => esc_html__('Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-call-info-item .eco-call-dec',
			]
		);
		$this->add_responsive_control(
			'dec_color',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-dec' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'dec_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'dec_padding',
			[
				'label'      => esc_html__('Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-call-info-item .eco-call-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		<div class="eco-call-addons-wrapper">
			<div class="eco-call-info-item" style="background-image:url( <?php echo esc_url(wp_get_attachment_image_url($settings['bg_image']['id'], 'full')); ?> ) ">
				<?php if ($settings['icon']['value']) : ?>
					<div class="eco-call-icon">
						<?php \Elementor\Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']); ?>
					</div>
				<?php endif; ?>
				<div class="eco-contact-content">
					<?php if ($settings['label']) : ?>
						<span class="eco-call-title"><?php echo esc_html($settings['label']); ?></span>
						<h3 class="eco-call-Number"><?php echo esc_html($settings['number']); ?></h3>
					<?php endif; ?>
					<?php if ($settings['dec']) : ?>
						<div class="eco-call-dec"><?php echo wp_kses_post($settings['dec']); ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
<?php
		echo ob_get_clean();
	}
}
Plugin::instance()->widgets_manager->register(new Eco_call_list_Widget);
