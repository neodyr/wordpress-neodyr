<?php
/**
 * Neodyr Access — configuration du thème.
 *
 * Thème classique accessible (RGAA 4.1 / WCAG 2.1 AA).
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Accès direct interdit.
}

define( 'NEODYR_VERSION', '1.3.2' );

if ( ! function_exists( 'neodyr_setup' ) ) :
	/**
	 * Réglages du thème (déclarations de support).
	 */
	function neodyr_setup() {
		// Traductions.
		load_theme_textdomain( 'neodyr-access', get_template_directory() . '/languages' );

		// La balise <title> est gérée par WordPress (titre de page pertinent — RGAA 8.5).
		add_theme_support( 'title-tag' );

		// Liens de flux RSS automatiques dans l'en-tête.
		add_theme_support( 'automatic-feed-links' );

		// Images à la une, avec alternative éditable côté médiathèque.
		add_theme_support( 'post-thumbnails' );

		// Logo personnalisable (Personnaliser › Identité du site).
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 80,
				'width'       => 320,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		// HTML5 sémantique pour les éléments générés par WordPress.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Menus (intitulés de navigation cohérents d'une page à l'autre — RGAA 12.2).
		register_nav_menus(
			array(
				'primary' => __( 'Menu principal', 'neodyr-access' ),
				'footer'  => __( 'Menu du pied de page', 'neodyr-access' ),
			)
		);

		// Styles de l'éditeur alignés sur le rendu (contrastes conformes dès la rédaction).
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/editor.css' );

		// Prise en charge de l'éditeur de blocs et des médias.
		add_theme_support( 'align-wide' );          // largeurs « large » et « pleine ».
		add_theme_support( 'responsive-embeds' );   // vidéos/embeds responsives.
		add_theme_support( 'wp-block-styles' );      // styles par défaut des blocs.
		add_theme_support( 'custom-background' );     // couleur/image de fond personnalisable.

		// Couleur principale = celle de la palette choisie dans le Personnalisateur.
		$neodyr_palette_key = function_exists( 'neodyr_palettes' ) ? get_theme_mod( 'neodyr_palette', 'neodyr' ) : 'neodyr';
		$neodyr_all         = function_exists( 'neodyr_palettes' ) ? neodyr_palettes() : array();
		$neodyr_primary     = isset( $neodyr_all[ $neodyr_palette_key ]['primary'] ) ? $neodyr_all[ $neodyr_palette_key ]['primary'] : '#0a6b4a';

		// Palette de couleurs conforme AA proposée dans l'éditeur de blocs.
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'Encre', 'neodyr-access' ),
					'slug'  => 'ink',
					'color' => '#1a2230',
				),
				array(
					'name'  => __( 'Couleur principale', 'neodyr-access' ),
					'slug'  => 'primary',
					'color' => $neodyr_primary,
				),
				array(
					'name'  => __( 'Surface', 'neodyr-access' ),
					'slug'  => 'surface',
					'color' => '#f5f8fb',
				),
				array(
					'name'  => __( 'Blanc', 'neodyr-access' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
			)
		);

		// Largeur de contenu par défaut.
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 672;
		}
	}
endif;
add_action( 'after_setup_theme', 'neodyr_setup' );

/**
 * Feuilles de style et scripts.
 */
function neodyr_scripts() {
	wp_enqueue_style( 'neodyr-style', get_stylesheet_uri(), array(), NEODYR_VERSION );

	// Menu mobile accessible (clavier + aria-expanded) — chargé en pied de page.
	wp_enqueue_script(
		'neodyr-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		NEODYR_VERSION,
		true
	);

	// Threaded comments (réponses imbriquées).
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'neodyr_scripts' );

/**
 * Zone de widgets (barre latérale).
 */
function neodyr_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Barre latérale', 'neodyr-access' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Widgets affichés dans la barre latérale.', 'neodyr-access' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	foreach ( array( 1, 2, 3 ) as $neodyr_n ) {
		register_sidebar(
			array(
				/* translators: %d : numéro de la colonne. */
				'name'          => sprintf( __( 'Pied de page %d', 'neodyr-access' ), $neodyr_n ),
				'id'            => 'footer-' . $neodyr_n,
				'description'   => __( 'Colonne de widgets affichée dans le pied de page.', 'neodyr-access' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'neodyr_widgets_init' );

// Modules du thème.
require get_template_directory() . '/inc/accessibility.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer.php';

/**
 * La page courante affiche-t-elle la barre latérale (blog, archives, recherche, article) ?
 *
 * @return bool
 */
function neodyr_has_sidebar() {
	return is_active_sidebar( 'sidebar-1' ) && ( is_home() || is_archive() || is_search() || is_singular( 'post' ) );
}
