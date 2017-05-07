<?php 
$url		= dt_get_meta('links_url');
$tipo		= dt_get_meta('links_type');
$title		= dt_get_meta('dt_postitle');
$string		= dt_get_meta('dt_string');
$idioma		= dt_get_meta('links_idioma');
$calidad	= dt_get_meta('links_quality');
$secons     = get_option('dt_ountdown_link_redirect','30');
if (have_posts()) :while (have_posts()) : the_post(); set_dt_views(get_the_ID()); ?>
<!doctype html>
<html <?php language_attributes(); ?>>
 <head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <title><?php echo $tipo, ' - ', $title, ' (', $calidad, ')'; ?></title>
  <link rel='stylesheet' id='fonts-css'  href='https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A400%2C600&#038;ver=<?php echo DT_VERSION ?>' type='text/css' media='all' />
  <link rel='stylesheet' id='link-single'  href='<?php echo get_template_directory_uri(); ?>/assets/css/links.css?ver=<?php echo DT_VERSION ?>' type='text/css' media='all' />
	<script language="javascript"> 
		var segundos = <?php echo $secons; ?>; 
		function tiempo(){  
			var t = setTimeout("tiempo()",3000);  
				document.getElementById('contador').innerHTML = ''+segundos--+"";  
			if (segundos==0){
				window.location.href='<?php echo $url; ?>';
			clearTimeout(t);  
			}  
		}  
		tiempo()
	</script>
 </head>
 <body <?php body_class(); ?>>
<div id="single">
	<div class="links">
		<div class="aa">
			<div class="ads_300">
                          <?php echo stripslashes(get_option('ads_spot_300','Ad Spot 300x250')); ?>
</div>
		</div>
		<div class="bb">
			<h1><?php echo $tipo, ' - ', $title, ' (', $calidad, ')'; ?></h1>
			 <div class="ads_468">
                             <?php echo stripslashes(get_option('ads_spot_468','Ad Spot 468x60')); ?>
							 
</div>
			<div class="custom_fields">
				<b class="variante"><?php _e('Server','mtms'); ?></b>
				<span class="valor"><img src="https://plus.google.com/_/favicon?domain=<?php echo saca_dominio($url); ?>"> <?php echo saca_dominio($url); ?></span>
			</div>
			<div class="custom_fields">
				<b class="variante"><?php _e('Language','mtms'); ?></b>
				<span class="valor"><?php echo $idioma; ?></span>
			</div>
			<div class="custom_fields">
				<b class="variante"><?php _e('Quality','mtms'); ?></b>
				<span class="valor"><?php echo $calidad; ?></span>
			</div>
		</div>
	</div>

	<div class="cupe">
		<div class="conteo views"><b><?php $visto = get_post_custom_values('dt_views_count'); echo $visto[0]; ?></b><i><?php _e('views','mtms'); ?></i></div>
		<div class="conteo views"><b id="contador"><?php echo $secons; ?></b> <i><?php _e('secons','mtms'); ?></i></div>
		<span><?php _e('Please wait, redirecting page..','mtms'); ?></span>
		<div class="boton reloading"><a href="http://www.putlocker-id.com/"><?php echo $tipo; ?> - Video</a></div>
	</div>


	<footer><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?></footer>
</div>
 </body>
<?php if( $c = get_option('dt_google_analytics')) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?php echo $c; ?>', 'auto');
  ga('send', 'pageview');
</script>
<?php } ?>


<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,2534174,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?2534174&101" alt="cool hit counter" border="0"></a></noscript>
<!-- Histats.com  END  -->

</html>
<?php endwhile; endif; ?>