<?php
require_once 'classes/Block.class.php';
require_once 'classes/DB.class.php';

abstract class User extends Block
{
    public $userid;
    public $username;
    public $email;


    public function __construct()
    {
        parent::__construct();
        DB::connect();
        if (isset($_SESSION['userid'])) {
            $this->setUser();
        }
    }


    /**
     * @func  public setUser
     * @description Sets the User variables
     *      At login, username must be passed
     *      At registration, username and emailid must be passed
     *      Else no params
     *
     * @param null $uname
     * @param null $email
     */
    public function setUser($uname = NULL, $email = null)
    {
        if (isset($email)) {
            $this->username = $uname;
            $this->email = $email;
        } elseif (isset($uname)) {
            $this->username = $uname;
            $this->userid = $this->getUserId();
            $_SESSION['userid'] = $this->userid;
            $this->email = $this->getEmailID();
        } else {
            $this->userid = $_SESSION['userid'];
            $this->username = $this->getUsername();
            $this->email = $this->getEmailID();
        }
    }

    public function getUserID($username = null)
    {
        $username = $this->exists($username) ? $username : $this->username;
        $value = array($username, PDO::PARAM_STR);
        return $this->getUserIDfrom('uname', $value);
    }

    /**
     * @func private getUserIDfrom
     * @description Returns user ID from database based $value of $index
     * @param $index Unique Column in User table
     * @param $value Value to be looked up in table
     * @return null Returns user ID or null if not exists
     */
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

    public function getEmailID($uid = null)
    {
        $uid = isset($uid) ? $uid : $this->userid;
        $stmt = "SELECT emailid FROM user WHERE uid=?";
        $params = array(array($uid, PDO::PARAM_INT));
        $result = array();
        $rows = DB::select($stmt, $params, $result);
        if (!count($rows))
            return NULL;
        return $rows[0]['emailid'];
    }

    public function getUsername($uid = null)
    {
        $uid = isset($uid) ? $uid : $this->userid;
        $stmt = "SELECT uname FROM user WHERE uid=?";
        $params = array(array($uid, PDO::PARAM_INT));
        $result = array();
        $rows = DB::select($stmt, $params, $result);
        if (!count($rows))
            return NULL;
        return $rows[0]['uname'];
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

    protected function addnewUser($hash)
    {
        $params = array($this->username, $hash, $this->email);
        $stmt = "insert into hoods.user (uname,password,emailid) values(?,?,?)";
        return DB::insert($stmt, $params, array());
    }

    public function reqfriendship($friendid){
        $stmt ="insert into friend (uid,friend) values ($this->userid,$friendid)";
        return DB::insert($stmt, array(), array());
    }
    public function accfriendship($friendid){
        $stmt ="insert into friend (uid,friend,status) values ($this->userid,$friendid,'accepted');";
        return DB::insert($stmt, array(), array());
    }
    public function neighbour($neighbourid, $status=1){
        $stmt ="insert into neighbour (uid,neighbour,status) values ($this->userid,$neighbourid,$status)";
        return DB::insert($stmt, array(), array());
    }
}

?>