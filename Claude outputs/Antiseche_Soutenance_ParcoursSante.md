# 🎯 ANTISÈCHE — Parcours Santé (mots-clés par slide)

*À poser à côté de toi. Un coup d'œil pour te débloquer, puis tu relèves la tête et tu racontes.*

---

## ACTE 1 — LE BESOIN
- **1. Couverture** → me présenter · Parcours Santé · CDA · né d'une expérience perso
- **2. Qui suis-je** → parcours · formation · motivation
- **3. Parcours Santé (tél.)** → tout au même endroit · RDV / médicaments / journal
- **4. C'est quoi le projet** → d'abord trouver LE problème · je l'ai vécu
- **5. Les 3 problèmes** → **Organisation · Rappel · Communication** · rien de simple/gratuit/français
- **6. La Solution** → construire moi-même · par un patient, pour des patients
- **7. Développer une app** → simple · français · dans la poche
- **8. Centraliser (1-2-3)** → Rendez-vous · Médicaments (rappels) · Journal (1-10, 30 j) · + tableau de bord
- **9. Personas (titre)** → pas que mon besoin · entretiens avec des patients
- **10. Personas** → **Marie** (chimio, simple) · **Robert** (68, seul, rappels) · **Sarah** (dev, précise) · besoin réel + partagé
- **11. Version / Évolution** → présenté = **web responsive Symfony** · évolution = **mobile + API** · web = complet, pas partiel

## ACTE 2 — LA SOLUTION
- **12. DÉMO** 🔴 → connexion → tableau de bord → RDV → médicament + popup → journal + graphique · *1 clic = 1 phrase · ralentir*

## ACTE 3 — CONCEPTION & RÉALISATION
- **13. Conception & réalisation** → organisation → données → code → sécurité
- **14. Kanban** → agile · Trello · À faire / En cours / Terminé · seul
- **15. Gantt** → planning fév→août · phases qui se chevauchent · itératif
- **16. MoSCoW** → user stories priorisées · **Must / Should / Could / Won't** · l'essentiel d'abord
- **17. Architecture MVC** → couches · présentation (Twig) / contrôleur / métier / données · réutilisable → mobile
- **18. MCD (Merise)** → 7 entités · relations · « un patient → plusieurs RDV » (un-à-plusieurs)
- *(19bis MLD si ajouté)* → entités → tables · relations → clés étrangères (user_id)
- **19. MPD** → tables · types SQL · **PK** (identifie) / **FK** (relie) · prêt MySQL
- **20. UML cas d'usage** → QUI fait QUOI · acteur = patient · périmètre
- **21. UML classes + séquence** → classes = **structure** · séquence = **déroulé** (patient→vue→contrôleur→repo→base)
- **22. Choix techno** → Symfony 7.4 · PHP 8.2 · Twig · Tailwind · Chart.js · MySQL/Doctrine · WAMP · Git

## ACTE 3bis — DEUX FONCTIONNALITÉS
- **23. Deux fonctionnalités** → rappels · journal
- **24. Rappels** → **commande console** · prises non effectuées · email Mailer/Mailtrap · manuel → auto prévue
- **25. Rappels (activité)** → logique pas à pas · parcourir prises → vérifier → envoyer
- **26. Journal + graphique** → intensité 1-10 · **serveur fournit / Chart.js dessine** (côté client) · dialogue avec soignants
- **27. Journal (séquence)** → contrôleur → repo → base → Twig → Chart.js · séparation serveur/client
- **28. Sécurité** → **mots de passe hachés** (irréversible) · **accès à ses données** · **CSRF** (jeton) · **RGPD** (minimisation, HTTPS)
- **29. Tests** → **PHPUnit** · isActif() (expiré/à venir/en cours) · **7 tests, 8 assertions** · fonctionnels = perspective
- **30. Déploiement** → WAMP local · Git · **procédure reproductible** · migrations Doctrine · HTTPS
- **31. CI/CD (perspective)** → push → tests → image Docker → SSH VPS → conteneur · *pas encore fait, je sais comment*

## ACTE 4 — BILAN
- **32. Léon Bérard** → présenté au service info · intérêt · reprise envisagée · **bénévole** · sérieux données santé
- **33. Difficultés** → seul + traitement · modéliser · faire évoluer la base · cycle Turbo (graphique)
- **34. Ce que ça m'a apporté** → concevoir depuis un vrai besoin · projet complet seul · résoudre l'imprévu · besoin humain → technique
- **35. Perspectives** → auto rappels · notifs push · tests fonctionnels · RGPD (export/suppression) · Docker · **puis mobile via API**
- **36. Conclusion** → née d'une expérience perso · projet de fin d'année → outil utile · ma plus belle réussite
- **37. Merci** → merci · à votre disposition

---

## 🧠 RÉPONSES-ÉCLAIR (questions du jury)
- **MCD** = entités + relations, sans technique (l'idée)
- **MLD** = tables + clés étrangères (le pont) · **MPD** = types SQL, prêt MySQL (le concret)
- **ORM (Doctrine)** = pont objets PHP ↔ base · *+* : portabilité, requêtes préparées (anti-injection) · *–* : requêtes complexes moins optimisées
- **Hash bcrypt** = **60 caractères** · irréversible · on compare les hash
- **Email max** = **254 caractères** (norme) → VARCHAR(255)
- **CHAR vs VARCHAR** = fixe (hash) vs variable (email)
- **Test unitaire** = un bout de code isolé · **fonctionnel** = une fonctionnalité complète · **e2e** = tout le parcours utilisateur bout en bout
- **Pourquoi tester** = éviter l'erreur humaine · **tests de non-régression**
- **Agile : quand ?** = besoins qui évoluent, livraisons régulières · **quand pas ?** = projet figé/très cadré à l'avance
- **Scrum** = agile en sprints · rôles : Product Owner, Scrum Master, équipe
- **MVC** = Modèle / Vue / Contrôleur · **pourquoi** = code propre, maintenance facile
- **High-fi (UI)** = maquette fidèle au rendu final · **pour l'UX** = prototype cliquable pour tester avant de coder
- **Wireframe / maquette / prototype** = squelette / visuel / cliquable
- **Git / GitHub** = outil local d'historique / hébergement en ligne
- **CI** = les tests tournent automatiquement à chaque push
- **« Vends-moi ce stylo »** = pars du **besoin** (« tu notes souvent des choses importantes ? »), pas des caractéristiques

---

## 💻 EXPLIQUER MON CODE (mes 2 fonctionnalités)

**🔔 Rappels (`EnvoyerRappelsCommand`)**
- Pas une page → **commande console** (`php bin/console app:envoyer-rappels`)
- Constructeur → **injection de dépendances** : repository des prises + Mailer
- `execute()` : `findBy(['effectuee' => false])` → **prises non effectuées**
- **boucle** : pour chaque prise → médicament → patient (si pas d'email : `continue`)
- construire l'email (nom, heure, comprimés) → **Mailer envoie** → compter
- *manuel aujourd'hui, automatisation prévue*

**📓 Journal (`JournalController`)**
- 2 routes : `index` (afficher) · `ajoutJournal` (ajouter)
- `index` : `getUser()` → `findBy(['user' => $user])` → **chacun ne voit que ses données** → Twig
- `ajoutJournal` : `createForm` → si **soumis + valide** → remplir → **persist + flush** (Doctrine) → redirection
- *persist prépare, flush exécute*
- **Graphique** : serveur fournit les données → **Chart.js dessine côté navigateur** (pas d'image serveur)

**Mots-clés à placer :** commande console · injection de dépendances · repository · findBy · boucle · Mailer · getUser · formulaire · validation · persist/flush · Chart.js côté client

---

**Respire. Regarde le jury. Sois honnête (fait vs prévu). Ramène au « pourquoi ». Tu connais ton projet. 💪**
