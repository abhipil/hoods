<?php
require_once('classes/User.class.php');

class RegisterModel extends User
{

    private $registerTemplates;
    private $registerScripts = array('map' => 'map');

    function __construct($uname = null)
    {
        parent::__construct();
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
        $this->setUser($_SESSION['username'], $_SESSION['emailid']);
        if ($this->addnewUser($_SESSION['password'])) {
            $_SESSION['userid'] = $this->userid = $this->getUserID();
        }
        $this->setAddressLoc($_POST['formaddress'], $_POST['lat'], $_POST['lng']);
        $this->addnewAddress();
        $this->setBlockVariables($this->userid, $_POST['blockid']);
        $this->addnewMember();
    }

}

?>