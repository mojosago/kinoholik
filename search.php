<?php get_header(); ?>
<div class="module">
	<?php get_template_part('inc/parts/sidebar'); ?>
	<div class="content">
	<header><h1><?php _e('Results','mtms'); ?></h1></header>
		<div class="search">
		<?php if (have_posts()) :while (have_posts()) : the_post(); ?>
			<article>
				<div class="poster"><a href="<?php the_permalink() ?>"><img src="<?php if($thumb_id = get_post_thumbnail_id()) { $thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_b', true); echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w90'); } ?>"></a></div>
				<div class="data">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php if($dt = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'dtyear'))) {  ?><span class="dtyear"><?php echo $dt; ?></span><?php } ?>
					<?php if($dat = dt_get_meta('tagline')): ?><p><?php echo $dat; ?></p><?php endif; ?>
					<div><span class="rating"><i class="icon-star2"></i> <?php if($dat = dt_get_meta(DT_MAIN_RATING)): echo $dat; else: echo '0'; endif; ?><span></div>
				</div>
			</article>
		<?php endwhile; else: ?>
			<?php _e('Nothing Found','mtms'); ?>
		<?php endif; ?>
		</div> 
	<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
	</div>
</div>
<?php get_footer(); ?>