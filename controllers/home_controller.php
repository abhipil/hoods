<?php
require_once('classes/Controller.class.php');

class HomeController extends Controller
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function home($params = null)
    {
        if (!$this->client->isMember()) {
            $this->client->notaMember = true;
        }
        $this->client->setHomeTemplates(array('nonmember', 'home'));
        $this->client->setHomeScripts(array('dialog'));
        $this->client->setstyle('home');
        if(isset($params['page_error']))
        $this->client->setPageError($params['page_error']);
    }

    public function post()
    {
        if (!$this->client->isMember()) {
            $this->client->redirect($this->client->getLink('home', 'home'));
        }
        $this->client->home='post';
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $this->client->createthread($_POST);
        }

    }

    public function profile()
    {

    }
}

?>