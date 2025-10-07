<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ecofine
 */
$ecofine_single_post_author = ecofine_options('ecofine_single_post_author', true);
$ecofine_single_post_date = ecofine_options('ecofine_single_post_date', true);
$ecofine_single_post_cmnt = ecofine_options('ecofine_single_post_cmnt', true);
$ecofine_single_post_cat = ecofine_options('ecofine_single_post_cat', true);
$ecofine_single_post_tag = ecofine_options('ecofine_single_post_tag', true);
$ecofine_post_share = ecofine_options('ecofine_post_share', false);
$ecofine_post_top_share = ecofine_options('ecofine_post_top_share', false);

if( has_post_thumbnail() or has_post_format( 'video' ,get_the_ID()) or has_post_format( 'audio' ,get_the_ID())){
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

<article id="post-<?php the_ID(); ?>" <?php post_class('post-details'); ?>>
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
			<div class="vendor post-img">
				<<?php echo esc_attr($code); ?> width="100%" height="500" src="<?php echo esc_url($ecofine_postvideo['ecofine_post_video']); ?>" frameborder="0" allowfullscreen="false"></<?php echo esc_attr($code); ?>>
			</div>
			<?php 
		}elseif(has_post_format( 'audio' , get_the_ID() ) && !empty($ecofine_postaudio['ecofine_post_audio'])){
			?>
			<div class="vendor post-img">
				<<?php echo esc_attr($code); ?> width="100%" height="400" src="<?php echo esc_url($ecofine_postaudio['ecofine_post_audio']); ?>" frameborder="0" allowfullscreen="false"></<?php echo esc_attr($code); ?>>
			</div>
			<?php 
		}elseif(has_post_format( 'gallery' , get_the_ID() ) && !empty($ecofine_gallery_ids)){
			?>
				<div class="post-gallerys post-img">
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
	<div class="<?php echo esc_attr($ecofine_thum_class); ?> post-contents entry-content">
		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="post-meta-box">
			<div class="post-meta-item">
				<ul>
					<?php if($ecofine_single_post_author == true ) : ?>
					<li><?php ecofine_posted_by(); ?></li>
					<?php endif; ?>

					<?php if( $ecofine_single_post_date == true ) : ?>
					<li><?php ecofine_posted_on(); ?></li>
					<?php endif; ?>

					<?php if( $ecofine_single_post_cmnt == true && get_comments_number() != 0) : ?>
						<li class="comment-number"><?php ecofine_comment_count(); ?></li>
                    <?php endif; ?>

					<?php if($ecofine_single_post_cat == true ) : ?>
					<li class="post-cat"><?php ecofine_post_cat(); ?></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
		<?php endif; ?>
		
		<div class="post-content">
		<?php
		
			the_content( sprintf(
				wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'ecofine' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecofine' ),
				'after'  => '</div>',
			) );
			?>
			
		</div>
		
		<?php if( has_tag() or function_exists( 'ecofine_post_share' ) ) : ?>
			<div class="post-content-tags">
				<div class="post-tag-social">
					<?php if( $ecofine_single_post_tag == true ) : ?>
					<div class="post-tag flex-grow-1">
						<?php if( has_tag() ) : ?>
							<?php ecofine_post_tag(); ?>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if( $ecofine_post_share == true ) : ?>
					<div class="post-share">
						<label><?php esc_html_e( 'Share','ecofine' ); ?></label>
						<?php if( function_exists('ecofinecore_post_share' )){
							ecofinecore_post_share();
						} ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endif; ?>

	</div>
</article>
