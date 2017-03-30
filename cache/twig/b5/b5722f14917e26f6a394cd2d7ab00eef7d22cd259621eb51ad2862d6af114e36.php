<?php

/* presences.twig */
class __TwigTemplate_3142be1823845dda511d8a8477b12f4b28d3c53f452824d2178c2ec73aa8f062 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "presences.twig", 1);
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
        echo " Présences ";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "   <p> présence </p>
";
    }

    public function getTemplateName()
    {
        return "presences.twig";
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

{% block title %} Présences {% endblock%}
{% block content %}
   <p> présence </p>
{% endblock %}", "presences.twig", "/home/bootlinux35/Desktop/Pompier/API/app/templates/presences.twig");
    }
}
