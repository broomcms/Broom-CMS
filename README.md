# CMS Webrussell


## Structure
 - HomeStead (contient la box vagrant)
 - cms (contiens l'app Laravel)


## Install
 - Télécharger HomStead ici: https://gitlab.webrussell.com/webrussell/homestead
 - Créé un dossier C:\dev\WebRussell
 - Ajouter le dossier Homestead
 - Vérifier la validiter du fichier Homestead.yaml
 - ouvrir un terminal et cloner le Repo
 - git clone https://gitlab.webrussell.com/webrussell/cms.git
 - Assurez-vous de la bonne structure de dossier
 - dans le terminal, taper les commandes suivantes:
 - cd homestead
 - .vagrant up
 - .vagrant ssh
 - cd cms
 - composer install
 - php artisant migrate --seed


## Login
 - patrick.simard@webrussell.com
 - qpalqpal


## BD
 - root
 - secret


## Deploy
 - dep deploy dev
 - Creds root du server


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


### Boostrap
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


### Features
 - Créé un système de ticket connecté au portail (utiliser mon système de messagerie?)
 - Créé un calendrier connecté au système de RDV
 - Créé un système de modification de langue


### Frontend
 - Créé un one page boostrap
 - Exemple d'intégration des modules
