<?php
/*
 * Template Name: Sidebar Page
 * Description: Page template with right sidebar
 */
get_header(); ?>

<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php if( $feat_image ) : ?>
    <div class="banner-image" style="background-image: url(<?php echo esc_url( $feat_image ); ?>);"></div>
<?php endif; ?>

<div class="row row--index">
    <div class="col-xs-12">
			<header class="page-header">
				<h2 class="h1 page-title"><?php echo get_the_title(); ?></h2>
			</header><!-- .page-header -->
    </div>
</div>

  <div class="row">
    <div class="col-xs-12 col-sm-7">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'sidebar-page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

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
