<?php
/**
 * The template for displaying search forms in Nikkon
 *
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
        <input type="search" class="search-field" placeholder="<?php echo ( get_theme_mod( 'nikkon-website-search-txt' ) ) ? esc_attr( get_theme_mod( 'nikkon-website-search-txt' ) ) : esc_attr( __( 'Search &amp; hit enter&hellip;', 'nikkon' ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
    </label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( '&nbsp;', 'submit button', 'nikkon' ); ?>" />
</form>