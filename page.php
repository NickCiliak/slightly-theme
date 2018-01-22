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
 * @package slightly
 */

get_header(); ?>

<?php
    $slightly_thumb_id = get_post_thumbnail_id($post->ID);
    $feat_image = wp_get_attachment_url( $slightly_thumb_id );
    $alt = get_post_meta($slightly_thumb_id, '_wp_attachment_image_alt', true); ?>
<?php if( $feat_image ) : ?>
    <div class="pageBannerImage">
        <img src="<?php echo esc_url ( $feat_image ); ?>" alt="<?php echo esc_attr( $alt ); ?>" class="pageBannerImage__image">
    </div>
<?php endif; ?>

  <div class="row row--index">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

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
  </div>

<?php
get_footer();
