# 🎤 Fiche de révision — Les questions du jury

> Basée sur les vraies questions posées aux candidats. Pour chaque question : une réponse **simple**, à dire avec tes mots. Ne récite pas, **raconte**.

---

## 1. La méthode Agile / SCRUM

**Ce qu'il faut dire :**
> « Agile, c'est une façon de gérer un projet **par petits morceaux** plutôt que tout d'un coup. On avance par **cycles courts** (des *sprints*), et à la fin de chaque cycle on a quelque chose qui marche. Ça permet de s'adapter au fur et à mesure. »

**Le vocabulaire SCRUM à connaître (au cas où ils creusent) :**
- **Sprint** : un cycle court (1 à 4 semaines) au bout duquel on livre une fonctionnalité qui marche.
- **Product Backlog** : la liste de tout ce qu'il y a à faire, **priorisée**.
- **Les 3 rôles** : le **Product Owner** (décide quoi faire et dans quel ordre), le **Scrum Master** (aide l'équipe, enlève les blocages), et l'**équipe de développement**.
- **Le daily** : un point rapide chaque jour.
- **La rétrospective** : à la fin du sprint, on regarde ce qui a bien/mal marché.

**Adapté à TON projet (à dire honnêtement) :**
> « Comme j'étais **seul**, je n'ai pas fait du Scrum complet qui demande une équipe. J'ai utilisé un **Kanban avec Trello** — une approche agile : mes fonctionnalités étaient des cartes que je faisais avancer de « À faire » vers « En cours » puis « Terminé ». »

---

## 2. MVC (et comment ça marche)

> « MVC veut dire **Modèle - Vue - Contrôleur**. C'est une façon d'organiser le code en **séparant les rôles** :
> - le **Modèle**, ce sont mes **données** et la logique métier — mes entités comme Médicament ou Rendez-vous ;
> - la **Vue**, c'est ce que l'utilisateur voit à l'écran — mes pages **Twig** ;
> - le **Contrôleur**, c'est le chef d'orchestre : il **reçoit la demande** de l'utilisateur, va **chercher les données** via le modèle, et **renvoie la bonne vue**.
>
> L'intérêt : chaque partie a son rôle, c'est plus clair et plus facile à maintenir. »

**Le trajet d'une requête (si on te le demande) :**
> Utilisateur clique → le **contrôleur** reçoit → il demande les données au **modèle** (via les repositories) → il envoie ces données à la **vue** Twig → la page s'affiche.

---

## 3. Merise : MCD / MLD / MPD (« expliquer les 3 »)

> « Merise, c'est la méthode que j'ai utilisée pour **concevoir ma base de données**, en **3 niveaux** de plus en plus concrets :
> - le **MCD** (conceptuel) : la vue d'ensemble, sans technique. Mes **entités** (patient, médicament, rendez-vous…) et leurs **relations**.
> - le **MLD** (logique) : je transforme les entités en **tables** et j'ajoute les **liens** entre elles (les clés étrangères). C'est indépendant du logiciel de base de données.
> - le **MPD** (physique) : la version concrète pour **MySQL**, avec les **types** (texte, nombre, date) et les **clés** (primaire et étrangère). Prêt à créer la base. »

**La phrase qui claque :** *« Le MCD c'est l'idée, le MPD c'est le concret. »*

**Relations dans mon projet :** *« Un patient a plusieurs rendez-vous et plusieurs médicaments, mais chacun appartient à un seul patient — c'est une relation un-à-plusieurs. »*

---

## 4. Base de données — types, tailles, CHAR vs VARCHAR ⭐ (la question piège)

Ils adorent la question sur **la taille de l'email** et **la longueur des colonnes**. Voici les réponses solides :

**« Y a-t-il une taille maximale pour une adresse email ? »**
> « Oui. La norme officielle (le RFC) fixe une adresse email à **254 caractères maximum**. C'est pour ça qu'un **VARCHAR(255)** est largement suffisant et justifié pour stocker un email. »

**« Pourquoi cette longueur pour le mot de passe haché ? »**
> « Mon mot de passe n'est jamais stocké en clair : il est **haché**. L'algorithme bcrypt utilisé par Symfony produit **toujours un hash de 60 caractères**. Symfony réserve un **VARCHAR(255)** par défaut, pour rester compatible si on change d'algorithme plus tard (certains produisent des hash plus longs). »

**« CHAR ou VARCHAR ? Quelle différence ? »**
> - **CHAR** = longueur **fixe**. Il réserve toujours le même nombre de caractères. Idéal quand la donnée fait **toujours la même taille** — par exemple un hash de taille fixe.
> - **VARCHAR** = longueur **variable**. Il ne stocke que ce qu'il faut. Idéal quand la taille change d'une ligne à l'autre — par exemple un email ou un nom.

> 💡 En clair : **CHAR pour du fixe, VARCHAR pour du variable.** Un hash de longueur constante peut aller en CHAR ; un email va en VARCHAR.

---

## 5. RGPD ⭐

> « Le RGPD, c'est la loi européenne qui protège les **données personnelles**. Comme mon application manipule des **données de santé**, qui sont particulièrement sensibles, c'était central. Les grands principes que j'applique :
> - **Minimisation** : je ne collecte que le strict nécessaire.
> - **Sécurité** : les mots de passe sont **hachés**, et le HTTPS est prévu en production pour chiffrer les échanges.
> - **Contrôle d'accès** : chaque patient n'accède **qu'à ses propres données**.
> - **Droits de l'utilisateur** : le RGPD prévoit qu'on puisse consulter, corriger et **supprimer** ses données — le renforcement de ce point (export/suppression) fait partie de mes perspectives. »

**Le point sur le hash (que tu as très bien compris) :**
> « Le hachage est **irréversible** : on ne peut pas « déhacher » pour retrouver le mot de passe. À la connexion, je **hache ce que l'utilisateur tape** et je le **compare** au hash stocké en base. S'ils correspondent, c'est le bon mot de passe. Comme ça, même si quelqu'un volait la base, il n'aurait jamais les mots de passe en clair. »

---

## 6. Accessibilité

> « L'accessibilité, c'est faire en sorte que **tout le monde** puisse utiliser l'application, y compris les personnes âgées, fatiguées ou en situation de handicap. Vu mon public — des patients en traitement — j'y ai fait attention : **contrastes marqués**, **texte lisible**, **boutons larges**, **navigation simple**. En France, le référentiel officiel s'appelle le **RGAA**. »

---

## 7. Maquettes / Wireframes / Prototypes (+ Figma) ⭐

> « Ce sont **3 niveaux** de conception d'interface, du plus simple au plus abouti :
> - le **wireframe** : un croquis en noir et blanc, juste la **structure** — où va quoi. Le squelette.
> - la **maquette** : la version avec les **couleurs, la typo, le vrai visuel**. Le rendu final, mais figé.
> - le **prototype** : la maquette **cliquable**, où on peut **naviguer** comme dans la vraie appli.
>
> J'ai utilisé **Figma** pour ça. Le prototype sert à **tester l'expérience utilisateur (UX) avant de coder** : on vérifie que le parcours est simple et logique, et on corrige tout de suite — c'est bien moins coûteux que de corriger dans le code après. »

**La phrase :** *« Wireframe = le squelette, maquette = le visuel, prototype = le cliquable. »*

---

## 8. Git et GitHub (le versioning)

> « **Git**, c'est le logiciel de **gestion de versions** : il garde tout l'**historique** de mon code. Je peux revenir en arrière si je casse quelque chose, et travailler sur des **branches** séparées.
> **GitHub**, c'est la **plateforme en ligne** qui héberge mon dépôt Git : ça me sert à **sauvegarder** mon code en ligne et, en équipe, à **collaborer**. »

**Le vocabulaire :** *commit* (enregistrer une version), *push* (envoyer sur GitHub), *pull* (récupérer), *branche* (une version parallèle), *merge* (fusionner).

**La phrase :** *« Git c'est l'outil sur mon ordi, GitHub c'est le site où je sauvegarde mon code. »*

---

## 9. Doctrine ORM — « ça sert à quoi ? » ⭐

> « Doctrine est un **ORM** : ça veut dire *Object-Relational Mapping*, la correspondance entre les **objets** et la **base de données relationnelle**.
>
> Concrètement, ça fait le **pont** entre mes objets PHP et mes tables SQL : je manipule ma base **avec des objets**, sans écrire de requêtes SQL compliquées à la main. Par exemple, pour enregistrer un médicament, je fais `persist()` puis `flush()` au lieu d'écrire un INSERT.
>
> Les avantages : ça me fait **gagner du temps**, ça **sécurise** contre les injections SQL grâce aux requêtes paramétrées, et je peux faire évoluer ma base proprement avec les **migrations**. »

**La phrase :** *« Doctrine, c'est le pont entre mes objets PHP et ma base de données — je manipule la base sans écrire de SQL à la main. »*

**Bonus — persist / flush :** *« persist() prépare l'objet à être enregistré, flush() exécute vraiment l'écriture en base. »*

---

## 10. La démonstration de l'app

Tu as ton **script de démo minute par minute** à part. L'ordre : connexion → tableau de bord → ajout rendez-vous → médicament + popup → journal + graphique → (rappels). Rappelle-toi : **une action = une phrase technique**, et **ralentis**.

---

## 🧷 Mémo express (à relire juste avant de passer)

| Question | La phrase à retenir |
|---|---|
| **Agile** | Avancer par petits cycles ; moi = Kanban (Trello) car seul |
| **MVC** | Modèle (données) / Vue (Twig) / Contrôleur (chef d'orchestre) |
| **Merise** | MCD = l'idée, MLD = les tables + liens, MPD = le concret MySQL |
| **Email max** | 254 caractères (norme) → VARCHAR(255) suffit |
| **CHAR / VARCHAR** | CHAR = fixe (hash), VARCHAR = variable (email) |
| **RGPD** | Minimisation, sécurité, accès limité, droits de l'utilisateur |
| **Hash** | Irréversible ; on compare le hash saisi au hash stocké |
| **Accessibilité** | Utilisable par tous : contraste, lisibilité, boutons larges (RGAA) |
| **Wireframe/maquette/prototype** | Squelette / visuel / cliquable |
| **Git / GitHub** | Git = outil local d'historique ; GitHub = hébergement en ligne |
| **Doctrine ORM** | Le pont objets PHP ↔ base SQL, sans écrire de SQL à la main |

---

## 💬 Si tu ne connais pas une réponse le jour J
- Ne bloque pas, ne panique pas. Dis ce que tu sais : *« Je ne maîtrise pas ce point en détail, mais voici comment je le comprends… »*
- Ramène sur ton terrain : *« Dans mon projet, ça se traduit par… »*
- Le jury préfère quelqu'un d'honnête qui réfléchit à quelqu'un qui invente.

**Tu réponds mieux que tu ne le crois. Tu as tout construit toi-même. 💪**
