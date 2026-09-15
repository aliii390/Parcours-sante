# 🎓 Petit cours + ce que tu dois dire — Slides 18 à 21

> Ces 4 slides répondent à une seule grande question du jury : **« Comment as-tu conçu ton application avant de coder ? »**
> Tu as utilisé **deux méthodes** :
> - **Merise** → pour concevoir la **base de données** (slides 18 et 19)
> - **UML** → pour concevoir **l'application** (slides 20 et 21)
>
> 👉 La phrase à retenir : **« Merise, c'est pour la base de données. UML, c'est pour l'application. »**

---

## 🧠 D'abord, comprends-le simplement

### Merise (la base de données) — en 3 étapes, du flou au concret
Imagine que tu construis une maison :
- **MCD** = le plan d'architecte. On dessine les **idées** : quelles sont les grandes choses (patient, médicament, rendez-vous…) et comment elles sont **reliées**. On ne parle pas encore de technique.
- **MLD** = l'étape intermédiaire. On transforme le plan en **tables**, et on ajoute les **liens entre tables** (les clés étrangères).
- **MPD** = le plan du maçon. Le plan **concret et technique**, prêt pour MySQL : chaque table avec ses **types** (texte, nombre, date) et ses **clés**.

**Le même schéma, de plus en plus précis.** MCD = l'idée → MPD = le concret.

### UML (l'application) — 3 vues différentes
- **Cas d'utilisation** = QUI fait QUOI. Ça montre l'utilisateur (le patient) et **tout ce qu'il peut faire** dans l'appli.
- **Diagramme de classes** = la STRUCTURE du code. Les « briques » du programme (les classes) avec leurs infos et leurs actions.
- **Diagramme de séquence** = le DÉROULÉ d'une action précise dans le temps. Qui parle à qui, dans quel ordre.

---

## 🖥️ Slide 18 — Conception des données : le MCD (Merise)

**Ce qu'on voit :** le **Modèle Conceptuel de Données**. Mes 7 entités (User, Rendez-vous, Médicament, Prise, Journal, Symptôme, Catégorie) reliées entre elles.

**Ce que tu dis :**
> « Avant de coder, j'ai conçu ma base de données avec la méthode Merise. Voici le premier niveau, le **modèle conceptuel** : c'est une vue d'ensemble, sans technique.
>
> J'ai identifié **7 entités** — les grandes choses que mon application manipule : le patient, ses rendez-vous, ses médicaments, les prises, le journal, les symptômes.
>
> Et surtout leurs **relations** : par exemple, **un patient peut avoir plusieurs rendez-vous et plusieurs médicaments, mais chaque rendez-vous appartient à un seul patient**. C'est ce qu'on appelle une relation « un à plusieurs ». »

**👉 Le mot-clé à dire : « relation un à plusieurs » (un patient → plusieurs rendez-vous).**

---

## 🗄️ Slide 19 — Du conceptuel au physique : le MPD (Merise)

**Ce qu'on voit :** le **Modèle Physique de Données**. Les mêmes entités, mais devenues des **tables** avec les types SQL et les clés (PK / FK).

**Ce que tu dis :**
> « Ensuite, j'ai transformé ce modèle conceptuel en **modèle physique**. C'est la version concrète, prête pour la base MySQL.
>
> Chaque entité est devenue une **table**, chaque information a un **type** — du texte, un nombre, une date — et les tables sont reliées par des **clés**.
>
> La **clé primaire (PK)** identifie chaque ligne de façon unique, et la **clé étrangère (FK)** fait le lien avec une autre table. Par exemple, la table rendez-vous a une clé étrangère qui pointe vers le patient à qui il appartient. »

**👉 À retenir : PK = identifie une ligne. FK = fait le lien avec une autre table.**

> 💡 Si le jury demande la différence MCD / MPD : *« Le MCD c'est l'idée, sans technique. Le MPD c'est le concret : les tables, les types SQL et les clés, prêt pour MySQL. »*

---

## 👤 Slide 20 — Conception UML : le diagramme de cas d'utilisation

**Ce qu'on voit :** un bonhomme (le **Patient**) relié à toutes les actions possibles : s'inscrire, se connecter, gérer ses rendez-vous, gérer ses médicaments, tenir son journal, consulter le graphique…

**Ce que tu dis :**
> « Là, je passe à la conception de l'application avec UML. Ce premier schéma est le **diagramme de cas d'utilisation** : il montre **qui fait quoi**.
>
> L'acteur, c'est le **patient**. Et voici tout ce qu'il peut faire dans l'application : s'inscrire, se connecter, gérer ses rendez-vous et ses médicaments, tenir son journal de symptômes, consulter son tableau de bord et son graphique.
>
> Ça m'a servi à définir **le périmètre de l'application** : la liste de tout ce qu'elle doit permettre de faire. »

**👉 Idée simple : le cas d'utilisation = la liste de ce que l'utilisateur peut faire.**

---

## 🧩 Slide 21 — Conception UML : classes & séquence

**Ce qu'on voit :** à gauche le **diagramme de classes**, à droite le **diagramme de séquence** « ajouter un médicament ».

**Ce que tu dis :**
> « Enfin, deux autres schémas UML.
>
> À gauche, le **diagramme de classes** : c'est la **structure de mon code**. Chaque classe correspond à une entité — User, Médicament, Rendez-vous… — avec ses **informations** (ses attributs) et ses **actions** (ses méthodes). Il ressemble au modèle physique, mais côté code, orienté objet.
>
> À droite, le **diagramme de séquence** de l'action « ajouter un médicament ». Celui-ci montre le **déroulé dans le temps** : le patient remplit le formulaire, la vue l'envoie au **contrôleur**, le contrôleur passe par le **repository** pour enregistrer en **base de données**, et la page se met à jour. On voit bien qui parle à qui, et dans quel ordre. »

**👉 La différence à dire clairement :**
> *« Le diagramme de classes montre la STRUCTURE (les briques du code). Le diagramme de séquence montre le DÉROULÉ d'une action dans le temps (qui appelle qui). »*

---

## 🎯 Ta transition entre les slides (pour enchaîner sans blanc)

- **18 → 19 :** « Une fois cette vue d'ensemble posée, je l'ai rendue concrète… » *(passe au MPD)*
- **19 → 20 :** « La base de données étant conçue, je suis passé à la conception de l'application avec UML… » *(passe aux cas d'usage)*
- **20 → 21 :** « Après avoir défini ce que l'utilisateur peut faire, j'ai décrit la structure de mon code et le déroulé d'une action… » *(passe aux classes/séquence)*

---

## 🔑 Le résumé de survie (si tu ne retiens que ça)

| Slide | Schéma | En une phrase |
|------|--------|----------------|
| 18 | **MCD** (Merise) | L'idée de la base : mes entités et leurs relations |
| 19 | **MPD** (Merise) | La base concrète : tables, types SQL, clés (PK/FK) |
| 20 | **Cas d'utilisation** (UML) | Ce que le patient peut faire dans l'appli |
| 21 | **Classes + Séquence** (UML) | La structure du code + le déroulé d'une action |

**Merise = base de données. UML = application. Tu connais ton schéma, explique-le comme tu le raconterais à un ami. 💪**
