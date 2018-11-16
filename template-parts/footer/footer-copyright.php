<?php
/**
 * Footer Copyright
 *
 * @version 1.0
 * @package GT Health
 */


// Check if there are footer copyright widgets.
if ( is_active_sidebar( 'footer-copyright' ) ) :
	?>

	<footer id="colophon" class="site-footer">

		<div id="footer-line" class="footer-main widget-area">

			<?php dynamic_sidebar( 'footer-copyright' ); ?>

		</div><!-- .footer-main -->

	</footer><!-- #colophon -->

	<?php
endif;
