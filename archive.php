<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package slightly
 */

get_header(); ?>

		<?php
		if ( have_posts() ) : ?>
<div class="row row--index">
      <?php if( get_theme_mod( 'hide_main_sidebar' ) == '1') { ?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php } else {?>
        <div class="col-xs-12">
      <?php } //end if ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
    </div>
</div>
      <?php endif; ?>

  <div class="row">
      
      <?php if( get_theme_mod( 'hide_main_sidebar' ) == '1') { ?>
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <?php } else {?>
        <div class="col-xs-12 col-sm-7">
      <?php } //end if ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
    </div>
    <?php if( get_theme_mod( 'hide_main_sidebar' ) == '') { ?>
    <div class="col-xs-12 col-sm-4 col-sm-offset-1">
        <?php
  get_sidebar(); ?>
        </div>

    </div>
  <?php } // end if ?>

<?php
get_footer();
