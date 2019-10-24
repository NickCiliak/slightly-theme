<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package slightly
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

  <div class="row">
    <div class="col-xs-12">
        
		<div class="site-info">
            &copy; <?php echo intval( date_i18n(__('Y','slightly')) ) ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &bull; <?php 
                /* translators: 1: Theme name */
                printf( esc_html__( '%1$s', 'slightly' ), '<a href="https://slightlytheme.com/?ref=footer">Slightly Theme</a>' ); ?>
		</div><!-- .site-info -->

    </div>
    </div>
        
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
