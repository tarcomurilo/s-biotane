<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Ecofine
 */

get_header();
if ( get_post_meta( get_the_ID(), 'ecofine_metabox', true ) ) {
	$ecofine_commonMeta = get_post_meta( get_the_ID(), 'ecofine_metabox', true );
} else {
	$ecofine_commonMeta = array();
}

if ( array_key_exists( 'ecofine_layout_meta', $ecofine_commonMeta ) && !empty( $ecofine_commonMeta['ecofine_layout_meta'] ) ) {
	$ecofine_postLayout = $ecofine_commonMeta['ecofine_layout_meta'];
} else {
	$ecofine_postLayout = 'right-sidebar';
}

if ( is_array( $ecofine_commonMeta ) && array_key_exists( 'ecofine_sidebar_meta', $ecofine_commonMeta ) ) {
	$ecofine_selectedSidebar = $ecofine_commonMeta['ecofine_sidebar_meta'];
} else {
	$ecofine_selectedSidebar = 'sidebar';
}

if ( $ecofine_postLayout == 'left-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) || $ecofine_postLayout == 'right-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
	$ecofine_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
	$ecofine_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( array_key_exists( 'ecofine_meta_enable_banner', $ecofine_commonMeta ) ) {
	$ecofine_postBanner = $ecofine_commonMeta['ecofine_meta_enable_banner'];
} else {
	$ecofine_postBanner = true;
}

$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );
?>
	<?php if ( $ecofine_postBanner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?> class="page-title">
				 	<?php the_title(); ?>
				</<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?>>
				<?php if ( function_exists( 'bcn_display' ) ): ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<main id="primary" class="site-main content-area">
		<div class="container">
			<div class="page-layout  <?php echo esc_attr( $ecofine_postLayout ); ?>">
				<div class="row">
					<?php
						if ( $ecofine_postLayout == 'left-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
							get_sidebar();
						}
					?>
					<div class="<?php echo esc_attr( $ecofine_pageColumnClass ); ?>">
						<div class="all-posts-wrapper">
						<?php
							while ( have_posts() ):
								the_post();

								get_template_part( 'template-parts/content', get_post_type() );
								
								ecofine_post_navigation();

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ):
									comments_template();
								endif;
							endwhile; // End of the loop. 
						?>
						</div>
					</div>
					<?php
					if ( $ecofine_postLayout == 'right-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
						get_sidebar();
					} ?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();
