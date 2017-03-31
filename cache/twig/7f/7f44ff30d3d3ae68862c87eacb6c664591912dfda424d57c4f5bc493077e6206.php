<?php

/* addPompier.twig */
class __TwigTemplate_e34045e3614b691b75a745a41e3fcaba3daf7a18a58ebd7612826315d2e2b75f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "addPompier.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Ajouter un pompier ";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "   <p> AddPompier </p>
";
    }

    public function getTemplateName()
    {
        return "addPompier.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 5,  35 => 4,  29 => 3,  11 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.twig\" %}

{% block title %} Ajouter un pompier {% endblock %}
{% block content %}
   <p> AddPompier </p>
{% endblock %}", "addPompier.twig", "/home/bootlinux35/Desktop/Pompier/API/app/templates/addPompier.twig");
    }
}
