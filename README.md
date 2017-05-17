### Run it:

`$ php -S 0.0.0.0:8888 -t public public/index.php`

## Key directories

* `app`: Application code
* `app/src`: All class files within the `App` namespace
* `app/templates`: Twig template files
* `cache/twig`: Twig's Autocreated cache files
* `log`: Log files
* `public`: Webserver root
* `vendor`: Composer dependencies

## Key files

* `public/index.php`: Entry point to application
* `app/settings.php`: Configuration
* `app/dependencies.php`: Services for Pimple
* `app/middleware.php`: Application middleware
* `app/routes.php`: All application routes are here
* `app/src/Action/HomeAction.php`: Action class for the home page
* `app/templates/home.twig`: Twig template file for the home page

<h2>Ajout d'un pompier</h2>
<p>Pour ajouter un pompier, veuillez à bien remplir tous les différents champs de la zone d'ajout comme indiqué sur l'image ci-dessous.</p>

![add image](https://github.com/jusolibre/ProjetPompier/blob/master/utils/add.png)

<h2>Modification d'un pompier</h2>
<p>La modification d'un pompier se passe en deux étapes: </p>
<p>En premier temps, sélectionnez un pompier, puis cliquez sur "Modif" au bout de sa ligne comme indiqué sur l'image ci-dessous:</p>

<img src="http://i.imgur.com/hReGhZQ.png" alt="Modif" />

<p>Les cases à cocher vont maintenant apparaitre sous chaque compétence, et vous pourrez par la suite cocher ou décocher des compétences. Ensuite pour sauvegarder les modifications, il vous suffit de cliquer sur "enregistrer" pour enregistrer la/les modification(s). Vous aurez par la suite une belle notification qui vous dira que les informations ont bien été enregistrées!</p>

![add image](http://i.imgur.com/fLiHOSn.png)

<h2>Suppression d'un pompier</h2>
<p>La suppression d'un pompier s'effectue somplement en cliquant sur le bouton "suppr" (supprimer) mais attention, un seul clique suffit pour le supprimer. Vous n'aurez pas de confirmation en cliquant dessus; c'est définitif.</p>

![delete](https://github.com/jusolibre/ProjetPompier/blob/master/utils/delete.png)
