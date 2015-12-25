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
            case 'friends':
                $stmt .= "and target='friends' and message.uid in(
                            select friend from friend where uid=$this->userid
                            union all
                            select uid from friend where uid=$this->userid
                        )";
                $rows = DB::select($stmt, array());
                break;
            case 'neighbours':
                $stmt .= "and target='neighbours' and message.uid in( select neighbour from neighbour where uid=$this->userid)";
                $rows = DB::select($stmt, array());
                break;
            case 'dm':
                $stmt .= "and target='dm' and targetid=$targetid";
                $rows = DB::select($stmt, array());
                break;
            default:

        }
//        print_r($stmt);
//        die();
        return $rows;
    }

    public function createThreads($params){
        switch ($params['target']) {
            case 'hood':
                $stmt = "insert into thread (title,target,targetid) values ( ? , ? ,?);";
                $rows = DB::insert($stmt, array($params['title']),$params['target'],$params['targetid']);
                print_r($rows);
                die();
                break;
            case 'block':
                $stmt .= "and target='block' and targetid=$targetid";
                $rows = DB::insert($stmt, array());
                break;
            case 'friends':
                $stmt .= "and target='friends' and message.uid in(
                            select friend from friend where uid=$this->userid
                            union all
                            select uid from friend where uid=$this->userid
                        )";
                $rows = DB::insert($stmt, array());
                break;
            case 'neighbours':
                $stmt .= "and target='neighbours' and message.uid in( select neighbour from neighbour where uid=$this->userid)";
                $rows = DB::insert($stmt, array());
                break;
            case 'dm':
                $stmt .= "and target='dm' and targetid=$targetid";
                $rows = DB::insert($stmt, array());
                break;
            default:

        }    }

}