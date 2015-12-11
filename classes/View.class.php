<?php

/**
 *
 */
abstract class View
{
    protected $client;

    protected function getError()
    {
        return $this->client->getPageError();
    }
}

?>