<article class="simple <?php echo get_post_type(); ?>" id="<?php the_id(); ?>">
	<div class="poster">
		<a href="<?php the_permalink() ?>">
			<img src="<?php if($thumb_id = get_post_thumbnail_id()) { $thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_b', true); echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w185'); } ?>" alt="<?php the_title(); ?>">
		</a>
	</div>
</article>