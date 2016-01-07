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
                $stmt .= "and target='neighbours' and message.uid in( select uid from neighbour where neighbour=$this->userid)";
                $rows = DB::select($stmt, array());
                break;
            case 'dm':
                $stmt .= "and target='dm' and targetid=$targetid";
                $rows = DB::select($stmt, array());
                break;
            default:

        }
        return $rows;
    }

    public function searchThreads($searchkey){
        $stmt="SELECT tid, title, uname FROM (thread NATURAL JOIN message) NATURAL JOIN user
                WHERE message.body like '%$searchkey%'";
        $rows = DB::select($stmt, array());
        return $rows;
    }

    public function createThread($title,$body,$target,$targetid=null){
        if(isset($targetid))
            $stmt = "insert into thread (title,target,targetid) values ( \"".$title."\" , \"".$target."\" ,$targetid); ";
        else
            $stmt = "insert into thread (title,target) values ( \"".$title."\" , \"".$target."\"); ";
        DB::insert($stmt, array($title),$target,$targetid);
        $stmt ="insert into  message (tid,uid,body) values (last_insert_id(),$this->userid,\"".$body."\");";
        return DB::insert($stmt, array($title),$target,$targetid);
    }

    public function getThreadMessages($tid){
        $stmt="SELECT mid,uid,body,edit_date FROM hoods.message where tid=$tid order by count asc";
        $rows = DB::select($stmt,array(),array());
        if(isset($rows)){
            return $rows;
        }

    }
    public function getThread($tid){
        $stmt="SELECT title,post_date,target,targetid FROM hoods.thread where tid=$tid";
        $rows = DB::select($stmt,array(),array());
        if(isset($rows)){
            return $rows[0];
        }
    }
    public function replytothread($tid,$body){
        $stmt="insert into message (tid,uid,body) values ($tid,$this->userid,\"".$body."\")";
        return DB::insert($stmt,array(),array());
    }

}