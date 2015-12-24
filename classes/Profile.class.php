<?php

/**
 * Created by PhpStorm.
 * User: abhishek
 * Date: 12/24/15
 * Time: 3:34 AM
 */

require_once('classes/Model.class.php');

class Profile extends Model
{
    public $firstname;
    public $lastname;
    public $descrip;
    public $imagepath;

    public function setName()
    {
        if ($this->exists($_SESSION['userid'])) {
            $name = $this->getName($_SESSION['userid']);
            $this->firstname = $name['fname'];
            $this->lastname = $name['lname'];
        }
    }

    public function getName($userid = null)
    {
        $userid = $this->exists($userid) ? $userid : $this->$userid;
        $stmt = "select fname,lname from profile where uid=$userid";
        $rows = DB::select($stmt, array());
        if ($this->exists($rows[0]))
            return $rows[0];
        else
            return array('fname' => '', 'lname' => '');
    }
}