<?php
/**
 * Template Name: Homepage
 * Description: The front page
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

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
    </div> 

<div class="row">
    <?php recent_posts(3); ?>
</div>
  </div>

<?php
get_footer();
