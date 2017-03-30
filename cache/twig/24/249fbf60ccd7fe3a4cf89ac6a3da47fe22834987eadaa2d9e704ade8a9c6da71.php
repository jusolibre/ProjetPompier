<?php

/* deletePompier.twig */
class __TwigTemplate_0691f29167a9e5f77a6313153addee4737448060c3e60a605411c80acda678d8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "deletePompier.twig", 1);
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
        echo " deletePompier ";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "   <p> Delete Pompier </p>
";
    }

    public function getTemplateName()
    {
        return "deletePompier.twig";
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

{% block title %} deletePompier {% endblock%}
{% block content %}
   <p> Delete Pompier </p>
{% endblock %}", "deletePompier.twig", "/home/bootlinux35/Desktop/Pompier/API/app/templates/deletePompier.twig");
    }
}
