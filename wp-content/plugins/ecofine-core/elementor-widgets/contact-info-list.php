<?php

namespace Elementor;

class ECOFINE_contactInfo_list_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'ECOFINE_contactInfo_list';
	}

	public function get_title()
	{
		return esc_html__('eco Contact Info', 'ecofinecore');
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
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__('Icon', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-map-marked-alt',
					'library' => 'solid',
				],
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
			'label',
			[
				'label'       => esc_html__('Title', 'ecofinecore'),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__('Our Address', 'ecofinecore'),
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'dec',
			[
				'label'      => esc_html__('Details', 'ecofinecore'),
				'type' 		 => \Elementor\Controls_Manager::WYSIWYG,
				'default'    => esc_html__('Phone Number:012 345 678 9101', 'ecofinecore'),
				'show_label' => true,
				'dynamic'    => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'list',
			[
				'label'       => esc_html__('Info List', 'ecofinecore'),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'label' => esc_html__('Our Address', 'ecofinecore'),
						'dec'   => esc_html__('PSD Building, 2 AlBahr St, Loskia sripur, jamukara.', 'ecofinecore'),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);
		$this->add_responsive_control(
			'rezilla_class_box_aligment',
			[
				'label'     => __('Icon Position', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'row'            => [
						'title' => __('Left', 'ecofinecore'),
						'icon'  => 'eicon-h-align-left',
					],
					'column'         => [
						'title' => __('Top', 'ecofinecore'),
						'icon'  => 'eicon-v-align-top',
					],
					'row-reverse'    => [
						'title' => __('Right', 'ecofinecore'),
						'icon'  => ' eicon-h-align-right',
					],
					'column-reverse' => [
						'title' => __('Bottom', 'ecofinecore'),
						'icon'  => 'eicon-v-align-bottom',
					],
				],
				'default'   => 'left',
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item' => 'flex-direction: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'container',
			[
				'label'        => esc_html__('Enable Container', 'ecofinecore'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'ecofinecore'),
				'label_off'    => esc_html__('Hide', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$this->add_control(
			'desktop_col',
			[
				'label'   => __('Columns On Desktop', 'ecofinecore'),
				'type'    => Controls_Manager::SELECT,
				'default' => 'col-xl-4',
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
				'default' => 'col-lg-4',
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
				'label'     => __('Box Alignment', 'ecofinecore'),
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
					'{{WRAPPER}} .eco-contact-info-item' => 'text-align: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'align_alignment',
			[
				'label'     => __('Alignment', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'flex-start'    => [
						'title' => __('Left', 'ecofinecore'),
						'icon'  => 'eicon-text-align-left',
					],
					'center'  => [
						'title' => __('Center', 'ecofinecore'),
						'icon'  => 'eicon-text-align-center',
					],
					'flex-end'   => [
						'title' => __('Right', 'ecofinecore'),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'default'   => 'left',
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item' => 'align-items: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'box_bg',
				'label'    => esc_html__('Background', 'ecofinecore'),
				'types'    => ['classic', 'gradient', 'video'],
				'selector' => '{{WRAPPER}} .eco-contact-info-item',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'box_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-contact-info-item',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'box_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-contact-info-item',
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
					'{{WRAPPER}} .eco-contact-info-item' => 'border-radius: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-contact-info-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-contact-info-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
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
			'icon_tab',
			[
				'label' => __('Icon', 'ecofinecore'),
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_height',
			[
				'label'      => esc_html__('Height', 'ecofinecore'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 300,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'icon_typo',
				'label'    => esc_html__('Typography', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-contact-info-item .eco-contact-icon',
			]
		);
		$this->add_responsive_control(
			'icon_color',
			[
				'label'     => esc_html__('Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'icon_bg',
			[
				'label'     => esc_html__('Background Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-contact-info-item .eco-contact-icon',
			]
		);
		$this->add_responsive_control(
			'icon_radius',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'icon_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-contact-info-item .eco-contact-icon',
			]
		);
		$this->add_responsive_control(
			'icon_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

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
				'selector' => '{{WRAPPER}} .eco-contact-info-item .eco-contact-title',
			]
		);
		$this->add_responsive_control(
			'title_color',
			[
				'label'     => esc_html__('Title Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-title' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .eco-contact-info-item .eco-contact-dec, {{WRAPPER}} .eco-contact-info-item .eco-contact-dec p',
			]
		);
		$this->add_responsive_control(
			'dec_color',
			[
				'label'     => esc_html__('Title Color', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-dec p, {{WRAPPER}} .eco-contact-info-item .eco-contact-dec' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-dec' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-contact-info-item .eco-contact-dec' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$column = $settings['desktop_col'] . ' ' . $settings['laptop_col'] . ' ' . $settings['tab_col'];
		ob_start();
?>
		<div class="eco-contact-info-wrapper">
			<div class="container">
				<div class="row">
					<?php foreach ($settings['list'] as $item) : ?>
						<div class="<?php echo esc_attr($column); ?> col-12">
							<div class="eco-contact-info-item">
								<?php if ($item['icon']['value']) : ?>
									<div class="eco-contact-icon">
										<?php \Elementor\Icons_Manager::render_icon($item['icon'], ['aria-hidden' => 'true']); ?>
									</div>
								<?php endif; ?>
								<div class="eco-contact-content">
									<?php if ($item['label']) : ?>
										<<?php echo esc_attr($settings['html_tag']); ?> class="eco-contact-title"><?php echo esc_html($item['label']); ?></<?php echo esc_attr($settings['html_tag']); ?>>
									<?php endif; ?>
									<?php if ($item['dec']) : ?>
										<div class="eco-contact-dec"><?php echo wp_kses_post($item['dec']); ?></div>
									<?php endif; ?>
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
Plugin::instance()->widgets_manager->register(new ECOFINE_contactInfo_list_Widget);
