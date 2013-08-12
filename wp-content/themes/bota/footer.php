<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Bota
 * @since Bota 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
    
    <div class="section group">
	<div class="col span_1_of_3">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('left_column')) : else : ?>
			<div class="widget">
            <h4><strong>Widget Ready</strong></h4>
			<p>This left column is widget ready! Add one in the admin panel.</p>
            </div>
		<?php endif; ?>
	</div>
	<div class="col span_1_of_3">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('center_column')) : else : ?>
			<div class="widget">
            <h4><strong>Widget Ready</strong></h4>
			<p>This center column is widget ready! Add one in the admin panel.</p>
            </div>
		<?php endif; ?>
	</div>
	<div class="col span_1_of_3">
	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('right_column')) : else : ?>
    		<div class="widget">
			<h4><strong>Widget Ready</strong></h4>
			<p>This right_column is widget ready! Add one in the admin panel.</p>
            </div>
		<?php endif; ?>
	</div>
    </div>
		<div class="site-info">
			<?php printf( __( 'Powered by %1$s. %2$s theme by %3$s.', 'bota' ),'<a href="http://wordpress.org/" target="_blank">WordPress</a>', '<a href="http://dundee.biz/bota" target="_blank">Bota</a>', 'Ossie' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
</div><!-- end of wrapper -->
<?php wp_footer(); ?>

</body>
</html>