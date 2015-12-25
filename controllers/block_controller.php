<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 11:36 PM
 */
require_once("classes/Controller.class.php");

class BlockController extends Controller{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function block(){
        $this->client->setMap(true);

    }
    public function approve($params=null){
        $this->client->setMap(true);
        $i=0;
        $approve=true;
        while($i<3){
            if(isset($params['a'.($i+1)])){
                if($this->client->userid==$params['a'.($i+1)]){
                    $approve=false;
                }
            }
            $i++;
        }
        if($approve)
        $this->client->approveRequests($params['r'],$params['p']);
        $this->redirect($this->client->getLink('block','block'));
    }
}