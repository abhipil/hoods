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

    public function getThreads($target, $targetid)
    {
        $stmt = "SELECT tid, title, uname FROM (thread NATURAL JOIN message) NATURAL JOIN user
                 WHERE count=0 ";
        switch ($target) {
            case 'hood':
                $stmt .= "and target='hood' and targetid=$targetid";
                $rows = DB::select($stmt, array());
                //print_r($rows);
                //die();
                break;
            case 'block':
                $stmt .= "and target='block' and targetid=$targetid";
                $rows = DB::select($stmt, array());

                break;
            default:

        }
        return $rows;
    }

}