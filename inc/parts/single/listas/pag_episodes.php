<div class="pag_episodes">
<?php
$ids = get_post_meta($post->ID, "ids", $single = true);
$season = get_post_meta($post->ID, "temporada", $single = true);
$episode = get_post_meta($post->ID, "episodio", $single = true) - 1;
$datafull = season_of($ids);
query_posts(
	array(
		'meta_key' => 'ids',
		'post_type' => 'episodes',
		'showposts' => '1',
		'order' => 'DESC',
		'meta_query' => array(
		'relation' => 'AND',
			array('key' => 'episodio', 'value' => $episode, 'compare' => '=',),
			array('key' => 'temporada','value' => $season,'compare' => '=',),
			array('key' => 'ids','value' => array( $ids ),'compare' => 'IN'),
		),
	)
);
$count = 0;
if (have_posts()): while ( have_posts() ) : the_post(); ?>
<div class="item">
<a href="<?php the_permalink(); ?>?player=option-1" title="<?php the_title(); ?>">
<i class="icon-chevron-left"></i> <span><?php _e('previous episode','mtms'); ?></span>
</a>
</div>
<?php $count++; endwhile; else: ?>
<div class="item"><a class="nonex"><i class="icon-chevron-left"></i> <span><?php _e('previous episode','mtms'); ?></span></a></div>
<?php endif; wp_reset_query(); ?>


<div class="item">
<a href="<?php echo esc_url(home_url(). '/'.get_option('dt_tvshows_slug','tvshows').'/'. sanitize_title(dt_get_meta('serie')) .'/') ?>?tab=episodes">
<i class="icon-bars"></i> <span><?php _e('episodes list','mtms'); ?></span>
</a>
</div>

<?php
$ids = get_post_meta($post->ID, "ids", $single = true);
$season = get_post_meta($post->ID, "temporada", $single = true);
$episode = get_post_meta($post->ID, "episodio", $single = true) + 1;
$datafull = season_of($ids);
query_posts(
	array(
		'meta_key' => 'ids',
		'post_type' => 'episodes',
		'showposts' => '1',
		'order' => 'DESC',
		'meta_query' => array(
		'relation' => 'AND',
			array('key' => 'episodio', 'value' => $episode, 'compare' => '=',),
			array('key' => 'temporada','value' => $season,'compare' => '=',),
			array('key' => 'ids','value' => array( $ids ),'compare' => 'IN'),
		),
	)
);
$count = 0;
if (have_posts()): while ( have_posts() ) : the_post(); ?>
<div class="item">
<a href="<?php the_permalink(); ?>?player=option-1" title="<?php the_title(); ?>">
<span><?php _e('next episode','mtms'); ?></span> <i class="icon-chevron-right"></i>
</a>
</div>
<?php $count++; endwhile; else: ?>
<div class="item"><a class="nonex"><span><?php _e('next episode','mtms'); ?></span> <i class="icon-chevron-right"></i></a></div>
<?php endif; wp_reset_query(); ?>
</div>