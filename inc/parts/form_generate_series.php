<?php global $user_ID; if( $user_ID ) : if( current_user_can('administrator') ) : ?>
<div class="form_post_data">
	<form id="postdata" class="generador_form">
		<input type="text" id="tv" name="tv" placeholder="Themoviedb URL" required>
		<input type='submit' value='<?php _e('Import','mtms'); ?>'></input>
	</form>
	<div id="msg"><i class="icon-check-circle"></i> <?php _e('Generate data of themoviedb.org','mtms'); ?></div>
</div>
<script>
$(document).ready(function(){
    $('#postdata').submit(function(){
        $('#msg').html("<span class='loading'></span> <?php _e('Please wait, loading data...','mtms'); ?>");
		$( ".generador_form" ).last().addClass( "generate_ajax" );
        $.ajax({
            type: 'POST',
            url: '<?php echo get_template_directory_uri(); ?>/inc/api/serie.php', 
            data: $(this).serialize()
        })
        .done(function(data){
			location.reload();
        })
        .fail(function() {
            alert( "Error" );
        });
        return false;
    });
});
</script>
<?php endif; endif; ?>





