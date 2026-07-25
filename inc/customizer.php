<?php
/**
 * Personnalisation — Neodyr Access.
 *
 * Options utilisateur (couleurs, mise en page, bannière d'accueil, sections,
 * pied de page) — toutes conçues pour rester accessibles quel que soit le choix :
 * les couleurs sont des palettes AA pré-validées (pas de couleur libre), et les
 * structures ajoutées gardent une sémantique et des contrastes conformes.
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
			'label'     => __( 'Vert Neodyr', 'neodyr-access' ),
			'primary'   => '#0a6b4a',
			'primary_d' => '#08543a',
			'ring'      => 'rgba(10, 107, 74, 0.18)',
		),
		'bleu'    => array(
			'label'     => __( 'Bleu confiance', 'neodyr-access' ),
			'primary'   => '#1d4ed8',
			'primary_d' => '#1e40af',
			'ring'      => 'rgba(29, 78, 216, 0.18)',
		),
		'ardoise' => array(
			'label'     => __( 'Ardoise', 'neodyr-access' ),
			'primary'   => '#334155',
			'primary_d' => '#1e293b',
			'ring'      => 'rgba(51, 65, 85, 0.18)',
		),
	);
}

/**
 * Largeurs de contenu proposées.
 *
 * @return array clé => array( label, value CSS ).
 */
function neodyr_content_widths() {
	return array(
		'reading' => array(
			'label' => __( 'Lecture (étroit, confort de lecture)', 'neodyr-access' ),
			'value' => '44rem',
		),
		'wide'    => array(
			'label' => __( 'Large (recommandé)', 'neodyr-access' ),
			'value' => '60rem',
		),
		'full'    => array(
			'label' => __( 'Pleine largeur', 'neodyr-access' ),
			'value' => '72rem',
		),
	);
}

/**
 * Réseaux sociaux gérés (clé => label + tracé d'icône SVG 24×24).
 *
 * @return array
 */
function neodyr_social_networks() {
	return array(
		'linkedin'  => array(
			'label' => 'LinkedIn',
			'path'  => 'M20.45 20.45h-3.56v-5.57c0-1.33-.02-3.04-1.85-3.04-1.86 0-2.14 1.45-2.14 2.94v5.67H9.35V9h3.41v1.56h.05c.48-.9 1.63-1.85 3.36-1.85 3.6 0 4.27 2.37 4.27 5.45v6.29zM5.34 7.43a2.06 2.06 0 1 1 0-4.13 2.06 2.06 0 0 1 0 4.13zM7.12 20.45H3.55V9h3.57v11.45zM22.22 0H1.77C.79 0 0 .77 0 1.72v20.56C0 23.23.79 24 1.77 24h20.45c.98 0 1.78-.77 1.78-1.72V1.72C24 .77 23.2 0 22.22 0z',
		),
		'facebook'  => array(
			'label' => 'Facebook',
			'path'  => 'M24 12.07C24 5.4 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.05V9.41c0-3.02 1.79-4.68 4.53-4.68 1.31 0 2.68.24 2.68.24v2.97h-1.51c-1.49 0-1.96.93-1.96 1.89v2.24h3.33l-.53 3.49h-2.8V24C19.61 23.1 24 18.1 24 12.07z',
		),
		'instagram' => array(
			'label' => 'Instagram',
			'path'  => 'M12 2.16c3.2 0 3.58.01 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.27.06-1.65.07-4.85.07s-3.58-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41a3.7 3.7 0 0 1-1.38-.9 3.7 3.7 0 0 1-.9-1.38c-.16-.42-.36-1.06-.41-2.23C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.42 2.17 8.8 2.16 12 2.16zM12 0C8.74 0 8.33.01 7.05.07 5.78.13 4.9.33 4.14.63c-.79.3-1.46.72-2.12 1.38C1.35 2.68.94 3.35.63 4.14.33 4.9.13 5.78.07 7.05.01 8.33 0 8.74 0 12s.01 3.67.07 4.95c.06 1.27.26 2.15.56 2.91.3.79.72 1.46 1.38 2.12.66.66 1.33 1.08 2.12 1.38.76.3 1.64.5 2.91.56C8.33 23.99 8.74 24 12 24s3.67-.01 4.95-.07c1.27-.06 2.15-.26 2.91-.56a5.85 5.85 0 0 0 2.12-1.38 5.85 5.85 0 0 0 1.38-2.12c.3-.76.5-1.64.56-2.91.06-1.28.07-1.69.07-4.95s-.01-3.67-.07-4.95c-.06-1.27-.26-2.15-.56-2.91a5.85 5.85 0 0 0-1.38-2.12A5.85 5.85 0 0 0 19.86.63c-.76-.3-1.64-.5-2.91-.56C15.67.01 15.26 0 12 0zm0 5.84A6.16 6.16 0 1 0 12 18.16 6.16 6.16 0 0 0 12 5.84zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-10.85a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z',
		),
		'youtube'   => array(
			'label' => 'YouTube',
			'path'  => 'M23.5 6.2a3.02 3.02 0 0 0-2.12-2.14C19.5 3.55 12 3.55 12 3.55s-7.5 0-9.38.51A3.02 3.02 0 0 0 .5 6.2C0 8.09 0 12 0 12s0 3.91.5 5.8a3.02 3.02 0 0 0 2.12 2.14c1.88.51 9.38.51 9.38.51s7.5 0 9.38-.51a3.02 3.02 0 0 0 2.12-2.14c.5-1.89.5-5.8.5-5.8s0-3.91-.5-5.8zM9.6 15.6V8.4l6.27 3.6L9.6 15.6z',
		),
		'github'    => array(
			'label' => 'GitHub',
			'path'  => 'M12 .5C5.73.5.5 5.73.5 12c0 5.08 3.29 9.39 7.86 10.91.58.11.79-.25.79-.56 0-.28-.01-1.02-.02-2-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.29-1.7-1.29-1.7-1.05-.72.08-.71.08-.71 1.16.08 1.77 1.19 1.77 1.19 1.03 1.77 2.7 1.26 3.36.96.1-.75.4-1.26.73-1.55-2.55-.29-5.23-1.28-5.23-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.8 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.11 3.05.74.81 1.19 1.84 1.19 3.1 0 4.43-2.69 5.41-5.25 5.69.41.36.78 1.06.78 2.14 0 1.55-.01 2.8-.01 3.18 0 .31.21.68.8.56A10.52 10.52 0 0 0 23.5 12C23.5 5.73 18.27.5 12 .5z',
		),
	);
}

/**
 * Nettoie une clé de palette (repli « neodyr »).
 *
 * @param string $value Valeur soumise.
 * @return string
 */
function neodyr_sanitize_palette( $value ) {
	$palettes = neodyr_palettes();
	return array_key_exists( $value, $palettes ) ? $value : 'neodyr';
}

/**
 * Nettoie une clé de largeur (repli « wide »).
 *
 * @param string $value Valeur soumise.
 * @return string
 */
function neodyr_sanitize_content_width( $value ) {
	$widths = neodyr_content_widths();
	return array_key_exists( $value, $widths ) ? $value : 'wide';
}

/**
 * Nettoie une case à cocher.
 *
 * @param mixed $value Valeur.
 * @return bool
 */
function neodyr_sanitize_checkbox( $value ) {
	return (bool) $value;
}

/**
 * Enregistre les réglages et contrôles du Personnalisateur.
 *
 * @param WP_Customize_Manager $wp_customize Gestionnaire.
 */
function neodyr_customize_register( $wp_customize ) {

	/* ---------- Couleurs (palettes accessibles) ---------- */
	$wp_customize->add_section(
		'neodyr_colors',
		array(
			'title'       => __( 'Couleurs (accessibles)', 'neodyr-access' ),
			'description' => __( 'Toutes les palettes respectent les contrastes AA (RGAA / WCAG) — la conformité est garantie quel que soit votre choix.', 'neodyr-access' ),
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
	$palette_choices = array();
	foreach ( neodyr_palettes() as $key => $palette ) {
		$palette_choices[ $key ] = $palette['label'];
	}
	$wp_customize->add_control(
		'neodyr_palette',
		array(
			'label'   => __( 'Palette de couleurs', 'neodyr-access' ),
			'section' => 'neodyr_colors',
			'type'    => 'radio',
			'choices' => $palette_choices,
		)
	);

	/* ---------- Mise en page ---------- */
	$wp_customize->add_section(
		'neodyr_layout',
		array(
			'title'    => __( 'Mise en page', 'neodyr-access' ),
			'priority' => 42,
		)
	);
	$wp_customize->add_setting(
		'neodyr_content_width',
		array(
			'default'           => 'wide',
			'sanitize_callback' => 'neodyr_sanitize_content_width',
			'transport'         => 'refresh',
		)
	);
	$width_choices = array();
	foreach ( neodyr_content_widths() as $key => $w ) {
		$width_choices[ $key ] = $w['label'];
	}
	$wp_customize->add_control(
		'neodyr_content_width',
		array(
			'label'       => __( 'Largeur du contenu', 'neodyr-access' ),
			'description' => __( 'Largeur maximale des articles et pages.', 'neodyr-access' ),
			'section'     => 'neodyr_layout',
			'type'        => 'radio',
			'choices'     => $width_choices,
		)
	);
	$wp_customize->add_setting(
		'neodyr_sticky_header',
		array(
			'default'           => false,
			'sanitize_callback' => 'neodyr_sanitize_checkbox',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'neodyr_sticky_header',
		array(
			'label'   => __( 'En-tête collant (reste visible au défilement)', 'neodyr-access' ),
			'section' => 'neodyr_layout',
			'type'    => 'checkbox',
		)
	);

	/* ---------- Accueil : bannière & sections ---------- */
	$wp_customize->add_section(
		'neodyr_home',
		array(
			'title'       => __( 'Accueil : bannière & sections', 'neodyr-access' ),
			'description' => __( 'Bannière d\'accueil et blocs de mise en avant affichés en haut de la page d\'accueil.', 'neodyr-access' ),
			'priority'    => 43,
		)
	);

	$home_fields = array(
		'neodyr_hero_enable'    => array( 'checkbox', __( 'Afficher la bannière d\'accueil', 'neodyr-access' ), true ),
		'neodyr_hero_eyebrow'   => array( 'text', __( 'Sur-titre (petit texte au-dessus)', 'neodyr-access' ), '' ),
		'neodyr_hero_title'     => array( 'text', __( 'Titre de la bannière', 'neodyr-access' ), '' ),
		'neodyr_hero_subtitle'  => array( 'textarea', __( 'Sous-titre', 'neodyr-access' ), '' ),
		'neodyr_hero_btn1_text' => array( 'text', __( 'Bouton 1 — libellé', 'neodyr-access' ), '' ),
		'neodyr_hero_btn1_url'  => array( 'url', __( 'Bouton 1 — lien', 'neodyr-access' ), '' ),
		'neodyr_hero_btn2_text' => array( 'text', __( 'Bouton 2 — libellé', 'neodyr-access' ), '' ),
		'neodyr_hero_btn2_url'  => array( 'url', __( 'Bouton 2 — lien', 'neodyr-access' ), '' ),
		'neodyr_features_enable' => array( 'checkbox', __( 'Afficher les 3 blocs de mise en avant', 'neodyr-access' ), false ),
		'neodyr_cta_enable'      => array( 'checkbox', __( 'Afficher la bande d\'appel à l\'action', 'neodyr-access' ), false ),
		'neodyr_cta_title'       => array( 'text', __( 'Appel à l\'action — titre', 'neodyr-access' ), '' ),
		'neodyr_cta_text'        => array( 'textarea', __( 'Appel à l\'action — texte', 'neodyr-access' ), '' ),
		'neodyr_cta_btn_text'    => array( 'text', __( 'Appel à l\'action — bouton', 'neodyr-access' ), '' ),
		'neodyr_cta_btn_url'     => array( 'url', __( 'Appel à l\'action — lien', 'neodyr-access' ), '' ),
	);
	foreach ( array( 1, 2, 3 ) as $i ) {
		/* translators: %d : numéro du bloc. */
		$home_fields[ "neodyr_feature{$i}_icon" ] = array( 'text', sprintf( __( 'Bloc %d — icône (emoji)', 'neodyr-access' ), $i ), '' );
		/* translators: %d : numéro du bloc. */
		$home_fields[ "neodyr_feature{$i}_title" ] = array( 'text', sprintf( __( 'Bloc %d — titre', 'neodyr-access' ), $i ), '' );
		/* translators: %d : numéro du bloc. */
		$home_fields[ "neodyr_feature{$i}_text" ] = array( 'textarea', sprintf( __( 'Bloc %d — texte', 'neodyr-access' ), $i ), '' );
	}
	foreach ( $home_fields as $id => $conf ) {
		list( $type, $label, $default ) = $conf;

		$sanitize = 'checkbox' === $type ? 'neodyr_sanitize_checkbox' : ( 'url' === $type ? 'esc_url_raw' : ( 'textarea' === $type ? 'sanitize_textarea_field' : 'sanitize_text_field' ) );
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $default,
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $label,
				'section' => 'neodyr_home',
				'type'    => $type,
			)
		);
	}

	$wp_customize->add_setting(
		'neodyr_hero_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'neodyr_hero_image',
			array(
				'label'       => __( 'Image de fond de la bannière', 'neodyr-access' ),
				'description' => __( 'Un voile aux couleurs du thème est appliqué pour garder le texte lisible (contraste AA).', 'neodyr-access' ),
				'section'     => 'neodyr_home',
			)
		)
	);

	/* ---------- Pied de page : copyright & réseaux ---------- */
	$wp_customize->add_section(
		'neodyr_footer',
		array(
			'title'    => __( 'Pied de page', 'neodyr-access' ),
			'priority' => 45,
		)
	);
	$wp_customize->add_setting(
		'neodyr_footer_about',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'neodyr_footer_about',
		array(
			'label'       => __( 'Texte de présentation (pied de page)', 'neodyr-access' ),
			'description' => __( 'Courte description ou adresse affichée sous le nom du site.', 'neodyr-access' ),
			'section'     => 'neodyr_footer',
			'type'        => 'textarea',
		)
	);
	$wp_customize->add_setting(
		'neodyr_footer_copyright',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		'neodyr_footer_copyright',
		array(
			'label'       => __( 'Texte de copyright personnalisé', 'neodyr-access' ),
			'description' => __( 'Laissez vide pour afficher « © année Nom du site ».', 'neodyr-access' ),
			'section'     => 'neodyr_footer',
			'type'        => 'text',
		)
	);
	foreach ( neodyr_social_networks() as $key => $net ) {
		$wp_customize->add_setting(
			"neodyr_social_{$key}",
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			"neodyr_social_{$key}",
			array(
				/* translators: %s : nom du réseau social. */
				'label'   => sprintf( __( 'Lien %s', 'neodyr-access' ), $net['label'] ),
				'section' => 'neodyr_footer',
				'type'    => 'url',
			)
		);
	}

	/* ---------- Barre de contact (haut de page) ---------- */
	$wp_customize->add_section(
		'neodyr_topbar',
		array(
			'title'       => __( 'Barre de contact (haut de page)', 'neodyr-access' ),
			'description' => __( 'Bandeau affiché tout en haut du site, avant le menu. Laissez les champs vides pour le masquer.', 'neodyr-access' ),
			'priority'    => 41,
		)
	);
	$neodyr_topbar_fields = array(
		'neodyr_topbar_phone'   => __( 'Téléphone', 'neodyr-access' ),
		'neodyr_topbar_email'   => __( 'Adresse e-mail', 'neodyr-access' ),
		'neodyr_topbar_address' => __( 'Adresse', 'neodyr-access' ),
	);
	foreach ( $neodyr_topbar_fields as $neodyr_tid => $neodyr_tlabel ) {
		$wp_customize->add_setting(
			$neodyr_tid,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$neodyr_tid,
			array(
				'label'   => $neodyr_tlabel,
				'section' => 'neodyr_topbar',
				'type'    => 'text',
			)
		);
	}
}
add_action( 'customize_register', 'neodyr_customize_register' );

/**
 * Injecte les variables CSS dynamiques (palette + largeur de contenu).
 */
function neodyr_head_css() {
	$vars     = '';
	$key      = neodyr_sanitize_palette( get_theme_mod( 'neodyr_palette', 'neodyr' ) );
	$palettes = neodyr_palettes();
	$p        = $palettes[ $key ];

	// Palette (si différente du défaut déjà présent dans style.css).
	if ( 'neodyr' !== $key ) {
		$vars .= sprintf(
			'--nd-primary:%1$s;--nd-primary-d:%2$s;--nd-focus:%1$s;--nd-focus-ring:%3$s;',
			$p['primary'],
			$p['primary_d'],
			$p['ring']
		);
	}

	// Largeur de contenu.
	$widths    = neodyr_content_widths();
	$width_key = neodyr_sanitize_content_width( get_theme_mod( 'neodyr_content_width', 'wide' ) );
	$vars     .= '--nd-content:' . $widths[ $width_key ]['value'] . ';';

	// Image de fond de la bannière + voile teinté (contraste AA garanti).
	$extra    = '';
	$hero_img = get_theme_mod( 'neodyr_hero_image', '' );
	if ( $hero_img ) {
		$hex   = ltrim( $p['primary_d'], '#' );
		$r     = hexdec( substr( $hex, 0, 2 ) );
		$g     = hexdec( substr( $hex, 2, 2 ) );
		$b     = hexdec( substr( $hex, 4, 2 ) );
		$extra = sprintf(
			'.neodyr-hero{background:linear-gradient(rgba(%1$d,%2$d,%3$d,0.70),rgba(%1$d,%2$d,%3$d,0.84)),url(%4$s) center/cover;}',
			$r,
			$g,
			$b,
			esc_url( $hero_img )
		);
	}

	if ( '' !== $vars || '' !== $extra ) {
		printf( '<style id="neodyr-options">:root{%s}%s</style>', $vars, $extra ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CSS interne, valeurs contrôlées et échappées.
	}
}
add_action( 'wp_head', 'neodyr_head_css' );
