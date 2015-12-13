<?php
require_once('classes/Controller.class.php');

class HomeController extends Controller
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function checkmem($params = null)
    {
        // if not redirect to no member status
        // Session not updates please check
        if (strcmp($this->client->isMember(), 'joined')) {
            $this->redirect($this->client->getLink('home', 'home'));
        }
    }

    public function home($params = null)
    {
        //$this->client->setMap(true);
        //$this->client->setHomeScripts(array('map', 'getblocks'));
        $this->client->setstyle('home');
        $this->client->setPageError($params);
    }
}

?>