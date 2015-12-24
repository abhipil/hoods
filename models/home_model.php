<?php
require_once("classes/Thread.class.php");

class HomeModel extends Thread
{
    public $notaMember;
    private $homeTemplates;
    private $homeScripts = array('map' => 'map');

    function __construct()
    {
        parent::__construct();
        $this->page_error = "";
        $this->homeTemplates = array('home' => ['home', 'nonmember']);
        $this->homeScripts = array();
        $this->setHomeTemplates();
        $this->scriptspresent = FALSE;
        $this->setUser();
    }

    public function setHomeTemplates($templates = array('home'))
    {
        foreach ($templates as $template) {
            if (in_array($template, $this->homeTemplates['home']))
                //echo print_r($this->homeTemplates);
                //die();
                $this->addTemplate($template, 'home/' . $template . '.php');
        }
    }

    public function setHomeScripts($scripts = array('map'))
    {
        foreach ($scripts as $script) {
            if (array_key_exists($script, $this->homeScripts))
                $this->addScript($this->homeScripts[$script]);
        }
    }
}
?>