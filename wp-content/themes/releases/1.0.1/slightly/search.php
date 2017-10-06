<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package slightly
 */

get_header(); ?>
<div class="row row--index">
  <div class="col-xs-12">

			<header class="page-header">
				<h1 class="page-title"><?php 
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'slightly' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->  
  </div>
</div>

  <div class="row">
    <div class="col-xs-12 col-sm-7">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
    </div>
      <div class="col-xs-12 col-sm-4 col-sm-offset-1">
      <?php
get_sidebar(); ?>
      </div>
      
    </div>

<?php
get_footer();
