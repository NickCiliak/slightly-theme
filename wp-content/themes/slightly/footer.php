<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Slightly
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

  <div class="row">
    <div class="col-xs-12 col-sm-6">
        
		<div class="site-info">
            &copy; <?php echo date('Y') ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> • 
			<?php printf( esc_html__( '%1$s by %2$s.', 'Slightly' ), 'Slightly Theme', '<a href="http://nickciliak.com" rel="designer">Nick Ciliak</a>' ); ?>
		</div><!-- .site-info -->

    </div>
        <div class="col-xs-12 col-sm-6">
            <?php if ( is_active_sidebar( 'footer' ) ) : ?>
            <div id="footer-widget" class="footer-widget widget-area" role="complementary">
                <?php dynamic_sidebar( 'footer' ); ?>
            </div><!-- #primary-sidebar -->
            <?php endif; ?>
        </div>
    </div>
        
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

<script src="<?php echo get_template_directory_uri(); ?>/main.js"></script>

</body>
</html>
