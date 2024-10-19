<?php
/**
 * Template Name: Gutenberg Template
 * Template Post Type: Post, Page
 */
get_header();
$page_title_disabled = get_post_meta( $post->ID, 'nikkon-meta-box-checkbox-title', true ); ?>
    
    <?php if ( ! $page_title_disabled ) : ?>
        <?php get_template_part( '/templates/titlebar' ); ?>
    <?php endif; ?>
    
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'templates/contents/content', 'page' ); ?>

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; ?>

    <?php endwhile; // end of the loop. ?>
    
<?php get_footer(); ?>