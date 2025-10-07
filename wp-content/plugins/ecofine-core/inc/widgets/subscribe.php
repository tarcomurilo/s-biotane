<?php if ( !defined( 'ABSPATH' ) ) {die;} // Cannot access directly.

CSF::createWidget( 'ecofinecore_newsletter_widget', array(
    'title'       => esc_html__( 'Ecofine Newletter Widget', 'ecofinecore' ),
    'classname'   => 'ecofinecore-subscribe-widgets eco-custom-widget',
    'description' => esc_html__( 'Add Newsletter Info', 'ecofinecore' ),
    'fields'      => array(
        array(
            'id'      => 'title',
            'type'    => 'text',
            'default' => esc_html__( 'Newsletter', 'ecofinecore' ),
            'title'   => esc_html__( 'Title', 'ecofinecore' ),
        ),
        array(
            'id'      => 'newsletter_dec',
            'type'    => 'textarea',
            'title'   => esc_html__( 'Sort Description', 'ecofinecore' ),
            'desc'    => esc_html__( 'Add Sort Description', 'ecofinecore' ),
            'default' => esc_html__( 'Our service has the upper hand in overcoming', 'ecofinecore' ),
        ),
        array(
            'id'          => 'select_newsletter',
            'type'        => 'select',
            'title'       => esc_html__( 'Select Type', 'ecofinecore' ),
            'placeholder' => esc_html__( 'Select an option', 'ecofinecore' ),
            'options'     => array(
                '1' => esc_html__( 'Shortcode form Plugin', 'ecofinecore' ),
                '2' => esc_html__( 'Add Link', 'ecofinecore' ),
            ),
            'default'     => '2',
        ),
        array(
            'id'         => 'newsletter_shortcode',
            'type'       => 'textarea',
            'title'      => esc_html__( 'Add Shortcode', 'ecofinecore' ),
            'desc'       => esc_html__( 'Add Shortcode from Mailchip wordpress Plugin', 'ecofinecore' ),
            'dependency' => array( 'select_newsletter', '==', '1' ),
        ),
        array(
            'id'         => 'newsletter_link',
            'type'       => 'textarea',
            'title'      => esc_html__( 'Add Link', 'ecofinecore' ),
            'desc'       => esc_html__( 'Add Newsletter Link from your Account', 'ecofinecore' ),
            'dependency' => array( 'select_newsletter', '==', '2' ),
        ),
        array(
            'type'    => 'subheading',
            'content' => esc_html__( 'CSS Options', 'ecofinecore' ),
        ),
        array(
            'id'          => 'newsletter_bg',
            'type'        => 'color',
            'title'       => esc_html__( 'Background', 'ecofinecore' ),
            'output_mode' => 'background-color',
        ),
    ),
) );

// OutPut
if ( !function_exists( 'ecofinecore_newsletter_widget' ) ) {
    function ecofinecore_newsletter_widget( $args, $instance ) {
        echo wp_kses_post( $args['before_widget'] );
        echo '<div class="subscribe-widget" style="background:' . $instance['newsletter_bg'] . '">';
        if ( !empty( $instance['title'] ) ) {
            echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title widtet-title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
        }
        ?>
        <div class="company-subscribe-widget">
            <?php if ( !empty( $instance['newsletter_dec'] ) ): ?>
                <p>
                    <?php echo esc_html( $instance['newsletter_dec'] ); ?>
                </p>
            <?php endif;?>
            <?php
            if ( $instance['select_newsletter'] == '1' ) {
            ?>
                <div class="subscribe-form">
                    <?php echo do_shortcode( $instance['newsletter_shortcode'] ); ?>
                </div>
            <?php
            } else {
            ?>
            <div class="subscribe-form">
                <form action="<?php echo esc_url( $instance['newsletter_link'] ) ?>" method="post">
                    <div class="mc4wp-form-fields">
                        <input type="email" name="EMAIL" placeholder="<?php esc_attr_e( 'Your Email Address', 'ecofinecore' );?>" required="" />
                        <button value="submit"> <i class="fa fa-location-arrow"></i> </button>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
        <?php
    echo '</div>';
        echo wp_kses_post( $args['after_widget'] );
    }
}