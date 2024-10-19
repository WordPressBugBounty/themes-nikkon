<?php
/**
 * Defines customizer options
 *
 * @package Customizer Library Nikkon
 */

function customizer_library_nikkon_options() {
	
    $site_boxed_color = '#FFFFFF';
	$primary_color = '#13C76D';
	$secondary_color = '#047b40';
    
    $header_bg_color = '#FFFFFF';
    $header_font_color = '#3C3C3C';
	
	$body_font_color = '#3C3C3C';
	$heading_font_color = '#000000';

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
    
    // Header Image
    $section = 'title_tagline';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Identity', 'nikkon' ),
        'priority' => '20',
        'description' => 'Change/edit the <a href="#nikkon-site-layout-section-header" rel="tc-section">Header</a> & <a href="#nikkon-site-layout-section-footer" rel="tc-section">Footer</a> Layouts<br />Edit/Change <a href="#nikkon-panel-colors" rel="tc-panel">Theme Colors</a><br />Add a <a href="#nikkon-site-layout-section-slider" rel="tc-section">Home Page Slider</a><br />Change/edit the <a href="#nikkon-blog-section-blog" rel="tc-section">Blog Layout</a><br />Add <a href="#nikkon-social-section" rel="tc-section">Social Links</a> to your site',
    );
    
    $options['nikkon-logo-max-width'] = array(
        'id' => 'nikkon-logo-max-width',
        'label'   => __( 'Set a max-width for the logo', 'nikkon' ),
        'section' => $section,
        'type'    => 'number',
        'description' => __( 'This only applies if a logo image is uploaded', 'nikkon' ),
    );
    
	// Site Layout Options
	$section = 'nikkon-site-layout-section';
    
    $panel = 'nikkon-panel-layout';
    
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Nikkon Settings', 'nikkon' ),
        'priority' => '30'
    );
    
    $section = 'nikkon-site-layout-section-site';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Site Layout', 'nikkon' ),
        'priority' => '30',
        'description' => 'Change/edit the <a href="#nikkon-site-layout-section-header" rel="tc-section">Header</a> & <a href="#nikkon-site-layout-section-footer" rel="tc-section">Footer</a> Layouts<br />Edit/Change <a href="#nikkon-panel-colors" rel="tc-panel">Theme Colors</a><br />Add a <a href="#nikkon-site-layout-section-slider" rel="tc-section">Home Page Slider</a><br />Change/edit the <a href="#nikkon-blog-section-blog" rel="tc-section">Blog Layout</a><br />Add <a href="#nikkon-social-section" rel="tc-section">Social Links</a> to your site',
        'panel' => $panel
    );
	
    $options['nikkon-disable-google-fonts'] = array(
        'id' => 'nikkon-disable-google-fonts',
        'label'   => __( 'GDPR: Disable Google Fonts', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
        'description' => __( 'Selecting this uses the websafe font\'s - Garamond for Heading/Title text and Arial for Body & Inputs text.<br /><br />Turning this on will stop the font selection settings from working and also stop your website connecting to Google servers.', 'nikkon' ),
    );
    $choices = array(
        'nikkon-site-boxed' => __( 'Boxed Layout', 'nikkon' ),
        'nikkon-site-full-width' => __( 'Full Width Layout', 'nikkon' )
    );
    $options['nikkon-site-layout'] = array(
        'id' => 'nikkon-site-layout',
        'label'   => __( 'Site Layout', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'nikkon-site-full-width'
    );
    $options['nikkon-page-remove-titlebar'] = array(
        'id' => 'nikkon-page-remove-titlebar',
        'label'   => __( 'Remove Page Titles', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-site-add-side-social'] = array(
        'id' => 'nikkon-site-add-side-social',
        'label'   => __( 'Add Side Aligned Social Icons', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Add Social Icons for this to show', 'nikkon' ),
        'default' => 0,
    );
    
    $options['nikkon-note-layout'] = array(
        'id' => 'nikkon-note-layout',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<big>See <a href="https://kairaweb.com/documentation/setup-home-blocks-like-the-nikkon-demo-website/" target="_blank">Demo Setup Instructions here</a></big><br /><br /><b>Premium Extra Features:</b><br />- Website Loader & customization settings<br />- Setting to change Sidebar width<br />- Enable Blocks layout on any/all pages<br />- Page featured image + layout settings<br /><br />- Set Shop, Archive & Single pages to Left Sidebar<br />- Set Shop, Archive & Single pages to full width<br />- Set WooCommerce products per page<br />- Set WooCommerce products per row<br />- Remove Products border<br />- Remove WooCommerce Product Image Zoom and/or LightBox', 'nikkon' )
    );
	
	
	$section = 'nikkon-site-layout-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'nikkon' ),
        'priority' => '40',
        'description' => 'Add <a href="#nikkon-social-section" rel="tc-section">Social links</a> and edit <a href="#nikkon-website-section-header" rel="tc-section">Header text</a>',
        'panel' => $panel
    );
    $options['nikkon-header-remove-topbar'] = array(
        'id' => 'nikkon-header-remove-topbar',
        'label'   => __( 'Remove Top Bar', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $choices = array(
        'nikkon-header-layout-one' => __( 'Header Centered', 'nikkon' ),
        'nikkon-header-layout-two' => __( 'Header Centered Split', 'nikkon' ),
        'nikkon-header-layout-three' => __( 'Header Standard', 'nikkon' )
    );
    $options['nikkon-header-layout'] = array(
        'id' => 'nikkon-header-layout',
        'label'   => __( 'Header Layout', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'nikkon-header-layout-one'
    );
    $choices = array(
        'nikkon-header-layout-inward' => __( 'Center Out', 'nikkon' ),
        'nikkon-header-layout-outward' => __( 'Outwards In', 'nikkon' )
    );
    $options['nikkon-header-layout-type'] = array(
        'id' => 'nikkon-header-layout-type',
        'label'   => __( 'Header Layout Type', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'nikkon-header-layout-inward'
    );
	$options['nikkon-header-menu-text'] = array(
		'id' => 'nikkon-header-menu-text',
		'label'   => __( 'Menu Button Text', 'nikkon' ),
		'section' => $section,
		'type'    => 'text',
		'default' => 'menu',
		'description' => __( 'This is the text for the mobile menu button', 'nikkon' )
	);
    $options['nikkon-header-title-normal-case'] = array(
        'id' => 'nikkon-header-title-normal-case',
        'label'   => __( 'Site Title - Normal Case', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-header-tagline-normal-case'] = array(
        'id' => 'nikkon-header-tagline-normal-case',
        'label'   => __( 'Site Tagline - Normal Case', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-header-nav-normal-case'] = array(
        'id' => 'nikkon-header-nav-normal-case',
        'label'   => __( 'Main Navigation - Normal Case', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
	$options['nikkon-header-search'] = array(
        'id' => 'nikkon-header-search',
        'label'   => __( 'Remove Search', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-header-remove-no'] = array(
        'id' => 'nikkon-header-remove-no',
        'label'   => __( 'Remove Phone Number', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-note-header'] = array(
        'id' => 'nikkon-note-header',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Edit Main Navigation Font Size<br />- Add/Enable WooCommerce drop down cart/basket<br />- Extra "Split Nav" header layout<br />- Remove WooCommerce cart<br />- Add WooCommerce cart to header top bar<br />- Remove all header lines', 'nikkon' )
    );
    
    $section = 'nikkon-site-layout-section-slider';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Home Page Slider', 'nikkon' ),
        'priority' => '50',
        'panel' => $panel
    );
    
    $choices = array(
        'nikkon-slider-default' => __( 'Default Slider', 'nikkon' ),
        'nikkon-meta-slider' => __( 'Slider Shortcode', 'nikkon' ),
        'nikkon-no-slider' => __( 'None', 'nikkon' )
    );
    $options['nikkon-slider-type'] = array(
        'id' => 'nikkon-slider-type',
        'label'   => __( 'Choose a Slider', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'nikkon-slider-default'
    );
    $options['nikkon-slider-cats'] = array(
        'id' => 'nikkon-slider-cats',
        'label'   => __( 'Slider Categories', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you want to display in the slider. Eg: "13,17,19" (no spaces and only comma\'s)<br /><br />Get the ID at <b>Posts -> Categories</b>.<br /><br />Or <a href="https://kairaweb.com/documentation/setting-up-the-default-slider/" target="_blank"><b>See more instructions here</b></a>', 'nikkon' )
    );
    $options['nikkon-meta-slider-shortcode'] = array(
        'id' => 'nikkon-meta-slider-shortcode',
        'label'   => __( 'Slider Shortcode', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the shortcode given by the slider', 'nikkon' )
    );
    $options['nikkon-slider-linkto-post'] = array(
        'id' => 'nikkon-slider-linkto-post',
        'label'   => __( 'Link Slide to post', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-slider-remove-title'] = array(
        'id' => 'nikkon-slider-remove-title',
        'label'   => __( 'Remove Slider Title', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-note-slider'] = array(
        'id' => 'nikkon-note-slider',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Set each slide to have custom url link<br />- Set slider to full width<br />- Select slider size (small / medium / large)<br />- Change slider scroll effect<br />- Remove slider Pagination<br />- Stop slider auto-scroll', 'nikkon' )
    );
    
    $section = 'nikkon-site-layout-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'nikkon' ),
        'priority' => '60',
        'description' => 'Add <a href="#nikkon-social-section" rel="tc-section">Social links</a> and edit <a href="#nikkon-website-section-footer" rel="tc-section">Footer text</a>',
        'panel' => $panel
    );
    
    $choices = array(
        'nikkon-footer-layout-standard' => __( 'Standard Layout', 'nikkon' ),
        'nikkon-footer-layout-social' => __( 'Social Layout', 'nikkon' ),
        'nikkon-footer-layout-none' => __( 'None', 'nikkon' )
    );
    $options['nikkon-footer-layout'] = array(
        'id' => 'nikkon-footer-layout',
        'label'   => __( 'Footer Layout', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'nikkon-footer-layout-standard'
    );
    
    $options['nikkon-footer-bottombar'] = array(
        'id' => 'nikkon-footer-bottombar',
        'label'   => __( 'Remove the Bottom Bar', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-note-footer'] = array(
        'id' => 'nikkon-note-footer',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Edit Social Footer Icon Size<br />- Add/Enable site Back To Top button<br />- Premium has an advanced widget footer layout where you can select the columns and manually adjust each column width as you want', 'nikkon' )
    );


    $section = 'nikkon-site-seo-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'SEO (Search Engine Optimization)', 'nikkon' ),
        'priority' => '90',
        'panel' => $panel
    );

    $choices = array(
        '1' => __( 'H1', 'nikkon' ),
        '2' => __( 'H2', 'nikkon' ),
        '3' => __( 'H3', 'nikkon' ),
        '4' => __( 'H4', 'nikkon' ),
        '5' => __( 'H5', 'nikkon' ),
        '6' => __( 'H6', 'nikkon' )
    );
    $options['nikkon-seo-site-title-tag'] = array(
        'id' => 'nikkon-seo-site-title-tag',
        'label'   => __( 'Site Title Element', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '1'
    );

    $choices = array(
        '1' => __( 'H1', 'nikkon' ),
        '2' => __( 'H2', 'nikkon' ),
        '3' => __( 'H3', 'nikkon' ),
        '4' => __( 'H4', 'nikkon' ),
        '5' => __( 'H5', 'nikkon' ),
        '6' => __( 'H6', 'nikkon' )
    );
    $options['nikkon-seo-site-desc-tag'] = array(
        'id' => 'nikkon-seo-site-desc-tag',
        'label'   => __( 'Site Description Element', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '2'
    );

    $choices = array(
        '1' => __( 'H1', 'nikkon' ),
        '2' => __( 'H2', 'nikkon' ),
        '3' => __( 'H3', 'nikkon' ),
        '4' => __( 'H4', 'nikkon' ),
        '5' => __( 'H5', 'nikkon' ),
        '6' => __( 'H6', 'nikkon' )
    );
    $options['nikkon-seo-page-title-tag'] = array(
        'id' => 'nikkon-seo-page-title-tag',
        'label'   => __( 'Page Titles Element', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '3'
    );
    $choices = array(
        '1' => __( 'H1', 'nikkon' ),
        '2' => __( 'H2', 'nikkon' ),
        '3' => __( 'H3', 'nikkon' ),
        '4' => __( 'H4', 'nikkon' ),
        '5' => __( 'H5', 'nikkon' ),
        '6' => __( 'H6', 'nikkon' )
    );
    $options['nikkon-seo-blog-post-title-tag'] = array(
        'id' => 'nikkon-seo-blog-post-title-tag',
        'label'   => __( 'Blog List Titles Element', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '3'
    );
    $choices = array(
        '1' => __( 'H1', 'nikkon' ),
        '2' => __( 'H2', 'nikkon' ),
        '3' => __( 'H3', 'nikkon' ),
        '4' => __( 'H4', 'nikkon' ),
        '5' => __( 'H5', 'nikkon' ),
        '6' => __( 'H6', 'nikkon' )
    );
    $options['nikkon-seo-widget-title-tag'] = array(
        'id' => 'nikkon-seo-widget-title-tag',
        'label'   => __( 'Widget Titles Element', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => '4'
    );
    
    
    $panel = 'nikkon-panel-blog';
    
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Nikkon Blog Settings', 'nikkon' ),
        'priority' => '40'
    );
    
    // Blog Settings
    $section = 'nikkon-blog-section-blog';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blog List', 'nikkon' ),
        'priority' => '50',
        'panel' => $panel
    );
    
    $choices = array(
        'blog-left-layout' => __( 'Left Layout', 'nikkon' ),
        'blog-right-layout' => __( 'Right Layout', 'nikkon' ),
        'blog-alt-layout' => __( 'Alternate Layout', 'nikkon' ),
        'blog-top-layout' => __( 'Top Layout', 'nikkon' ),
        'blog-blocks-layout' => __( 'Blocks Layout', 'nikkon' )
    );
    $options['nikkon-blog-layout'] = array(
        'id' => 'nikkon-blog-layout',
        'label'   => __( 'Blog Posts Layout', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-left-layout'
    );
    $options['nikkon-help-blog-blocks'] = array(
        'id' => 'nikkon-help-blog-blocks',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'You can now <a href="#nikkon-blocks-layout-section-layout" rel="tc-section">Customize the Block Settings</a>', 'nikkon' )
    );
    $options['nikkon-blog-list-img-cut'] = array(
        'id' => 'nikkon-blog-list-img-cut',
        'label'   => __( 'Blog Image Cut', 'nikkon' ),
        'section' => $section,
        'type'    => 'imageselect',
        'description' => __( 'Select which cut the Blog list uses<br />Recommended: Optimize images before upload', 'nikkon' ),
        'default' => 'large'
    );
    $options['nikkon-blog-cats'] = array(
        'id' => 'nikkon-blog-cats',
        'label'   => __( 'Exclude Blog Categories', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'description' => __( 'Enter the ID\'s of the post categories you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />Eg: "-13, -17, -19"<br /><br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in those categories.<br /><br />Get the ID at <b>Posts -> Categories</b>.', 'nikkon' )
    );
    $options['nikkon-blog-full-width'] = array(
        'id' => 'nikkon-blog-full-width',
        'label'   => __( 'Make Blog Full Width', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-single-remove-pag'] = array(
        'id' => 'nikkon-blog-single-remove-pag',
        'label'   => __( 'Remove Next & Previous posts on Blog Single Posts', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-cats-blocks'] = array(
        'id' => 'nikkon-blog-cats-blocks',
        'label'   => __( 'Enable blocks on Archive pages', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-note-blog'] = array(
        'id' => 'nikkon-note-blog',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Set Blog List/Archives/Single pages to left sidebar<br />- Set List/Archives/Single pages to full width<br />- Single Post featured image + layout settings<br />- Remove Single page meta/tag/category info', 'nikkon' )
    );
    
    // Blog Settings
    $section = 'nikkon-blocks-layout-section-layout';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Blocks Layout Settings', 'nikkon' ),
        'priority' => '50',
        'panel' => $panel
    );
    
    $choices = array(
        'blog-post-shape-square' => __( 'Square Blocks', 'nikkon' ),
        'blog-post-shape-round' => __( 'Round Blocks', 'nikkon' ),
        'blog-post-shape-img' => __( 'Image Shape Blocks', 'nikkon' )
    );
    $options['nikkon-blog-post-shape'] = array(
        'id' => 'nikkon-blog-post-shape',
        'label'   => __( 'Blog Post Shape', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-post-shape-square'
    );
    $choices = array(
        'blog-style-imgblock' => __( 'Image/Block Style', 'nikkon' ),
        'blog-style-postblock' => __( 'Post/Block Style', 'nikkon' )
    );
    $options['nikkon-blog-blocks-style'] = array(
        'id' => 'nikkon-blog-blocks-style',
        'label'   => __( 'Blocks Styling', 'nikkon' ),
        'section' => $section,
        'type'    => 'select',
        'choices' => $choices,
        'default' => 'blog-style-postblock'
    );
    $options['nikkon-blog-blocks-remove-border'] = array(
        'id' => 'nikkon-blog-blocks-remove-border',
        'label'   => __( 'Remove Blocks Border', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-blocks-remove-meta'] = array(
        'id' => 'nikkon-blog-blocks-remove-meta',
        'label'   => __( 'Remove Meta info', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-blocks-remove-content'] = array(
        'id' => 'nikkon-blog-blocks-remove-content',
        'label'   => __( 'Remove Content', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-blocks-remove-tagcats'] = array(
        'id' => 'nikkon-blog-blocks-remove-tagcats',
        'label'   => __( 'Remove Tags & Categories', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
    $options['nikkon-blog-blocks-greyscale'] = array(
        'id' => 'nikkon-blog-blocks-greyscale',
        'label'   => __( 'Images Grey / Color on hover', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Select this if you\'d like the block images to show in greyscale and re-color on mouse hover', 'nikkon' ),
        'default' => 0,
    );
    $options['nikkon-note-blog-layout'] = array(
        'id' => 'nikkon-note-blog-layout',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />Adjust Blocks Spacing<br />- Select Blog layout columns amount (Columns to be 2/3/4/5 layout per row)', 'nikkon' )
    );
    

	// Colors
	$section = 'colors';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Colors', 'nikkon' ),
		'priority' => '50'
	);
    
    $options['nikkon-boxed-bg-color'] = array(
        'id' => 'nikkon-boxed-bg-color',
        'label'   => __( 'Site Boxed Background Color', 'nikkon' ),
        'section' => $section,
        'type'    => 'color',
        'default' => $site_boxed_color,
    );

	$options['nikkon-primary-color'] = array(
		'id' => 'nikkon-primary-color',
		'label'   => __( 'Primary Color', 'nikkon' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $primary_color,
	);

	$options['nikkon-secondary-color'] = array(
		'id' => 'nikkon-secondary-color',
		'label'   => __( 'Secondary Color', 'nikkon' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $secondary_color,
	);
    $options['nikkon-note-color'] = array(
        'id' => 'nikkon-note-color',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Premium comes with advanced color settings allowing you to change the colors of the header, top bar, navigation and footers etc', 'nikkon' )
    );
    

	// Font Options
	$section = 'nikkon-typography-section';
	$font_choices = customizer_library_get_font_choices();

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Nikkon Font Settings', 'nikkon' ),
		'priority' => '40'
	);

    $options['nikkon-note-fonts-one'] = array(
        'id' => 'nikkon-note-fonts-one',
        'section' => $section,
        'type'    => 'help',
        'description' => __( 'Google Fonts has been disabled. <a href="#nikkon-site-layout-section-site" rel="tc-section">Enable them here</a>', 'nikkon' ),
    );
	$options['nikkon-body-font'] = array(
		'id' => 'nikkon-body-font',
		'label'   => __( 'Body Font', 'nikkon' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Open Sans'
	);
	$options['nikkon-body-font-color'] = array(
		'id' => 'nikkon-body-font-color',
		'label'   => __( 'Body Font Color', 'nikkon' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $body_font_color,
	);

	$options['nikkon-heading-font'] = array(
		'id' => 'nikkon-heading-font',
		'label'   => __( 'Heading Font', 'nikkon' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Dosis'
	);
	$options['nikkon-heading-font-color'] = array(
		'id' => 'nikkon-heading-font-color',
		'label'   => __( 'Heading Font Color', 'nikkon' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $heading_font_color,
	);
    
    $options['nikkon-note-font'] = array(
        'id' => 'nikkon-note-font',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Adjust Site Title font and size<br />- Adjust Site Tagline size and spacing', 'nikkon' )
    );
	
	
	// Site Text Settings
    $panel = 'nikkon-website-panel-theme-text';
    
    $panels[] = array(
        'id' => $panel,
        'title' => __( 'Nikkon Theme Text', 'nikkon' ),
        'priority' => '50'
    );
    
    $section = 'nikkon-website-section-header';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Header', 'nikkon' ),
        'priority' => '10',
        'panel' => $panel
    );
    
    $options['nikkon-website-head-no-icon'] = array(
        'id' => 'nikkon-website-head-no-icon',
        'label'   => __( 'Phone Icon', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'default' => 'fa-phone',
        'description' => __( 'You can select any icon to add from <a href="http://fontawesome.io/cheatsheet/" target="_blank">Font Awesome</a>, add only the text next to the icon. Eg: fa-phone', 'nikkon' )
    );
    $options['nikkon-website-head-no'] = array(
        'id' => 'nikkon-website-head-no',
        'label'   => __( 'Phone Number', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Call Us: +2782 444 YEAH', 'nikkon' )
    );
    $options['nikkon-website-search-txt'] = array(
        'id' => 'nikkon-website-search-txt',
        'label'   => __( 'Search Text', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Search &amp; hit enter&hellip;', 'nikkon' )
    );
    $options['nikkon-note-website-head'] = array(
        'id' => 'nikkon-note-website-head',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Add extra Address/Custom text to header', 'nikkon' )
    );
    
    $section = 'nikkon-website-section-footer';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Footer', 'nikkon' ),
        'priority' => '30',
        'panel' => $panel
    );
    
    $options['nikkon-website-site-add'] = array(
        'id' => 'nikkon-website-site-add',
        'label'   => __( 'Footer Address', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Cape Town, South Africa', 'nikkon' )
    );
    $options['nikkon-note-website'] = array(
        'id' => 'nikkon-note-website',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Change attribution/copyright text to your own copyright text', 'nikkon' )
    );
    
    $section = 'nikkon-website-section-extra';

    $sections[] = array(
        'id' => $section,
        'title' => __( '404 Error & Search Results', 'nikkon' ),
        'priority' => '30',
        'panel' => $panel
    );
    
    $options['nikkon-website-error-head'] = array(
        'id' => 'nikkon-website-error-head',
        'label'   => __( '404 Error Page Heading', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
        'default' => __( 'Oops! <span>404</span>', 'nikkon'),
        'description' => __( 'Enter the heading for the 404 Error page', 'nikkon' )
    );
    $options['nikkon-website-error-msg'] = array(
        'id' => 'nikkon-website-error-msg',
        'label'   => __( 'Error 404 Message', 'nikkon' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'It looks like that page does not exist. <br />Return home or try a search', 'nikkon'),
        'description' => __( 'Enter the default text on the 404 error page (Page not found)', 'nikkon' )
    );
    $options['nikkon-website-nosearch-msg'] = array(
        'id' => 'nikkon-website-nosearch-msg',
        'label'   => __( 'No Search Results', 'nikkon' ),
        'section' => $section,
        'type'    => 'textarea',
        'default' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nikkon'),
        'description' => __( 'Enter the default text for when no search results are found', 'nikkon' )
    );
	
	
	// Social Settings
    $section = 'nikkon-social-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Nikkon Social Links', 'nikkon' ),
        'description' => 'Social Icons not working? <a href="#nikkon-plugin-support-section" rel="tc-section">Turn on Social Icons here</a>',
        'priority' => '80'
    );
    
    $options['nikkon-social-email'] = array(
        'id' => 'nikkon-social-email',
        'label'   => __( 'Email Address', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-skype'] = array(
        'id' => 'nikkon-social-skype',
        'label'   => __( 'Skype Name', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-facebook'] = array(
        'id' => 'nikkon-social-facebook',
        'label'   => __( 'Facebook', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-twitter'] = array(
        'id' => 'nikkon-social-twitter',
        'label'   => __( 'Twitter', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-linkedin'] = array(
        'id' => 'nikkon-social-linkedin',
        'label'   => __( 'LinkedIn', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-tumblr'] = array(
        'id' => 'nikkon-social-tumblr',
        'label'   => __( 'Tumblr', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-social-flickr'] = array(
        'id' => 'nikkon-social-flickr',
        'label'   => __( 'Flickr', 'nikkon' ),
        'section' => $section,
        'type'    => 'text',
    );
    $options['nikkon-note-social'] = array(
        'id' => 'nikkon-note-social',
        'section' => $section,
        'type'    => 'note',
        'description' => __( '<b>Premium Extra Features:</b><br />- Premium comes with over 20 social icons to link to<br />- Setting to add custom social link', 'nikkon' )
    );
    
    // Site Plugins Support
    $section = 'nikkon-plugin-support-section';

    $sections[] = array(
        'id' => $section,
        'title' => __( 'Plugin Support', 'nikkon' ),
        'priority' => '120',
        'description' => __( 'Nikkon adds fixes for external plugins', 'nikkon' )
    );
    
    $options['nikkon-plugin-social-fix'] = array(
        'id' => 'nikkon-plugin-social-fix',
        'label'   => __( 'Social Icons', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'description' => __( 'Turn this on if the Social Icons are not displaying, and showing as squares', 'nikkon' ),
        'default' => 0
    );
    $options['nikkon-plugin-mega-menu'] = array(
        'id' => 'nikkon-plugin-mega-menu',
        'label'   => __( 'Mega Menu', 'nikkon' ),
        'section' => $section,
        'type'    => 'checkbox',
        'default' => 0,
    );
	

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_nikkon_options' );
