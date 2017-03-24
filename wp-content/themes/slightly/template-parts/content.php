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
            <div class="col-md-12">
                <header class="entry-header">
                    <?php
                    if ( is_single() ) :
                        the_title( '<h1 class="entry-title">', '</h1>' );
                    else :
                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                    endif;

                    if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <?php slightly_posted_on(); ?>
                    </div><!-- .entry-meta -->
                    <?php
                    endif; ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
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

        <div class="col-md-4">
            <div class="entry-content">
                <?php $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <?php if( $feat_image ) : ?>
                    <div class="post-thumb" style="background-image: url(<?php echo $feat_image; ?>);"></div>
                <?php endif; ?>

                <?php
//                    the_excerpt( sprintf(
//                        /* translators: %s: Name of current post. */
//                        wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'slightly' ), array( 'span' => array( 'class' => array() ) ) ),
//                        the_title( '<span class="screen-reader-text">"', '"</span>', false )
//                    ) );

                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slightly' ),
                        'after'  => '</div>',
                    ) );
                ?>
            </div><!-- .entry-content -->
        </div>
        
        <div class="col-md-8">
            <header class="entry-header">
                <?php
                if ( is_single() ) :
                    the_title( '<h1 class="entry-title">', '</h1>' );
                else :
                    the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                endif;

                if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta">
                    <?php slightly_posted_on(); ?>
                </div><!-- .entry-meta -->
                <?php
                endif; ?>
            </header><!-- .entry-header -->

        <footer class="entry-footer">
            <?php slightly_entry_footer(); ?>
        </footer><!-- .entry-footer -->
            
        </div>
        
        <?php endif; ?>
        
        
    </div><!-- end .row-->
</article><!-- #post-## -->
