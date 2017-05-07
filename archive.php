<?php get_header(); ?>
<div class="module">
	<?php get_template_part('inc/parts/sidebar'); ?>
	<div class="content">
	   <?php if(get_post_type( get_the_ID() ) ==  'tvshows') { ?>
		<header>
			<h1><?php _e('TV Shows','mtms'); ?></h1> 
			<span><?php echo total_series(); ?></span>
		</header>
			<?php get_template_part('inc/parts/form_generate_series'); ?>
		<?php } elseif(get_post_type( get_the_ID() ) ==  'movies') { ?>
		<header>
			<h1><?php _e('Movies','mtms'); ?></h1> 
			<span><?php echo total_peliculas(); ?></span>
		</header>
			<?php get_template_part('inc/parts/form_generate_movies'); ?>
		<?php } elseif(get_post_type( get_the_ID() ) ==  'seasons') { ?>
		<header><h1><?php _e('Seasons','mtms'); ?></h1> <span><?php echo total_temporadas(); ?></span></header>
		<?php } ?>
	<div id="archive-content" class="animation-2 items">
<?php if (have_posts()) :while (have_posts()) : the_post(); 
// Separando tipos de entrada
    if(get_post_type( get_the_ID() ) ==  'tvshows') {
		// resolviendo series
		get_template_part('inc/parts/item');
    } elseif(get_post_type( get_the_ID() ) ==  'seasons') {
		// resolviendo temporadas
		get_template_part('inc/parts/item_se');
    } elseif(get_post_type( get_the_ID() ) ==  'episodes') {
		// resolviendo episodios
		get_template_part('inc/parts/item_ep');
    } elseif(get_post_type( get_the_ID() ) ==  'movies') {
		// resolviendo peliculas
		get_template_part('inc/parts/item');
    } else {
		// entradas por defecto
		get_template_part('inc/parts/post');
    }
	 endwhile; endif; ?>
	</div>
	<?php if (function_exists("pagination")) { pagination($additional_loop->max_num_pages); } ?>
	</div>
</div>
<?php get_footer(); ?>