<?php
// Register Series
function series() {
	$labels = array(
		'name'                => _x( 'TV Shows', 'Post Type General Name', 'mtms' ),
		'singular_name'       => _x( 'TV Show', 'Post Type Singular Name', 'mtms' ),
		'menu_name'           => __( 'TV Shows %%PENDING_COUNT_TV%%', 'mtms' ),
		'name_admin_bar'      => __( 'TV Shows', 'mtms' ),
		'all_items'           => __( 'TV Shows', 'mtms' ),
	);
	$rewrite = array(
		'slug'                => get_option('dt_tvshows_slug','tvshows'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'TV Show', 'mtms' ),
		'description'         => __( 'TV series manage', 'mtms' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','comments','thumbnail' ),
		'taxonomies'          => array( 'genres' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-view-site',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'tvshows', $args );
}
add_action( 'init', 'series', 0 );
# Metadatos y taxonomias

include('metabox.php');
add_filter('manage_tvshows_posts_columns', 'serie_table_head');
function serie_table_head( $defaults ) {
	if(get_option( DT_KEY ) == "valid"):
	$defaults['generate']    = __('Generate Seasons', 'mtms');
	endif;
    $defaults['idtmdb']    = __('ID TMDb', 'mtms');
	$defaults['seasons']    = __('Seasons', 'mtms');
    return $defaults;
}
add_action( 'manage_tvshows_posts_custom_column', 'serie_table_content', 10, 2 );
function serie_table_content( $column_name, $post_id ) {

	if ($column_name == 'generate') {
		if(get_option( DT_KEY ) == "valid"):
			if(get_post_meta( $post_id, 'clgnrt', true ) =='1') { _e('Ready','mtms'); } else {
			echo '<a href="'.get_template_directory_uri().'/inc/api/seasons_admin.php?se='.get_post_meta( $post_id, 'ids', true ).'&link='. $post_id .'" class="dtload button button-primary">'. __('Generate seasons','mtms') .'</a>';
		}
		endif;
    }
    if ($column_name == 'idtmdb') {
    echo get_post_meta( $post_id, 'ids', true );
    }
	if ($column_name == 'seasons') {
    echo '<span class="dt_rating">'.get_post_meta( $post_id, 'number_of_seasons', true ).'</span>';
    }

}

// Pendientes

add_action('auth_redirect', 'add_pending_count_filter_tv');
add_action('admin_menu', 'esc_attr_restore_tv');
function add_pending_count_filter_tv() {
  add_filter('attribute_escape', 'remove_esc_attr_and_count_tv', 20, 2);
}
function esc_attr_restore_tv() {
  remove_filter('attribute_escape', 'remove_esc_attr_and_count_tv', 20, 2);
}
function remove_esc_attr_and_count_tv( $safe_text = '', $text = '' ) {
  if ( substr_count($text, '%%PENDING_COUNT_TV%%') ) {
    $text = trim( str_replace('%%PENDING_COUNT_TV%%', '', $text) );
    remove_filter('attribute_escape', 'remove_esc_attr_and_count_tv', 20, 2);
    $safe_text = esc_attr($text);
    $count = (int)wp_count_posts( 'tvshows',  'readable' )->pending;
    if ( $count > 0 ) {
      $text = esc_attr($text) . '<span class="awaiting-mod count-' . $count . '" style="margin-left:7px;"><span class="pending-count">' . $count . '</span></span>';
      return $text;
    } 
  }
  return $safe_text;
}