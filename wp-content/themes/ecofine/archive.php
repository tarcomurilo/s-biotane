<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecofine
 */

get_header();

$ecofine_archiveLayout = ecofine_options( 'ecofine_archive_layout', 'right-sidebar' );
$ecofine_archive_banner = ecofine_options( 'ecofine_archive_banner', true );
$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );
$ecofine_archive_pagination = ecofine_options( 'ecofine_archive_pagination', true );
?>
	<?php if($ecofine_archive_banner == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<?php the_archive_title( '<'.esc_attr($ecofine_breadcrumb_select_html).' class="archive-title page-title">', '</'.esc_attr($ecofine_breadcrumb_select_html).'>' ); ?>
				<div class="bre-sub">
				<?php if(function_exists('bcn_display')){
					bcn_display();
				}?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<main id="primary" class="site-main content-area">
		<div class="container page-layout <?php echo esc_attr($ecofine_archiveLayout); ?>">
			<?php
				if ( $ecofine_archiveLayout == 'grid' ) {
					get_template_part( 'template-parts/blog/post-grid' );
				} else {
					get_template_part( 'template-parts/blog/post-sidebar' );
				}
			?>
		</div>
	</main><!-- #main -->
<?php get_footer();
