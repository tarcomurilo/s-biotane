<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecofine
 */

get_header();

if(get_post_meta( get_the_ID(), 'ecofine_metabox', true)) {
    $ecofine_commonMeta = get_post_meta( get_the_ID(), 'ecofine_metabox', true );
} else {
    $ecofine_commonMeta = array();
}

if(array_key_exists('ecofine_meta_page_navbar', $ecofine_commonMeta)){
	$ecofine_meta_page_navbar = $ecofine_commonMeta['ecofine_meta_page_navbar'];
}else{
	$ecofine_meta_page_navbar = '';
}

if(array_key_exists('ecofine_layout_meta', $ecofine_commonMeta)){
    $ecofine_pageLayout = $ecofine_commonMeta['ecofine_layout_meta'];
}else{
    $ecofine_pageLayout = 'full-width';
}

if(array_key_exists('ecofine_sidebar_meta', $ecofine_commonMeta)){
    $ecofine_selectedSidebar = $ecofine_commonMeta['ecofine_sidebar_meta'];
}else{
    $ecofine_selectedSidebar = 'sidebar';
}

if($ecofine_pageLayout == 'left-sidebar' && is_active_sidebar($ecofine_selectedSidebar) || $ecofine_pageLayout == 'right-sidebar' && is_active_sidebar($ecofine_selectedSidebar)){
    $ecofine_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $ecofine_pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if(array_key_exists('ecofine_meta_enable_banner', $ecofine_commonMeta)){
    $ecofine_postBanner = $ecofine_commonMeta['ecofine_meta_enable_banner'];
}else{
    $ecofine_postBanner = true;
}

$ecofine_enable_page_cmt = ecofine_options('ecofine_enable_page_cmt', true );
$ecofine_breadcrumb_select_html = ecofine_options('ecofine_breadcrumb_select_html', 'h2');
?>
	<?php if($ecofine_postBanner == true ) : ?>
		<div class="breadcroumb-area">
			<div class="container">
				<div class="breadcroumn-contnt">
					
					<<?php echo esc_attr($ecofine_breadcrumb_select_html); ?> class="page-title">
						<?php the_title(); ?> 
					</<?php echo esc_attr($ecofine_breadcrumb_select_html); ?>>

					<?php if(function_exists('bcn_display')) : ?>
						<div class="bre-sub"><?php bcn_display(); ?></div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	<?php endif; ?>

	<main id="primary" class="site-main content-area">
		<div class="container <?php echo esc_attr($ecofine_pageLayout); ?>">
			<div class="page-layout">
				<div class="row">

					<?php
						if($ecofine_pageLayout == 'left-sidebar' && is_active_sidebar($ecofine_selectedSidebar)){
							get_sidebar();
						}
					?>

					<div class="<?php echo esc_attr($ecofine_pageColumnClass); ?>">
						<div class="all-posts-wrapper">

						<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'page' );
							endwhile; // End of the loop.

							if( $ecofine_enable_page_cmt == true) :
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endif;
						?>
						</div>
					</div>

					<?php
					if($ecofine_pageLayout == 'right-sidebar' && is_active_sidebar($ecofine_selectedSidebar)){
						get_sidebar();
					}?>

				</div>
			
			</div>
		</div>
	</main><!-- #main -->
<?php get_footer();
