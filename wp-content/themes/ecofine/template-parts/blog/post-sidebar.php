<?php
/**
 * Template part for displaying posts sidebar layout
 *
 * @package Ecofine
 */

if(is_archive()){
	$ecofine_pageLayout = ecofine_options('ecofine_archive_layout', 'right-sidebar');
}else if(is_search()){
	$ecofine_pageLayout = ecofine_options('ecofine_search_layout', 'right-sidebar');
}else{
	$ecofine_pageLayout = ecofine_options('ecofine_blog_layout', 'right-sidebar');
}

if($ecofine_pageLayout == 'left-sidebar' && is_active_sidebar('sidebar') || $ecofine_pageLayout == 'grid-ls' && is_active_sidebar('sidebar') || $ecofine_pageLayout == 'right-sidebar' && is_active_sidebar('sidebar') || $ecofine_pageLayout == 'grid-rs' && is_active_sidebar('sidebar')){
	$pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8';
}else{
	$pageColumnClass = 'col-12 col-sm-12 col-md-12 col-lg-12';
}

?>
<div class="row blog-page-with-sidebar">
	<?php
	if($ecofine_pageLayout == 'left-sidebar' && is_active_sidebar('sidebar') || $ecofine_pageLayout == 'grid-ls' && is_active_sidebar('sidebar')){
		get_sidebar();
	}
	?>
	<div class="<?php echo esc_attr($pageColumnClass);?>">
        <div class="row all-posts-wrapper">
            <?php
            if ( have_posts() ) :

                if ( is_home() && ! is_front_page() ) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php
                endif;
                /* Start the Loop */

                while ( have_posts() ) :
                    the_post(); ?>
                        <?php get_template_part( 'template-parts/blog/post-sidebar-item', get_post_format() ); ?>
                <?php
                endwhile;

            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
        </div>
        <?php 
        $ecofine_pagination = ecofine_options('ecofine_show_pagination', true );
        
            if($ecofine_pagination == true ){
                ecofine_pagination();
            };
        ?>
	</div>
	<?php
	if($ecofine_pageLayout == 'right-sidebar' && is_active_sidebar('sidebar') || $ecofine_pageLayout == 'grid-rs' && is_active_sidebar('sidebar')){
		get_sidebar();
	}
	?>

</div>