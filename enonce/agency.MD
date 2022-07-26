# Projet Agency
## Ce projet consiste à créer un site pour une agence immobilière
Vous trouverez tous les templates dans le dossier annexe.

> Ce projet est à me rendre avant le lundi 30 mai.
>
> Il sera évalué et vous recevrez les résultats par la suite par l'école.
> Vous pouvez m'envoyer vorte lien github ou le zip du projet.
>
> Pour m'envoyer votre projet: contact@steptosuccess.fr

## Les pages

### Page d'accueil
Pour ce projet, vous devrez réaliser une page d'accueil présentant l'entreprise et les 5 derniers biens ajoutés. Il y aura également sur cette page des liens permettant d'arriver sur la page des biens avec un filtre déjà en place (appartements, maisons, ...)

Chaque bien a un bouton voir plus pour accéder à la page du bien.

### Page des biens

Cette page liste tous les biens que possède l'agence et qui sont encore disponible.

Sur cette page il y a des filtres pour trier les biens en fonction des recherces des utilisateurs.

Cette page possède une pagination. Les biens sont divisés en groupes de 10 ou 20 comme vous le souhaitez.

Chaque bien a un bouton voir plus pour accéder à la page du bien.

## Page d'un bien

Au clic sur un bien on arrive sur sa page.

Celle-ci va afficher toutes les photos du bien, ses informations et les options qui sont liées (piscine, balcon, ...)

Sur cette page on retrouve également un formulaire de contact qui va envoyer un mail à l'agent immobilier gérant le bien.

## Connexion

Les agents immobiliers peuvent se connecter. Ils pourront ainsi ajouter un bien, modifier les biens qu'ils gèrent, mettre un bien en vendu ou loué, le supprimer.

## Inscription

Seul le gérant de l'agence peut inscrire des personnes. Il inscrira les agents immobiliers ou d'autres personnes. Il attribue les rôles aux utilisateurs.

## Les rôles

### Anonyme

Les clients ne s'inscrivent pas et peuvent consulter les biens et envoyer une demande de visite

### ROLE_USER

Ce rôle est dédié aux agents immobiliers. Ils peuvent consulter les biens, ajouter des biens et gérer les biens qui leurs sont attribués: mise à jour, suppression, marqué comme vendu ou loué.

Un agent immobilier peut également se rendre sur sa fiche pour modifier son mot de passe

### ROLE_ADMIN

C'est le gérant de l'agence.

Il voit tous les biens et peut tous les gérer.
Il peut inscrire des collaborateurs et gérer les comptes (modification d'information, suppresion de compte, ...)

## Les entités

Je vous laisse adapter les entités à vos besoins et aux maquettes mais vous aurez besoin des suivantes:

- Biens (les biens gérés par l'agence)
- Options (Les options des biens: piscine, balcon, ...)
- Utilisateurs (Les agents immobiliers)
- Images (Les images des biens)

