<?php
/**
 * The template for displaying all portfolio single posts
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
$ecofine_portfolio_nav = ecofine_options( 'ecofine_portfolio_nav', true );
$ecofine_portfolio_related = ecofine_options( 'ecofine_portfolio_related', true );
$ecofine_portfolio_related_title = ecofine_options( 'ecofine_portfolio_related_title' );
$ecofine_portfolio_banner_enable = ecofine_options( 'ecofine_portfolio_banner_enable' );
$ecofine_breadcrumb_select_html = ecofine_options( 'ecofine_breadcrumb_select_html', 'h2' );
if ( array_key_exists( 'ecofine_layout_meta', $ecofine_commonMeta ) && !empty( $ecofine_commonMeta['ecofine_layout_meta'] ) ) {
    $ecofine_portfolio_Layout = $ecofine_commonMeta['ecofine_layout_meta'];
} else {
    $ecofine_portfolio_Layout = 'full-width';
}
if ( is_array( $ecofine_commonMeta ) && array_key_exists( 'ecofine_sidebar_meta', $ecofine_commonMeta ) ) {
    $ecofine_selectedSidebar = $ecofine_commonMeta['ecofine_sidebar_meta'];
} else {
    $ecofine_selectedSidebar = 'sidebar';
}

if ( $ecofine_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) || $ecofine_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
    $ecofine_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
} else {
    $ecofine_portfolioColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12';
}

if ( $ecofine_portfolio_banner_enable == false ) {
    $ecofine_portfolio_post_Banner = false;
} elseif ( array_key_exists( 'ecofine_meta_enable_banner', $ecofine_commonMeta ) ) {
    $ecofine_portfolio_post_Banner = $ecofine_commonMeta['ecofine_meta_enable_banner'];
} else {
    $ecofine_portfolio_post_Banner = true;
}

?>
	<?php if ( $ecofine_portfolio_post_Banner == true ): ?>
	<div class="breadcroumb-area">
		<div class="container">
			<div class="breadcroumn-contnt">
				
                <<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?> class="page-title"> 
                    <?php the_title();?> 
                </<?php echo esc_attr( $ecofine_breadcrumb_select_html ); ?>>

                <?php if ( function_exists( 'bcn_display' ) ) : ?>
                    <div class="bre-sub"><?php bcn_display(); ?></div>
                <?php endif; ?>
            </div>
		</div>
	</div>
	<?php endif;?>
	<main id="primary" class="site-main content-area tp-portfolio-wrapper">
		<div class="container">
			<div class="page-layout <?php echo esc_attr( $ecofine_portfolio_Layout ); ?>">
				<div class="row">
					<?php
						if ( $ecofine_portfolio_Layout == 'left-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
							get_sidebar();
						}
						?>
					<div class="<?php echo esc_attr( $ecofine_portfolioColumnClass ); ?>">
						<div class="all-posts-wrapper">
                            <?php
                                while ( have_posts() ):
                                    the_post();
                                    the_content();
                                endwhile; // End of the loop.
							?>

						</div>
					</div>
					<?php
						if ( $ecofine_portfolio_Layout == 'right-sidebar' && is_active_sidebar( $ecofine_selectedSidebar ) ) {
							get_sidebar();
						}?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
<?php
get_footer();