
<?php
$postid = $post->ID;
$tmdb = get_post_meta($post->ID, "ids", $single = true);
$ic = season_of($tmdb);
if(!empty($ic)){ ?>
<div class="sbox">
<h2><?php _e('Seasons and episodes','mtms'); ?></h2>
<div id="serie_contenido">
<?php
$seasons = $ic['temporada']['all'];
$episodes = $ic['capitulo']['all'];
if(!empty($seasons)) { 
echo '<div id="seasons">'; 
}
$accountant = 0; foreach($seasons as $key_t=>$value_t) { ?>
<div class="se-c">
	<div class="se-q">
		<span class="se-t <?php if($accountant == 0){echo "se-o";} ?>"><?php echo $value_t['season']; ?></span>
		<span class="title"><?php _e('Season','mtms'); ?>  <?php echo $value_t['season']; ?> <i><?php $date = new DateTime(data_of('air_date', $value_t['id'])); echo $date->format(DT_TIME); ?></i>
			<div class="se_rating"><div class="se_rating_valor" style="width:<?php echo data_of('_starstruck_avg', $value_t['id'])*10; ?>%"></div></div>
		</span>
	</div>
	<div  class="se-a" <?php if($accountant == 0){echo "style='display:block'";} ?>>
		<ul class="episodios">
	<?php foreach($episodes as $key_c=>$value_c) { if($value_t['season'] == $value_c['season']) { ?>
			<li>
				<div class="imagen"><a href="<?php echo get_permalink( $value_c['id'] ); if(data_of('repeatable_fields', $value_c['id'])) { echo '?player=option-1'; } ?>"><img src="<?php if($thumb_id = get_post_thumbnail_id($value_c['id'])) { $thumb_url = wp_get_attachment_image_src($thumb_id,'dt_episode_a', true); echo $thumb_url[0]; } else { dt_image('dt_backdrop', $value_c['id'], 'w150'); } ?>"></a></div>
				<div class="numerando"><?php echo $value_t['season']; ?> - <?php echo data_of('episodio',$value_c['id']); ?></div>
				<div class="episodiotitle">
					<a href="<?php echo get_permalink( $value_c['id'] ); if(data_of('repeatable_fields', $value_c['id'])) { echo '?player=option-1'; } ?>"><?php if(data_of('episode_name', $value_c['id']) != __('no data','mtms')) { echo data_of('episode_name', $value_c['id']); } else { echo '<i class="icon-update"></i> ' . __('Coming soon','mtms'); } ?></a>
					<span class="date"><?php $date = new DateTime(data_of('air_date', $value_c['id'])); echo $date->format(DT_TIME); ?></span>
				</div>
			</li>
	<?php } } ?>
	</ul>
	</div>
</div>
<?php
$accountant++; 
}
if(!empty($seasons)){echo '</div>';
}
?>
</div>
</div>
<?php } else { global $user_ID; if( $user_ID ) : if( current_user_can('level_10') ) : 
if(dt_get_meta('clgnrt') =='1') { /* none */ } else { ?>
<div class="sbox">
 <a class="button main dtload" href="<?php echo get_template_directory_uri(); ?>/inc/api/seasons_admin.php?se=<?php echo dt_get_meta('ids'); ?>&link=<?php echo $id; ?>"><?php _e('Generate seasons','mtms'); ?></a>
</div>
<?php } endif; endif; } ?>
<script>
$(".se-q").click( function () {
  var container = $(this).parents(".se-c");
  var answer = container.find(".se-a");
  var trigger = container.find(".se-t");
  answer.slideToggle(200);
  if (trigger.hasClass("se-o")) {
    trigger.removeClass("se-o");
  }
  else {
    trigger.addClass("se-o");
  }
});
</script>