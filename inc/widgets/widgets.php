<?php
// Movies
function sidebar_movies()
{
	register_sidebar(array(
		'name' => __('Sidebar Movies single', 'mtms') ,
		'id' => 'sidebar-movies',
		'description' => __('Add widgets here to appear in your sidebar.', 'mtms') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'sidebar_movies');
// TVShows
function sidebar_tvshows()
{
	register_sidebar(array(
		'name' => __('Sidebar TVShows single', 'mtms') ,
		'id' => 'sidebar-tvshows',
		'description' => __('Add widgets here to appear in your sidebar.', 'mtms') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'sidebar_tvshows');
// Seasons
function sidebar_seasons()
{
	register_sidebar(array(
		'name' => __('Sidebar Seasons single', 'mtms') ,
		'id' => 'sidebar-seasons',
		'description' => __('Add widgets here to appear in your sidebar.', 'mtms') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'sidebar_seasons');
// Episodes
function sidebar_episodes()
{
	register_sidebar(array(
		'name' => __('Sidebar Episodes single', 'mtms') ,
		'id' => 'sidebar-episodes',
		'description' => __('Add widgets here to appear in your sidebar.', 'mtms') ,
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'sidebar_episodes');
// Registrar Widgets
function dt_widgets()
{
	register_widget('DT_Widget');
	register_widget('DT_Widget_views');
	register_widget('DT_Widget_social');
	register_widget('DT_Widget_related');
}
add_action('widgets_init', 'dt_widgets');
get_template_part ('inc/widgets/content_widget');
get_template_part ('inc/widgets/content_related_widget');
get_template_part ('inc/widgets/content_widget_views');
get_template_part ('inc/widgets/content_widget_social');