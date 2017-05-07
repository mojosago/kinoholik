<?php 
$se = dt_get_meta("temporada");
$ep = dt_get_meta("episodio");
$name = dt_get_meta("episode_name");
$serie = dt_get_meta("serie");
$dates = dt_get_meta("air_date");
?>
<article class="item se <?php echo get_post_type(); ?>" id="post-<?php the_id(); ?>">
	<div class="poster">
		<img src="<?php if($thumb_id = get_post_thumbnail_id()) { $thumb_url = wp_get_attachment_image_src($thumb_id,'dt_episode_a', true); echo $thumb_url[0]; } else { dt_image('dt_backdrop', $post->ID, 'w300'); } ?>" alt="<?php the_title(); ?>">
		<div class="season_m animation-1">
			<a href="<?php the_permalink() ?>">
				<span class="b"><?php echo $se; ?>x<?php echo $ep; ?></span>
				<span class="a"><?php _e('season x episode','mtms'); ?></span>
				<span class="c"><?php echo $serie; ?></span>
			</a>
		</div>
		<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'dtquality'))) {  ?><span class="quality"><?php echo $mostrar; ?></span><?php } ?>
		<span class="serie"><?php echo $serie; ?>  ( <?php echo $se; ?> x <?php echo $ep; ?> )</span>
	</div>
	<div class="data">
		<h3><?php echo $name; ?></h3>
		<span><?php $date = new DateTime($dates); echo $date->format(DT_TIME); ?></span>
	</div>
</article>