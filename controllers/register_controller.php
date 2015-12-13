<?php
require_once('classes/Controller.class.php');

class RegisterController extends Controller
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function register($error = null)
    {
        $this->client->setstyle('register');
        $this->client->setPageError($error);
    }

    public function tryreg($error = null)
    {
        $email = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['emailid'] = $_POST['emailid'];
            if ($this->client->exists($this->client->getUserID($_SESSION['username']))) {
                if (!$this->client->exists($error))
                    $this->redirect($this->client->getLink('register', 'register', array('page_error' => 'username_exist')));
            } else {
                if ($this->client->exists($this->client->getEmailID($_SESSION['emailid'])))
                    if (!$this->client->exists($error))
                        $this->redirect($this->client->getLink('register', 'register', array('page_error' => 'email_exist')));
            }
            $_SESSION['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $this->redirect($this->client->getLink('register', 'address'));
        }
    }

    public function address($error = null)
    {
        $this->client->setRegisterTemplates(array('address'));
        $this->client->setMap(true);
        $this->client->setRegisterScripts(array('map', 'getblocks'));
        $this->client->setstyle('address');
        $this->client->setPageError($error);
    }

    public function validaddr($error = null)
    {
        $this->client->registerUser();
        $this->redirect($this->client->getLink('home', 'checkmem'));
    }

    public function block($error)
    {
        $this->client->setRegisterTemplates(array('block'));
        $this->client->setMap(true);
        $this->client->setRegisterScripts();
        $this->client->setstyle('address');
        $this->client->setPageError($error);
    }

    public function jsonblocks($params = null)
    {
        echo $this->client->jsonAllBlocksin($params);
        die();
    }
}

?>