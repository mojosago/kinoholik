<?php
	if (is_admin()) {
		include_once 'options/options.php';
		include_once 'admin-helper.php';
		include_once 'ajax-image.php';
		include_once 'generate-options.php';
		new acera_theme_options($options);
		add_action('admin_head', 'acera_admin_head');
		add_action('admin_head', 'dt_upload_image_editor');
	}
?>
