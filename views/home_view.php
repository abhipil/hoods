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
        require_once("templates/home/".$this->client->home.".php");
    }
}
?>