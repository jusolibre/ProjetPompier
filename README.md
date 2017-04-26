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

<h2>Pour ajouter un nouveau pompier veillez a bien remplir tout les différents champs de la zone d'ajout</h2>

![add image](https://github.com/jusolibre/ProjetPompier/blob/master/utils/add.png)


<h2>La modification se passe ensuite en deux étapes : </h2>

<h4>la premiere ou il faut cliquer sur le bouton "modif",</h4>
![modif 1](https://github.com/jusolibre/ProjetPompier/blob/master/utils/modif1.png)

<h4>Les checkbox deviennent alors cliquable, il suffit de cliquer sur enregistrer pour enregistrer la modification</h4>
![modif 2](https://github.com/jusolibre/ProjetPompier/blob/master/utils/modif2.png)


<h2>La suppression s'effectue ensuite simplement en cliquant sur le bouton supprimer du pompier associé, attention aucune confirmation ne sera demander !  </h2>
