
<?php
$ecofine_logo1 = ecofine_options('ecofine_logo1');

$ecofine_enable_sticky_menu1 = ecofine_options( 'ecofine_enable_sticky_menu1' );
if ( $ecofine_enable_sticky_menu1 == true ) {
    $sticky = 'sticky-menu';
} else {
    $sticky = 'no-sticky';
}
// ---------- Top header option -------
$ecofine_topbar_show1 = ecofine_options( 'ecofine_topbar_show1' );
$ecofine_header_topbar = ecofine_options( 'ecofine_header_topbar' );
//  -----------Button -------------
$ecofine_cta_show = ecofine_options( 'ecofine_cta_show' );
$ecofine_cta_text = ecofine_options( 'ecofine_cta_text' );
$ecofine_cta_link = ecofine_options( 'ecofine_cta_link' );
?>
    <!--==============================
    Mobile Menu
  ============================== -->
  <div class="ot-menu-wrapper">
        <div class="ot-menu-area text-center">
            <button class="ot-menu-toggle"><i class="far fa-times"></i>	</button>
            <div class="mobile-logo">
				<?php
					if(!empty($ecofine_logo1['url'])){
						$logoUrl = $ecofine_logo1['url'];
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($ecofine_logo1['title']) ?>">
						</a>
						<?php 
					}elseif(has_custom_logo()){
						the_custom_logo();
					}else{
						?>
						<h2>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php esc_html(bloginfo( 'name' )); ?>
							</a>
						</h2>
						<?php 
					}
				?>
            </div>
            <div class="ot-mobile-menu">
					<?php
						wp_nav_menu(
							array(
								'container'      => false,
								'theme_location' => 'mainmenu',
								'menu_id'        => 'mainmenu',
								'menu_class'     => '',
								'echo'           => true,
								'fallback_cb'    => 'ecofine_Nav_Walker::fallback',
								'walker'         => new ecofine_Nav_Walker,
							)
						);
					?>
            </div>
        </div>
    </div>
<!--==============================
	Header Area
==============================-->
<header class="ot-header header-one default">
	<div class="sticky-wrapper" id="<?php echo esc_attr( $sticky ); ?>">
		<div class="menu-area ">
			<div class="container container-1720">
				<div class="row align-items-center justify-content-between">
					<div class="header-logo col-auto">
						<?php
							if(has_custom_logo()){
								the_custom_logo();
							}else{
								?>
								<h2>
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
										<?php esc_html(bloginfo( 'name' )); ?>
									</a>
								</h2>
								<?php 
							}
                        ?>

					</div>
					<div class="col-auto">
						<nav class="main-menu d-none d-lg-inline-block">
						<?php
								wp_nav_menu(
									array(
										'container'      => false,
										'theme_location' => 'mainmenu',
										'menu_id'        => 'mainmenu',
										'menu_class'     => '',
										'echo'           => true,
										'fallback_cb'    => 'ecofine_Nav_Walker::fallback',
										'walker'         => new ecofine_Nav_Walker,
									)
								);
							?>
						</nav>
						<button type="button" class="ot-menu-toggle d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
					</div>
					
				</div>
			</div>
		</div>
	</div>
<header>