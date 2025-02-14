<?php
/**
 * nikkon functions and definitions
 *
 * @package Nikkon
 */
define( 'NIKKON_THEME_VERSION' , '1.2.02' );

// Get help / Premium Page
require get_template_directory() . '/upgrade/upgrade.php';

// Load WP included scripts
require get_template_directory() . '/includes/inc/template-tags.php';
require get_template_directory() . '/includes/inc/extras.php';
require get_template_directory() . '/includes/inc/jetpack.php';

// Load Customizer Library scripts
require get_template_directory() . '/customizer/customizer-options.php';
require get_template_directory() . '/customizer/customizer-library/customizer-library.php';
require get_template_directory() . '/customizer/styles.php';
require get_template_directory() . '/customizer/mods.php';

// Load TGM plugin class
require_once get_template_directory() . '/includes/inc/class-tgm-plugin-activation.php';
// Add customizer Upgrade class
require_once( get_template_directory() . '/includes/nikkon-pro/class-customize.php' );

if ( ! function_exists( 'nikkon_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nikkon_setup() {
	
	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900; /* pixels */
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on nikkon, use a find and replace
	 * to change 'nikkon' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nikkon', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'nikkon_blog_img_side', 500, 380, true );
    add_image_size( 'nikkon_blog_img_top', 1200, 440, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'top-bar-menu' => esc_html__( 'Top Bar Menu', 'nikkon' ),
		'primary' => esc_html__( 'Main Menu', 'nikkon' ),
		'primary-left' => esc_html__( 'Split Header Left Menu', 'nikkon' ),
		'primary-right' => esc_html__( 'Split Header Right Menu', 'nikkon' ),
        'footer-bar' => esc_html__( 'Footer Bar Menu', 'nikkon' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enqueue editor styles
	add_editor_style( 'style-theme-editor.css' );

	// Gutenberg Support
	add_theme_support( 'align-wide' );
	
	// The custom logo
	add_theme_support( 'custom-logo', array(
		'width'       => 280,
		'height'      => 145,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nikkon_custom_background_args', array(
		'default-color' => 'F9F9F9',
	) ) );
	
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
endif; // nikkon_setup
add_action( 'after_setup_theme', 'nikkon_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nikkon_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nikkon' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar(array(
		'name' => __( 'Nikkon Footer Standard', 'nikkon' ),
		'id' => 'nikkon-site-footer-standard',
        'description' => __( 'The footer will divide into however many widgets are placed here.', 'nikkon' )
	));
}
add_action( 'widgets_init', 'nikkon_widgets_init' );

/*
 * Change Widgets Title Tags for SEO
 */
function nikkon_change_widget_titles( array $params ) {
	$widget_title_tag = get_theme_mod( 'nikkon-seo-widget-title-tag', customizer_library_get_default( 'nikkon-seo-widget-title-tag' ) );
    $widget =& $params[0];
    $widget['before_title'] = '<h'.esc_attr( $widget_title_tag ).' class="widget-title">';
    $widget['after_title'] = '</h'.esc_attr( $widget_title_tag ).'>';
    return $params;
}
add_filter( 'dynamic_sidebar_params', 'nikkon_change_widget_titles', 20 );

/**
 * Enqueue scripts and styles.
 */
function nikkon_scripts() {
	if ( !get_theme_mod( 'nikkon-disable-google-fonts', customizer_library_get_default( 'nikkon-disable-google-fonts' ) ) ) {
		wp_enqueue_style( 'nikkon-body-font-default', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic', array(), NIKKON_THEME_VERSION );
		wp_enqueue_style( 'nikkon-heading-font-default', '//fonts.googleapis.com/css?family=Dosis:400,300,500,600,700', array(), NIKKON_THEME_VERSION );
	}
	
	wp_enqueue_style( 'nikkon-font-awesome', get_template_directory_uri().'/includes/font-awesome/css/all.min.css', array(), '5.11.2' );
	wp_enqueue_style( 'nikkon-style', get_stylesheet_uri(), array(), NIKKON_THEME_VERSION );
	
	if ( nikkon_is_woocommerce_activated() ) :
		wp_enqueue_style( 'nikkon-woocommerce-style', get_template_directory_uri()."/includes/css/woocommerce.css", array(), NIKKON_THEME_VERSION );
	endif;
	
	wp_enqueue_script( 'caroufredsel-js', get_template_directory_uri() . "/js/caroufredsel/jquery.carouFredSel-6.2.1-packed.js", array('jquery'), NIKKON_THEME_VERSION, true );
	wp_enqueue_script( 'nikkon-custom-js', get_template_directory_uri() . "/js/custom.js", array('jquery'), NIKKON_THEME_VERSION, true );
	
	if ( get_theme_mod( 'nikkon-blog-layout' ) == 'blog-blocks-layout' ) :
		wp_enqueue_script( 'jquery-masonry' );
        wp_enqueue_script( 'nikkon-masonry-custom', get_template_directory_uri() . '/js/layout-blocks.js', array('jquery'), NIKKON_THEME_VERSION, true );
	endif;
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nikkon_scripts' );

/**
 * Fix skip link focus in IE11. Too small to load as own script
 */
function nikkon_custom_footer_scripts() {
	// The following is minified via 'terser --compress --mangle -- js/skip-link-focus-fix.js' ?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script><?php
}
add_action( 'wp_print_footer_scripts', 'nikkon_custom_footer_scripts' );

/**
 * To maintain backwards compatibility with older versions of WordPress
 */
function nikkon_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

/**
 * Enqueue admin styling.
 */
function nikkon_load_admin_script( $hook ) {
	wp_enqueue_style( 'nikkon-admin-css', get_template_directory_uri() . '/upgrade/css/admin-css.css' );
}
add_action( 'admin_enqueue_scripts', 'nikkon_load_admin_script' );

/**
 * Enqueue Nikkon custom customizer styling.
 */
function nikkon_load_customizer_script() {
	wp_enqueue_script( 'nikkon-customizer-js', get_template_directory_uri() . '/customizer/customizer-library/js/customizer-custom.js', array('jquery'), NIKKON_THEME_VERSION, true );
    wp_enqueue_style( 'nikkon-customizer-css', get_template_directory_uri() . '/customizer/customizer-library/css/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'nikkon_load_customizer_script' );

/**
 * Check if WooCommerce exists.
 */
if ( ! function_exists( 'nikkon_is_woocommerce_activated' ) ) :
	function nikkon_is_woocommerce_activated() {
	    if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif; // nikkon_is_woocommerce_activated

// If WooCommerce exists include ajax cart
if ( nikkon_is_woocommerce_activated() ) {
	require get_template_directory() . '/includes/inc/woocommerce-header-inc.php';
}

/**
 * Add classed to the body tag from settings
 */
function nikkon_add_body_class( $classes ) {
	if ( get_theme_mod( 'nikkon-page-remove-titlebar' ) ) {
		$classes[] = 'nikkon-shop-remove-titlebar';
	}
	
	return $classes;
}
add_filter( 'body_class', 'nikkon_add_body_class' );

/**
 * Add classes to the blog list for styling.
 */
function nikkon_add_blog_post_classes ( $classes ) {
	global $current_class;
	
	$nikkon_blog_layout = sanitize_html_class( 'blog-left-layout' );
	if ( get_theme_mod( 'nikkon-blog-layout' ) ) :
	    $nikkon_blog_layout = sanitize_html_class( get_theme_mod( 'nikkon-blog-layout' ) );
	    if ( is_archive() && get_theme_mod( 'nikkon-blog-layout' ) == 'blog-blocks-layout' && !get_theme_mod( 'nikkon-blog-cats-blocks' ) ) :
	    	$nikkon_blog_layout = sanitize_html_class( 'blog-left-layout' );
	    endif;
	endif;
	$classes[] = $nikkon_blog_layout;
	
	$nikkon_blog_style = sanitize_html_class( 'blog-style-postblock' );
	if ( get_theme_mod( 'nikkon-blog-layout' ) == 'blog-blocks-layout' ) :
		if ( get_theme_mod( 'nikkon-blog-blocks-style' ) ) :
		    $nikkon_blog_style = sanitize_html_class( get_theme_mod( 'nikkon-blog-blocks-style' ) );
		endif;
	endif;
	$classes[] = $nikkon_blog_style;
	
	$nikkon_blog_greyscale = '';
	if ( get_theme_mod( 'nikkon-blog-blocks-greyscale' ) ) :
	    $nikkon_blog_greyscale = sanitize_html_class( 'blog-blocks-greyscale' );
	endif;
	$classes[] = $nikkon_blog_greyscale;
	
	$classes[] = $current_class;
	$current_class = ( $current_class == 'blog-alt-odd' ) ? sanitize_html_class( 'blog-alt-even' ) : sanitize_html_class( 'blog-alt-odd' );
	
	return $classes;
}
global $current_class;
$current_class = sanitize_html_class( 'blog-alt-odd' );
add_filter ( 'post_class' , 'nikkon_add_blog_post_classes' );

/**
 * Adjust is_home query if nikkon-blog-cats is set
 */
function nikkon_set_blog_queries( $query ) {
    $blog_query_set = '';
    if ( get_theme_mod( 'nikkon-blog-cats', false ) ) {
        $blog_query_set = get_theme_mod( 'nikkon-blog-cats' );
    }
    
    if ( $blog_query_set ) {
        // do not alter the query on wp-admin pages and only alter it if it's the main query
        if ( !is_admin() && $query->is_main_query() ){
            if ( is_home() ){
                $query->set( 'cat', $blog_query_set );
            }
        }
    }
}
add_action( 'pre_get_posts', 'nikkon_set_blog_queries' );

/**
 * Display recommended plugins with the TGM class
 */
function nikkon_register_required_plugins() {
	$plugins = array(
		// The recommended WordPress.org plugins.
		array(
			'name'      => __( 'Elementor Page Builder', 'nikkon' ),
			'slug'      => 'elementor',
			'required'  => false,
			'external_url' => 'https://kairaweb.com/go/elementor/'
		),
		array(
			'name'      => __( 'WooCommerce', 'nikkon' ),
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		array(
			'name'      => __( 'Blockons (WordPress Editor Blocks)', 'nikkon' ),
			'slug'      => 'blockons',
			'required'  => false,
		),
		array(
			'name'      => __( 'StoreCustomizer', 'nikkon' ),
			'slug'      => 'woocustomizer',
			'required'  => false,
		),
		array(
			'name'      => __( 'All in One SEO', 'nikkon' ),
			'slug'      => 'all-in-one-seo-pack',
			'required'  => false,
		),
		array(
			'name'      => __( 'Breadcrumb NavXT', 'nikkon' ),
			'slug'      => 'breadcrumb-navxt',
			'required'  => false,
        ),
	);
	$config = array(
		'id'           => 'nikkon',
		'menu'         => 'tgmpa-install-plugins',
		'strings'      => array(
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'Nikkon recommends the following plugin: %1$s.',
				'Nikkon recommends the following plugins: %1$s.',
				'nikkon'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with Nikkon: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with Nikkon: %1$s.',
				'nikkon'
			),
		),
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'nikkon_register_required_plugins' );

/**
 * Add classes to the admin body class
 */
function nikkon_add_admin_body_class( $nikkon_admin_class ) {
	if ( get_theme_mod( 'nikkon-footer-layout' ) ) {
		$nikkon_admin_class .= ' ' . sanitize_html_class( get_theme_mod( 'nikkon-footer-layout' ) );
	} else {
		$nikkon_admin_class .= ' ' . sanitize_html_class( 'nikkon-footer-layout-standard' );
	}
	
	return $nikkon_admin_class;
}
add_filter( 'admin_body_class', 'nikkon_add_admin_body_class' );

/**
 * Register a custom Post Categories ID column
 */
function nikkon_edit_cat_columns( $nikkon_cat_columns ) {
    $nikkon_cat_in = array( 'cat_id' => 'Category ID <span class="cat_id_note">For the Default Slider</span>' );
    $nikkon_cat_columns = nikkon_cat_columns_array_push_after( $nikkon_cat_columns, $nikkon_cat_in, 0 );
    return $nikkon_cat_columns;
}
add_filter( 'manage_edit-category_columns', 'nikkon_edit_cat_columns' );

/**
 * Print the ID column
 */
function nikkon_cat_custom_columns( $value, $name, $cat_id ) {
    if( 'cat_id' == $name ) 
        echo $cat_id;
}
add_filter( 'manage_category_custom_column', 'nikkon_cat_custom_columns', 10, 3 );

/**
 * Insert an element at the beggining of the array
 */
function nikkon_cat_columns_array_push_after( $src, $nikkon_cat_in, $pos ) {
    if ( is_int( $pos ) ) {
        $R = array_merge( array_slice( $src, 0, $pos + 1 ), $nikkon_cat_in, array_slice( $src, $pos + 1 ) );
    } else {
        foreach ( $src as $k => $v ) {
            $R[$k] = $v;
            if ( $k == $pos )
                $R = array_merge( $R, $nikkon_cat_in );
        }
    }
    return $R;
}

/**
 * Register Elementor Locations
 */
function nikkon_register_elementor_locations( $elementor_theme_manager ) {
	$elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'nikkon_register_elementor_locations' );

/**
 * Admin notice to enter a purchase license
 */
function nikkon_add_license_notice() {
	global $pagenow;
	global $current_user;
	$nikkon_user_id = $current_user->ID;
	$nikkonpage = isset( $_GET['page'] ) ? $pagenow . '?page=' . $_GET['page'] : $pagenow;

	if ( !get_user_meta( $nikkon_user_id, 'nikkon_admin_notice_ignore' ) ) : ?>
		<div class="notice notice-info nikkon-admin-notice nikkon-notice-add">
			<h4>
				<?php esc_html_e( 'Thank you for using Nikkon!', 'nikkon' ); ?> -
				<span><a href="<?php echo esc_url( 'https://kaira.lemonsqueezy.com/checkout/buy/bb24c046-1d1c-4bdd-b223-a5df43f7fbaa' ); ?>" target="_blank"><?php esc_html_e( 'Premium now only $25', 'nikkon' ); ?></a></span>
			</h4>
			<p><?php esc_html_e( 'We\'re here to help... Please read through our help notes below on getting started with Nikkon:', 'nikkon' ); ?> <a href="<?php echo esc_url( admin_url( 'themes.php?page=theme_info' ) ) ?>"><?php esc_html_e( 'Read More About Nikkon', 'nikkon' ); ?></a></p>

			<?php if ( $nikkonpage == 'themes.php?page=theme_info' ) : ?>
				<div class="nikkon-admin-notice-blocks">
					<div class="nikkon-admin-notice-block">
						<h5><?php esc_html_e( 'About Nikkon:', 'nikkon' ); ?></h5>
						<p>
							<?php esc_html_e( 'Nikkon is a widely used and much loved WordPress theme which gives you lots of different customization settings... so you can easily change the look of your site any time.', 'nikkon' ); ?>
						</p>
						<p>
							<?php
							/* translators: %s: 'Recommended Resources' */
							printf( esc_html__( 'Read through our %1$s and %2$s and we\'ll help you build a professional website easily.', 'nikkon' ), wp_kses( __( '<a href="https://kairaweb.com/support/wordpress-recommended-resources/" target="_blank">Recommended Resources</a>', 'nikkon' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( __( '<a href="https://kairaweb.com/documentation/" target="_blank">Kaira Documentation</a>', 'nikkon' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) );
							?>
						</p>
						<a href="<?php echo esc_url('https://kairaweb.com/wordpress-theme/nikkon/'); ?>" class="nikkon-admin-notice-btn" target="_blank">
							<?php esc_html_e( 'View Nikkon Theme Page', 'nikkon' ); ?>
						</a>
					</div>
					<div class="nikkon-admin-notice-block">
						<h5><?php esc_html_e( 'Using Nikkon:', 'nikkon' ); ?></h5>
						<p>
							<?php
							/* translators: %s: 'set up your site in WordPress' */
							printf( esc_html__( 'See our recommended %1$s and how to get ready before you start building your website after you\'ve %2$s.', 'nikkon' ), wp_kses( __( '<a href="https://kairaweb.com/documentation/our-recommended-wordpress-basic-setup/" target="_blank">WordPress basic setup</a>', 'nikkon' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ), wp_kses( __( '<a href="https://kairaweb.com/wordpress-hosting/" target="_blank">setup WordPress Hosting</a>', 'nikkon' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ) );
							?>
						</p>
						<a href="<?php echo esc_url( 'https://kairaweb.com/support/wordpress-recommended-resources/' ) ?>" class="nikkon-admin-notice-btn-in" target="_blank">
							<?php esc_html_e( 'Recommended Resources', 'nikkon' ); ?>
						</a>
						<p>
							<?php esc_html_e( 'We\'ve neatly built most of the Nikkon settings into the WordPress Customizer so you can see all your changes happen as you built your site.', 'nikkon' ); ?>
						</p>
						<a href="<?php echo esc_url( admin_url( 'customize.php' ) ) ?>" class="nikkon-admin-notice-btn-grey">
							<?php esc_html_e( 'Start Customizing Your Website', 'nikkon' ); ?>
						</a>
					</div>
					<div class="nikkon-admin-notice-block nikkon-nomargin">
						<h5><?php esc_html_e( 'Popular FAQ\'s:', 'nikkon' ); ?></h5>
						<p>
						<?php esc_html_e( 'See our list of popular help links for building your website and/or any issues you may have.', 'nikkon' ); ?>
						</p>
						<ul>
							<li>
								<a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><?php esc_html_e( 'Setup the Nikkon default slider', 'nikkon' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/documentation/adding-custom-css-to-wordpress/" target="_blank"><?php esc_html_e( 'Adding Custom CSS to WordPress', 'nikkon' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/documentation/mobile-menu-not-working/" target="_blank"><?php esc_html_e( 'Mobile Menu is not working', 'nikkon' ); ?></a>
							</li>
							<li>
								<a href="https://kairaweb.com/wordpress-theme/nikkon/#premium-features" target="_blank"><?php esc_html_e( 'What does Nikkon Premium offer extra', 'nikkon' ); ?></a>
							</li>
						</ul>
						<a href="<?php echo esc_url( 'https://kairaweb.com/documentation/' ) ?>" class="nikkon-admin-notice-btn-grey" target="_blank">
							<?php esc_html_e( 'See More Documentation', 'nikkon' ); ?>
						</a>
					</div>
				</div>
			<?php endif; ?>

			<a href="?nikkon_add_license_notice_ignore=" class="nikkon-notice-close"><?php esc_html_e( 'Dismiss Notice', 'nikkon' ); ?></a>
		</div><?php
	endif;
}
add_action( 'admin_notices', 'nikkon_add_license_notice' );
/**
 * Admin notice save dismiss to wp transient
 */
function nikkon_add_license_notice_ignore() {
    global $current_user;
	$nikkon_user_id = $current_user->ID;

    if ( isset( $_GET['nikkon_add_license_notice_ignore'] ) ) {
		update_user_meta( $nikkon_user_id, 'nikkon_admin_notice_ignore', true );
    }
}
add_action( 'admin_init', 'nikkon_add_license_notice_ignore' );
