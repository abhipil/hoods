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

    protected function redirect($url)
    {
        if (headers_sent())
            die('<script type="text/javascript">window.location.href="' . $url . '";</script>');
        else {
            header('Location: ' . $url);
            die();
        }
    }
}

?>