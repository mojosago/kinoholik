</div>
<footer class="main">
<!--<a class="go-top"><i class="icon-angle-up"></i></a>-->
	<div class="fbox">
<?php  /* Menu footer */
	wp_nav_menu( array(
		'theme_location'  => 'footer',
		'container'       => 'div',
		'container_id'    => 'footer',
		'container_class' => 'fmenu',
		'menu_class'      => 'dt_menu_footer',
		'menu_id'         => 'footer_dt',
		'fallback_cb'     => false,
	) ); 
?>
		<div class="copy"><?php bloginfo('name'); ?> &copy; <?php echo date('Y'); ?> | </div>
	</div>
</footer>


</div>
<?php wp_footer(); ?><p></p>
<?php echo get_option('dt_footer_code'); ?>
<script>
 $(".reset").click(function(event){
    if (!confirm("<?php _e('Really you want to restart all data??','mtms'); ?>"))
       event.preventDefault();
});
	</body>
</html>



