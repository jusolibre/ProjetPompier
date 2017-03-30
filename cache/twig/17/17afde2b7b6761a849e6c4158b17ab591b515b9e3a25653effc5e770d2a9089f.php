<?php

/* layout.twig */
class __TwigTemplate_9531635c051d81b5abbe5b477daa67dcb340ded5a9a177107318b46b07c129b9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\" />
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css\" />
\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t<title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t<style>
\t\tbody {
\t\t\tbackground-color: #EEEEEE;
\t\t}
\t</style>
</head>
<body>
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div>
\t\t\t\t<ul id=\"slide-out\" class=\"side-nav fixed\">
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/\"><i class=\"material-icons\">dashboard</i>Accueil</a></li>
\t\t\t\t\t<li><div class=\"divider\"></div></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/presences\"><i class=\"material-icons\">perm_contact_calendar</i>Présence</a></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/addPompier\"><i class=\"material-icons\">perm_identity</i>Ajouter/Modifier un pompier</a></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/deletePompier\"><i class=\"material-icons\">delete</i>Supprimer un pompier</a></li>
\t\t\t\t\t<li><div class=\"divider\"></div></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/historique\"><i class=\"material-icons\">message</i>Historique</a></li>
\t\t\t\t</ul>
\t\t\t\t<a href=\"#\" data-activates=\"slide-out\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
\t\t\t</div>
\t\t\t<div class=\"card\">
\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t";
        // line 31
        $this->displayBlock('content', $context, $blocks);
        // line 32
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<script
\tsrc=\"https://code.jquery.com/jquery-3.2.1.min.js\"
\tintegrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
\tcrossorigin=\"anonymous\"></script>
\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js\"></script>
\t<script>
\t\t\$(\".button-collapse\").sideNav();
\t</script>
</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
    }

    // line 31
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function getDebugInfo()
    {
        return array (  81 => 31,  76 => 7,  58 => 32,  56 => 31,  29 => 7,  21 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\" />
\t<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/css/materialize.min.css\" />
\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t<title>{% block title %}{% endblock %}</title>
\t<style>
\t\tbody {
\t\t\tbackground-color: #EEEEEE;
\t\t}
\t</style>
</head>
<body>
\t<div class=\"container\">
\t\t<div class=\"row\">
\t\t\t<div>
\t\t\t\t<ul id=\"slide-out\" class=\"side-nav fixed\">
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/\"><i class=\"material-icons\">dashboard</i>Accueil</a></li>
\t\t\t\t\t<li><div class=\"divider\"></div></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/presences\"><i class=\"material-icons\">perm_contact_calendar</i>Présence</a></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/addPompier\"><i class=\"material-icons\">perm_identity</i>Ajouter/Modifier un pompier</a></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/deletePompier\"><i class=\"material-icons\">delete</i>Supprimer un pompier</a></li>
\t\t\t\t\t<li><div class=\"divider\"></div></li>
\t\t\t\t\t<li><a class=\"waves-effect\" href=\"/historique\"><i class=\"material-icons\">message</i>Historique</a></li>
\t\t\t\t</ul>
\t\t\t\t<a href=\"#\" data-activates=\"slide-out\" class=\"button-collapse\"><i class=\"material-icons\">menu</i></a>
\t\t\t</div>
\t\t\t<div class=\"card\">
\t\t\t\t<div class=\"card-content\">
\t\t\t\t\t{% block content %}{% endblock %}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<script
\tsrc=\"https://code.jquery.com/jquery-3.2.1.min.js\"
\tintegrity=\"sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=\"
\tcrossorigin=\"anonymous\"></script>
\t<script src=\"https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.1/js/materialize.min.js\"></script>
\t<script>
\t\t\$(\".button-collapse\").sideNav();
\t</script>
</body>
</html>
", "layout.twig", "/home/bootlinux35/Desktop/Pompier/API/app/templates/layout.twig");
    }
}
