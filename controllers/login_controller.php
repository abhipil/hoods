<?php
require_once('classes/Controller.class.php');

class LoginController extends Controller
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function login($error = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['username'] = $_POST['username'];
            $this->client->setUserID($_POST['username']);
            if ($this->client->exists($this->client->userid)) {
                if ($this->client->verifyPassword($_POST['password']))
                    $this->redirect($this->client->getLink('login', 'updatevisittim'));
                else
                    $this->redirect($this->client->getLink('login', 'login', array('page_error' => 'pass_not_match')));
            } else
                if (!$this->client->exists($error))
                    $this->redirect($this->client->getLink('login', 'login', array('page_error' => 'user_not_exist')));
        }
        $this->client->setstyle('login');
        $this->client->setPageError($error);
    }

    public function updatevisittim()
    {
        if (isset($_SESSION['username'])) {
            $this->client->setUserID($_SESSION['username']);
            $this->client->newvisit();
            $this->redirect($this->client->getLink('home', 'home'));
        }
    }
}

?>