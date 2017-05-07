<?php

define('DT_SERVER', 'https://Kinoholik.com');

define('DT_AUTOR', 'Kinoholik');

define('DT_RENOVAR', 'https://kinoholik.com');

define('DT_SUPPORT_FORUMS', 'https://kinoholik.com');

define('DT_PAGE_THEME', 'https://kinoholik.com');

define('DT_CHANGELOG', 'https://kinoholik.com');

define('DT_DOC', 'kinoholik.com');

// Registrar categoria Master

function genres_taxonomy() {

	register_taxonomy('genres', array('tvshows,movies',),

		array(

			'show_admin_column' => true, 

			'hierarchical'		=> true,

			'label'				=> __('Genres','mtms'),

			'rewrite'			=> array ('slug' => get_option('dt_genre_slug','genre')),)

		);

}

add_action('init', 'genres_taxonomy', 0);

	function prefijo_mastercat() {

		flush_rewrite_rules();

	}

add_action( 'after_switch_theme', 'prefijo_mastercat' );



function quality_taxonomy() {

	register_taxonomy('dtquality', array('episodes,movies'),



		array(

			'show_admin_column' => true, 

			'hierarchical'		=> true,

			'label'				=> __('Quality','mtms'),

			'rewrite'			=> array ('slug' => get_option('dt_quality_slug','quality')),)

		);

}

add_action('init', 'quality_taxonomy', 0);

	function dp_c() {

		flush_rewrite_rules();

	}

add_action( 'after_switch_theme', 'dp_c' );





if ( ! isset( $content_width ) ) $content_width = 1100;

function dt_styles_editor() {

	add_editor_style( 'assets/css/tema.css' );

}

add_action( 'admin_init', 'dt_styles_editor' );

add_theme_support('automatic-feed-links');

add_theme_support( "title-tag" ) ;

add_theme_support( "custom-header", $args );

add_theme_support( "custom-background", $args );



// agregar CSS admin

add_action( 'admin_enqueue_scripts', 'load_admin_style' );

      function load_admin_style() {

        wp_register_style( 'admin_css', get_template_directory_uri() . '/assets/css/style-admin.css', false, DT_VERSION );

        wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/style-admin.css', false, DT_VERSION );

       }

// logo admin

add_filter( 'login_headerurl', 'dt_url' );

function dt_url($url) {

	return home_url();

}

function logo_admin() {  ?>

<style type="text/css">

h1 a {

background-image: url(<?php if($logo = get_option('dt_logo_admin')) { echo $logo; } else { echo get_template_directory_uri() ."/assets/img/logo_dt.png"; } ?>) !important;

    background-size: 244px 52px !important;

    width: 301px !important;

    height: 52px !important;

    margin-bottom: 0!important;

}

body.login {

	background: #fff;

}

</style>

<?php  } 

add_action('login_head', 'logo_admin');

	function core_dt() {

}

add_action('admin_footer', 'core_dt'); 

// Contador de vistos

function get_dt_views($postID){

	$count_key = 'dt_views_count';

	$count = get_post_meta($postID, $count_key, true);

	if($count==''){

		delete_post_meta($postID, $count_key);

		add_post_meta($postID, $count_key, '1');

		return "0";

	}

	return $count.'';

}

function set_dt_views($postID) {

	$count_key = 'dt_views_count';

	$count = get_post_meta($postID, $count_key, true);

	if($count==''){

		$count = 0;

		delete_post_meta($postID, $count_key);

		add_post_meta($postID, $count_key, '1');

	}else{

		$count++;

		update_post_meta($postID, $count_key, $count);

	}

}  

# Totales

function total_peliculas(){

$s='';

$totalj=wp_count_posts('movies')->publish;

if($totalj!=1){$s='s';}

return sprintf( __("%s", "mtms"),$totalj,$s);

}

function total_series(){

$s='';

$totalj=wp_count_posts('tvshows')->publish;

if($totalj!=1){$s='s';}

return sprintf( __("%s", "mtms"),$totalj,$s);

}

function total_episodios(){

$s='';

$totalj=wp_count_posts('episodes')->publish;

if($totalj!=1){$s='s';}

return sprintf( __("%s", "mtms"),$totalj,$s);

}

function total_temporadas(){

$s='';

$totalj=wp_count_posts('seasons')->publish;

if($totalj!=1){$s='s';}

return sprintf( __("%s", "mtms"),$totalj,$s);

}

define('dttp', get_option( DT_KEY ));

// Obtener Categorias

function li_generos() {

	$taxonomy		= 'genres';

	$orderby		= 'DESC';

	$show_count		= 1;

	$hide_empty		= false;

	$pad_counts		= 0;

	$hierarchical	    = 1;

	$exclude			= '55';

	$title				= '';

	$args = array(

		'post_type'		=> $post_type,

		'taxonomy'		=> $taxonomy,

		'orderby'			=> $orderby,

		'show_count'		=> $show_count,

		'hide_empty'		=> $hide_empty,

		'pad_counts'		=> $pad_counts,

		'hierarchical'	    => $hierarchical,

		'exclude'			=> $exclude,

		'title_li'			=> $title,

		'echo' => 0	

	);

$links = wp_list_categories($args);

$links = str_replace('</a> (', '</a> <i>', $links);

$links = str_replace(')', '</i>', $links);

echo $links; 

}



// Obtener Categorias

function li_generos_h() {

	$taxonomy		= 'genres';

	$orderby		= 'DESC';

	$show_count		= 0;

	$hide_empty		= false;

	$pad_counts		= 0;

	$hierarchical	    = 1;

	$exclude			= '55';

	$title				= '';

	$args = array(

		'post_type'		=> $post_type,

		'taxonomy'		=> $taxonomy,

		'orderby'			=> $orderby,

		'show_count'		=> $show_count,

		'hide_empty'		=> $hide_empty,

		'pad_counts'		=> $pad_counts,

		'hierarchical'	    => $hierarchical,

		'exclude'			=> $exclude,

		'title_li'			=> $title,

		'echo' => 0	

	);

$links = wp_list_categories($args);

$links = str_replace('</a> (', '</a> <i>', $links);

$links = str_replace(')', '</i>', $links);

echo $links; 

}

// Paginador

function pagination($pages = '', $range = 4)

{  

     $showitems = ($range * 2)+1;  

 

     global $paged;

     if(empty($paged)) $paged = 1;

 

     if($pages == '')

     {

         global $wp_query;

         $pages = $wp_query->max_num_pages;

         if(!$pages)

         {

             $pages = 1;

         }

     }   

     if(1 != $pages)

     {

         echo "<div class=\"pagination\"><span>". __('Страница','mtms') ." ".$paged." " . __('от','mtms') . " ".$pages."</span>";

         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "";

         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><i class='icon-caret-left'></i></a>";

 

         for ($i=1; $i <= $pages; $i++)

         {

             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))

             {

                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";

             }

         }

 

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\"><i class='icon-caret-right'></i></a>";  

         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "";

         echo "</div>\n";

		 echo "<div class='resppages'>";

			previous_posts_link('<span class="icon-chevron-left"></span>');

			next_posts_link('<span class="icon-chevron-right"></span>');

		 echo "</div>";

     }

}



// Crear Paginas

if(is_admin() and current_user_can('administrator')){

	// Page trending

	$page_trending = get_option('dt_trending_page');

	if(empty($page_trending)){

		$post_id = wp_insert_post(array(		

		  'post_content'   => '',

		  'post_name'      => __('Trending','mtms'),

		  'post_title'     => __('Trending','mtms'),

		  'post_status'    => 'publish',

		  'post_type'      => 'page',

		  'ping_status'    => 'closed',

		  'post_date'      => date('Y-m-d H:i:s'),

		  'post_date_gmt'  => date('Y-m-d H:i:s'),

		  'comment_status' => 'closed',

		  'page_template'  => 'pages/trending.php'

		));

		$get_01 = get_option('siteurl').'/' . sanitize_title(__('Trending','mtms')).'/';

		update_option('dt_trending_page', $get_01);

	}

	// Page Rating

	$page_rating = get_option('dt_rating_page');

	if(empty($page_rating)){

		$post_id = wp_insert_post(array(		

		  'post_content'   => '',

		  'post_name'      => __('Ratings','mtms'),

		  'post_title'     => __('Ratings','mtms'),

		  'post_status'    => 'publish',

		  'post_type'      => 'page',

		  'ping_status'    => 'closed',

		  'post_date'      => date('Y-m-d H:i:s'),

		  'post_date_gmt'  => date('Y-m-d H:i:s'),

		  'comment_status' => 'closed',

		  'page_template'  => 'pages/rating.php'

		));

		$get_02 = get_option('siteurl').'/' . sanitize_title(__('Ratings','mtms')).'/';

		update_option('dt_rating_page', $get_02);

	}

	// Page Account

	$page_account = get_option('dt_account_page');

	if(empty($page_account)){

		$post_id = wp_insert_post(array(		

		  'post_content'   => __('Edit page content.','mtms'),

		  'post_name'      => __('My account','mtms'),

		  'post_title'     => __('My account','mtms'),

		  'post_status'    => 'publish',

		  'post_type'      => 'page',

		  'ping_status'    => 'closed',

		  'post_date'      => date('Y-m-d H:i:s'),

		  'post_date_gmt'  => date('Y-m-d H:i:s'),

		  'comment_status' => 'closed',

		  'page_template'  => 'pages/account.php'

		));

		$get_03 = get_option('siteurl').'/' . sanitize_title(__('My account','mtms')).'/';

		update_option('dt_account_page', $get_03);

	}

	// Page contact

	$page_contact = get_option('dt_contact_page');

	if(empty($page_contact)){

		$post_id = wp_insert_post(array(		

		  'post_content'   => '',

		  'post_name'      => __('Contact','mtms'),

		  'post_title'     => __('Contact','mtms'),

		  'post_status'    => 'publish',

		  'post_type'      => 'page',

		  'ping_status'    => 'closed',

		  'post_date'      => date('Y-m-d H:i:s'),

		  'post_date_gmt'  => date('Y-m-d H:i:s'),

		  'comment_status' => 'closed',

		  'page_template'  => 'pages/contact.php'

		));

		$get_05 = get_option('siteurl').'/' . sanitize_title(__('Contact','mtms')).'/';

		update_option('dt_contact_page', $get_05);

	}

}



// Extraer Extracto

function cg_content($more_link_text='(more...)', $stripteaser=0, $more_file='', $cut = 0, $encode_html = 0) {

	$content = get_the_content($more_link_text, $stripteaser, $more_file);

	$content = strip_shortcodes(apply_filters('the_content_rss', $content));

	if ( $cut && !$encode_html )

		$encode_html = 2;

	if ( 1== $encode_html ) {

		$content = esc_html($content);

		$cut = 0;

	} elseif ( 0 == $encode_html ) {

		$content = $content;

	} elseif ( 2 == $encode_html ) {

		$content = strip_tags($content);

	}

	if ( $cut ) {

		$blah = explode(' ', $content);

		if ( count($blah) > $cut ) {

			$k = $cut;

			$use_dotdotdot = 1;

		} else {

			$k = count($blah);

			$use_dotdotdot = 0;

		}

 for ( $i=0; $i<$k; $i++ )

			$excerpt .= $blah[$i].' ';

		$excerpt .= ($use_dotdotdot) ? '...' : '';

		$content = $excerpt;

	}

	$content = str_replace(']]>', ']]&gt;', $content);

	echo $content;

}



// Generar Release YEAR

function dt_show_year() { 

	$args = array('order' => DESC ,'number' => 50); 

	$camel = 'dtyear'; 

	$tax_terms = get_terms($camel,$args); 

	foreach ($tax_terms as $tax_term) 

		{ echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '">' . $tax_term->name.'</a></li>'; } 

	}



// Active class 

function dt_acpt($type) { 

	if(get_post_type() ==  $type) { echo 'class="active"'; }

}

function dt_acp($page) { 

	if(is_page($page)) { echo 'class="active"'; }

}



// Obtener datos

function data_of($name, $id, $acortado = false, $max = 150)

{

    $val = get_post_meta($id, $name, $single = true);

    if ($val != NULL) {

        if ($acortado) {

            return substr($val, 0, $max) . '...';

        } else {

            return $val;

        }

    } else {

        if ($name == 'overview') {

            return "";

        } elseif ($name == 'temporada') {

            return "0";

        } else {

            return "no data";

        }

    }

}

// Obtener seasons

function season_of($meta)

{

    global $wpdb;

    $results = $wpdb->get_results("select post_id, meta_key from $wpdb->postmeta where meta_value = '" . $meta . "'", ARRAY_A);

    $a_t     = array();

    $a_c     = array();

    foreach ($results as $i => $value) {

        if (get_post_type($results[$i]["post_id"]) == 'seasons' && get_post_status($results[$i]["post_id"]) == 'publish') {

            $a_t[] = array(

                'id' => $results[$i]["post_id"],

                'season' => get_post_meta($results[$i]["post_id"], "temporada", $single = true)

            );

        }

        if (get_post_type($results[$i]["post_id"]) == 'episodes' && get_post_status($results[$i]["post_id"]) == 'publish') {

            $a_c[] = array(

                'id' => $results[$i]["post_id"],

                'season' => get_post_meta($results[$i]["post_id"], "temporada", $single = true),

                'capitulo' => get_post_meta($results[$i]["post_id"], "episodio", $single = true)

            );

        }

    }

    if ((!empty($a_t)) && (!empty($a_c))) {

        foreach ($a_t as $key => $row) {

            $aux[$key] = $row['season'];

        }

        array_multisort($aux, SORT_ASC, $a_t);

        foreach ($a_c as $key => $row) {

            $aux1[$key] = $row['capitulo'];

        }

        array_multisort($aux1, SORT_ASC, $a_c);

        $counta   = 0;

        $finalcap = array();

        $maxt     = 0;

        foreach ($a_c as $key => $row) {

            $finalcap[] = array(

                'id' => $row['id'],

                'season' => $row['season'],

                'capitulo' => $row['capitulo']

            );

            if ($a_c[$key]["season"] >= $maxt) {

                $maxt = $a_c[$key]["season"];

            }

            $counta++;

        }

        $counti   = 0;

        $finalarr = array();

        foreach ($a_t as $key => $row) {

            $finalarr[] = array(

                'id' => $row['id'],

                'season' => $row['season']

            );

            $counti++;

        }

        $data = array(

            'temporada' => array(

                'l_temp' => array(

                    'id' => $finalarr[$counti - 1]['id'],

                    'numero' => $finalarr[$counti - 1]['season']

                ),

                'n_temp' => $counti,

                'all' => $finalarr,

                'd_temp' => $maxt

            ),

            'capitulo' => array(

                'n_cap' => $counta,

                'all' => $finalcap

            )

        );

        return $data;

    }

}



// Obtener Links

function link_of($meta)

{

    global $wpdb;

    $results = $wpdb->get_results("select post_id, meta_key from $wpdb->postmeta where meta_value = '" . $meta . "' ", ARRAY_A );

    $a_t     = array();

    $a_c     = array();

    foreach ($results as $i => $value ) {

        if (get_post_type($results[$i]["post_id"]) == 'dt_links' && get_post_status($results[$i]["post_id"]) == 'publish') {

            $a_t[] = array(

                'id' => $results[$i]["post_id"],

                'metalink' => get_post_meta($results[$i]["post_id"], "dt_string", $single = true)

            );

        }

        if (get_post_type($results[$i]["post_id"]) == 'episodes' && get_post_status($results[$i]["post_id"]) == 'publish') {

            $a_c[] = array(

                'id' => $results[$i]["post_id"],

                'metalink' => get_post_meta($results[$i]["post_id"], "dt_string", $single = true)

            );

        }

		if (get_post_type($results[$i]["post_id"]) == 'movies' && get_post_status($results[$i]["post_id"]) == 'publish') {

            $a_c[] = array(

                'id' => $results[$i]["post_id"],

                'metalink' => get_post_meta($results[$i]["post_id"], "dt_string", $single = true)

            );

        }

    }

    if ((!empty($a_t)) && (!empty($a_c))) {

        foreach ($a_t as $key => $row) {

            $aux[$key] = $row['metalink'];

        }

        array_multisort($aux, SORT_ASC, $a_t);



        $counta   = 0;

        $finalcap = array();

        $maxt     = 0;

        foreach ($a_c as $key => $row) {

            $finalcap[] = array(

                'id' => $row['id'],

                'metalink' => $row['metalink']

            );

            if ($a_c[$key]["metalink"] >= $maxt) {

                $maxt = $a_c[$key]["metalink"];

            }

            $counta++;

        }

        $counti   = 0;

        $finalarr = array();

        foreach ($a_t as $key => $row) {

            $finalarr[] = array(

                'id' => $row['id'],

                'metalink' => $row['metalink']

            );

            $counti++;

        }

        $data = array(

            'dt_string' => array(

                'l_temp' => array(

                    'id' => $finalarr[$counti - 1]['id'],

                    'numero' => $finalarr[$counti - 1]['season']

                ),

                'n_temp' => $counti,

                'all' => $finalarr,

                'd_temp' => $maxt

            )

           

        );

        return $data;

    }

}





// Eliminar Entradas

function wp_delete_post_link($link = 'Delete This', $before = '', $after = '') {

    global $post;

    if ( $post->post_type == 'page' ) {

    if ( !current_user_can( 'edit_page', $post->ID ) )

      return;

  } else {

    if ( !current_user_can( 'edit_post', $post->ID ) )

      return;

  }

    $message = "Are you sure you want to delete ".get_the_title($post->ID)." ?";

    $delLink = wp_nonce_url( home_url() . "/wp-admin/post.php?action=delete&post=" . $post->ID, 'delete-post_' . $post->ID);

    $htmllink = "<a href='" . $delLink . "' onclick = \"if ( confirm('".$message."' ) ) { execute(); return true; } return false;\"/>".$link."</a>";

    echo $before . $htmllink . $after;

}



// Key String

function key_string($length = 10) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];

    }

    return $randomString;

}

define('DT_STRING',key_string());





// Get Domain

function saca_dominio($url){

    $protocolos = array('http://', 'https://', 'ftp://', 'www.');

    $url = explode('/', str_replace($protocolos, '', $url));

    return $url[0];

}

// App domain validate

function dt_domain($url){

    $protocolos = array('http://', 'https://', 'ftp://', 'www.');

    $url = explode('/', str_replace($protocolos, '', $url));

	if($url[3]):

		return $url[0] .'/'. $url[1] .'/'. $url[2] .'/'. $url[3];

	elseif($url[2]):

		return $url[0] .'/'. $url[1] .'/'. $url[2];

	elseif($url[1]):

		return $url[0] .'/'. $url[1]; 

	else:

		return $url[0];

	endif;

}

function url_dt_import_data($url){

    $protocolos = array('http://', 'https://', 'ftp://', 'www.');

    $url = explode('/', str_replace($protocolos, '', $url));

    return $url[2];

}

// Get Images

function dt_image($name, $id, $size, $type = false, $return = false, $gtsml = false)

{

    $img    = get_post_meta($id, $name, $single = true);

    $val    = explode("\n", $img);

    $mgsl = array();

    $count  = 0;

    foreach ($val as $valor) {

        if (!empty($valor)) {

            if (substr($valor, 0, 1) == "/") {

                $mgsl[] = 'https://image.tmdb.org/t/p/' . $size . '' . $valor . '';

            } else {

                $mgsl[] = $valor;

            }

            $count++;

        } else {

            if ($name == "dt_poster" && $img == NULL) {

                $mgsl[] = esc_url(get_template_directory_uri()) . '/assets/img/no_poster.png';

            }

           

        }

    }

    if ($type) {

        $new = rand(0, $count);

        if ($mgsl[$new] != NULL) {

            if ($return) {

                return $mgsl[$new];

            } else {

                echo $mgsl[$new];

            }

        } else {

            if ($return) {

                return $mgsl[0];

            } else {

                echo $mgsl[0];

            }

        }

    } else {

        if ($return) {

            return $mgsl[0];

        } else {

            echo $mgsl[0];

        }

    }

}





// Get Cast

function dt_cast($id, $type, $limit = false)

{

    $name = get_post_meta($id, "dt_cast", $single = true);

    if ($type == "img") {

        if ($limit) {

            $val    = explode("]", $name);

            $passer = $newvalor = array();

            foreach ($val as $valor) {

                if (!empty($valor)) {

                    $passer[] = substr($valor, 1);

                }

            }

            for ($h = 0; $h <= 4; $h++) {

                $newval     = explode(";", $passer[$h]);

                $fotoor     = $newval[0];

                $actorpapel = explode(",", $newval[1]);

                

                if (!empty($actorpapel[0])) {

                    

                    if ($newval[0] == "null") {

                        $fotoor = get_template_directory_uri() . '/assets/img/no_foto_cast.png';

                    } else {

                        $fotoor = 'https://image.tmdb.org/t/p/w90' . $newval[0];

                    }

                    echo '<tr class="person">';

					echo '<td class="first_norole">';

                    echo '<div class="mask"><a href="'. home_url() .'/'. get_option('dt_cast_slug','cast') .'/' . sanitize_title($actorpapel[0]) . '/"><img alt="'. $actorpapel[0] .'" src="' . $fotoor . '" /></a></div>';

                    echo '<h3 class="name"><a href="'. home_url() .'/'. get_option('dt_cast_slug','cast') .'/' . sanitize_title($actorpapel[0]) . '/">' . $actorpapel[0] . '</a></h3>';

					echo '</td>';

					echo '<td class="last_norole">';

					echo '<h4 class="role">' . $actorpapel[1] . '</h4>';

					echo '</td>';

                    echo '</tr>';

                    

                }

            }

        } else {

            $val = str_replace(array(

                '[null',

                '[/',

                ';',

                ']',

                ","

            ), array(

                '<div class="castItem"><img src="' . get_template_directory_uri() . '/assets/img/no_foto_cast.png',

                '<div class="castItem"><img src="https://image.tmdb.org/t/p/w90/',

                '" /><span>',

                '</span></div>',

                '</span><span class="typesp">'

            ), $name);

            echo $val;

        }

    } else {

        if (get_the_term_list($post->ID, 'dtcast', true)) {

            echo get_the_term_list($post->ID, 'dtcast', '', ', ', '');

        } else {

            echo "N/A";

        }

    }

}



// Get Cast 2

function dt_cast_2($id, $type, $limit = false)

{

    $name = get_post_meta($id, "dt_cast", $single = true);

    if ($type == "img") {

        if ($limit) {

            $val    = explode("]", $name);

            $passer = $newvalor = array();

            foreach ($val as $valor) {

                if (!empty($valor)) {

                    $passer[] = substr($valor, 1);

                }

            }

            for ($h = 0; $h <= 500; $h++) {

                $newval     = explode(";", $passer[$h]);

                $fotoor     = $newval[0];

                $actorpapel = explode(",", $newval[1]);

                

                if (!empty($actorpapel[0])) {

                    

                    if ($newval[0] == "null") {

                        $fotoor = get_template_directory_uri() . '/assets/img/no_foto_cast.png';

                    } else {

                        $fotoor = 'https://image.tmdb.org/t/p/w90' . $newval[0];

                    }

                    echo '<tr class="person">';

					echo '<td class="first_norole">';

                    echo '<div class="mask"><a href="'. home_url() .'/'. get_option('dt_cast_slug','cast') .'/' . sanitize_title($actorpapel[0]) . '/"><img alt="'. $actorpapel[0] .' is'. $actorpapel[1] .'" src="' . $fotoor . '" /></a></div>';

                    echo '<h3 class="name"><a href="'. home_url().'/'. get_option('dt_cast_slug','cast') .'/' . sanitize_title($actorpapel[0]) . '/">' . $actorpapel[0] . '</a></h3>';

					echo '</td>';

					echo '<td class="last_norole">';

					echo '<h4 class="role">' . $actorpapel[1] . '</h4>';

					echo '</td>';

                    echo '</tr>';

                    

                }

            }

        } else {

            $val = str_replace(array(

                '[null',

                '[/',

                ';',

                ']',

                ","

            ), array(

                '<div class="castItem"><img src="' . get_template_directory_uri() . '/assets/img/no_foto_cast.png',

                '<div class="castItem"><img src="https://image.tmdb.org/t/p/w90/',

                '" /><span>',

                '</span></div>',

                '</span><span class="typesp">'

            ), $name);

            echo $val;

        }

    } else {

        if (get_the_term_list($post->ID, 'dtcast', true)) {

            echo get_the_term_list($post->ID, 'dtcast', '', ', ', '');

        } else {

            echo "N/A";

        }

    }

}



// Get director



function dt_director($id, $type, $limit = false)

{

    $name = get_post_meta($id, "dt_dir", $single = true);

    if ($type == "img") {

        if ($limit) {

            $val    = explode("]", $name);

            $passer = $newvalor = array();

            foreach ($val as $valor) {

                if (!empty($valor)) {

                    $passer[] = substr($valor, 1);

                }

            }

            for ($h = 0; $h <= 0; $h++) {

                $newval = explode(";", $passer[$h]);

                $fotoor = $newval[0];

                if ($newval[0] == "null") {

                    $fotoor = get_template_directory_uri() . '/assets/img/no_foto_cast.png';

                } else {

                    $fotoor = 'https://image.tmdb.org/t/p/w90' . $newval[0];

                }

					



					echo '<tr class="person">';

					echo '<td class="first_norole">';

					echo '<div class="mask"><a href="'. home_url() .'/'. get_option('dt_director_slug','director') .'/' . sanitize_title($newval[1]) . '/"><img alt="'. $newval[1] .'" src="' . $fotoor . '" /></a></div>';

                    echo '<h3 class="name"><a href="'. home_url() .'/'. get_option('dt_director_slug','director') .'/' . sanitize_title($newval[1]) . '/">' . $newval[1] . '</a></h3>';

					echo '</td>';

					echo '<td class="last_norole"><h4 class="role">'.__('Director','mtms').'</h4></td>';

					echo '</tr>';



            }

        } 

    }

}

// Get creator



function dt_creator($id, $type, $limit = false)

{

    $name = get_post_meta($id, "dt_creator", $single = true);

    if ($type == "img") {

        if ($limit) {

            $val    = explode("]", $name);

            $passer = $newvalor = array();

            foreach ($val as $valor) {

                if (!empty($valor)) {

                    $passer[] = substr($valor, 1);

                }

            }

            for ($h = 0; $h <= 0; $h++) {

                $newval = explode(";", $passer[$h]);

                $fotoor = $newval[0];

                if ($newval[0] == "null") {

                    $fotoor = get_template_directory_uri() . '/assets/img/no_foto_cast.png';

                } else {

                    $fotoor = 'https://image.tmdb.org/t/p/w90' . $newval[0];

                }

					



					echo '<tr class="person">';

					echo '<td class="first_norole">';

					echo '<div class="mask"><a href="'. home_url() .'/'. get_option('dt_creator_slug','creator') .'/' . sanitize_title($newval[1]) . '/"><img alt="'. $newval[1] .'" src="' . $fotoor . '" /></a></div>';

                    echo '<h3 class="name"><a href="'. home_url() .'/'. get_option('dt_creator_slug','creator') .'/' . sanitize_title($newval[1]) . '/">' . $newval[1] . '</a></h3>';

					echo '</td>';

					echo '<td class="last_norole"><h4 class="role">'.__('Creator','mtms').'</h4></td>';

					echo '</tr>';



            } 

        } 

	} 

}

// Module Shortcodes

function module_slider() {  get_template_part('inc/parts/modules/slider'); } add_shortcode( 'module-slider', 'module_slider' );

function module_slider_movies() {  get_template_part('inc/parts/modules/slider-movies'); } add_shortcode( 'module-slider-movies', 'module_slider_movies' );

function module_slider_tvshows() {  get_template_part('inc/parts/modules/slider-tvshows'); } add_shortcode( 'module-slider-tvshows', 'module_slider_tvshows' );

function module_movies() {  get_template_part('inc/parts/modules/movies'); } add_shortcode( 'module-movies', 'module_movies' );

function module_tvshows() {  get_template_part('inc/parts/modules/tvshows'); } add_shortcode( 'module-tvshows', 'module_tvshows' );

function module_seasons() {  get_template_part('inc/parts/modules/seasons'); } add_shortcode( 'module-seasons', 'module_seasons' );

function module_episodes() {  get_template_part('inc/parts/modules/episodes'); } add_shortcode( 'module-episodes', 'module_episodes' );

function module_ads_mt() {  get_template_part('inc/parts/modules/ads'); } add_shortcode( 'module-ads', 'module_ads_mt' );

// WordPress Dashboard

add_action( 'dashboard_glance_items', 'cpad_at_glance_content_table_end' );

function cpad_at_glance_content_table_end() {

    $args = array(

        'public' => true,

        '_builtin' => false

    );

    $output = 'object';

    $operator = 'and';



    $post_types = get_post_types( $args, $output, $operator );

    foreach ( $post_types as $post_type ) {

        $num_posts = wp_count_posts( $post_type->name );

        $num = number_format_i18n( $num_posts->publish );

        $text = _n( $post_type->labels->singular_name, $post_type->labels->name, intval( $num_posts->publish ) );

        if ( current_user_can( 'edit_posts' ) ) {

            $output = '<a href="edit.php?post_type=' . $post_type->name . '">' . $num . ' ' . $text . '</a>';

            echo '<li class="post-count ' . $post_type->name . '-count">' . $output . '</li>';

        }

    }

}

// API upload img

function dt_upload_image( $image_url, $post_id  ){

	if( get_option( 'dt_api_upload_poster' ) == 'true' ) {

		$upload_dir = wp_upload_dir();

		$image_data = file_get_contents($image_url);

		$filename = basename($image_url);

		if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;

		else                                    $file = $upload_dir['basedir'] . '/' . $filename;

		file_put_contents($file, $image_data);

		$wp_filetype = wp_check_filetype($filename, null );

		$attachment = array(

			'post_mime_type' => $wp_filetype['type'],

			'post_title' => sanitize_file_name($filename),

			'post_content' => '',

			'post_status' => 'inherit'

		);

		$attach_id = wp_insert_attachment( $attachment, $file, $post_id );

		require_once(ABSPATH . 'wp-admin/includes/image.php');

		$attach_data = wp_generate_attachment_metadata( $attach_id, $file );

		$res1= wp_update_attachment_metadata( $attach_id, $attach_data );

		$res2= set_post_thumbnail( $post_id, $attach_id );

	}

}

// Images sizes

function imagenes_size() {

	add_theme_support( 'post-thumbnails' );

	add_image_size('dt_poster_a', 185, 278, true);

	add_image_size('dt_poster_b', 90, 135, true);

	add_image_size('dt_episode_a', 300, 170, true);

}

add_action('after_setup_theme', 'imagenes_size'); 





// Trailer

if(get_option('dt_play_trailer')=='true') {  

	function mostrar_trailer_iframe($id) {

		if (!empty($id)) { 

			$val = str_replace(

				array("[","]",),

				array('<iframe width="760" height="428" src="https://www.youtube.com/embed/','?rel=0&amp;controls=1&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>',),$id);

				echo $val;

			} 

	}

} else {

	function mostrar_trailer_iframe($id) {

		if (!empty($id)) { 

			$val = str_replace(

				array("[","]",),

				array('<iframe width="760" height="428" src="https://www.youtube.com/embed/','?rel=0&amp;controls=1&amp;showinfo=0&autoplay=0" frameborder="0" allowfullscreen></iframe>',),$id);

				echo $val;

			} 

	}

}

// Get Images

function dt_get_images($size, $id)

{

    $img = get_post_meta($id, "imagenes", $single = true);

    $val    = explode("\n", $img);

    $passer = array();

    $cmw  = 0;

    foreach ($val as $valor) {

        if (!empty($valor)) {

            echo '<div class="g-item">';

            if (substr($valor, 0, 1) == "/") {

                echo '<img src="https://image.tmdb.org/t/p/'.$size.''.$valor.'" />';

            } else {

                echo '<img src="' . $valor . '" />';

            }

            echo '</div>';

            $cmw++;

            if ($cmw == 10) {

                break;

            }

        }

    }

}

// Register Navigation Menus

function dt_menus() {

	$locations = array(

		#'header' => __( 'Menu header', 'mtms' ),

		'submenu' => __( 'Submenu Header', 'mtms' ),

		'footer' => __( 'Menu footer', 'mtms' ),

	);

	register_nav_menus( $locations );

}

add_action( 'init', 'dt_menus' );

// Importar demo data

require( get_template_directory() . '/inc/api/importer/init.php');

// Obtener datos del usuario

function username_show() { global $current_user; if ( isset($current_user) ) { echo $current_user->display_name; } }

function username_login() { global $current_user; if ( isset($current_user) ) { echo $current_user->user_login; } }

function email_show() { global $current_user; if ( isset($current_user) ) { echo $current_user->user_email; } }

function name1_show() { global $current_user; if ( isset($current_user) ) { echo $current_user->first_name; } }

function name2_show() { global $current_user; if ( isset($current_user) ) { echo $current_user->last_name; } }

function email_avatar_header() { global $current_user; if ( isset($current_user) ) { echo get_avatar( $current_user->user_email, 35 ); } }

function email_avatar_perfil() { global $current_user; if ( isset($current_user) ) { echo get_avatar( $current_user->user_email, 50 ); } }

function email_avatar_perfil_form() { global $current_user; if ( isset($current_user) ) { echo get_avatar( $current_user->user_email, 60 ); } }

function email_avatar_account() { global $current_user; if ( isset($current_user) ) { echo get_avatar( $current_user->user_email, 220 ); } }



// Campos adicionales

function social_networks_profile($profile_fields) {

	// Add new fields

	$profile_fields['dt_twitter']	= __('Twitter URL','mtms');

	$profile_fields['dt_facebook']	= __('Facebook URL','mtms');

	$profile_fields['dt_gplus']		= __('Google+ URL','mtms');



	return $profile_fields;

}

add_filter('user_contactmethods', 'social_networks_profile');



// desactivar emoji

if( get_option('dt_emoji_disable') == 'true' ) {

	remove_action('wp_head', 'print_emoji_detection_script', 7);

	remove_action('wp_print_styles', 'print_emoji_styles');

}



// desactivar user toolbar

if( get_option('dt_toolbar_disable') == 'true' ) {

	add_filter( 'show_admin_bar', '__return_false' );

}

// SMTP WordPress

if ( get_option('dt_enable_smtp') == 'true' ) {

	add_action('phpmailer_init','send_smtp_email');

	function send_smtp_email( $phpmailer )

	{

		$phpmailer->isSMTP();

		$phpmailer->Host =	get_option('dt_smtp_server');

		$phpmailer->SMTPAuth =	true;

		$phpmailer->Port =	get_option('dt_smtp_port');

		$phpmailer->Username =	get_option('dt_smtp_username');

		$phpmailer->Password =	get_option('dt_smtp_password');

		$phpmailer->SMTPSecure =  get_option('dt_smtp_protocol');

		$phpmailer->From =	get_option('dt_smtp_from_mail');

		$phpmailer->FromName =	get_option('dt_smtp_from_name');

	}

}

// Filter search

function search_dt($query) { 

	if ($query->is_search) { 

		$query->set('post_type', array('movies','tvshows','episodes','seasons')); 

	} 

		return $query; 

	} 

add_filter('pre_get_posts','search_dt');

// Get post meta

function dt_get_meta( $value ) {

	global $post;

	$field = get_post_meta( $post->ID, $value, true );

	if ( ! empty( $field ) ) {

		return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );

	} else {

		return false;

	}

}



// Reset trending movies

function reset_movies()

{

	global $wpdb;

	$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = %d AND post_type = 'movies'", $parent_id);

	$children_ids = $wpdb->get_col($query);

	if (count($children_ids)) $wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %d WHERE meta_key = 'dt_views_count' AND post_id IN( " . implode(',', $children_ids) . " )", $example_integer));

}

// Reset trending tvshows

function reset_tv()

{

	global $wpdb;

	$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = %d AND post_type = 'tvshows'", $parent_id);

	$children_ids = $wpdb->get_col($query);

	if (count($children_ids)) $wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %d WHERE meta_key = 'dt_views_count' AND post_id IN( " . implode(',', $children_ids) . " )", $example_integer));

}

// Reset Rating

function reset_rating_avg()

{

	global $wpdb;

	$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = %d", $parent_id);

	$children_ids = $wpdb->get_col($query);

	if (count($children_ids)) $wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %d WHERE meta_key = '_starstruck_avg' AND post_id IN( " . implode(',', $children_ids) . " )", $example_integer));

}

function reset_rating_total()

{

	global $wpdb;

	$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = %d", $parent_id);

	$children_ids = $wpdb->get_col($query);

	if (count($children_ids)) $wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %d WHERE meta_key = '_starstruck_total' AND post_id IN( " . implode(',', $children_ids) . " )", $example_integer));

}

function reset_rating_data()

{

	global $wpdb;

	$query = $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_parent = %d", $parent_id);

	$children_ids = $wpdb->get_col($query);

	if (count($children_ids)) $wpdb->query($wpdb->prepare("UPDATE $wpdb->postmeta SET meta_value = %d WHERE meta_key = '_starstruck_data' AND post_id IN( " . implode(',', $children_ids) . " )", $example_integer));

}



// Registrar nuevo usuario (Funcion completa)

function dt_register_process()

{

	if (isset($_POST['adduser']) && isset($_POST['add-nonce']) && wp_verify_nonce($_POST['add-nonce'], 'add-user'))

	{

		// Error total en el nonce

		if (!wp_verify_nonce($_POST['add-nonce'], 'add-user'))

		{

			wp_die(__('Sorry! That was secure, guess you\'re cheatin huh!', 'mtms'));

		}

		else

		{

			// revision Google Recaptcha

			get_template_part('inc/api/recaptchalib');

			$siteKey = GRC_PUBLIC;

			$secret = GRC_SECRET;

			$resp = null;

			$error = null;

			$reCaptcha = new ReCaptcha($secret);

			if ($_POST["g-recaptcha-response"])

			{

				$resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);

			}

			if ($resp != null && $resp->success)

			{

				// etiquetas para el email.

				function dt_mail_tags($message) {

					$message = str_replace( '{sitename}', get_bloginfo( 'name' ), $message );

					$message = str_replace( '{siteurl}', get_bloginfo( 'siteurl' ), $message );

					$message = str_replace( '{username}', $_POST['user_name'] , $message );

					$message = str_replace( '{password}', $_POST['dt_password'] , $message );

					$message = str_replace( '{email}', $_POST['email'] , $message );

					$message = str_replace( '{first_name}', $_POST['dt_name'] , $message );

					$message = str_replace( '{last_name}', $_POST['dt_last_name'] , $message );

					$message = apply_filters( 'dt_mail_tags', $message );

					return $message;

				}

				// componer mensaje

				$asunto = dt_mail_tags(__('Welcome to {sitename}','mtms'));

				$message = dt_mail_tags(get_option('dt_welcome_mail_user'));

				wp_mail( $_POST['email'], $asunto , $message );

				// Registrando datos de usuario

				$userdata = array(

					'user_pass' => $_POST['dt_password'],

					'user_login' => esc_attr($_POST['user_name']) ,

					'user_email' => esc_attr($_POST['email']) ,

					'role' => 'subscriber',

					'first_name' => $_POST['dt_name'],

					'last_name' => $_POST['dt_last_name'],

				);

				// setup some error checks

				if (!$userdata['user_login']) $error = __('A username is required for registration.', 'mtms');

				elseif (username_exists($userdata['user_login'])) $error = __('Sorry, that username already exists!', 'mtms');

				elseif (!is_email($userdata['user_email'], true)) $error = __('You must enter a valid email address.', 'mtms');

				elseif (email_exists($userdata['user_email'])) $error = __('Sorry, that email address is already used!', 'mtms');

				// setup new users and send notification

				else

				{

					$new_user = wp_insert_user($userdata);

					wp_new_user_notification($new_user, $user_pass);

				}

			}

			else

			{

				$error = __('invalid code', 'mtms');

			} // end recaptcha

		}

	}

	if ($new_user): ?>

	<div class="notice alert">

		<?php $user = get_user_by('id',$new_user); _e('Thank you for registering','mtms'); echo ' '. $user->user_login; ?>

	</div>

	<?php get_template_part('pages/sections/login-form'); else : ?>

		<?php if ( $error ) : ?>

			<div class="notice error"><?php echo $error; ?></div>

		<?php get_template_part('pages/sections/register-form'); endif; ?>

	<?php endif;

}

add_action('dt_register_form', 'dt_register_process');



// Admin bar menu

add_action('admin_bar_menu', 'dooplay_admin_bar_menu', 99);

function dooplay_admin_bar_menu() {

   global $wp_admin_bar;

   $menus[] = array(

      'id' => 'dooplay',

      'title' => 'DooPlay',

      'href' => 'https://doothemes.com/dooplay/',

      'meta' => array(

         'target' => 'blank',

		 'class' => 'dt_dooplay_menu'

      )

   );

	$menus[] = array(

      'id' => 'options',

      'parent' => 'dooplay',

      'title' => __('Theme options','mtms'),

      'href' => get_admin_url().'themes.php?page=dooplay'

   

   );

	$menus[] = array(

      'id' => 'license',

      'parent' => 'dooplay',

      'title' => __('License','mtms'),

      'href' => get_admin_url().'themes.php?page=dooplay-license'

   

   );

   $menus[] = array(

      'id' => 'support',

      'parent' => 'dooplay',

      'title' => __('Support','mtms'),

      'href' => 'https://doothemes.com/forums/',

      'meta' => array(

         'target' => 'blank'

      )

   );

   $menus[] = array(

      'id' => 'changelog',

      'parent' => 'dooplay',

      'title' => __('Changelog','mtms'),

      'href' => 'http://doothemes.com/changelog/dooplay/',

      'meta' => array(

         'target' => 'blank'

      )

   );

   foreach ( apply_filters( 'render_webmaster_menu', $menus ) as $menu )

       $wp_admin_bar->add_menu( $menu );

}

function menu_resp_no_home() { ?>

<div id="arch-menu" class="single_menu">

	<ul class="main_dt_menu">

		<li><a href="<?php echo esc_url( home_url() ); ?>"><?php _e('Home','mtms'); ?></a></li>

		<?php if($url = get_option('dt_movies_slug','movies')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><?php _e('Movies','mtms'); ?></a></li><?php } ?>

		<?php if($url = get_option('dt_tvshows_slug','tvshows')) { ?><li><a href="<?php echo esc_url( home_url() ) .'/'. $url .'/'; ?>"><?php _e('TV Shows','mtms'); ?></a></li><?php } ?>

	</ul>

</div>

<style>

.mCSB_outside+.mCS-minimal-dark.mCSB_scrollTools_vertical {margin-right:0}

</style>

<?php } 

function links_social_single() { ?>

<div class="dt_social_single">

	<a href="javascript: void(0);" onclick="window.open ('https://facebook.com/sharer.php?u=<?php the_permalink() ?>', 'Facebook', 'toolbar=0, status=0, width=650, height=450');" class="facebook"><i class="icon-facebook"></i> <?php _e('Share','mtms'); ?></a>

	<a href="javascript: void(0);" onclick="window.open ('https://twitter.com/intent/tweet?text=<?php the_title(); ?>&amp;url=<?php the_permalink() ?>', 'Twitter', 'toolbar=0, status=0, width=650, height=450');" data-rurl="<?php the_permalink() ?>" class="twitter"><i class="icon-twitter"></i> <?php _e('Tweet','mtms'); ?></a>

</div>

<?php } 

function fbimage($img){

	$val = str_replace(array("/","jpg","png","gif"),array('<meta property="og:image" content="https://image.tmdb.org/t/p/w500/','jpg" />','png" />','gif" />'),$img);

	echo $val;	

}