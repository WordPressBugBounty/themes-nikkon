<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nikkon
 */
global $woocommerce;
?><!DOCTYPE html><!-- Nikkon.ORG -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php if ( get_theme_mod( 'nikkon-site-add-side-social' ) ) : ?>
	<div class="side-aligned-social hide-side-social">
		<?php get_template_part( '/templates/social-links' ); ?>
	</div>
<?php endif; ?>
<div id="page" class="hfeed site <?php echo sanitize_html_class( get_theme_mod( 'nikkon-slider-type' ) ); ?>">
	
<?php echo ( get_theme_mod( 'nikkon-site-layout' ) == 'nikkon-site-boxed' ) ? '<div class="site-boxed">' : ''; ?>
	
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) : ?>
	
		<?php get_template_part( '/templates/header/header' ); ?>

	<?php endif; ?>
	
	<?php if ( is_front_page() ) : ?>
		
		<?php get_template_part( '/templates/slider/homepage-slider' ); ?>
		
	<?php endif; ?>

	<div class="site-container content-container <?php echo ( ! is_active_sidebar( 'sidebar-1' ) ) ? sanitize_html_class( 'content-no-sidebar' ) : sanitize_html_class( 'content-has-sidebar' ); ?>">