<?php if(get_option('dt_activate_post_links') =='true') { ?>
<div class="box_links">
<?php get_template_part('inc/parts/single/listas/links'); ?>
<?php get_template_part('inc/parts/form_send_link'); ?>
</div>
<?php } ?>