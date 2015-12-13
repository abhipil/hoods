<?php

require_once('classes/View.class.php');

class HomeView extends View
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function home()
    {
        require_once($this->client->getTemplate('top'));
        require_once($this->client->getTemplate('head'));
        //foreach($this->client->getTemplate('home') as $template)
        require_once($this->client->getTemplate('home'));
        require_once($this->client->getTemplate('footer'));
        require_once($this->client->getTemplate('bottom'));
    }
}
?>