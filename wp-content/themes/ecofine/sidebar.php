<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecofine
 */
if(is_page() || is_singular('post') || is_singular('ecofine_portfolio') || is_singular('ecofine_team') && get_post_meta($post->ID, 'ecofine_metabox', true)) {
    $ecofine_commonMeta = get_post_meta($post->ID, 'ecofine_metabox', true);
} else {
    $ecofine_commonMeta = array();
}


if(is_array($ecofine_commonMeta) && array_key_exists('ecofine_sidebar_meta', $ecofine_commonMeta)){
    $ecofine_selectedSidebar = $ecofine_commonMeta['ecofine_sidebar_meta'];
}else{
    $ecofine_selectedSidebar = 'sidebar';
}
?>
<div id="secondary" class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 sidebar-widget-area">
    <div class="sidebar-sticky-area">
        <?php
            if( is_active_sidebar( $ecofine_selectedSidebar ) ) {
                dynamic_sidebar( $ecofine_selectedSidebar );
            }
        ?>
    </div>
</div>
