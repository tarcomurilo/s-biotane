<?php

/*--------------------------------
Get Theme Options
----------------------------------*/
if ( !function_exists( 'ecofine_options' ) ) {
    function ecofine_options( $option = '', $default = null ) {
        $defaults = ecofine_default_theme_options();
        $options = get_option( 'Ecofine_Theme_Option' );
        $default = ( !isset( $default ) && isset( $defaults[$option] ) ) ? $defaults[$option] : $default;
        return ( isset( $options[$option] ) ) ? $options[$option] : $default;
    }
}


/*--------------------------------
Wp Body Open Function
----------------------------------*/

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;


/*--------------------------------
Adds custom classes to the array of body classes.
----------------------------------*/

function ecofine_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }

    //Check WooCommerce Used or not
    if ( class_exists( 'WooCommerce' ) ) {
		$classes[] = 'ecofine-woo-active';
	}else{
		$classes[] = 'ecofine-woo-deactivate';
	}

    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar' ) ) {
        $classes[] = 'no-sidebar';
    }

    //Check Elementor Page Builder Used or not
    $elementor_active = get_post_meta( get_the_ID(), '_elementor_edit_mode', true );

    if ( is_archive() ) {
        $classes[] = !!$elementor_active ? 'page-builder-not-used' : 'page-builder-not-used';
    } else {
        $classes[] = !!$elementor_active ? 'page-builder-used' : 'page-builder-not-used';
    }
    return $classes;
}

add_filter( 'body_class', 'ecofine_body_classes' );


/*--------------------------------
Add a pingback url auto-discovery header for single posts, pages, or attachments.
----------------------------------*/

function ecofine_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'ecofine_pingback_header' );


/*--------------------------------
Get excluded sidebar list
----------------------------------*/

if ( !function_exists( 'ecofine_sidebars' ) ) {
    function ecofine_sidebars() {

        $options = array();
        // set ids of the registered sidebars for exclude
        $exclude = array( 'footer-1', 'footer-2', 'footer-3', 'footer-4' );

        global $wp_registered_sidebars;

        if ( !empty( $wp_registered_sidebars ) ) {
            foreach ( $wp_registered_sidebars as $sidebar ) {
                if ( !in_array( $sidebar['id'], $exclude ) ) {
                    $options[$sidebar['id']] = $sidebar['name'];
                }
            }
        }
        return $options;

    }
}


/*--------------------------------
Prints HTML with meta information for the comments.
----------------------------------*/

if ( ! function_exists( 'ecofine_comment_count' ) ) :

	function ecofine_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() != 0) {
			echo '<span class="comments-link"><i class="far fa-comments"></i>';
			comments_popup_link('', ''.esc_html__('1', 'ecofine').' <span class="comment-count-text">'.esc_html__('Comment', 'ecofine').'</span>', '% <span class="comment-count-text">'.esc_html__('Comments', 'ecofine').'</span>');
			echo '</span>';
		}
	}
endif;


/*--------------------------------
Prints HTML with meta information for the current post-date/time.
----------------------------------*/

if ( ! function_exists( 'ecofine_posted_on' ) ) :

	function ecofine_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'ecofine' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on"><i class="far fa-calendar-check"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;


/*--------------------------------
Prints HTML with meta information for the current author.
----------------------------------*/

if ( !function_exists( 'ecofine_posted_by' ) ) :
    function ecofine_posted_by() {
        $byline = sprintf(
            /* translators: %s: post author. */
			esc_html_x( ' %s', 'post author', 'ecofine' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
        echo '<span class="byline"><i class="far fa-user"></i>' . $byline . '</span>'; // WPCS: XSS OK.
    }
endif;


/*--------------------------------
Prints HTML with meta information for the categories.
----------------------------------*/

 if ( ! function_exists( 'ecofine_post_cat' ) ) :

	function ecofine_post_cat() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'ecofine'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links"><i class="far fa-folder"></i>' . esc_html__('%1$s', 'ecofine') . '</span>', $categories_list); // WPCS: XSS OK.
			}

		}
	}
endif;


/*--------------------------------
Prints post's first category
----------------------------------*/

 if ( ! function_exists( 'ecofine_post_first_category' ) ) :

	function ecofine_post_first_category(){
		// Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
			$post_category_list = get_the_terms(get_the_ID(), 'category');

			$post_first_category = $post_category_list[0];
			if ( ! empty( $post_first_category->slug )) {
				echo '<span class="cat-links"><i class="far fa-folder"></i><a href="'.get_term_link( $post_first_category->slug, 'category' ).'">' . $post_first_category->name . '</a></span>';
			}
		}
	}
endif;


/*--------------------------------
Prints HTML with meta information for the tags.
----------------------------------*/

if ( ! function_exists( 'ecofine_post_tag' ) ) :

	function ecofine_post_tag() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x('', 'list item separator', 'ecofine'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links"><span class="tag-title">' .esc_html__('Tags:','ecofine').'</span>' .esc_html__(' %1$s', 'ecofine') . '</span>', $tags_list); // WPCS: XSS OK.


			}

		}
	}
endif;


/*--------------------------------
Words limit
----------------------------------*/

function ecofine_words_limit($text, $limit) {
	$words = explode(' ', $text, ($limit + 1));

	if (count($words) > $limit) {
		array_pop($words);
	}

	return implode(' ', $words);
}

/*--------------------------------
Content Footer Entry link
----------------------------------*/

if ( !function_exists( 'ecofine_entry_footer' ) ):
    function ecofine_entry_footer() {
        edit_post_link(
            sprintf(
                wp_kses(
                    __( 'Edit <span class="screen-reader-text">%s</span>', 'ecofine' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;


/*--------------------------------
POST THUMBNAIL 
----------------------------------*/

if ( !function_exists( 'ecofine_post_thumbnail' ) ):
    function ecofine_post_thumbnail() {
        if ( post_password_required() || is_attachment() || !has_post_thumbnail() ) {
            return;
        }
        if ( is_singular() ):
        ?>
				<div class="post-thumbnail">
					<?php the_post_thumbnail();?>
				</div>

			<?php else: ?>
		<a class="post-thumbnail" href="<?php the_permalink();?>" aria-hidden="true" tabindex="-1">
			<?php
                the_post_thumbnail( 'post-thumbnail', array(
                    'alt' => the_title_attribute( array(
                        'echo' => false,
                    ) ),
                ) );
            ?>
		</a>
		<?php
endif;
}
endif;


/*--------------------------------
COMMENT PAGINATION
----------------------------------*/

if ( !function_exists( 'ecofine_comments_pagination' ) ) {
    function ecofine_comments_pagination() {
        the_comments_pagination( array(
            'screen_reader_text' => ' ',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ) );
    }
}


/*--------------------------------
Ecofine Post Pagination
----------------------------------*/

function ecofine_post_navigation() {
    $prev_post = get_previous_post();
    $next_post = get_next_post();
    if ( ! $prev_post && ! $next_post ) {
        return;
    }
    ?>
    <nav class="ecofine-post-navication-thum" role="navigation">
        <h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'ecofine' ); ?></h2>
        <div class="nav-links">
            <?php
            if ( $prev_post ) :
                $prev_post_thumb = get_the_post_thumbnail( $prev_post->ID, 'thumbnail' );
                ?>
                <div class="nav-previous post-thum-nav">

					<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>" class="nav-label">
						<span class="nav-subtitle"><i class="fas fa-angle-double-left"></i><?php esc_html_e( 'Previous Post', 'ecofine' ); ?></span>
					</a>

                    <div class="nav-holder">
						<?php if ( $prev_post_thumb ) : ?>
							<div class="nav-thumb">
								<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>"><?php echo get_the_post_thumbnail( $prev_post->ID, 'thumbnail' ); ?></a>
							</div>
						<?php endif; ?>
						<div class="nav-title">
							<a href="<?php echo esc_url( get_the_permalink( $prev_post->ID ) ); ?>">
								<span class="nav-title"><?php echo esc_html( get_the_title( $prev_post->ID ) ); ?></span>
							</a>
						</div>
                    </div>

                </div>
            <?php endif; ?>

            <?php
            if ( $next_post ) :
                $next_post_thumb = get_the_post_thumbnail( $next_post->ID, 'thumbnail' );
                ?>
				<div class="nav-next post-thum-nav">

					<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>" class="nav-label">
						<span class="nav-subtitle"><?php esc_html_e( 'Next Post', 'ecofine' ); ?><i class="fas fa-angle-double-right"></i></span>
					</a>

                    <div class="nav-holder">
						<div class="nav-title">
							<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>">
								<span class="nav-title"><?php echo esc_html( get_the_title( $next_post->ID ) ); ?></span>
							</a>
						</div>
						<?php if ( $next_post_thumb ) : ?>
							<div class="nav-thumb">
								<a href="<?php echo esc_url( get_the_permalink( $next_post->ID ) ); ?>"><?php echo get_the_post_thumbnail( $next_post->ID, 'thumbnail' ); ?></a>
							</div>
						<?php endif; ?>
                    </div>

                </div>

            <?php endif; ?>
        </div>
    </nav>
    <?php
}


/*--------------------------------
Allode Megamenu
----------------------------------*/
add_filter( 'nav_menu_css_class', 'ecofine_megamenu_class', 10, 2 );
function ecofine_megamenu_class( $classes, $item ) {
	$navmega = get_post_meta( $item->ID, 'ecofine_navmeta', true );
	if ( in_array( 'menu-item-has-children', $classes ) && !empty( $navmega ) ) {
		if ( !empty( $navmega['ecofine_nav_megamenu_show'] == true ) ) {
			$megamenu = 'mega ';
		} else {
			$megamenu = 'no-mega ';
		}
		$classes[] = $megamenu . $navmega['ecofine_nav_mmenu_column'];
	}
	return $classes;
}


/*--------------------------------
ALLOWD HTML TAG
----------------------------------*/

function ecofine_html_allow( $tags, $context ) {
    switch ( $context ) {
    case 'ecofine_allowed_html':
        $tags = array(
            'a'  => array(
                'class'  => array(),
                'href'   => array(),
                'rel'    => array(),
                'title'  => array(),
                'target' => array(),
            ),
            'abbr'  => array(
                'title' => array(),
            ),
            'b'  => array(),
            'blockquote'  => array(
                'cite' => array(),
            ),
            'cite'  => array(
                'title' => array(),
            ),
            'code'  => array(),
            'del'  => array(
                'datetime' => array(),
                'title'    => array(),
            ),
            'dd'  => array(),
            'div' => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'dl'  => array(),
            'dt'  => array(),
            'em'  => array(),
            'h1'  => array(),
            'h2'  => array(),
            'h3'  => array(),
            'h4'  => array(),
            'h5'  => array(),
            'h6'  => array(),
            'i'  => array(
                'class' => array(),
            ),
            'img'  => array(
                'alt'    => array(),
                'class'  => array(),
                'height' => array(),
                'src'    => array(),
                'width'  => array(),
            ),
            'li'  => array(
                'class' => array(),
            ),
            'ol'  => array(
                'class' => array(),
            ),
            'p'  => array(
                'class' => array(),
            ),
            'q'  => array(
                'cite'  => array(),
                'title' => array(),
            ),
            'span'  => array(
                'class' => array(),
                'title' => array(),
                'style' => array(),
            ),
            'iframe' => array(
                'width'       => array(),
                'height'      => array(),
                'scrolling'   => array(),
                'frameborder' => array(),
                'allow'       => array(),
                'src'         => array(),
            ),
            'strike'  => array(),
            'br'  => array(),
            'small'  => array(),
            'strong'  => array(),
            'ul' => array(
                'class' => array(),
            ),
        );
        return $tags;
    default:
        return $tags;
    }
}
add_filter( 'wp_kses_allowed_html', 'ecofine_html_allow', 10, 2 );


/*--------------------------------
Ecofine Pagination 
----------------------------------*/

if ( !function_exists( 'ecofine_pagination' ) ) {
    function ecofine_pagination() {
        the_posts_pagination( array(
            'screen_reader_text' => '',
            'prev_text'          => '<i class="fa fa-angle-left"></i>',
            'next_text'          => '<i class="fa fa-angle-right"></i>',
            'type'               => 'list',
            'mid_size'           => 1,
        ) );
    }
}


/*--------------------------------
Add Span In category number
----------------------------------*/

add_filter( 'wp_list_categories', 'ecofine_cat_count_span' );
function ecofine_cat_count_span( $links ) {
    $links = str_replace( '</a> (', '</a> <span class="post-count-number">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}

/*--------------------------------
Add Span In archive number
----------------------------------*/

function ecofine_the_archive_count( $links ) {
    $links = str_replace( '</a>' . esc_attr__( '&nbsp;', 'ecofine' ) . '(', '</a> <span class="post-count-number">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}
add_filter( 'get_archives_link', 'ecofine_the_archive_count' );