<?php if(get_option('dt_ms_random_order') == 'true') {
	$rand = 'rand';
} else {
	$rand = '';	
} ?>
<header>
<h2><?php echo get_option('Сезон','Сезон'); ?></h2>
<?php if(get_option('dt_ms_autoplay_slider') == 'true') { } else { ?>
<div class="nav_items_module">
  <a class="btn prev2"><i class="icon-caret-left"></i></a>
  <a class="btn next2"><i class="icon-caret-right"></i></a>
</div>
<?php } ?>
<span><?php if($url = get_option('dt_seasons_slug','seasons')) { ?><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><?php _e('See all','mtms'); ?></a> /<?php } ?> <?php echo total_temporadas(); ?></span>
</header>
<div id="seaload" class="load_modules"><?php _e('Loading..','mtms');?></div>
<div id="dt-seasons" class="animation-2 items">
	<?php query_posts( array('post_type' => array('seasons'), 'showposts' => get_option('dt_ms_number_items','20'), 'orderby' => $rand, 'order' => 'desc' )); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part('inc/parts/item_se'); ?>
	<?php endwhile; wp_reset_query(); ?>
</div>
	