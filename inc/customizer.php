<?php
/**
 * Personnalisation — Neodyr Access.
 *
 * Propose un choix de palette de couleurs *garanties accessibles* (contraste AA
 * vérifié). L'utilisateur ne peut PAS saisir une couleur libre — qui casserait la
 * conformité — mais seulement sélectionner une palette pré-validée.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Palettes accessibles disponibles (contrastes ≥ 4.5:1 vérifiés).
 *
 * @return array
 */
function neodyr_palettes() {
	return array(
		'neodyr'  => array(
			'label'     => __( 'Vert Neodyr', 'neodyr' ),
			'primary'   => '#0a6b4a',
			'primary_d' => '#08543a',
			'ring'      => 'rgba(10, 107, 74, 0.18)',
		),
		'bleu'    => array(
			'label'     => __( 'Bleu confiance', 'neodyr' ),
			'primary'   => '#1d4ed8',
			'primary_d' => '#1e40af',
			'ring'      => 'rgba(29, 78, 216, 0.18)',
		),
		'ardoise' => array(
			'label'     => __( 'Ardoise', 'neodyr' ),
			'primary'   => '#334155',
			'primary_d' => '#1e293b',
			'ring'      => 'rgba(51, 65, 85, 0.18)',
		),
	);
}

/**
 * Clé de palette valide (repli sur « neodyr »).
 *
 * @param string $value Clé soumise.
 * @return string
 */
function neodyr_sanitize_palette( $value ) {
	$palettes = neodyr_palettes();
	return array_key_exists( $value, $palettes ) ? $value : 'neodyr';
}

/**
 * Enregistre le réglage et le contrôle dans le Personnalisateur.
 *
 * @param WP_Customize_Manager $wp_customize Gestionnaire du Personnalisateur.
 */
function neodyr_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'neodyr_colors',
		array(
			'title'       => __( 'Couleurs (accessibles)', 'neodyr' ),
			'description' => __( 'Choisissez une palette. Toutes les palettes proposées respectent les contrastes AA (RGAA / WCAG) — la conformité est garantie quel que soit votre choix.', 'neodyr' ),
			'priority'    => 40,
		)
	);

	$wp_customize->add_setting(
		'neodyr_palette',
		array(
			'default'           => 'neodyr',
			'sanitize_callback' => 'neodyr_sanitize_palette',
			'transport'         => 'refresh',
		)
	);

	$choices = array();
	foreach ( neodyr_palettes() as $key => $palette ) {
		$choices[ $key ] = $palette['label'];
	}

	$wp_customize->add_control(
		'neodyr_palette',
		array(
			'label'    => __( 'Palette de couleurs', 'neodyr' ),
			'section'  => 'neodyr_colors',
			'type'     => 'radio',
			'choices'  => $choices,
		)
	);
}
add_action( 'customize_register', 'neodyr_customize_register' );

/**
 * Injecte les variables CSS de la palette choisie dans l'en-tête.
 */
function neodyr_palette_css() {
	$key      = neodyr_sanitize_palette( get_theme_mod( 'neodyr_palette', 'neodyr' ) );
	$palettes = neodyr_palettes();
	$palette  = $palettes[ $key ];

	// La palette par défaut est déjà dans style.css : rien à injecter.
	if ( 'neodyr' === $key ) {
		return;
	}

	$css = sprintf(
		':root{--nd-primary:%1$s;--nd-primary-d:%2$s;--nd-focus:%1$s;--nd-focus-ring:%3$s;}',
		$palette['primary'],
		$palette['primary_d'],
		$palette['ring']
	);

	printf( '<style id="neodyr-palette">%s</style>', $css ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CSS interne construit à partir de valeurs contrôlées.
}
add_action( 'wp_head', 'neodyr_palette_css' );
