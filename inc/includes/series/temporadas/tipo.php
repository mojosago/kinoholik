<?php
// Register Series
function seasons() {

	$labels = array(
		'name'                => _x( 'Seasons', 'Post Type General Name', 'mtms' ),
		'singular_name'       => _x( 'Seasons', 'Post Type Singular Name', 'mtms' ),
		'menu_name'           => __( 'Seasons', 'mtms' ),
		'name_admin_bar'      => __( 'Seasons', 'mtms' ),
	);
	$rewrite = array(
		'slug'                => get_option('dt_seasons_slug','seasons'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Seasons', 'mtms' ),
		'description'         => __( 'Seasons manage', 'mtms' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor','comments','thumbnail' ),
		'taxonomies'          => array( ),
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
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'seasons', $args );
}
add_action( 'init', 'seasons', 0 );
// Metadatos y taxonomias
include('metabox.php');

add_filter('manage_seasons_posts_columns', 'seasons_table_head');
function seasons_table_head( $defaults ) {
	if(get_option( DT_KEY ) == "valid"):
	$defaults['generate']    = __('Generate', 'mtms');
	endif;
	$defaults['serie']    = __('TV Show', 'mtms');
    $defaults['idtmdb']    = __('ID TMDb', 'mtms');
    return $defaults;
}
add_action( 'manage_seasons_posts_custom_column', 'seasons_table_content', 10, 2 );
function seasons_table_content( $column_name, $post_id ) {
	
	if ($column_name == 'generate') {
		if(get_option( DT_KEY ) == "valid"):
			if(get_post_meta( $post_id, 'clgnrt', true ) =='1') { _e('Ready','mtms'); } else {
    echo '<a href="'.get_template_directory_uri().'/inc/api/episodes_admin.php?se='.get_post_meta( $post_id, 'ids', true ).'&te='.get_post_meta( $post_id, 'temporada', true ).'&link='.$post_id.'" class="dtload button button-primary">'. __('Generate Episodes','mtms') .'</a>';
		}
		endif;
    }
	if ($column_name == 'serie') {
    echo get_post_meta( $post_id, 'serie', true );
    }
    if ($column_name == 'idtmdb') {
    echo get_post_meta( $post_id, 'ids', true );
    }
}


