<?php
require_once 'classes/View.class.php';

/**
 *
 */
class RegisterView extends View
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function register($error = null)
    {
        $page_error = $this->getError();
        $style = $this->client->getstyle();
        require_once($this->client->getTemplate('top'));
        require_once($this->client->getTemplate('head'));
        require_once($this->client->getTemplate('register'));
        require_once($this->client->getTemplate('footer'));
        require_once($this->client->getTemplate('bottom'));
    }
}


?>