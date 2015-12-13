<?php
/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/12/15
 * Time: 4:29 AM
 */

require_once 'classes/User.class.php';

abstract class Thread extends User
{
    public $threadid;
    public $messages;

    public function __construct()
    {
        parent::__construct();
    }

}