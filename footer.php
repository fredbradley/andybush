<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */

?>

				</div><!-- #content -->
			</div>
		</div>
	</div><!-- #bush-page-content -->
	
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<section class="row" role="complementary">
		<?php
			$array = array("footer-widgets-1", "footer-widgets-2", "footer-widgets-3", "footer-widgets-4");
			foreach ($array as $widget):
			if (is_active_sidebar($widget)): ?>
			<div class="col-md-3" >
				<?php dynamic_sidebar( $widget ); ?>
			</div><!-- #secondary -->
		<?php endif;
			endforeach; ?>
			</section>

			
		</div>
	</footer><!-- #colophon -->
	<div class="site-copyright">
				a <a href="<?php echo esc_url( __( 'http://www.fredbradley.uk/', '_s' ) ); ?>">Fred Bradley</a> website, <a target="_blank" href="http://www.wordpress.org">powered by Wordpress</a>
				<span class="sep"> | </span>
				<?php echo copyright(); ?>
			</div><!-- .site-info -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
