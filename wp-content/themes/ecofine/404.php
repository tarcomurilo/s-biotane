<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Ecofine
 */

get_header();

$ecofine_error_page_banner = ecofine_options( 'ecofine_error_page_banner', true );
$ecofine_error_page_title = ecofine_options( 'ecofine_error_page_title' );
$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );
$ecofine_error_image = ecofine_options( 'ecofine_error_image' );
$ecofine_not_found_text = ecofine_options( 'ecofine_not_found_text' );
$ecofine_go_back_home = ecofine_options( 'ecofine_go_back_home', true );
$ecofine_error_page_button_text = ecofine_options( 'ecofine_error_page_button_text', esc_html( 'Go Back Home', 'ecofine' ) );

?>
<?php if ( $ecofine_error_page_banner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">

				<<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?> class="page-title">
					<?php if ( !empty( $ecofine_error_page_title ) ) {
						echo esc_html( $ecofine_error_page_title );
					} ?>
				</<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?>>

				<?php if ( function_exists( 'bcn_display' ) ) : ?>
					<div class="bre-sub"><?php bcn_display(); ?></div>
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php endif;?>

<main id="primary" class="content-area">
	<div class="container not-found-content">
		<div class="row justify-content-center">
			<div class="col-12 col-sm-12 col-md-10 col-xl-8 col-lg-8">
				<div class="not-found-text-wrapper text-center">

					<?php if ( !empty( $ecofine_error_image['url'] ) ) : ?>
					<div class="error-image">
						<img src="<?php echo esc_url( $ecofine_error_image['url'] ); ?>" alt="<?php echo esc_attr( $ecofine_error_image['alt'] ) ?>">
					</div>
					<?php else : ?>
						<div class="text-404">
							<h4><?php echo esc_html__( '404','ecofine' ); ?></h4>
						</div>
					<?php endif; ?>

					<div class="error-dec">
						<?php echo wp_kses( $ecofine_not_found_text, 'ecofine_allowed_html' ); ?>
					</div>

					<?php if ( $ecofine_go_back_home == true ): ?>
						<div class="error-button button">
						<a class="theme-btns" href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php echo esc_html( $ecofine_error_page_button_text ); ?> <i class="fas fa-angle-double-right"></i></span></a>
						</div>
					<?php endif;?>

				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
