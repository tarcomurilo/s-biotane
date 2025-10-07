<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Ecofine
 */

get_header();
$ecofine_searchLayout = ecofine_options('ecofine_search_layout', 'right-sidebar');
$ecofine_search_banner = ecofine_options('ecofine_search_banner', true);
$ecofine_search_pagination = ecofine_options('ecofine_search_pagination', true);
$ecofine_breadcrumb_select_html = ecofine_options('ecofine_breadcrumb_select_html', 'h2');

?>
	<?php if($ecofine_search_banner == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr($ecofine_breadcrumb_select_html); ?> class="page-title">
					<?php 
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ecofine' ), '<span>' . get_search_query() . '</span>' );
					?>
				</<?php echo esc_attr($ecofine_breadcrumb_select_html); ?>>
				<?php if ( function_exists( 'bcn_display' ) ): ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<main id="primary" class="site-main content-area">
		<div class="container page-layout <?php echo esc_attr($ecofine_searchLayout); ?>">
			<?php
				if ( $ecofine_searchLayout == 'grid' ) {
					get_template_part( 'template-parts/blog/post-grid' );
				} else {
					get_template_part( 'template-parts/blog/post-sidebar' );
				}
			?>	
		</div>
	</main><!-- #main -->
<?php get_footer();
