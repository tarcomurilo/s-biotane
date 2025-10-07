<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'ecofinecore_nabber_widget', array(
    'title'       => esc_html__( 'Ecofine Banner Widget', 'ecofinecore' ),
    'classname'   => 'ecofinecore-banner-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Your Banner Info', 'ecofinecore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'default' => __( 'Work  Together', 'ecofinecore' ),
            'title'   => esc_html__( 'Title', 'ecofinecore' ),
        ),
        array(
            'id'      => 'ecofinecore_banner_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Content', 'ecofinecore' ),
            'default' => __( 'Bur wemust ipsum dolor sit amet consectetur adipisicing elit sed eiusmod tempor incididunt ut labore', 'ecofinecore' ),
        ),
        array(
            'id'    => 'ecofinecore_banner_link',
            'type'  => 'link',
            'title' => esc_html__( 'Link', 'ecofinecore' ),
        ),
        array(
            'id'      => 'ecofinecore_banner_link_text',
            'type'    => 'text',
            'title'   => esc_html__( 'Link Text', 'ecofinecore' ),
            'default' => __( 'Contact Now', 'ecofinecore' ),
        ),
        array(
            'id'           => 'ecofinecore_banner_widget_bg',
            'type'         => 'upload',
            'title'        => esc_html__( 'Background/Image', 'ecofinecore' ),
            'library'      => 'image',
            'placeholder'  => 'http://',
            'button_title' => esc_html__( 'Add Image', 'ecofinecore' ),
            'remove_title' => esc_html__( 'Remove Image', 'ecofinecore' ),
        ),
    ),
) );

// OutPut
if ( !function_exists( 'ecofinecore_nabber_widget' ) ) {
    function ecofinecore_nabber_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        ?>
            <div class="ecofinecore-widget-banner-wrapper" style="background-image:url(<?php echo esc_url( $instance['ecofinecore_banner_widget_bg'] ); ?>)">
                <?php if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }?>
                <div class="ecofinecore-banner-dec">
                    <p><?php echo esc_html( $instance['ecofinecore_banner_dec'] ); ?></p>
                </div>
                <div class="ecofinecore-banner-btn button">
                    <a href="<?php echo esc_url( $instance['ecofinecore_banner_link']['url'] ); ?>" class="theme-btns"><span><?php echo esc_html( $instance['ecofinecore_banner_link_text'] ); ?><i class="fas fa-angle-double-right"></i></span></a>
                </div>
            </div>
        <?php
echo wp_kses_post( $args['after_widget'] );
    }
}