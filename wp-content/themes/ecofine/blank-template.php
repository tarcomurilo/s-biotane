<?php
/**
 *Template Name: Blank Template
 */

get_header();

if ( get_post_meta( get_the_ID(), 'ecofine_metabox', true ) ) {
    $ecofine_commonMeta = get_post_meta( get_the_ID(), 'ecofine_metabox', true );
} else {
    $ecofine_commonMeta = array();
}

if ( array_key_exists( 'ecofine_meta_enable_banner', $ecofine_commonMeta ) ) {
    $ecofine_postBanner = $ecofine_commonMeta['ecofine_meta_enable_banner'];
} else {
    $ecofine_postBanner = true;
}

if ( array_key_exists( 'ecofine_meta_custom_title', $ecofine_commonMeta ) ) {
    $ecofine_customTitle = $ecofine_commonMeta['ecofine_meta_custom_title'];
} else {
    $ecofine_customTitle = '';
}

$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );

?>
<?php if ( $ecofine_postBanner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">

				<<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?> class="page-title">
					<?php
						if ( !empty( $ecofine_customTitle ) ) {
							echo esc_html( $ecofine_customTitle );
						} else {
							the_title();
						}
					?>
				</<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?>>

				<?php if ( function_exists( 'bcn_display' ) ) : ?>
					<div class="bre-sub">
						<?php bcn_display(); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif;?>

	<main id="primary" class="site-main content-area">
		<?php the_content();?>
	</main><!-- #main -->

<?php get_footer();
