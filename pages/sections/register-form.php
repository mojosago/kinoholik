<form method="POST" id="adduser" class="register_form" action="<?php echo get_option('dt_account_page') .'?action=sign-in&form=send'; ?>">
	<fieldset>
		<label for="user_name"><?php _e('Username','mtms'); ?></label>
		<input type="text" placeholder="JohnDoe" id="user_name" name="user_name" value="<?php echo $_POST['user_name']; ?>" required />
	</fieldset>

	<fieldset>
		<label for="email"><?php _e('E-mail address','mtms'); ?></label>
		<input type="text" placeholder="johndoe@email.com" id="email" name="email" value="<?php echo $_POST['email']; ?>" required />
	</fieldset>

	<fieldset>
		<label for="dt_password"><?php _e('Password','mtms'); ?></label>
		<input type="password" id="dt_password" name="dt_password" required />
		<div class="passwordbox"><div id="passwordStrengthDiv" class="is0"></div></div>
	</fieldset>
	
	<fieldset class="min fix">
		<label for="dt_name"><?php _e('Name','mtms'); ?></label>
		<input type="text" placeholder="John" id="dt_name" name="dt_name" value="<?php echo $_POST['dt_name']; ?>" required />
	</fieldset>

	<fieldset class="min">
		<label for="dt_last_name"><?php _e('Last name','mtms'); ?></label>
		<input type="text" placeholder="Doe" id="dt_last_name" name="dt_last_name" value="<?php echo $_POST['dt_last_name']; ?>" required />
	</fieldset>

	<fieldset>
		<label form="reCAPTCHA"><?php _e('Security check','mtms'); ?></label>
		<div class="g-recaptcha" data-sitekey="<?php echo GRC_PUBLIC; ?>"></div>
		<p><?php _e('please do not skip this step, it is important.','mtms'); ?></p>
	</fieldset>
	<fieldset>
		<input name="adduser" type="submit" id="addusersub" class="submit button" value="<?php _e('Sign up','mtms'); ?>" />
		<span><?php _e('Do you already have an account?','mtms'); ?> <a href="<?php echo get_option('dt_account_page'); ?>?action=log-in"><?php _e('Login here','mtms'); ?></a></span>
	</fieldset>
	<?php wp_nonce_field( 'add-user', 'add-nonce' ) ?>
	<input name="action" type="hidden" id="action" value="adduser" />
</form>