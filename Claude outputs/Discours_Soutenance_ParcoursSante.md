# 🎤 Discours de soutenance — Parcours Santé

*À la première personne, slide par slide. Ce n'est pas à réciter mot pour mot : c'est ta trame. Dis-le avec tes mots, respire, et regarde le jury.*
*Objectif ~45 min : ≈ 20 min de présentation + 7 min de démo + le reste en échange.*

---

### 🖥️ Slide 1 — Couverture
Bonjour, je m'appelle […]. Je vais vous présenter **Parcours Santé**, mon projet pour le titre de Concepteur Développeur d'Applications. C'est une application née d'une expérience personnelle, et je vais vous raconter comment elle est née, comment je l'ai conçue et comment je l'ai développée.

### 🖥️ Slide 2 — Qui suis-je ?
D'abord, un mot sur moi en une minute. *(présente ton parcours, ta formation, et ta motivation)*. Ce qui compte, c'est que ce projet n'est pas sorti de nulle part : il est né de mon vécu, et j'y reviens tout de suite.

### 🖥️ Slide 3 — Parcours Santé
Voici Parcours Santé. Une application pensée pour un patient : ses prochains rendez-vous, ses médicaments du jour, sa dernière note de journal — tout au même endroit, en un coup d'œil. Avant de vous expliquer comment je l'ai construite, laissez-moi vous dire d'où elle vient.

### 🖥️ Slide 4 — C'est quoi le projet ?
Avant d'écrire la moindre ligne de code, la première chose à faire, c'est de trouver **le problème à résoudre**. Et ce problème, je ne l'ai pas cherché : je l'ai vécu.

### 🖥️ Slide 5 — Les problèmes à résoudre
Confronté moi-même à la maladie et à son traitement, j'ai découvert trois difficultés au quotidien. **L'organisation** : des rendez-vous, des traitements, des symptômes dispersés partout. **Le rappel** : se souvenir de prendre chaque médicament à la bonne heure. Et **la communication** : garder une trace claire de ses symptômes pour en parler à son médecin. Et je n'ai trouvé aucun outil simple, gratuit et en français qui réunissait tout ça.

### 🖥️ Slide 6 — La Solution
Face à ce constat, j'ai décidé de construire la solution moi-même. C'était le début de quelque chose de plus grand : un outil pensé par un patient, pour des patients.

### 🖥️ Slide 7 — Développer une application
Ma réponse : développer une application. Simple, en français, qui regroupe tout ce dont le patient a besoin pour suivre son parcours de soin.

### 🖥️ Slide 8 — Centraliser le parcours de soin
Parcours Santé s'organise autour de trois modules. **Un**, les rendez-vous : les centraliser avec la date, le lieu, le médecin et des notes. **Deux**, les médicaments : suivre son traitement et recevoir des rappels de prise. **Trois**, le journal des symptômes : noter l'intensité de 1 à 10 et visualiser l'évolution sur trente jours. Le tout complété par un tableau de bord à la connexion.

### 🖥️ Slide 9 — Personas
Mais était-ce seulement mon besoin à moi ? Pour le vérifier, je ne me suis pas fié à mon seul ressenti : je suis allé à la rencontre de patients et j'ai mené des entretiens.

### 🖥️ Slide 10 — Personas (les 3 profils)
J'en ai tiré trois personas. **Marie**, 47 ans, en chimiothérapie, veut tout au même endroit sans se compliquer la vie. **Robert**, 68 ans, vit seul, peu à l'aise avec les applis : il a besoin que ce soit clair et qu'on le lui rappelle. **Sarah**, 32 ans, développeuse, très organisée, veut suivre précisément l'évolution de ses symptômes. Trois profils différents, mais les mêmes difficultés : le besoin était réel et partagé.

### 🖥️ Slide 11 — Version présentée / Évolution prévue
Un mot sur le périmètre. La version que je vous présente aujourd'hui est une **application web responsive**, développée avec Symfony : un produit complet et cohérent de bout en bout, accessible depuis un navigateur sans installation. L'évolution prévue, c'est l'**application mobile native**, avec des notifications push et un accès hors ligne, en réutilisant la même base et la même logique via une API. J'ai fait le choix du web pour livrer quelque chose de complet, plutôt qu'un mobile partiel.

### 🖥️ Slide 12 — Démonstration en direct
Je vous propose maintenant de vous montrer l'application en direct.

> 🔴 **[DÉMO ~7 min — suis ton script : connexion → tableau de bord → ajout rendez-vous → médicament + popup → journal + graphique. Une action = une phrase technique. Ralentis.]**

À la fin de la démo : « Voilà le parcours complet ; je reste à votre disposition pour rentrer dans le code de la partie qui vous intéresse. Maintenant, laissez-moi vous montrer comment tout cela a été conçu et construit. »

---

### 🖥️ Slide 13 — Conception & réalisation
Passons à la conception et à la réalisation technique : comment j'ai organisé le projet, modélisé les données, structuré le code, puis développé et sécurisé l'application.

### 🖥️ Slide 14 — Comment j'ai organisé le projet
J'ai mené ce projet avec une **méthode agile**, de type Kanban, à l'aide de Trello. Chaque fonctionnalité était une carte que je faisais avancer d'une colonne à l'autre : « À faire », « En cours », « Terminé ». Ça m'a permis d'avancer par petites étapes et de toujours voir où j'en étais — ce qui était précieux vu mes contraintes de santé.

### 🖥️ Slide 15 — Planning (diagramme de Gantt)
Voici le planning du projet, de février à août 2026, sous forme de diagramme de Gantt : le cadrage et l'analyse du besoin, la conception, le développement des fonctionnalités, puis les tests et la documentation. Certaines phases se chevauchent, ce qui est cohérent avec une méthode agile où l'on avance par itérations.

### 🖥️ Slide 16 — De l'analyse à la priorisation (MoSCoW)
À partir des besoins, j'ai écrit des **user stories** que j'ai priorisées avec la méthode **MoSCoW** : ce qui est indispensable — « Must have » —, ce qui est important, ce qui est bonus, et ce qui attendra une version future. Ça m'a permis de me concentrer d'abord sur l'essentiel : gérer les rendez-vous, les médicaments et le journal.

### 🖥️ Slide 17 — Architecture technique en couches (MVC)
J'ai structuré mon application en **couches**, selon le patron **MVC** : la présentation avec Twig, le contrôleur qui orchestre, la logique métier, l'accès aux données et la persistance. Chaque couche a son rôle : c'est plus clair, et surtout réutilisable — c'est ce qui permettra demain de brancher une application mobile sur la même logique.

### 🖥️ Slide 18 — Conception des données : le MCD (Merise)
Pour la base de données, j'ai utilisé la méthode **Merise**. Voici le premier niveau, le **modèle conceptuel** : une vue d'ensemble, sans technique. J'ai identifié **7 entités** — patient, rendez-vous, médicament, prise, journal, symptôme, catégorie — et surtout leurs relations. Par exemple, un patient a plusieurs rendez-vous, mais chaque rendez-vous appartient à un seul patient : c'est une relation « un à plusieurs ».

> 💡 **Si tu as inséré le slide MLD ici**, ajoute : « Ensuite, le niveau logique : les entités deviennent des tables et les relations deviennent des clés étrangères — par exemple `user_id` dans la table rendez-vous. »

### 🖥️ Slide 19 — Du conceptuel au physique (MLD & MPD)
J'ai ensuite transformé ce modèle en **modèle physique**, la version concrète prête pour MySQL. Chaque entité est devenue une **table**, chaque information a un **type** — texte, nombre, date — et les tables sont reliées par des **clés**. La clé primaire identifie chaque ligne de façon unique, la clé étrangère fait le lien avec une autre table.

### 🖥️ Slide 20 — Conception UML : cas d'utilisation
Je suis ensuite passé à la conception de l'application avec **UML**. Ce diagramme de **cas d'utilisation** montre qui fait quoi : l'acteur, c'est le patient, et voici tout ce qu'il peut faire — s'inscrire, se connecter, gérer ses rendez-vous et ses médicaments, tenir son journal, consulter son tableau de bord. Ça m'a servi à définir le périmètre de l'application.

### 🖥️ Slide 21 — Conception UML : classes & séquence
Deux autres schémas UML. À gauche, le **diagramme de classes** : la structure de mon code, avec chaque classe, ses informations et ses actions. À droite, le **diagramme de séquence** de l'action « ajouter un médicament » : il montre le déroulé dans le temps — le patient remplit le formulaire, la vue l'envoie au contrôleur, qui passe par le repository pour enregistrer en base. On voit bien qui parle à qui, et dans quel ordre.

### 🖥️ Slide 22 — Choix technologiques
Voici mes choix techniques. **Symfony 7.4** et **PHP 8.2** pour le back-end, **Twig** et **Tailwind CSS** pour les interfaces, **Chart.js** pour les graphiques, **MySQL** avec **Doctrine** comme ORM pour la base, le tout dans un environnement **WAMP** en local, et **Git** pour le versionnement. J'ai fait ces choix pour leur robustesse et parce que je les maîtrise.

---

### 🖥️ Slide 23 — Deux fonctionnalités en détail
Je vais maintenant zoomer sur deux fonctionnalités qui montrent bien la logique technique du projet : les rappels de médicament, et le journal avec son graphique.

### 🖥️ Slide 24 — Fonctionnalité 1 : les rappels de médicament
Première fonctionnalité : les rappels. Ce n'est pas une page web, c'est une **commande console Symfony**. Quand on la lance, elle demande au repository toutes les prises non effectuées, retrouve pour chacune le médicament et le patient, et envoie un **email de rappel** via Symfony Mailer — en développement, capturé par Mailtrap. Aujourd'hui je la lance manuellement pour démontrer le mécanisme ; son automatisation par une tâche planifiée est prévue.

### 🖥️ Slide 25 — Rappels : diagramme d'activité
Voici la même fonctionnalité vue sous l'angle de la conception : le **diagramme d'activité**. Il montre la logique pas à pas — on parcourt les prises non effectuées, pour chacune on vérifie l'échéance, on prépare et on envoie l'email, et on continue jusqu'à la dernière. C'est ce schéma qui a guidé l'écriture de ma commande.

### 🖥️ Slide 26 — Fonctionnalité 2 : le journal & le graphique
Deuxième fonctionnalité : le journal. Le patient note son symptôme, son intensité de 1 à 10 et une remarque. Point technique important : le serveur fournit les données, Twig les injecte dans la page, mais c'est **Chart.js, côté navigateur**, qui dessine la courbe. Le serveur ne génère pas d'image. Ce graphique est pensé comme un support de dialogue avec l'équipe soignante.

### 🖥️ Slide 27 — Journal : diagramme de séquence
Et voici le diagramme de séquence du journal : le patient demande la page, le contrôleur interroge le repository, récupère les entrées, Twig construit la page et transmet les données à Chart.js qui trace la courbe. Ce schéma montre bien la séparation des rôles entre le serveur et le client.

### 🖥️ Slide 28 — Sécurité & données de santé
Comme l'application manipule des données de santé, très sensibles, la sécurité était centrale. Les **mots de passe sont hachés** par le composant Security de Symfony, de façon irréversible. Chaque patient n'accède **qu'à ses propres données**. Les formulaires sont protégés contre le **CSRF** par un jeton. Et je respecte les principes du **RGPD** : minimisation des données et HTTPS en production.

### 🖥️ Slide 29 — Tests & qualité
Pour garantir la qualité, j'ai mis en place des **tests unitaires** avec PHPUnit sur ma logique métier — par exemple la méthode `isActif()` d'un médicament, en vérifiant les cas expiré, à venir et en cours. Ils passent : 7 tests, 8 assertions. L'étape suivante serait d'ajouter des tests fonctionnels, que j'ai identifiée comme axe d'amélioration.

### 🖥️ Slide 30 — Déploiement
Aujourd'hui, l'application tourne en local sur WAMP, avec le code versionné sur Git. Pour la mise en production, j'ai préparé une **procédure reproductible** : récupération du code, installation des dépendances, application des migrations Doctrine pour reconstruire la base, et activation du HTTPS.

### 🖥️ Slide 31 — Stratégie de déploiement continu (CI/CD)
Pour aller plus loin, voici la stratégie de déploiement continu que j'ai imaginée : à chaque envoi de code sur la branche principale, une chaîne automatique lance les tests, construit une image Docker, puis le serveur distant se connecte en SSH et reconstruit le conteneur. C'est une perspective : elle n'est pas encore en place, mais je sais comment la mettre en œuvre.

---

### 🖥️ Slide 32 — Un projet ancré dans une institution de soin
Au-delà de l'examen, le projet a trouvé un écho concret. Je l'ai **présenté au service informatique du Centre Léon Bérard**, où je suis soigné, et l'équipe s'y est intéressée : elle envisage de le reprendre et de l'adapter. C'est une collaboration bénévole, née de ma situation de patient — et ça renforce l'exigence de sérieux sur la sécurité des données.

### 🖥️ Slide 33 — Difficultés rencontrées
Les difficultés ont été réelles. D'abord mener ce projet **seul, en parallèle d'un traitement**. Ensuite, sur le plan technique : modéliser proprement les données, faire évoluer la base sans casser l'existant, et comprendre certains mécanismes de mon environnement — par exemple le cycle de vie de Turbo pour l'affichage de mon graphique. Chaque difficulté m'a fait progresser.

### 🖥️ Slide 34 — Ce que ce projet m'a apporté
Ce projet m'a appris à **concevoir à partir d'un vrai besoin**, validé par des utilisateurs, et non d'un cahier des charges théorique. À mener un projet **de bout en bout, seul**, de l'idée à la préparation de la mise en production. À résoudre par moi-même des problèmes que je n'avais pas anticipés. Et surtout, à relier un **besoin humain réel** à une solution technique.

### 🖥️ Slide 35 — Perspectives
Pour la suite, côté technique : automatiser l'envoi des rappels, ajouter les notifications push, mettre en place des tests fonctionnels, renforcer la conformité RGPD, et conteneuriser l'application. Et ensuite, comme annoncé au début, l'**application mobile**, qui réutilisera la base et la logique via une API. Le projet est pensé comme une première brique, pas comme un aboutissement.

### 🖥️ Slide 36 — Conclusion
Pour conclure : Parcours Santé est né d'une **expérience personnelle**, celle d'un patient confronté à la charge d'organisation qu'impose un parcours de soin. Ce qui a commencé comme un projet de fin d'année pourrait devenir un outil au service de personnes qui traversent la même épreuve. Et ça, pour moi, c'est la plus belle réussite.

### 🖥️ Slide 37 — Merci
Je vous remercie de votre attention. Je suis à votre disposition pour vos questions.

---

## ⏱️ Repères de timing
- **Slides 1 à 11** (le besoin + la solution) : ~8 min
- **Slide 12** — démonstration : ~7 min
- **Slides 13 à 22** (conception) : ~7 min
- **Slides 23 à 31** (fonctionnalités, sécurité, tests, déploiement) : ~7 min
- **Slides 32 à 37** (bilan) : ~4 min
- **Total ≈ 33 min** de présentation → il te reste de la marge pour les questions.

## 🎤 Les 4 réflexes du jour J
1. **Respire et ralentis.** Sous stress, on accélère. Marque un temps entre chaque partie.
2. **Regarde le jury**, pas tes slides. Les slides sont un support, pas ton texte.
3. **Sois honnête** sur ce qui est fait vs prévu (le CI/CD, le mobile, les tests fonctionnels = perspectives). C'est ça qui te rend crédible.
4. **Ramène toujours au « pourquoi »** : ce projet vient d'un vrai besoin. C'est ta force, personne d'autre ne l'a.

**Tu as tout construit toi-même. Le jour J, tu ne récites pas : tu racontes ton histoire. 💪**
