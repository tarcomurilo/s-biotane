<?php
    $ecofine_copyright_text = ecofine_options( 'ecofine_copyright_text' );
    $ecofine_ftmenu_fieldset = ecofine_options( 'ecofine_ftmenu_fieldset' );
	$ecofine_fttop = ecofine_options( 'ecofine_show_ft_top2' );
    $ecofine_ft_top2_options = ecofine_options( 'ecofine_ft_top2_options' );
if ( is_active_sidebar( 'footer-1' ) || class_exists( 'CSF' ) ) {
    $active_widgets = 'widget-yes';
} else {
    $active_widgets = 'widget-no';
}

if ( '1' === ecofine_options( 'ecofine_show_ft_menu' ) ) {
    $ecofine_col = 'col-lg-6 col-md-12 col-sm-12 col-12';
    $ecofine_tcenter = '';
} else {
    $ecofine_col = 'col-lg-12 col-md-12 col-sm-12 col-12';
    $ecofine_tcenter = 'text-center';
}

if ( is_page() || is_singular( 'post' ) || is_singular( 'ecofine_portfolio' ) || is_singular( 'ecofine_team' ) && get_post_meta( $post->ID, 'ecofine_metabox', true ) ) {
    $ecofineMeta = get_post_meta( $post->ID, 'ecofine_metabox', true );
} else {
    $ecofineMeta = array();
}
if ( is_array( $ecofineMeta ) && array_key_exists( 'ecofine_meta_footer2_top_show', $ecofineMeta ) && array_key_exists( 'ecofine_meta_footer_styles', $ecofineMeta ) && $ecofineMeta['ecofine_meta_footer_styles'] == true && get_post_meta( $post->ID, 'ecofine_metabox', true ) ) {
    $FooterTop = $ecofineMeta['ecofine_meta_footer2_top_show'];
} elseif ( !empty( $ecofine_fttop ) && class_exists( 'CSF' ) ) {
     $FooterTop = $ecofine_fttop;
} else {
    $FooterTop = '0';
}
if( $FooterTop == '1' ){
	$show_top = 'footer-top-yes';
}else{
	$show_top = 'footer-top-no';
}
?>
<footer id="colophon" class="site-footer footer-two <?php echo esc_attr( $active_widgets ); ?> <?php echo esc_attr($show_top); ?>">
    <?php if ( !empty($FooterTop === '1' ) ) :
	
	?>
	    <div class="footer-top">
	        <div class="container">
	            <div class="footer-top-inner">
	                <div class="row">
                        <?php foreach($ecofine_ft_top2_options['ecofine_ft_top2_group'] as $info ) : ?>
	                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 ft-top-item">
	                        <div class="ft-top-info">
	                            <div class="icon">
	                                <i class="<?php echo esc_attr($info['ecofine_ft_top2_icon']); ?>"></i>
	                            </div>
	                            <div class="info">
                                    <?php if(!empty($info['ecofine_ft_top2_label'])) : ?>
	                                <h3 class="footer-icon-title"><?php echo esc_html($info['ecofine_ft_top2_label']); ?></h3>
                                    <?php endif; ?>
	                                <div class="footer-top-des"><?php echo wp_kses( $info['ecofine_ft_top2_content'], 'ecofine_allowed_html' ); ?></div>
	                            </div>
	                        </div>
	                    </div>
                        <?php endforeach; ?>
	                </div>
	            </div>
	        </div>
	    </div>
	    <?php endif;?>
    <div class="footer-widgets-area">
        <?php get_template_part( 'inc/footer/footer', 'widgets' );?>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-inner">
                <div class="row d-flex align-items-center">
                    <div class="<?php echo esc_attr( $ecofine_col ); ?>">
                        <div class="site-info <?php echo esc_attr( $ecofine_tcenter ); ?>">
                            <?php echo wp_kses( $ecofine_copyright_text, 'ecofine_allowed_html' ); ?>
                        </div><!-- .site-info -->
                    </div>
                    <?php if ( '1' === ecofine_options( 'ecofine_show_ft_menu' ) ) : ?>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="footer-menu">
                        <?php 
                            if ( isset( $ecofine_ftmenu_fieldset['ecofine_ftmenu'] ) ) {
                                wp_nav_menu(
                                    array(
                                        'container'         => false,
                                        'menu'              => $ecofine_ftmenu_fieldset['ecofine_ftmenu'],
                                        'theme_location'    =>  $ecofine_ftmenu_fieldset['ecofine_ftmenu'],
                                        'menu_id'           => 'ftmenu',
                                        'menu_class'        => 'ftmenu',
                                        'echo'              => true,
                                    )
                                );
                            }
                        ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>