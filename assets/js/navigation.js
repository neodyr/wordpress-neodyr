/**
 * Menu principal accessible — Neodyr Access.
 *
 * - Bouton hamburger piloté au clavier, aria-expanded synchronisé.
 * - Sous-menus à 2 niveaux : bouton de divulgation par parent (aria-expanded),
 *   ouverture/fermeture au clavier, un seul sous-menu ouvert à la fois.
 * - Échap ferme le sous-menu (focus rendu au bouton) puis le menu mobile.
 * - Aucune dépendance.
 */
( function () {
	'use strict';

	var nav = document.getElementById( 'site-navigation' );
	if ( ! nav ) {
		return;
	}
	// Idempotence : ne pas initialiser deux fois (évite les boutons en double).
	if ( nav.dataset.neodyrNavInit ) {
		return;
	}
	nav.dataset.neodyrNavInit = '1';

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
		setOpen( toggle.getAttribute( 'aria-expanded' ) !== 'true' );
	} );

	/* ---------- Sous-menus ---------- */
	var parents = nav.querySelectorAll( '.menu-item-has-children' );

	function closeAll( except ) {
		Array.prototype.forEach.call( parents, function ( item ) {
			if ( item === except ) {
				return;
			}
			item.classList.remove( 'is-open' );
			var b = item.querySelector( ':scope > .submenu-toggle' );
			if ( b ) {
				b.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	}

	Array.prototype.forEach.call( parents, function ( item ) {
		var link = item.querySelector( ':scope > a' );
		var submenu = item.querySelector( ':scope > .sub-menu' );
		if ( ! link || ! submenu ) {
			return;
		}
		var btn = document.createElement( 'button' );
		btn.type = 'button';
		btn.className = 'submenu-toggle';
		btn.setAttribute( 'aria-expanded', 'false' );
		btn.innerHTML =
			'<span class="screen-reader-text">Afficher le sous-menu de « ' +
			link.textContent.trim() +
			' »</span><span aria-hidden="true">▾</span>';
		link.parentNode.insertBefore( btn, link.nextSibling );

		btn.addEventListener( 'click', function () {
			var open = btn.getAttribute( 'aria-expanded' ) === 'true';
			closeAll( item );
			item.classList.toggle( 'is-open', ! open );
			btn.setAttribute( 'aria-expanded', open ? 'false' : 'true' );
		} );
	} );

	/* ---------- Clavier ---------- */
	nav.addEventListener( 'keydown', function ( e ) {
		if ( e.key !== 'Escape' && e.key !== 'Esc' ) {
			return;
		}
		var openItem = nav.querySelector( '.menu-item-has-children.is-open' );
		if ( openItem ) {
			var b = openItem.querySelector( ':scope > .submenu-toggle' );
			openItem.classList.remove( 'is-open' );
			if ( b ) {
				b.setAttribute( 'aria-expanded', 'false' );
				b.focus();
			}
			return;
		}
		if ( toggle.getAttribute( 'aria-expanded' ) === 'true' ) {
			setOpen( false );
			toggle.focus();
		}
	} );

	// Clic en dehors du menu : referme les sous-menus.
	document.addEventListener( 'click', function ( e ) {
		if ( ! nav.contains( e.target ) ) {
			closeAll();
		}
	} );
}() );
