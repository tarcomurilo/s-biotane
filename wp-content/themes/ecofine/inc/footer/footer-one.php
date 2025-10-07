<?php
if ( is_active_sidebar( 'footer-1' ) || class_exists( 'CSF' ) ) {
    $active_widgets = 'widget-yes';
} else {
    $active_widgets = 'widget-no';
}
$ecofine_copyright_text = ecofine_options( 'ecofine_copyright_text' );
$ecofine_ft_socials = ecofine_options( 'ecofine_ft_social_fieldset' );

if ( '1' === ecofine_options( 'ecofine_show_ft_social' ) ) {
    $ecofine_col = 'col-lg-6 col-md-6 col-sm-12 col-12';
    $ecofine_tcenter = '';
} else {
    $ecofine_col = 'col-lg-12 col-md-12 col-sm-12 col-12';
    $ecofine_tcenter = 'text-center';
}
?>
<footer id="colophon" class="site-footer footer-one <?php echo esc_attr( $active_widgets ); ?>">

    <div class="footer-widgets-area">
        <?php get_template_part( 'inc/footer/footer', 'widgets' );?>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="<?php echo esc_attr( $ecofine_col ); ?>">
                    <div class="site-info <?php echo esc_attr( $ecofine_tcenter ); ?>">
                        <?php echo wp_kses( $ecofine_copyright_text, 'ecofine_allowed_html' ); ?>
                    </div><!-- .site-info -->
                </div>
                <?php if ( '1' === ecofine_options( 'ecofine_show_ft_social' ) ): ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="social-icons">
                        <ul>
                        <?php
                            foreach ( $ecofine_ft_socials['ecofine_ft_socials'] as $ecofine_ft_social ) {
                                echo '<li><a href="' . esc_url( $ecofine_ft_social['ecofine_ft_social_link']['url'] ) . '" title="' . esc_attr( $ecofine_ft_social['ecofine_ft_social_label'] ) . '" target="' . $ecofine_ft_social['ecofine_ft_social_link']['target'] . '"><i class="' . esc_attr( $ecofine_ft_social['ecofine_ft_social_icon'] ) . '"></i></a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->