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
			Disclosure • Contact Us
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
        
        
    <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" class="smile">
        <title>Smiley Face</title>
        <g stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linecap="round">
            <path d="M29.1283 15.3141c0 7.629-6.185 13.814-13.814 13.814-7.63 0-13.814-6.185-13.814-13.814 0-7.629 6.184-13.814 13.814-13.814 7.629 0 13.814 6.185 13.814 13.814z"/>
            <path d="M25.5913 14.2015c.605 3.85-2.695 7.567-7.371 8.302-4.676.735-8.957-1.791-9.563-5.641M18.398 11.7526c-.177-1.123.591-2.177 1.714-2.353 1.123-.177 2.177.591 2.353 1.714M11.6689 12.8101c-.177-1.123.591-2.177 1.714-2.353 1.123-.177 2.177.591 2.353 1.714"/>
        </g>
    </svg>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>

<script src="<?php echo get_template_directory_uri(); ?>/main.js"></script>

</body>
</html>
