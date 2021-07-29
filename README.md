Sous Mon Toit

Développeurs:
Anne Crépin, 
Stéphane Cavillon, 
Laurent Vaché, 
Ethan Eldib, 
Kevin Milet 

2021-2022 - CDA - La Manu Amiens

# Installation 

 - Ligne de commande 

    - `git init`
    - `git remote add origin https://github.com/kevinmilet/sous_mon_toit.git`

 - Ajouter le fichier .env a la racine 

```
APP_NAME=Lumen
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sous_mon_toit
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

## Lancer le serveur

 `php -S localhost:8000 -t public`

## Migration de la base et des données

 `php artisan migrate:refresh --seed`

## Ajout des extensions

- JWT :
   > ( installer composer si vous ne l'avait pas !)
   - `composer require tymon/jwt-auth`
   - `php artisan jwt:secret`


## Relier le dossier storage au dossier public

- Ouvrir un invite de commande **en tant qu'administrateur**

- se déplacer dans le dossier public de son projet
    - par exemple : `cd c:\wamp64\www\CDA\sous_mon_toit\public`

- lancer la ligne de commande suivante : ( **A adapter selon votre arborescence !!!** )
    - `mklink /D "storage\" "c:\wamp64\www\CDA\sous_mon_toit\storage\app\public\"`
