# 📚 Fiche de définitions — Parcours Santé

*Aide-mémoire à relire la veille. Pour chaque terme : la définition + à quoi ça sert. Dis-le avec tes mots.*

---

## 🗂️ Gérer le projet

### Agile
**Définition :** une façon de gérer un projet **par petites étapes** (des cycles courts) plutôt que tout d'un coup, en s'adaptant au fur et à mesure.
**À quoi ça sert :** livrer régulièrement quelque chose qui marche et pouvoir corriger le tir en cours de route.
*Chez moi : seul, j'ai utilisé un Kanban (approche agile), pas du Scrum complet qui demande une équipe.*

### MoSCoW
**Définition :** une méthode de **priorisation** des fonctionnalités : **M**ust have (indispensable), **S**hould have (important), **C**ould have (bonus), **W**on't have (pas maintenant).
**À quoi ça sert :** décider **quoi développer en premier** et ne pas se disperser.

### Kanban
**Définition :** une méthode **visuelle** de suivi du travail : un tableau à colonnes (**À faire → En cours → Terminé**) où chaque tâche est une **carte** qu'on déplace.
**À quoi ça sert :** voir **où en est** chaque tâche d'un coup d'œil.
*Chez moi : avec Trello.*

### Diagramme de Gantt
**Définition :** un **planning en barres** posées sur une frise du temps : chaque barre = une tâche, sa longueur = sa durée.
**À quoi ça sert :** planifier le projet dans le temps — voir **quand** chaque phase se déroule et ce qui se chevauche.

> 💡 **Kanban = où en est la tâche. Gantt = quand elle se déroule.**

---

## 🎨 Concevoir l'interface (design / UX)

### Wireframe
**Définition :** un **croquis** en noir et blanc qui montre juste la **structure** de l'écran (où va quoi), sans couleurs ni détails.
**À quoi ça sert :** poser rapidement le squelette d'une page.

### Maquette (mockup)
**Définition :** la version **visuelle finale** avec couleurs, typographies et images, mais **figée** (non cliquable).
**À quoi ça sert :** valider le rendu graphique avant de coder.

### Prototype
**Définition :** une maquette **cliquable et interactive** dans laquelle on peut naviguer comme dans la vraie appli.
**À quoi ça sert :** **tester l'expérience utilisateur (UX)** avant de développer, et corriger tôt (moins cher que dans le code).

### Figma
**Définition :** l'**outil de design d'interface** que j'ai utilisé pour faire mes wireframes, maquettes et prototypes.

> 💡 **Wireframe = le squelette · Maquette = le visuel · Prototype = le cliquable.**

---

## 🗄️ Concevoir la base de données (Merise)

### Merise
**Définition :** une **méthode française** de conception, utilisée surtout pour concevoir la **base de données**, en **3 niveaux**.
**À quoi ça sert :** structurer la base sur papier **avant de coder**, pour éviter les erreurs.

### MCD — Modèle Conceptuel de Données
**Définition :** le schéma des **entités** (patient, médicament, rendez-vous…) et de leurs **relations**, **sans technique**.
**À quoi ça sert :** définir **quoi** stocker et **comment c'est lié**. *(le plan « idée »)*

### MLD — Modèle Logique de Données
**Définition :** la transformation du MCD en **tables**, avec les **clés étrangères** qui matérialisent les relations. Indépendant du logiciel de base de données.
**À quoi ça sert :** faire le **pont** entre l'idée (MCD) et le concret (MPD).

### MPD — Modèle Physique de Données
**Définition :** le MLD complété avec les **types SQL** (VARCHAR, INT, DATE…) et les clés, **prêt pour MySQL**.
**À quoi ça sert :** **créer réellement** la base de données. *(le plan « concret »)*

> 💡 **MCD = l'idée · MLD = les tables et leurs liens · MPD = le concret prêt pour MySQL.**

**Clés :** la **clé primaire (PK)** identifie chaque ligne de façon unique ; la **clé étrangère (FK)** fait le lien avec une autre table.

---

## 🧩 Concevoir l'application (UML)

### UML
**Définition :** un **langage de schémas** standard pour représenter une application (sa structure, son fonctionnement).
**À quoi ça sert :** décrire et faire comprendre l'application avant/pendant le développement.

### Diagramme de cas d'utilisation
**Définition :** un schéma qui montre **qui** (l'acteur, ici le patient) peut faire **quoi** (se connecter, gérer ses rendez-vous, tenir son journal…).
**À quoi ça sert :** définir **le périmètre** de l'appli (la liste de ce que l'utilisateur peut faire).

### Diagramme de classes
**Définition :** la **structure du code** : les classes (User, Médicament…) avec leurs **attributs** et leurs **méthodes**, et leurs liens.
**À quoi ça sert :** représenter l'organisation objet du programme.

### Diagramme de séquence
**Définition :** le **déroulé dans le temps** d'une action précise (ex. « ajouter un médicament ») : qui appelle qui, dans quel ordre.
**À quoi ça sert :** montrer **comment** une fonctionnalité s'exécute, étape par étape.

> 💡 **Classes = la structure · Séquence = le déroulé d'une action.**

---

## ⚙️ Développer (technique)

### MVC — Modèle / Vue / Contrôleur
**Définition :** une façon d'organiser le code en **séparant les rôles** : le **Modèle** (les données), la **Vue** (l'affichage, Twig), le **Contrôleur** (le chef d'orchestre qui reçoit la demande, cherche les données, renvoie la vue).
**À quoi ça sert :** un code plus clair, mieux organisé et plus facile à maintenir.

### Symfony
**Définition :** le **framework PHP** que j'ai utilisé pour développer l'application.
**À quoi ça sert :** fournir une base structurée (routes, contrôleurs, sécurité, formulaires…) au lieu de tout recoder.

### Doctrine (ORM)
**Définition :** un **ORM** (*Object-Relational Mapping*), le **pont** entre les objets PHP et les tables de la base.
**À quoi ça sert :** manipuler la base **avec des objets**, sans écrire de SQL à la main ; ça sécurise (contre les injections SQL) et gère les migrations.
*persist() prépare l'enregistrement, flush() l'exécute.*

### Repository
**Définition :** la classe où l'on écrit les **requêtes** liées à une entité (une par entité).
**À quoi ça sert :** centraliser l'accès aux données et garder les contrôleurs légers.

### Migration
**Définition :** un fichier versionné qui décrit une **modification de la base** (créer/modifier/supprimer une table).
**À quoi ça sert :** faire évoluer la base proprement, sans la casser, et de façon rejouable.

### Git / GitHub
**Définition :** **Git** = le logiciel de **gestion de versions** (historique du code) sur mon ordinateur ; **GitHub** = la **plateforme en ligne** qui héberge le dépôt.
**À quoi ça sert :** garder l'historique, revenir en arrière, sauvegarder en ligne et collaborer.

### PHPUnit (tests unitaires)
**Définition :** l'outil qui exécute des **tests automatiques** sur des bouts de logique (ex. la méthode isActif()).
**À quoi ça sert :** vérifier automatiquement que le code se comporte correctement.

### Chart.js
**Définition :** une **bibliothèque JavaScript** qui dessine des graphiques dans le navigateur.
**À quoi ça sert :** afficher la courbe d'évolution des symptômes côté client (le serveur fournit les données, Chart.js dessine).

---

## 🔒 Sécurité & données

### Hachage (hash)
**Définition :** transformer un mot de passe en une suite de caractères **irréversible** (on ne peut pas revenir en arrière).
**À quoi ça sert :** ne jamais stocker les mots de passe en clair. À la connexion, on hache ce que l'utilisateur tape et on **compare** au hash stocké.

### CSRF
**Définition :** une attaque qui pousse un utilisateur à envoyer une action à son insu ; on s'en protège avec un **jeton** sur chaque formulaire.
**À quoi ça sert :** garantir que le formulaire vient bien de mon site.

### Injection SQL
**Définition :** une attaque qui insère du code malveillant dans une requête ; on s'en protège avec des **requêtes paramétrées** (ce que fait Doctrine).
**À quoi ça sert :** empêcher qu'on manipule la base via les champs de saisie.

### RGPD
**Définition :** la loi européenne qui protège les **données personnelles**.
**À quoi ça sert :** garantir minimisation des données, sécurité, accès limité, et les droits de l'utilisateur (consulter, corriger, supprimer). *Données de santé = sensibles, protection renforcée.*

### Accessibilité
**Définition :** rendre l'application utilisable par **tous**, y compris personnes âgées, fatiguées ou en situation de handicap (contrastes, lisibilité, boutons larges). Référentiel français : le **RGAA**.
**À quoi ça sert :** que personne ne soit exclu de l'usage de l'appli.

---

### 🎯 Le classement mental (si on te demande « à quoi sert telle méthode »)
- **Gérer le projet :** Agile, MoSCoW, Kanban, Gantt
- **Concevoir l'interface :** Wireframe, Maquette, Prototype (Figma)
- **Concevoir la base de données :** Merise → MCD, MLD, MPD
- **Concevoir l'application :** UML → cas d'usage, classes, séquence
- **Développer :** MVC, Symfony, Doctrine, Git, PHPUnit
- **Sécuriser :** hash, CSRF, injection SQL, RGPD, accessibilité

**Tu connais tout ça — tu l'as fait. Relis, respire, et raconte-le simplement. 💪**
