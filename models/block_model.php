<?php
/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 11:30 PM
 */
require_once("classes/Thread.class.php");


class BlockModel extends Thread{
    public $page;

    public function __construct(){
        parent::__construct();
        $this->page='block';
    }

    public function block($params=null){

    }
}