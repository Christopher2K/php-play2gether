# Projet: Pay2Gether

## Développement
### Pré-requis: 
* Node
* Npm
* Bower

### Installation
1. Cloner le projet: `git clone https://github.com/Christopher2K/php-play2gether`
2. Se placer dans le dossier du projet `cd php-play2gether`
3. pour installer les dépendances : `npm run setup`
4. Lancer le serveur de développement: `npm run go`
5. Installer la BDD à l'aide du fichier _db/play2getherDB.sql
6. Le projet est disponible a : http://localhost:3000

### Dépendences
Elles sont gérées avec le gestionnaire de package de **Node NPM**.
Si une implémentation de dépendence liée à l'univers PHP est à installer, voir l'utilisation du gestionnaire **Composer**.

Les dépendances clientes sont a installer avec `bower install --save <nom de la dépendance>`
Les dépendances lié aux dev tools ou au developpement sont à installer avec `npm install --save-dev <nom de la dépendance>`

## Production
### Pré-requis
* PHP >= 5.6
* PHP-SOAP
* MySQL 5.6

### Installation
1. Cloner le projet: `git clone https://github.com/Christopher2K/php-play2gether`.
2. Se placer dans le dossier du projet `cd php-play2gether`
3. Installation des dépendences frontend : `npm run prod`
2. Placer le contenu de ce dossier dans un répertoire web.

>> La configuration de la base de donnée et du serveur SOAP pour les SMS sont disponibles dans le dossier module.