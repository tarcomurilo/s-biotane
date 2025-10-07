<?php
use Elementor\Controls_Manager;
use Elementor\Core\Breakpoints\Manager;
use Elementor\Repeater;

/**
 *
 * Multiple images backend controls.
 *
 */
function ecofinecore_section_image_controls( $widget ) {

    $widget->start_controls_section( 'tp_multiple_section_images', array(
        'label' => __( 'eco Section Images', 'ecofinecore' ),
        'tab'   => Controls_Manager::TAB_STYLE,
    ) );

    $repeater = new Repeater();

    $repeater->add_responsive_control( 'image', [
        'label'     => __( 'Image', 'ecofinecore' ),
        'type'      => Controls_Manager::MEDIA,
        'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-image: url("{{URL}}");',
        ],
    ] );

    $repeater->add_responsive_control( 'position', [
        'label'     => 'Position',
        'type'      => Controls_Manager::SELECT,
        'options'   => [
            ''              => __( 'Default', 'ecofinecore' ),
            'center center' => __( 'Center Center', 'ecofinecore' ),
            'center left'   => __( 'Center Left', 'ecofinecore' ),
            'center right'  => __( 'Center Right', 'ecofinecore' ),
            'top center'    => __( 'Top Center', 'ecofinecore' ),
            'top left'      => __( 'Top Left', 'ecofinecore' ),
            'top right'     => __( 'Top Right', 'ecofinecore' ),
            'bottom center' => __( 'Bottom Center', 'ecofinecore' ),
            'bottom left'   => __( 'Bottom Left', 'ecofinecore' ),
            'bottom right'  => __( 'Bottom Right', 'ecofinecore' ),
            'initial'       => __( 'Custom', 'ecofinecore' ),
        ],
        'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{VALUE}};',
        ],
    ] );

    $repeater->add_responsive_control( 'xpos', [
        'label'          => __( 'X Position', 'ecofinecore' ),
        'type'           => Controls_Manager::SLIDER,
        'size_units'     => ['px', 'em', '%', 'vw'],
        'default'        => [
            'unit' => 'px',
            'size' => 0,
        ],
        'tablet_default' => [
            'unit' => 'px',
            'size' => 0,
        ],
        'mobile_default' => [
            'unit' => 'px',
            'size' => 0,
        ],
        'range'          => [
            'px' => [
                'min' => -2000,
                'max' => 2000,
            ],
            'em' => [
                'min' => -100,
                'max' => 100,
            ],
            '%'  => [
                'min' => -100,
                'max' => 100,
            ],
            'vw' => [
                'min' => -100,
                'max' => 100,
            ],
        ],
        'selectors'      => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos.SIZE}}{{ypos.UNIT}}',
        ],
        'condition'      => [
            'position' => ['initial'],
        ],
        'required'       => true,
        'device_args'    => [
            Manager::BREAKPOINT_KEY_TABLET => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos_tablet.SIZE}}{{ypos_tablet.UNIT}}',
                ],
                'condition' => [
                    'position_tablet' => ['initial'],
                ],
            ],
            Manager::BREAKPOINT_KEY_MOBILE => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{SIZE}}{{UNIT}} {{ypos_mobile.SIZE}}{{ypos_mobile.UNIT}}',
                ],
                'condition' => [
                    'position_mobile' => ['initial'],
                ],
            ],
        ],
    ] );

    $repeater->add_responsive_control( 'ypos', [
        'label'          => __( 'Y Position', 'ecofinecore' ),
        'type'           => Controls_Manager::SLIDER,
        'size_units'     => ['px', 'em', '%', 'vh'],
        'default'        => [
            'unit' => 'px',
            'size' => 0,
        ],
        'tablet_default' => [
            'unit' => 'px',
            'size' => 0,
        ],
        'mobile_default' => [
            'unit' => 'px',
            'size' => 0,
        ],
        'range'          => [
            'px' => [
                'min' => -800,
                'max' => 800,
            ],
            'em' => [
                'min' => -100,
                'max' => 100,
            ],
            '%'  => [
                'min' => -100,
                'max' => 100,
            ],
            'vh' => [
                'min' => -100,
                'max' => 100,
            ],
        ],
        'selectors'      => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos.SIZE}}{{xpos.UNIT}} {{SIZE}}{{UNIT}}',
        ],
        'condition'      => [
            'position' => ['initial'],
        ],
        'required'       => true,
        'device_args'    => [
            Manager::BREAKPOINT_KEY_TABLET => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos_tablet.SIZE}}{{xpos_tablet.UNIT}} {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'position_tablet' => ['initial'],
                ],
            ],
            Manager::BREAKPOINT_KEY_MOBILE => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-position: {{xpos_mobile.SIZE}}{{xpos_mobile.UNIT}} {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'position_mobile' => ['initial'],
                ],
            ],
        ],
    ] );

    $repeater->add_responsive_control( 'size', [
        'label'     => 'Size',
        'type'      => Controls_Manager::SELECT,
        'default'   => '',
        'options'   => [
            ''        => __( 'Default', 'ecofinecore' ),
            'auto'    => __( 'Auto', 'ecofinecore' ),
            'cover'   => __( 'Cover', 'ecofinecore' ),
            'contain' => __( 'Contain', 'ecofinecore' ),
            'initial' => __( 'Custom', 'ecofinecore' ),
        ],
        'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{VALUE}};',
        ],
    ] );

    $repeater->add_responsive_control( 'bg_width', [
        'label'       => __( 'Width', 'ecofinecore' ),
        'type'        => Controls_Manager::SLIDER,
        'size_units'  => ['px', 'em', '%', 'vw'],
        'range'       => [
            'px' => [
                'min' => 0,
                'max' => 1000,
            ],
            '%'  => [
                'min' => 0,
                'max' => 100,
            ],
            'vw' => [
                'min' => 0,
                'max' => 100,
            ],
        ],
        'default'     => [
            'size' => 100,
            'unit' => '%',
        ],
        'required'    => true,
        'selectors'   => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',
        ],
        'condition'   => [
            'size' => ['initial'],
        ],
        'device_args' => [
            Manager::BREAKPOINT_KEY_TABLET => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',
                ],
                'condition' => [
                    'size_tablet' => ['initial'],
                ],
            ],
            Manager::BREAKPOINT_KEY_MOBILE => [
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-size: {{SIZE}}{{UNIT}} auto',
                ],
                'condition' => [
                    'size_mobile' => ['initial'],
                ],
            ],
        ],
    ] );
    $repeater->add_responsive_control(
        'zindex',
        [
            'label' => esc_html__( 'Z index', 'ecofinecore' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'min' => -1,
            'max' => 999999,
            'step' => 1,
            'selectors'   => [
                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'z-index: {{VALUE}}',
            ],
        ]
    );
    $repeater->add_responsive_control(
        'dispaly',
        [
            'label' => esc_html__( 'Dispaly', 'ecofinecore' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'block',
            'options' => [
                'none'  => esc_html__( 'None', 'ecofinecore' ),
                'block' => esc_html__( 'Block', 'ecofinecore' ),
            ],
            'selectors'   => [
                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'display: {{VALUE}}',
            ],
        ]
    );

    $repeater->add_control(
        'enable_animation',
        [
            'label'        => esc_html__( 'Enable Animation', 'ecofinecore' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Show', 'ecofinecore' ),
            'label_off'    => esc_html__( 'Hide', 'ecofinecore' ),
            'return_value' => 'yes',
            'default'      => 'yes',
        ]
    );
    $repeater->add_responsive_control( 'animation', [
        'label'     => esc_html__( 'Select Animation', 'ecofinecore' ),
        'type'      => \Elementor\Controls_Manager::SELECT,
        'default'   => 'bounce',
        'options'   => [
            'unset'              => esc_html__( 'None', 'ecofinecore' ),
            'shapeMover'        => esc_html__( 'Shape Mover', 'ecofinecore' ),
            'bubbleMover'       => esc_html__( 'Bubble Mover', 'ecofinecore' ),
            'bounce'            => esc_html__( 'Bounce', 'ecofinecore' ),
            'zoomIn'            => esc_html__( 'ZoomIn', 'ecofinecore' ),
            'flash'             => esc_html__( 'Flash', 'ecofinecore' ),
            'pulse'             => esc_html__( 'Pulse', 'ecofinecore' ),
            'rubberBand'        => esc_html__( 'Rubber Band', 'ecofinecore' ),
            'shake'             => esc_html__( 'ShakeX', 'ecofinecore' ),
            'fadeIn'            => esc_html__( 'FadeIn', 'ecofinecore' ),
            'fadeInDown'        => esc_html__( 'FadeIn Down', 'ecofinecore' ),
            'fadeInLeft'        => esc_html__( 'FadeIn Left', 'ecofinecore' ),
            'fadeInRight'       => esc_html__( 'FadeIn Right', 'ecofinecore' ),
            'fadeInUp'          => esc_html__( 'FadeIn Up', 'ecofinecore' ),
            'fadeOut'           => esc_html__( 'FadeOut', 'ecofinecore' ),
            'fadeOutDown'       => esc_html__( 'FadeOut Down', 'ecofinecore' ),
            'fadeOutLeft'       => esc_html__( 'FadeOut Left', 'ecofinecore' ),
            'fadeOutRight'      => esc_html__( 'FadeOut Right', 'ecofinecore' ),
            'fadeOutUp'         => esc_html__( 'FadeOut Up', 'ecofinecore' ),
            'flip'              => esc_html__( 'Flip', 'ecofinecore' ),
            'flipInX'           => esc_html__( 'FlipInX', 'ecofinecore' ),
            'flipInY'           => esc_html__( 'FlipInY', 'ecofinecore' ),
            'rotateIn'          => esc_html__( 'RotateIn', 'ecofinecore' ),
            'rotateInDownLeft'  => esc_html__( 'RotateIn Down Left', 'ecofinecore' ),
            'rotateInDownRight' => esc_html__( 'RotateIn Down Right', 'ecofinecore' ),
            'rotateInUpLeft'    => esc_html__( 'RotateIn Up Left', 'ecofinecore' ),
            'rotateInUpRight'   => esc_html__( 'RotateIn Up Right', 'ecofinecore' ),
            'rotateOut'         => esc_html__( 'Rotate Out', 'ecofinecore' ),
            'hinge'             => esc_html__( 'Hinge', 'ecofinecore' ),
            'slideInDown'       => esc_html__( 'SlideIn Down', 'ecofinecore' ),
            'slideInLeft'       => esc_html__( 'SlideIn Left', 'ecofinecore' ),
            'slideInRight'      => esc_html__( 'SlideIn Right', 'ecofinecore' ),
        ],
        'selectors' => [
            '{{WRAPPER}} {{CURRENT_ITEM}}' => 'animation-name: {{VALUE}};-webkit-animation-name: {{VALUE}}',
        ],
        'condition' => [
            'enable_animation' => 'yes',
        ],
    ] );
    $repeater->add_control(
        'animation_time',
        [
            'label' => esc_html__( 'Duration Time', 'ecofinecore' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0.1,
                    'max' => 30,
                    'step' => 0.1,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} {{CURRENT_ITEM}}' => 'animation-duration: {{SIZE}}s;-webkit-animation-duration: {{SIZE}}s',
            ],
            'condition' => [
                'enable_animation' => 'yes',
            ],
        ]
    );
    $widget->add_control( 'tp_section_images', [
        'label'         => __( 'Images', 'ecofinecore' ),
        'type'          => Controls_Manager::REPEATER,
        'fields'        => $repeater->get_controls(),
        'render_type'   => 'template',
        'prevent_empty' => false,
    ] );

    $widget->end_controls_section();

}

add_action( 'elementor/element/section/section_typo/after_section_end', 'ecofinecore_section_image_controls', 100 );

/**
 *
 * Multiple background frontend render
 *
 */
function ecofinecore_before_render_section_images( $widget ) {

    $settings = $widget->get_settings_for_display();

    if ( !empty( $settings['tp_section_images'] ) ) {

        $widget->add_render_attribute( '_wrapper', 'data-eco-section-image', 'yes' );

        foreach ( $settings['tp_section_images'] as $index => $item ) {
            if ( $item['enable_animation'] === 'yes' ) {
                $animation = 'shapeanimation';
            } else {
                $animation = '';
            }
            echo '<div class="' . esc_attr( $animation ) . ' eco-section-image eco-section-image-' . $widget->get_id() . ' elementor-repeater-item-' . esc_attr( $item['_id'] ) . '"></div>';
        }

    }

}

add_action( 'elementor/frontend/section/before_render', 'ecofinecore_before_render_section_images' );

/**
 *
 * Section Image frontend js
 *
 */
function ecofinecore_frontend_enqueue_scripts() {
    wp_enqueue_script( 'eco-shape', plugins_url( 'shape.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
}

add_action( 'elementor/frontend/after_enqueue_scripts', 'ecofinecore_frontend_enqueue_scripts' );