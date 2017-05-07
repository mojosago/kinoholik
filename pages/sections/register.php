<div class="form_dt_user">
	<header>
		<h1><?php  _e("Sign up, it's free..","mtms"); ?></h1>
	</header>
	<?php do_action ('dt_register_form'); ?>
	<?php if($_GET['form'] == 'send') { /* none */ } else { get_template_part('pages/sections/register-form'); } ?>
</div>