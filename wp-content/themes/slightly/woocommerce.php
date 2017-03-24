<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Slightly
 */

get_header(); ?>

<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php if( $feat_image ) : ?>
    <div class="banner-image" style="background-image: url(<?php echo $feat_image; ?>);"></div>
<?php endif; ?>

  <div class="row">
    <div class="col-xs-12">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php woocommerce_content(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
    </div>      
  </div>

<?php
get_footer();
