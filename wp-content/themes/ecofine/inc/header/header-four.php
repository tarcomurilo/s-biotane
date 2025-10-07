<?php
// ----- Mobile Logo Option---------
$mobile_logo  = ecofine_options('mobile_logo');
// ----------
$ecofine_logo4 = ecofine_options('ecofine_logo4');

$ecofine_enable_sticky_menu4 = ecofine_options( 'ecofine_enable_sticky_menu4' );
if ( $ecofine_enable_sticky_menu4 == true ) {
    $sticky = 'sticky-menu';
} else {
    $sticky = 'no-sticky';
}
// ---------- Top header option -------
$ecofine_topbar_show4 = ecofine_options( 'ecofine_topbar_show4' );
$ecofine_header_topbar4 = ecofine_options( 'ecofine_header_topbar4' );
//  -----------Button -------------
$ecofine_cta_show = ecofine_options( 'ecofine_cta_show4' );
$ecofine_cta_text = ecofine_options( 'ecofine_cta_text4' );
$ecofine_cta_link = ecofine_options( 'ecofine_cta_link4' );
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
					}elseif(!empty($ecofine_logo4['url'])){
						$logoUrl = $ecofine_logo4['url'];
						?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($ecofine_logo4['title']) ?>">
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
<header class="header-section header-four">
    <div class="header-four-section">
        <?php if($ecofine_topbar_show4 == true ) : ?>
            <div class="header-top-bar">
                <div class="container ">
                    <div class="row justify-content-center justify-content-between align-items-center">
                        <div class="col-xl-8 col-lg-9 col-md-12 col-12 ">
                            <div class="header-links">
                                <ul>
                                    <?php 	if(!empty($ecofine_header_topbar4['ecofine_topbar_left4'])) : ?>
                                        <?php foreach($ecofine_header_topbar4['ecofine_topbar_left4'] as $info_item) : ?>
                                            <li>
                                                <span> <?php echo esc_html( $info_item['ecofine_topbar_label'] )?> </span>
                                            <?php echo wp_kses_post($info_item['ecofine_topbar_info4']); ?></li>
                                        <?php endforeach?>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-3 col-md-12 col-12 ">
                            <div class="header-social">
                                <?php if(!empty($ecofine_header_topbar4['ecofine_social_title4'])) : ?>
                                    <span class="social-title"> <?php echo esc_html( $ecofine_header_topbar4['ecofine_social_title4'] )?> </span>
                                <?php endif;?>
                                <?php if(!empty($ecofine_header_topbar4['ecofine_topbar_social4'])) : ?>
                                    <?php foreach($ecofine_header_topbar4['ecofine_topbar_social4'] as $social_info) : ?>
                                        <a href="<?php echo esc_url($social_info['ecofine_topbar_social_link4']['url']); ?>" ><i class="<?php echo esc_attr($social_info['ecofine_topbar_social_icon4']); ?>"></i></a>
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
                <div class="container ">
                    <div class="row align-items-center justify-content-between">
                        <div class="header-logo col-auto">
                            <?php
                                if(!empty($ecofine_logo4['url'])){
                                    $logoUrl = $ecofine_logo4['url'];
                                    ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url($logoUrl); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>" title="<?php echo esc_attr($ecofine_logo4['title']) ?>">
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
                        <?php if($ecofine_cta_show == true ) : ?>
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
	</div>
</header>