connection ssh : ssh u43549464@home190186549.1and1-data.host 

mettre le site en ligne a jour lancer la command : "./deploy" dans le terminal dans le dossier du projet

lancer le serveur : php bin/console server:run

 -------------------------------------------
|               .ENV        (local)         |
 -------------------------------------------

Ligne 27 : connexion a la bdd en local
Ligne 17 : dev / prod ( pour essayer le site en mode Production)

 -------------------------------------------
|               .ENV        (serveur)       | //DIFFERENT DE CELUI EN LOCAL
 -------------------------------------------

Ligne 27 : connexion a la bdd de l'Herbergeur 1 & 1
Ligne 17 : dev / prod ( pour essayer le site en mode Production)

 -------------------------------------------
|                 (serveur)                 |
 -------------------------------------------

Pour utiliser les commandes du FrameWork Symfony en ssh

/////////////////////////////////////////////////////////////////////////////////////////////////
/////       Il faut crée un alias pour pouvoir utiliser un php supérieur a 4.4.9            /////
/////////////////////////////////////////////////////////////////////////////////////////////////

 

 ---------------------------------------------
|  Pour utiliser la partie Admin sur le site  |
 ---------------------------------------------

Ce crée un compte en activant le boolean "true" dans la BDD dans la table user

Ce connecter avec ce compte

Aller sur l'url  "navette.mobasher.com/admin"

 -----------------------
|  Fichier .htaccess    |
 -----------------------

Ce fichier est utile pour le l'Herbergeur ( serveur ) puisse comprendre les routes de Symfony

 -----------------------
|  Fichier deploy    |
 -----------------------

Ce fichier est utile pour mettre a jour le site.
Il comporte un certain nmbre de paramètres, comme par exemple Ne pas envoyer ce qui se trouve dans le gitignore