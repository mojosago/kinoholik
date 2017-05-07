<?php
/*  css */
function dt_styles() 
{
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/assets/css/owl.carousel.css' , array(), DT_VERSION, 'all' );
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' , array(), DT_VERSION, 'all' );
	wp_enqueue_style( 'icons', get_template_directory_uri().'/assets/css/icons.css' , array(), DT_VERSION, 'all' );
	wp_enqueue_style( 'scrollbar', get_template_directory_uri().'/assets/css/scrollbar.css' , array(), DT_VERSION, 'all' );
	wp_enqueue_style( 'theme', get_template_directory_uri().'/assets/css/tema.css' , array(), DT_VERSION, 'all' );
	wp_enqueue_style( 'color-scheme', get_template_directory_uri().'/assets/css/scheme-'. get_option('dt_color_scheme','white') .'.css' , array(), DT_VERSION, 'all' );
	wp_enqueue_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css' , array(), DT_VERSION, 'all' );
	#wp_enqueue_style( 'style', get_stylesheet_uri(), array(), DT_VERSION, true  );
}
add_action( 'wp_enqueue_scripts', 'dt_styles' ); 
/* javascript */
function dt_scripts()  
{
    wp_enqueue_script( 'name', 'https://ajax.googleapis.com/ajax/libs/jquery/'. get_option('dt_jquery_version','2.2.0') .'/jquery.min.js' , '', get_option('dt_jquery_version','2.2.0'), false );
	wp_enqueue_script( 'scrollbar',  get_template_directory_uri().'/assets/js/scrollbar.js' , '', DT_VERSION, false );
	wp_enqueue_script( 'owl',  get_template_directory_uri().'/assets/js/owl.carousel.min.js' , '', DT_VERSION, false  );
	wp_enqueue_script( 'scripts',  get_template_directory_uri().'/assets/js/scripts.js' , '', DT_VERSION, true  );

    if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}  
add_action( 'wp_enqueue_scripts', 'dt_scripts' ); 
/* owl controls */
function owl_controls() { ?>
<script>
<?php if(is_single()) { ?>
// Gallery 
$(document).ready(function() {
  $("#dt_galery").owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 1,
	autoPlay: false
  });
});
// Gallery episodes
$(document).ready(function() {
  $("#dt_galery_ep").owlCarousel({
	autoPlay: 3000, //Set AutoPlay to 3 seconds
	items : 2,
	autoPlay: false
  });
});
// OWL Movies
$(document).ready(function() {
  var owl = $("#single_relacionados");
	owl.owlCarousel({
	items : 6,
	autoPlay: 3000,
	stopOnHover : true,
	pagination : false,
	itemsDesktop : [1199,6],
    itemsDesktopSmall : [980,6],
    itemsTablet: [768,5],
    itemsTabletSmall: false,
    itemsMobile : [479,3],
  });
  // Custom Navigation Events
  $(".next3").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev3").click(function(){
    owl.trigger('owl.prev');
  })
	  // end botons
});
<?php } else { ?>
// OWL Movies
<?php if(get_option('dt_mm_activate_slider') == 'true') { ?>
$(document).ready(function() {
  var owl = $("#dt-movies");
	owl.owlCarousel({
	<?php if(get_option('dt_mm_autoplay_slider') == 'true') { ?>
	autoPlay: 3500, 
	<?php } else { ?>
	autoPlay: false,
	<?php } ?>
	items : 5,
	stopOnHover : true,
	pagination : false,
	itemsDesktop : [1199,5],
    itemsDesktopSmall : [980,5],
    itemsTablet: [768,4],
    itemsTabletSmall: false,
    itemsMobile : [479,3],
  });
  // Custom Navigation Events
<?php if(get_option('dt_mm_autoplay_slider') == 'true') { } else { ?>
  $(".next3").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev3").click(function(){
    owl.trigger('owl.prev');
  })
<?php } ?>
	  // end botons
});
<?php } ?>

// OWL TVshows
<?php if(get_option('dt_mt_activate_slider') == 'true') { ?>
$(document).ready(function() {
  var owl = $("#dt-tvshows");
	owl.owlCarousel({
	<?php if(get_option('dt_mt_autoplay_slider') == 'true') { ?>
	autoPlay: 3500, 
	<?php } else { ?>
	autoPlay: false,
	<?php } ?>
	items : 5,
	stopOnHover : true,
	pagination : false,
	itemsDesktop : [1199,5],
    itemsDesktopSmall : [980,5],
    itemsTablet: [768,4],
    itemsTabletSmall: false,
    itemsMobile : [479,3],
  });
  // Custom Navigation Events
<?php if(get_option('dt_mt_autoplay_slider') == 'true') { } else { ?>
  $(".next4").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev4").click(function(){
    owl.trigger('owl.prev');
  })
<?php } ?>
	  // end botons
});
<?php } ?>
// OWL Episodes
$(document).ready(function() {
  var owl = $("#dt-episodes");
  owl.owlCarousel({
	<?php if(get_option('dt_me_autoplay_slider') == 'true') { ?>
	autoPlay: 3500, 
	<?php } else { ?>
	autoPlay: false,
	<?php } ?>
	pagination : false,
	items : 4,
	stopOnHover : true,
	itemsDesktop : [900,4],
	itemsDesktopSmall : [750,3],
	itemsTablet: [500,2],
	itemsMobile : [320,1]
  });
  // Custom Navigation Events
<?php if(get_option('dt_me_autoplay_slider') == 'true') { } else { ?>
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
<?php } ?>
	  // end botons
});

// OWL Seasons
$(document).ready(function() {
  var owl = $("#dt-seasons");
	owl.owlCarousel({
	<?php if(get_option('dt_ms_autoplay_slider') == 'true') { ?>
	autoPlay: 3500, 
	<?php } else { ?>
	autoPlay: false,
	<?php } ?>
	items : 5,
	stopOnHover : true,
	pagination : false,
	itemsDesktop : [1199,5],
    itemsDesktopSmall : [980,5],
    itemsTablet: [768,4],
    itemsTabletSmall: false,
    itemsMobile : [479,3],
  });
  // Custom Navigation Events
<?php if(get_option('dt_ms_autoplay_slider') == 'true') { } else { ?>
  $(".next2").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev2").click(function(){
    owl.trigger('owl.prev');
  })
<?php } ?>
	  // end botons
});

// OWL Movies Slider
$(document).ready(function() {
  var owl = $("#slider-movies");
  owl.owlCarousel({
	<?php if(get_option('dt_autoplay_s_movies') =='true') { ?>
	autoPlay: <?php echo get_option('dt_slider_speed','3000'); ?>,
	<?php } else { ?>
	autoPlay: false,
	<?php } ?>
	items : 2,
	stopOnHover : true,
	pagination : true,
	itemsDesktop : [1199,2],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsTabletSmall: [600,1],
    itemsMobile : [479,1]
  });
  // Custom Navigation Events
});

// OWL TVShows Slider
$(document).ready(function() {
  var owl = $("#slider-tvshows");
  owl.owlCarousel({
	<?php if(get_option('dt_autoplay_s_tvshows') =='true') { ?>
	autoPlay: <?php echo get_option('dt_slider_speed','3000'); ?>,
		<?php } else { ?>
	autoPlay: false,
		<?php } ?>
	items : 2,
	stopOnHover : true,
	pagination : true,
	itemsDesktop : [1199,2],
    itemsDesktopSmall : [980,2],
    itemsTablet: [768,2],
    itemsTabletSmall: [600,1],
    itemsMobile : [479,1]
  });
  // Custom Navigation Events
});

// OWL Movies - TVShows Slider
$(document).ready(function() {
  var owl = $("#slider-movies-tvshows");
  owl.owlCarousel({
		<?php if(get_option('dt_autoplay_s') =='true') { ?>
		autoPlay: <?php echo get_option('dt_slider_speed','3000'); ?>,
			<?php } else { ?>
		autoPlay: false,
			<?php } ?>
		items : 2,
		stopOnHover : true,
		pagination : true,
		itemsDesktop : [1199,2],
		itemsDesktopSmall : [980,2],
		itemsTablet: [768,2],
		itemsTabletSmall: [600,1],
		itemsMobile : [479,1]
  });
  // Custom Navigation Events
});

<?php } ?>

<?php if(is_single()) { global $user_ID; if( $user_ID ) : if( current_user_can('level_10') ) : ?>
$(document).ready(function() {
    $(".dtload").click(function() {
        var o = $(this).attr("id");
        1 == o ? ($(".dtloadpage").hide(), $(this).attr("id", "0")) : ($(".dtloadpage").show(), $(this).attr("id", "1"))
    }), $(".dtloadpage").mouseup(function() {
        return !1
    }), $(".dtload").mouseup(function() {
        return !1
    }), $(document).mouseup(function() {
        $(".dtloadpage").hide(), $(".dtload").attr("id", "")
    })
})
<?php endif; endif; } ?>
</script>
<?php }
add_action( 'wp_footer', 'owl_controls' );


/* Custom Color */
function dt_color_css() { 
    $theme_color = get_option('dt_main_color','');
    $theme_color_hover = ajustarcolor( $theme_color, -20);
    $theme_color_light = ajustarcolor( $theme_color, 170);
    $secundary_color = get_option('dt_secundary_color','');
    $background_color = get_option('dt_background_color','');
?>
<style>

</style>
<?php }
add_action( 'wp_head', 'dt_color_css' );
/* Ajuste de colores */
function ajustarcolor($hex, $steps) { 
    $steps = max(-255, min(255, $steps));
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }
    $color_parts = str_split($hex, 2);
    $return = '#';
    foreach ($color_parts as $color) {
        $color   = hexdec($color); 
        $color   = max(0,min(255,$color + $steps)); 
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
    }
    return $return;
}	
/* Custom CSS */
function dt_custom_css() { 
	if( $css = get_option('dt_custom_css')) {
		echo '<style>';
		echo $css;
		echo '</style>';
	}

} add_action('wp_head', 'dt_custom_css');

/* Custom JS */
function dt_custom_js() {
	if( $js = get_option('dt_custom_js')) { ?>
<script type="text/javascript">
	<?php echo $js; ?>
</script>
<?php	}

} add_action( 'wp_footer', 'dt_custom_js' );


/* facebook JS */
function dt_fb_js() { if(is_single()) { if( get_option('dt_commets') == 'comtfb') { ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo get_option('dt_app_language_facebook'); ?>/sdk.js#xfbml=1&version=v2.6&appId=<?php echo get_option('dt_app_id_facebook'); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php	
		} 
	} 
} 
add_action( 'wp_head', 'dt_fb_js' );



/* Custom JS */
function dt_analytics_js() {
	if( $c = get_option('dt_google_analytics')) { ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', '<?php echo $c; ?>', 'auto');
  ga('send', 'pageview');
</script>
<?php	}

} add_action( 'wp_footer', 'dt_analytics_js' );
