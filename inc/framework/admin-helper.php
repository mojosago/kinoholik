<?php
if (!function_exists('acera_admin_head')) {
    function acera_admin_head() { if ( isset($_GET['page']) && $_GET['page'] == DT_THEME_SLUG ) { ?>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri()."/inc/framework/"; ?>css/acera_css.css" />
			<link rel="stylesheet" href="<?php echo get_template_directory_uri()."/inc/framework/"; ?>css/colorpicker.css" />
			<link rel="stylesheet" href="<?php echo get_template_directory_uri()."/inc/framework/"; ?>css/custom_style.css" />
			<script type="text/javascript" src="<?php echo get_template_directory_uri()."/inc/framework/"; ?>js/colorpicker.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri()."/inc/framework/"; ?>js/ajaxupload.js"></script>
			<script type="text/javascript" src="<?php echo get_template_directory_uri()."/inc/framework/"; ?>js/mainJs.js"></script>
        <?php
		}
    }
}
if (!function_exists('dt_upload_image_editor')) {
    function dt_upload_image_editor() { ?>
			<script type="text/javascript" src="<?php echo get_template_directory_uri()."/assets/js/upload_images.js"; ?>"></script>
        <?php
    }
}
function myPlugin_admin_scripts() {
   if ( is_admin() ){ 
      if ( isset($_GET['page']) && $_GET['page'] == DT_THEME_SLUG ) {
         wp_enqueue_script('jquery');
         wp_enqueue_script( 'jquery-form' );
      }
   }
}
add_action( 'admin_init', 'myPlugin_admin_scripts' );
?>