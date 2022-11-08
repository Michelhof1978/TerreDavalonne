# Terre d'Avalonne
> Symfony 6 project

## installation du projet

1.	git clone git@gitlab.com:terredavalonne/terredavalonne.git
2.	composer install
3. 	symfony server:start --no-ssl

## Dependances

Voici la liste des dépendances liées au projet :

- symfony/maker-bundle
- symfony/orm-pack
- symfony/ux-twig-component
- sensio/framework-extra-bundle
- symfony/mailer + mise en place du parametrage MAILER_DSN=smtp://localhost dans le .env.local
- messenger
- vich/uploader-bundle
- symfony/webpack-encore-bundle avec dans le fichier webpack.config.js activation de l'option .enableSassLoader() + commande : yarn add sass-loader@latest sass --dev
- yarn
- symfony/form
- friendsofsymfony/ckeditor-bundle Remarque : lorsque j'ai voulu installer ce bundle j'ai eu un message d'erreur et j'ai du installer une extension php avec la commande : sudo apt-get install php-zip. Ne pas oublier de l'installer dans public avec l'instruction suivante : php bin/console assets:install public
- installation du symfonycasts/verify-email-bundle pour permettre la vérification de l'inscription d'un nouvel utilisateur
- instattation du composant KnpPaginatorBundle avec la commande suivante composer require knplabs/knp-paginator-bundle
- installation du bundle de reset password avec la commande suivante : composer require symfonycasts/reset-password-bundle puis commande : php bin/console make:reset-password
- installation de 2 bundles TWIG complementaires : 
	- composer require twig/intl-extra
	- composer require twig/extra-bundle


- --dev orm-fixtures
- --dev fakerphp/faker

## Arborescence

 - config / 
	 - où se trouvent les fichiers de configuration. A modifier avec précaution.
 - public / 
	 - Seul dossier ayant un lien direct avec le site 
 - src /
	 - Seul emplacement où le code PHP est placé.
 - templates /
	 - Fichiers TWIG
 - translations /
	 - Fichiers YML de translations
 - vendor /
	 - Composers
 - .env
	 - Variables importantes et personnelles : URL de base de données, de la licence...  (Une connexion à la base de données en prod à partir d'un poste de dev peut se faire sous 1h maxi)

## Fichiers statiques

Une mise en cache pourrait être mis en place


## Routes

|Name| Method | Scheme | Host | Path|
|--|--|--|--|--|



## Assistance 

Pour toute question, se référer à 

> lounesghl@egmail.com
> jcriotte69@gmail.com
> michelhoffman@gmail.com
# terredavalonne
