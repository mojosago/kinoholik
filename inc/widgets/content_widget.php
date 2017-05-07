<?php
/**
 * Plugin Name: Sidebar content
 * Description: Sidebar content
 * Version: 1.0
 * Author: Erick Meza
 * Author URI: https://doothemes.com
 */
class DT_Widget extends WP_Widget {
	function DT_Widget() {
		$widget_ops = array( 'classname' => 'doothemes_widget', 'description' => __('A widget to show content in the sidebar', 'mtms') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'dtw_content' );
		$this->WP_Widget( 'dtw_content', __('DooPlay - Sidebar content', 'mtms'), $widget_ops, $control_ops );
	}
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.

		$title = apply_filters('widget_title', $instance['title'] );
		$num = $instance['dt_nun'];
		$tipo = $instance['dt_tipo'];
		$order = $instance['dt_order'];
		$layout = $instance['dt_layout'];
		$rand = $instance[ 'dt_rand' ] ? 'rand' : 'false';

		echo $before_widget;
		// Display Widget title 
		if ( $title )
			echo $before_title . $title . $after_title;
		//Display Query posts
		echo '<div class="dtw_content">';
	query_posts( array('post_type' => array($tipo), 'showposts' => $num, 'orderby' => $rand, 'order' => $order )); 
	while ( have_posts() ) : the_post(); 
		get_template_part('inc/parts/item_widget_'. $layout .''); 
	endwhile; wp_reset_query();
		echo '</div>';
		// End Query
		echo $after_widget;
	}
	//Update the widget 
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['dt_nun'] = strip_tags( $new_instance['dt_nun'] );
		$instance['dt_tipo'] = strip_tags( $new_instance['dt_tipo'] );
		$instance['dt_order'] = strip_tags( $new_instance['dt_order'] );
		$instance['dt_rand'] = strip_tags( $new_instance['dt_rand'] );
		$instance['dt_layout'] = strip_tags( $new_instance['dt_layout'] );
		return $instance;
	}
	function form( $instance ) {
		//Set up some default widget settings.
		$defaults = array( 'title' => '', 'dt_nun' => '10', 'dt_tipo' => 'movies', 'dt_order' => 'desc', 'dt_layout' => 'wa', 'dt_rand' => 'false' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'mtms'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dt_layout' ); ?>"><?php _e('Layout style', 'mtms'); ?></label>
			<select id="<?php echo $this->get_field_id( 'dt_layout' ); ?>" name="<?php echo $this->get_field_name( 'dt_layout' ); ?>" style="width:100%;">
				<option <?php if ( 'wa' == $instance['dt_layout'] ) echo 'selected="selected"'; ?> value="wa"><?php _e('Style 1 - image Backdrop','mtms'); ?></option>
				<option <?php if ( 'wb' == $instance['dt_layout'] ) echo 'selected="selected"'; ?> value="wb"><?php _e('Style 2 - image Poster','mtms'); ?></option>
				<option <?php if ( 'wc' == $instance['dt_layout'] ) echo 'selected="selected"'; ?> value="wc"><?php _e('Style 3 - no image','mtms'); ?></option>
            </select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dt_tipo' ); ?>"><?php _e('Content type', 'mtms'); ?></label>
			<select id="<?php echo $this->get_field_id( 'dt_tipo' ); ?>" name="<?php echo $this->get_field_name( 'dt_tipo' ); ?>" style="width:100%;">
				<option <?php if ( 'movies' == $instance['dt_tipo'] ) echo 'selected="selected"'; ?> value="movies"><?php _e('Филми','mtms'); ?></option>
				<option <?php if ( 'tvshows' == $instance['dt_tipo'] ) echo 'selected="selected"'; ?> value="tvshows"><?php _e('TV Shows','mtms'); ?></option>
				<option <?php if ( 'episodes' == $instance['dt_tipo'] ) echo 'selected="selected"'; ?> value="episodes"><?php _e('Episodes','mtms'); ?></option>
            </select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dt_nun' ); ?>"><?php _e('Items number', 'mtms'); ?></label>
			<input type="number" id="<?php echo $this->get_field_id( 'dt_nun' ); ?>" name="<?php echo $this->get_field_name( 'dt_nun' ); ?>" value="<?php echo $instance['dt_nun']; ?>" min="2" max="20" style="width:100%;">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'dt_order' ); ?>"><?php _e('Content order', 'mtms'); ?></label>
			<select id="<?php echo $this->get_field_id( 'dt_order' ); ?>" name="<?php echo $this->get_field_name( 'dt_order' ); ?>" class="widefat" style="width:100%;">
				<option <?php if ( 'desc' == $instance['dt_order'] ) echo 'selected="selected"'; ?> value="desc"><?php _e('Descending','mtms'); ?></option>
				<option <?php if ( 'asc' == $instance['dt_order'] ) echo 'selected="selected"'; ?> value="asc"><?php _e('Ascending','mtms'); ?></option>
            </select>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked( $instance[ 'dt_rand' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'dt_rand' ); ?>" name="<?php echo $this->get_field_name( 'dt_rand' ); ?>" /> 
			<label for="<?php echo $this->get_field_id( 'dt_rand' ); ?>"> <?php _e('Activate random order','mtms'); ?></label>
		</p>
	<?php
	
	}
}

?>