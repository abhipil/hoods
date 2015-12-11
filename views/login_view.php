<?php
require_once 'classes/View.class.php';

class LoginView extends View
{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function login($error = null)
    {
        //if(isset($this->client) && !empty($this->client)){
        //    if(isset($this->client->userid) && !empty($this->client->userid))
        //   header('Location: index.php?controller=login&action=updatevisittim');
        //}
        require_once($this->client->getTemplate('top'));
        require_once($this->client->getTemplate('head'));
        require_once($this->client->getTemplate('login'));
        require_once($this->client->getTemplate('footer'));
        require_once($this->client->getTemplate('bottom'));
    }

}

?>