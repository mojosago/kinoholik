<div id="links" class="sbox">
<div class="links_table">
<h2>
<?php _e('Links','mtms'); ?> 
<?php if(get_option('dt_permissions_post_links')=="a77") { ?><a href="#dt_contenedor" class="addlink"><?php _e('+ Add new link','mtms'); ?></a><?php } ?>
<?php if(get_option('dt_permissions_post_links')=="a00") { global $user_ID; if( $user_ID ) : if( current_user_can('administrator') ) : ?><a href="#dt_contenedor" class="addlink"><?php _e('+ Add new link','mtms'); ?></a><?php endif; endif; } ?>
<?php if(get_option('dt_permissions_post_links')=="a63") { if (is_user_logged_in()) { ?>
<a href="#dt_contenedor" class="addlink"><?php _e('+ Add new link','mtms'); ?></a>
<?php } else { ?>
<a href="<?php echo get_option('dt_account_page') .'?action=log-in'; ?>" class="addlink"><?php _e('+ Add new link','mtms'); ?></a>
<?php } } ?>
</h2>

<?php
$idts = get_post_meta($post->ID, "dt_string", $single = true);
$data = link_of($idts); if(!empty($data)){ ?>
<div class="fix-table">
<table>
<thead>
<tr>
<th><?php _e('Type','mtms'); ?></th>
<th><?php _e('Server','mtms'); ?></th>
<th><?php _e('Quality','mtms'); ?></th>
<th><?php _e('Language','mtms'); ?></th>
<th><?php _e('Added','mtms'); ?></th>
<?php if (current_user_can('edit_post', $value_t['id'])) { ?><th><?php _e('Manage','mtms'); ?></th><?php } ?>
</tr>
</thead>
<tbody>
<?php 
$dato = $data['dt_string']['all'];
foreach($dato as $key_t=>$value_t){
if($value_t['dt_string'] == $value_c['dt_string']){ ?>
<tr id="<?php echo data_of('dt_string',$value_t['id']); ?>">
<td><a class="link_a" href="<?php echo get_permalink( $value_t['id'] ); ?>" target="_blank"><?php echo data_of('links_type',$value_t['id']); ?></a></td>
<td><img src="https://plus.google.com/_/favicon?domain=<?php $link = data_of('links_url',$value_t['id']); echo saca_dominio($link); ?>"> <?php $link = data_of('links_url',$value_t['id']); echo saca_dominio($link); ?></td>
<td><?php echo data_of('links_quality',$value_t['id']); ?></td>
<td><?php echo data_of('links_idioma',$value_t['id']); ?></td>
<td><?php echo human_time_diff(get_the_time('U',$value_t['id']), current_time('timestamp',$value_t['id'])); ?> </td>
<?php if (current_user_can('edit_post', $value_t['id'])) { ?>
<td>
<?php
echo "<a href='" . esc_url( home_url() ) . "/wp-admin/post.php?post=".$value_t['id']."&action=edit'>". __('Edit','mtms') ."</a> / ";
echo "<a href='" . wp_nonce_url( esc_url( home_url() ) . "/wp-admin/post.php?action=delete&amp;post=".$value_t['id']."", 'delete-post_' . $value_t['id']) . "'>". __('Delete','mtms') ."</a>";
?>
</td>
<?php } ?>
</tr>
<?php }  } ?>
<tbody>
</table>
</div>
<?php } else { ?>
<div class="dt_nodata"><?php _e('no link\'s','mtms'); ?></div>
<?php } ?>
</div>
</div>
