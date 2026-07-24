<?php
/**
 * En-tête du site — Neodyr Access.
 *
 * Lien d'évitement fonctionnel (RGAA 12.7), repères ARIA (12.6),
 * navigation principale pilotable au clavier (12.x).
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site">

	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Aller au contenu principal', 'neodyr' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container header-inner">
			<div class="site-branding">
				<?php if ( is_front_page() && is_home() ) : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>

				<?php
				$neodyr_description = get_bloginfo( 'description', 'display' );
				if ( $neodyr_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo esc_html( $neodyr_description ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php if ( has_nav_menu( 'primary' ) ) : ?>
				<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'neodyr' ); ?>">
					<button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
						<span class="screen-reader-text"><?php esc_html_e( 'Ouvrir ou fermer le menu principal', 'neodyr' ); ?></span>
						<span aria-hidden="true">☰</span> <?php esc_html_e( 'Menu', 'neodyr' ); ?>
					</button>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'container'      => false,
						)
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
		</div><!-- .header-inner -->
	</header><!-- #masthead -->

	<div class="site-content">
