<?php //  Image
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_a', true);
?>  
<article class="item <?php echo get_post_type(); ?>" id="post-<?php the_id(); ?>">
	<div class="poster">
		<a href="<?php the_permalink() ?>"><img src="<?php if($thumb_id) { echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w185'); } ?>" alt="<?php the_title(); ?>"></a>
		<?php if($values = dt_get_meta( DT_MAIN_RATING )) { ?>
		<div class="rating"><span class="icon-star2"></span> <?php echo $values; ?></div>
		<?php } else { ?>
		<div class="rating"><span class="icon-star2"></span> 0</div>
		<?php } ?>
		<?php wp_delete_post_link('<span class="icon-times-circle"></span>', '<i class="delete">', '</i>'); ?>




		<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'dtquality'))) {  ?><span class="quality"><?php echo $mostrar; ?></span><?php } ?>

	</div>
	<div class="data">
	<?php # echo do_shortcode("[post-views]"); ?>
		<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		
		<?php  if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'dtyear'))) {  ?>
		<span><?php echo $mostrar; ?></span>

		<?php } ?>
	</div>
	<?php if(is_archive()) { get_template_part('inc/parts/info_tip'); } ?>
</article>