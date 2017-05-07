<?php get_header(); 
$dt = $_GET['action'];
?>
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
<?php if($dt =='list') { ?>
<h3><?php _e('My list','mtms'); ?></h3>


<?php 
if ( is_user_logged_in() ) { $user_id = get_current_user_id(); 
		$types = get_post_types( array( 'public' => true ) );
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		  'paged' => $paged,
		  'numberposts' => -1,
		  'orderby' => 'title',
		  'order'   => 'ASC',
		  'post_type' => $types,
	      'posts_per_page' => '70',
		  'meta_query' => array (
			array (
			  'key' => '_user_liked',
			  'value' => $user_id,
			  'compare' => 'LIKE'
			)
		  ) );		
		$sep = '';
		$list_query = new WP_Query( $args );
		if ( $list_query->have_posts() ) : while ( $list_query->have_posts() ) : $list_query->the_post(); ?>
			<?php get_template_part('inc/parts/simple_item'); ?>
		<?php endwhile; ?>
		<?php else : ?>
		<div class="no_fav"><?php _e( 'No content available on your list.', 'mtms' ); ?></div>
		<?php 
		endif; 
		wp_reset_postdata(); 
	} else {
		echo "No login";
	}

?>

<?php } elseif($dt =='list-movies') { ?>
<h3><?php _e('My Movies','mtms'); ?></h3>
<?php 
if ( is_user_logged_in() ) { $user_id = get_current_user_id(); 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		  'paged' => $paged,
		  'numberposts' => -1,
		  'orderby' => 'title',
		  'order'   => 'ASC',
		  'post_type' => 'movies',
	      'posts_per_page' => '70',
		  'meta_query' => array (
			array (
			  'key' => '_user_liked',
			  'value' => $user_id,
			  'compare' => 'LIKE'
			)
		  ) );		
		$sep = '';
		$list_query = new WP_Query( $args );
		if ( $list_query->have_posts() ) : while ( $list_query->have_posts() ) : $list_query->the_post(); ?>
			<?php get_template_part('inc/parts/simple_item'); ?>
		<?php endwhile; ?>
		<?php else : ?>
		<div class="no_fav"><?php _e( 'No content available on your list.', 'mtms' ); ?></div>
		<?php 
		endif; 
		wp_reset_postdata(); 
	} else {
		echo "No login";
	}

?>

<?php } elseif($dt =='list-tv') { ?>
<h3><?php _e('My TV Shows','mtms'); ?></h3>
<?php 
if ( is_user_logged_in() ) { $user_id = get_current_user_id(); 
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
		  'paged' => $paged,
		  'numberposts' => -1,
		  'orderby' => 'title',
		  'order'   => 'ASC',
		  'post_type' => 'tvshows',
	      'posts_per_page' => '70',
		  'meta_query' => array (
			array (
			  'key' => '_user_liked',
			  'value' => $user_id,
			  'compare' => 'LIKE'
			)
		  ) );		
		$sep = '';
		$list_query = new WP_Query( $args );
		if ( $list_query->have_posts() ) : while ( $list_query->have_posts() ) : $list_query->the_post(); ?>
			<?php get_template_part('inc/parts/simple_item'); ?>
		<?php endwhile; ?>
		<?php else : ?>
		<div class="no_fav"><?php _e( 'No content available on your list.', 'mtms' ); ?></div>
		<?php 
		endif; 
		wp_reset_postdata(); 
	} else {
		echo "No login";
	}

?>
<?php } else{ ?>
<h3><?php _e('Settings','mtms'); ?></h3>
<?php single_dt(); if (have_posts()) :while (have_posts()) : the_post(); ?>
<div itemprop="description" class="wp-content">
<?php the_content(); ?>
</div>
<?php endwhile; endif; ?>

<?php } ?>
	</div>
</div>
<?php get_footer(); ?>