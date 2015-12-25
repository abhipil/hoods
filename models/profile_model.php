<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 1:40 AM
 */
require_once("classes/User.class.php");

class ProfileModel extends User
{
    public $profile;
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->profile='profile';
    }

}