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
      <?php if( get_theme_mod( 'hide_main_sidebar' ) == '1') { ?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php } else {?>
        <div class="col-xs-12">
      <?php } //end if ?>
			<header class="page-header">
				<h1 class="page-title"><?php 
                    /* translators: %s: search query. */
                    printf( esc_html__( 'Search Results for: %s', 'slightly' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->  
  </div>
</div>

  <div class="row">
      <?php if( get_theme_mod( 'hide_main_sidebar' ) == '1') { ?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php } else {?>
        <div class="col-xs-12 col-sm-7">
      <?php } //end if ?>

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
    <?php if( get_theme_mod( 'hide_main_sidebar' ) == '') { ?>
      <div class="col-xs-12 col-sm-4 col-sm-offset-1">
      <?php
get_sidebar(); ?>
      </div>
    <?php } // end if ?>
      
    </div>

<?php
get_footer();
