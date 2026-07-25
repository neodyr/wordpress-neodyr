<?php
/**
 * Barre de contact — Neodyr Access.
 *
 * Bandeau en haut du site (téléphone, e-mail, adresse). Affiché seulement si au
 * moins un champ est renseigné dans le Personnalisateur.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$neodyr_phone   = get_theme_mod( 'neodyr_topbar_phone', '' );
$neodyr_email   = get_theme_mod( 'neodyr_topbar_email', '' );
$neodyr_address = get_theme_mod( 'neodyr_topbar_address', '' );

if ( '' === $neodyr_phone && '' === $neodyr_email && '' === $neodyr_address ) {
	return;
}
?>
<div class="topbar">
	<div class="container topbar-inner">
		<?php if ( '' !== $neodyr_phone ) : ?>
			<a class="topbar-item" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $neodyr_phone ) ); ?>">
				<span class="topbar-icon" aria-hidden="true">📞</span><?php echo esc_html( $neodyr_phone ); ?>
			</a>
		<?php endif; ?>
		<?php if ( '' !== $neodyr_email ) : ?>
			<a class="topbar-item" href="mailto:<?php echo esc_attr( $neodyr_email ); ?>">
				<span class="topbar-icon" aria-hidden="true">✉️</span><?php echo esc_html( $neodyr_email ); ?>
			</a>
		<?php endif; ?>
		<?php if ( '' !== $neodyr_address ) : ?>
			<span class="topbar-item">
				<span class="topbar-icon" aria-hidden="true">📍</span><?php echo esc_html( $neodyr_address ); ?>
			</span>
		<?php endif; ?>
	</div>
</div>
