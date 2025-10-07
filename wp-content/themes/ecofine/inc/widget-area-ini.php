<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ecofine_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'ecofine' ),
            'id'            => 'sidebar',
            'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title"><span>',
            'after_title'   => '</span></h2>',
        ),
    );

    if ( class_exists( 'WooCommerce' ) ) {
        register_sidebar(
            array(
                'name'          => esc_html__( 'Shop Sidebar', 'ecofine' ),
                'id'            => 'ecofine-shop',
                'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
                'before_widget' => '<section id="%1$s" class="woo-widgets widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h2 class="widget-title">',
                'after_title'   => '</h2>',
            ),
        );
    }

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'ecofine' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'ecofine' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'ecofine' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ),
    );
    
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'ecofine' ),
            'id'            => 'footer-4',
            'description'   => esc_html__( 'Add widgets here.', 'ecofine' ),
            'before_widget' => '<section id="%1$s" class="widget footer-widtet %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

}
add_action( 'widgets_init', 'ecofine_widgets_init' );
?>