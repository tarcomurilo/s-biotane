<?php 
// logo
$ecofine_logo2 = ecofine_options('ecofine_logo2');
// Sticky Menu 
$ecofine_enable_sticky_menu1 = ecofine_options( 'ecofine_enable_sticky_menu1' );
if ( $ecofine_enable_sticky_menu1 == true ) {
    $sticky = 'sticky-menu';
} else {
    $sticky = 'no-sticky';
}

//  -----------Button -------------
$ecofine_support_show = ecofine_options( 'ecofine_support_show' );
$ecofine_cta_fieldset3 = ecofine_options( 'ecofine_cta_fieldset3' );
//  -----------Button -------------
$ecofine_btn_show2 = ecofine_options( 'ecofine_btn_show2' );
$ecofine_btn_text2 = ecofine_options( 'ecofine_btn_text2' );
$ecofine_btn_link2 = ecofine_options( 'ecofine_btn_link2' );

?>
    <!--==============================
    Mobile Menu
  ============================== -->
  <div class="ot-menu-wrapper">
        <div class="ot-menu-area text-center">
            <button class="ot-menu-toggle">
			<i class="far fa-times"></i>
			</button>
            <div class="mobile-logo">
				<?php
					if(!empty($ecofine_logo2['url'])){
						$logoUrl = $ecofine_logo2['url'];
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($ecofine_logo2['title']) ?>">
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
<header class="ot-header header-two">
	<div class="sticky-wrapper " id="<?php echo esc_attr( $sticky ); ?>">
		<div class="menu-area ">
			<div class="container container-1720">
				<div class="row align-items-center justify-content-between">
					<div class="header-logo col-auto">
					<?php
							if(!empty($ecofine_logo2['url'])){
								$logoUrl = $ecofine_logo2['url'];
								?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($ecofine_logo2['title']) ?>">
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
					<div class="col-auto d-none d-xl-block">
						<div class="header-right-area">
							<?php if($ecofine_support_show == true ) : ?>
								<div class="header-call-box">
									<div class="icon"><i class="<?php echo esc_attr($ecofine_cta_fieldset3['ecofine_support_icon']); ?>"></i></div>
									<div class="call-text-box">
										<a href="#">
											<div class="call-text"><?php echo esc_html($ecofine_cta_fieldset3['ecofine_support_text']); ?></div>
											<div class="call-number"><?php echo esc_html($ecofine_cta_fieldset3['ecofine_support_number']); ?></div>
											
										</a>
									</div>
								</div>
							<?php endif; ?>
							<?php if($ecofine_btn_show2 == true ) : ?>
							<div class="header-button">
							<a href="<?php echo esc_url($ecofine_btn_link2['url']); ?>" class=" theme-btns" target="<?php echo esc_attr($ecofine_btn_link2['target']);?>" ><span> <?php echo esc_html($ecofine_btn_text2); ?> <i class="fas fa-angle-double-right"></i> </span> </a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<header>

	