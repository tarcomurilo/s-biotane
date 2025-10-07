<?php
if ( !defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
if ( !function_exists( 'ecofinecore_nabber_widget' ) ) {
    include_once 'banner.php';
}
if ( !function_exists( 'ecofinecore_blog_post_widget' ) ) {
    include_once 'blog-post.php';
}
if ( !function_exists( 'ecofinecore_company_info_widget' ) ) {
    include_once 'company-info.php';
}
if ( !function_exists( 'ecofinecore_contact_info_widget' ) ) {
    include_once 'contact-info.php';
}
if ( !function_exists( 'ecofinecore_social_widget' ) ) {
    include_once 'social.php';
}
if ( !function_exists( 'ecofinecore_newsletter_widget' ) ) {
    include_once 'subscribe.php';
}
if ( !function_exists( 'ecofinecore_about_info_widget' ) ) {
    include_once 'about-info.php';
}
if ( !function_exists( 'ecofine_nav_menu_widget' ) ) {
    include_once 'custom-navigation-widget.php';
}