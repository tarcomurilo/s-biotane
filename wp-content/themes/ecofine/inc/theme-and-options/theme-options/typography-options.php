<?php
// Create typography section
CSF::createSection( $EcofineThemeOption, array(
    'title'  => esc_html__( 'Typography', 'ecofine' ),
    'id'     => 'ecofine_typography_options',
    'icon'   => 'fa fa-text-width',
    'fields' => array(

        array(
            'id'           => 'ecofine_body_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Body', 'ecofine' ),
            'output'       => 'body',
            'default'      => array(
                'font-family'  => 'Manrope',
                'font-size'    => '16',
                'unit'         => 'px',
                'font-weight'  => '400',
                'extra-styles' => array( '300', '400', '500', '600', '700', '800', '900', '300i', '400i', '500i', '600i', '700i', '800i', '900i' ),
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set body typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h1_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading One', 'ecofine' ),
            'output'       => 'h1',
            'extra_styles' => true,
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'subtitle'     => esc_html__( 'Set heading one typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h2_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Two', 'ecofine' ),
            'output'       => 'h2',
            'extra_styles' => true,
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'subtitle'     => esc_html__( 'Set heading two typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h3_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Three', 'ecofine' ),
            'output'       => 'h3',
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading three typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h4_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Four', 'ecofine' ),
            'output'       => 'h4',
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading four typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h5_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Five', 'ecofine' ),
            'output'       => 'h5',
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading five typography.', 'ecofine' ),
        ),

        array(
            'id'           => 'ecofine_h6_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Heading Six', 'ecofine' ),
            'output'       => 'h6',
            'default'      => array(
                'font-family' => 'Manrope',
                'unit'        => 'px',
                'font-weight' => '700',
            ),
            'extra_styles' => true,
            'subtitle'     => esc_html__( 'Set heading six typography.', 'ecofine' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'Header Menu Typography', 'ecofine' ),
        ),
        array(
            'id'           => 'ecofine_header_menu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Menu', 'ecofine' ),
            'output'       => '.main-navigation ul li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Menu typography.', 'ecofine' ),
        ),
        array(
            'id'           => 'ecofine_header_smenu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Sub Menu', 'ecofine' ),
            'output'       => '.main-navigation ul li ul li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Sub Menu typography.', 'ecofine' ),
        ),
        array(
            'id'           => 'ecofine_header_megamenu_typo',
            'type'         => 'typography',
            'title'        => esc_html__( 'Header Mega Menu', 'ecofine' ),
            'output'       => '.stellarnav.desktop li.mega li li a',
            'extra_styles' => true,
            'color'        => false,
            'subtitle'     => esc_html__( 'Set Header Nav Mega Menu typography.', 'ecofine' ),
        ),
    ),
) );
// End typography section