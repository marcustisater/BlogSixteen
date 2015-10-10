<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogSixteen
 */

?>

	</div><!-- #content -->
 </div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div id="footer-widgets">
			<div class="footer-widget-container">
				<div class="footer-widget-left">
				<?php
				if(is_active_sidebar('sidebar-footer-1')){
					dynamic_sidebar('sidebar-footer-1');
				} ?>
				</div>
				<div class="footer-widget-right">
					<?php
					if(is_active_sidebar('sidebar-footer-2')){
						dynamic_sidebar('sidebar-footer-2');
					}?>
				</div>
			</div>
		</div>

		<div class="footer-content">
			<a href="#top" class="scrollToTop icon-chevron-up"> </a>
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'blogsixteen' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'blogsixteen' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s', 'blogsixteen' ), 'blogsixteen', ''); ?>
			</div><!-- .site-info -->
			<?php wp_footer(); ?>
		</div>

	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
