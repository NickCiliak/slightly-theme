<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package slightly
 */

get_header(); ?>

<div class="row row--index">
    <div class="col-xs-12">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'slightly' ); ?></h1>
				</header><!-- .page-header -->

    </div>
</div>

  <div class="row">
    <div class="col-xs-12 col-sm-7">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'slightly' ); ?></p>

					<?php
						get_search_form();
					?>
			</section><!-- .error-404 -->

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
