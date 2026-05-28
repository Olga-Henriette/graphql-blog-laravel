# Blog API - Laravel Lighthouse (GraphQL)

Ce projet est une API GraphQL complète pour un système de Blog, développée avec le framework **Laravel** et le package **Lighthouse PHP**. L'application utilise une base de données relationnelle pour gérer les utilisateurs, leurs articles et les commentaires associés.

---

## Fonctionnalités intégrées

* **Modèles & Relations Eloquent :** Gestion native des entités `User`, `Post` et `Comment`.
* **Directives Lighthouse avancées :** Optimisation des requêtes via `@all`, `@find`, `@paginate`, `@orderBy`, `@guard`, et `@belongsTo`.
* **Sécurisation des routes :** Utilisation de l'authentification Laravel combinée à des résolveurs GraphQL dédiés pour l'injection automatique et sécurisée de l'auteur connecté lors de la création d'articles.

---

## Installation et Lancement

### 1. Configuration de l'environnement
À la racine du projet, dupliquez le fichier d'exemple pour créer votre configuration locale : cp .env.example .env

### 2. Installation des dépendances PHP
composer install

### 3. Génération de la clé d'application
    php artisan key:generate

### 4. Configuration de la Base de Données (SQLite)
Le projet est configuré par défaut pour utiliser SQLite. Générez le fichier de base de données, lancez les tables et injectez le jeu de données de test (Seeders) avec ces commandes :

    touch database/database.sqlite
    php artisan migrate --seed

### 5. Démarrage du serveur local
    php artisan serve

L'API GraphQL est désormais accessible à l'adresse : http://localhost:8000/graphql.