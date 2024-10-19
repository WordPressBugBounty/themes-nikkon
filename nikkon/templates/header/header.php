<?php if ( get_theme_mod( 'nikkon-header-layout' ) == 'nikkon-header-layout-two' ) : ?>
	
	<?php get_template_part( '/templates/header/header-layout-two' ); ?>
	
<?php elseif ( get_theme_mod( 'nikkon-header-layout' ) == 'nikkon-header-layout-three' ) : ?>

	<?php get_template_part( '/templates/header/header-layout-three' ); ?>

<?php else : ?>
	
	<?php get_template_part( '/templates/header/header-layout-one' ); ?>
	
<?php endif; ?>