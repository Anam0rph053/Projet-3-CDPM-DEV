<?php
class View
{
    private $template;

    public function __construct($template=null)
    {
        $this->template= $template;
    }
    public function render($variables = array() )
    {
        extract($variables);

        $template = $this->template;

        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();
        include_once (VIEW.'_gabarit.php');
    }

    public function redirect($route)
    {
        header("Location:".HOST.$route);
        exit;
    }
}