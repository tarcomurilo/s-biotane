<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecofine
 */
$ecofine_enable_top_to_bottom = ecofine_options('ecofine_enable_top_to_bottom', true);
$ecofine_enable_ttb_icon = ecofine_options('ecofine_enable_ttb_icon');
if ( is_page() || is_singular( 'post' ) || is_singular( 'ecofine_portfolio' ) || is_singular( 'ecofine_team' ) && get_post_meta( $post->ID, 'ecofine_metabox', true ) ) {
    $ecofineMeta = get_post_meta( $post->ID, 'ecofine_metabox', true );
} else {
    $ecofineMeta = array();
}

$ecofine_footer_styles = ecofine_options( 'ecofine_footer_styles' );
$ecofine_enable_top_to_bottom = ecofine_options( 'ecofine_enable_top_to_bottom', true );
$ecofine_enable_ttb_icon = ecofine_options( 'ecofine_enable_ttb_icon', 'fa fa-angle-up' );

$footer_type = ecofine_options('select_footer_type');

if( $footer_type === 'footer_elementor' || is_array( $ecofineMeta ) && array_key_exists( 'select_footer_meta_type', $ecofineMeta ) && $ecofineMeta['select_footer_meta_type'] === 'footermeta_elementor' ){

    if ( is_array( $ecofineMeta ) && array_key_exists( 'footer_style_meta', $ecofineMeta ) && $ecofineMeta['footer_style_meta'] != '' && $ecofineMeta['footer_style_meta'] != 'default' ) {
        $footer_query = new WP_Query( [
            'post_type'      => 'ecofine_footer',
            'posts_per_page' => -1,
            'p'              => $ecofineMeta['footer_style_meta'],
        ] );
    
    } elseif(!empty(ecofine_options('site_elementor_footer'))){
        $footer_query = new WP_Query( [
            'post_type'      => 'ecofine_footer',
            'posts_per_page' => -1,
            'p'              => ecofine_options('site_elementor_footer'),
        ] );
    }else{
        $footer_query = '';
    }

}else{

    if ( is_array( $ecofineMeta ) && array_key_exists( 'ecofine_meta_footer_styles', $ecofineMeta ) && array_key_exists( 'ecofine_meta_footer_style_shwo', $ecofineMeta ) && $ecofineMeta['ecofine_meta_footer_style_shwo'] == true && get_post_meta( $post->ID, 'ecofine_metabox', true ) ) {
        $selectedFooter = $ecofineMeta['ecofine_meta_footer_styles'];
    } elseif ( !empty( $ecofine_footer_styles ) && class_exists( 'CSF' ) ) {
        $selectedFooter = ecofine_options( 'ecofine_footer_styles' );
    } else {
        $selectedFooter = 'one';
    }

}
if( $footer_type === 'footer_elementor' || is_array( $ecofineMeta ) && array_key_exists( 'select_footer_meta_type', $ecofineMeta ) && $ecofineMeta['select_footer_meta_type'] === 'footermeta_elementor' ){

    if(!empty($footer_query) && $footer_query->have_posts()){
        while ( $footer_query->have_posts() ) : $footer_query->the_post();
                the_content();
            endwhile;
            wp_reset_postdata();
    }else{
        get_template_part( 'inc/footer/footer-one' );
    }

}else{
    get_template_part( 'inc/footer/footer-' . $selectedFooter . '' );
}

?>

<?php if ( $ecofine_enable_top_to_bottom == true ) : ?>
    <div class="to-top" id="back-top">
        <i class="<?php echo esc_attr( $ecofine_enable_ttb_icon ); ?>"></i>
    </div>
<?php endif;?>

</div><!-- #page -->
<?php wp_footer();?>

</body>
</html>