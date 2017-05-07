<?php if(get_option('dt_me_random_order')) {
	$rand = 'rand';
} else {
	$rand = '';	
} ?>
<header>
<h2><?php echo get_option('Епизоди','Епизоди'); ?></h2>
<?php if(get_option('dt_me_autoplay_slider') == 'true') { } else { ?>
<div class="nav_items_module">
  <a class="btn prev"><i class="icon-caret-left"></i></a>
  <a class="btn next"><i class="icon-caret-right"></i></a>
</div>
<?php } ?>
<span><?php if($url = get_option('dt_episodes_slug','episodes')) { ?><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><?php _e('See all','mtms'); ?></a> /<?php } ?> <?php echo total_episodios(); ?></span>
</header>
<div id="epiload" class="load_modules"><?php _e('Loading..','mtms');?></div>
<div id="dt-episodes" class="animation-2 items">
	<?php query_posts( array('post_type' => array('episodes'), 'showposts' => get_option('dt_me_number_items','20') , 'orderby' => $rand, 'order' => 'desc' )); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('inc/parts/item_ep'); ?>
	<?php endwhile; wp_reset_query(); ?>
</div>

