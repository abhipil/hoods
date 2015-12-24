<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 1:38 AM
 */

require_once('classes/Controller.class.php');

class ProfileController extends Controller
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function page($params)
    {
        if (!$this->client->isMember()) {
            $this->client->notaMember = true;
        }
        $this->client->setName();
        $this->client->setPageError($params);
    }

}