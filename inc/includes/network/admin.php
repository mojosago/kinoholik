<?php
class EDD_Theme_Updater_Admin {
	 protected $remote_api_url = null;
	 protected $theme_slug = null;
	 protected $version = null;
	 protected $author = null;
	 protected $download_id = null;
	 protected $renew_url = null;
	 protected $strings = null;
	function __construct( $config = array(), $strings = array() ) {
		$config = wp_parse_args( $config, array(
			'remote_api_url' => '',
			'theme_slug' => get_template(),
			'item_name' => '',
			'license' => '',
			'version' => '',
			'author' => '',
			'download_id' => '',
			'renew_url' => ''
		) );
		$this->remote_api_url = $config['remote_api_url'];
		$this->item_name = $config['item_name'];
		$this->theme_slug = sanitize_key( $config['theme_slug'] );
		$this->version = $config['version'];
		$this->author = $config['author'];
		$this->download_id = $config['download_id'];
		$this->renew_url = $config['renew_url'];
		if ( '' == $config['version'] ) {
			$theme = wp_get_theme( $this->theme_slug );
			$this->version = $theme->get( 'Version' );
		}
		$this->strings = $strings;
		add_action( 'admin_init', array( $this, 'register_option' ) );
		add_action( 'admin_init', array( $this, 'license_action' ) );
		add_action( 'admin_menu', array( $this, 'license_menu' ) );
		add_action( 'update_option_' . $this->theme_slug . '_license_key', array( $this, 'activate_license' ), 10, 2 );
		add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );
	}

	function license_menu() {
		$strings = $this->strings;
		add_theme_page(
			$strings['theme-license'],
			$strings['theme-license'],
			'manage_options',
			$this->theme_slug . '-license',
			array( $this, 'license_page' )
		);
	}
	function license_page() {
		$strings = $this->strings;
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$status = get_option( $this->theme_slug . '_license_key_status', false );
		if ( ! $license ) {
			$message    = $strings['enter-key'];
		} else {
			// delete_transient( $this->theme_slug . '_license_message' );
			if ( ! get_transient( $this->theme_slug . '_license_message', false ) ) {
				set_transient( $this->theme_slug . '_license_message', $this->check_license(), ( 60 * 60 * 24 ) );
			}
			$message = get_transient( $this->theme_slug . '_license_message' );
		}
	//link_k_dt(); 
 ?>
<div class="wrap mundothemes_box about-wrap">
<h3>License Doothemes</h3>
	<div class="dt_boxg">
	<form method="post" action="options.php">
	<?php settings_fields( $this->theme_slug . '-license' ); ?>
	<table class="form-table">
	<tbody>
		<tr>
		<td>
			<input id="<?php echo $this->theme_slug; ?>_license_key" name="<?php echo $this->theme_slug; ?>_license_key" type="text" class="regular-text mttext" value="ungkapanhati" placeholder="<?php _e('License','mtms') ; ?>" Readonly/>
		<?php wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ); if ( 'valid' == $status ) { ?><div class="activel"></div><?php } else { ?><div class="noactivel"></div><?php } ?>
		<p class="description"><?php echo $message; ?></p>
		<?php wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ); if ( 'valid' == $status ) { ?>
		<span class="oknotas notas"><i class="dashicons-before dashicons-yes"></i> <?php _e('License activated, thanks.','mtms'); ?></span>
		<?php } else { ?>
		<span class="nonotas notas"><i class="dashicons-before dashicons-warning"></i> <?php _e('Activate your license to install future updates','mtms'); ?></span>
		<?php } ?>
		</td>
		</tr>
		<tr>
		<td>
		<input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes">
		<?php if ( $license ) { wp_nonce_field( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ); if ( 'valid' == $status ) { ?>
		<input type="submit" class="button-secondary" name="<?php echo $this->theme_slug; ?>_license_deactivate" value="<?php _e( 'Deactivate License', 'mtms' ); ?>"/>
		<?php } else { ?>
		<input type="submit" class="button-secondary" name="<?php echo $this->theme_slug; ?>_license_activate" value="<?php _e( 'Activate License', 'mtms' ); ?>"/>
		<?php } } ?>
		</td>
		</tr>
	</tbody>
	</table>
	
	</form>
	</div>
	<p><?php _e('Just click on <strong>Activate License</strong> to activate all functions. Enjoy it','mtms'); ?></p>
</div>
<?php } function register_option() {
	register_setting(
		$this->theme_slug . '-license',
		$this->theme_slug . '_license_key',
			array( $this, 'sanitize_license' )
		);
	}
	function sanitize_license( $new ) {

		$old = get_option( $this->theme_slug . '_license_key' );

		if ( $old && $old != $new ) {
			// New license has been entered, so must reactivate
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}

		return $new;
	}
	 function get_api_response( $api_params ) {
		$response = wp_remote_post( $this->remote_api_url, array( 'timeout' => 15, 'sslverify' => false, 'body' => $api_params ) );
		if ( is_wp_error( $response ) ) {
			return false;
		}
		$response = json_decode( wp_remote_retrieve_body( $response ) );
		return $response;
	 }
	function activate_license() {
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$license_data = array();
		$license_data['license'] = 'valid';

		if ( $license_data && isset( $license_data['license'] ) ) {
			update_option( $this->theme_slug . '_license_key_status', $license_data['license'] );
			delete_transient( $this->theme_slug . '_license_message' );
		}

	}
	function deactivate_license() {
		$license = trim( get_option( $this->theme_slug . '_license_key' ) );

		$license_data = array();
		$license_data['license'] = 'deactivated';

		if ( $license_data && ( $license_data['license'] == 'deactivated' ) ) {
			delete_option( $this->theme_slug . '_license_key_status' );
			delete_transient( $this->theme_slug . '_license_message' );
		}
	}
	function get_renewal_link() {
		if ( '' != $this->renew_url ) {
			return $this->renew_url;
		}
		$license_key = trim( get_option( $this->theme_slug . '_license_key', false ) );
		if ( '' != $this->download_id && $license_key ) {
			$url = esc_url( $this->remote_api_url );
			$url .= '/checkout/?edd_license_key=' . $license_key . '&download_id=' . $this->download_id;
			return $url;
		}
		return $this->remote_api_url;
	}
	function license_action() {

		if ( isset( $_POST[ $this->theme_slug . '_license_activate' ] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->activate_license();
			}
		}

		if ( isset( $_POST[$this->theme_slug . '_license_deactivate'] ) ) {
			if ( check_admin_referer( $this->theme_slug . '_nonce', $this->theme_slug . '_nonce' ) ) {
				$this->deactivate_license();
			}
		}

	}
	function check_license() {

		$license = trim( get_option( $this->theme_slug . '_license_key' ) );
		$strings = $this->strings;

		$license_data = array();
		$license_data['license'] = 'valid';
		$license_data['site_count'] = '';
		$license_data['license_limit'] = 0;
		$license_data['expires'] = '';

	
		if ( !isset( $license_data['license'] ) ) {
			$message = $strings['license-unknown'];
			return $message;
		}
		if ( $license_data && isset( $license_data['license'] ) ) {
			update_option( $this->theme_slug . '_license_key_status', $license_data['license'] );
		}
		$expires = false;
		if ( isset( $license_data['expires'] ) ) {
			$expires = date_i18n( get_option( 'date_format' ), strtotime( $license_data['expires'] ) );
			$renew_link = '<a href="' . esc_url( $this->get_renewal_link() ) . '" target="_blank">' . $strings['renew'] . '</a>';
		}
		$site_count = $license_data['site_count'];
		$license_limit = $license_data['license_limit'];
		if ( 0 == $license_limit ) {
			$license_limit = $strings['unlimited'];
		}
		if ( $license_data['license'] == 'valid' ) {
			$message = $strings['license-key-is-active'] . ' ';
			if ( $expires ) {
				$message .= sprintf( $strings['expires%s'], $expires ) . ' ';
			}
			if ( $site_count && $license_limit ) {
				$message .= sprintf( $strings['%1$s/%2$-sites'], $site_count, $license_limit );
			}
		} else if ( $license_data['license'] == 'expired' ) {
			if ( $expires ) {
				$message = sprintf( $strings['license-key-expired-%s'], $expires );
			} else {
				$message = $strings['license-key-expired'];
			}
			if ( $renew_link ) {
				$message .= ' ' . $renew_link;
			}
		} else if ( $license_data['license'] == 'invalid' ) {
			$message = $strings['license-keys-do-not-match'];
		} else if ( $license_data['license'] == 'inactive' ) {
			$message = $strings['license-is-inactive'];
		} else if ( $license_data['license'] == 'disabled' ) {
			$message = $strings['license-key-is-disabled'];
		} else if ( $license_data['license'] == 'site_inactive' ) {
			// Site is inactive
			$message = $strings['site-is-inactive'];
		} else {
			$message = $strings['license-status-unknown'];
		}

		return $message;
	}
	function disable_wporg_request( $r, $url ) {
		if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
 			return $r;
 		}
 		$themes = json_decode( $r['body']['themes'] );
 		$parent = get_option( 'template' );
 		$child = get_option( 'stylesheet' );
 		unset( $themes->themes->$parent );
 		unset( $themes->themes->$child );
 		$r['body']['themes'] = json_encode( $themes );
 		return $r;
	}

}
