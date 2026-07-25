<?php
/**
 * Barre de contact — Neodyr Access.
 *
 * Bandeau en haut du site : coordonnées à gauche (téléphone, e-mail, adresse),
 * réseaux sociaux à droite. Affiché seulement si au moins un élément est renseigné.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$neodyr_phone   = get_theme_mod( 'neodyr_topbar_phone', '' );
$neodyr_email   = get_theme_mod( 'neodyr_topbar_email', '' );
$neodyr_address = get_theme_mod( 'neodyr_topbar_address', '' );

$neodyr_tb_socials = array();
foreach ( neodyr_social_networks() as $neodyr_key => $neodyr_net ) {
	$neodyr_url = get_theme_mod( "neodyr_social_{$neodyr_key}", '' );
	if ( $neodyr_url ) {
		$neodyr_tb_socials[ $neodyr_key ] = array(
			'net' => $neodyr_net,
			'url' => $neodyr_url,
		);
	}
}

$neodyr_has_contact = ( '' !== $neodyr_phone || '' !== $neodyr_email || '' !== $neodyr_address );
if ( ! $neodyr_has_contact && empty( $neodyr_tb_socials ) ) {
	return;
}
?>
<div class="topbar">
	<div class="container topbar-inner">
		<div class="topbar-contact">
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

		<?php if ( ! empty( $neodyr_tb_socials ) ) : ?>
			<div class="topbar-social">
				<?php foreach ( $neodyr_tb_socials as $neodyr_item ) : ?>
					<a class="topbar-social-link" href="<?php echo esc_url( $neodyr_item['url'] ); ?>" target="_blank" rel="noopener noreferrer">
						<svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="<?php echo esc_attr( $neodyr_item['net']['path'] ); ?>"/></svg>
						<span class="screen-reader-text"><?php echo esc_html( $neodyr_item['net']['label'] ); ?> <?php esc_html_e( '(nouvel onglet)', 'neodyr-access' ); ?></span>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</div>
