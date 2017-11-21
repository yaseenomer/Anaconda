<?php

/* home/index.blade.php */
class __TwigTemplate_ef407d2e18603a63b17d6abaea05c2f6fbaad0e2589d514631f1b6fb65cd0058 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
  <h1>  my view</h1>
<p>welcome from view </p>

";
        // line 11
        echo twig_escape_filter($this->env, ($context["adn"] ?? null), "html", null, true);
        echo "



</body>
</html>";
    }

    public function getTemplateName()
    {
        return "home/index.blade.php";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 11,  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "home/index.blade.php", "C:\\xampp\\htdocs\\te\\resuorces\\views\\home\\index.blade.php");
    }
}
