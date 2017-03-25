<?php
/**
 * Template Name: Posts Style 2
 * Description: Another style
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
        
            <h1><?php wp_title(''); ?></h1>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

        <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>

	<?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

	    <div id="post-<?php get_the_ID(); ?>" <?php post_class(); ?>>

        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array(200,220) ); ?></a>

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                <span class="meta"><?php author_profile_avatar_link(48); ?> <strong><?php the_time('F jS, Y'); ?></strong> / <strong><?php the_author_link(); ?></strong> / <span class="comments"><?php comments_popup_link(__('0 comments','example'),__('1 comment','example'),__('% comments','example')); ?></span></span>

		<?php the_excerpt(__('Continue reading »','example')); ?>

            </div><!-- /#post-<?php get_the_ID(); ?> -->

        <?php endwhile; ?>

		<div class="navigation">
			<span class="newer"><?php previous_posts_link(__('« Newer','example')) ?></span> <span class="older"><?php next_posts_link(__('Older »','example')) ?></span>
		</div><!-- /.navigation -->

	<?php else: ?>

		<div id="post-404" class="noposts">

		    <p><?php _e('None found.','example'); ?></p>

	    </div><!-- /#post-404 -->

	<?php endif; wp_reset_query(); ?>
            

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