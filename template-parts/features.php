<?php
/**
 * Blocs de mise en avant (3 sections) — Neodyr Access.
 *
 * Affichés sous la bannière d'accueil si activés et renseignés.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_theme_mod( 'neodyr_features_enable', false ) ) {
	return;
}

$neodyr_features = array();
foreach ( array( 1, 2, 3 ) as $neodyr_i ) {
	$neodyr_t = get_theme_mod( "neodyr_feature{$neodyr_i}_title", '' );
	$neodyr_x = get_theme_mod( "neodyr_feature{$neodyr_i}_text", '' );
	$neodyr_c = get_theme_mod( "neodyr_feature{$neodyr_i}_icon", '' );
	if ( $neodyr_t || $neodyr_x ) {
		$neodyr_features[] = array(
			'icon'  => $neodyr_c,
			'title' => $neodyr_t,
			'text'  => $neodyr_x,
		);
	}
}

if ( empty( $neodyr_features ) ) {
	return;
}
?>
<section class="neodyr-features" aria-label="<?php esc_attr_e( 'Points clés', 'neodyr' ); ?>">
	<div class="container features-grid">
		<?php foreach ( $neodyr_features as $neodyr_f ) : ?>
			<div class="feature-card">
				<?php if ( $neodyr_f['icon'] ) : ?>
					<span class="feature-icon" aria-hidden="true"><?php echo esc_html( $neodyr_f['icon'] ); ?></span>
				<?php endif; ?>
				<?php if ( $neodyr_f['title'] ) : ?>
					<h2 class="feature-title"><?php echo esc_html( $neodyr_f['title'] ); ?></h2>
				<?php endif; ?>
				<?php if ( $neodyr_f['text'] ) : ?>
					<p class="feature-text"><?php echo esc_html( $neodyr_f['text'] ); ?></p>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>
	</div>
</section>
