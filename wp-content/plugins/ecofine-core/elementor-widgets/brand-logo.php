<?php

namespace Elementor;

class ECOFINE_brand_logo_Widget extends Widget_Base
{

	public function get_name()
	{
		return 'tp_brand_logo';
	}

	public function get_title()
	{
		return esc_html__('Eco Brand Logo', 'ecofinecore');
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
			'brand_logo_options',
			[
				'label' => esc_html__('Brand Logo', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'select_style',
			[
				'label'        => esc_html__('Select Style', 'ecofinecore'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('One', 'ecofinecore'),
				'label_off'    => esc_html__('Two', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'   => __('Choose Logo', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'enable_link',
			[
				'label'        => esc_html__('Enable URL', 'ecofinecore'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'ecofinecore'),
				'label_off'    => esc_html__('Hide', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
				'dynamic'      => [
					'active' => true,
				],
			]
		);
		$repeater->add_control(
			'url',
			[
				'label'         => __('Link', 'ecofinecore'),
				'type'          => \Elementor\Controls_Manager::URL,
				'placeholder'   => __('https://your-link.com', 'ecofinecore'),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition'     => [
					'enable_link' => 'yes',
				],
				'dynamic'       => [
					'active' => true,
				],
			]
		);
		$this->add_control(
			'items',
			[
				'label'   => esc_html__('Logo List', 'ecofinecore'),
				'type'    => \Elementor\Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => [
					[
						'image' => '',
					],
				],
			]
		);
		$this->add_control(
			'filter',
			[
				'label'      => esc_html__('Filter', 'ecofinecore'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-client-item img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .eco-client-item img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->add_control(
			'hfilter',
			[
				'label'      => esc_html__('Hover Filter', 'ecofinecore'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .eco-client-item:hover img' => 'filter: contrast({{SIZE}}%);',
					'{{WRAPPER}} .eco-client-item:hover img' => '-webkit-filter: contrast({{SIZE}}%);',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'slide_option',
			[
				'label' => esc_html__('Slide Options', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'slide_enable',
			[
				'label'        => esc_html__('Enable Slide', 'ecofinecore'),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('Show', 'ecofinecore'),
				'label_off'    => esc_html__('Hide', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
			]
		);
		$this->add_control(
			'display',
			[
				'label'     => esc_html__('Display Item', 'ecofinecore'),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 30,
				'step'      => 1,
				'default'   => 5,
				'condition' => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_loop',
			[
				'label'        => esc_html__('Enable Loop ', 'ecofinecore'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('On', 'ecofinecore'),
				'label_off'    => esc_html__('Off', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_speed',
			[
				'label'     => esc_html__('Slide Speed', 'ecofinecore'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 10,
				'default'   => 4000,
				'condition' => array(
					'slide_enable' => 'yes',
					'clsl_loop'                => 'yes',

				),
			]
		);
		$this->add_control(
			'clsl_aloop',
			[
				'label'        => esc_html__('Enable Auto Loop ', 'ecofinecore'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('On', 'ecofinecore'),
				'label_off'    => esc_html__('Off', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
					'clsl_loop'                => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_aspeed',
			[
				'label'     => esc_html__('Slide auto Speed', 'ecofinecore'),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 500,
				'max'       => 8000,
				'step'      => 50,
				'default'   => 3000,
				'condition' => array(
					'clsl_aloop'               => 'yes',
					'clsl_loop'                => 'yes',
					'slide_enable' => 'yes',
				),
			]
		);
		$this->add_control(
			'clsl_dot',
			[
				'label'        => esc_html__('Enable Dots ', 'ecofinecore'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('On', 'ecofinecore'),
				'label_off'    => esc_html__('Off', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->add_control(
			'clsl_nav',
			[
				'label'        => esc_html__('Enable Nav ', 'ecofinecore'),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__('On', 'ecofinecore'),
				'label_off'    => esc_html__('Off', 'ecofinecore'),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'slide_enable' => 'yes',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'box_css_options',
			[
				'label' => esc_html__('Box', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'box_bg',
				'label' => esc_html__('Background', 'ecofinecore'),
				'types' => ['classic', 'gradient', 'video'],
				'selectors' => [
					'selector' => '{{WRAPPER}} .eco-client-section-wrapper',
				],


			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .brand-full-width',
				'selectors' => [
					'selector' => '{{WRAPPER}} .eco-client-section-wrapper',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'label' => esc_html__('Border', 'ecofinecore'),
				'selectors' => [
					'selector' => '{{WRAPPER}} .eco-client-section-wrapper',
				],
			]
		);

		$this->add_responsive_control(
			'box_radius',
			[
				'label' => esc_html__('Border Readius', 'ecofinecore'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .eco-client-section-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-client-section-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .eco-client-section-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'brand_CSS_options',
			[
				'label' => esc_html__('Item', 'ecofinecore'),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'brand_CSS_item_shadow',
				'label'    => esc_html__('Box Shadow', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-client-item img,{{WRAPPER}} .eco-client-item-style-two',
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'brand_CSS_item_border',
				'label'    => esc_html__('Border', 'ecofinecore'),
				'selector' => '{{WRAPPER}} .eco-client-item img,{{WRAPPER}} .eco-client-item-style-two',
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_radius',
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
					'{{WRAPPER}} .eco-client-item img' => 'border-radius: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .eco-client-item-style-two' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_margin',
			[
				'label'      => esc_html__('Margin', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-client-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-client-item-style-two' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'brand_CSS_item_padding',
			[
				'label'      => esc_html__('Padding', 'ecofinecore'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .eco-client-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .eco-client-item-style-two' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();
	}
	//Render
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		$dynamic_id = rand(1241, 3256);
		if ($settings['slide_enable'] == 'yes') {
			$noslide = 'enable-slide';
			echo '
                <script>
                jQuery(document).ready(function($) {
                "use strict";
                $("#logo-slide-' . esc_attr($dynamic_id) . '").slick({
                slidesToShow:' . json_encode($settings['display']) . ',
                slidesToScroll: 5,
                rtl: ' . json_encode(is_rtl() == 'yes' ? true : false) . ',
                dots: ' . json_encode($settings['clsl_dot'] == 'yes' ? true : false) . ',
                arrows: ' . json_encode($settings['clsl_nav'] == 'yes' ? true : false) . ',
                infinite: ' . json_encode($settings['clsl_loop'] == 'yes' ? true : false) . ',
                autoplay: ' . json_encode($settings['clsl_aloop'] == 'yes' ? true : false) . ',';
			if ($settings['clsl_loop'] == 'yes') {
				echo 'speed: ' . esc_attr($settings['clsl_speed']) . ',';
			}
			if ($settings['clsl_aloop'] == 'yes') {
				echo 'autoplaySpeed: ' . esc_attr($settings['clsl_aspeed']) . ',';
			}
			echo '
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4,
                            }
                        },
                        {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            }
                        },
                        {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                            }
                        },
                        {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>';
		} else {
			$noslide = 'no-slide';
		}
		if ($settings['select_style'] == 'yes') {
			$style = 'eco-client-item';
		} else {
			$style = 'eco-client-item-style-two';
		}
		ob_start();
?>
		<div class="eco-client-section-wrapper">
			<div class="container">
				<div class="row">
					<div class="eco-client-items <?php echo esc_attr($noslide); ?>" id="logo-slide-<?php echo esc_attr($dynamic_id); ?>">
						<?php foreach ($settings['items'] as $item) : ?>
							<div class="<?php echo esc_attr($style); ?>">
								<?php if ($item['enable_link'] == 'yes') :
									$url      = $item['url']['url'];
									$target   = $item['url']['is_external'] ? ' target="_blank"' : '';
									$nofollow = $item['url']['nofollow'] ? ' rel="nofollow"' : '';
								?>
									<a href="<?php echo esc_url($url); ?>" <?php echo $target . $nofollow; ?>>
									<?php endif;
								echo wp_get_attachment_image($item['image']['id'], 'full');
								if ($item['enable_link'] == 'yes') : ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
<?php
		echo ob_get_clean();
	}
}
Plugin::instance()->widgets_manager->register(new ECOFINE_brand_logo_Widget);
