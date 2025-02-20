<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nikkon
 */
$nikkon_image_cut = customizer_library_get_default( 'nikkon-blog-list-img-cut' );
if ( get_theme_mod( 'nikkon-blog-list-img-cut' ) ) {
	$nikkon_image_cut = get_theme_mod( 'nikkon-blog-list-img-cut' );
} ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( !is_archive() && get_theme_mod( 'nikkon-blog-layout' ) == 'blog-blocks-layout' || is_archive() && get_theme_mod( 'nikkon-blog-cats-blocks' ) == 1 ) : ?>
	
		<?php if ( get_theme_mod( 'nikkon-blog-blocks-style' ) == 'blog-style-imgblock' ) : ?>
	
			<div class="blog-post-blocks-inner <?php echo ( get_theme_mod( 'nikkon-blog-post-shape' ) ) ? sanitize_html_class( get_theme_mod( 'nikkon-blog-post-shape' ) ) : sanitize_html_class( 'blog-post-shape-square' ); ?>">
			    
			    <div class="blog-post-blocks-inner-img" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, $nikkon_image_cut ) ) . ');"' : ''; ?>>
			        
			        <?php if ( has_post_thumbnail() ) : ?>
			        	
			    	    <?php if ( get_theme_mod( 'nikkon-blog-post-shape' ) == 'blog-post-shape-img' ) : ?>
			    	    	<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $nikkon_image_cut ) ); ?>" alt="<?php the_title(); ?>" />
			    	    <?php else : ?>
			        		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
			        	<?php endif; ?>
				        	
			        <?php endif; ?>
			    	
			    </div>
			    
			    <a href="<?php echo esc_url( get_permalink() ); ?>" class="blog-post-blocks-inner-a">
			    	<div class="blog-blocks-content-inner">
			        	<header class="entry-header">
			        		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
			                
			                <?php if ( !get_theme_mod( 'nikkon-blog-blocks-remove-meta', false ) ) : ?>
			                    <?php if ( 'post' == get_post_type() ) : ?>
			                    <div class="entry-meta">
			                        <?php echo get_the_date(); ?>
			                    </div><!-- .entry-meta -->
			                    <?php endif; ?>
			                <?php endif; ?>
			        	</header><!-- .entry-header -->
			        </div>
				</a>
			    
			</div>
			
		<?php else : ?>
			
			<div class="blog-post-blocks-inner <?php echo ( get_theme_mod( 'nikkon-blog-post-shape' ) ) ? sanitize_html_class( get_theme_mod( 'nikkon-blog-post-shape' ) ) : sanitize_html_class( 'blog-post-shape-square' ); ?>">
			    
			    <div class="blog-post-blocks-inner-img" <?php echo ( has_post_thumbnail() ) ? 'style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $post->ID, $nikkon_image_cut ) ) . ');"' : ''; ?>>
			    	<a href="<?php echo esc_url( get_permalink() ); ?>">
					    
					    <?php if ( has_post_thumbnail() ) : ?>
				        	
				    	    <?php if ( get_theme_mod( 'nikkon-blog-post-shape' ) == 'blog-post-shape-img' ) : ?>
				    	    	<img src="<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, $nikkon_image_cut ) ); ?>" alt="<?php the_title(); ?>" />
				    	    <?php else : ?>
				        		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/blank_blocks_img.png" alt="<?php the_title(); ?>" />
				        	<?php endif; ?>
					        	
				        <?php endif; ?>
					
					</a>
				</div>
				
				<div class="blog-blocks-content">
					<header class="entry-header">
						<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
						
						<?php if ( !get_theme_mod( 'nikkon-blog-blocks-remove-meta', false ) ) : ?>
							<?php if ( 'post' == get_post_type() ) : ?>
							<div class="entry-meta">
								<?php nikkon_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php endif; ?>
						<?php endif; ?>
					</header><!-- .entry-header -->
					
					<?php if ( !get_theme_mod( 'nikkon-blog-blocks-remove-content', false ) ) : ?>
						<div class="blog-blocks-content-inner">
							
							<?php if ( has_excerpt( $post->ID ) ) : ?>
							    
							    <?php the_excerpt(); ?>
							    
							<?php else : ?>
							    
							    <?php
								the_content( sprintf(
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nikkon' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) ); ?>
							    
							<?php endif; ?>
								
					    </div>
				    <?php endif; ?>
				    
				    <?php if ( !get_theme_mod( 'nikkon-blog-blocks-remove-tagcats', false ) ) : ?>
					    <footer class="entry-footer">
							<?php nikkon_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</div>
				
			</div>
			
		<?php endif; ?>
	
	<?php else : ?>
		
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink() ?>" class="post-loop-thumbnail">
				
				<?php the_post_thumbnail( $nikkon_image_cut ); ?>
				
			</a>
		<?php endif; ?>
		
		<div class="post-loop-content">
			
			<header class="entry-header">
				<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php nikkon_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				if ( has_excerpt() ) :
					the_excerpt();
				else :
					/* translators: %s: Name of current post */
					the_content( sprintf(
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nikkon' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
				endif;
				?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nikkon' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<footer class="entry-footer">
				<?php nikkon_entry_footer(); ?>
			</footer><!-- .entry-footer -->
			
		</div>
		<div class="clearboth"></div>
		
	<?php endif; ?>
	
</article><!-- #post-## -->