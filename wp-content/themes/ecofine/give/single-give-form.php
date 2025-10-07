<?php
/**
 * The Template for displaying all single Give Forms.
 *
 * Override this template by copying it to yourtheme/give/single-give-forms.php
 *
 * @package       Give/Templates
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
$ecofine_donate_banner_enable    = ecofine_options( 'ecofine_blog_banner_enable', true );
$ecofine_donate_layout      = ecofine_options( 'ecofine_donate_layout', 'right-sidebar' );
$ecofine_donate_title      = ecofine_options( 'ecofine_donate_title');
$ecofine_dtt  = ecofine_options( 'ecofine_donate_title_tag','h2');
$ecofine_donate_widget  = ecofine_options( 'ecofine_donate_widget');
if($ecofine_donate_layout == 'left-sidebar' && is_active_sidebar($ecofine_donate_widget) || $ecofine_donate_layout == 'right-sidebar' && is_active_sidebar($ecofine_donate_widget)){
    $ecofine_donateColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
    $ecofine_donateColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}
$ecofine_banner_default_options = ecofine_options( 'ecofine_banner_default_options' );
if(!empty($ecofine_banner_default_options)){
	$ecofine_tclass = 'show-image-title';
}else{
	$ecofine_tclass = 'no-image-title';
}
get_header();
?>
<?php if ( $ecofine_donate_banner_enable == true ) : ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				<<?php echo esc_attr($ecofine_dtt); ?> class="page-title <?php echo esc_attr($ecofine_tclass); ?>"><?php the_title(); ?></<?php echo esc_attr($ecofine_dtt); ?>>
				<div class="bre-sub">
				<?php if(function_exists('bcn_display')){
					bcn_display();
				}?>
				</div>
			</div>
		</div>
	</div>
<?php endif;?>
	<main id="primary" class="site-main content-area donate-area">
		<div class="container <?php echo esc_attr($ecofine_donate_layout); ?>">
			<div class="donate-layout">
				<div class="row">
					<?php
					if($ecofine_donate_layout == 'left-sidebar' && is_active_sidebar($ecofine_donate_widget)){
						?>
						<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area donate-widgets">
							<?php
								if( is_active_sidebar($ecofine_donate_widget) ) {
									dynamic_sidebar($ecofine_donate_widget);
								}
							?>
						</div>
						<?php 
					}
					?>
					<div class="<?php echo esc_attr($ecofine_donateColumnClass); ?>">
						<div class="all-posts-wrapper">
							<?php 
							/**
							 * Fires in single form template, before the main content.
							 *
							 * Allows you to add elements before the main content.
							 *
							 * @since 1.0
							 */
							do_action( 'give_before_main_content' );

							while ( have_posts() ) :
								the_post();

								give_get_template_part( 'single-give-form/content', 'single-give-form' );

							endwhile; // end of the loop.

							/**
							 * Fires in single form template, after the main content.
							 *
							 * Allows you to add elements after the main content.
							 *
							 * @since 1.0
							 */
							do_action( 'give_after_main_content' );
							/**
							 * Fires in single form template, on the sidebar.
							 *
							 * Allows you to add elements to the sidebar.
							 *
							 * @since 1.0
							 */
							do_action( 'give_sidebar', );
							?>
						</div>
					</div>
					<?php
					if($ecofine_donate_layout == 'right-sidebar' && is_active_sidebar($ecofine_donate_widget)){
						?>
						<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area donate-widgets">
							<?php
								if( is_active_sidebar($ecofine_donate_widget) ) {
									dynamic_sidebar($ecofine_donate_widget);
								}
							?>
						</div>
						<?php 
					}?>
				</div>
			
			</div>
		</div>
	</main><!-- #main -->
<?php 


get_footer();
