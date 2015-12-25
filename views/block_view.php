<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 11:37 PM
 */
require_once("classes/View.class.php");

class BlockView extends View{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function block()
    {
        require_once("templates/block/".$this->client->page.".php");
    }
}