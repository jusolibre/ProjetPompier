<?php

/* historique.twig */
class __TwigTemplate_f1d679cfc00b9f08ae23a67f5428869e28151b46942c00ae1919f62dec1b8602 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "historique.twig", 1);
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
        echo " Historique ";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "   <p> Historique </p>
";
    }

    public function getTemplateName()
    {
        return "historique.twig";
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

{% block title %} Historique {% endblock%}
{% block content %}
   <p> Historique </p>
{% endblock %}", "historique.twig", "/home/bootlinux35/Desktop/Pompier/API/app/templates/historique.twig");
    }
}
