<?php 
function links() {
	$labels = array(
		'name'                => __( 'Links', 'mtms' ),
		'singular_name'       => __( 'Links', 'mtms' ),
		'menu_name'           => __( 'Links %%PENDING_COUNT_LINK%%', 'mtms' ),
		'name_admin_bar'      => __( 'Links', 'mtms' ),
		'all_items'			=> __('Links','mtms')
	);
	$rewrite = array(
		'slug'                => get_option('dt_links_slug','links'),
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'Links', 'mtms' ),
		'description'         => __( 'Links manage', 'mtms' ),
		'labels'              => $labels,
		'supports'            => array('title'),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-links',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'dt_links', $args );
}
add_action( 'init', 'links', 0 );
include('metabox.php');

add_filter('manage_dt_links_posts_columns', 'link_table_head');
function link_table_head( $defaults ) {
	$defaults['tipo']  = __('Post / type', 'mtms');
	$defaults['server']  = __('Server', 'mtms');
	$defaults['idioma']    = __('Language', 'mtms');
    $defaults['calidad']    = __('Quality', 'mtms');

    return $defaults;
}
add_action( 'manage_dt_links_posts_custom_column', 'link_table_content', 10, 2 );
function link_table_content( $column_name, $post_id ) {
    if ($column_name == 'tipo') {
	echo '<a href="'. home_url() .'/?p='. get_post_meta( $post_id, 'dt_postid', true ) .'" target="_blank"><strong>'. get_post_meta( $post_id, 'dt_postitle', true ) .'</strong></a>';
	echo '<div class="row-actions" style="color: #555">', get_post_meta( $post_id, 'links_type', true ), '</div>';
    }
	if ($column_name == 'server') {
    $url = get_post_meta( $post_id, 'links_url', true );
		echo '<img src="https://plus.google.com/_/favicon?domain='. saca_dominio($url) .'"> &nbsp;'. saca_dominio($url);
    }
	if ($column_name == 'idioma') {
		echo '<span class="dashicons dashicons-translation"></span> ';
    echo get_post_meta( $post_id, 'links_idioma', true );
    }
	if ($column_name == 'calidad') {
    echo get_post_meta( $post_id, 'links_quality', true );
    }
}

// Pendientes
add_action('auth_redirect', 'add_pending_count_filter_link');
add_action('admin_menu', 'esc_attr_restore_link');
function add_pending_count_filter_link() {
  add_filter('attribute_escape', 'remove_esc_attr_and_count_link', 20, 2);
}
function esc_attr_restore_link() {
  remove_filter('attribute_escape', 'remove_esc_attr_and_count_link', 20, 2);
}
function remove_esc_attr_and_count_link( $safe_text = '', $text = '' ) {
  if ( substr_count($text, '%%PENDING_COUNT_LINK%%') ) {
    $text = trim( str_replace('%%PENDING_COUNT_LINK%%', '', $text) );
    remove_filter('attribute_escape', 'remove_esc_attr_and_count_link', 20, 2);
    $safe_text = esc_attr($text);
    $count = (int)wp_count_posts( 'dt_links',  'readable' )->pending;
    if ( $count > 0 ) {
      $text = esc_attr($text) . '<span class="awaiting-mod count-' . $count . '" style="margin-left:7px;"><span class="pending-count">' . $count . '</span></span>';
      return $text;
    } 
  }
  return $safe_text;
}