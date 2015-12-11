<?php
require_once('classes/User.class.php');

/**
 *
 */
class LoginModel extends User
{

    function __construct($uname = null)
    {
        parent::__construct($uname);
        $this->page_error = "";
        $this->setLoginTemplates();
        $this->scriptspresent = FALSE;
    }

    private function setLoginTemplates()
    {
        $this->addTemplate('login', 'login/login.php');
    }

    public function newvisit()
    {
        //call stored procedure to update last visit time here
        $this->updateVisitTime();
    }

    public function verifyPassword($pass)
    {
        return $this->verify($pass);
    }
}

?>