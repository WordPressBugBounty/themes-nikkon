/**
 * Customizer Custom Functionality
 *
 */
( function( $ ) {
    
    $( document ).ready( function () {
        
        nikkon_fonts_check();
        $( '#customize-control-nikkon-disable-google-fonts input[type=checkbox]' ).on( 'change', function() {
            nikkon_fonts_check();
        });
        
        function nikkon_fonts_check() {
            if ( $( '#customize-control-nikkon-disable-google-fonts input[type=checkbox]' ).is( ':checked' ) ) {
                $( '#sub-accordion-section-nikkon-typography-section #customize-control-nikkon-note-fonts-one' ).show();
            } else {
                $( '#sub-accordion-section-nikkon-typography-section #customize-control-nikkon-note-fonts-one' ).hide();
            }
        }

        //Show / Hide Color selector for slider setting
        var the_slider_select_value = $( '#customize-control-nikkon-slider-type select' ).val();
        nikkon_customizer_slider_check( the_slider_select_value );
        
        $( '#customize-control-nikkon-slider-type select' ).on( 'change', function() {
            var slider_select_value = $( this ).val();
            nikkon_customizer_slider_check( slider_select_value );
        } );

        var nikkon_header_layout_value = $( '#customize-control-nikkon-header-layout select' ).val();
        nikkon_header_layout_type_check( nikkon_header_layout_value );
        
        $( '#customize-control-nikkon-header-layout select' ).on( 'change', function() {
            var nikkon_header_select_value = $( this ).val();
            nikkon_header_layout_type_check( nikkon_header_select_value );
        });
        
        //Show / Hide Color selector for Site Boxed layout
        var nikkon_site_layout_value = $( '#customize-control-nikkon-site-layout select' ).val();
        nikkon_site_layout_type_check( nikkon_site_layout_value );
        
        $( '#customize-control-nikkon-site-layout select' ).on( 'change', function() {
            var nikkon_site_select_value = $( this ).val();
            nikkon_site_layout_type_check( nikkon_site_select_value );
        });
        
        //Show / Hide blog blocks options
        var nikkon_blocks_layout_value = $( '#customize-control-nikkon-blog-blocks-style select' ).val();
        nikkon_blocks_layout_type_check( nikkon_blocks_layout_value );
        
        $( '#customize-control-nikkon-blog-blocks-style select' ).on( 'change', function() {
            var nikkon_blocks_select_value = $( this ).val();
            nikkon_blocks_layout_type_check( nikkon_blocks_select_value );
        });
        
        
        //Show / Hide Color selector for slider setting
        var nikkon_blog_layout_value = $( '#customize-control-nikkon-blog-layout select' ).val();
        nikkon_blog_layout_check( nikkon_blog_layout_value );
        
        $( '#customize-control-nikkon-blog-layout select' ).on( 'change', function() {
            var nikkon_blog_select_value = $( this ).val();
            nikkon_blog_layout_check( nikkon_blog_select_value );
        });
        
        
        nikkon_blocks_options_turn_on_off();
        
        $( '#customize-control-nikkon-blog-layout select' ).on( 'change', function() {
            nikkon_blocks_options_turn_on_off();
        });
        
    } );

    function nikkon_customizer_slider_check( slider_select_value ) {
        if ( slider_select_value == 'nikkon-slider-default' ) {
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-meta-slider-shortcode' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-cats' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-size' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-full-width' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-linkto-post' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-title' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-auto-scroll' ).show();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-pagination' ).show();
        } else if ( slider_select_value == 'nikkon-meta-slider' ) {
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-cats' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-size' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-full-width' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-linkto-post' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-title' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-auto-scroll' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-pagination' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-meta-slider-shortcode' ).show();
        } else {
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-cats' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-size' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-full-width' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-linkto-post' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-title' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-auto-scroll' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-slider-remove-pagination' ).hide();
            $( '#sub-accordion-section-nikkon-site-layout-section-slider #customize-control-nikkon-meta-slider-shortcode' ).hide();
        }
    }

    function nikkon_header_layout_type_check( nikkon_header_select_value ) {
        if ( nikkon_header_select_value == 'nikkon-header-layout-two' ) {
            $( '#sub-accordion-section-nikkon-site-layout-section-header #customize-control-nikkon-header-layout-type' ).show();
        } else {
            $( '#sub-accordion-section-nikkon-site-layout-section-header #customize-control-nikkon-header-layout-type' ).hide();
        }
    }
    
    function nikkon_site_layout_type_check( nikkon_site_select_value ) {
        if ( nikkon_site_select_value == 'nikkon-site-boxed' ) {
            $( '#sub-accordion-section-colors #customize-control-nikkon-boxed-bg-color' ).show();
        } else {
            $( '#sub-accordion-section-colors #customize-control-nikkon-boxed-bg-color' ).hide();
        }
    }
    
    function nikkon_blocks_layout_type_check( nikkon_blocks_select_value ) {
        if ( nikkon_blocks_select_value == 'blog-style-postblock' ) {
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-border' ).show();
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-content' ).show();
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-tagcats' ).show();
        } else {
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-border' ).hide();
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-content' ).hide();
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout #customize-control-nikkon-blog-blocks-remove-tagcats' ).hide();
        }
    }
    
    function nikkon_blog_layout_check( nikkon_blog_select_value ) {
        if ( nikkon_blog_select_value == 'blog-blocks-layout' ) {
            $( '#sub-accordion-section-nikkon-blocks-layout-section-layout' ).removeClass( 'nikkon-remove-section' );
            $( '#sub-accordion-section-nikkon-blog-section #customize-control-nikkon-blog-cats-blocks' ).show();
            $( '#sub-accordion-section-nikkon-blog-section #customize-control-nikkon-blog-search-blocks' ).show();
            $( '#sub-accordion-section-nikkon-blog-section-blog #customize-control-nikkon-help-blog-blocks' ).show();
        } else {
            $( '#accordion-section-nikkon-blocks-layout-section-layout' ).addClass( 'nikkon-remove-section' );
            $( '#sub-accordion-section-nikkon-blog-section-blog #customize-control-nikkon-help-blog-blocks' ).hide();
            $( '#sub-accordion-section-nikkon-blog-section #customize-control-nikkon-blog-cats-blocks' ).hide();
            $( '#sub-accordion-section-nikkon-blog-section #customize-control-nikkon-blog-search-blocks' ).hide();
        }
    }
    
    function nikkon_blocks_options_turn_on_off() {
        var nikkon_blocks_blog = $( '#customize-control-nikkon-blog-layout select' ).val();
        
        if ( nikkon_blocks_blog == 'blog-blocks-layout' ) {
            $( '#accordion-section-nikkon-blocks-layout-section-layout' ).removeClass( 'nikkon-remove-section' );
        } else {
            $( '#accordion-section-nikkon-blocks-layout-section-layout' ).addClass( 'nikkon-remove-section' );
        }
    }
    
} )( jQuery );