# CinéMax - Projet PHP B2

Ce projet est un système de réservation de billets de cinéma développé en PHP.

## Prérequis

- [XAMPP](https://www.apachefriends.org/fr/index.html) (PHP 8.x recommandé)
- MySQL / MariaDB (inclus dans XAMPP)

## Installation avec XAMPP

### 1. Cloner ou placer le projet
Téléchargez ou clonez ce projet et placez le dossier `Projet-PHP-B2` dans le répertoire `htdocs` de votre installation XAMPP :
`C:\xampp\htdocs\Projet-PHP-B2`

### 2. Configuration de la base de données
1. Démarrez les modules **Apache** et **MySQL** via le panneau de contrôle XAMPP.
2. Accédez à [phpMyAdmin](http://localhost/phpmyadmin/).
3. Allez dans l'onglet **Importer**.
4. Importez d'abord le fichier : `sql/schema.sql` (Il créera la base `cinema_booking` et les tables).
5. Importez ensuite le fichier : `sql/insert.sql` (Pour avoir des données de test).

### 3. Configuration de l'environnement
1. À la racine du projet, créez un fichier nommé `.env`.
2. Copiez le contenu de `.env.example` dans ce nouveau fichier `.env`.
3. Ajustez les informations selon votre configuration (par défaut avec XAMPP) :
   ```env
   DB_HOST="localhost"
   DB_NAME="cinema_booking"
   DB_USER="root"
   DB_PASSWORD=""
   DB_PORT="3306"
   ```

### 4. Lancer le projet
Ouvrez votre navigateur et accédez à l'URL suivante :
[http://localhost/Projet-PHP-B2/public/](http://localhost/Projet-PHP-B2/public/)

## Sécurité appliquée
- **Injections SQL** : Utilisation de requêtes préparées avec PDO (`prepare()` et `execute()`).
- **Failles XSS** : Échappement systématique des données affichées via `htmlspecialchars()`.
