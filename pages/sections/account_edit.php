<?php
global $current_user, $wp_roles;
get_currentuserinfo();
$user_id = get_current_user_id();
$first_name = get_user_meta($user_id, 'first_name', true);
$last_name = get_user_meta($user_id, 'last_name', true);
$display_name = $current_user->display_name;
require_once (ABSPATH . WPINC . '/registration.php');
$error = array();
if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action']) && $_POST['action'] == 'update-user')
{
	if (!empty($_POST['pass1']) && !empty($_POST['pass2']))
	{
		if ($_POST['pass1'] == $_POST['pass2']) wp_update_user(array(
			'ID' => $current_user->ID,
			'user_pass' => esc_attr($_POST['pass1'])
		));
		else $error[] = __('The passwords you entered do not match.  Your password was not updated.', 'mtms');
	}
	if (!empty($_POST['url'])) wp_update_user(array(
		'ID' => $current_user->ID,
		'user_url' => esc_attr($_POST['url'])
	));
	if (!empty($_POST['email']))
	{
		if (!is_email(esc_attr($_POST['email']))) $error[] = __('The Email you entered is not valid.  please try again.', 'mtms');
		elseif (email_exists(esc_attr($_POST['email'])) != $current_user->id) $error[] = __('This email is already used by another user.  try a different one.', 'mtms');
		else
		{
			wp_update_user(array(
				'ID' => $current_user->ID,
				'user_email' => esc_attr($_POST['email'])
			));
		}
	}
	if (!empty($_POST['first-name'])) update_user_meta($current_user->ID, 'first_name', esc_attr($_POST['first-name']));
	if (!empty($_POST['last-name'])) update_user_meta($current_user->ID, 'last_name', esc_attr($_POST['last-name']));
	if (!empty($_POST['display_name'])) wp_update_user(array(
		'ID' => $current_user->ID,
		'display_name' => esc_attr($_POST['display_name'])
	));
	update_user_meta($current_user->ID, 'display_name', esc_attr($_POST['display_name']));
	if (!empty($_POST['description'])) update_user_meta($current_user->ID, 'description', esc_attr($_POST['description']));
	if (count($error) == 0)
	{
		do_action('edit_user_profile_update', $current_user->ID);
		wp_redirect(get_permalink() . '?action=edit&updated=true');
		exit;
	}
} get_header(); ?>

<?php menu_resp_no_home(); ?>

<div class="account">
	<div class="sidebar">
		<ul>
			<li><a <?php echo $_GET['action'] == '' ? 'class="active"' : ''; ?> href="<?php the_permalink(); ?>"><?php _e('My account','mtms'); ?></a></li>
			<li><a <?php echo $_GET['action'] == 'edit' ? 'class="active"' : ''; ?> href="<?php the_permalink(); ?>?action=edit"><?php _e('Edit account','mtms'); ?></a></li>
			<li><a <?php echo $_GET['action'] == 'list' ? 'class="active"' : ''; ?> href="<?php the_permalink(); ?>?action=list"><?php _e('My list','mtms'); ?></a></li>
			<li><a <?php echo $_GET['action'] == 'list-movies' ? 'class="active"' : ''; ?> href="<?php the_permalink(); ?>?action=list-movies"><?php _e('My Movies','mtms'); ?></a></li>
			<li><a <?php echo $_GET['action'] == 'list-tv' ? 'class="active"' : ''; ?> href="<?php the_permalink(); ?>?action=list-tv"><?php _e('My TV Shows','mtms'); ?></a></li>
		</ul>
	</div>


	<div class="content">
		<h3><?php _e('General account information','mtms'); ?></h3>
		
		<form method="post" class="update_profile" action="<?php the_permalink(); ?>?action=edit">
			<?php if ( $_GET['updated'] == 'true' ) : ?> 
			<div id="message" class="updated"><p><?php _e('Your profile has been updated.','mtms'); ?></p></div> 
			<?php endif; ?>

			<?php if ( !is_user_logged_in() ) : ?>
			<div class="warning"><?php _e('You must be logged in to edit your profile.', 'mtms'); ?></div><!-- .warning -->
			<?php else : ?>
			<?php if ( count($error) > 0 ) echo '<div class="error">' . implode("<br />", $error) . '</div>'; ?>


			<fieldset class="form-email">
				<label for="email"><?php _e('E-mail','mtms'); ?></label>
				<input type="text" id="email" name="email" value="<?php the_author_meta( 'user_email', $current_user->ID ); ?>" />
			</fieldset>

			<fieldset class="from-first-name min fix">
				<label for="first-name"><?php _e('First name','mtms'); ?></label>
				<input type="text" id="first-name" name="first-name" value="<?php the_author_meta( 'first_name', $current_user->ID ); ?>" />
			</fieldset>

			<fieldset class="form-last-name min">
				<label for="last-name"><?php _e('Last name','mtms'); ?></label>
				<input type="text" id="last-name" name="last-name" value="<?php the_author_meta( 'last_name', $current_user->ID ); ?>" />
			</fieldset>

			<fieldset class="form-url">
				<label for="url"><?php _e('Website','mtms'); ?></label>
				<input type="text" id="url" name="url" value="<?php the_author_meta( 'user_url', $current_user->ID ); ?>" />
			</fieldset>


			<fieldset class="form-display_name">
				<label for="display_name"><?php _e('Display name publicly as','mtms'); ?></label>
				<select name="display_name" id="display_name"><br/>
				<?php if (!empty($current_user->first_name)): ?>
				<option <?php
				selected($display_name, $current_user->first_name); ?> value="<?php
				echo esc_attr($current_user->first_name); ?>"><?php
				echo esc_html($current_user->first_name); ?></option>
				<?php endif; ?>
				<option <?php selected($display_name, $current_user->user_nicename); ?> value="<?php
				echo esc_attr($current_user->user_nicename); ?>"><?php
				echo esc_html($current_user->user_nicename); ?></option>
				<?php if (!empty($current_user->last_name)): ?>
				<option <?php selected($display_name, $current_user->last_name); ?> value="<?php
				echo esc_attr($current_user->last_name); ?>"><?php
				echo esc_html($current_user->last_name); ?></option>
				<?php endif; ?>
				<?php if (!empty($current_user->first_name) && !empty($current_user->last_name)): ?>
				<option <?php selected($display_name, $current_user->first_name . ' ' . $current_user->last_name); ?> value="<?php
				echo esc_attr($current_user->first_name . ' ' . $current_user->last_name); ?>"><?php
				echo esc_html($current_user->first_name . ' ' . $current_user->last_name); ?></option>
				<option <?php selected($display_name, $current_user->last_name . ' ' . $current_user->first_name); ?> value="<?php
				echo esc_attr($current_user->last_name . ' ' . $current_user->first_name); ?>"><?php
				echo esc_html($current_user->last_name . ' ' . $current_user->first_name); ?></option>
				<?php endif; ?>
				<?php endif; ?>
				</select>
			</fieldset>
			
			<fieldset class="form-description">
				<label for="description"><?php _e('Description','mtms'); ?></label>
				<textarea id="description" name="description" rows="5" cols=""><?php the_author_meta( 'description', $current_user->ID ); ?></textarea>
			</fieldset>

			<h3><?php _e('Change password','mtms'); ?></h3>
			<fieldset class="form-pass1 min fix">
				<label for="pass1"><?php _e('Password *','mtms'); ?></label>
				<input type="password" id="pass1" name="pass1" />
			</fieldset>

			<fieldset class="form-pass2 min">
				<label for="pass2"><?php _e('Repeat Password *','mtms'); ?></label>
				<input type="password" id="pass2" name="pass2" />
			</fieldset>

			<fieldset class="form-submit">
				<input name="updateuser" type="submit" id="updateuser" class="submit button" value="<?php _e('Update account', 'mtms'); ?>" />
				<?php wp_nonce_field( 'update-user_'. $current_user->ID ) ?>
				<input name="action" type="hidden" id="action" value="update-user" />
			</fieldset>
		</form>
	</div>
</div>












<?php get_footer(); ?>