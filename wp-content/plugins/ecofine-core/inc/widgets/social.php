<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

// Social Links
CSF::createWidget( 'ecofinecore_social_widget', array(
    'title'       => esc_html__( 'Ecofine Social Widget', 'ecofinecore' ),
    'classname'   => 'ecofinecore-social-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Social Info', 'ecofinecore' ),
    'fields'      => array(
        array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__( 'Title', 'ecofinecore' ),
        ),
        array(
            'id'      => 'ecofinecore_socials_widget',
            'type'    => 'group',
            'title'   => esc_html__( 'Add Social Links', 'ecofinecore' ),
            'fields'  => array(
                array(
                    'id'    => 'ecofinecore_social_label',
                    'type'  => 'text',
                    'title' => esc_html__( 'Name', 'ecofinecore' ),
                ),
                array(
                    'id'    => 'ecofinecore_social_link',
                    'type'  => 'text',
                    'title' => esc_html__( 'Site Link', 'ecofinecore' ),
                ),
                array(
                    'id'    => 'ecofinecore_social_icon',
                    'type'  => 'icon',
                    'title' => esc_html__( 'Site Icon', 'ecofinecore' ),
                ),
            ),
            'default' => array(
                array(
                    'ecofinecore_social_label' => esc_html__( 'Facebook', 'ecofinecore' ),
                    'ecofinecore_social_link'  => '#',
                    'ecofinecore_social_icon'  => 'fab fa-facebook',
                ),
                array(
                    'ecofinecore_social_label' => esc_html__( 'Twitter', 'ecofinecore' ),
                    'ecofinecore_social_link'  => '#',
                    'ecofinecore_social_icon'  => 'fab fa-twitter',
                ),
                array(
                    'ecofinecore_social_label' => esc_html__( 'Linkedin', 'ecofinecore' ),
                    'ecofinecore_social_link'  => '#',
                    'ecofinecore_social_icon'  => 'fab fa-linkedin',
                ),
                array(
                    'ecofinecore_social_label' => esc_html__( 'Instagram', 'ecofinecore' ),
                    'ecofinecore_social_link'  => '#',
                    'ecofinecore_social_icon'  => 'fab fa-instagram',
                ),
            ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'ecofinecore_social_widget' ) ) {
    function ecofinecore_social_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
            <div class="eco-social-widgets-box">
                <ul>
                    <?php foreach ( $instance['ecofinecore_socials_widget'] as $social ) {
                    echo ' <li><a href="' . esc_url( $social['ecofinecore_social_link'] ) . '" data-toggle="tooltip" data-placement="top" title="' . esc_attr( $social['ecofinecore_social_label'] ) . '"><i class="' . esc_attr( $social['ecofinecore_social_icon'] ) . '"></i></a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}