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
        //       echo
        if (!$this->client->isMember()) {
            $this->client->notaMember = true;
        }
        $this->client->setHomeTemplates(array('nonmember', 'home'));
        $this->client->setHomeScripts(array('dialog'));
        $this->client->setstyle('home');
        $this->client->setPageError($params);
    }

    public function post()
    {
        echo "hello";
        die();
        if (!$this->client->isMember()) {
            $this->client->redirect($this->client->getLink('home', 'hom'));
        }
    }

    public function profile()
    {

    }
}

?>