<?php
require_once("classes/Thread.class.php");

class HomeModel extends Thread
{
    private $homeTemplates;
    private $homeScripts = array('map' => 'map');

    function __construct()
    {
        parent::__construct();
        $this->page_error = "";
        $this->homeTemplates = array('home' => 'home');
        $this->homeScripts = array();
        $this->setHomeTemplates();
        $this->scriptspresent = FALSE;
    }

    public function setHomeTemplates($templates = array('home'))
    {
        foreach ($templates as $template) {
            if (array_key_exists($template, $this->homeTemplates))
                $this->addTemplate('home', 'home/' . $this->homeTemplates[$template] . '.php');
        }
    }

    public function setRegisterScripts($scripts = array('map'))
    {
        foreach ($scripts as $script) {
            if (array_key_exists($script, $this->homeScripts))
                $this->addScript($this->homeScripts[$script]);
        }
    }
}
?>