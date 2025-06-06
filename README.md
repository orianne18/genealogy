# 👨‍👩‍👧‍👦 Projet Laravel – Généalogie

Projet réalisé en 3ᵉ année de BUT Informatique.  
Création d’un site de gestion d’arbre généalogique collaboratif.

## 🚀 Fonctionnalités principales
- Authentification des utilisateurs
- Création et affichage de fiches personnes
- Ajout de relations parent-enfant
- Calcul automatique du degré de parenté
- Validation communautaire des modifications

## 💻 Stack technique
- Laravel 8+
- PHP / MySQL
- Blade, Eloquent ORM

## ✍️ Travail réalisé
- Migrations (`people`, `relationships`)
- Modèles Eloquent avec relations
- Contrôleurs : `index`, `show`, `create`, `store`
- Validation des champs avec formattage (noms, dates…)
- Algorithme de calcul du degré de parenté (`getDegreeWith`)
- Interface simple avec Blade
- Sécurité : accès restreint aux utilisateurs connectés

## 🗂️ Schéma de la base de données
📎 [Lien dbdiagram.io](https://dbdiagram.io/d/genealogy-682cc0e4b9f7446da3608e64)

---

## 📘 Evolution des données

### 1. Proposition de modifications

- Lorsqu'un utilisateur propose une modification (ajout ou mise à jour d'une ficher 'person' ou d'une relation). Un nouvel enregistrement est ajouté à la table 'propositions'.
- Le champ 'status' est par défaut initialisé à 'false'.
- Les nouvelles informations sont enregistrées dans le champ 'data' de type JSON. (ex: changement de nom de famille, nouveau lien de parenté etc.

### 2. Réponses des utilisateurs

- Les utilisateurs concernés reçoivent la proposition y répondent.
- Quand une réponse est envoyée, une ligne s'ajoute à la table 'answers'. Cette table enregistre l'identifiant de la proposition concernée, la personne qui y a répondu ainsi que sa réponse via le champ 'status' ('true' pour 'acceptée', 'false' pour 'rejetée').

### 3. Validation automatique

- Lorsqu'une proposition atteint 3 acceptations (answers.status = true) le status de la proposition passe automatiquement à 'true'.
- Ainsi, s'il s'agit d'un ajout, les données du champ data sont insérées. S'il s'agit d'une modification, les données du champ data sont utilisées pour effectuer une mise à jour sur les tables concernées.

### 4. Refus

- Si 3 refus sont enregistrés, la proposition est définitivement invalidée.


