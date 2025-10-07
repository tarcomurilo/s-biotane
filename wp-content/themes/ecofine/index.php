<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecofine
 */

get_header();
$ecofine_blogc_title = ecofine_options( 'ecofine_blog_title' );
$ecofine_blog_home_title = ecofine_options( 'ecofine_blog_home_title','Home' );
$ecofine_blog_home_stitle = ecofine_options( 'ecofine_blog_home_stitle', '' );
$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );
$ecofine_banner_enable = ecofine_options( 'ecofine_blog_banner_enable', true );
$ecofine_blog_layout = ecofine_options( 'ecofine_blog_layout', 'right-sidebar' );
?>
<?php if ( $ecofine_banner_enable == true ): ?>
<div class="breadcroumb-area">
	<div class="container">
		<div class="breadcroumn-contnt">

			<<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?> class="page-title">
				<?php echo esc_html( $ecofine_blogc_title ); ?>
			</<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?>>

			<?php if( function_exists('bcn_display') ) : ?>
				<div class="bre-sub"><?php bcn_display(); ?></div>
			<?php endif; ?>

		</div>
	</div>
</div>
<?php endif;?>
<main id="primary" class="site-main content-area">
	<div class="container page-layout <?php echo esc_attr( $ecofine_blog_layout ); ?>">
		<?php
			if ( $ecofine_blog_layout == 'grid' ) {
				get_template_part( 'template-parts/blog/post-grid' );
			} else {
				get_template_part( 'template-parts/blog/post-sidebar' );
			}?>
	</div>
</main>
<?php
get_footer();
