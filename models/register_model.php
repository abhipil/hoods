<?php
require_once('classes/User.class.php');

class RegisterModel extends User
{

    private $registerTemplates;
    private $registerScripts = array('map' => 'map');

    function __construct($uname = null)
    {
        parent::__construct($uname);
        $this->page_error = "";
        $this->registerTemplates = array('register' => 'register',
            'address' => 'address',
            'block' => 'block');
        $this->registerScripts = array('map' => 'map',
            'getblocks' => 'getblocks');
        $this->setRegisterTemplates();
        $this->setMap();
        $this->scriptspresent = FALSE;
    }

    public function setRegisterTemplates($templates = array('register'))
    {
        foreach ($templates as $template) {
            if (array_key_exists($template, $this->registerTemplates))
                $this->addTemplate('register', 'register/' . $this->registerTemplates[$template] . '.php');
        }
    }

    public function setRegisterScripts($scripts = array('map'))
    {
        foreach ($scripts as $script) {
            if (array_key_exists($script, $this->registerScripts))
                $this->addScript($this->registerScripts[$script]);
        }
    }

    public function registerUser()
    {
        if ($this->addnewUser($_SESSION['username'], $_SESSION['password'], $_SESSION['emailid']) == 0) {

        }
    }

    public function user_initialise()
    {
        $this->setUserID($_SESSION['username']);
    }
}

?>