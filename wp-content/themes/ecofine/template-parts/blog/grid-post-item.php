<?php 

$ecofine_post_author = ecofine_options('ecofine_post_author', true);
$ecofine_post_date = ecofine_options('ecofine_post_date', true);
$ecofine_blog_read_text = ecofine_options('ecofine_blog_read_text','Read More');
$ecofine_show_readmore = ecofine_options('ecofine_show_readmore', true);

if( has_post_thumbnail() or has_post_format( 'video' ,get_the_ID()) or has_post_format( 'audio' ,get_the_ID()) or has_post_format( 'gallery' ,get_the_ID())){
    $ecofine_thum_class = 'with-thum-img';
}else{
    $ecofine_thum_class = 'no-thum-img';
}

$code = 'iframe';

if(get_post_meta( get_the_ID(), 'ecofine_postmeta_video', true)) {
	$ecofine_postvideo = get_post_meta( get_the_ID(), 'ecofine_postmeta_video', true );
}else {
  $ecofine_postvideo = array();
}

if(get_post_meta( get_the_ID(), 'ecofine_postmeta_audio', true)) {
	$ecofine_postaudio = get_post_meta( get_the_ID(), 'ecofine_postmeta_audio', true );
}else {
  $ecofine_postaudio = array();
}

if(get_post_meta( get_the_ID(), 'ecofine_postmeta_gallery', true)) {
	$ecofine_postgallery = get_post_meta( get_the_ID(), 'ecofine_postmeta_gallery', true );
    $ecofine_postgallerys = $ecofine_postgallery['ecofine_post_gallery']; // for eg. 15,50,70,125
    $ecofine_gallery_ids = explode( ',', $ecofine_postgallerys );
}else {
  $ecofine_postgallery = array();
}

?>
<div class="col-lg-4 col-md-12 grid-post-item single-post-item">
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
        <?php 
        if(has_post_format( 'video' ,get_the_ID()) && has_post_thumbnail() ){

            ?>
                <div class="post-img">
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecofine-large' ) ?>"
                    alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                    
                    <a href="<?php echo esc_url($ecofine_postvideo['ecofine_post_video']); ?>" class="post-video video-popup"><i class="fas fa-play"></i></a>
                </div>
            <?php

        }elseif(has_post_format( 'video' , get_the_ID() ) && !empty($ecofine_postvideo['ecofine_post_video'])){
            ?>
                <div class="vendor">
                    <<?php echo esc_attr($code); ?> width="100%" height="500" src="<?php echo esc_url($ecofine_postvideo['ecofine_post_video']); ?>"></<?php echo esc_attr($code); ?>>
                </div>
            <?php 

        }elseif(has_post_format( 'audio' , get_the_ID() ) && !empty($ecofine_postaudio['ecofine_post_audio'])){
            ?>
                <div class="vendor">
                    <<?php echo esc_attr($code); ?> width="100%" height="400" src="<?php echo esc_url($ecofine_postaudio['ecofine_post_audio']); ?>"></<?php echo esc_attr($code); ?>>
                </div>
            <?php 
        }elseif(has_post_format( 'gallery' , get_the_ID() ) && !empty($ecofine_gallery_ids)){
            ?>
                <div class="post-gallerys">
                    <?php 
                        foreach( $ecofine_gallery_ids as $gallery_id ){
                            echo wp_get_attachment_image( $gallery_id, 'ecofine-large' );
                        }
                    ?>
                </div>
            <?php 
        }elseif(has_post_thumbnail()){
            ?>
                <div class="post-img">
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'ecofine-large' ) ?>"
                    alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true ); ?>">
                </div>
            <?php 
        }
        ?>
       <div class="post-contents <?php echo esc_attr($ecofine_thum_class); ?>">
            <div class="post-meta-box">
                <div class="post-meta-item">
                    <ul>
                        <?php if( $ecofine_post_author == true ) : ?>
                            <li><?php ecofine_posted_by(); ?></li>
                        <?php endif; ?>

                        <?php if( $ecofine_post_date == true ) : ?>
                            <li><?php ecofine_posted_on(); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div class="post-title">
                <?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
            </div>
            <div class="post-content">
                <p>
                <?php echo ecofine_words_limit( get_the_excerpt(), 20 ); ?><?php if ( ! empty( get_the_content() ) ) {
						echo ' [...]';
					} ?>
                </p>
            </div>
            <?php if( $ecofine_show_readmore == true ) : ?>
                <div class="post-button">
                    <a href="<?php echo esc_url( get_permalink() ); ?>" class="theme-btns"> <span><?php echo esc_html($ecofine_blog_read_text); ?><i class="fas fa-angle-double-right"></i> </span></a>
                </div>
            <?php endif; ?>
       </div>
    </article>
</div>