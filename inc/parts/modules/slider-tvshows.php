<?php if(get_option('dt_slider_radom') =='true') {
	$rand = 'rand';
} else {
	$rand = '';	
} ?>
<div id="sltvload" class="load_modules"><?php _e('Loading..','mtms');?></div>
<div id="slider-tvshows" class="animation-1 slider">
<?php query_posts( array('post_type' => array('tvshows'), 'showposts' => get_option('dt_slider_items','10'), 'orderby' => $rand, 'order' => 'desc' )); ?>
<?php while ( have_posts() ) : the_post(); get_template_part('inc/parts/item_b'); endwhile; wp_reset_query(); ?>
</div>