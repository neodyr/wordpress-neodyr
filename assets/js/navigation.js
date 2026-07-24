/**
 * Menu principal accessible — Neodyr Access.
 *
 * - Bouton hamburger piloté au clavier, avec aria-expanded synchronisé.
 * - Fermeture à la touche Échap (RGAA 7.3 / WCAG 2.1.1 — clavier).
 * - Aucune dépendance.
 */
( function () {
	'use strict';

	var nav = document.getElementById( 'site-navigation' );
	if ( ! nav ) {
		return;
	}

	var toggle = nav.querySelector( '.menu-toggle' );
	var menu = nav.querySelector( 'ul' );
	if ( ! toggle || ! menu ) {
		return;
	}

	function setOpen( open ) {
		nav.classList.toggle( 'is-open', open );
		toggle.setAttribute( 'aria-expanded', open ? 'true' : 'false' );
	}

	toggle.addEventListener( 'click', function () {
		var open = toggle.getAttribute( 'aria-expanded' ) === 'true';
		setOpen( ! open );
	} );

	// Échap ferme le menu et redonne le focus au bouton.
	nav.addEventListener( 'keydown', function ( e ) {
		if ( e.key === 'Escape' && toggle.getAttribute( 'aria-expanded' ) === 'true' ) {
			setOpen( false );
			toggle.focus();
		}
	} );
}() );
