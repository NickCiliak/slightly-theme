<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

			get_template_part( 'template-parts/content', get_post_format() );
            
            echo '<div class="row no-pad"><div class="col-xs-12 col-md-10 col-md-offset-1 no-pad"><div class="read-next"><h5>Read this next</h5><h2>' . get_previous_post_link('%link', '%title', TRUE) . '</h2></div></div></div>';
        
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
                echo '<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">';
				comments_template();
                echo '</div>';
			endif;
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
      <div class="col-xs-12">
      <?php
get_sidebar(); ?>
      </div>
      
    </div>

<?php
get_footer();
