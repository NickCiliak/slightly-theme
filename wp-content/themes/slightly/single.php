<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Slightly
 */

get_header(); ?>

  <div class="row row--index">
    <div class="col-xs-12 col-sm-7">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

            if(get_previous_post_link()) {
            echo '<div class="row no-pad"><div class="col-xs-12 no-pad"><div class="read-next"><h5>Read this next</h5><h2>' . get_previous_post_link('%link', '%title', TRUE) . '</h2></div></div></div>';
            }
        
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
                echo '<div class="col-xs-12 no-pad">';
				comments_template();
                echo '</div>';
			endif;
		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
      
        <div class="col-xs-12 col-sm-4 col-sm-offset-1 no-pad">
      <?php
get_sidebar(); ?>
      </div>

    </div>

<?php
get_footer();
