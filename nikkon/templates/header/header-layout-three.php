<?php
/**
 * @package Nikkon
 */
global $woocommerce; ?>

<?php if ( !get_theme_mod( 'nikkon-header-remove-topbar' ) ) : ?>
	<div class="site-top-bar site-header-layout-three">
		
		<div class="site-container">
			
			<div class="site-top-bar-left">
				
				<?php wp_nav_menu( array( 'theme_location' => 'top-bar-menu', 'container_class' => 'nikkon-header-nav', 'fallback_cb' => false ) ); ?>
			
				<?php get_template_part( '/templates/social-links' ); ?>
				
			</div>
			
			<div class="site-top-bar-right">
				
				<?php if ( !get_theme_mod( 'nikkon-header-search' ) ) : ?>
					<div class="menu-search">
				    	<i class="fas fa-search search-btn"></i>
				    </div>
				<?php endif; ?>
				
				<?php if ( !get_theme_mod( 'nikkon-header-remove-no' ) ) : ?>
					<?php if ( get_theme_mod( 'nikkon-website-head-no' ) ) : ?>
						<span class="site-topbar-right-no"><?php echo ( get_theme_mod( 'nikkon-website-head-no-icon' ) ) ? '<i class="fas ' . sanitize_html_class( get_theme_mod( 'nikkon-website-head-no-icon' ) ) . '"></i> ' : ''; ?><?php echo wp_kses_post( get_theme_mod( 'nikkon-website-head-no' ) ) ?></span>
					<?php endif; ?>
				<?php endif; ?>
				
			</div>
			
			<?php if ( !get_theme_mod( 'nikkon-header-search' ) ) : ?>
			    <div class="search-block">
			        <?php get_search_form(); ?>
			    </div>
			<?php endif; ?>
			
			<div class="clearboth"></div>
		</div>
		
		<div class="clearboth"></div>
	</div>
<?php endif; ?>

<header id="masthead" class="site-header site-header-layout-three">
	
	<div class="site-container">
			
		<div class="site-branding">
			
			<?php
			$site_title_tag = get_theme_mod( 'nikkon-seo-site-title-tag', customizer_library_get_default( 'nikkon-seo-site-title-tag' ) );
			$site_desc_tag = get_theme_mod( 'nikkon-seo-site-desc-tag', customizer_library_get_default( 'nikkon-seo-site-desc-tag' ) );
			if ( has_custom_logo() ) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h<?php echo esc_attr( $site_title_tag ); ?> class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h<?php echo esc_attr( $site_title_tag ); ?>>
                <h<?php echo esc_attr( $site_desc_tag ); ?> class="site-description"><?php bloginfo( 'description' ); ?></h<?php echo esc_attr( $site_desc_tag ); ?>>
            <?php endif; ?>
			
		</div><!-- .site-branding -->
		
		<?php if ( get_theme_mod( 'nikkon-plugin-mega-menu' ) ) : ?>
			<nav class="main-navigation-mm">
			    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php else : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="header-menu-button"><i class="fas fa-bars"></i><span><?php echo esc_html( get_theme_mod( 'nikkon-header-menu-text', __( 'menu', 'nikkon' ) ) ); ?></span></button>
				<div id="main-menu" class="main-menu-container">
                    <div class="main-menu-inner">
                        <button class="main-menu-close"><i class="fas fa-angle-right"></i><i class="fas fa-angle-left"></i></button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        
                        <?php if ( nikkon_is_woocommerce_activated() ) : ?>
                            <?php if ( !get_theme_mod( 'nikkon-header-remove-cart' ) ) : ?>
                                <div class="header-cart">
                                    
                                    <a class="header-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'nikkon' ); ?>">
                                        <span class="header-cart-amount">
                                            <?php echo sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'nikkon' ), WC()->cart->get_cart_contents_count() ); ?><span> - <?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span>
                                        </span>
                                        <span class="header-cart-checkout <?php echo ( WC()->cart->get_cart_contents_count() > 0 ) ? sanitize_html_class( 'cart-has-items' ) : ''; ?>">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                    </a>
                                    
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
				</div>
			</nav><!-- #site-navigation -->
		<?php endif; ?>
		<div class="clearboth"></div>
		
	</div>
		
</header><!-- #masthead -->