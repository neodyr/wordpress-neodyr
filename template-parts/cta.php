<?php
/**
 * Bande d'appel à l'action — Neodyr Access.
 *
 * Affichée en bas de la page d'accueil si activée dans le Personnalisateur.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! get_theme_mod( 'neodyr_cta_enable', false ) ) {
	return;
}

$neodyr_cta_title = get_theme_mod( 'neodyr_cta_title', '' );
$neodyr_cta_text  = get_theme_mod( 'neodyr_cta_text', '' );
$neodyr_cta_bt    = get_theme_mod( 'neodyr_cta_btn_text', '' );
$neodyr_cta_bu    = get_theme_mod( 'neodyr_cta_btn_url', '' );

if ( '' === $neodyr_cta_title && '' === $neodyr_cta_text ) {
	return;
}
?>
<section class="neodyr-cta"<?php echo '' !== $neodyr_cta_title ? ' aria-labelledby="neodyr-cta-title"' : ''; ?>>
	<div class="container cta-inner">
		<?php if ( '' !== $neodyr_cta_title ) : ?>
			<h2 id="neodyr-cta-title" class="cta-title"><?php echo esc_html( $neodyr_cta_title ); ?></h2>
		<?php endif; ?>
		<?php if ( '' !== $neodyr_cta_text ) : ?>
			<p class="cta-text"><?php echo esc_html( $neodyr_cta_text ); ?></p>
		<?php endif; ?>
		<?php if ( $neodyr_cta_bt && $neodyr_cta_bu ) : ?>
			<p class="cta-actions"><a class="button" href="<?php echo esc_url( $neodyr_cta_bu ); ?>"><?php echo esc_html( $neodyr_cta_bt ); ?></a></p>
		<?php endif; ?>
	</div>
</section>
