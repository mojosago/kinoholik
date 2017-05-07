<?php

// Director
function dtdirector() {
	$labels = array(
		'name'                       => __( 'Director', 'mtms' ),
		'singular_name'              => __( 'Director', 'mtms' ),
		'menu_name'                  => __( 'Director', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_director_slug','director'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtdirector', array( 'movies' ), $args );
}
add_action( 'init', 'dtdirector', 0 );

// Creator
function dtcreator() {
	$labels = array(
		'name'                       => __( 'Creator', 'mtms' ),
		'singular_name'              => __( 'Creator', 'mtms' ),
		'menu_name'                  => __( 'Creator', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_creator_slug','creator'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtcreator', array( 'tvshows' ), $args );
}
add_action( 'init', 'dtcreator', 0 );

// cast
function dtcast() {
	$labels = array(
		'name'                       => __( 'Cast', 'mtms' ),
		'singular_name'              => __( 'Cast', 'mtms' ),
		'menu_name'                  => __( 'Cast', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_cast_slug','cast'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtcast', array( 'tvshows','movies' ), $args );
}
add_action( 'init', 'dtcast', 0 );

// Studio
function dtstudio() {
	$labels = array(
		'name'                       => __( 'Studio', 'mtms' ),
		'singular_name'              => __( 'Studio', 'mtms' ),
		'menu_name'                  => __( 'Studio', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_studio_slug','studio'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtstudio', array( 'tvshows' ), $args );
}
add_action( 'init', 'dtstudio', 0 );


// Neworks
function dtnetworks() {
	$labels = array(
		'name'                       => __( 'Networks', 'mtms' ),
		'singular_name'              => __( 'Networks', 'mtms' ),
		'menu_name'                  => __( 'Networks', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_network_slug','network'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtnetworks', array( 'tvshows' ), $args );
}
add_action( 'init', 'dtnetworks', 0 );


// Year Serie
function dtyear() {
	$labels = array(
		'name'                       => __( 'Year', 'mtms' ),
		'singular_name'              => __( 'Year', 'mtms' ),
		'menu_name'                  => __( 'Year', 'mtms' ),
	);
	$rewrite = array(
		'slug'                       => get_option('dt_release_slug','release'),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => false,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'dtyear', array( 'tvshows','movies' ), $args );
}
add_action( 'init', 'dtyear', 0 );


