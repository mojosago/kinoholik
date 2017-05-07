<?php
function info_movie_add_meta_box() {
	add_meta_box(
		'mt_metabox',
		__('Movie Info', 'mtms'),
		'info_movie_html',
		'movies',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'info_movie_add_meta_box' );
function info_movie_html( $post) {
wp_nonce_field( '_info_movie_nonce', 'info_movie_nonce' ); ?>
<table class="options-table-responsive dt-options-table">
	<tbody>
	<?php if(dttp == "valid") { ?>
	<tr id="ids_box">
		<td class="label">
			<label for="ids"><?php _e( 'Generate data', 'mtms' ); ?></label>
			<p class="description"><?php _e('Generate data from <strong>imdb.com</strong>','mtms'); ?></p>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="ids" id="ids" placeholder="tt2911666" value="<?php echo dt_get_meta( 'ids' ); ?>">
			<input type="button" class="button button-primary" name="Checkbx" value="<?php if(dt_get_meta( 'ids' )){ _e('Update data','mtms'); } else { _e('Generate','mtms'); } ?>">
			<p class="description"><?php _e('E.g. http://www.imdb.com/title/<strong>tt2911666</strong>/','mtms'); ?></p>
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3><?php _e( 'Images and trailer', 'mtms' ); ?></h3></td>
	</tr>
	<?php } ?>
	<tr id="dt_poster_box">
		<td class="label">
			<label for="dt_poster"><?php _e( 'Poster', 'mtms' ); ?></label>
			<p class="description"><?php _e('Add url image','mtms'); ?></p>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="dt_poster" id="dt_poster" value="<?php echo dt_get_meta( 'dt_poster' ); ?>">
			<input class="up_images_poster button-secondary" type="button" value="<?php _e('Upload', 'mtms'); ?>" />
		</td>
	</tr>
	<tr id="dt_backdrop_box">
		<td class="label">
			<label for="dt_backdrop"><?php _e( 'Main Backdrop', 'mtms' ); ?></label>
			<p class="description"><?php _e('Add url image','mtms'); ?></p>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="dt_backdrop" id="dt_backdrop" value="<?php echo dt_get_meta( 'dt_backdrop' ); ?>">
			<input class="up_images_backdrop button-secondary" type="button" value="<?php _e('Upload', 'mtms'); ?>" />
		</td>
	</tr>
	<tr id="imagenes_box">
		<td class="label">
			<label for="imagenes"><?php _e( 'Backdrops', 'mtms' ); ?></label>
			<p class="description"><?php _e('Place each image url below another','mtms'); ?></p>
		</td>
		<td class="field">
			<textarea name="imagenes" id="imagenes" rows="5"><?php echo dt_get_meta( 'imagenes' ); ?></textarea>
			<input class="up_images_images button-secondary" type="button" value="<?php _e('Upload', 'mtms'); ?>" />
		</td>
	</tr>
	<tr id="youtube_id_box">
		<td class="label">
			<label for="youtube_id"><?php _e( 'Video trailer', 'mtms' ); ?></label>
			<p class="description"><?php _e( 'Add id Youtube video', 'mtms' ); ?></p>
		</td>
		<td class="field">
			<input class="small-text" type="text" name="youtube_id" id="youtube_id" value="<?php echo dt_get_meta( 'youtube_id' ); ?>">
			<p class="description"><?php _e('[id_video_youtube]','mtms'); ?></p>
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3><?php _e('IMDb.com data','mtms'); ?></h3></td>
	</tr>
	<tr id="rating_imdb_box">
		<td class="label">
			<label for="imdbRating"><?php _e( 'Rating IMDb', 'mtms' ); ?></label>
			<p class="description"><?php _e( 'Average / votes', 'mtms' ); ?></p>
		</td>
		<td class="field">
			<input class="extra-small-text" type="text" name="imdbRating" id="imdbRating" value="<?php echo dt_get_meta( 'imdbRating' ); ?>"> - 
			<input class="extra-small-text" type="text" name="imdbVotes" id="imdbVotes" value="<?php echo dt_get_meta( 'imdbVotes' ); ?>">
		</td>
	</tr>
	<tr id="Rated_box">
		<td class="label">
			<label for="Rated"><?php _e('Rated','mtms'); ?></label>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="Rated" id="Rated" value="<?php echo dt_get_meta( 'Rated' ); ?>">
		</td>
	</tr>
	<tr id="Country_box">
		<td class="label">
			<label for="Country"><?php _e('Country','mtms'); ?></label>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="Country" id="Country" value="<?php echo dt_get_meta( 'Country' ); ?>">
		</td>
	</tr>
	<tr>
		<td colspan="2"><h3><?php _e('Themoviedb.org data','mtms'); ?></h3></td>
	</tr>

	<tr id="original_title_box">
		<td class="label">
			<label for="original_title"><?php _e( 'Original title', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="original_title" id="original_title" value="<?php echo dt_get_meta( 'original_title' ); ?>">
		</td>
	</tr>
	<tr id="tagline_box">
		<td class="label">
			<label for="tagline"><?php _e( 'Tag line', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<input class="regular-text" type="text" name="tagline" id="tagline" value="<?php echo dt_get_meta( 'tagline' ); ?>">
		</td>
	</tr>
	<tr id="release_date_box">
		<td class="label">
			<label for="release_date"><?php _e( 'Release Date', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<input class="small-text" type="date" name="release_date" id="release_date" value="<?php echo dt_get_meta( 'release_date' ); ?>">
		</td>
	</tr>
	<tr id="rating_tmdb_box">
		<td class="label">
			<label for="vote_average"><?php _e( 'Rating TMDb', 'mtms' ); ?></label>
			<p class="description"><?php _e( 'Average / votes', 'mtms' ); ?></p>
		</td>
		<td class="field">
			<input class="extra-small-text" type="text" name="vote_average" id="vote_average" value="<?php echo dt_get_meta( 'vote_average' ); ?>"> - 
			<input class="extra-small-text" type="text" name="vote_count" id="vote_count" value="<?php echo dt_get_meta( 'vote_count' ); ?>">
		</td>
	</tr>
	<tr id="runtime_box">
		<td class="label">
			<label for="runtime"><?php _e( 'Runtime', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<input class="small-text" type="text" name="runtime" id="runtime" value="<?php echo dt_get_meta( 'runtime' ); ?>">
		</td>
	</tr>
	<tr id="dt_cast_box">
		<td class="label">
			<label for="dt_cast"><?php _e( 'Cast', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<textarea rows="5" name="dt_cast" id="dt_cast"><?php echo dt_get_meta( 'dt_cast' ); ?></textarea>
		</td>
	</tr>
	<tr id="dt_dir_box">
		<td class="label">
			<label for="dt_dir"><?php _e( 'Director', 'mtms' ); ?></label>
		</td>
		<td class="field">
			<input type="text" name="dt_dir" id="dt_dir" value="<?php echo dt_get_meta( 'dt_dir' ); ?>">
		</td>
	</tr>
	</tbody>
</table>
<input type="hidden" id="dt_string" name="dt_string" value="<?php echo dt_get_meta( 'dt_string' ); ?>">
<?php if (has_post_thumbnail()): else: echo '<input type="hidden" id="url_image_upload" name="url_image_upload" value="">'; endif; ?>
<?php }
function info_movie_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['info_movie_nonce'] ) || ! wp_verify_nonce( $_POST['info_movie_nonce'], '_info_movie_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
/*  Guardar datos */
    if ( isset( $_POST['ids'] ) ) update_post_meta( $post_id, 'ids', esc_attr( $_POST['ids'] ) );
	if ( isset( $_POST['dt_poster'] ) ) update_post_meta( $post_id, 'dt_poster', esc_attr( $_POST['dt_poster'] ) );
	if ( isset( $_POST['dt_backdrop'] ) ) update_post_meta( $post_id, 'dt_backdrop', esc_attr( $_POST['dt_backdrop'] ) );
	if ( isset( $_POST['imagenes'] ) ) update_post_meta( $post_id, 'imagenes', esc_attr( $_POST['imagenes'] ) );
	if ( isset( $_POST['youtube_id'] ) ) update_post_meta( $post_id, 'youtube_id', esc_attr( $_POST['youtube_id'] ) );
	if ( isset( $_POST['imdbRating'] ) ) update_post_meta( $post_id, 'imdbRating', esc_attr( $_POST['imdbRating'] ) );
	if ( isset( $_POST['imdbVotes'] ) ) update_post_meta( $post_id, 'imdbVotes', esc_attr( $_POST['imdbVotes'] ) );
	if ( isset( $_POST['original_title'] ) ) update_post_meta( $post_id, 'original_title', esc_attr( $_POST['original_title'] ) );
	if ( isset( $_POST['Rated'] ) ) update_post_meta( $post_id, 'Rated', esc_attr( $_POST['Rated'] ) );
	if ( isset( $_POST['release_date'] ) ) update_post_meta( $post_id, 'release_date', esc_attr( $_POST['release_date'] ) );
	if ( isset( $_POST['runtime'] ) ) update_post_meta( $post_id, 'runtime', esc_attr( $_POST['runtime'] ) );
	if ( isset( $_POST['Country'] ) ) update_post_meta( $post_id, 'Country', esc_attr( $_POST['Country'] ) );
	if ( isset( $_POST['vote_average'] ) ) update_post_meta( $post_id, 'vote_average', esc_attr( $_POST['vote_average'] ) );
	if ( isset( $_POST['vote_count'] ) ) update_post_meta( $post_id, 'vote_count', esc_attr( $_POST['vote_count'] ) );
	if ( isset( $_POST['tagline'] ) ) update_post_meta( $post_id, 'tagline', esc_attr( $_POST['tagline'] ) );
	if ( isset( $_POST['dt_string'] ) ) update_post_meta( $post_id, 'dt_string', esc_attr( $_POST['dt_string'] ) );
	if ( isset( $_POST['dt_cast'] ) ) update_post_meta( $post_id, 'dt_cast', esc_attr( $_POST['dt_cast'] ) );
	if ( isset( $_POST['dt_dir'] ) ) update_post_meta( $post_id, 'dt_dir', esc_attr( $_POST['dt_dir'] ) );
	if (has_post_thumbnail()): else:  if($data = $_POST['url_image_upload']) {  dt_upload_image( $data,   $post_id ); } endif;
}
if(dttp == "valid") { 
	add_action( 'save_post', 'info_movie_save' ); 
}
function custom_admin_js() {  global $post_type; if( $post_type == 'movies' ) { ?>
<script>
// Generar datos
jQuery('input[name=Checkbx]').click(function() {
    var coc = jQuery('input[name=ids]').get(0).value;
    // Send Request
    jQuery.getJSON("//www.omdbapi.com/?i=" + coc + "", function(data) {
        jQuery.each(data, function(key, val) {
            jQuery('input[name=' + key + ']').val(val);
            if (key == "Year") {
                jQuery('#new-tag-dtyear').val(val);
            }
        });

    });
});
jQuery('input[name=Checkbx]').click(function() {
    var input = jQuery('input[name=ids]').get(0).value;
    var url = "https://api.themoviedb.org/3/movie/";
    var agregar = "?append_to_response=images,trailers";
    var idioma = "&language=<?php echo get_option('dt_api_language','en'); ?>&include_image_language=<?php echo get_option('dt_api_language','en'); ?>,null";
    var apikey = "&api_key=<?php echo get_option('dt_api_key'); ?>";
    // Send Request
    jQuery.getJSON(url + input + agregar + idioma + apikey, function(tmdbdata) {
        var valTit = "";
        var valPlo = "";
        var valImg = "";
        var valBac = "";
		var valupimg = "";
        jQuery.each(tmdbdata, function(key, val) {
            jQuery('input[name=' + key + ']').val(val);
		
			jQuery('#message').remove();
            jQuery('#postbox-container-2').prepend('<div id=\"message\" class=\"notice rebskt updated \"><p><?php if(dt_get_meta( 'ids' )){ _e("The data have been updated, check please","mtms"); } else { _e("Data were completed, check please","mtms"); } ?></p></div>');

            if (key == "title") {
				jQuery('label#title-prompt-text').addClass('screen-reader-text');
				jQuery('input[name=post_title]').val(val);
            }
            if (key == "id") {
                jQuery('#dt_string').val(val);
            }
            if (key == "overview") {
				if (typeof tinymce != "undefined") {
					var editor = tinymce.get('content');
					if (editor && editor instanceof tinymce.Editor) {
						editor.setContent(val);
						editor.save({
							no_events: true
						});
					} else {
						jQuery('textarea#content').val(val);
					}
				}
            }
            if (key == "poster_path") {
                jQuery('input[name="dt_poster"]').val(val);
            }
            if (key == "backdrop_path") {
                jQuery('input[name="dt_backdrop"]').val(val);
            }
			if(key == "poster_path"){
				valupimg+= "https://image.tmdb.org/t/p/w396"+val+"";
				jQuery('#url_image_upload').val(valupimg);
				<?php if( get_option( 'dt_api_upload_poster' ) == 'true' ) { if (has_post_thumbnail()): else: ?>
				jQuery('#postimagediv p').html("<ul><li><img class='dt_poster_preview' src='"+ valupimg +"'/> </li></ul>");
				<?php endif; } ?>
			}
            <?php $api = get_option('dt_api_genres'); if ($api == "true") { ?>
            if (key == "genres") {
                var genr = "";
                jQuery.each(tmdbdata.genres, function(i, item) {
                    genr += "" + item.name + ", ";
                    genr1 = item.name;
                    jQuery('input[name=newgenres]').val(genr1);
                    jQuery('#genres-add-submit').trigger('click');
                    jQuery('#genres-add-submit').prop("disabled", false);
                    jQuery('input[name=genres]').val("");
                });
                jQuery('input[name=' + key + ']').val(genr);
            }
            <?php } ?>
            if (key == "trailers") {
                var tral = "";
                jQuery.each(tmdbdata.trailers.youtube, function(i, item) {
					if(i>0) return false;
                    tral += "[" + item.source + "]";
                });
                jQuery('input[name="youtube_id"]').val(tral);
            }
            if (key == "images") {
                var imgt = "";
                jQuery.each(tmdbdata.images.backdrops, function(i, item) {
					if(i>9) return false;
                    imgt += item.file_path + "\n";
                });
                jQuery('textarea[name="imagenes"]').val(imgt);
            }
            jQuery.getJSON(url + input + "/credits?" + apikey, function(tmdbdata) {
                jQuery.each(tmdbdata, function(key, val) {
                    if (key == "cast") {
                        var cstm = cstml = "";
                        jQuery.each(tmdbdata.cast, function(i, item) {
							if(i>9) return false;
                            cstm += "[" + item.profile_path + ";" + item.name + "," + item.character + "]";
                            cstml += "" + item.name + ", "; //
                        });
                        jQuery('textarea[name="dt_cast"]').val(cstm);
                        var valCast = "";
                        jQuery.each(tmdbdata.cast, function(i, item) {
							if(i>9) return false;
                            valCast += "" + item.name + ", "; //
                        });
                        jQuery('#new-tag-dtcast').val(valCast);
                    } else {
                        var crew_d = crew_dl = "";
                        var crew_w = crew_wl = "";
                        jQuery.each(tmdbdata.crew, function(i, item) {
                            if (item.department == "Directing") {
                                crew_d += "[" + item.profile_path + ";" + item.name + "]";
                                crew_dl += "" + item.name + ", "; //
                            }
                        });
                        jQuery('input[name=dt_dir]').val(crew_d);
                        jQuery('#new-tag-dtdirector').val(crew_dl);

                    }
                });
            });
        });
    });
});
</script>
<?php 
} }
add_action('admin_footer', 'custom_admin_js');
