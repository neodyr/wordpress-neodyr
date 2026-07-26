<?php
/**
 * Ajustements d'accessibilité — Neodyr Access.
 *
 * Corrige à la source des points que WordPress laisse non conformes :
 * intitulés de liens explicites (RGAA 6.1), contexte des « lire la suite »,
 * pas d'attributs vides, etc.
 *
 * @package Neodyr_Access
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Rend le lien « Lire la suite » explicite en lui adjoignant le titre de l'article,
 * restitué aux technologies d'assistance (RGAA 6.1 — intitulé de lien pertinent).
 */
function neodyr_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	$link = sprintf(
		' <a class="more-link" href="%1$s">%2$s<span class="screen-reader-text"> %3$s</span></a>',
		esc_url( get_permalink( get_the_ID() ) ),
		esc_html__( 'Lire la suite', 'neodyr-access' ),
		esc_html( get_the_title( get_the_ID() ) )
	);
	return $link;
}
add_filter( 'excerpt_more', 'neodyr_excerpt_more' );

/**
 * Idem pour le « (more…) » du contenu (balise <!--more-->).
 */
function neodyr_content_more_link( $link ) {
	$sr = ' <span class="screen-reader-text">' . esc_html( get_the_title() ) . '</span>';
	return preg_replace( '/(<a [^>]*>)(.*)(<\/a>)/', '$1$2' . $sr . '$3', $link );
}
add_filter( 'the_content_more_link', 'neodyr_content_more_link' );

/**
 * Supprime les attributs `title` vides et les `title` redondants ajoutés par WordPress
 * sur certains liens (ils polluent la restitution vocale).
 */
function neodyr_remove_empty_title( $attr ) {
	if ( isset( $attr['title'] ) && '' === trim( $attr['title'] ) ) {
		unset( $attr['title'] );
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'neodyr_remove_empty_title' );

/**
 * Ajoute la mention « (ouvre un nouvel onglet) » aux liens marqués target="_blank"
 * dans le contenu (RGAA 13.2 — ouverture de nouvelle fenêtre signalée).
 */
function neodyr_flag_new_tab_links( $content ) {
	if ( is_admin() || empty( $content ) ) {
		return $content;
	}
	return preg_replace_callback(
		'/<a\s[^>]*target=["\']_blank["\'][^>]*>/i',
		function ( $m ) {
			$tag = $m[0];
			// N'ajoute rien si déjà présent.
			if ( stripos( $tag, 'aria-label' ) !== false || stripos( $tag, 'nouvel onglet' ) !== false ) {
				return $tag;
			}
			return str_replace( '>', ' data-newtab="1">', $tag );
		},
		$content
	);
}
add_filter( 'the_content', 'neodyr_flag_new_tab_links', 20 );

/**
 * Ajoute un identifiant de langue de page valide et pertinent (RGAA 8.3 / 8.4).
 * (WordPress gère déjà lang via language_attributes() ; on s'assure qu'il est présent.)
 */
function neodyr_html_lang_class( $output ) {
	if ( false === strpos( $output, 'lang=' ) ) {
		$output .= ' lang="' . esc_attr( get_bloginfo( 'language' ) ) . '"';
	}
	return $output;
}
add_filter( 'language_attributes', 'neodyr_html_lang_class' );
