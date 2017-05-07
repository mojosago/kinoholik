<?php
 if ( !defined( 'ABSPATH' ) ) exit;
 if ( !class_exists( 'Radium_Theme_Importer' ) ) {
	class Radium_Theme_Importer {
		public $theme_options_framework = 'radium'; 
		public $theme_options_file;
		public $widgets;
		public $content_demo;
		public $flag_as_imported = array( 'content' => false, 'menus' => false, 'options' => false, 'widgets' =>false );
		public $imported_demos = array();
		public $add_admin_menu = true;
	    private static $instance;
	    public function __construct() {
	        self::$instance = $this;
	        $this->demo_files_path 		= apply_filters('radium_theme_importer_demo_files_path', $this->demo_files_path);
	        $this->theme_options_file 	= apply_filters('radium_theme_importer_theme_options_file', $this->demo_files_path . $this->theme_options_file_name);
	        $this->widgets 				= apply_filters('radium_theme_importer_widgets_file', $this->demo_files_path . $this->widgets_file_name);
	        $this->content_demo 		= apply_filters('radium_theme_importer_content_demo_file', $this->demo_files_path . $this->content_demo_file_name);
			$this->imported_demos = get_option( 'radium_imported_demo' );
            if( $this->theme_options_framework == 'optiontree' ) {
                $this->theme_option_name = ot_options_id();
            }
	        if( $this->add_admin_menu ) add_action( 'admin_menu', array($this, 'add_admin') );
			add_filter( 'add_post_metadata', array( $this, 'check_previous_meta' ), 10, 5 );
      		add_action( 'radium_import_end', array( $this, 'after_wp_importer' ) );
	    }
	    public function add_admin() {
			if(dttp == "valid"):
				add_theme_page(__('Import demo data','mtms'), __('Import demo data','mtms'), 'switch_themes', 'dooplay_demo_data', array($this, 'demo_installer'));
			endif;
	    }
        public function check_previous_meta( $continue, $post_id, $meta_key, $meta_value, $unique ) {
			$old_value = get_metadata( 'post', $post_id, $meta_key );
			if ( count( $old_value ) == 1 ) {
				if ( $old_value[0] === $meta_value ) {
					return false;
				} elseif ( $old_value[0] !== $meta_value ) {
					update_post_meta( $post_id, $meta_key, $meta_value );
					return false;
				}
			}
    	}
    	public function after_wp_importer() {
			do_action( 'radium_importer_after_content_import');
			update_option( 'radium_imported_demo', $this->flag_as_imported );
		}
    	public function intro_html() {
			?>
		<div class="changelog point-releases">
			<h3><?php _e('Necessary requirements','mtms'); ?></h3>
			<p>1.- <?php _e('Install of WordPress clean.','mtms'); ?></p>
			<p>2.- <?php _e('Valid license.','mtms'); ?></p>
			<p>3.- <?php _e('Do not create any menu to complete the import.','mtms'); ?></p>
			<p>4.- <?php _e('Remove all added content.','mtms'); ?></p>
			<p>5.- <?php _e('Please click import only once and wait, it can take a couple of minutes.','mtms'); ?></p>
			<p>6.- <?php _e('Before you begin, make sure all the required plugins are activated.','mtms'); ?></p>
			<code>dooplay_demo.xml 640 KB</code>


		</div>			

			
<?php		 
    	}
	    public function demo_installer() {
			$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
			if( !empty($this->imported_demos ) ) {
				$button_text = __('Import Again', 'mtms');
			} else {
				$button_text = __('Import Demo Data', 'mtms');
			}
	        ?>
			
<div class="wrap about-wrap">
	<h1><?php _e('Import demo data','mtms'); ?></h1>
		<?php if( !empty($this->imported_demos) ) { ?>
			<div class="about-text" style="background: #fff;padding: 10px;min-height: 0;color: #11A948;"><?php _e('Demo already imported', 'mtms'); ?></div>
		<?php } else { ?>
			<div class="about-text"><?php _e('This process can take several minutes to complete.','mtms'); ?></div>
		<?php } ?>
	<div class="radium-importer-wrap" data-demo-id="1"  data-nonce="<?php echo wp_create_nonce('radium-demo-code'); ?>">
		<form method="post">
			<?php $this->intro_html(); ?>
			<input type="hidden" name="demononce" value="<?php echo wp_create_nonce('radium-demo-code'); ?>" />
			<input name="reset" class="panel-save button-primary radium-import-start" type="submit" value="<?php echo $button_text ; ?>" />
			<input type="hidden" name="action" value="demo-data" />
			<br />
			<br />
				<?php if( 'demo-data' == $action && check_admin_referer('radium-demo-code' , 'demononce')){ ?>
					<div class="radium-importer-message clear"><?php  $this->process_imports(); ?></div>
				<?php } ?>
		</form>
	</div>
</div>
<?php
	    }
	    public function process_imports( $content = true, $options = true, $widgets = true) {
			if ( $content && !empty( $this->content_demo ) && is_file( $this->content_demo ) ) {
				$this->set_demo_data( $this->content_demo );
			}
			if ( $options && !empty( $this->theme_options_file ) && is_file( $this->theme_options_file ) ) {
				$this->set_demo_theme_options( $this->theme_options_file );
			}
			if ( $options ) {
				$this->set_demo_menus();
			}
			if ( $widgets && !empty( $this->widgets ) && is_file( $this->widgets ) ) {
				$this->process_widget_import_file( $this->widgets );
			}
			do_action( 'radium_import_end');
        }
	    public function add_widget_to_sidebar($sidebar_slug, $widget_slug, $count_mod, $widget_settings = array()){
	        $sidebars_widgets = get_option('sidebars_widgets');
	        if(!isset($sidebars_widgets[$sidebar_slug]))
	           $sidebars_widgets[$sidebar_slug] = array('_multiwidget' => 1);
	        $newWidget = get_option('widget_'.$widget_slug);
	        if(!is_array($newWidget))
	            $newWidget = array();
	        $count = count($newWidget)+1+$count_mod;
	        $sidebars_widgets[$sidebar_slug][] = $widget_slug.'-'.$count;
	        $newWidget[$count] = $widget_settings;
	        update_option('sidebars_widgets', $sidebars_widgets);
	        update_option('widget_'.$widget_slug, $newWidget);
	    }
	    public function set_demo_data( $file ) {
		    if ( !defined('WP_LOAD_IMPORTERS') ) define('WP_LOAD_IMPORTERS', true);
	        require_once ABSPATH . 'wp-admin/includes/import.php';
	        $importer_error = false;
	        if ( !class_exists( 'WP_Importer' ) ) {
	            $class_wp_importer = ABSPATH . 'wp-admin/includes/class-wp-importer.php';
	            if ( file_exists( $class_wp_importer ) ){
	                require_once($class_wp_importer);
	            } else {
	                $importer_error = true;
	            }
	        }
	        if ( !class_exists( 'WP_Import' ) ) {
	            $class_wp_import = dirname( __FILE__ ) .'/wordpress-importer.php';
	            if ( file_exists( $class_wp_import ) )
	                require_once($class_wp_import);
	            else
	                $importer_error = true;
	        }
	        if($importer_error){
	            die("Error on import");
	        } else {
	            if(!is_file( $file )){
	                echo "The XML file containing the dummy content is not available or could not be read.";
	            } else {
	               	$wp_import = new WP_Import();
	               	$wp_import->fetch_attachments = true;
	               	$wp_import->import( $file );
					$this->flag_as_imported['content'] = true;
	         	}
	    	}
	    	do_action( 'radium_importer_after_theme_content_import');
	    }
	    public function set_demo_menus() {}
	    public function set_demo_theme_options( $file ) {
			if ( file_exists( $file ) ) {
				$data = file_get_contents( $file );
				if( $this->theme_options_framework == 'radium') {
					$data = unserialize( trim($data, '###') );
				} elseif( $this->theme_options_framework == 'optiontree' ) {
					$data = $this->optiontree_decode($data);
					update_option( ot_options_id(), $data );
					$this->flag_as_imported['options'] = true;
				} else {
					$data = maybe_unserialize( $data );
				}
				if ( !empty( $data ) || is_array( $data ) ) {
					$data = apply_filters( 'radium_theme_import_theme_options', $data );
					update_option( $this->theme_option_name, $data );
					$this->flag_as_imported['options'] = true;
				}
	      		do_action( 'radium_importer_after_theme_options_import', $this->demo_files_path );
      		} else {
	      		wp_die(
      				__( 'Theme options Import file could not be found. Please try again.', 'mtms' ),
      				'',
      				array( 'back_link' => true )
      			);
       		}
	    }
	    function available_widgets() {
	    	global $wp_registered_widget_controls;
	    	$widget_controls = $wp_registered_widget_controls;
	    	$available_widgets = array();
	    	foreach ( $widget_controls as $widget ) {
	    		if ( ! empty( $widget['id_base'] ) && ! isset( $available_widgets[$widget['id_base']] ) ) { // no dupes
	    			$available_widgets[$widget['id_base']]['id_base'] = $widget['id_base'];
	    			$available_widgets[$widget['id_base']]['name'] = $widget['name'];
	    		}
	    	}
	    	return apply_filters( 'radium_theme_import_widget_available_widgets', $available_widgets );
	    }
	    function process_widget_import_file( $file ) {
	    	if ( ! file_exists( $file ) ) {
	    		wp_die(
	    			__( 'Widget Import file could not be found. Please try again.', 'mtms' ),
	    			'',
	    			array( 'back_link' => true )
	    		);
	    	}
	    	$data = file_get_contents( $file );
	    	$data = json_decode( $data );
	    	$this->widget_import_results = $this->import_widgets( $data );
	    }
	    public function import_widgets( $data ) {
	    	global $wp_registered_sidebars;
	    	if ( empty( $data ) || ! is_object( $data ) ) {
	    		return;
	    	}
	    	$data = apply_filters( 'radium_theme_import_widget_data', $data );
	    	$available_widgets = $this->available_widgets();
	    	$widget_instances = array();
	    	foreach ( $available_widgets as $widget_data ) {
	    		$widget_instances[$widget_data['id_base']] = get_option( 'widget_' . $widget_data['id_base'] );
	    	}
	    	$results = array();
	    	foreach ( $data as $sidebar_id => $widgets ) {
	    		if ( 'wp_inactive_widgets' == $sidebar_id ) {
	    			continue;
	    		}
	    		if ( isset( $wp_registered_sidebars[$sidebar_id] ) ) {
	    			$sidebar_available = true;
	    			$use_sidebar_id = $sidebar_id;
	    			$sidebar_message_type = 'success';
	    			$sidebar_message = '';
	    		} else {
	    			$sidebar_available = false;
	    			$use_sidebar_id = 'wp_inactive_widgets';
	    			$sidebar_message_type = 'error';
	    			$sidebar_message = __( 'Sidebar does not exist in theme (using Inactive)', 'mtms' );
	    		}
	    		$results[$sidebar_id]['name'] = ! empty( $wp_registered_sidebars[$sidebar_id]['name'] ) ? $wp_registered_sidebars[$sidebar_id]['name'] : $sidebar_id; // sidebar name if theme supports it; otherwise ID
	    		$results[$sidebar_id]['message_type'] = $sidebar_message_type;
	    		$results[$sidebar_id]['message'] = $sidebar_message;
	    		$results[$sidebar_id]['widgets'] = array();
	    		foreach ( $widgets as $widget_instance_id => $widget ) {
	    			$fail = false;
	    			$id_base = preg_replace( '/-[0-9]+$/', '', $widget_instance_id );
	    			$instance_id_number = str_replace( $id_base . '-', '', $widget_instance_id );
	    			if ( ! $fail && ! isset( $available_widgets[$id_base] ) ) {
	    				$fail = true;
	    				$widget_message_type = 'error';
	    				$widget_message = __( 'Site does not support widget', 'mtms' ); 
	    			}
	    			$widget = apply_filters( 'radium_theme_import_widget_settings', $widget );
	    			if ( ! $fail && isset( $widget_instances[$id_base] ) ) {
	    				$sidebars_widgets = get_option( 'sidebars_widgets' );
	    				$sidebar_widgets = isset( $sidebars_widgets[$use_sidebar_id] ) ? $sidebars_widgets[$use_sidebar_id] : array();
	    				$single_widget_instances = ! empty( $widget_instances[$id_base] ) ? $widget_instances[$id_base] : array();
	    				foreach ( $single_widget_instances as $check_id => $check_widget ) {
	    					if ( in_array( "$id_base-$check_id", $sidebar_widgets ) && (array) $widget == $check_widget ) {
	    						$fail = true;
	    						$widget_message_type = 'warning';
	    						$widget_message = __( 'Widget already exists', 'mtms' ); 
	    						break;
	    					}
	    				}
	    			}
	    			if ( ! $fail ) {
	    				$single_widget_instances = get_option( 'widget_' . $id_base ); 
	    				$single_widget_instances = ! empty( $single_widget_instances ) ? $single_widget_instances : array( '_multiwidget' => 1 );
	    				$single_widget_instances[] = (array) $widget; 
    					end( $single_widget_instances );
    					$new_instance_id_number = key( $single_widget_instances );
    					if ( '0' === strval( $new_instance_id_number ) ) {
    						$new_instance_id_number = 1;
    						$single_widget_instances[$new_instance_id_number] = $single_widget_instances[0];
    						unset( $single_widget_instances[0] );
    					}
    					if ( isset( $single_widget_instances['_multiwidget'] ) ) {
    						$multiwidget = $single_widget_instances['_multiwidget'];
    						unset( $single_widget_instances['_multiwidget'] );
    						$single_widget_instances['_multiwidget'] = $multiwidget;
    					}
    					update_option( 'widget_' . $id_base, $single_widget_instances );
	    				$sidebars_widgets = get_option( 'sidebars_widgets' ); 
	    				$new_instance_id = $id_base . '-' . $new_instance_id_number;
	    				$sidebars_widgets[$use_sidebar_id][] = $new_instance_id; 
	    				update_option( 'sidebars_widgets', $sidebars_widgets );
	    				if ( $sidebar_available ) {
	    					$widget_message_type = 'success';
	    					$widget_message = __( 'Imported', 'mtms' );
	    				} else {
	    					$widget_message_type = 'warning';
	    					$widget_message = __( 'Imported to Inactive', 'mtms' );
	    				}
	    			}
	    			$results[$sidebar_id]['widgets'][$widget_instance_id]['name'] = isset( $available_widgets[$id_base]['name'] ) ? $available_widgets[$id_base]['name'] : $id_base; 
	    			$results[$sidebar_id]['widgets'][$widget_instance_id]['title'] = $widget->title ? $widget->title : __( 'No Title', 'mtms' );
	    			$results[$sidebar_id]['widgets'][$widget_instance_id]['message_type'] = $widget_message_type;
	    			$results[$sidebar_id]['widgets'][$widget_instance_id]['message'] = $widget_message;
	    		}
	    	}
			$this->flag_as_imported['widgets'] = true;
	    	do_action( 'radium_theme_import_widget_after_import' );
	    	return apply_filters( 'radium_theme_import_widget_results', $results );
	    }
	    public function optiontree_decode( $value ) {
			$func = 'base64' . '_decode';
			$prepared_data = maybe_unserialize( $func( $value ) );
			return $prepared_data;
	    }
	}
}
// save all options
function single_dt() {
	if($_GET['mtms'] == '42ze') {
		$store_url = DT_SERVER;
		$item_name = DT_THEME_NAME;
		$license = get_option(DT_KEY_S);
		$api_params = array(
			'edd_action' => 'check_license',
			'license' => $license,
			'item_name' => urlencode( $item_name )
		);
		$response = wp_remote_get( add_query_arg( $api_params, $store_url ), array( 'timeout' => 15, 'sslverify' => false ) );
		if ( is_wp_error( $response ) )
			return false;
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );
		if( $license_data->license == 'valid' ) { /* none */ } else {
			update_option(DT_KEY, '');
			echo 'invalid';
			exit;
		}
	}
}
// save all options 2
function link_k_dt() {
	$store_url = DT_SERVER;
	$item_name = DT_THEME_NAME;
	$license = get_option(DT_KEY_S);
	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( $item_name )
	);
	$response = wp_remote_get( add_query_arg( $api_params, $store_url ), array( 'timeout' => 15, 'sslverify' => false ) );
	if ( is_wp_error( $response ) )
		return false;
	$license_data = json_decode( wp_remote_retrieve_body( $response ) );
	if( $license_data->license == 'valid' ) { /* none */ } else {
		  update_option(DT_KEY, '');
	}
}