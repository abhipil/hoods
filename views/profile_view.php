<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 1:42 AM
 */

require_once 'classes/View.class.php';

class ProfileView extends View
{
    public function __construct($client)
    {
        $this->client = $client;
    }

    public function profile($params)
    {
        require_once("templates/profile/".$this->client->profile.".php");
    }
}