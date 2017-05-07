<?php 
// Meta datos
$ids		= dt_get_meta('ids');
$temp		= dt_get_meta('temporada');
$airdate	= new DateTime(dt_get_meta('air_date'));
$serie		= dt_get_meta('serie');
// Imagenes
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_a', true);
?>
<div id="single">
<?php single_dt(); if (have_posts()) :while (have_posts()) : the_post(); set_dt_views(get_the_ID()); ?>
<div class="content">
<div class="sheader">
	<div class="poster">
		<img src="<?php if($thumb_id) { echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w185'); } ?>" alt="<?php the_title(); ?>">
	</div>
	<div class="data">
		<h1><?php the_title(); ?></h1>
		<div class="extra">
			<?php if($d = $airdate) { echo '<span class="date">', $d->format(DT_TIME), '</span>'; } ?> 
		</div>
		<?php echo do_shortcode( '[starstruck_shortcode]' ); ?>
		<div class="sgeneros">
			<?php if($url = get_option('dt_tvshows_slug','tvshows')) { ?>
				<a href="<?php echo esc_url(home_url(). '/'.$url.'/'. sanitize_title($serie) .'/') ?>"><?php echo $serie; ?></a>
			<?php } ?>
		</div>
	</div>
</div>
<div class="sbox">
	<div class="wp-content" style="margin-bottom: 10px;">
	<?php the_content(); ?>
	<?php if(get_option('ads_ss_3') =="true") { if($ads = get_option('ads_spot_single')) { echo '<div class="module_single_ads">'. stripslashes($ads). '</div>'; } } ?>
	
	</div>
	<h2><?php _e('Episodes','mtms'); ?></h2>
	<?php get_template_part('inc/parts/single/listas/se'); ?>
</div>
<?php 
if(dt_get_meta('clgnrt') =='1') { /* none */ } else {
global $user_ID; if( $user_ID ) : if( current_user_can('level_10') ) : ?>
<div class="sbox">
 <a class="button main dtload" href="<?php echo get_template_directory_uri(); ?>/inc/api/episodes.php?se=<?php echo $ids;?>&te=<?php echo $temp;?>&link=<?php echo $id; ?>"><?php _e('Generate episodes','mtms'); ?></a>
</div>
<?php endif; endif; 
}
?>
<?php links_social_single(); ?>
<?php get_template_part('inc/parts/comments'); ?>
<?php endwhile; endif; ?>
</div>
<div class="sidebar scrolling">
	<?php if($widgets = dynamic_sidebar( 'sidebar-seasons' )) { $widgets; } else { echo '<a href="'. esc_url( home_url() ) .'/wp-admin/widgets.php">'. __('Add widgets','mtms') .'</a>'; } ?>
</div>
</div>
