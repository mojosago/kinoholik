<?php 
/*
Template Name: DT - Contact page
*/
get_header();
// Captcha
$publico = GRC_PUBLIC;
$privado = GRC_SECRET;
$admin_mail = get_option('admin_email');
if($_GET['action'] == 'send') {
	if($_POST['send'] == 'true') {
		// revision Google Recaptcha
		get_template_part('inc/api/recaptchalib');
		$siteKey = $publico;
		$secret = $privado;
		$resp = null;
		$error = null;
		$reCaptcha = new ReCaptcha($secret);
		if ($_POST["g-recaptcha-response"])
			{
				$resp = $reCaptcha->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]);
			}
		if ($resp != null && $resp->success)  { 
			// datos del formulario
			$asunto = $_POST['asunto'];
			$mensaje = $_POST['mensaje'];
			$email = $_POST['email'];
			$name = $_POST['dtname'];
			$link = $_POST['dtpermalink'];
			$headers = array('Content-Type: text/html; charset=UTF-8','From: '.$name.' <'.$email.'>');
			$body = '
				<strong>'.$name.'</strong> ['.$email.']<br><br>
				-----------------------------------<br><br>
				'.$mensaje.'<br><br>
				-----------------------------------<br><br>
				'.$link.'<br><br>
				'. __('Contact form','mtms') .'
			';
			wp_mail( $admin_mail, $asunto , $body, $headers );
			$data_mensaje = __('Message sent, at any time one of our operators will contact you.','mtms');
		} else { $data_mensaje = __('invalid code','mtms'); } // end recaptcha
	} // end post
} // end send
menu_resp_no_home();
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="contact">
	<div class="wrapper">
		<h1><?php _e('Contact Form','mtms'); ?></h1>
		<p class="descrip"><?php _e('Have something to notify our support team, please do not hesitate to use this form.','mtms'); ?></p>
	</div>
	<div class="wrapper">
	<?php if($_POST['send'] == 'true'): 
		echo '<div class="mensaje_ot">';
		echo $data_mensaje;
		echo '</div>';
	else: ?>
		<form class="contactame" method="post" action="<?php echo get_option('dt_contact_page'); ?>?action=send">
			<fieldset class="nine">
				<label><?php _e('Name','mtms'); ?></label>
				<input type="text" name="dtname" required>
			</fieldset>
			<fieldset class="nine fix">
				<label><?php _e('Email','mtms'); ?></label>
				<input type="text" name="email" required>
			</fieldset>
			<fieldset>
				<label><?php _e('Subject','mtms'); ?></label>
				<p><?php _e('How can we help?','mtms'); ?></p>
				<input type="text" name="asunto" required>
			</fieldset>
			<fieldset>
				<label><?php _e('Your message','mtms'); ?></label>
				<p><?php _e('The more descriptive you can be the better we can help.','mtms'); ?></p>
				<textarea name="mensaje" rows="5" cols="" required></textarea>
			</fieldset>
			<fieldset>
				<label><?php _e('Link Reference (optional)','mtms'); ?></label>
				<input type="text" name="dtpermalink">
			</fieldset>
			<fieldset>
				<label><?php _e('Verification code','mtms'); ?></label>
				<p><?php _e("If you can't read the text, click on the image to redraw.","mtms"); ?></p>
				<div class="g-recaptcha" data-sitekey="<?php echo $publico; ?>"></div>
			</fieldset>
			<fieldset>
				<input type="submit" value="<?php _e('Send message','mtms'); ?>">
			</fieldset>
			<input type="hidden" name="send" value="true">
		</form>
	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>