<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ecofine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php 
	if(is_page() || is_singular('post') || is_singular('ecofine_portfolio') || is_singular('ecofine_team') && get_post_meta($post->ID, 'ecofine_metabox', true)) {
        $ecofineMeta = get_post_meta($post->ID, 'ecofine_metabox', true);
    } else {
        $ecofineMeta = array();
    }
    $ecofine_enable_preloader = ecofine_options('ecofine_enable_preloader', true);
    $ecofine_header_styles = ecofine_options('ecofine_header_styles');
    $header_type = ecofine_options('select_header_type');
    

    if( $header_type === 'headers_elementor' || is_array( $ecofineMeta ) && array_key_exists( 'select_header_meta_type', $ecofineMeta ) && $ecofineMeta['select_header_meta_type'] === 'headermeta_elementor' ){
        
        if ( is_array( $ecofineMeta ) && array_key_exists( 'header_style_meta', $ecofineMeta ) && $ecofineMeta['header_style_meta'] != '' && $ecofineMeta['header_style_meta'] != 'default' ) {
            $header_query = new WP_Query( [
                'post_type'      => 'ecofine_header',
                'posts_per_page' => -1,
                'p'              => $ecofineMeta['header_style_meta'],
            ] );
    
        } elseif(!empty( ecofine_options('site_header_elementor'))){
            $header_query = new WP_Query( [
                'post_type'      => 'ecofine_header',
                'posts_per_page' => -1,
                'p'              => ecofine_options('site_header_elementor'),
            ] );
        }else{
            $header_query = '';
        }
        $header_class = ' ';
    }else{
        if (is_array($ecofineMeta) && array_key_exists('ecofine_meta_select_header', $ecofineMeta) && $ecofineMeta['ecofine_meta_select_header'] != 'default' && $ecofineMeta['ecofine_meta_enable_header'] == true ) {
            $selectedHeader = $ecofineMeta['ecofine_meta_select_header'];
        } else if (!empty($ecofine_header_styles) && class_exists( 'CSF' )) {
            $selectedHeader = ecofine_options('ecofine_header_styles');
        } else {
            $selectedHeader = 'default';
        }
        $header_class = $selectedHeader;
    }

	wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site header-v-<?php echo esc_attr($header_class); ?>">
    <?php if($ecofine_enable_preloader == true ) { ?>
    <div class="preloader-area">
        <div class="theme-loader"></div>
    </div>
    <?php } ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ecofine' ); ?></a>

    <?php 
        if( $header_type === 'headers_elementor' || is_array( $ecofineMeta ) && array_key_exists( 'select_header_meta_type', $ecofineMeta ) && $ecofineMeta['select_header_meta_type'] === 'headermeta_elementor' ){
            if(!empty($header_query) && $header_query->have_posts()){
                while ( $header_query->have_posts() ) : $header_query->the_post();
                    the_content();
                endwhile;
                wp_reset_postdata();
            }else{
                get_template_part( 'inc/header/header-default' );
            }
        }else{
            get_template_part( 'inc/header/header-'.$selectedHeader.'' );
        }
    ?>