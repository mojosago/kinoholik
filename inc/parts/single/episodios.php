<?php 

// Movies Meta data
$dt_date = new DateTime(dt_get_meta('air_date'));
$name	= dt_get_meta('episode_name');
$serie = dt_get_meta('serie');
$ids = dt_get_meta('ids');
$temp = dt_get_meta('temporada');
$epis = dt_get_meta('episodio');
$poster = dt_get_meta('dt_poster');
$backdrop = dt_get_meta('dt_backdrop');
$dt_images = dt_get_meta('imagenes');
$dt_player = get_post_meta($post->ID, 'repeatable_fields', true);

if( isset( $_GET[ 'player' ] ) ) {  
	$tabp = $_GET[ 'player' ];  
	} else {
		$tabp = '';
	}

if( isset( $_GET[ 'tab' ] ) ) {  
	$tab = $_GET[ 'tab' ];  
		} else {
			$tab = '';
        }
$dato = $_GET['tab'];
?>
<?php single_dt(); if (have_posts()) :while (have_posts()) : the_post(); /*set_dt_views(get_the_ID());*/ ?>
<div id="single">
<div class="content">
<?php get_template_part('inc/parts/single/listas/pag_episodes'); ?>
<div class="epiheader">
	<div class="epiposter">
		<img src="<?php dt_image('dt_poster', $post->ID, 'w90'); ?>" />
	</div>
	<div class="epidata">
		<?php if($d = $name) {   echo '<h1>', $d, ' <span>', $dt_date->format(DT_TIME), '</span>','</h1>';  } ?>
		<?php if($url = get_option('dt_tvshows_slug','tvshows')) { ?>
			<h3><a href="<?php echo esc_url(home_url(). '/'.$url.'/'. sanitize_title($serie) .'/') ?>?tab=episodes"><?php echo $serie; ?></a></h3>
		<?php } ?>
		<span class="data"><b><?php _e('Season','mtms'); ?></b> <p><?php echo $temp; ?></p></span>
		<span class="data"><b><?php _e('Episode','mtms'); ?></b> <p><?php echo $epis; ?></p></span>
	</div>
</div>
<div class="single_tabs">
	<ul id="section" class="smenu">
	<li><a <?php echo $tab == '' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>"><?php _e('Info','mtms'); ?></a></li>
	<?php if($dt_player) { ?><li><a <?php echo $tab == 'video' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=video&player=option-1"><?php _e('Video','mtms'); ?></a></li><?php } ?>
	<li><a <?php echo $tab == 'links' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=links"><?php _e('Links','mtms'); ?></a></li>
	</ul>
</div>
<?php if ($dato == "video") {  ?>
<div class="dt_player">
<?php  if ( $dt_player ) : ?>
<ul class="player_ul">
<?php $numerado = 1; { foreach ( $dt_player as $field ) { ?>
	<li><a <?php echo $tabp == 'option-'. $numerado .'' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=video&player=option-<?php echo $numerado; ?>"><?php echo $field['name']; ?></a></li>
<?php $numerado++; } } ?> 
</ul>
<?php endif; ?>
<?php  if ( $dt_player ) : ?>
		<div class="content_player">
		<?php $numerado = 1; { foreach ( $dt_player as $field ) { if ( $_GET['player'] == "option-". $numerado ."") { ?>
			<?php if($field['select'] == 'iframe') {  ?>
			<div class="videobox">
				<div class="embed">
					<iframe src="<?php echo $field['url']; ?>" width="560" height="315" frameborder="0" allowfullscreen></iframe>
				</div>
			</div><?php } ?>
			<?php if($field['select'] == 'mp4') {  ?> <?php echo do_shortcode('[video src="' . $field['url'] .'" width="759px" autoplay="on"]'); ?>   <?php } ?>
		<?php } $numerado++; } } ?> 
		</div>
<?php endif; ?>
</div>
<?php } ?>
<?php if ($dato == "") {  ?>
<div class="sbox">
	<div id="dt_galery_ep" class="galeria ggep">
		<?php dt_get_images("w780", $post->ID); ?>
	</div>
	<div class="wp-content">
		<?php the_content(); ?>
		<?php if(get_option('ads_ss_4') =="true") { if($ads = get_option('ads_spot_single')) { echo '<div class="module_single_ads">'. stripslashes($ads). '</div>'; } } ?>
	
	</div>
</div>
<?php } ?>
<div class="box_links">
<?php get_template_part('inc/parts/single/listas/links'); ?>
<?php get_template_part('inc/parts/form_send_link'); ?>
</div>
<?php links_social_single(); ?>
<?php get_template_part('inc/parts/comments'); ?> 
</div>
<?php endwhile; endif; ?>
<div class="sidebar scrolling">
	<?php if($widgets = dynamic_sidebar( 'sidebar-episodes' )) { $widgets; } else { echo '<a href="'. esc_url( home_url() ) .'/wp-admin/widgets.php">'. __('Add widgets','mtms') .'</a>'; } ?>
</div>
</div>
