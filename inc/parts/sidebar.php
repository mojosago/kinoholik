<div id="arch-menu" class="sidebar">
<div class="sidemenu">
<?php if ( is_tax() ) { ?>
<ul class="main_links">
<li><a href="<?php echo esc_url( home_url() ); ?>"><i class="icon-home"></i> <?php _e('Начало','mtms'); ?></a></li>
<?php if($url = get_option('dt_movies_slug','movies')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-video-camera"></i> <?php _e('Филми','mtms'); ?></a></li><?php } ?>
<?php if($url = get_option('dt_tvshows_slug','tvshows')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-tv"></i> <?php _e('Сериали','mtms'); ?></a></li><?php } ?>
<?php if($d = get_option('dt_trending_page')) { ?><li><a <?php dt_acp(sanitize_title( __('Trending','mtms')) ); ?> href="<?php echo $d; ?>"><i class="icon-fire"></i> <?php _e('Популярни','mtms'); ?></a></li><?php } ?>
<?php if($url = get_option('dt_ratings_slug','ratings')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-star2"></i> <?php _e('Оценени','mtms'); ?></a></li><?php } ?>
<?php if($url = get_option('dt_movies_slug','movies')) { ?><li><i class="icon-video-camera"></i> <?php _e('Movies HD','mtms'); ?></a></li><?php } ?>
</ul>
<?php } else { ?>
<ul class="main_links">
<li><a <?php if ( is_home() ) { echo 'class="active"'; } ?> href="<?php echo esc_url( home_url() ); ?>"><i class="icon-home"></i> <?php _e('Начало','mtms'); ?></a></li>
<?php if($url = get_option('dt_movies_slug','movies')) { ?><li><a <?php dt_acpt('movies'); ?> href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-video-camera"></i> <?php _e('Филми','mtms'); ?></a></li><?php } ?>
<?php /* if($url = get_option('dt_tvshows_slug','tvshows')) { ?><li><a <?php dt_acpt('tvshows'); ?> href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-tv"></i> <?php _e('Сериали','mtms'); ?></a></li><?php } */ ?>
<?php if($d = get_option('dt_trending_page')) { ?><li><a <?php dt_acp(sanitize_title( __('Trending','mtms')) ); ?> href="<?php echo $d; ?>"><i class="icon-fire"></i> <?php _e('Популярни','mtms'); ?></a></li><?php } ?>
<?php if($url = get_option('dt_ratings_slug','ratings')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><i class="icon-star2"></i> <?php _e('Оценени','mtms'); ?></a></li><?php } ?>
</ul>
<?php } ?>
</div>
<div class="sidemenu">
<h2><?php _e('Жанр','mtms'); ?></h2>
<ul class="genres scrolling">
<?php li_generos(); ?>
</ul>
</div>
<div class="sidemenu">
<h2><?php _e('Година на издаване','mtms'); ?></h2>
<ul class="year scrolling">
<?php dt_show_year(); ?>
</ul>
</div>



<div class="estadisticas">
</div>

<!-- this is google ad -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- kino - golqm -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9840400740296480"
     data-ad-slot="2756829056"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

</div>
