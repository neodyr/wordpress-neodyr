<?php
/**
 * Bannière d'accueil (hero) — Neodyr Access.
 *
 * Affichée en haut de la page d'accueil si activée dans le Personnalisateur.
 * Le titre porte le <h1> de la page (l'en-tête bascule alors le titre du site
 * en <p> pour ne pas dupliquer le h1).
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_theme_mod( 'neodyr_hero_enable', true ) ) {
	return;
}

$neodyr_hero_title = get_theme_mod( 'neodyr_hero_title', '' );
if ( '' === $neodyr_hero_title ) {
	$neodyr_hero_title = get_bloginfo( 'name' );
}
$neodyr_hero_sub = get_theme_mod( 'neodyr_hero_subtitle', '' );
$neodyr_b1_text  = get_theme_mod( 'neodyr_hero_btn1_text', '' );
$neodyr_b1_url   = get_theme_mod( 'neodyr_hero_btn1_url', '' );
$neodyr_b2_text  = get_theme_mod( 'neodyr_hero_btn2_text', '' );
$neodyr_b2_url   = get_theme_mod( 'neodyr_hero_btn2_url', '' );
?>
<section class="neodyr-hero" aria-labelledby="neodyr-hero-title">
	<div class="container hero-inner">
		<h1 id="neodyr-hero-title" class="hero-title"><?php echo esc_html( $neodyr_hero_title ); ?></h1>
		<?php if ( '' !== $neodyr_hero_sub ) : ?>
			<p class="hero-subtitle"><?php echo esc_html( $neodyr_hero_sub ); ?></p>
		<?php endif; ?>
		<?php if ( ( $neodyr_b1_text && $neodyr_b1_url ) || ( $neodyr_b2_text && $neodyr_b2_url ) ) : ?>
			<p class="hero-actions">
				<?php if ( $neodyr_b1_text && $neodyr_b1_url ) : ?>
					<a class="button" href="<?php echo esc_url( $neodyr_b1_url ); ?>"><?php echo esc_html( $neodyr_b1_text ); ?></a>
				<?php endif; ?>
				<?php if ( $neodyr_b2_text && $neodyr_b2_url ) : ?>
					<a class="button button-secondary" href="<?php echo esc_url( $neodyr_b2_url ); ?>"><?php echo esc_html( $neodyr_b2_text ); ?></a>
				<?php endif; ?>
			</p>
		<?php endif; ?>
	</div>
</section>
