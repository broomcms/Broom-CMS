# Broom CMS
Broom CMS est un 'Content Management System' bâtie entièrement en Laravel. L'objectif de la plateforme est de créé une zone admin qui peut servir autemps de headless CMS que de bases pour CMS standard. Le projet se veut facilement éditable pour répondre à tous les besoins qu'un programmeur peut rencontrer tout en conservant une approche sur mesure et en fournissant un produit fini au client. 



## Structure
 - vagrant (contient la box vagrant)
 - broomcms (contiens l'app Laravel)
 - phpmyadmin (contiens PHPMyAdmin)



## Environement de developpement local vagrant
 - https://broomcms.test 
 - https://broomdb.test



## Installation local
 - Créé un dossier C:\dev\broomcms
 - git clone https://github.com/patwebrussell/Broom-CMS.git ./
 - Assurez-vous de la bonne structure de dossier
 - dans le terminal, taper les commandes suivantes:
 - cd vagrant
 - vagrant up
 - vagrant ssh
 - cd BroomCMS
 - composer install
 - php artisan migrate --seed

## Pseudo/passe de la base de donnée local
 - root
 - secret

## Installation en prod (À tester)
 - télécharger le dossier broom composer
 - ajouter le contenue du dossier à la racine de votre projet
 - assurez vous d'avoir un htaccess qui pointe ver le dossier public
 - visitez /install



## Login par défaut comme super admin
 - test@broomcms.com
 - qpalqpal
 - Peux être changer dans le seed avant l'installation



# TODO
 - Admin LTE V3 DONE
 - Login DONE
 - Mot de passe perdu DONE
 - S'inscrire DONE
 - Ce souvenir de moi DONE
 - Dashboard DONE
 - Widgets DONE
 - CRUD Pages DONE
 - CRUD Gabarit DONE
 - CRUD Champs DONE
 - CRUD Utilisateurs DONE
 - CRUD Menu DONE
 - CRUD Produits DONE
 - CRUD Catégorie DONE
 - CRUD Clients DONE
 - CRUD Tags DONE
 - CRUD Catégorie DONE
 - CRUD Notes DONE
 - CRUD Documents DONE
 - CRUD Commandes DONE
 - CRUD Statut des clients DONE
 - CRUD permission DONE
 - CRUD roles DONE
 - CRUD logs DONE
 - CRUD alerts DONE
 - CRUD variables DONE
 - Système de message DONE
 - Changer de mot de passe DONE
 - API pour les cruds DONE



### Boostrap Admin
 - Finir de formater le thème Admin LTE v3
 - Ajouter un menu en haut à droite pour profile, etc.
 - Bouger la recherche dans le header blanc
 - Menu accordéon



### Dashboard
 - Formater les widgets
 - Créer plus de widget?



### Gestion des pages / variables
 - Créé le formulaire à partir du gabarit
 - Sauver les résultats des variables 
 - Créé des fonctions qui permet de récupérer facilement le contenu



### Boutique 
 - Créé une facture PDF
 - Envoyer les factures par courriel
 - Notifier le client quand un changement de statut se produit



### Frontend
 - Créé un one page boostrap
 - Exemple d'intégration des modules



### Features
 - Créé un système d'activation/désactivation des modules
 - Créé un processus d'installation/update client - done (À sécuriser)
