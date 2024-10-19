/**
 * Custom JS Functionality
 *
 */
( function( $ ) {
    
    jQuery( document ).ready( function() {
        $( '.main-navigation li.nikkon-menu-button a' ).wrapInner( '<span class="nav-span-block"></span>' );
        // Add button to sub-menu item to show nested pages / Only used on mobile
        $( '.main-navigation li.page_item_has_children > a, .main-navigation li.menu-item-has-children > a' ).after( '<button class="menu-dropdown-btn"><i class="fas fa-angle-down"></i></button>' );
        $( '.main-navigation' ).find( 'a' ).on( 'focus blur', function() {
            $( this ).parents( 'li' ).toggleClass( 'focus' );
        } );
        // Mobile nav button functionality
        $( '.menu-dropdown-btn' ).bind( 'click', function(e) {
            e.preventDefault();
            $(this).parent().toggleClass( 'open-page-item' );
        });
        // The menu button
        $( '.header-menu-button' ).click( function(e){
            $( 'body' ).toggleClass( 'show-main-menu' );
            var element = $( '#main-menu' );
            trapFocus( element );
        });
        $( '.main-menu-close' ).click( function(e){
            $( '.header-menu-button' ).click();
            $( '.header-menu-button' ).focus();
        });
        $( document ).on( 'keyup',function(evt) {
            if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
                $( '.header-menu-button' ).click();
                $( '.header-menu-button' ).focus();
            }
        });
        
        // Show / Hide Search
        $( '.menu-search' ).on( 'click', function() {
            $( 'body').addClass( 'show-site-search' );
            $( '.site-top-bar input.search-field' ).focus();
        });
		
    });
    
    $(window).resize(function () {
        
        nikkon_center_blocks_elements();
        nikkon_center_slider_elements();
        
    }).resize();
    
    $(window).on('load',function () {
        
        nikkon_center_blocks_elements();

        $( '.side-aligned-social' ).removeClass( 'hide-side-social' );
        
        nikkon_home_slider();
        
    });
    
    // Hide Search is user clicks anywhere else
    $( document ).mouseup( function (e) {
        var container = $( '.site-top-bar .search-block' );
        if ( !container.is( e.target ) && container.has( e.target ).length === 0 ) {
            $( 'body' ).removeClass( 'show-site-search' );
        }
    });
    
    // Home Page Slider
    function nikkon_home_slider() {
        $( '.home-slider' ).carouFredSel({
            responsive: true,
            circular: true,
            infinite: false,
            width: 1200,
            height: 'variable',
            items: {
                visible: 1,
                width: 1200,
                height: 'variable'
            },
            onCreate: function(items) {
                nikkon_center_slider_elements();
                $( '.home-slider-wrap' ).removeClass( 'home-slider-remove' );
            },
            scroll: {
                fx: 'crossfade',
                duration: 450
            },
            auto: 6500,
            pagination: '.home-slider-pager',
            prev: '.home-slider-prev',
            next: '.home-slider-next'
        });
    }
    
    function nikkon_center_slider_elements() {
        $( '.home-slider-block' ).each( function( i ){
            $( this ).find( '.home-slider-block-inner').height( $( this ).find( '.home-slider-block-bg').outerHeight() );
        });
    }

    function nikkon_center_blocks_elements() {
        $( 'article.blog-blocks-layout.blog-style-imgblock' ).each( function( i ){
            $( this ).find( '.blog-blocks-content-inner').height( $( this ).find( 'header.entry-header').outerHeight() );
        });
    }
    
} )( jQuery );

function trapFocus( element, namespace ) {
    var focusableEls = element.find( 'a, button' );
    var firstFocusableEl = focusableEls[0];
    var lastFocusableEl = focusableEls[focusableEls.length - 1];
    var KEYCODE_TAB = 9;

    firstFocusableEl.focus();

    element.keydown( function(e) {
        var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

        if ( !isTabPressed ) { 
            return;
        }

        if ( e.shiftKey ) /* shift + tab */ {
            if ( document.activeElement === firstFocusableEl ) {
                lastFocusableEl.focus();
                e.preventDefault();
            }
        } else /* tab */ {
            if ( document.activeElement === lastFocusableEl ) {
                firstFocusableEl.focus();
                e.preventDefault();
            }
        }

    });
}
