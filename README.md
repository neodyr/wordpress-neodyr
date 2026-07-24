# Neodyr Access — thème WordPress accessible (RGAA / WCAG)

Un thème WordPress **classique, léger et sans dépendance**, conçu dès le départ pour
l'accessibilité numérique : conforme aux exigences **RGAA 4.1** et **WCAG 2.1 niveau AA**
au niveau du gabarit.

Écrit à la main, sans page builder ni framework, pour un contrôle total du HTML rendu —
et un code que vous pouvez lire, auditer et adapter.

> Développé et maintenu par [**Neodyr**](https://neodyr.com), spécialiste de l'audit et de
> la mise en conformité RGAA.

---

## ✨ Ce que le thème garantit (au niveau du gabarit)

- **Structure sémantique & repères ARIA** — `banner`, `navigation`, `main`, `contentinfo`,
  `complementary` correctement posés (RGAA 12.6).
- **Lien d'évitement fonctionnel** vers le contenu principal, visible au focus clavier (12.7).
- **Navigation 100 % clavier** — menu mobile piloté au clavier, `aria-expanded` synchronisé,
  fermeture à la touche Échap (7.3).
- **Focus toujours visible** — jamais de `outline: none` sans remplacement (10.7).
- **Contrastes conformes AA** — palette calculée (texte 13:1, vert d'accent 5.9:1 sur blanc).
- **Titres hiérarchisés** — un seul `<h1>` par page, sans saut de niveau (9.1).
- **Formulaires accessibles** — recherche et commentaires avec étiquettes reliées aux champs,
  champs requis signalés autrement que par la seule couleur (11.x).
- **Intitulés de liens explicites** — les « Lire la suite » embarquent le titre de l'article
  pour les lecteurs d'écran (6.1).
- **Ouverture de nouvel onglet signalée** (13.2), attributs `title` vides supprimés.
- **Respect de `prefers-reduced-motion`** et redimensionnement du texte sans perte.
- **Palette et styles de l'éditeur** alignés sur le rendu : les rédacteurs voient les vraies
  couleurs conformes dès l'écriture.

## ⚠️ Important : un thème accessible ≠ un site conforme

La conformité RGAA se mesure sur le **site final rendu**, pas sur le thème seul. Ce thème vous
donne un **socle irréprochable**, mais trois choses restent sous votre responsabilité :

1. **Le contenu que vous ajoutez** — alternatives des images, PDF accessibles, tableaux de
   données correctement balisés, pas de « cliquez ici ».
2. **Les extensions (plugins)** — formulaires, carrousels, bannière cookies… peuvent introduire
   du code non accessible.
3. **Les blocs / mises en page** complexes.

Autrement dit : ce thème fait **tout ce qu'un thème peut faire**. Le reste se joue dans le
contenu et les extensions — c'est là qu'un **audit** et une **formation des équipes** prennent
le relais. [Neodyr peut vous accompagner](https://neodyr.com).

## 🚀 Installation

1. Téléchargez ce dépôt (ZIP) ou clonez-le.
2. Placez le dossier dans `wp-content/themes/` (le dossier doit s'appeler `wordpress-neodyr`).
3. Dans l'administration WordPress : **Apparence → Thèmes → Activer « Neodyr Access »**.
4. Créez vos menus dans **Apparence → Menus** et assignez-les aux emplacements
   « Menu principal » et « Menu du pied de page ».

**Prérequis** : WordPress 6.0+, PHP 7.4+.

## 🧪 Vérifier l'accessibilité

Le gabarit est pensé pour passer les contrôles automatiques (axe-core, IBM Equal Access,
validateur W3C) sans violation. Pour un vrai audit RGAA (les critères non automatisables :
lecteur d'écran, pertinence des contenus…), une évaluation humaine reste nécessaire.

## 🧰 Développement & tests

Une intégration continue (GitHub Actions) vérifie chaque *push* et *pull request* :

- **Lint PHP** — validité de la syntaxe sur PHP 7.4 à 8.3.
- **WordPress Coding Standards** — PHPCS (`WordPress-Extra` + compatibilité PHP).
- **Accessibilité** — un WordPress réel est démarré (`wp-env`), le thème activé, et le site
  est audité par **pa11y** (moteurs *axe* et *HTML_CodeSniffer*) au niveau WCAG 2.1 AA.

En local :

```bash
composer install        # outils de qualité de code
composer lint           # PHPCS (standards WordPress)

npm install             # environnement de test
npm run env:start       # démarre WordPress sur http://localhost:8888
npm run test:a11y       # audit d'accessibilité pa11y
npm run env:stop
```

## 🤝 Contribuer

Les remontées et contributions sont bienvenues : ouvrez une *issue* ou une *pull request*.
Toute contribution doit préserver — ou améliorer — le niveau d'accessibilité.

## 📄 Licence

Distribué sous licence **GNU General Public License v2 ou ultérieure** (GPLv2+),
conformément à l'écosystème WordPress. Voir le fichier [LICENSE](LICENSE).

## À propos de Neodyr

[**Neodyr**](https://neodyr.com) réalise des **audits RGAA**, accompagne la **mise en
conformité** et **forme les équipes** à l'accessibilité numérique. Fondé par un architecte
technique : on ne se contente pas de pointer les problèmes, on montre comment les corriger,
dans le code.

- 🌐 Site : [neodyr.com](https://neodyr.com)
- 📚 Guide des 106 critères RGAA : [neodyr.com/guide-rgaa](https://neodyr.com/guide-rgaa/)
- ✉️ Contact : contact@neodyr.com
