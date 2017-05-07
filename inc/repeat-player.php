<?php
function dt_get_sample_options()
{
	$options = array(
		__('Iframe HTML', 'mtms') => 'iframe',
		__('MP4 file', 'mtms') => 'mp4',
	);
	return $options;
}
add_action('admin_init', 'dt_add_meta_boxes', 1);
function dt_add_meta_boxes()
{
	add_meta_box('repeatable-fields', __('Video Player', 'mtms') , 'dt_repeatable_meta_box_display', 'movies', 'normal', 'default');
	add_meta_box('repeatable-fields', __('Video Player', 'mtms') , 'dt_repeatable_meta_box_display', 'episodes', 'normal', 'default');
}
function dt_repeatable_meta_box_display()
{
	global $post;
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	$options = dt_get_sample_options();
	wp_nonce_field('dt_repeatable_meta_box_nonce', 'dt_repeatable_meta_box_nonce');
?>
	<script type="text/javascript">
	jQuery(document).ready(function( $ ){
		$( '#add-row' ).on('click', function() {
			var row = $( '.empty-row.screen-reader-text' ).clone(true);
			row.removeClass( 'empty-row screen-reader-text' );
			row.insertBefore( '#repeatable-fieldset-one tbody>tr:first' );
			return false;
		});
		$( '.remove-row' ).on('click', function() {
			$(this).parents('tr').remove();
			return false;
		});
	});
	</script>
	<table id="repeatable-fieldset-one" width="100%" class="dt_table_admin">
	<thead>
		<tr>
			<th><?php _e('Title','mtms'); ?></th>
			<th><?php _e('Type','mtms'); ?></th>
			<th><?php _e('URL source','mtms'); ?></th>
			<th><?php _e('Control','mtms'); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php if ( $repeatable_fields ) : foreach ( $repeatable_fields as $field ) { ?>
	<tr>
		<td class="text_player"><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>
		<td>
			<select name="select[]" style="width: 100%;">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>"<?php selected( $field['select'], $value ); ?>><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
		<td><input type="url" class="widefat" name="url[]" placeholder="http://" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo ''; ?>" /></td>
		<td><a class="button remove-row" href="#"><?php _e('Remove','mtms'); ?></a></td>
	</tr>
	<?php } else : ?>
	<tr>
		<td class="text_player"><input type="text" class="widefat" name="name[]" /></td>
		<td>
			<select name="select[]" style="width: 100%;">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
		<td><input type="url" class="widefat" name="url[]" placeholder="http://" /></td>
		<td><a class="button remove-row" href="#"><?php _e('Remove','mtms'); ?></a></td>
	</tr>
	<?php endif; ?>
	<tr class="empty-row screen-reader-text">
		<td class="text_player"><input type="text" class="widefat" name="name[]" /></td>
		<td>
			<select name="select[]" style="width: 100%;">
			<?php foreach ( $options as $label => $value ) : ?>
			<option value="<?php echo $value; ?>"><?php echo $label; ?></option>
			<?php endforeach; ?>
			</select>
		</td>
		<td><input type="url" class="widefat" name="url[]" placeholder="http://" /></td>
		<td><a class="button remove-row" href="#"><?php _e('Remove','mtms'); ?></a></td>
	</tr>
	</tbody>
	</table>
	<p><a id="add-row" class="button button-primary" href="#"><?php _e('Add new row','mtms'); ?></a></p>
<?php
}
add_action('save_post', 'dt_repeatable_meta_box_save');
function dt_repeatable_meta_box_save($post_id)
{
	if (!isset($_POST['dt_repeatable_meta_box_nonce']) || !wp_verify_nonce($_POST['dt_repeatable_meta_box_nonce'], 'dt_repeatable_meta_box_nonce')) return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;
	$antiguo = get_post_meta($post_id, 'repeatable_fields', true);
	$nuevo = array();
	$options = dt_get_sample_options();
	$names = $_POST['name'];
	$selects = $_POST['select'];
	$urls = $_POST['url'];
	$count = count($names);
	for ($i = 0; $i < $count; $i++) {
		if ($names[$i] != ''):
			$nuevo[$i]['name'] = stripslashes(strip_tags($names[$i]));
			if (in_array($selects[$i], $options)) $nuevo[$i]['select'] = $selects[$i];
			else $nuevo[$i]['select'] = '';
			if ($urls[$i] == 'http://') $nuevo[$i]['url'] = '';
			else $nuevo[$i]['url'] = stripslashes($urls[$i]);
		endif;
	}
	if (!empty($nuevo) && $nuevo != $antiguo) update_post_meta($post_id, 'repeatable_fields', $nuevo);
	elseif (empty($nuevo) && $antiguo) delete_post_meta($post_id, 'repeatable_fields', $antiguo);
}
?>