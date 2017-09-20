<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Slightly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row no-pad">
      
        <?php if ( is_single() ) : ?>
            <div class="col-xs-12 no-pad">
                <header class="entry-header">
                    <?php
                        the_title( '<h1 class="entry-title">', '</h1>' );

                    if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta entry-meta--single">
                        <?php slightly_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<?php if( $feat_image ) : ?>
    <img src="<?php echo $feat_image; ?>" class="featured-image">
<?php endif; ?>
                    
                    <?php
                        the_content( sprintf(
                            /* translators: %s: Name of current post. */
                            wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'slightly' ), array( 'span' => array( 'class' => array() ) ) ),
                            the_title( '<span class="screen-reader-text">"', '"</span>', false )
                        ) );

                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slightly' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->
                <footer class="entry-footer">
                    <?php slightly_entry_footer(); ?>
                </footer><!-- .entry-footer -->
            </div>
        <?php else : ?>

        <div class="col-xs-12 col-sm-11 no-pad">
            <header class="entry-header">
                
                <svg width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg" class="smile">
                    <title>Smiley Face</title>
                    <g stroke-width="1.5" fill="none" fill-rule="evenodd" stroke-linecap="round">
                        <path d="M29.1283 15.3141c0 7.629-6.185 13.814-13.814 13.814-7.63 0-13.814-6.185-13.814-13.814 0-7.629 6.184-13.814 13.814-13.814 7.629 0 13.814 6.185 13.814 13.814z"/>
                        <path d="M25.5913 14.2015c.605 3.85-2.695 7.567-7.371 8.302-4.676.735-8.957-1.791-9.563-5.641M18.398 11.7526c-.177-1.123.591-2.177 1.714-2.353 1.123-.177 2.177.591 2.353 1.714M11.6689 12.8101c-.177-1.123.591-2.177 1.714-2.353 1.123-.177 2.177.591 2.353 1.714"/>
                    </g>
                </svg>
                
                <?php
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span></a></h2>' );

                if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta meta--up">
                    <a href=" <?php echo get_permalink() ?> "><?php slightly_posted_on(); ?></a>
                </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                
<?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <?php if( $feat_image ) : ?>
                    <a href=' <?php echo get_permalink() ?> '><img src="<?php echo $feat_image; ?>" class="featured-image"></a>
                <?php endif; ?>
                
            <?php
                    the_excerpt( sprintf(
                        /* translators: %s: Name of current post. */
                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'slightly' ), array( 'span' => array( 'class' => array() ) ) ),
                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slightly' ),
                        'after'  => '</div>',
                    ) );
                
                
                ?>
            </div><!-- .entry-content -->
        <footer class="entry-footer">
            <?php echo '<p><a href="' . get_permalink() . '" class="read-more-link">Read Post</a></p>'; ?>
            <div class="cats">
                <?php slightly_entry_footer(); ?>
            </div>
        </footer><!-- .entry-footer -->
            
        </div>

        </a>
        
        <?php endif; ?>
        
        
    </div><!-- end .row-->
</article><!-- #post-## -->
