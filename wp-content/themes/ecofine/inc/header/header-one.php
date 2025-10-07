<?php
// ----- Mobile Logo Option---------
$mobile_logo  = ecofine_options('mobile_logo');
// ----------
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
					if(!empty($mobile_logo['url'])){
						$mobile_logoUrl = $mobile_logo['url'];
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($mobile_logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($mobile_logo['title']) ?>">
						</a>
				<?php
					}elseif(!empty($ecofine_logo1['url'])){
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
<header class="ot-header header-one">
	<?php if($ecofine_topbar_show1 == true ) : ?>
		<div class="header-top">
			<div class="container container-1720">
				<div class="row justify-content-center justify-content-between align-items-center">
					<div class="col-xl-4 col-lg-12 col-md-12 col-12 header-top-left">
					<?php 	if(!empty($ecofine_header_topbar['ecofine_promotion_text'])) : ?>
						<div class="promostion-test">
							<?php echo esc_html( $ecofine_header_topbar['ecofine_promotion_text'] );?>
						</div>
					<?php endif;?>
					</div>
					<div class="col-xl-8 col-lg-12 col-md-12 col-12 header-top-right">
						<div class="header-links">
							<ul>
							<?php 	if(!empty($ecofine_header_topbar['ecofine_topbar_left'])) : ?>
								<?php foreach($ecofine_header_topbar['ecofine_topbar_left'] as $info_item) : ?>
									<li><i class="<?php echo esc_attr($info_item['ecofine_topbar_info_icon']); ?>"></i><?php echo wp_kses_post($info_item['ecofine_topbar_info']); ?></li>
								<?php endforeach?>
								<?php endif;?>
							</ul>
						</div>
						<div class="header-social">
							<?php if(!empty($ecofine_header_topbar['ecofine_social_title'])) : ?>
								<span class="social-title"> <?php echo esc_html( $ecofine_header_topbar['ecofine_social_title'] )?> </span>
							<?php endif;?>
							<?php if(!empty($ecofine_header_topbar['ecofine_topbar_social'])) : ?>
								<?php foreach($ecofine_header_topbar['ecofine_topbar_social'] as $social_info) : ?>
									<a href="<?php echo esc_url($social_info['ecofine_topbar_social_link']['url']); ?>" ><i class="<?php echo esc_attr($social_info['ecofine_topbar_social_icon']); ?>"></i></a>
								<?php endforeach;?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif?>
	<div class="sticky-wrapper" id="<?php echo esc_attr( $sticky ); ?>">
		<div class="menu-area ">
			<div class="container container-1720">
				<div class="row align-items-center justify-content-between">
					<div class="header-logo col-auto">
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
					<?php if( $ecofine_cta_show == true && !empty( $ecofine_cta_link['url'] ) ) : ?>
					<div class="col-auto d-none d-xl-block">
						<div class="header-button">
							<a href="<?php echo esc_url($ecofine_cta_link['url']); ?>" class=" theme-btns" target="<?php echo esc_attr($ecofine_cta_link['target']);?>" > <span> <?php echo esc_html($ecofine_cta_text); ?> <i class="fas fa-angle-double-right"></i></span></a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<header>