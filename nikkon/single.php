<?php
/**
 * The template for displaying all single posts.
 *
 * @package Nikkon
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'templates/contents/content', 'single' ); ?>

			<?php if ( !get_theme_mod( 'nikkon-blog-single-remove-pag' ) ) : ?>
				<?php the_post_navigation(); ?>
			<?php endif; ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
	
	<div class="clearboth"></div>
	
<?php get_footer(); ?>