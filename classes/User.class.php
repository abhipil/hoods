<?php
require_once 'classes/DB.class.php';
require_once 'classes/Address.class.php';

abstract class User extends Address
{
    public $userid;
    protected $username;
    protected $email;


    public function __construct($uname = null)
    {
        $this->username = $uname;
        $this->con = DB::connect();
        $this->setUserID($uname);
    }

    public function getUserID($username = null)
    {
        $username = $this->exists($username) ? $username : $this->username;
        $value = array($username, PDO::PARAM_STR);
        return $this->getUserIDfrom('uname', $value);
    }

    public function setUserID($uname = NULL)
    {
        if (!isset($this->username))
            $this->username = $uname;
        $this->userid = $this->getUserId();
    }

    private function getUserIDfrom($index, $value)
    {
        $stmt = "select uid from user where $index=?";
        $params = array($value);
        $result = array();
        $rows = DB::select($stmt, $params, $result);
        if (!count($rows))
            return NULL;
        return $rows[0]['uid'];
    }

    public function getEmailID($email = null)
    {
        $email = $this->exists($email) ? $email : $this->$this->email;
        $value = array($email, PDO::PARAM_STR);
        return $this->getUserIDfrom('emailid', $value);
    }

    public function verify($pass)
    {
        return password_verify($pass, $this->getPassword());
    }

    private function getPassword()
    {
        $stmt = "select password from user where uid=?";
        $params = array(array($this->userid, PDO::PARAM_INT));
        $result = array();
        $rows = DB::select($stmt, $params, $result);
        if (!count($rows))
            return NULL;
        return $rows[0]['password'];
    }

    public function updateVisitTime()
    {
        $stmt = "call hoods.updateVisitTime(?)";
        $params = array(array($this->username, PDO::PARAM_STR));
        DB::callproc($stmt, $params);
    }

    protected function addnewUser($name, $hash, $email)
    {
        $stmt = "insert into hoods.user (uname,password,emailid) values(?,?,?)";
        $params = array($name, $hash, $email);
        return DB::insert($stmt, $params, array());
    }
}

?>