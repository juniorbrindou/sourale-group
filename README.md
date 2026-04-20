<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Gestock

Gestock est une application de gestion de stock et de location événementielle pour les services traiteur.

## Environnement Docker dédié (recommandé)

Le projet dispose d'une stack Docker propre à `gestok`, avec une version de PHP interne configurable.

- Fichier principal : `docker-compose.yml`
- Image PHP : `Dockerfile.app`
- Version PHP (par défaut) : `7.4` (modifiable via `PHP_VERSION` dans `.env`)

### Démarrage

1. Construire et démarrer les services : `app`, `web`, `db`
2. Installer les dépendances Composer dans le conteneur `app`
3. Générer la clé Laravel si nécessaire
4. Lancer les commandes Laravel depuis le conteneur

Exemples de commandes utiles (dans le conteneur `app`) :

- `composer install`
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan livewire:publish --assets`

Application web exposée sur : `http://localhost:8082`

## Installation (hors Docker)

1. Installer les dépendances : `composer install`
2. Lier le storage public : `php artisan storage:link`
3. Publier les assets Livewire : `php artisan livewire:publish --assets`