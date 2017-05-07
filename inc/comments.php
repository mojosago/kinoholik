<?php
// Comments lists
function dt_comments_args( $args = array() ){
	$comments_args = array(
		'avatar_size' => 60,
		'style' => 'ul',
		'callback' => 'dt_theme_comment_template'
	);
	return wp_parse_args( $args, $comments_args );
}
function dt_theme_comment_template($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	$tag =  ( 'div' == $args['style'] ) ? 'div' : 'li';
	$add_below = 'comment-inner';
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<div class="comment-avatar">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	</div>
	<div class="scontent">
		<div id="comment-inner-<?php comment_ID() ?>">
			<div class="comment-header">
				<?php 
					if( $comment->user_id > 0 ){
						echo '<a class="commautor" href="'. get_author_posts_url( $comment->user_id ) .'" target="_blank">'. get_user_option( 'display_name', $comment->user_id ) .'</a>';
					}
					else{
						printf( __( '%s', 'mtms' ), get_comment_author_link() );
					}
				?>
				<?php  ?>
				<span class="comment-time"><?php printf( __('%1$s', 'mtms'), get_comment_date() ); ?></span>
				<?php 
					comment_reply_link( array_merge( $args, 
						array( 
							'add_below' => $add_below, 
							'depth' => $depth, 
							'max_depth' => $args['max_depth'] 
						) 
					) ); 
				?>
			</div>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="text-red"><?php _e( 'Your comment is awaiting moderation.', 'mtms' ); ?></em>
			<?php } ?>
			<?php comment_text(); ?>
		</div>
	</div>
<?php }
// Form comments
function dt_theme_comments_args(){
	$commenter = wp_get_current_commenter();
	$required =  ' <em class="text-red" title="'. __('Required', 'mtms') .'">*</em>';
	$comments_args = array(
		'label_submit' => __('Post comment', 'mtms'),
		'title_reply' => __('Leave a comment','mtms'),
		'logged_in_as' => '',
		'comment_notes_after' => '',
		'comment_notes_before' => '',
		'comment_field' => '
			<div class="comment-form-comment">
				<textarea id="comment" name="comment" required="true" class="normal" placeholder="'. __('Your comment..','mtms') .'"></textarea>
			</div>
			',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '
				<div class="grid-container">
					<div class="grid desk-8 alpha">
						<div class="form-label">'. __('Name', 'mtms') .' '. $required .'</div>
						<div class="form-description">'. __('Add a display name', 'mtms') .'</div>
						<input name="author" type="text" class="fullwidth" value="'. esc_attr( $commenter['comment_author'] ) .'" required="true"/>
					</div>
				</div>',
			'email' => '
				<div class="grid-container fix-grid">
					<div class="grid desk-8 alpha">
						<div class="form-label">'. __('Email', 'mtms') .' '. $required .'</div>
						<div class="form-description">'. __('Your email address will not be published', 'mtms') .'</div>
						<input name="email" type="text" class="fullwidth" value="'. esc_attr( $commenter['comment_author_email'] ) .'" required="true"/>
					</div>
				</div>',
			 'url' => '
				<div class="grid-container fixedform">
					<div class="grid desk-8 alpha">
						<div class="form-label">'. __('Website', 'mtms') .'</div>
						<input name="url" type="text" placeholder="http://" class="fullwidth" value="'. esc_attr( $commenter['comment_author_url'] ) .'"/>
					</div>
				</div>', 
			)
		),
	);
	return $comments_args;
}