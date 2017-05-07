<?php 
// Single Tabs
if( isset( $_GET[ 'tab' ] ) ) {  
	$tab = $_GET[ 'tab' ];  
		} else {
			$tab = '';
        }
$dato = $_GET['tab'];
// Movies Meta data
$dt_date1			= new DateTime(dt_get_meta('first_air_date'));
$dt_date2			= new DateTime(dt_get_meta('last_air_date'));
$dt_id_tvshow		= dt_get_meta('ids');
$dt_episodes		= dt_get_meta('number_of_episodes');
$dt_seasons			= dt_get_meta('number_of_seasons');
$dt_original_title	= dt_get_meta('original_name');
$dt_status			= dt_get_meta('status');
$dt_tmdb_rating		= dt_get_meta('imdbRating');
$dt_tmdb_votes		= dt_get_meta('imdbVotes');
$dt_runtime			= dt_get_meta('episode_run_time');
$dt_homepage		= dt_get_meta('homepage');
$dt_popularity		= dt_get_meta('popularity');
$dt_type			= dt_get_meta('type');
$dt_trailer			= dt_get_meta('youtube_id');
$dt_images			= dt_get_meta('imagenes');
$dt_cast			= dt_get_meta('dt_cast');
// Datos 
$dt_rating_dt		= dt_get_meta('_starstruck_avg');
$dt_votes_dt		= dt_get_meta('_starstruck_total');
?>  



<div id="single">
<?php single_dt(); if (have_posts()) :while (have_posts()) : the_post(); set_dt_views(get_the_ID()); ?>


<div class="content">
<div class="sheader">
	<div class="poster">
	<img src="<?php if($thumb_id = get_post_thumbnail_id()) { $thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_a', true); echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w185'); } ?>" alt="<?php the_title(); ?>">
	</div>
	<div class="data">
		<h1><?php the_title(); ?></h1>
		<div class="extra">
			<?php if($d = $dt_date1) { echo '<span class="date">', $d->format(DT_TIME), '</span>'; } ?> 
			<span><?php echo get_the_term_list($post->ID, 'dtnetworks', '', '', ''); ?></span>
		</div>
		<?php echo do_shortcode( '[starstruck_shortcode]' ); ?>
		<div class="sgeneros">
		<?php echo get_the_term_list($post->ID, 'genres', '', '', ''); ?>
		</div>
	</div>
</div>


<div class="single_tabs">
	<ul id="section" class="smenu">
	<li><a <?php echo $tab == '' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>"><?php _e('Info','mtms'); ?></a></li>
	<li><a <?php echo $tab == 'episodes' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=episodes"><?php _e('Episodes','mtms'); ?></a></li>
	<?php if($dt_cast) { ?><li><a <?php echo $tab == 'cast' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=cast"><?php _e('Cast','mtms'); ?></a></li><?php } ?>
	<?php if($dt_trailer) { ?><li><a <?php echo $tab == 'trailer' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=trailer"><?php _e('Trailer','mtms'); ?></a></li><?php } ?>
	<?php if($dt_images) { ?><li><a <?php echo $tab == 'images' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=images"><?php _e('Images','mtms'); ?></a></li><?php } ?>
	</ul>
	<?php if ( is_user_logged_in() ) { echo get_simple_likes_button( get_the_ID() ); } ?>
</div>



<?php if ($dato == "cast") { ?>
<div class="sbox">
	<h2><?php _e('Full Cast & Crew','mtms'); ?></h2>
	<table class="persons">
		<tbody>
			<?php  dt_creator($post->ID, "img", true); ?>
			<?php dt_cast_2($post->ID, "img", true); ?>
		</tbody>
	</table>
</div>
<?php } ?>

<?php if ($dato == "trailer") { ?>
<div class="sbox">
	<h2><?php _e('Video trailer','mtms'); ?></h2>
	<div class="videobox">
		<div class="embed">
			<?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer_iframe($trailers) ?>
		</div>
	</div>
</div>
<?php } ?>

<?php if ($dato == "images") { ?>
<div class="sbox">
	<h2><?php _e('Images','mtms'); ?></h2>
	<div id="dt_galery" class="galeria">
		<?php dt_get_images("w780", $post->ID); ?>
	</div>
</div>
<?php } ?>


<?php if ($dato == "") {  ?>

<div class="sbox">
	<h2><?php _e('Synopsis','mtms'); ?></h2>
	<div class="wp-content">
		<?php the_content(); ?>
		<?php if(get_option('ads_ss_2') =="true") { if($ads = get_option('ads_spot_single')) { echo '<div class="module_single_ads">'. stripslashes($ads). '</div>'; } } ?>
	
	</div>

	<?php if($d = $dt_original_title) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Original title','mtms'); ?></b>
		<span class="valor"><?php echo $d; ?></span>
	</div>
	<?php } ?>

	<?php if($d = $dt_date1) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Firt air date','mtms'); ?></b>
		<span class="valor"><?php echo $d->format(DT_TIME); ?></span>
	</div>
	<?php } ?>

	<?php if($d = $dt_date2) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Last air date','mtms'); ?></b>
		<span class="valor"><?php echo $d->format(DT_TIME); ?></span>
	</div>
	<?php } ?>

	<?php if($d = $dt_seasons) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Seasons','mtms'); ?></b>
		<span class="valor"><?php echo $d; ?></span>
	</div>
	<?php } ?>

	<?php if($d = $dt_episodes) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Episodes','mtms'); ?></b>
		<span class="valor"><?php echo $d; ?></span>
	</div>
	<?php } ?>

	<?php if($d = $dt_status) { ?>
	<div class="custom_fields">
		<b class="variante"><?php _e('Status','mtms'); ?></b>
		<span class="valor"><?php echo $d; ?></span>
	</div>
	<?php } ?>
</div>

<?php } ?>



<?php if ($dato == "episodes") { get_template_part('inc/parts/single/listas/se_ep');  } ?>


<?php get_template_part('inc/parts/single/relacionados'); ?>
<?php links_social_single(); ?>
<?php get_template_part('inc/parts/comments'); ?>
</div>
<?php endwhile; endif; ?>


<div class="sidebar scrolling">
	<?php if($widgets = dynamic_sidebar( 'sidebar-tvshows' )) { $widgets; } else { echo '<a href="'. esc_url( home_url() ) .'/wp-admin/widgets.php" target="_blank">'. __('Add widgets','mtms') .'</a>'; } ?>
</div>




</div>