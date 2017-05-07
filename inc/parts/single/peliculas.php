<?php 
// Single Tabs
if( isset( $_GET[ 'tab' ] ) ) {  
	$tab = $_GET[ 'tab' ];  
		} else {
			$tab = '';
        }
// Tabs player
if( isset( $_GET[ 'player' ] ) ) {  
	$tabp = $_GET[ 'player' ];  
		} else {
			$tabp = '';
        }

$dato = $_GET['tab'];
// Movies Meta data
$dt_date			= new DateTime(dt_get_meta('release_date'));
$dt_apid			= dt_get_meta('ids');
$dt_rating_imdb		= dt_get_meta('imdbRating');
$dt_votes_imdb		= dt_get_meta('imdbVotes');
$dt_rated			= dt_get_meta('Rated');
$dt_country			= dt_get_meta('Country');
$dt_title_original	= dt_get_meta('original_title');
$dt_rating_tmdb		= dt_get_meta('vote_average');
$dt_votes_tmdb		= dt_get_meta('vote_count');
$dt_tagline			= dt_get_meta('tagline');
$dt_runtime			= dt_get_meta('runtime');
$dt_trailer			= dt_get_meta('youtube_id');
$dt_images			= dt_get_meta('imagenes');
$dt_maindrop		= dt_get_meta('dt_backdrop');
// Datos 
$dt_rating_dt		= dt_get_meta('_starstruck_avg');
$dt_votes_dt		= dt_get_meta('_starstruck_total');
$dt_player			= get_post_meta($post->ID, 'repeatable_fields', true);
//  Image
$thumb_id = get_post_thumbnail_id();
$thumb_url = wp_get_attachment_image_src($thumb_id,'dt_poster_a', true);
// update Rating...
if($_GET['update_imdb_rating'] =='true') {
	$api = "http://www.omdbapi.com/?i=" . $dt_apid . "";
	$json = file_get_contents($api);
	$data = json_decode($json, TRUE);
		update_post_meta($post->ID, 'imdbRating', $data['imdbRating']);
		update_post_meta($post->ID, 'imdbVotes', $data['imdbVotes']);
} ?>  
<?php single_dt(); if (have_posts()) :while (have_posts()) : the_post(); set_dt_views(get_the_ID()); ?>
<div id="single">
<div class="content">
<div class="sheader">
	<div class="poster">
		<img src="<?php if($thumb_id) { echo $thumb_url[0]; } else { dt_image('dt_poster', $post->ID, 'w185'); } ?>" alt="<?php the_title(); ?>">
	</div>
	<div class="data">
		<h1><?php the_title(); ?></h1>
		<div class="extra">
		<?php if($d = $dt_tagline) { echo '<span class="tagline">', $d, '</span>'; } ?>
		<?php if($d = $dt_date) { echo '<span class="date">', $d->format(DT_TIME), '</span>'; } ?> 
		<?php if($d = $dt_country) {   echo '<span class="country">(', $d, ')</span>';  } ?>
		<?php if($d = $dt_runtime) { echo '<span class="runtime">', $d, ' ', __('Min.','mtms'), '</span>'; }; ?>
		<?php if($d = $dt_rated) { echo '<span class="C'. $d .' rated">', $d, '</span>'; } ?>	
		</div>
		<?php echo do_shortcode( '[starstruck_shortcode]' ); ?>
		<div class="sgeneros">
		<?php echo get_the_term_list($post->ID, 'genres', '', '', ''); ?>
		</div>
	</div>
</div>
<div class="single_tabs">
	<ul id="section" class="smenu">
	<li><a <?php echo $tab == '' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>"><?php _e('Информация','mtms'); ?></a></li>
	<li><a <?php echo $tab == 'cast' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=cast"><?php _e('В ролите','mtms'); ?></a></li>
	<?php if($dt_trailer) { ?><li><a <?php echo $tab == 'trailer' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=trailer"><?php _e('Трейлър','mtms'); ?></a></li><?php } ?>
	<?php if($dt_images) { ?><li><a <?php echo $tab == 'images' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=images"><?php _e('Изображения','mtms'); ?></a></li><?php } ?>
	
	<?php if($dt_player) { ?><li><a <?php echo $tab == 'video' ? 'class="active"' : ''; ?> href="<?php the_permalink() ?>?tab=video&player=option-1"><?php _e('Видео','mtms'); ?></a></li><?php } ?>
	</ul>
	<?php if ( is_user_logged_in() ) { echo get_simple_likes_button( get_the_ID() ); } ?>
</div>
<?php #echo get_post_meta($post->ID, 'dt_views_count', true); ?>
<?php if ($dato == "video") { ?>
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
<?php if ($dato == "trailer") { ?>
<div class="sbox">
<h2><?php _e('Трейлър','mtms'); ?></h2>
<div class="videobox">
<div class="embed">
<?php $trailers = get_post_meta($post->ID, "youtube_id", $single = true); mostrar_trailer_iframe($trailers) ?>
</div>
</div>
</div>
<?php } ?>
<?php if ($dato == "images") { ?>
<div class="sbox">
<h2><?php _e('Изображения','mtms'); ?></h2>
<div id="dt_galery" class="galeria">
<?php dt_get_images("w780", $post->ID); ?>
</div>
</div>
<?php } ?>

<?php if ($dato == "cast") { ?>
<div class="sbox">
<h2><?php _e('Всички роли и Екип','mtms'); ?></h2>
<table class="persons">
<tbody>
<?php  dt_director($post->ID, "img", true); ?>
<?php dt_cast_2($post->ID, "img", true); ?>
</tbody>
</table>
</div>
<?php } ?>
<?php if ($dato == "") {  ?>

<?php if($dt_player) { ?>
<div class="video_player_enable">
	<div class="box" style="background-image: url('<?php dt_image('dt_backdrop', $post->ID, 'w600'); ?>');">
		<div class="play"><a href="<?php the_permalink() ?>?tab=video&player=option-1"><i class="icon-play3"></i></a></div>
		<?php if($mostrar = $terms = strip_tags( $terms = get_the_term_list( $post->ID, 'dtquality'))) {  ?><span class="quality"><?php echo $mostrar; ?></span><?php } else { ?>
		<span class="quality">HD</span>
		<?php } ?>
	</div>
</div>
<?php } ?>



<div class="sbox">
<h2><?php _e('Резюме','mtms'); ?></h2>
<div itemprop="description" class="wp-content">
<?php the_content(); ?>
<?php if(get_option('ads_ss_1') =="true") { if($ads = get_option('ads_spot_single')) { echo '<div class="module_single_ads">'. stripslashes($ads). '</div>'; } } ?>

</div>
<?php if($d = $dt_title_original) { ?>
<div class="custom_fields">
<b class="variante"><?php _e('Оригинално име','mtms'); ?></b>
<span class="valor"><?php echo $d; ?></span>
</div>
<?php } if($d = $dt_rating_imdb) { ?>
<div class="custom_fields">
<b class="variante"><?php _e('IMDb Оценка','mtms'); ?></b>
<span class="valor"><?php echo '<strong>', $d, '</strong> ', $dt_votes_imdb, ' ', __('оценки','mtms'); ?></span>
</div>
<?php } if($d = $dt_rating_tmdb) { ?>
<div class="custom_fields">
<b class="variante"><?php _e('TMDb Оценка','mtms'); ?></b>
<span class="valor"><?php echo '<strong>', $d, '</strong> ', $dt_votes_tmdb, ' ', __('оценки','mtms'); ?></span>
</div>
<?php } ?>
</div>
<?php } ?>

<?php get_template_part('inc/parts/single/relacionados'); ?>

<?php links_social_single(); ?>

<?php get_template_part('inc/parts/comments'); ?>
<?php endwhile; endif; ?>
</div>
<div class="sidebar scrolling">
	<?php if($widgets = dynamic_sidebar( 'sidebar-movies' )) { $widgets; } else { echo '<a href="'. esc_url( home_url() ) .'/wp-admin/widgets.php">'. __('Add widgets','mtms') .'</a>'; } ?>
</div>
</div>