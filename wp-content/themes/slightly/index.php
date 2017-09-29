<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Slightly
 */

get_header(); ?>

<?php function page_featured_image() {
        $id = get_queried_object_id ();
        // Check if the post/page has featured image
        if ( has_post_thumbnail( $id ) ) {
            // Change thumbnail size, but I guess full is what you'll need
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' );
            $url = $image[0];
        } else {
            $url = 'undefined';
        }
    return $url;
} ?>
<?php if( page_featured_image() !== 'undefined' ) : ?>
<div class="banner-image" style="background-image: url(<?php echo page_featured_image();?>);"></div>
<?php endif; ?>

<div class="row row--index">
    <div class="col-xs-12">
			<header class="page-header">
				<h2 class="h1 page-title"><?php echo get_bloginfo( 'description' ); ?></h2>
			</header><!-- .page-header -->
    </div>
</div>
  <div class="row">
      <div class="col-xs-12 col-sm-7">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

            echo '<div class="row no-pad"><div class="col-xs-12 col-sm-11 no-pad">';
			the_posts_navigation();
            echo '</div></div>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
        
    </div>
  <div class="col-xs-12 col-sm-4 col-sm-offset-1">
      <?php
get_sidebar(); ?>
      </div>
      
  </div>

<?php
get_footer();